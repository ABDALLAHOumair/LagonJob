<?php
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'offre - LagonJobs</title>
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
    <?php
    // Connexion à la base de données
    require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');

    // Vérifier si l'ID a été envoyé en POST
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        
        // Requête pour récupérer l'offre complète
        $sql = "SELECT o.Id, o.Titre, o.Description, 
                tc.Nom_type_contrat  as type, 
                o.Mission as mission, 
                o.Profile as profile, 
                o.Duree as durée, 
                s.Statut as statut, 
                v.Nom_ville as ville, 
                mt.Nom_mode_travail as mode_travail
                FROM offres o
                INNER JOIN types_contrats tc ON o.Id_type_contrat = tc.Id
                INNER JOIN villes v ON o.Id_ville = v.Id
                INNER JOIN modes_travails mt ON o.Id_mode_travail = mt.Id
                INNER JOIN statuts s ON o.Id_statut = s.Id
                WHERE o.Id = :id";
        
        $stmt = $mysqlClient->prepare($sql);
        $stmt->execute([':id' => $id]);
        $offre = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($offre) {
            ?>
            <section class="section">
                <div class="container" style="margin-bottom: 20px;">
                    <button class="btn-retour" onclick="history.back()">
                        <span class="fleche"></span>
                        Retour
                    </button>  
                </div>
                <div class="container card">
                    <div class="meta" style="margin-bottom: 20px;">
                        <span class="badge"><?php echo $offre['type']; ?></span>
                    </div>
                    <h1><?php echo $offre['Titre']; ?></h1>
                    <p><?php echo $offre['ville'].' - '. $offre['mode_travail'].' - '. $offre['durée'] ?></p>
                    <div class="">
                        <h3>Description du poste</h3>
                        <p><?php echo $offre['Description']; ?></p>
                    </div>
                    <p><strong>Mission : </strong><?php echo $offre['mission']; ?></p>
                    <p><strong>Profile : </strong><?php echo $offre['profile']; ?></p>
                    <div style="margin-top: 20px; display: flex; gap: 10px;">
                        <form action="modification_offre.php" method="post">
                            <input type="hidden" name="id_offre" value="<?php echo $_POST['id']; ?>">
                                <?php foreach ($listeOffre as $Offre) {
                                    if ($Offre['Id']==$_POST['id']) {?>
                                        <input type="hidden" name="statut" value="<?php echo $Offre['Statut']?>">
                                        <input type="hidden" name="type_travail" value="<?php echo $Offre['Nom_type_contrat']?>">
                                        <input type="hidden" name="mode_travail" value="<?php echo $Offre['Nom_mode_travail']?>">
                                        <input type="hidden" name="ville" value="<?php echo $Offre['Nom_ville']?>">
                                        <input type="hidden" name="description" value="<?php echo $Offre['Description']?>">
                                <?php } }  ?>
                            <button type="submit" class="btn">Modifier</button>
                        </form>

                        <form action="suppression_offre.php" method="post">
                            <input type="hidden" name="id_offre" value="<?php echo $_POST['id']; ?>">
                                <?php foreach ($listeOffre as $Offre) {
                                    if ($Offre['Id']==$_POST['id']) {?>
                                        <input type="hidden" name="statut" value="<?php echo $Offre['Statut']?>">
                                        <input type="hidden" name="type_travail" value="<?php echo $Offre['Nom_type_contrat']?>">
                                        <input type="hidden" name="mode_travail" value="<?php echo $Offre['Nom_mode_travail']?>">
                                        <input type="hidden" name="ville" value="<?php echo $Offre['Nom_ville']?>">
                                        <input type="hidden" name="description" value="<?php echo $Offre['Description']?>">
                                <?php } }  ?>
                            <button type="submit" class="btn">Supprimer</button>
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