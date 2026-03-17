<?php
session_start();
require_once(__DIR__.'/connexionBDD.php');
require_once(__DIR__.'/fonctions.php');

if (isset($_POST['id_offre']) 
    && isset($_POST['id_user']) 
    && !empty($_POST['id_offre'])
    && !empty($_POST['id_user'])){
        if($_GET['type'] == 'Oui'){
            $RequeteUserTargget='INSERT INTO postulations (Id_user, Id_offre, Status) VALUE(:Id_user, :Id_offre, :Status)';
            $UserTargget=$mysqlClient->prepare($RequeteUserTargget);
            $UserTargget->execute([
                'Id_user' => $_POST['id_user'],
                'Id_offre' => $_POST['id_offre'],
                'Status' => 1,
            ]);
            die(redirectToUrl('index.php'));      
        }
        
    }
if($_GET['type'] === 'Non'){
    redirectToUrl('offres.php');
}
?>