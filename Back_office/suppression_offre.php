<?php
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord-Suppression</title>
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
        <h1>Suppression d'offre</h1>
        <div class="meta" style="margin-bottom: 20px;">
            <button class="btn-retour" onclick="history.back()">
                <span class="fleche"></span>
                Retour
            </button>  
        </div>
        <form class="form" action="submit_suppression_offre.php" method="post">
            <div class="stack">
                <div class="row">
                    <div>
                        <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" 
                            value="<?php foreach ($listeOffre as $offre) {
                                if ($offre['Id'] == $_POST['id_offre']) {
                                    echo $offre['Titre']; 
                                }
                            } ?>" disabled>
                    </div>

                    <div>
                        <label for="duree">Durée</label>
                            <input type="text" id="duree" name="duree" 
                            value="<?php foreach ($listeOffre as $offre) {
                                if ($offre['Id'] == $_POST['id_offre']) {
                                    echo $offre['Duree']; 
                                }
                            } ?>" disabled>
                    </div>


                    <div>
                        <label for="statut">Statut</label>
                        <select name="statut" class="card" disabled>
                           <?php for ($i=0; $i < count($listestatut) ; $i++) {?> 
                                <option value="<?php echo $listestatut[$i]['Id']?>" 
                                <?php if ($listestatut[$i]['Statut']==$_POST['statut']){?>selected<?php }?>>
                                    <?php echo $listestatut[$i]['Statut']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="type">Type de travail</label>
                        <select name="type" class="card" disabled>
                           <?php for ($i=0; $i < count($listeContrat) ; $i++) {?> 
                                <option value="<?php echo $listeContrat[$i]['Id']?>"
                                <?php if ($listeContrat[$i]['Nom_type_contrat']==$_POST['type_travail']){?>selected<?php }?>>
                                    <?php echo $listeContrat[$i]['Nom_type_contrat']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="mode">Mode de travail</label>
                        <select name="mode" class="card" disabled>
                           <?php for ($i=0; $i < count($listeModeTravail) ; $i++) {?> 
                                <option value=<?php echo $listeModeTravail[$i]['Id']?>
                                    <?php if ($listeModeTravail[$i]['Nom_mode_travail']==$_POST['mode_travail']){?>selected<?php }?>>
                                    <?php echo $listeModeTravail[$i]['Nom_mode_travail']?>
                                </option>
                            <?php } ?> 
                        </select>
                    </div>

                    <div>
                        <label for="ville">Ville</label>
                        <select name="ville" class="card" disabled>
                           <?php for ($i=0; $i < count($listeVille) ; $i++) {?> 
                                <option value="<?php echo $listeVille[$i]['Id']?>"
                                <?php if ($listeVille[$i]['Nom_ville']==$_POST['ville']){?>selected<?php }?>>
                                    <?php echo $listeVille[$i]['Nom_ville']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" disabled
                        ><?php foreach ($listeOffre as $offre) {
                            if ($offre['Id'] == $_POST['id_offre']) {
                                echo $offre['Description']; 
                            }
                        } ?></textarea>
                </div>
                <div>
                    <label for="mission">Mission</label>
                    <textarea id="mission" name="mission" disabled
                        ><?php foreach ($listeOffre as $offre) {
                            if ($offre['Id'] == $_POST['id_offre']) {
                                echo $offre['Mission']; 
                            }
                        } ?></textarea>
                </div>
                <div>
                    <label for="profile">Profile</label>
                    <textarea id="profile" name="profile" disabled
                        ><?php foreach ($listeOffre as $offre) {
                            if ($offre['Id'] == $_POST['id_offre']) {
                                echo $offre['Profile']; 
                            }
                        } ?></textarea>
                </div>
                <input type="hidden" name="id_offre" value="<?php echo $_POST['id_offre']?>">
                <div class="actions">
                    <button class="btn" type="submit">Supprimer</button>
                </div>
            </div>

        </form>
    </main>
</body>
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
</html>