<?php

namespace Timetables\Base;

use Timetables\Exception\NotFoundException;

class Router
{

  private $mappings = [];

  public function __construct($mappings = [])
  {
    $this->mappings = $mappings;
  }

  public function getController($path)
  {
    if (!array_key_exists($path, $this->mappings))
      throw new NotFoundException();
    $match = $this->mappings[$path];
    $obj = new $match['controller'];
    $method = $match['method'];
    return [$obj, $method];
  }

  public static function load($file)
  {
    $mappings = require_once($file);
    return new Router($mappings);
  }

}