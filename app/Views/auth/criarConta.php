<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="content">

    
    
    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red;">
            <?= $_SESSION['error'] ?>
        </p>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        
        <form class="form-style" method="POST" action="?action=efetuarRegistro">
    <h1 style="align-self: center">Cadastro</h1>
    <div class="input-container">
        
        <input class="input-field" type="text" name="username" placeholder="username">
        <label for="username" class="input-label">Username</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="email" name="email" placeholder="Email">
        <label for="email" class="input-label">Email</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="password" name="senha" placeholder="Senha">
        <label for="password" class="input-label">Senha</label>
        <span class="input-highlight"></span>
        <input class="input-field" type="password" name="confirmarSenha" placeholder="Confirmar Senha">
        <label for="confirmarSenha" class="input-label">Confirmar senha</label>
        <span class="input-highlight"></span>
    </div>
    <br>
    <button class="button" type="submit">Criar</button>
    <a style="align-self: center" href="?action=login">Já tenho conta</a>
</form>
<!-- <form method="POST" action="?action=efetuarRegistro">
    <input type="text" name="username" placeholder="username"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="senha" placeholder="Senha"><br><br>
    <input type="password" name="confirmarSenha" placeholder="Confirmar Senha"><br><br>
    
    <button type="submit">Cadastrar</button>
</form> -->

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>