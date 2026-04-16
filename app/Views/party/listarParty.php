<h1>Parties</h1>

<a href="?action=criarParty">Criar nova party</a>
<br><br>

<?php foreach ($parties as $party): ?>

    <div style="border:1px solid black; margin-bottom:10px; padding:10px;">
        
        <strong><?= $party['nome'] ?></strong><br>
       
        Jogo: <?= $party['jogo'] ?><br>
        Jogadores: <?= count($party['membros']) ?> / <?= $party['max'] ?><br>
        <a href="?action=entrarParty&id=<?= $party['id'] ?>">Entrar</a>
        <a href="?action=sairParty">Sair</a>
         <?php
            if (in_array($_SESSION['user'], $party['membros'])) {
                echo "Você está nesta party";
            }
        ?>
    </div>

<?php endforeach; ?>