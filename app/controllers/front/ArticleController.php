<?php
namespace App\Controller;

use App\Models\Article;
use App\Core\Database;
use App\Core\Controller;

class ArticleController extends Controller {
    private $articleModel;

    public function __construct() {
        try {
            $this->articleModel = new Article();
        } catch (\Exception $e) {
            die("Could not initialize the article system");
        }
    }

    public function index() {
        $articles = $this->articleModel->getAllArticles();
        $this->render('articles/index', ['articles' => $articles]);
    }

    public function show($id) {
        $article = $this->articleModel->getArticle($id);
        if (!$article) {
            http_response_code(404);
            require '../app/views/front/404.php';
            return;
        }
        $this->render('articles/show', ['article' => $article]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id']
            ];

            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE id = :user_id");
            $stmt->execute(['user_id' => $data['user_id']]);
            $userExists = $stmt->fetchColumn();

            if (!$userExists) {
                echo "User ID does not exist.";
                return;
            }

            if ($this->articleModel->createArticle($data)) {
                header('Location: /articles');
                exit;
            } else {
                echo "Failed to create article.";
            }
        }
        $this->render('articles/addArticle');
    }
}
