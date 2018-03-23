<?php

/**
 *
 *  Controlador frontal.
 */

require __DIR__ . '/../vendor/autoload.php';

use Timetables\Base\Application;
use Timetables\Base\Request;

define('ROOT_PATH', __DIR__ . '/..');
define('APP_PATH', __DIR__ . '/../src');
define('PUBLIC_PATH', __DIR__);
define('CONFIG_PATH', __DIR__ . '/../config');

$app = new Application();
$request = Request::getInstance();
$response = $app->handle($request);
$response->send();
