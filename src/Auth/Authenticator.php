<?php

namespace Timetables\Auth;

use Timetables\Database\DB;
use Timetables\Exception\AuthenticationException;
use Timetables\Middleware\AuthenticationMiddleware;

class Authenticator
{

    public function checkLogin($request, $app)
    {
        $token = $request->header('X-AUTH-TOKEN');
        $user = $app->repository('users')->findByToken($token);
        if (!$this->checkAccess($user, $request)) {
            throw new AuthenticationException("No autorizado");
        }
    }

    private function checkAccess($user, $request)
    {
        $role = is_null($user) ? 'guest' : $user['role'];
        if (array_key_exists('only', $request->_metadata)) {
            return in_array($role, $request->_metadata['only']);
        }
        if (array_key_exists('except', $request->_metadata)) {
            return !in_array($role, $request->_metadata['except']);
        }
        return true;
    }

}