<?php

namespace Timetables\Middleware;

class AuthenticationMiddleware extends Middleware
{

    public function handle($request, $app)
    {
        $user = $app->auth->checkLogin($request, $app);
        $request->user = $user;
        return $this->next->handle($request, $app);
    }

}