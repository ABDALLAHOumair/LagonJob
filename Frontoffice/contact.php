<?php
session_start();
require_once(__DIR__ . "/connexionBDD.php");
require_once(__DIR__ . "/fonctions.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valider les données
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $sujet = isset($_POST['sujet']) ? trim($_POST['sujet']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Erreurs de validation
    $errors = [];
    
    if (empty($nom)) {
        $errors[] = "Le nom est requis.";
    } elseif (strlen($nom) > 128) {
        $errors[] = "Le nom ne peut pas dépasser 128 caractères.";
    }

    if (empty($email)) {
        $errors[] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    if (empty($sujet)) {
        $errors[] = "Le sujet est requis.";
    } elseif (strlen($sujet) > 256) {
        $errors[] = "Le sujet ne peut pas dépasser 256 caractères.";
    }

    if (empty($message)) {
        $errors[] = "Le message est requis.";
    } elseif (strlen($message) > 65535) {
        $errors[] = "Le message est trop long.";
    } elseif (strlen($message) < 10) {
        $errors[] = "Le message doit contenir au moins 10 caractères.";
    }

    if (empty($errors)) {
        $success = enregistrerContact(
            $mysqlClient,
            $nom,
            $email,
            $sujet,
            $message
        );

        if ($success) {
            $_SESSION['success_contact'] = "Message envoyé avec succès ! Merci de nous avoir contacté.";
        } else {
            $_SESSION['error_contact'] = "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer.";
        }
    } else {
        $_SESSION['error_contact'] = implode("\n", $errors);
    }

    header("Location: contact.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - LagonJobs</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require(__DIR__.'/header.php')?>
    <main class="hero">
        <section class="section">
            <div class="container">

            <h1>Contact</h1>
            <p>Une question ? Envoyez-nous un message et un administrateur vous répondra.</p>

            <?php 
            if (isset($_SESSION['success_contact'])){
                echo "<div style='background-color:#d4edda; color:#155724; padding:12px; border:1px solid #c3e6cb; border-radius:4px; margin-bottom:20px;'>" . htmlspecialchars($_SESSION['success_contact']) . "</div>";
                unset($_SESSION['success_contact']);
            }

            if (isset($_SESSION['error_contact'])){
                $error_messages = explode("\n", $_SESSION['error_contact']);
                echo "<div style='background-color:#f8d7da; color:#721c24; padding:12px; border:1px solid #f5c6cb; border-radius:4px; margin-bottom:20px;'>";
                
                if (count($error_messages) > 1) {
                    echo "<ul style='margin: 5px 0; padding-left: 20px;'>";
                    foreach ($error_messages as $msg) {
                        if (trim($msg)) {
                            echo "<li>" . htmlspecialchars($msg) . "</li>";
                        }
                    }
                    echo "</ul>";
                } else {
                    echo htmlspecialchars($_SESSION['error_contact']);
                }
                echo "</div>";
                unset($_SESSION['error_contact']);
            }
            ?>

            <form class="form" action="" method="POST">

                <div class="row">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" maxlength="128" placeholder="Votre nom complet" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" maxlength="256" placeholder="votre@email.com" required>
                </div>
                </div>

                <div class="stack">
                <div>
                    <label for="sujet">Sujet</label>
                    <input type="text" id="sujet" name="sujet" maxlength="256" placeholder="Sujet de votre message" required>
                </div>

                <div>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" minlength="10" maxlength="65535" placeholder="Décrivez votre demande ici..." required style="min-height: 150px; resize: vertical;"></textarea>
                    <small id="message-counter" style="display: block; color: #666; margin-top: 5px;">0 / 65535 caractères</small>
                </div>
                </div>

                <div class="actions">
                <button class="btn" type="submit">Envoyer</button>
                <button class="btn btn-outline" type="reset">Effacer</button>
                <button class="btn btn-outline" type="button" onclick="window.location.href='besion_aide.php'" style="margin-left: 900px;">Demande d'aide</button>                </div>

            </form>

            <script>
                // Compteur de caractères pour le message
                const messageTextarea = document.getElementById('message');
                const messageCounter = document.getElementById('message-counter');
                
                function updateCounter() {
                const length = messageTextarea.value.length;
                messageCounter.textContent = length + ' / 65535 caractères';
                }
                
                messageTextarea.addEventListener('input', updateCounter);
                messageTextarea.addEventListener('change', updateCounter);
            </script>
            </div>
        </section>
    </main>
</body> 
<footer class="site-footer">
    <div class="container footer-inner">
        <div>
        © 2025 LagonJobs - Tous droits réservés
        </div>
        <div>
        <a href="">Confidentialité</a> &nbsp; | &nbsp;
        <a href="contact.php">Nous contacter</a>
        </div>
    </div>
</footer>
</html>