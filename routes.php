 <?php
//  $routes = [
//     '/' => 'controllers/home.php',
//     '/listings' => 'controllers/listing/index.php',
//     '/listing/create' => 'controllers/listing/create.php',
//     '404' => 'controllers/error/404.php'
//  ];
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listing/index.php');
$router->get('/listing/create', 'controllers/listing/create.php');
$router->get('404', 'controllers/error/404.php');       
$router->get('403', 'controllers/error/403.php');
?>