<?php

namespace App\Core;

class Router{
    protected $routes = [];

    public function add($method, $route, $controller, $action)
    {
        $this->routes["$method $route"] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];//get or post
        $key = "$method $uri";

        if (array_key_exists($key, $this->routes)) {
            $controller = $this->routes[$key]['controller'];
            $action = $this->routes[$key]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            http_response_code(404);
            require __DIR__ . '/../views/front/404.php';
        }
    }
}
