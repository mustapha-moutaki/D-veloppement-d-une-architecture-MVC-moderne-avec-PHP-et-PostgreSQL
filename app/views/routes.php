<?php

use App\Core\Router;
use App\Controller\ArticleController;

$router = new Router();

$router->add('GET', '/', ArticleController::class, 'index');
$router->add('GET', '/articles', ArticleController::class, 'index');
$router->add('GET', '/articles/addArticle', ArticleController::class, 'create');
$router->add('POST', '/articles/addArticle', ArticleController::class, 'create');
$router->add('GET', '/articles/show/{id}', ArticleController::class, 'show');
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->dispatch($requestUri, $requestMethod);

$router->add('GET', '/articles/create', 'App\Controller\ArticleController', 'create');
