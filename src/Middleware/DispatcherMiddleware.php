<?php

namespace Timetables\Middleware;

use Timetables\Base\Application;
use Timetables\Base\Request;

class DispatcherMiddleware extends Middleware
{

    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function handle(Request $request, Application $app) {
        $controller = $this->controller;
        return $controller($request, $app);
    }

}