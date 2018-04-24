<?php

namespace Timetables\Controller;

use Timetables\Base\Request;
use Timetables\Base\Application;

class AuthController extends Controller
{

  public function login(Request $request, Application $app)
  {
    $email = $request->json('email');
    $password = $request->json('password');
    $user = $app->auth->login($email, $password, $app);
    return $this->json($user->toArray());
  }

}