<?php

use Timetables\Controller\AuthController;
use Timetables\Validator\LoginValidator;

return [
  '/login' => [
    'POST' => [
      'controller' => AuthController::class,
      'method' => 'login',
      'validator' => LoginValidator::class
    ]
  ]
];