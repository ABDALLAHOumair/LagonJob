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
                <form class="form" action="index.php" method="post">
                    <h1>Gestion des emplois</h1>
                    <div class="filter-bar">
                        <div>
                            <label for="statut">Statut</label>
                            <select name="statut">
                                <option value="">Tous les statuts</option>
                                <option value="1" <?php if(isset($_POST['statut']) && $_POST['statut']=='1') echo 'selected'; ?>>Non publiée</option>
                                <option value="2" <?php if(isset($_POST['statut']) && $_POST['statut']=='2') echo 'selected'; ?>>Publiée</option>
                            </select>
                        </div>
                        <div>
                            <label for="type">Type de contrat</label>
                            <select name="type">
                                <option value="">Tous les types</option>
                                <option value="1" <?php if(isset($_POST['type']) && $_POST['type']=='1') echo 'selected'; ?>>CDD</option>
                                <option value="2" <?php if(isset($_POST['type']) && $_POST['type']=='2') echo 'selected'; ?>>CDI</option>
                                <option value="3" <?php if(isset($_POST['type']) && $_POST['type']=='3') echo 'selected'; ?>>Stage</option>
                                <option value="4" <?php if(isset($_POST['type']) && $_POST['type']=='4') echo 'selected'; ?>>Alternance</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn">Filtrer</button>
                        <button type="button" class="btn btn-outline" onclick="window.location.href='index.php'">Réinitialiser</button>
                        <button type="button" class="btn" onclick="window.location.href='ajouter_offre.php'">+ Ajouter</button>
                    </div>
                </form>
            </div>

            <?php
            // ========================================
            // FILTRAGE DES OFFRES
            // ========================================
            
            // On commence avec toutes les offres
            $offres_filtrees = $listeOffre;

            // Filtre par statut
            // Si l'utilisateur a choisi un statut dans le formulaire
            if (!empty($_POST['statut'])) {
                // On récupère l'ID du statut choisi
                $statut_id = $_POST['statut'];
                
                // On garde seulement les offres qui ont ce statut
                // array_filter() parcourt le tableau et garde uniquement les éléments qui respectent la condition
                $offres_filtrees = array_filter($offres_filtrees, function($offre) use ($statut_id) {
                    // On compare l'ID du statut de l'offre avec celui choisi
                    return $offre['Id_statut'] == $statut_id;
                });
            }

            // Filtre par type de contrat
            // Si l'utilisateur a choisi un type dans le formulaire
            if (!empty($_POST['type'])) {
                // On récupère l'ID du type choisi
                $type_id = $_POST['type'];
                
                // On garde seulement les offres qui ont ce type
                $offres_filtrees = array_filter($offres_filtrees, function($offre) use ($type_id) {
                    // On compare l'ID du type de l'offre avec celui choisi
                    return $offre['Id_type_contrat'] == $type_id;
                });
            }
            ?>

            <div>
                <table class="table-offres">
                    <tr class=""> 
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Type de contrat</th>
                        <th>Ville</th>
                        <th>Actions</th>
                    </tr>
                
                    <?php foreach ($offres_filtrees as $offre): ?>
                        <tr>
                            <td><?php echo $offre['Titre'] ?></td>
                            <td><?php echo $offre['Statut'] ?></td>
                            <td><?php echo $offre['Nom_type_contrat'] ?></td>
                            <td><?php echo $offre['Nom_ville'] ?></td>
                            <td>
                                <!-- Bouton Voir -->
                                <form action="detailoffreBE.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $offre['Id']?>">
                                    <button type="submit" class="btn">Voir</button>
                                </form>

                                <!-- Bouton Modifier -->
                                <form action="modification_offre.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_offre" value="<?php echo $offre['Id']?>">
                                    <input type="hidden" name="statut" value="<?php echo $offre['Statut']?>">
                                    <input type="hidden" name="type_travail" value="<?php echo $offre['Nom_type_contrat']?>">
                                    <input type="hidden" name="mode_travail" value="<?php echo $offre['Nom_mode_travail']?>">
                                    <input type="hidden" name="ville" value="<?php echo $offre['Nom_ville']?>">
                                    <input type="hidden" name="description" value="<?php echo $offre['Description']?>">
                                    <button type="submit" class="btn">Modifier</button>
                                </form> 

                                <!-- Bouton Supprimer -->
                                <form action="suppression_offre.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_offre" value="<?php echo $offre['Id']?>">
                                    <input type="hidden" name="statut" value="<?php echo $offre['Statut']?>">
                                    <input type="hidden" name="type_travail" value="<?php echo $offre['Nom_type_contrat']?>">
                                    <input type="hidden" name="mode_travail" value="<?php echo $offre['Nom_mode_travail']?>">
                                    <input type="hidden" name="ville" value="<?php echo $offre['Nom_ville']?>">
                                    <input type="hidden" name="description" value="<?php echo $offre['Description']?>">
                                    <button type="submit" class="btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    
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