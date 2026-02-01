<?php
require_once(__DIR__. "/../Frontoffice/connexionBDD.php");
require_once(__DIR__. "/../Frontoffice/fonctions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../Frontoffice/style.css">
</head>
<body>
    <header class="site-header header-inner">
    <h1><a href="index.php">Lagonjob</a></h1>
    <nav class="nav">
        <a href="index.php">Accuiel</a>
        <a href="utilisateur.php">Utilisateurs</a>
        <a href="offre.php">Offres</a>
        <a href="contact.php">Contact</a>
    </nav>
    </header>
    <main class="container">
        <h1>Ajout d'offre </h1>
        <form class="form" action="submit_ajout.php" method="post">

            <div class="stack">

                <div class="row">
                    <div>
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" required>
                    </div>
                    <div>
                        <label for="duree">Durée</label>
                        <input type="text" id="duree" name="duree" required>
                    </div>
                    <div>
                        <label for="statut">Statut</label>
                        <select name="statut" class="card">
                           <?php for ($i=0; $i < count($listestatut) ; $i++) {?> 
                                <option value="<?php echo $listestatut[$i]['Id']?>">
                                    <?php echo $listestatut[$i]['Statut']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="type">Type de travail</label>
                        <select name="type" class="card">
                           <?php for ($i=0; $i < count($listeContrat) ; $i++) {?> 
                                <option value="<?php echo $listeContrat[$i]['Id']?>">
                                    <?php echo $listeContrat[$i]['Nom_type_contrat']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="mode">Mode de travail</label>
                        <select name="mode" class="card">
                           <?php for ($i=0; $i < count($listeModeTravail) ; $i++) {?> 
                                <option value="<?php echo $listeModeTravail[$i]['Id']?>">
                                    <?php echo $listeModeTravail[$i]['Nom_mode_travail']?>
                                </option>
                            <?php } ?> 
                        </select>
                    </div>

                    <div>
                        <label for="ville">Ville</label>
                        <select name="ville" class="card">
                           <?php for ($i=0; $i < count($listeVille) ; $i++) {?> 
                                <option value="<?php echo $listeVille[$i]['Id']?>">
                                    <?php echo $listeVille[$i]['Nom_ville']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required></textarea>
                </div>

                <div>
                    <label for="mission">Mission</label>
                    <textarea id="mission" name="mission" required></textarea>
                </div>

                <div>
                    <label for="profile">Profile</label>
                    <textarea id="profile" name="profile" required></textarea>
                </div>
                
                <div class="">
                    <button class="btn" type="submit">Ajouter</button>
                    <button type="button" class="btn btn-outline" onclick="window.location.href='offre.php'">Retour</button>
                </div>
            </div>
        </form>
    </main>
</body>
<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div>
                <strong>LagonJobs</strong> © 2024 - Plateforme d'emploi à Mayotte
            </div>
            <div>
                <a href="contact.php">Contact</a> | 
                <a href="#">Mentions légales</a>
            </div>
        </div>
    </div>
</footer>
</html>