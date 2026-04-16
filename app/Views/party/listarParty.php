<h1>Parties</h1>

<a href="?action=criarParty">Criar nova party</a>
<br><br>

<?php foreach ($parties as $party): ?>

    <div style="border:1px solid black; margin-bottom:10px; padding:10px;">
        
        <strong><?= $party['nome'] ?></strong><br>
       
        Jogo: <?= $party['jogo'] ?><br>
        Jogadores: <?= count($party['membros']) ?> / <?= $party['max'] ?><br>
        <strong>Membros:</strong><br>

            <?php if (empty($party['membros'])): ?>
                <p>Ninguém na party</p>
                <?php else: ?>
                <?php foreach ($party['membros'] as $membro): ?>
                    <?php if ($membro === $party['criador']): ?>
                         <?= $membro ?> (dono)<br>
                    <?php else: ?>
                        <?= $membro ?><br>
                    <?php endif; ?>
                <?php endforeach; ?>

            <?php endif; ?>
        <a href="?action=entrarParty&id=<?= $party['id'] ?>">Entrar</a>
        <a href="?action=sairParty">Sair</a>
        <?php if ($party['criador'] === $_SESSION['user']): ?>
            <a href="?action=excluirParty&id=<?= $party['id'] ?>"
                onclick="return confirm('Tem certeza que deseja excluir essa party?')">
                Excluir
                </a>
        <?php endif; ?>
         <?php
            if (in_array($_SESSION['user'], $party['membros'])) {
                echo "Você está nesta party";
            }
        ?>
    </div>

<?php endforeach; ?>