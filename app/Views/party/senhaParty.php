<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="content">
    <div style="flex-direction: column" class="container">

        
        <h2 style="align-self: center"> Party protegida </h2>
        
        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color:red;"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <form class="form-style" method="POST" action="?action=entrarParty&id=<?= $id ?>">
                <div class="input-container">
                    
                    <input class="input-field" type="password" name="senha" placeholder="Digite a senha" required>
                </div>
                <button class="button" type="submit">Entrar</button>
                <a style="align-self: center" href="?action=listarParty">Voltar ao lobby de parties</a>
            </form>
        </div>
    </div>

<?php require __DIR__ . '/../layout/footer.php'; ?>