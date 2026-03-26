<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulation</title>
    <link rel="stylesheet" href="../Frontoffice/style.css">
</head>
<body>
    <header class="site-header header-inner">
    </header>
        <div class="container">
            <div class="row">
                <form class="form" action="submit_postulation.php?type=Oui" method="POST">
                    <h1>Confiramtion de postulation</h1>
                    <p>Voulez-vous vraiment postuler à cette offre?</p>
                    <input type="hidden" name="id_offre" value="<?php echo $_POST['id_offre']; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $_POST['id_user']; ?>">   
                    <button type="submit" class="btn">Oui</button>                
                    <button type="button" class="btn" onclick="window.location.href='submit_postulation.php?type=Non'">Non</button>               
                </form>
            </div>
        </div>
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