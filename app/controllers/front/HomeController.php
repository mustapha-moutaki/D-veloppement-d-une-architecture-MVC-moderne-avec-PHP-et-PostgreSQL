<?php
namespace App\Controllers\front;

use App\Core\View;

class HomeController {
    public function index() {
        $name = "mustapha";
        $view = new View();
        $view->render('home', ['name' => $name]);
    }
}
