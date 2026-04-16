
<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="content">

    <h1>Parties</h1>
    
    <br>
    <br>
    
    <div class="container">
        <?php foreach ($parties as $party): ?>
            
            <?php
        $membros = count($party['membros']);
        $max = $party['max'];
        
        if ($membros >= $max) {
            $classe = 'blob-red';
            } elseif ($max - $membros == 1) {
                $classe = 'blob-yellow';
                } else {
                    $classe = 'blob-green';
                    }
                    ?>

<div class="card ">
    <div class="bg">
        
        <h2 class="party-titulo"><?= $party['nome'] ?></h2>
        
        <p class="party-jogo">
            Jogo: <?= $party['jogo'] ?>
        </p>
        <p class="party-jogadores">Jogadores: <?= count($party['membros']) ?> / <?= $party['max'] ?></p>
        
        
        
        <div class="party-lista">
            
            <?php if (empty($party['membros'])): ?>
                <span>Ninguém na party</span>
                
                <?php else: ?>
                    <?php foreach ($party['membros'] as $membro): ?>
                        
                        <span class="<?= $membro === $party['criador'] ? 'owner' : '' ?>">
                            <a href="?action=perfil&user=<?= $membro ?>">
                                <?= $membro ?>
                                <?= $membro === $party['criador'] ? '(dono)' : '' ?>
                            </a>
                        </span>
                        
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    
                    
                    
                    <?php if (in_array($_SESSION['user'], $party['membros'])): ?>    
                        <div class="party-status">Você está nesta party</div>
                        <?php endif; ?>
                        
                        
                        
                        <?php 
                            $estaNaParty = in_array($_SESSION['user'], $party['membros']);
                            $estaCheia = count($party['membros']) >= $party['max'];
                            ?>

                            <div class="party-actions">

                                <?php if (!$estaNaParty && !$estaCheia): ?>    
                                    <a href="?action=entrarParty&id=<?= $party['id'] ?>" class="btn-entrar">
                                        Entrar
                                    </a>

                                <?php elseif ($estaNaParty): ?>
                                    <a href="?action=sairParty&id=<?= $party['id'] ?>" class="btn-sair">
                                        Sair
                                    </a>

                                <?php else: ?>
                                    <span class="btn-cheia">Lotada</span>
                                <?php endif; ?>
                                                                
                                    
                                    
                                    
                                   <?php if ($party['criador'] === $_SESSION['user']): ?>

<a href="?action=editarParty&id=<?= $party['id'] ?>" class="btn-editar">
    Editar
</a>

    <a href="?action=excluirParty&id=<?= $party['id'] ?>"
       class="btn-excluir"
       onclick="return confirm('Tem certeza que deseja excluir essa party?')">
        Excluir
    </a>

<?php endif; ?>
                                </div>
                            </div>
                            <div class="<?= $classe ?>">    
                                </div>
                            </div>
                            
                            <?php endforeach; ?>
                        </div>
                        <button class="button"> <a href="?action=criarParty">Criar nova party </a></button>
</div>
                        
<?php require __DIR__ . '/../layout/footer.php'; ?>