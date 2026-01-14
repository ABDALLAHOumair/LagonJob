<?php
session_start();
require_once(__DIR__ . '/fonctions.php');
require_once(__DIR__ . '/connexionBDD.php');
$postData = $_GET;

// Validation du formulaire
if (isset($postData['email']) &&  isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
        redirectToUrl('connexion.php');
    } else {
        foreach ($listeUser as $user) {
            if (
                $user['Email'] === $postData['email'] &&
                $user['Password'] === $postData['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['Email'],
                    'user_id' => $user['Id'],
                ];
            }
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf( 
                'Les informations envoyées ne permettent pas de vous identifier.',
                $postData['email'],
                strip_tags($postData['password'])
            );
            redirectToUrl('connexion.php');
        }
    }

    redirectToUrl('home.php');
}
