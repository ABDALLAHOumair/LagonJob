
<?php
session_start();
if (!$_SESSION['LOGGED_ADMIN']) {
    header("Location: ../Frontoffice/connexion.php");
exit;
}
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');

if (isset($_POST['id_offre']) && !empty($_POST['id_offre'])) {

    $deleteoffre= $mysqlClient->prepare('DELETE FROM offres WHERE Id = :Id');
    $deleteoffre->execute([
        'Id' => $_POST['id_offre'],
        ]);
    redirectToUrl('offre.php'); 
}
?>
