<?php

namespace Timetables\Controller;

use Timetables\Base\Request;

class IndexController extends Controller
{

  public function hello(Request $request)
  {
    return $this->json([ 'data' => 'hola' ]);
  }

}