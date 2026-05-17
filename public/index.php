<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';
use Framework\Router;


$router = new Router();


$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace('/WS03/public', '', $uri);
$uri = str_replace('/WS03', '', $uri);


$router->route($uri);

// if (array_key_exists($uri, $routes)) {
//     require basePath($routes[$uri]);
// } else {
//     require basePath($routes['404']);
// }

?>