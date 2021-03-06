<?php

namespace Timetables\Controller;

use Timetables\Base\Request;
use Timetables\Base\Application;

class ProgramsController extends Controller
{

  public function index(Request $request, Application $app)
  {
    return $this->entitiesByUser($request, $app, 'programs');
  }

}