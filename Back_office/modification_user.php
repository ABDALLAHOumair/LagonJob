<?php
session_start();
if (!$_SESSION['LOGGED_ADMIN']) {
    header("Location: ../Frontoffice/connexion.php");
exit;
}
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Utilisateur</title>
    <link rel="stylesheet" href="../Frontoffice/style.css">
</head>
<body>
    <header class="site-header header-inner">
        <a class="logo" href="index.php"><img src="../Logo/logo.png" alt="logo_lagonjob"></a>
        <nav class="nav">
            <a href="index.php">Accuiel</a>
            <a href="utilisateur.php">Utilisateurs</a>
            <a href="user.php">Offres</a>
            <a href="contact.php">Contact</a>
            <button class="btn btn-outline" onclick="window.location.href='deconnexionBE.php'">Deconnexion</button>
        </nav>
    </header>
    <main class="container">
        <h1>Modification d'utilisateur</h1>
        <div class="meta" style="margin-bottom: 20px;">
            <button class="btn-retour" onclick="history.back()">
                <span class="fleche"></span>
                Retour
            </button>   
        </div>
        <form class="form" action="submit_modification_user.php" method="post">
            <div class="stack">
                <div class="row">
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" 
                        value="<?php foreach ($listeUser as $user) {
                            if ($user['Id'] == $_POST['id_user']) {
                                echo $user['Nom']; 
                            }
                        } ?>">
                    </div>

                    <div>
                        <label for="prenom">Prenom</label>
                            <input type="text" id="prenom" name="prenom" 
                            value="<?php foreach ($listeUser as $user) {
                                if ($user['Id'] == $_POST['id_user']) {
                                    echo $user['Prenom']; 
                                }
                            } ?>">
                    </div>

                    <div>
                        <label for="email">Email</label>
                            <input type="email" id="email" name="email" 
                            value="<?php foreach ($listeUser as $user) {
                                if ($user['Id'] == $_POST['id_user']) {
                                    echo $user['Email']; 
                                }
                            } ?>">
                    </div>
                    <div>
                        <label for="role">Rôle</label>
                        <select name="role" class="card">
                           <?php for ($i=0; $i < count($listerole) ; $i++) {?> 
                                <option value="<?php echo $listerole[$i]['Id']?>" 
                                <?php if ($listerole[$i]['Role']==$_POST['role']){?>selected<?php }?>>
                                    <?php echo $listerole[$i]['Role']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="">
                    <input type="hidden" name="id_user" value="<?php echo $_POST['id_user']?>">
                    <button class="btn" type="submit">Modifier</button>
                </div>
            </div>

        </form>
    </main>
    <footer class="site-footer">
        <div class="container footer-inner">
            <div>
            © 2025 LagonJobs - Tous droits réservés
            </div>
            <div>
            <a href="">Confidentialité</a> &nbsp; | &nbsp;
            <a href="contact.php">Nous contacter</a>
            </div>
        </div>
    </footer>
</body>
</html>