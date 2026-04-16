<?php

namespace App\Controllers;

use App\Controllers\PartyController;

class UsuarioController {

   public function perfilUsuario() {

    if (!isset($_SESSION['user'])) {
        header("Location: ?action=login");
        exit;
    }

    $usernameLogado = $_SESSION['user'];

    $username = $_GET['user'] ?? $usernameLogado;

    $usuarioExiste = false;

    foreach ($_SESSION['users'] ?? [] as $user) {
        if ($user['username'] === $username) {
            $usuarioExiste = true;
            break;
        }
    }

    if (!$usuarioExiste) {
        echo "Usuário não encontrado";
        exit;
    }

    $minhaParty = null;

    foreach ($_SESSION['parties'] ?? [] as $party) {
        if (in_array($username, $party['membros'])) {
            $minhaParty = $party;
            break;
        }
    }

    $partiesCriadas = 0;

    foreach ($_SESSION['parties'] ?? [] as $party) {
        if ($party['criador'] === $username) {
            $partiesCriadas++;
        }
    }


    $donoLogado = ($username === $usernameLogado);

    require __DIR__ . '/../Views/usuario/usuario.php';
}
}