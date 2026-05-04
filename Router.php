<?php
class Router{
    protected $routes = [];
    public function registerRoutes($method, $uri, $controller){
        $this->routes[]= [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function get($uri, $controller){
        $this->registerRoutes('GET', $uri, $controller);
    }

    public function post($uri, $controller){
        $this->registerRoutes('POST', $uri, $controller);
    }

    public function put($uri, $controller){
        $this->registerRoutes('PUT', $uri, $controller);
    }

    public function delete($uri, $controller){
        $this->registerRoutes('DELETE', $uri, $controller);
    }

    public function error($httpCode = 404){
        http_response_code($httpCode);
        require basePath("controllers/error/{$httpCode}.php");
        exit;
    }

    public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method){
                require basePath($route['controller']);
                return;
            }
        }
        $this->error();
    }
}

?>