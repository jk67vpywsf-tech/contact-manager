<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function loginForm() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function login() {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = (new User())->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['admin'] = $user['username'];
            header('Location: index.php?action=index');
            exit;
        }

        $error = "Invalid username or password";
        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php?action=index');
        exit;
    }
}