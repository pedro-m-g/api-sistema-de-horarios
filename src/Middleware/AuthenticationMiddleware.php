<?php

namespace Timetables\Middleware;

use Timetables\Base\Application;
use Timetables\Base\Request;

class AuthenticationMiddleware extends Middleware
{

    public function handle(Request $request, Application $app)
    {
        $user = $app->auth->checkLogin($request, $app);
        $request->user = $user;
        return $this->next->handle($request, $app);
    }

}