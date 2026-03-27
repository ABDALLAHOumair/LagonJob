<?php
session_start();
if (!$_SESSION['LOGGED_ADMIN']) {
    header("Location: ../Frontoffice/connexion.php");
exit;
}
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
        <a class="logo" href="index.php"><img src="../Logo/logo.png" alt="logo_lagonjob"></a>
        <nav class="nav">
            <a href="index.php">Accuiel</a>
            <a href="utilisateur.php">Utilisateurs</a>
            <a href="offre.php">Offres</a>
            <a href="contact.php">Contact</a>
            <button class="btn btn-outline" onclick="window.location.href='deconnexionBE.php'">Deconnexion</button>
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
                        <div>
                            <label for="role">Statut</label>
                            <select name="role">
                                <option value="">Tous les roles</option>
                                <option value="1" <?php if(isset($_POST['role']) && $_POST['role']=='1') echo 'selected'; ?>>Admin</option>
                                <option value="2" <?php if(isset($_POST['role']) && $_POST['role']=='2') echo 'selected'; ?>>Utilisateur</option>
                            </select>
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
            // Filtre par role
            // Si l'utilisateur selectionne un role dans le formulaire
            if (!empty($_POST['role'])) {
                // On récupère l'ID du type choisi
                $role_id = $_POST['role'];

                // On garde seulement les utilisateurs dont l'email correspond exactement
                $users_filtres = array_filter($users_filtres, function($user) use ($role_id){
                    // On compare l'email de l'utilisateur avec ce qui a été tapé
                    return $user['Id_role'] == $role_id;
                });
            }
            ?>

            <div>
                <table class="table-offres">
                    <tr class=""> 
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Action</th>
                    </tr>
                
                    <?php foreach ($users_filtres as $user): ?>
                        <tr>
                            <td><?php echo $user['Nom'] ?></td>
                            <td><?php echo $user['Prenom'] ?></td>
                            <td><?php echo $user['Email'] ?></td>
                            <td><?php echo $user['Role'] ?></td>
                            <td>
                                <!-- Bouton Modifier -->
                                <form action="modification_user.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_user" value="<?php echo $user['Id']?>">
                                    <input type="hidden" name="nom" value="<?php echo $user['Nom']?>">
                                    <input type="hidden" name="prenom" value="<?php echo $user['Prenom']?>">
                                    <input type="hidden" name="email" value="<?php echo $user['Email']?>">
                                    <input type="hidden" name="role" value="<?php echo $user['Role']?>">
                                    <button type="submit" class="btn">Modifier</button>
                                </form> 

                                <!-- Bouton Supprimer -->
                                <form action="suppression_user.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_user" value="<?php echo $user['Id']?>">
                                    <input type="hidden" name="nom" value="<?php echo $user['Nom']?>">
                                    <input type="hidden" name="prenom" value="<?php echo $user['Prenom']?>">
                                    <input type="hidden" name="email" value="<?php echo $user['Email']?>">
                                    <input type="hidden" name="role" value="<?php echo $user['Role']?>">
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