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
  </section>

  
  <footer class="site-footer">
    <div class="container footer-inner">
      <div>
        © 2025 LagonJobs - Tous droits réservés
      </div>
      <div>
        <a href="#">Confidentialité</a> &nbsp; | &nbsp;
        <a href="#">Nous contacter</a>
      </div>
    </div>
  </footer>

</body>
</html>

    
</body>
</html>