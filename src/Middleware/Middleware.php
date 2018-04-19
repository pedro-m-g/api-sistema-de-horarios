<?php

namespace Timetables\Middleware;

use Timetables\Base\Application;
use Timetables\Base\Request;

class Middleware
{

    protected $next;

    public function setNext(Middleware $next)
    {
        if (is_null($this->next)) {
            $this->next = $next;
        } else {
            $this->next->setNext($next);
        }
    }

    public function handle(Request $request, Application $app) {
        if (is_null($this->next)) {
            return null;
        }
        return $this->next->handle($request, $app);
    }

}