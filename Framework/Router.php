<?php
namespace Framework;
use App\Controllers\ErrorController;
use Framework\middleware\Authorize;

class Router {
    protected $routes = [];

    public function registerRoutes($method, $uri, $action, $middleware = []) {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method'           => $method,
            'uri'              => $uri,
            'controller'       => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware'       => $middleware
        ];
    }

    public function get($uri, $controller, $middleware = []) {
        $this->registerRoutes('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, $middleware = []) {
        $this->registerRoutes('POST', $uri, $controller, $middleware);
    }

    public function put($uri, $controller, $middleware = []) {
        $this->registerRoutes('PUT', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, $middleware = []) {
        $this->registerRoutes('DELETE', $uri, $controller, $middleware);
    }

    public function route($uri) {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $uriSegments   = explode('/', trim($uri, '/'));

        if($requestMethod === 'POST' && isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        }


        foreach ($this->routes as $route) {
            $routeSegments = explode('/', trim($route['uri'], '/'));

            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];
                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        // Dynamic segment like {id} — capture it
                        $params[$matches[1]] = $uriSegments[$i];
                    } elseif ($routeSegments[$i] !== $uriSegments[$i]) {
                        // Static segment doesn't match
                        $match = false;
                        break;
                    }
                }

                if ($match) {

                foreach ($route['middleware'] as $middleware){
                    (new Authorize())->handle($middleware, null);
                }
                    $controller       = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
        }

        $errorController = new ErrorController();
        $errorController->notFound();
    }
}