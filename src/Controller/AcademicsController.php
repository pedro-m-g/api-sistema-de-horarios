<?php

namespace Timetables\Controller;

use Timetables\Base\Request;
use Timetables\Base\Application;

class AcademicsController extends Controller
{

  public function index(Request $request, Application $app)
  {
    $academics = $this->getEntitiesByUser($request, $app, 'academics');
    $academics = $this->entitiesArray($academics);
    return $this->json(
      $academics->groupBy('program')
    );
  }

}