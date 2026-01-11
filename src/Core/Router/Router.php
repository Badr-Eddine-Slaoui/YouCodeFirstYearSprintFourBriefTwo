<?php

namespace Core\Router;

class Router
{
    public static Router $instance;
    private array $routes = [];
    private string $currentMethod;
    public array $namedRoutes = [];
    public array $middlewares = [];

    public function __construct() {
        self::$instance = $this;
    }

    public function get(string $uri, string $action){
        $this->routes['GET'][$uri] = $action;
        $this->currentMethod = 'GET';
        return $this;
    }

    public function post(string $uri, string $action){
        $this->routes['POST'][$uri] = $action;
        $this->currentMethod = 'POST';
        return $this;
    }

    public function name(string $name){
        $uris = array_keys($this->routes[$this->currentMethod]);
        $this->namedRoutes[$name] = end($uris);
        return $this;
    }

    public function middleware(array $middlewares){
        $uris = array_keys($this->routes[$this->currentMethod]);
        $this->middlewares[$this->currentMethod][end($uris)] =  $middlewares;
        return $this;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$requestMethod][$uri])) {
            [$controllerName, $methodName] = explode('@', $this->routes[$requestMethod][$uri]);

            if(isset($this->middlewares[$requestMethod][$uri])){

                $middlewares = $this->middlewares[$requestMethod][$uri];

                foreach ($middlewares as $middleware) {
                    $middlewareClass = "App\\Middlewares\\$middleware";
                    $middlewareInstance = new $middlewareClass();
                    $middlewareInstance->handle();
                }
            }

            $controllerClass = "App\\Controllers\\$controllerName";
            $controller = new $controllerClass();
            $controller->$methodName();
            return;
        }

        $controllerClass = "App\\Controllers\\NotFoundController";
        $controller = new $controllerClass();
        $controller->index();
    }
}
