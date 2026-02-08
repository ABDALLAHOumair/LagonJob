<?php
session_start();
require_once(__DIR__. "/connexionBDD.php")
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
            <h1>Inscription</h1>
            <form action="submit_inscription.php" method="get" class="form auth-card">
                <div class="stack">
                    <div class="row">
                        <div>
                            <label for="prenom">Prénom</label>
                            <input type="textarea" id="prenom" name="prenom">
                        </div>
                        <div> 
                            <label for="nom">Nom</label>
                            <input type="textarea" id="nom" name="nom">
                        </div>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="textarea" id="email" name="email">
                    </div>
                    
                    <div class="row">
                        <div>
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div> 
                            <label for="confirmer">Confirmer</label>
                            <input type="textarea" id="confirmer" name="confirmer">
                        </div>
                    </div>
                    <?php 
                    if (isset($_SESSION['Error_message_mdp'])){
                        echo $_SESSION['Error_message_mdp'];
                        unset($_SESSION['Error_message_mdp']);
                    }
                    if (isset($_SESSION['Error_message_inscription'])){
                        echo $_SESSION['Error_message_inscription'];
                        unset($_SESSION['Error_message_inscription']);
                    }  
                    if (isset($_SESSION['Error_message_email'])){
                        echo $_SESSION['Error_message_email'];
                        unset($_SESSION['Error_message_email']);
                    }  
                    ?>
                    <div>
                        <button class="btn btn-outline">Créer mon compte</button>
                        <button type="button" class="btn btn-outline" onclick="window.location.href='connexion.php'">Déjà inscrit?</button>
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