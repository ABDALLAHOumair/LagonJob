<?php
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');

$deleteoffre= $mysqlClient->prepare('DELETE FROM user WHERE Id = :Id');
    $deleteoffre->execute([
        'Id' => $_POST['id_user'],
    ]);
    redirectToUrl('utilisateur.php'); 
?>