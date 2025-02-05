<?php
namespace App\core;

class Controller {
    protected function render($view, $data = []) {
        // Extract the data to be available in the view
        extract($data);

        include_once "../app/views/articles/{$view}.blade.php"; // 
    }
}