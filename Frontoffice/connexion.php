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
            <h1>Connexion</h1>
            <form class="form auth-card">
                <div class="stack">
                    <div>
                        <label for="email">Email</label>
                        <input type="textarea">
                    </div>
                  
                    <div>
                        <label for="mdp">Mot de passe</label>
                        <input type="textarea">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-outline"><a href="home.php">Se connecter</a></button>
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