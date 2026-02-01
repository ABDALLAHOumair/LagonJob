<?php
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');
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
    <main class="hero">
        <div class="container">
            <div class="">
                <form class="form" action="offre.php" method="post">
                    <h1>Gestion des emplois</h1>
                        <div class="filter-bar">
                            <div>
                                <label for="ajouter">+Ajouter</label>
                                <input name="ajouter">
                            </div>
                            <div>
                                <label for="status">Statuts</label>
                                <select name="status">
                                    <option value="">Statut</option>
                                    <option value="publiée">publiée</option>
                                    <option value="non publiée">non publiée</option>
                                </select>
                            </div>
                            <div>
                                <label for="categorie">Catégorie</label>
                                <select name="categorie">
                                    <option value="">Ville</option>
                                    <option value="Mamoudzou">Mamoudzou</option>
                                    <option value="Dzaoudzi">Dzaoudzi</option>
                                    <option value="Koungou">Koungou</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn">Filtrer</button>
                            <button type="button" class="btn btn-outline" onclick="window.location.href='offres.php'">Réinitialiser</button>
                        </div>
                </form>
            </div>
            <div>
                <table class="table-offres">
                    <tr class=""> 
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Catégorie</th>
                        <th>actions</th>
                    </tr>
                
                        <?php for ($i=0; $i < count($listeOffre) ; $i++) { ?>
                            <tr>
                                <td>
                                    <?php echo $listeOffre[$i]['Titre'] ?>
                                </td>
                                <td>
                                <?php echo $listeOffre[$i]['Statut'] ?>
                                </td>
                                <td>
                                    <?php echo $listeOffre[$i]['Nom_type_contrat'] ?>
                                </td>
                                <td>
                                    <form action="modification_offre.php" method="post">
                                        <input type="hidden" name="id_offre" value="<?php echo $listeOffre[$i]['Id']?>">
                                        <input type="hidden" name="statut" value="<?php echo $listeOffre[$i]['Statut']?>">
                                        <input type="hidden" name="type_travail" value="<?php echo $listeOffre[$i]['Nom_type_contrat']?>">
                                        <input type="hidden" name="mode_travail" value="<?php echo $listeOffre[$i]['Nom_mode_travail']?>">
                                        <input type="hidden" name="ville" value="<?php echo $listeOffre[$i]['Nom_ville']?>">
                                        <input type="hidden" name="description" value="<?php echo $listeOffre[$i]['Description']?>">
                                        <button type="submit" class="btn">Modifier</button>
                                    </form> 
                                    <form action="suppression_offre.php" method="post">
                                        <input type="hidden" name="id_offre" value="<?php echo $listeOffre[$i]['Id']?>">
                                        <input type="hidden" name="statut" value="<?php echo $listeOffre[$i]['Statut']?>">
                                        <input type="hidden" name="type_travail" value="<?php echo $listeOffre[$i]['Nom_type_contrat']?>">
                                        <input type="hidden" name="mode_travail" value="<?php echo $listeOffre[$i]['Nom_mode_travail']?>">
                                        <input type="hidden" name="ville" value="<?php echo $listeOffre[$i]['Nom_ville']?>">
                                        <input type="hidden" name="description" value="<?php echo $listeOffre[$i]['Description']?>">
                                        <button type="submit" class="btn">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    
                </table>
            </div>
        </div>
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