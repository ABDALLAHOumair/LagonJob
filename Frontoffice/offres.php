<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre</title>
</head>
<body>
    <h1>Offres d'emploi & stages</h1>
   
    <form action="offres.php" method="post">
        <input type="text" name="Mot-clé" >
        <input type="text" name="Type" >
        <select id="type" name="type">
        <option value=""></option>
        </select>
        <select id="ville" name="ville">
        <option value=""></option>
        </select>
        <select id="télétravail" name="télétravail">
        <option value=""></option>  

        <button type="submit">Filtrer</button>
        <button type="reset">Réinitialiser</button>

</body>
</html>