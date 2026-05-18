<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Framework\Router;
use Framework\Session;
Session::start();
require_once __DIR__ . '/../helpers.php';

$router = new Router();

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace('/WS03/public', '', $uri);
$uri = str_replace('/WS03', '', $uri);

$router->route($uri);

?>