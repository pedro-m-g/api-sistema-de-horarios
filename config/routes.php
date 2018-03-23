<?php

use Timetables\Controller\IndexController;

return [
  '/' => [
    'GET' => [
      'controller' => IndexController::class,
      'method' => 'hello'
    ]
  ]
];