<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>

<h1>Cadastro</h1>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;">
        <?= $_SESSION['error'] ?>
    </p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="POST" action="?action=efetuarRegistro">
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="senha" placeholder="Senha"><br><br>
    <input type="password" name="confirmarSenha" placeholder="Confirmar Senha"><br><br>

    <button type="submit">Cadastrar</button>
</form>

<a href="?action=login">Já tenho conta</a>

</body>
</html>