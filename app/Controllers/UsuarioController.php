<?php

namespace App\Controllers;

use App\Controllers\PartyController;

class UsuarioController {

    public function perfilUsuario() {

        if (!isset($_SESSION['user'])) {
            header("Location: ?action=criarConta");
            exit;
        }

        $username = $_SESSION['user'];

        $partyController = new PartyController();
        $minhaParty = $partyController->UsuarioParty();

        $partiesCriadas = 0;

        foreach ($_SESSION['parties'] ?? [] as $party) {
            if ($party['criador'] === $username) {
                $partiesCriadas++;
            }
        }

        require __DIR__ . '/../Views/usuario/usuario.php';
    }
}