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
                <form class="form" action="utilisateur.php" method="post">
                    <h1>Gestion des utilisateurs</h1>
                    <div class="filter-bar">
                        <div>
                            <label for="nom">Nom</label>
                            <input name="nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>">
                        </div>
                        <div>
                            <label for="prenom">Prénom</label>
                            <input name="prenom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn">Filtrer</button>
                        <button type="button" class="btn btn-outline" onclick="window.location.href='utilisateur.php'">Réinitialiser</button>
                    </div>
                </form>
            </div>

            <?php
            // ========================================
            // FILTRAGE DES UTILISATEURS
            // ========================================
            
            // On commence avec tous les utilisateurs
            $users_filtres = $listeUser;

            // Filtre par nom
            // Si l'utilisateur a tapé un nom dans le formulaire
            if (!empty($_POST['nom'])) {
                // On garde seulement les utilisateurs dont le nom correspond exactement
                // array_filter() parcourt le tableau et garde uniquement les éléments qui respectent la condition
                $users_filtres = array_filter($users_filtres, function($user) {
                    // On compare le nom de l'utilisateur avec ce qui a été tapé
                    return $user['Nom'] == $_POST['nom'];
                });
            }

            // Filtre par prénom
            // Si l'utilisateur a tapé un prénom dans le formulaire
            if (!empty($_POST['prenom'])) {
                // On garde seulement les utilisateurs dont le prénom correspond exactement
                $users_filtres = array_filter($users_filtres, function($user) {
                    // On compare le prénom de l'utilisateur avec ce qui a été tapé
                    return $user['Prenom'] == $_POST['prenom'];
                });
            }

            // Filtre par email
            // Si l'utilisateur a tapé un email dans le formulaire
            if (!empty($_POST['email'])) {
                // On garde seulement les utilisateurs dont l'email correspond exactement
                $users_filtres = array_filter($users_filtres, function($user) {
                    // On compare l'email de l'utilisateur avec ce qui a été tapé
                    return $user['Email'] == $_POST['email'];
                });
            }
            ?>

            <div>
                <table class="table-offres">
                    <tr class=""> 
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Action</th>
                    </tr>
                
                    <?php foreach ($users_filtres as $user): ?>
                        <tr>
                            <td><?php echo $user['Nom'] ?></td>
                            <td><?php echo $user['Prenom'] ?></td>
                            <td><?php echo $user['Email'] ?></td>
                            <td><?php echo $user['Password'] ?></td>
                            <td>
                                <!-- Bouton Modifier -->
                                <form action="modification_user.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_user" value="<?php echo $user['Id']?>">
                                    <input type="hidden" name="nom" value="<?php echo $user['Nom']?>">
                                    <input type="hidden" name="prenom" value="<?php echo $user['Prenom']?>">
                                    <input type="hidden" name="email" value="<?php echo $user['Email']?>">
                                    <input type="hidden" name="password" value="<?php echo $user['Password']?>">
                                    <button type="submit" class="btn">Modifier</button>
                                </form> 

                                <!-- Bouton Supprimer -->
                                <form action="suppression_user.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_user" value="<?php echo $user['Id']?>">
                                    <input type="hidden" name="nom" value="<?php echo $user['Nom']?>">
                                    <input type="hidden" name="prenom" value="<?php echo $user['Prenom']?>">
                                    <input type="hidden" name="email" value="<?php echo $user['Email']?>">
                                    <input type="hidden" name="password" value="<?php echo $user['Password']?>">
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