<header>
    <div class="navbar">

    <div class="navbar-logo">
    UTFGR | <?= isset($_SESSION['user']) ? $_SESSION['user'] : "" ?>
</div>

    <div class="navbar-links">
        <a href="?action=home">Home</a>
        <a href="?action=perfil&user=<?= isset($_SESSION['user']) ? $_SESSION['user'] : "" ?>"> Perfil</a>
        <a href="?action=listarParty">Parties</a>
        <a href="?action=logout" class="logout">Logout</a>
    </div>

</div>
</header>