<?php

namespace App\Controllers;

class PartyController {

public function viewListarParty() {

    $parties = $_SESSION['parties'] ?? [];

    $busca = $_GET['busca'] ?? '';

    if (!empty($busca)) {
        $parties = array_filter($parties, function($party) use ($busca) {
            return stripos($party['nome'], $busca) !== false
                || stripos($party['jogo'], $busca) !== false;
        });
    }

    require __DIR__ . '/../views/party/listarParty.php';
}

    public function viewCriarParty() {
        require __DIR__ . '/../views/party/criarParty.php';
    }

    public function viewEditarParty() {

    $id = $_GET['id'] ?? null;

    if (!$id) {
        header("Location: ?action=listarParty");
        exit;
    }

    foreach ($_SESSION['parties'] as $party) {
        if ($party['id'] == $id) {

            if ($party['criador'] !== $_SESSION['user']) {
                die('Sem permissão');
            }

            require __DIR__ . '/../views/party/editarParty.php';
            return;
        }
    }

    header("Location: ?action=listarParty");
    exit;
}

  public function entrarParty() {

    $id = $_GET['id'] ?? null;
    $senhaInput = $_POST['senha'] ?? null;

    if (!$id) {
        header("Location: ?action=listarParty");
        exit;
    }

    foreach ($_SESSION['parties'] as &$party) {

        if ($party['id'] == $id) {

            if (!empty($party['password'])) {

                if (!$senhaInput) {
                    require __DIR__ . '/../Views/party/senhaParty.php';
                    return;
                }

                if (!password_verify($senhaInput, $party['password'])) {
                    $_SESSION['error'] = "Senha incorreta";
                    require __DIR__ . '/../Views/party/senhaParty.php';
                    return;
                }
            }

            foreach ($_SESSION['parties'] as $p) {
                if (in_array($_SESSION['user'], $p['membros'])) {
                    $_SESSION['error'] = "Você já está em uma party";
                    header("Location: ?action=listarParty");
                    exit;
                }
            }

            if (count($party['membros']) >= $party['max']) {
                $_SESSION['error'] = "Party cheia";
                header("Location: ?action=listarParty");
                exit;
            }

            $party['membros'][] = $_SESSION['user'];

            header("Location: ?action=listarParty");
            exit;
        }
    }
}

public function sairParty() {

    $id = $_GET['id'] ?? null;

    foreach ($_SESSION['parties'] as $index => &$party) {

        if ($party['id'] == $id) {

            if ($party['criador'] === $_SESSION['user']) {

                unset($_SESSION['parties'][$index]);

                $_SESSION['parties'] = array_values($_SESSION['parties']);

                $_SESSION['success'] = "Party excluída porque o dono saiu.";
                header("Location: ?action=listarParty");
                exit;
            }

            $party['membros'] = array_filter(
                $party['membros'],
                fn($m) => $m !== $_SESSION['user']
            );

            $_SESSION['success'] = "Você saiu da party.";
            break;
        }
    }

    header("Location: ?action=listarParty");
    exit;
}
    public function excluirParty() {

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?action=listarParty");
        }

        foreach ($_SESSION['parties'] as $index => $party) {

            if ($party['id'] == $id) {

                if ($party['criador'] !== $_SESSION['user']) {
                    $_SESSION['error'] = "Você não tem permissão para excluir essa party!";
                    header("Location: ?action=listarParty");
                }

                unset($_SESSION['parties'][$index]);

                $_SESSION['parties'] = array_values($_SESSION['parties']);

                $_SESSION['success'] = "Party excluída com sucesso.";
                header("Location: ?action=listarParty");
            }
        }

      
        $_SESSION['error'] = "Party não encontrada.";
        header("Location: ?action=listarParty");
    }

    public function armazenarParty() {

        $nome = $_POST['nome'] ?? '';
        $jogo = $_POST['jogo'] ?? '';
        $max = $_POST['max'] ?? '';
        $senha = $_POST['senha'] ?? '';
        
        if (empty($nome) || empty($jogo) || empty($max)) {
            $_SESSION['error'] = "Preencha todos os campos.";
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
            'membros' => [$_SESSION['user']],
            'password' => !empty($senha) ? password_hash($senha, PASSWORD_DEFAULT) : null,
        ];

        header("Location: ?action=listarParty");
        exit;
    }

    public function atualizarParty() {

    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $jogo = $_POST['jogo'] ?? '';
    $max = (int) ($_POST['max'] ?? 0);

    foreach ($_SESSION['parties'] as &$party) {

        if ($party['id'] == $id) {

            if ($party['criador'] !== $_SESSION['user']) {
                die('Sem permissão');
            }

            if ($max < count($party['membros'])) {
                $_SESSION['error'] = "Max menor que membros atuais";
                header("Location: ?action=listarParty");
                exit;
            }

            $party['nome'] = $nome;
            $party['jogo'] = $jogo;
            $party['max'] = $max;

            $_SESSION['success'] = "Party atualizada";
            header("Location: ?action=listarParty");
            exit;
        }
    }

    $_SESSION['error'] = "Party não encontrada";
    header("Location: ?action=listarParty");
    exit;
}

  public function usuarioParty() {

        foreach ($_SESSION['parties'] ?? [] as $party) {
            if (in_array($_SESSION['user'], $party['membros'])) {
                return $party;
            }
        }

        return null;
    }
}