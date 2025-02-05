<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function add($method, $path, $controller, $action) {
       
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^' . $pattern . '$/';

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'pattern' => $pattern,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($requestUri, $requestMethod) {
        $requestUri = strtok($requestUri, '?');
        $requestUri = rtrim($requestUri, '/');
        if (empty($requestUri)) {
            $requestUri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }

            // Check if route has parameters
            if (strpos($route['path'], '{') !== false) {
                if (preg_match($route['pattern'], $requestUri, $matches)) {
                    // Filter out numeric keys
                    $params = array_filter($matches, function($key) {
                        return !is_numeric($key);
                    }, ARRAY_FILTER_USE_KEY);

                    return $this->executeRoute($route, $params);
                }
            } 
            // Simple route matching
            elseif ($route['path'] === $requestUri) {
                return $this->executeRoute($route);
            }
        }

        // No route found
        $this->handleNotFound();
    }

    private function executeRoute($route, $params = []) {
        try {
            $controllerClass = $route['controller'];
            if (!class_exists($controllerClass)) {
                throw new \Exception("Controller class {$controllerClass} not found");
            }

            $controller = new $controllerClass();
            $action = $route['action'];

            if (!method_exists($controller, $action)) {
                throw new \Exception("Action {$action} not found in controller {$controllerClass}");
            }

            // If we have parameters, pass them to the action
            if (!empty($params)) {
                return call_user_func_array([$controller, $action], $params);
            }

            return $controller->$action();

        } catch (\Exception $e) {
            // Log the error
            error_log($e->getMessage());
            $this->handleError($e);
        }
    }

    private function handleNotFound() {
        http_response_code(404);
        if (file_exists('../app/views/front/404.php')) {
            require '../app/views/front/404.php';
        } else {
            echo "404 Not Found!";
        }
        exit;
    }

}