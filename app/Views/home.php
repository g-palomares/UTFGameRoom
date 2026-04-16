<?php require __DIR__ . '/../Views/layout/header.php'; ?>




<div class="home">

    <div class="home-drop">
        <h1 style="color: #334155">Bem-vindo, <?= $_SESSION['user'] ?? 'Jogador' ?> </h1>
        <p>Crie ou entre em parties para jogar com outras pessoas.</p>

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
    <p style="text-align: center; font-size: 24px; color: #000; font-weight: 700; margin-top: 3rem">Total de parties: <?= count($_SESSION['parties'] ?? []) ?></p>
</div>



<?php require __DIR__ . '/../Views/layout/footer.php'; ?>