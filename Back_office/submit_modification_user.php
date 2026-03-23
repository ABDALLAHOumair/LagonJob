<?php
session_start();
if (!$_SESSION['LOGGED_ADMIN']) {
    header("Location: ../Frontoffice/connexion.php");
exit;
}
require_once(__DIR__ . '/../Frontoffice/fonctions.php');
require_once(__DIR__ . '/../Frontoffice/connexionBDD.php');

if (isset($_POST['nom']) 
    && isset($_POST['prenom']) 
    && isset($_POST['email']) 
    && isset($_POST['password']) 
    && !empty($_POST['nom']) 
    && !empty($_POST['prenom']) 
    && !empty($_POST['email'])
    && !empty($_POST['password']) 
    && trim($_POST['nom']) 
    && trim($_POST['prenom']) 
    && trim($_POST['email']) 
    && trim($_POST['password']) 
    ){
        $UpdateUser=$mysqlClient->prepare('UPDATE user SET Nom=:Nom, Prenom=:Prenom, Email=:Email, Password=:Password WHERE Id=:Id');
        $UpdateUser->execute([
            'Nom'=> $_POST['nom'],
            'Prenom'=> $_POST['prenom'],
            'Email'=> $_POST['email'],
            'Password'=> $_POST['password'],
            'Id'=> $_POST['id_user'],
        ]);
        redirectToUrl('utilisateur.php'); 
    }
    else{
        echo "Tout les champs n'ont pas étaient remplis"; 
    }
?>