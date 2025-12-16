<?php
session_start();
require_once(__DIR__.'/connexionBDD.php');
require_once(__DIR__.'/fonctions.php');


if (isset($_GET['email']) 
    && isset($_GET['nom']) 
    && isset($_GET['prenom'])
    && isset($_GET['password'])
    && !empty($_GET['email'])
    && !empty($_GET['nom'])
    && !empty($_GET['prenom'])
    && !empty($_GET['password'])
    && !empty($_GET['confirmer'])){
        if ($_GET['confirmer'] != $_GET['password']){
            $_SESSION['Error_message'] = 
            "Les mots de passes ne sont pas identique.";
            redirectToUrl('inscription.php');
        }
        else{
            /*      
                $insertUser='INSERT INTO user(Email, Password, Nom, Prenom) VALUE(:Email, :Password, :Nom, :Prenom)';
                $insertUser=$mysqlClient->prepare($insertUser);
                $insertUser->execute([
                    'Email' => $_GET['email'],
                    'Password' => $_GET['password'],
                    'Nom' => $_GET['nom'],
                    'Prenom' => $_GET['prenom'],
                ]);

                redirectToUrl('index.php');
            */
        }
}
else{
     echo "Veuillez fournir toutes les informations d'inscription";
}
?>
