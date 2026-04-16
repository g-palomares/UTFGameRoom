<?php

namespace App\Core;

class Router {

    public function handle($action) {

        switch ($action) {
            case 'home':
                if (!isset($_SESSION['user'])) {
                    header("Location: ?action=login");
                    exit;
                }

                require __DIR__ . '/../views/home.php';
                break;

            case 'login':
                $controller = new \App\Controllers\AuthController();
                $controller->viewsLogin();
                break;

            case 'efetuarLogin':
                $controller = new \App\Controllers\AuthController();
                $controller->login();
               break;
        
            case 'logout':
                $controller = new \App\Controllers\AuthController();
                $controller->logout();
                break;
                
            case 'criarConta':
                $controller = new \App\Controllers\AuthController();
                $controller->viewsCriarConta();
                break;

            case 'efetuarRegistro':
                $controller = new \App\Controllers\AuthController();
                $controller->criarConta();
                break;
            
            case 'listarParty':
                $controller = new \App\Controllers\PartyController();
                $controller->viewListarParty();
                break;

            case 'criarParty':
                $controller = new \App\Controllers\PartyController();
                $controller->viewCriarParty();
                break;

            case 'armazenarParty':
                $controller = new \App\Controllers\PartyController();
                $controller->armazenarParty();
                break;    

            case 'entrarParty':
                $controller = new \App\Controllers\PartyController();
                $controller->entrarParty();
                break;
            
            case 'sairParty':
                $controller = new \App\Controllers\PartyController();
                $controller->sairParty();
                break;  

            default:
                echo "erro 404 - Página não encontrada";
                break;    

            }
    }
}