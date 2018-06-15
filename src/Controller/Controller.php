<?php

namespace Timetables\Controller;

use Timetables\Concerns\CreatesJsonResponses;
use Timetables\Concerns\HandlesEntities;

/**
 * Clase base para los controladores
 */
class Controller
{

  use CreatesJsonResponses;
  use HandlesEntities;

}