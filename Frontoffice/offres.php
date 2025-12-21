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
    <div class="container">
        <h2>Offres d'emploi & stages</h2>
        <div>
            <form class="form" action="offres.php" method="post">
                <div class="filter-bar">
                    <select name="type">
                        <option value="">Type</option>
                        <option value="stage">Stage</option>
                        <option value="cdd">CDD</option>
                        <option value="cdi">CDI</option>
                        <option value="alternance">Alternance</option>
                    </select>

                    <select name="ville">
                        <option value="">Ville</option>
                        <option value="Mamoudzou">Mamoudzou</option>
                        <option value="Dzaoudzi">Dzaoudzi</option>
                        <option value="Koungou">Koungou</option>
                    </select>

                    <select name="teletravail">
                        <option value="">Télétravail</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                        <option value="hybride">Hybride</option>
                    </select>

                    <button type="submit" class="btn">Filtrer</button>
                    <button type="reset" class="btn btn-outline">Réinitialiser</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    // Données exemples
    $offres = [
        ['id' => 1, 'titre' => 'Développeur Web Junior', 'type' => 'CDI', 'ville' => 'Mamoudzou', 'teletravail' => 'Hybride', 'description' => 'Rejoignez notre équipe dynamique.'],
        ['id' => 2, 'titre' => 'Stage Assistant Marketing', 'type' => 'Stage', 'ville' => 'Dzaoudzi', 'teletravail' => 'Non', 'description' => 'Stage de 6 mois.'],
        ['id' => 3, 'titre' => 'Technicien Réseau', 'type' => 'CDD', 'ville' => 'Koungou', 'teletravail' => 'Non', 'description' => 'Installation et maintenance.'],
        ['id' => 4, 'titre' => 'Alternance Développeur Mobile', 'type' => 'Alternance', 'ville' => 'Mamoudzou', 'teletravail' => 'Hybride', 'description' => 'Développement d\'applications.'],
        ['id' => 5, 'titre' => 'Chef de Projet Digital', 'type' => 'CDI', 'ville' => 'Mamoudzou', 'teletravail' => 'Oui', 'description' => 'Pilotage de projets digitaux.'],
        ['id' => 6, 'titre' => 'Stage Comptabilité', 'type' => 'Stage', 'ville' => 'Dzaoudzi', 'teletravail' => 'Non', 'description' => 'Stage de 3 mois.']
    ];

    // Filtrage simple
    $resultat = $offres;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['type'])) {
            $resultat = array_filter($resultat, function($o) {
                return strtolower($o['type']) == strtolower($_POST['type']);
            });
        }
        if (!empty($_POST['ville'])) {
            $resultat = array_filter($resultat, function($o) {
                return $o['ville'] == $_POST['ville'];
            });
        }
        if (!empty($_POST['teletravail'])) {
            $resultat = array_filter($resultat, function($o) {
                return strtolower($o['teletravail']) == strtolower($_POST['teletravail']);
            });
        }
    }
    ?>

    <section class="section">
        <div class="container">
            <div class="cards">
                <?php foreach ($resultat as $offre): ?>
                    <div class="card">
                        <h3><?php echo $offre['titre']; ?></h3>
                        <div class="meta">
                            <span class="badge"><?php echo $offre['type']; ?></span>
                            <span class="badge"><?php echo $offre['ville']; ?></span>
                            <?php if ($offre['teletravail'] != 'Non'): ?>
                                <span class="badge"><?php echo $offre['teletravail']; ?></span>
                            <?php endif; ?>
                        </div>
                        <p><?php echo $offre['description']; ?></p>
                        <a href="detail.php?id=<?php echo $offre['id']; ?>" class="btn" style="margin-top:10px;">Voir détails</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>
<footer class="site-footer footer-inner">
... (11lignes restantes)