<?php

class AuthController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
    }
    
    public function showLogin() {
        require 'views/auth/login.php';
    }
    
    public function showRegister() {
        require 'views/auth/register.php';
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $user = $this->userModel->findByUsername($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /dashboard');
                exit;
            }
            
            $error = 'Invalid username or password';
            require 'views/auth/login.php';
        }
    }
    
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
            
            $errors = [];
            
            if (empty($username)) {
                $errors[] = 'Username is required';
            }
            if (empty($password)) {
                $errors[] = 'Password is required';
            }
            if ($password !== $confirmPassword) {
                $errors[] = 'Passwords do not match';
            }
            
            if (empty($errors)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                if ($this->userModel->create($username, $hashedPassword)) {
                    header('Location: /auth/login');
                    exit;
                } else {
                    $errors[] = 'Username already exists';
                }
            }
            
            require 'views/auth/register.php';
        }
    }
}