<?php

namespace Timetables\Base;

use Timetables\Exception\AppException;
use Timetables\Base\ServiceContainer;

class Application
{

  use ServiceContainer;

  const DEFAULT_ROUTES_FILE = CONFIG_PATH . '/routes.php';
  const DEFAULT_SERVICES_FILE = CONFIG_PATH . '/services.php';

  private $router;

  public function __construct($routes = self::DEFAULT_ROUTES_FILE)
  {
    $this->router = Router::load($routes);
  }

  public function configure($services = self::DEFAULT_SERVICES_FILE) {
    $this->load($services);
  }

  public function handle(Request $request)
  {
    try {
      $controller = $this->router->getController($request);
      return $controller($request, $this);
    } catch (AppException $ex) {
      return $ex->render($request);
    }
  }

}