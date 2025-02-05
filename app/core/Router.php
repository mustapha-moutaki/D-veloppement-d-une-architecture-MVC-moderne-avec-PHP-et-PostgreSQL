<?php

namespace App\core;

use App\core\Controller;

class Router extends Controller
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes["$method $route"] = ['controller' => $controller, 'action' => $action];  
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];
        $key = "$method $uri";

        if (array_key_exists($key, $this->routes)) {
            $controller = $this->routes[$key]['controller'];
            $action = $this->routes[$key]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            $this->render('404');
        }
    }
}
