<?php
session_start();
require_once(__DIR__ . '/fonctions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'offre - LagonJobs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require(__DIR__.'/header.php')?>

    <?php
    // Connexion à la base de données
    require_once(__DIR__ . '/connexionBDD.php');

    // Vérifier si l'ID a été envoyé en POST
    if (!empty($_POST['id_offre'])) {
        $id = $_POST['id_offre'];
        
        // Requête pour récupérer l'offre complète
        $sql = "SELECT o.Id, o.Titre, o.Description, 
                tc.Nom_type_contrat  as type, 
                o.Mission as mission, 
                o.Profile as profile, 
                o.Duree as durée, 
                v.Nom_ville as ville, 
                mt.Nom_mode_travail as mode_travail
                FROM offres o
                INNER JOIN types_contrats tc ON o.Id_type_contrat = tc.Id
                INNER JOIN villes v ON o.Id_ville = v.Id
                INNER JOIN modes_travails mt ON o.Id_mode_travail = mt.Id
                WHERE o.Id = :id";
        
        $stmt = $mysqlClient->prepare($sql);
        $stmt->execute([':id' => $id]);
        $offre = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($offre) {
            ?>
            <section class="section">
                <div class="container card">                  
                    <div class="meta" style="margin-bottom: 20px;">
                        <span class="badge"><?php echo $offre['type']; ?></span>
                    </div>
                    <h1><?php echo $offre['Titre']; ?></h1>
                    <p><?php echo $offre['ville'].' - '. $offre['mode_travail'].' - '. $offre['durée'] ?></p>
                    <div class="">
                        <h3>Description du poste</h3>
                        <p><?php echo $offre['Description']; ?></p>
                    </div><br>  
                    <p><strong>Mission : </strong><?php echo $offre['mission']; ?></p><br>
                    <p><strong>Profile : </strong><?php echo $offre['profile']; ?></p><br>
                    <div style="margin-top: 20px; display: flex; gap: 10px;">
                        <?php if (isset($_SESSION['LOGGED_USER'])){
                                $postuler =  false; 
                                $SelectTargget='SELECT Id, Id_user, Id_offre, Status FROM postulations WHERE Id_user =:Id_user';
                                $Targget=$mysqlClient->prepare($SelectTargget);
                                $Targget->execute([
                                    'Id_user' => $_SESSION['LOGGED_USER']['user_id'],
                                ]);
                                $postulations=$Targget->fetchAll();
                               
                                foreach ($postulations as $postulation) {
                                    if ($postulation['Id_offre'] == $_POST['id_offre'] && $postulation['Status'] == true) {
                                        $postuler = true; ?>
                                    <!-- Formulaire pour postuler -->
                                    <form action="annuler_postulation.php" method="post">
                                        <input type="hidden" name="id_offre" value="<?php echo $postulation['Id_offre']; ?>">
                                        <input type="hidden" name="id_user" value="<?php echo $postulation['Id_user']; ?>">
                                        <input type="hidden" name="id_postulation" value="<?php echo $postulation['Id']; ?>">
                                        <button type="submit" style="background:#E6E6E6; color:#616161; padding:.7rem 1rem; border-radius:10px; display:inline-block; font-weight:600; border:2px solid #E6E6E6; transition:all .2s ease;">Annuler la postulation</button>
                                    </form>
                                <?php }}
                                if (!$postuler) { ?>
                                    <form action="confirme_postulation.php" method="post">
                                        <input type="hidden" name="id_offre" value="<?php echo $_POST['id_offre']; ?>">
                                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['LOGGED_USER']['user_id']; ?>">
                                        <button type="submit" class="btn">Postuler à cette offre</button>
                                    </form>
                                <?php
                                }
                            } 
                            else { ?>
                            <button type="button" class="btn" onclick="window.location.href='connexion.php'">Connectez-vous pour postuler</button>
                        <?php } ;?>
                        
                        <!-- Formulaire pour retour à la liste -->
                        <form action="offres.php" method="get">
                            <button type="submit" class="btn">Voir les offres</button>
                        </form>
                    </div>
                </div>
            </section>
            <?php
        } else {
            ?>
            <section class="section">
                <div class="container">
                    <div class="card center" style="padding: 40px; text-align: center;">
                        <h2>Offre introuvable</h2>
                        <p>L'offre que vous recherchez n'existe pas ou a été supprimée.</p>
                        <form action="offres.php" method="get" style="margin-top: 20px;">
                            <button type="submit" class="btn">Retour aux offres</button>
                        </form>
                    </div>
                </div>
            </section>
            <?php
        }
    } else {
        ?>
        <section class="section">
            <div class="container">
                <div class="card center" style="padding: 40px; text-align: center;">
                    <h2>Aucune offre sélectionnée</h2>
                    <p>Veuillez sélectionner une offre depuis la liste.</p>
                    <form action="offres.php" method="get" style="margin-top: 20px;">
                        <button type="submit" class="btn">Voir toutes les offres</button>
                    </form>
                </div>
            </div>
        </section>
        <?php
    }
    ?>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-inner">
                <div>
                    <strong>LagonJobs</strong> © 2025 - Plateforme d'emploi à Mayotte
                </div>
                <div>
                    <a href="contact.php">Contact</a> | 
                    <a href="#">Mentions légales</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
