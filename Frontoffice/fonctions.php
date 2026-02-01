<?php
require_once(__DIR__ . '/connexionBDD.php');

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

//Selection des utilisateurs
$selectUser='SELECT * FROM user';
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

$selectOffre='SELECT of.Id, of.Titre, of.Description, tc.Nom_type_contrat, mt.Nom_mode_travail, vl.Nom_ville, st.Statut, of.Mission, of.Profile, of.Duree FROM offres of
JOIN types_contrats tc ON of.Id_type_contrat = tc.Id
JOIN modes_travails mt ON of.Id_mode_travail = mt.Id
JOIN statuts st ON of.Id_statut = st.Id
JOIN villes vl ON of.Id_ville = vl.Id';
$selection_Offre=$mysqlClient->prepare($selectOffre);
$selection_Offre->execute();
$listeOffre=$selection_Offre->fetchAll();
?>