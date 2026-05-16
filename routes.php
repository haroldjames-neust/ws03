 <?php
//  $routes = [
//     '/' => 'controllers/home.php',
//     '/listings' => 'controllers/listing/index.php',
//     '/listing/create' => 'controllers/listing/create.php',
//     '404' => 'controllers/error/404.php'
//  ];
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listing/create', 'controllers/listings/create.php');
$router->get('/listing', 'controllers/listings/show.php');

?>