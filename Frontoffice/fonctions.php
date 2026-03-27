<?php
require_once(__DIR__ . '/connexionBDD.php');

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

//Selection des utilisateurs
$selectUser='SELECT us.Id, us.Nom, us.Prenom, us.Email, us.Password, us.Id_role, ro.Role FROM user us
JOIN roles ro ON us.Id_role=ro.Id';
$selection_User=$mysqlClient->prepare($selectUser);
$selection_User->execute();
$listeUser=$selection_User->fetchAll();

//Selection des types de contrats 
$selectContrat='SELECT * FROM types_contrats';
$selection_Contrat=$mysqlClient->prepare($selectContrat);
$selection_Contrat->execute();
$listeContrat=$selection_Contrat->fetchAll();

//Selection des modes de travails
$selectModeTravail='SELECT * FROM modes_travails';
$selection_Mode_Travail=$mysqlClient->prepare($selectModeTravail);
$selection_Mode_Travail->execute();
$listeModeTravail=$selection_Mode_Travail->fetchAll();

//Selction des villes 
$selectville='SELECT * FROM villes ORDER BY Nom_ville';
$selection_ville=$mysqlClient->prepare($selectville);
$selection_ville->execute();
$listeVille=$selection_ville->fetchAll();

//Selction des statuts
$selectstatut='SELECT * FROM statuts';
$selection_statut=$mysqlClient->prepare($selectstatut);
$selection_statut->execute();
$listestatut=$selection_statut->fetchAll();

//Selction des Roles
$selectrole='SELECT * FROM roles';
$selection_role=$mysqlClient->prepare($selectrole);
$selection_role->execute();
$listerole=$selection_role->fetchAll();

//Selction des postulations
$selectpostulation='SELECT * FROM postulations';
$selection_postulation=$mysqlClient->prepare($selectpostulation);
$selection_postulation->execute();
$listepostulation=$selection_postulation->fetchAll();

$selectOffre='SELECT of.Id, of.Titre, of.Description, tc.Nom_type_contrat, mt.Nom_mode_travail, of.Id_type_contrat, of.Id_statut,vl.Nom_ville, st.Statut, of.Mission, of.Profile, of.Duree FROM offres of
JOIN types_contrats tc ON of.Id_type_contrat = tc.Id
JOIN modes_travails mt ON of.Id_mode_travail = mt.Id
JOIN statuts st ON of.Id_statut = st.Id
JOIN villes vl ON of.Id_ville = vl.Id
WHERE of.Id_statut=2
ORDER BY of.Id desc';
$selection_Offre=$mysqlClient->prepare($selectOffre);
$selection_Offre->execute();
$listeOffre=$selection_Offre->fetchAll();


// evoi le formulair de contacte dans la basse de donné 

function enregistrerContact($mysqlClient, $nom, $email, $sujet, $message) {
    try {
        // Validation des données
        if (empty($nom) || empty($email) || empty($sujet) || empty($message)) {
            return false;
        }

        // Validation email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Limitation de la longueur pour éviter les problèmes
        $nom = substr(trim($nom), 0, 128);
        $email = substr(trim($email), 0, 256);
        $sujet = substr(trim($sujet), 0, 256);
        $message = substr(trim($message), 0, 65535);

        $sql = "INSERT INTO contacts (nom, email, sujet, message)
                VALUES (:nom, :email, :sujet, :message)";

        $stmt = $mysqlClient->prepare($sql);

        return $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'sujet' => $sujet,
            'message' => $message
        ]);

    } catch (Exception $e) {
        return false;
    }
}




?>