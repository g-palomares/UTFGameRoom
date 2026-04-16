<h1>Criar Party</h1>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;">
        <?= $_SESSION['error'] ?>
    </p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php 
    if (!isset($_SESSION['parties'])) {
    $_SESSION['parties'] = [];
}

foreach ($_SESSION['parties'] as $party) {
    if (in_array($_SESSION['user'], $party['membros'])) {
        $_SESSION['error'] = "Você já está em uma party.";
        header("Location: ?action=listarParty");
        exit;
    }
}
?>

<form method="POST" action="?action=armazenarParty">
    <input type="text" name="nome" placeholder="Nome da party"><br><br>
    <input type="text" name="jogo" placeholder="Jogo"><br><br>
    <input type="number" name="max" placeholder="Max jogadores"><br><br>

    <button type="submit">Criar</button>
</form>

<a href="?action=ListarParty">Voltar</a>