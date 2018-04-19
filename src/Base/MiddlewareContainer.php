<?php

namespace Timetables\Base;

use Timetables\Middleware\Middleware;

trait MiddlewareContainer
{

    protected $middleware;

    protected function loadMiddleware($file)
    {
        $this->middleware = new Middleware();
        $middleware_array = require($file);
        foreach ($middleware_array as $unit) {
            $this->middleware->setNext(new $unit());
        }
    }

}