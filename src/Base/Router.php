<?php

namespace Timetables\Base;

use Timetables\Exception\NotFoundException;
use Timetables\Base\Request;

class Router
{

  private $mappings = [];

  public function __construct($mappings = [])
  {
    $this->mappings = $mappings;
  }

  public function getController(Request $request)
  {
    $path = $request->getPath();
    $http_method = $request->getMethod();
    if (!$this->routeExists($request))
      throw new NotFoundException();
    $match = $this->mappings[$path][$http_method];
    $obj = new $match['controller'];
    $method = $match['method'];
    return [$obj, $method];
  }

  public static function load($file)
  {
    $mappings = require_once($file);
    return new Router($mappings);
  }

  private function routeExists(Request $request)
  {
    $path = $request->getPath();
    $method = $request->getMethod();
    return array_key_exists($path, $this->mappings) &&
           array_key_exists($method, $this->mappings[$path]);
  }

}