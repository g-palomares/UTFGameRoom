
<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="content">

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

<form class="form-style" method="POST" action="?action=armazenarParty">
    <div class="input-container">
        
        <input class="input-field" type="text" name="nome" placeholder="Nome da party">
        <label for="nome" class="input-label">Nome</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="text" name="jogo" placeholder="Jogo">
        <label for="jogo" class="input-label">Jogo</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="number" name="max" placeholder="Max jogadores">
        <label for="max" class="input-label">Max jogadores</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="password" name="senha" placeholder="Senha (opcional)">
        <label for="senha" class="input-label">Senha</label>
        <span class="input-highlight"></span>
    </div>
    <br>
    <button class="button" type="submit">Criar</button>
</form>


</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>