<?php

namespace App\Controllers;

class PartyController {

    public function viewListarParty() {
        $parties = $_SESSION['parties'] ?? [];
        require __DIR__ . '/../views/party/listarParty.php';
    }

    public function viewCriarParty() {
        require __DIR__ . '/../views/party/criarParty.php';
    }

    public function entrarParty() {

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?action=listarParty");
            exit;
        }

        foreach ($_SESSION['parties'] as &$party) {

            if ($party['id'] == $id) {

                foreach ($_SESSION['parties'] as $p) {
                    if (in_array($_SESSION['user'], $p['membros'])) {
                        $_SESSION['error'] = "Você já está em uma party!";
                        header("Location: ?action=listarParty");
                        exit;
                    }
                }

                if (count($party['membros']) >= $party['max']) {
                    $_SESSION['error'] = "Party cheia!";
                    header("Location: ?action=listarParty");
                    exit;
                }

                $party['membros'][] = $_SESSION['user'];
            }
        }

        header("Location: ?action=listarParty");
        exit;
    }

    public function sairParty() {

        foreach ($_SESSION['parties'] as &$party) {

            if (in_array($_SESSION['user'], $party['membros'])) {

                $party['membros'] = array_filter(
                    $party['membros'],
                    fn($m) => $m !== $_SESSION['user']
                );

                break;
            }
        }

        header("Location: ?action=listarParty");
        exit;
    }

    public function armazenarParty() {

        $nome = $_POST['nome'] ?? '';
        $jogo = $_POST['jogo'] ?? '';
        $max = $_POST['max'] ?? '';

        if (empty($nome) || empty($jogo) || empty($max)) {
            $_SESSION['error'] = "Preencha todos os campos!";
            header("Location: ?action=criarParty");
            exit;
        }

        if (!isset($_SESSION['parties'])) {
            $_SESSION['parties'] = [];
        }

        $id = count($_SESSION['parties']) + 1;

        $_SESSION['parties'][] = [
            'id' => $id,
            'nome' => $nome,
            'jogo' => $jogo,
            'max' => $max,
            'criador' => $_SESSION['user'],
            'membros' => [$_SESSION['user']]
        ];

        header("Location: ?action=listarParty");
        exit;
    }
}