<?php

require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');

if (isset($_POST['titre']) 
    && isset($_POST['type']) 
    && isset($_POST['mode']) 
    && isset($_POST['ville']) 
    && isset($_POST['description']) 
    && isset($_POST['statut']) 
    && isset($_POST['mission']) 
    && isset($_POST['profile']) 
    && isset($_POST['duree']) 
    && !empty($_POST['titre']) 
    && !empty($_POST['type']) 
    && !empty($_POST['mode']) 
    && !empty($_POST['ville'])
    && !empty($_POST['description'])
    && !empty($_POST['statut'])
    && !empty($_POST['mission'])
    && !empty($_POST['profile'])
    && !empty($_POST['duree']) 
    && trim($_POST['titre']) 
    && trim($_POST['statut']) 
    && trim($_POST['type']) 
    && trim($_POST['mode']) 
    && trim($_POST['ville']) 
    && trim($_POST['description'])
    && trim($_POST['mission'])
    && trim($_POST['profile'])
    && trim($_POST['duree'])
    ){
        $updateoffre=$mysqlClient->prepare('UPDATE offres SET Titre=:Titre, Id_type_contrat=:Type_contrat, Id_mode_travail=:Mode_travail, Id_ville=:Ville, Description=:Description, Id_statut=:Statut, Mission=:Mission, Profile=:Profile, Duree=:Duree WHERE Id=:Id');
        $updateoffre->execute([
            'Titre'=> $_POST['titre'],
            'Type_contrat'=> $_POST['type'],
            'Mode_travail'=> $_POST['mode'],
            'Ville'=> $_POST['ville'],
            'Description'=> $_POST['description'],
            'Statut'=> $_POST['statut'],
            'Mission'=> $_POST['mission'],
            'Profile'=> $_POST['profile'],
            'Duree'=> $_POST['duree'],
            'Id'=> $_POST['id_offre'],
        ]);
        redirectToUrl('index.php'); 
    }
    else{
        echo "Tout les champs n'ont pas étaient remplis"; 
    }

?>