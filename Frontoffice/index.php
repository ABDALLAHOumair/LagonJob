<?php
session_start();
require_once(__DIR__ . '/fonctions.php');
require_once(__DIR__ . '/connexionBDD.php');
$selectOffre='SELECT of.Id, of.Titre, of.Description, tc.Nom_type_contrat, mt.Nom_mode_travail, of.Id_type_contrat, of.Id_statut,vl.Nom_ville, st.Statut, of.Mission, of.Profile, of.Duree FROM offres of
JOIN types_contrats tc ON of.Id_type_contrat = tc.Id
JOIN modes_travails mt ON of.Id_mode_travail = mt.Id
JOIN statuts st ON of.Id_statut = st.Id
JOIN villes vl ON of.Id_ville = vl.Id
WHERE of.Id_statut=2
ORDER BY of.Id desc';
$selection_Offre=$mysqlClient->prepare($selectOffre);
$selection_Offre->execute();
$listeOffre_FO=$selection_Offre->fetchAll();
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
        <div class="container">
            <div class="grid cards">
                <div>
                    <h1>Trouvez votre stage ou emploi facilement</h1>
                    <p>Des offres claires et à jour, pour étudiants et jeunes diplômés. Recherchez par mot clé, lieu, type de contrât et type de travail. </p>  
                    <form action="offres.php" method="post" class="form cards .search-inline ">
                        <input type="text" name="mots_cles" placeholder="Mot-clé(ex. PHP, support, réseau)">
                        <select name="type" class="card">
                            <option value="">type de contrat</option>
                            <?php foreach ($listeContrat as $type) {?> 
                                <option value="<?php echo $type['Id']?>">
                                    <?php echo $type['Nom_type_contrat']?>
                                </option>
                            <?php } ?>
                        </select>
                        <select name="ville" class="card">
                            <option value="">ville</option>
                            <?php foreach ($listeVille as $ville) {?> 
                                <option value="<?php echo $ville['Id']?>">
                                    <?php echo $ville['Nom_ville']?>
                                </option>
                            <?php } ?>
                        </select>
                        <select name="mode" class="card">
                            <option value="">type de travail</option>
                            <?php foreach ($listeModeTravail as $mode) {?> 
                                <option value="<?php echo $mode['Id']?>">
                                    <?php echo $mode['Nom_mode_travail']?>
                                </option>
                            <?php } ?> 
                        </select>
                        <button type="submit" class="btn">Rechercher</button>
                        <button type="button" class="btn btn-outline" onclick="window.location.href='index.php'">Réinitialiser</button>
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
                    <?php for ($i=0; $i <4 ; $i++) { ?> 
                        <div class="">
                            <article class="card">
                                <span class="badge"><?php echo $listeOffre_FO[$i]['Nom_type_contrat']?></span><br>
                                <h2><?php echo $listeOffre_FO[$i]['Titre'] ?></h2><br>
                                <p><?php echo $listeOffre_FO[$i]['Nom_ville'].' - '. $listeOffre[$i]['Nom_mode_travail'] ?></p><br>
                                <p><?php echo $listeOffre_FO[$i]['Description'] ?></p><br>
                                <form action="detailoffre.php" method="post">
                                    <input type="hidden" name="id_offre" value="<?php echo $listeOffre_FO[$i]['Id']?>">
                                    <button type="submit" class="btn">voir</button>
                                </form> 
                            </article>
                        </div>
                    <?php } ?>
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
    </div>
</footer>
</html>