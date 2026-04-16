<h2>Perfil</h2>

<p>Username: <?= $username ?></p>

<hr>

<?php if ($minhaParty): ?>

    <h3>Sua Party</h3>

    <p>Nome: <?= $minhaParty['nome'] ?></p>
    <p>Jogo: <?= $minhaParty['jogo'] ?></p>
    <p>Membros: <?= count($minhaParty['membros']) ?>/<?= $minhaParty['max'] ?></p>

    <?php if ($minhaParty['criador'] === $username): ?>
        <p>Você é o dono</p>
    <?php endif; ?>

<?php else: ?>

    <p>Você não está em nenhuma party.</p>

<?php endif; ?>

<hr>

<p>Parties criadas: <?= $partiesCriadas ?></p>

<br>

<a href="?action=listarParty">Ver parties</a>