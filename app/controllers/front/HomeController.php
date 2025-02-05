<?php
namespace App\controllers\front;

use App\core\Controller;

class HomeController extends Controller{
    public function index() {
        
        $articles = []; 
        $this->render('index', ['articles' => $articles]);
    }
}
?>
