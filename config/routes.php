<?php

use Timetables\Controller\AuthController;
use Timetables\Validator\LoginValidator;

use Timetables\Controller\ProgramsController;

return [
  '/login' => [
    'POST' => [
      'controller' => AuthController::class,
      'method' => 'login',
      'validator' => LoginValidator::class
    ]
  ],
  '/programs' => [
    'GET' => [
      'controller' => ProgramsController::class,
      'method' => 'index',
      'only' => [
        'responsible'
      ]
    ]
  ]
];