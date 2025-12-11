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
    <main class="hero center">
        <div>
            <h1>Inscription</h1>
            <form class="form auth-card">
                <div class="stack">
                    <div class="row">
                        <div>
                            <label for="prenom">Prénom</label>
                            <input type="textarea">
                        </div>
                        <div> 
                            <label for="nom">Nom</label>
                            <input type="text" class="textarea">
                        </div>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="textarea">
                    </div>
                    
                    <div class="row">
                        <div>
                            <label for="mdp">Mot de passe</label>
                            <input type="textarea">
                        </div>
                        <div> 
                            <label for="confirmer">Confirmer</label>
                            <input type="text" class="textarea">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline"><a href="">Créer mon compte</a></button>
                        <button type="submit" class="btn btn-outline"><a href="connexion.php">Déjà inscrit?</a></button>
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