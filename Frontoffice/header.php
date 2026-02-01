<header class="site-header header-inner">
    <h1><a href="index.php">Lagonjob</a></h1>
    <nav class="nav">
        <a href="index.php">Accuiel</a>
        <a href="offres.php">Offres</a>
        <?php if (!isset($_SESSION['LOGGED_USER'])) { ?>
            <button class="btn btn-outline" onclick="window.location.href='connexion.php'">Connexion</button>
            <button class="btn btn-outline" onclick="window.location.href='inscription.php'">inscription</button>
        <?php } else{ ?>
            <button class="btn btn-outline" onclick="window.location.href='deconnexion.php'">Deconnexion</button>
        <?php } ?>
    </nav>
</header>