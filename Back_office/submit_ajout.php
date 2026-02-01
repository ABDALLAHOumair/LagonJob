<?php
require_once(__DIR__. "/../Frontoffice/connexionBDD.php");
require_once(__DIR__. "/../Frontoffice/fonctions.php");


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
    && !empty($_POST['duree'])){
        $insertoffre= 'INSERT INTO offres (Titre, Id_type_contrat, Id_mode_travail, Id_ville, Description, Id_statut, Mission, Profile, Duree) VALUES (:Titre, :Type, :Mode, :Ville, :Description, :Statut, :Mission, :Profile, :Duree)';
        $insertion_offre= $mysqlClient->prepare($insertoffre);
        $insertion_offre->execute([
            'Titre' => $_POST['titre'],
            'Type' => $_POST['type'],
            'Mode' => $_POST['mode'],
            'Ville' => $_POST['ville'],
            'Description' => $_POST['description'],
            'Statut' => $_POST['statut'],
            'Mission' => $_POST['mission'],
            'Profile' => $_POST['profile'],
            'Duree' => $_POST['duree'],
        ]);
        redirectToUrl('offre.php');
    }
    
?>