<?php

use Timetables\Middleware\AuthenticationMiddleware;
use Timetables\Middleware\ValidationMiddleware;

return [
    AuthenticationMiddleware::class,
    ValidationMiddleware::class
];