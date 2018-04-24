<?php

use Timetables\Controller\AuthController;

return [
  '/login' => [
    'POST' => [
      'controller' => AuthController::class,
      'method' => 'login'
    ]
  ]
];