<?php
session_start();
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
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        
        // Requête pour récupérer l'offre complète
        $sql = "SELECT o.Id, o.Titre, o.Description, 
                tc.Nom_type_contrat as type, 
                v.Nom_ville as ville, 
                mt.Nom_mode_travail as mode_travail
                FROM offres o
                INNER JOIN types_contrats tc ON o.Id_typ_contrat = tc.Id
                INNER JOIN villes v ON o.Id_ville = v.Id
                INNER JOIN modes_travails mt ON o.Id_mode_travail = mt.Id
                WHERE o.Id = :id";
        
        $stmt = $mysqlClient->prepare($sql);
        $stmt->execute([':id' => $id]);
        $offre = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($offre) {
            ?>
            <section class="section">
                <div class="container">
                    <h1><?php echo $offre['Titre']; ?></h1>
                    
                    <div class="meta" style="margin-bottom: 20px;">
                        <span class="badge"><?php echo $offre['type']; ?></span>
                        <span class="badge"><?php echo $offre['ville']; ?></span>
                        <span class="badge"><?php echo $offre['mode_travail']; ?></span>
                    </div>

                    <div class="card">
                        <h3>Description du poste</h3>
                        <p><?php echo $offre['Description']; ?></p>
                    </div>

                    <div style="margin-top: 20px; display: flex; gap: 10px;">
                        <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                            <!-- Formulaire pour postuler -->
                            <form action="postuler.php" method="post">
                                <input type="hidden" name="id_offre" value="<?php echo $offre['Id']; ?>">
                                <button type="submit" class="btn">Postuler à cette offre</button>
                            </form>
                        <?php else: ?>
                            <a href="connexion.php" class="btn">Connectez-vous pour postuler</a>
                        <?php endif; ?>
                        
                        <!-- Formulaire pour retour à la liste -->
                        <form action="offres.php" method="get">
                            <button type="submit" class="btn btn-outline">Retour aux offres</button>
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
