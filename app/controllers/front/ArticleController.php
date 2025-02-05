<?php


namespace App\Controller;
use App\Models\Article;

class ArticleController {
    private $articleModel;

    public function __construct() {
        try {
            $this->articleModel = new Article();
        } catch (\Exception $e) {

            die("Could not initialize the article system");
        }
    }

    public function index() {
        try {
            $articles = $this->articleModel->getAllArticles();
            return view('articles.index', compact('articles'));
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }
    
    
    
    public function show($id) {
        $article = $this->articleModel->getArticle($id);
        if (!$article) {

            http_response_code(404);
            require '../app/views/front/404.php';
            return;
        }
        require '../app/views/articles/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id']
            ];
            $this->articleModel->createArticle($data);
            header('Location: /articles');
        }
        require_once '../app/views/articles/create.php';
    }


}