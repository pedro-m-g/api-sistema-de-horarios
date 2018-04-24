<?php

namespace Timetables\Auth;

use Timetables\Database\DB;
use Timetables\Exception\AuthenticationException;
use Timetables\Middleware\AuthenticationMiddleware;

class Authenticator
{

    const TOKEN_LENGTH = 60;

    public function checkLogin($request, $app)
    {
        $token = $request->header('X-AUTH-TOKEN');
        if (!$token)
            $token = 'BLOCK';
        $user = $app->repository('users')->findByToken($token);
        if (!$this->checkAccess($user, $request)) {
            throw new AuthenticationException("No autorizado");
        }
        return $user;
    }

    public function login($email, $password, $app)
    {
        $users = $app->repository('users');
        $user = $users->findByEmail($email);
        if (is_null($user)) {
            throw new AuthenticationException('Usuario o contraseña inválidos');
        }
        if (!$user->checkPassword($password)) {
            throw new AuthenticationException('Usuario o contraseña inválidos');
        }
        $user->token = $this->token();
        $users->update($user);
        return $user;
    }

    private function checkAccess($user, $request)
    {
        $role = is_null($user) ? 'guest' : $user->role;
        if (array_key_exists('only', $request->_metadata)) {
            return in_array($role, $request->_metadata['only']);
        }
        if (array_key_exists('except', $request->_metadata)) {
            return !in_array($role, $request->_metadata['except']);
        }
        return true;
    }

    private function token()
    {
        return bin2hex(random_bytes(self::TOKEN_LENGTH));
    }

}