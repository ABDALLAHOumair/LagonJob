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
        <div class="container">
            <div class="grid cards">
                <div>
                    <h1>Trouvez votre stage ou emploi facilement</h1>
                    <p>Des offres claires et à jour, pour étudiants et jeunes diplômés. Recherchez par mot clé, lieu, type de contrât et télétravail. </p>  
                
                    <form action="" method="" class="form cards .search-inline">
                        <input type="text" class="textarea" placeholder="Mot-clé(ex. PHP, support, réseau)">
                        <select name="Type_de_contrat card">
                            <option>Type de contrat</option>
                        </select>
                        <input type="text" class="textarea" placeholder="Ville (ex. Mamoudzou)">
                        <select name="Type_de_contrat card">
                            <option>
                                Télétravail
                            </option>
                        </select>
                        <button type="submit" class="btn">Rechercher</button>
                    </form>
                </div>
                <div class="card">
                    <h3>Pourquoi Lagonjob? .</h3>
                    <ul>
                        <li>
                            Annonces adaptées aux profils SIO
                        </li>
                        <li>
                            Interface simple et tojule
                        </li>
                        <li>
                            Back-office pour les administrateurs
                        </li>
                    </ul><br>
                    <p>Astuce: Crées un compte pour sauvegarde offiek (Pour plus tard)</p>
                </div>
            </div><br>
            <hr>
            <div class="container">
                <h2>Dernières offres</h2>
                <div class="cards">
                    <div class="card">
                        <h3 class="badge">stage</h3><br>
                        <h2>Stagiaire Developpeur Web</h2><br>
                        <p>Mamoudzou - Hybride</p><br>
                        <p>Participer au développement et é-commerce.</p><br>
                        <button type="submit" class="btn btn-outline">Voir</button>  
                    </div>
                    <div class="card auth-card">
                        <h3 class="badge">CDD</h3><br>
                        <h2>Technicien support</h2><br>
                        <p>Dzaoudzi - Hybride</p><br>
                        <p>Assistance virtuttiese. Induction et maitenance.</p><br>
                        <button type="submit" class="btn btn-outline">Voir</button>      
                    </div>
                    <div class="card">
                        <h3 class="badge">CDI</h3><br>
                        <h2>Admin systeme junior</h2><br>
                        <p>Koungou - Hybride</p><br>
                        <p>Administration Linux/windo-sauvegarde à suivre.</p><br>
                        <button type="submit" class="btn btn-outline">Voir</button>     
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<footer class="site-footer footer-inner">
    <div>
        <p>© 2025 LagonJob - Tous droits réservés</p>
    </div>
    <nav class="nav">
        <div> 
            <a>Confidentialité</a>
            <a>Conditions</a>
            <a href="contact.php">Nous contacter</a>
        </div>
    </nav>
</footer>
</html>