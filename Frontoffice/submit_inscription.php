<?php
session_start();
require_once(__DIR__.'/connexionBDD.php');
require_once(__DIR__.'/fonctions.php');

if (isset($_POST['email']) 
    && isset($_POST['nom']) 
    && isset($_POST['prenom'])
    && isset($_POST['password'])
    && isset($_POST['confirmer'])
    && !empty($_POST['email'])
    && !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['password'])
    && !empty($_POST['confirmer'])){
        $RequeteUserTargget='SELECT Email, Password FROM user WHERE Email =:Email';
        $UserTargget=$mysqlClient->prepare($RequeteUserTargget);
        $UserTargget->execute([
            'Email' => $_POST['email'],
        ]);
        $User=$UserTargget->fetchAll();

            if ($User[0]['Email'] == $_POST['email']) {
                $_SESSION['Error_message_email'] =
                "L'email saisie est déjà utilisé.";
                die(redirectToUrl('inscription.php'));
            }
            if ($_POST['confirmer'] != $_POST['password']){
                $_SESSION['Error_message_mdp'] = 
                "Les mots de passes ne sont pas identique.";
                die(redirectToUrl('inscription.php'));
            }
            else{
                $insertUser='INSERT INTO user(Email, Password, Nom, Prenom) VALUE(:Email, :Password, :Nom, :Prenom)';
                $insertUser=$mysqlClient->prepare($insertUser);
                $insertUser->execute([
                    'Email' => $_POST['email'],
                    'Password' =>password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'Nom' => $_POST['nom'],
                    'Prenom' => $_POST['prenom'],
                ]);

                die(redirectToUrl('index.php'));
            }
        }

else{
    $_SESSION['Error_message_inscription']=
    "Veuillez fournir toutes les informations d'inscription.";
    die(redirectToUrl('inscription.php'));
}
?>
 