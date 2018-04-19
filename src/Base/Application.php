<?php

namespace Timetables\Base;

use Timetables\Exception\AppException;
use Timetables\Base\ServiceContainer;
use Timetables\Base\ReposContainer;

class Application
{

  use ServiceContainer,
      ReposContainer;

  const DEFAULT_ROUTES_FILE = CONFIG_PATH . '/routes.php';
  const DEFAULT_SERVICES_FILE = CONFIG_PATH . '/services.php';
  const DEFAULT_REPOS_FILE = CONFIG_PATH . '/repositories.php';

  private $router;

  public function __construct($routes = self::DEFAULT_ROUTES_FILE)
  {
    $this->router = Router::load($routes);
  }

  public function configure($services = self::DEFAULT_SERVICES_FILE, $repos = self::DEFAULT_REPOS_FILE) {
    $this->load($services);
    $this->loadRepositories($repos, $this);
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