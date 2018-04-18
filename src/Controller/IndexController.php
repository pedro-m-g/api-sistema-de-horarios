<?php

namespace Timetables\Controller;

use Timetables\Base\Request;
use Timetables\Base\Application;

class IndexController extends Controller
{

  public function hello(Request $request, Application $app)
  {
    $users = $app->db->query('SELECT * FROM users');
    return $this->json($users);
  }

}