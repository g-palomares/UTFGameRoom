<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<form method="POST" action="?action=efetuarLogin">
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="senha" placeholder="Senha"><br><br>
    <button type="submit">Entrar</button>
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

</body>
</html>