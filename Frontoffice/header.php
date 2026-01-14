<header class="site-header header-inner">
    <h1><a href="index.php">Lagonjob</a></h1>
    <nav class="nav">
        <a href="index.php">Accuiel</a>
        <a href="offres.php">Offres</a>
        <?php if (!isset($_SESSION['LOGGED_USER'])) { ?>
            <button class="btn btn-outline"><a href="connexion.php">Connexion</a></button>
            <button class="btn btn-outline"><a href="inscription.php">inscription</a></button>
        <?php } else{ ?>
            <button class="btn btn-outline"><a href="deconnexion.php">Deconnexion</a></button>
        <?php } ?>
    </nav>
</header>