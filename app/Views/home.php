<?php require __DIR__ . '/../Views/layout/header.php'; ?>

<!-- 
<h1>Bem-vindo</h1>

<p>Você está logado como: <?= $_SESSION['user'] ?></p>
<a href="?action=perfil">Meu Perfil</a>
<a href="?action=listarParty">Ver parties ativas</a>

<a href="?action=logout">Sair</a> -->


<div class="home">

    <div class="home-drop">
        <h1 style="color: #334155">Bem-vindo, <?= $_SESSION['user'] ?? 'Jogador' ?> </h1>
        <p>Crie ou entre em parties para jogar com outras pessoas.</p>

        <!-- <div class="home-actions">
            <a href="?action=criarParty" class="home-btn primary">Criar Party</a>
            <a href="?action=listarParty" class="home-btn secondary">Ver Parties</a>
        </div> -->
    </div>

    <div class="home-cards">

        <div class="home-card">
            <h3>Criar Party</h3>
            <p>Monte seu grupo e convide jogadores.</p>
            <a href="?action=criarParty">Criar agora</a>
        </div>

        <div class="home-card">
            <h3> Encontrar Party</h3>
            <p>Veja parties disponíveis e entre em uma.</p>
            <a href="?action=listarParty">Explorar</a>
        </div>

        <div class="home-card">
            <h3> Perfil</h3>
            <p>Veja suas informações e atividades.</p>
            <a href="?action=perfil&user=<?= $_SESSION['user'] ?? '' ?>">Ver perfil</a>
        </div>

    </div>

</div>



<?php require __DIR__ . '/../Views/layout/footer.php'; ?>