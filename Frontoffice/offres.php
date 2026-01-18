<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres - LagonJobs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require(__DIR__.'/header.php')?>

    <?php
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'lagonjob';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Récupération des données pour les filtres
    $types = $conn->query("SELECT * FROM types_contrats")->fetchAll(PDO::FETCH_ASSOC);
    $villes = $conn->query("SELECT * FROM villes ORDER BY Nom_ville")->fetchAll(PDO::FETCH_ASSOC);
    $modes = $conn->query("SELECT * FROM modes_travails")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <h2>Offres d'emploi & stages</h2>
        <div>
            <form class="form" action="offres.php" method="post">
                <div class="filter-bar">
                    <input type="text" name="mots_cles" placeholder="Mots-clés" value="<?php echo isset($_POST['mots_cles']) ? $_POST['mots_cles'] : ''; ?>">
                    
                    <select name="type">
                        <option value="">Type</option>
                        <?php foreach($types as $type): ?>
                            <option value="<?php echo $type['Id']; ?>"><?php echo $type['Nom_type_contrat']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="ville">
                        <option value="">Ville</option>
                        <?php foreach($villes as $ville): ?>
                            <option value="<?php echo $ville['Id']; ?>"><?php echo $ville['Nom_ville']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="mode">
                        <option value="">Mode de travail</option>
                        <?php foreach($modes as $mode): ?>
                            <option value="<?php echo $mode['Id']; ?>"><?php echo $mode['Nom_mode_travail']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn">Filtrer</button>
                    <button type="button" class="btn btn-outline" onclick="window.location.href='offres.php'">Réinitialiser</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    // Construction de la requête SQL avec filtres
    $sql = "SELECT o.Id, o.Titre, o.Description, 
            tc.Nom_type_contrat as type, 
            v.Nom_ville as ville, 
            mt.Nom_mode_travail as mode_travail
            FROM offres o
            INNER JOIN types_contrats tc ON o.Id_typ_contrat = tc.Id
            INNER JOIN villes v ON o.Id_ville = v.Id
            INNER JOIN modes_travails mt ON o.Id_mode_travail = mt.Id
            WHERE 1=1";
    
    $params = [];

    // Ajout des filtres
    if (!empty($_POST['mots_cles'])) {
        $sql .= " AND (o.Titre LIKE :mots_cles OR o.Description LIKE :mots_cles)";
        $params[':mots_cles'] = '%' . $_POST['mots_cles'] . '%';
    }

    if (!empty($_POST['type'])) {
        $sql .= " AND o.Id_typ_contrat = :type";
        $params[':type'] = $_POST['type'];
    }

    if (!empty($_POST['ville'])) {
        $sql .= " AND o.Id_ville = :ville";
        $params[':ville'] = $_POST['ville'];
    }

    if (!empty($_POST['mode'])) {
        $sql .= " AND o.Id_mode_travail = :mode";
        $params[':mode'] = $_POST['mode'];
    }

    // Exécution de la requête
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <section class="section">
        <div class="container">
            <div class="cards">
                <?php foreach ($resultat as $offre): ?>
                    <div class="card">
                        <h3><?php echo $offre['Titre']; ?></h3>
                        <div class="meta">
                            <span class="badge"><?php echo $offre['type']; ?></span>
                            <span class="badge"><?php echo $offre['ville']; ?></span>
                            <span class="badge"><?php echo $offre['mode_travail']; ?></span>
                        </div>
                        <p><?php echo $offre['Description']; ?></p>
                        <a href="detail.php?id=<?php echo $offre['Id']; ?>" class="btn" style="margin-top:10px;">Voir détails</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>
<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div>
                <strong>LagonJobs</strong> © 2024 - Plateforme d'emploi à Mayotte
            </div>
            <div>
                <a href="contact.php">Contact</a> | 
                <a href="#">Mentions légales</a>
            </div>
        </div>
    </div>
</footer>
</html>