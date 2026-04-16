<?php

namespace App\Controllers;

class AuthController {

    public function viewsLogin() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function viewsCriarConta() {
        require __DIR__ . '/../views/auth/criarConta.php';
    }

    public function login() {

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            $_SESSION['error'] = "Preencha todos os campos.";
            header("Location: ?action=login");
            exit;
        }

        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email && password_verify($senha, $user['senha'])) {
                $_SESSION['user'] = $user['username'];

                header("Location: ?action=home");
                exit;
            }
        }

        $_SESSION['error'] = "Login inválido!";
        header("Location: ?action=login");
        exit;
    }
    
    public function criarConta() {

        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
            }

        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $confirmar = $_POST['confirmarSenha'] ?? '';

        if (empty($username) || empty($email) || empty($senha) || empty($confirmar)) {
            $_SESSION['error'] = "Preencha todos os campos.";
            header("Location: ?action=criarConta");
            exit;
        }

        if ($senha !== $confirmar) {
            $_SESSION['error'] = "As senhas não coincidem.";
            header("Location: ?action=criarConta");
            exit;
        }

        
        if ($user['username'] === $username) {
            $_SESSION['error'] = "Username já em uso.";
            header("Location: ?action=criarConta");
            exit;
            }
            
            
            foreach ($_SESSION['users'] as $user) {
                if ($user['email'] === $email) {
                    $_SESSION['error'] = "Email já cadastrado.";
                    header("Location: ?action=criarConta");
                    exit;
                }
            }

        $_SESSION['users'][] = [
            'username' => $username,
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_DEFAULT)
        ];

        $_SESSION['success'] = "Cadastro realizado com sucesso!";

        header("Location: ?action=login");
        exit;
    }


    public function logout() {

    unset($_SESSION['user']);

    header("Location: ?action=criarConta");
    exit;
}
}