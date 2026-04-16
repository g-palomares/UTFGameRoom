
<?php require __DIR__ . '/../layout/header.php'; ?>

<?php if ($minhaParty): ?>

    <h3>Sua Party</h3>

    Nome: <?= $minhaParty['nome'] ?><br>
    Jogo: <?= $minhaParty['jogo'] ?><br>
    Jogadores: <?= count($minhaParty['membros']) ?>/<?= $minhaParty['max'] ?><br>

<?php else: ?>

    <p>Você não está em nenhuma party.</p>

<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>