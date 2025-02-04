<?php
namespace App\Models;

use App\Core\Model;

class Article extends Model {
    public function getArticles() {
        $stmt = $this->db->query("SELECT * FROM articles");
        return $stmt->fetchAll();
    }

    public function getArticleById($id) {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createArticle($data) {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
        $stmt->execute([$data['title'], $data['content']]);
    }
}
