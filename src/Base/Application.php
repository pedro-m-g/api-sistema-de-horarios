<?php

namespace Timetables\Base;

use Timetables\Exception\AppException;

use Timetables\Middleware\DispatcherMiddleware;

class Application
{

  use MiddlewareContainer,
      ServiceContainer,
      ReposContainer;

  const DEFAULT_MIDDLEWARE_FILE = CONFIG_PATH . '/middleware.php';
  const DEFAULT_REPOS_FILE = CONFIG_PATH . '/repositories.php';
  const DEFAULT_ROUTES_FILE = CONFIG_PATH . '/routes.php';
  const DEFAULT_SERVICES_FILE = CONFIG_PATH . '/services.php';

  private $router;

  public function __construct($routes = self::DEFAULT_ROUTES_FILE)
  {
    $this->router = Router::load($routes);
  }

  public function configure(
      $services = self::DEFAULT_SERVICES_FILE,
      $repos = self::DEFAULT_REPOS_FILE,
      $middleware = self::DEFAULT_MIDDLEWARE_FILE) {
    $this->load($services);
    $this->loadRepositories($repos, $this);
    $this->loadMiddleware($middleware);
  }

  public function handle(Request $request)
  {
    try {
      $controller = $this->router->getController($request);
      $dispatcher = new DispatcherMiddleware($controller);
      $this->middleware->setNext($dispatcher);
      return $this->middleware->handle($request, $this);
    } catch (AppException $ex) {
      return $ex->render($request);
    }
  }

}