<?php

namespace Timetables\Controller;

use Timetables\Base\Request;
use Timetables\Base\Application;

class ProgramsController extends Controller
{

  public function index(Request $request, Application $app)
  {
    $repo = $app->repository('programs');
    $programs = $repo->findByUser($request->user);
    $programs = array_map(function ($program) {
      return $program->toArray();
    }, $programs);
    return $this->json($programs);
  }

}