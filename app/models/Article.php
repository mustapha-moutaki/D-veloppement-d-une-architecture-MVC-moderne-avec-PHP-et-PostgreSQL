<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Article {
    private $db;
    
    public function __construct() {
        try {
            $this->db = Database::getInstance(); // الآن هذا سيكون كائن PDO
        } catch (\Exception $e) {
            error_log("Database connection failed: " . $e->getMessage());
            throw new \Exception("Database connection failed");
        }
    }

    public function getAllArticles() {
        try {
            $stmt = $this->db->query("SELECT * FROM articles"); 
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
            error_log("Articles fetched: " . print_r($results, true));
            return $results;
        } catch (\PDOException $e) {
            error_log("Error fetching articles: " . $e->getMessage());
            return [];
        }
    }

    public function getArticle($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Failed to fetch article: " . $e->getMessage());
            return null;
        }
    }

    public function createArticle($data) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO articles (title, content) 
                VALUES (:title, :content)
            ");
            return $stmt->execute($data);
        } catch (\PDOException $e) {
            error_log("Failed to create article: " . $e->getMessage());
            return false;
        }
    }
}
