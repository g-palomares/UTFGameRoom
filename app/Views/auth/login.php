<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="content">

    <div style="flex-direction: column" class="container">

        
        
        
        <form class="form-style" method="POST" action="?action=efetuarLogin">
            <h1>Login</h1>
            <div class="input-container">

                <input class="input-field" type="email" name="email" placeholder="Email"><br><br>
                <input class="input-field" type="password" name="senha" placeholder="Senha"><br><br>
            </div>
            <button class="button" type="submit">Entrar</button>
            <br>
            <br>
            <a style="align-self: center" href="?action=criarConta">Ainda não tenho uma conta</a>
        </form>
        
        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color:red;">
                <?= $_SESSION['error'] ?>
            </p>
            <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <?php if (!empty($_SESSION['success'])): ?>
                <p style="color:green;">
                    <?= $_SESSION['success'] ?>
                </p>
                <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                
            </div>
            </div>
<?php require __DIR__ . '/../layout/footer.php'; ?>