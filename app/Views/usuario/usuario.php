
<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="content ">
    
    <h2>
        <?= $donoLogado ? 'Seu Perfil' : 'Perfil de ' . $username ?>
    </h2>
    
    <hr>
    
    <?php if ($minhaParty): ?>
        <div style="margin: 3rem" class="container ">
        <div class="card ">
            <div style="justify-content: space-evenly" class="bg">

                <h2 class="party-titulo"><?= $minhaParty['nome'] ?></h2>
                <p class="party-jogo">
            Jogo: <?= $minhaParty['jogo'] ?>
        </p>
                <p class="party-jogadores">Jogadores: <?= count($minhaParty['membros']) ?> / <?= $minhaParty['max'] ?></p>
                
                <div class="party-lista">
                    <?php foreach ($minhaParty['membros'] as $membro): ?>
                        <span class="<?= $membro === $minhaParty['criador'] ? 'owner' : '' ?>">
                            <a href="?action=perfil&user=<?= $membro ?>">
                                <?= $membro ?>
                                <?= $membro === $minhaParty['criador'] ? '(dono)' : '' ?>
                            </a>
                        </span>
                        <?php endforeach; ?>

                        <?php 
                            $estaNaParty = in_array($_SESSION['user'], $minhaParty['membros']);
                            $estaCheia = count($minhaParty['membros']) >= $minhaParty['max'];
                        ?>

                       <div style="justify-content: space-around" class="party-actions">

                        <?php if (!$estaNaParty && !$estaCheia): ?>    
                            <a href="?action=entrarParty&id=<?= $minhaParty['id'] ?>" class="btn-entrar">
                                Entrar
                            </a>

                        <?php elseif ($estaNaParty): ?>
                            <a href="?action=sairParty&id=<?= $minhaParty['id'] ?>" class="btn-sair">
                                Sair
                            </a>

                        <?php else: ?>
                            <span class="btn-cheia">Lotada</span>
                        <?php endif; ?>

                        <?php if ($minhaParty['criador'] === $_SESSION['user']): ?>
                            <a href="?action=editarParty&id=<?= $minhaParty['id'] ?>" class="btn-editar">Editar</a>

                            <a href="?action=excluirParty&id=<?= $minhaParty['id'] ?>"
                            class="btn-excluir"
                            onclick="return confirm('Tem certeza que deseja excluir essa party?')">
                            Excluir
                            </a>

                            <p>Parties criadas: <?= $partiesCriadas ?></p>
                        <?php endif; ?>


                                </div>
                            </div>
                            <div class="<?= $classe ?>">    
                                </div>
                            </div>
                            
                         
                        </div>
                    </div>

                        </div>
                    
                            
                            <?php else: ?>
                                
                                <p style="margin-top: 2.5rem; font-weight: 700">Você não está em nenhuma party.</p>
                                
                                <?php endif; ?>
                                
                                <?php if (
                                    !$donoLogado &&
                                    $minhaParty &&
                                    !in_array($_SESSION['user'], $minhaParty['membros']) &&
                                    count($minhaParty['membros']) >= $minhaParty['max']
                                    ): ?>



        </div>
    </div>
</div>
<?php endif; ?>




</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>