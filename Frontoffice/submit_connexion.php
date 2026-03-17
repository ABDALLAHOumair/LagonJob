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
        $RequeteUserTargget='SELECT Id, Email, Password FROM user WHERE Email =:Email AND Password =:Password';
        $UserTargget=$mysqlClient->prepare($RequeteUserTargget);
        $UserTargget->execute([
            'Email' => $postData['email'],
            'Password' => $postData['password'],
        ]);
        $User=$UserTargget->fetchAll();
            if (
                $User[0]['Email'] === $postData['email'] &&
                $User[0]['Password'] === $postData['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $User[0]['Email'],
                    'user_id' => $User[0]['Id'],
                ];
            }
        }

    if (!isset($_SESSION['LOGGED_USER'])) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf( 
            "L'email ou le mot de passe est incorrect.",
            $postData['email'],
            strip_tags($postData['password'])
        );
        die(redirectToUrl('connexion.php'));
    }

    redirectToUrl('index.php');
}
