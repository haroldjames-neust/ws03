<?php
require '../helpers.php';
require basePath('Database.php'); 
$config = require basePath('config/db.php');
$db = new Database($config);
require basePath ("Router.php");
$router = new Router();
$routes = require basePath('routes.php');
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri,$method);
require basePath('views/home.view.php'); 



$uri = $_SERVER['REQUEST_URI'];

if (array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri]));
} else {
    require basePath($routes['404']);

}
?>

    