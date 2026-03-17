<?php
session_start();
require_once(__DIR__.'/connexionBDD.php');
require_once(__DIR__.'/fonctions.php');

if (isset($_POST['id_offre']) 
    && isset($_POST['id_user']) 
    && isset($_POST['id_postulation']) 
    && !empty($_POST['id_offre'])
    && !empty($_POST['id_user'])
    && !empty($_POST['id_postulation'])){

        $deletePostulation= $mysqlClient->prepare('DELETE FROM postulations WHERE Id = :Id');
        $deletePostulation->execute([
        'Id' => $_POST['id_postulation'],
        ]);
        redirectToUrl('offres.php');
    }
?>