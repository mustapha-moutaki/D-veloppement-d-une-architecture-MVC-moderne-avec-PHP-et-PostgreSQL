<?php
namespace App\Core;

class Auth {
    public function login($username, $password) {
        $_SESSION['user'] = $username;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function checkAuth() {
        return isset($_SESSION['user']);
    }
}
