<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../Frontoffice/style.css">
</head>
<body>
    <header class="site-header header-inner">
    </header>
    <section class="section">
        <div class="container meta" style="margin-bottom: 20px;">
            <button class="btn-retour" onclick="history.back()">
                <span class="fleche"></span>
                Retour
            </button>  
        </div>
        <div class="container">
            <div class="row">
                <form class="form" action="submit_postulation.php?type=Oui" method="POST">
                    <h1>Confiramtion de postulation</h1>
                    <p>Voulez-vous vraiment postuler à cette formation?</p>
                    <input type="hidden" name="id_offre" value="<?php echo $_POST['id_offre']; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $_POST['id_user']; ?>">   
                    <button type="submit" class="btn" onclick="window.location.href='submit_postulation.php?type=Oui'">Oui</button>                
                    <button type="button" class="btn" onclick="window.location.href='submit_postulation.php?type=Non'">Non</button>               
                </form>
            </div>
        </div>
    </section>
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