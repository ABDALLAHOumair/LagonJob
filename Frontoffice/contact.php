<?php
session_start();
require_once(__DIR__ . "/connexionBDD.php");
require_once(__DIR__ . "/fonctions.php");

// Si le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des champs
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $sujet = trim($_POST['sujet']);
    $message = trim($_POST['message']);

    // Tableau d'erreurs
    $errors = [];

    // Vérifications simples
    if (empty($nom)) $errors[] = "Le nom est requis.";
    if (empty($email)) $errors[] = "L'email est requis.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
    if (empty($sujet)) $errors[] = "Le sujet est requis.";
    if (empty($message)) $errors[] = "Le message est requis.";

    // Si aucune erreur → insertion
    if (empty($errors)) {
        $success = enregistrerContact($mysqlClient, $nom, $email, $sujet, $message);

        if ($success) {
            $_SESSION['success_contact'] = "Message envoyé avec succès.";
        } else {
            $_SESSION['error_contact'] = "Erreur lors de l'envoi du message.";
        }
    } else {
        $_SESSION['error_contact'] = implode("<br>", $errors);
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
                 <input type="text" id="nom" name="nom" required>
                </div>

                 <div>
                 <label for="email">Email</label>
                 <input type="email" id="email" name="email" required>
                 </div>
                 </div>

                <div class="stack">
                 <div> 
                 <label for="sujet">Sujet</label>
                  <input type="text" id="sujet" name="sujet" required>
                  </div>

                  <div>
                    <label for="message">Message</label>
                   <textarea id="message" name="message" required></textarea>
                  </div>
                </div>

                    <div class="actions">
                    <button class="btn" type="submit">Envoyer</button>
                    <button class="btn btn-outline" type="reset">Effacer</button>
                </div>

             </form>

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