<?php require __DIR__ . '/../layout/header.php'; ?>


<div class="content">


<h1>Editar Party</h1>

<form class="form-style" method="POST" action="?action=atualizarParty">
    <div class="input-container">
        <input type="hidden" name="id" value="<?= $party['id'] ?>">
        <input class="input-field" type="text" name="nome" placeholder="Nome da party">
        <label for="nome" class="input-label">Nome</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="text" name="jogo" placeholder="Jogo">
        <label for="jogo" class="input-label">Jogo</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="number" name="max" placeholder="Max jogadores">
        <label for="max" class="input-label">Max jogadores</label>
        <span class="input-highlight"></span>
        
    </div>
    <br>
    <button class="button" type="submit">Salvar</button>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>