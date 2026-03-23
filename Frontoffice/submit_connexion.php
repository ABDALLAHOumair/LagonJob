<?php
session_start();
require_once(__DIR__ . '/fonctions.php');
require_once(__DIR__ . '/connexionBDD.php');
$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) &&  isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il vous faut un email valide.';
        die(redirectToUrl('connexion.php'));
    } 

    else {
        $RequeteUserTargget='SELECT Id, Email, Password, Id_role FROM user WHERE Email =:Email';
        $UserTargget=$mysqlClient->prepare($RequeteUserTargget);
        $UserTargget->execute([
            'Email' => $postData['email'],
        ]);
        $User=$UserTargget->fetchAll();
            if (
                $User[0]['Email'] === $postData['email'] && password_verify($postData['password'], $User[0]['Password']) && $User[0]['Id_role'] == 2 
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $User[0]['Email'],
                    'user_id' => $User[0]['Id'],
                ];
                die(redirectToUrl('index.php'));
            }
            if (
                $User[0]['Email'] === $postData['email'] && password_verify($postData['password'], $User[0]['Password']) && $User[0]['Id_role'] == 1
            ) {
                $_SESSION['LOGGED_ADMIN'] = [
                    'email' => $User[0]['Email'],
                    'user_id' => $User[0]['Id'],
                ];
                die(redirectToUrl('../Back_office/index.php'));
            }
            else {
                $_SESSION['LOGIN_ERROR_MESSAGE'] =  "L'email ou le mot de passe est incorrect.";
                die(redirectToUrl('connexion.php'));
            }
        }



    redirectToUrl('index.php');
}
