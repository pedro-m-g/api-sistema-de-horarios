<?php

namespace Timetables\Base;

use Timetables\Exception\AppException;

class Application
{

  const DEFAULT_ROUTES_FILE = CONFIG_PATH . '/routes.php';

  private $router;

  public function __construct($routes = self::DEFAULT_ROUTES_FILE)
  {
    $this->router = Router::load($routes);
  }

  public function handle(Request $request)
  {
    try {
      $controller = $this->router->getController($request->getPath());
      return $controller($request);
    } catch (AppException $ex) {
      return $ex->render($request);
    }
  }

}