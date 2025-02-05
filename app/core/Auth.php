<?php
namespace App\Core;

class Auth {
    public function login($username, $email,$password) {
        $_SESSION['user'] = $username;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function checkAuth() {
        return isset($_SESSION['user']);
    }
}
