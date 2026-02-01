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
                <form class="form" action="" method="post">
                    <h1>Gestion des utilisateurs</h1>
                        <div class="filter-bar">
                            <div>
                                <label for="ajouter">Nom</label>
                                <input name="nom">
                            </div>
                            <div>
                                <label for="status">Prenom</label>
                                <input name="prenom">
                            </div>
                            <div>
                                <label for="categorie">Email</label>
                                <input name="email">
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
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Action</th>
                    </tr>
                
                        <?php for ($i=0; $i < count($listeUser) ; $i++) { ?>
                            <tr>
                                <td>
                                    <?php echo $listeUser[$i]['Nom'] ?>
                                </td>
                                <td>
                                <?php echo $listeUser[$i]['Prenom'] ?>
                                </td>
                                <td>
                                    <?php echo $listeUser[$i]['Email'] ?>
                                </td>
                                <td>
                                    <?php echo $listeUser[$i]['Password'] ?>
                                </td>
                                <td>
                                    <form action="modification_user.php" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $listeUser[$i]['Id']?>">
                                        <input type="hidden" name="nom" value="<?php echo $listeUser[$i]['Nom']?>">
                                        <input type="hidden" name="prenom" value="<?php echo $listeUser[$i]['Prenom']?>">
                                        <input type="hidden" name="email" value="<?php echo $listeUser[$i]['Email']?>">
                                        <input type="hidden" name="password" value="<?php echo $listeUser[$i]['Password']?>">
                                        <button type="submit" class="btn">Modifier</button>
                                    </form> 
                                    <form action="suppression_user.php" method="post">
                                        <input type="hidden" name="id_offre" value="<?php echo $listeUser[$i]['Id']?>">
                                        <input type="hidden" name="nom" value="<?php echo $listeUser[$i]['Nom']?>">
                                        <input type="hidden" name="prenom" value="<?php echo $listeUser[$i]['Prenom']?>">
                                        <input type="hidden" name="email" value="<?php echo $listeUser[$i]['Email']?>">
                                        <input type="hidden" name="password" value="<?php echo $listeUser[$i]['Password']?>">
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