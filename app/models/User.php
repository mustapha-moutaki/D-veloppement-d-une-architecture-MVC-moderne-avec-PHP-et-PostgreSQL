<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createUser($data) {
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$data['username'], password_hash($data['password'], PASSWORD_DEFAULT)]);
    }
}
