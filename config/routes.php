<?php

use Timetables\Controller\AcademicsController;
use Timetables\Controller\AuthController;
use Timetables\Controller\ProgramsController;
use Timetables\Controller\SubjectsController;

use Timetables\Validator\LoginValidator;

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
  ],
  '/academics' => [
    'GET' => [
      'controller' => AcademicsController::class,
      'method' => 'index',
      'only' => [
        'responsible'
      ]
    ]
  ],
  '/subjects' => [
    'GET' => [
      'controller' => SubjectsController::class,
      'method' => 'index',
      'only' => [
        'responsible'
      ]
    ]
  ]
];