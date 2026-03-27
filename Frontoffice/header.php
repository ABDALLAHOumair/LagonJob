<header class="site-header header-inner">
    <a class="logo" href="index.php"><img src="../Logo/logo.png" alt="logo_lagonjob"></a>
    <nav class="nav">
        <a href="index.php">Accuiel</a>
        <a href="offres.php">Offres</a>
        <a href="contact.php">Contact</a>
        <?php if (!isset($_SESSION['LOGGED_USER'])) { ?>
            <button class="btn btn-outline" onclick="window.location.href='connexion.php'">Connexion</button>
            <button class="btn btn-outline" onclick="window.location.href='inscription.php'">inscription</button>
        <?php } else{ ?>
            <button class="btn btn-outline" onclick="window.location.href='deconnexion.php'">Deconnexion</button>
        <?php } ?>
    </nav>
</header>