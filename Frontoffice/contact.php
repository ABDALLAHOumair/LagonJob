<?php
session_start();
require_once(__DIR__ . "/connexionBDD.php");
require_once(__DIR__ . "/fonctions.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $success = enregistrerContact(
        $mysqlClient,
        $_POST['nom'],
        $_POST['email'],
        $_POST['sujet'],
        $_POST['message']
    );

    if ($success) {
        $_SESSION['success_contact'] = "Message envoyé avec succès  mercii à vous !";
    } else {
        $_SESSION['error_contact'] = "Erreur lors de l'envoi du message.";
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
  <section class="section">
    <div class="container">

      <h1>Contact</h1>
      <p>Une question ? Envoyez-nous un message et un administrateur vous répondra.</p>

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

<?php 
if (isset($_SESSION['success_contact'])){
    echo "<p style='color:green'>" . $_SESSION['success_contact'] . "</p>";
    unset($_SESSION['success_contact']);
}

if (isset($_SESSION['error_contact'])){
    echo "<p style='color:red'>" . $_SESSION['error_contact'] . "</p>";
    unset($_SESSION['error_contact']);
}
?>


  </section>

  
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

</body>
</html>