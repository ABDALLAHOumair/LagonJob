<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagonjob</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require(__DIR__.'/header.php')?>
    <main class="hero">
        <div class="center">
            <h1>Connexion</h1>
            <form action="submit_connexion.php" method="get" class="form auth-card">
                <div class="stack">
                    <div>
                        <label for="email">Email</label>
                        <input type="textarea" id="email" name="email">
                    </div>
                  
                    <div>
                        <label for="password">Mot de passe</label>
                        <input type="textarea" id="password" name="password">
                    </div>
                    <?php 
                    if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])){
                        echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                        unset($_SESSION['LOGIN_ERROR_MESSAGE']);
                    } 
                    ?>
                    <div>
                        <button type="submit" class="btn btn-outline">Se connecter</button>
                        <button type="submit" class="btn btn-outline"><a href="inscription.php">Créer un compte</a></button>
                    </div>

                    <div>
                        <a href="">Mot de passe oublié?</a>
                    </div>
                </div>
            </form>
        
        </div>
    </main>
</body>
<footer class="site-footer footer-inner">
    <div>
        <p>© 2025 LagonJob - Tous droits réservés</p>
    </div>
    <nav class="nav">
        <div> 
            <a>Conditions</a>
            <a href="contact.php">Nous contacter</a>
        </div>
    </nav>
</footer>
</html>