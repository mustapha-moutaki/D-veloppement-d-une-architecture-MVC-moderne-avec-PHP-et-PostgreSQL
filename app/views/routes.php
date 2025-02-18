<?php

use App\Core\Router;
use App\controllers\front\ArticleController;
use App\controllers\front\HomeController;

$router = new Router();

$router->add('GET', '/', HomeController::class, 'index');
$router->add('GET', '/articles', ArticleController::class, 'index');
$router->add('GET', '/articles/addArticle', ArticleController::class, 'create');
$router->add('POST', '/articles/addArticle', ArticleController::class, 'create');
$router->add('GET', '/articles/show/{id}', ArticleController::class, 'show');

$router->dispatch();