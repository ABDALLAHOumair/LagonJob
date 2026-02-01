-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 jan. 2026 à 06:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lagonjob`
--

-- --------------------------------------------------------

--
-- Structure de la table `modes_travails`
--

CREATE TABLE `modes_travails` (
  `Id` int(11) NOT NULL,
  `Nom_mode_travail` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modes_travails`
--

INSERT INTO `modes_travails` (`Id`, `Nom_mode_travail`) VALUES
(2, 'Télétravail'),
(3, 'Travail sur site'),
(4, 'Hybride');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(256) NOT NULL,
  `Id_type_contrat` int(11) NOT NULL,
  `Id_mode_travail` int(11) NOT NULL,
  `Id_ville` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Id_statut` int(11) NOT NULL,
  `Mission` varchar(1000) NOT NULL,
  `Profile` varchar(1000) NOT NULL,
  `Durée` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`Id`, `Titre`, `Id_type_contrat`, `Id_mode_travail`, `Id_ville`, `Description`, `Id_statut`, `Mission`, `Profile`, `Durée`) VALUES
(1, 'Développeur Web Junior', 1, 4, 20, 'Rejoignez notre équipe dynamique.', 2, 'Développer et maintenir des sites web (HTML, CSS, JavaScript), Intégrer des maquettes UI/UX (Figma, Adobe XD), Corriger des bugs et améliorer les performances, Participer à l’optimisation SEO technique, Collaborer avec, l’équipe design et back-end\r\n\r\nRédiger une documentation technique simple', 'Motivation, HTML/CSS, bases JavaScript, apprentissage rapide, travail en équipe, rigueur.', '6 mois'),
(2, 'Stage Assistant Marketing', 3, 3, 27, 'Stage de 6 mois.', 2, 'Participer à la création de contenus (réseaux sociaux, newsletters, blogs), Aider à la gestion des campagnes marketing digitales, Réaliser des études de marché et analyses de concurrence, Mettre à jour le site web et les supports commerciauxSuivre les indicateurs de performance (KPI), Assister à l’organisation d’événements ou de promotions', 'Créativité, communication, réseaux sociaux, marketing digital, organisation, esprit d’équipe.', '3 à 5 mois.'),
(3, 'Technicien Réseau', 2, 2, 35, 'Installation et maintenance.', 1, 'Installer et configurer les équipements réseau (routeurs, switches), Assurer la maintenance et le dépannage du réseau, Surveiller la sécurité et les performances réseau, Gérer les comptes utilisateurs et les accès, Documenter les incidents et interventions, Assister les utilisateurs en support technique.', 'Réseaux informatiques, maintenance, support technique, sécurité, organisation, réactivité.', 'Durée indéterminé '),
(4, 'Alternance Développeur Mobile', 4, 4, 16, 'Développement d\'applications.', 2, 'Développer des applications mobiles (Android / iOS / Flutter / React Native), Implémenter des fonctionnalités front-end et back-end, Tester et corriger les anomalies, Participer à la conception technique de l’application, Optimiser l’expérience utilisateur (UX), Publier et maintenir les applications sur les stores.', 'Programmation mobile, Android/iOS, bases en code, curiosité, autonomie, travail en équipe.', '5 mois'),
(5, 'Chef de Projet Digital', 2, 2, 9, 'Pilotage de projets digitaux.', 2, 'Piloter des projets web et digitaux de A à Z, Rédiger les cahiers des charges, Coordonner les équipes (développeurs, designers, marketing), Suivre les délais, budgets et livrables, Analyser les performances des projets, Assurer la relation client et le reporting.', 'Gestion de projet, organisation, coordination, communication, outils digitaux, leadership.', 'Durée indéterminé '),
(6, 'Stage Comptabilité', 3, 3, 30, 'Stage de 3 mois.', 2, 'Saisir et classer les pièces comptables, Participer à la gestion de la facturation, Aider aux rapprochements bancaires, Contribuer à la préparation des bilans, Mettre à jour les tableaux de suivi financier, Assister aux déclarations fiscales et sociales.', 'Saisie comptable, rigueur, organisation, bases comptables, confidentialité, chiffres.', '3 à 5 mois.');

-- --------------------------------------------------------

--
-- Structure de la table `postulations`
--

CREATE TABLE `postulations` (
  `Id` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Id_offre` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `Id` int(11) NOT NULL,
  `Statut` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`Id`, `Statut`) VALUES
(1, 'Non publiée'),
(2, 'Publiée');

-- --------------------------------------------------------

--
-- Structure de la table `types_contrats`
--

CREATE TABLE `types_contrats` (
  `Id` int(11) NOT NULL,
  `Nom_type_contrat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types_contrats`
--

INSERT INTO `types_contrats` (`Id`, `Nom_type_contrat`) VALUES
(1, 'CDD'),
(2, 'CDI'),
(3, 'Stage'),
(4, 'Alternance');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(128) NOT NULL,
  `Prenom` varchar(128) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `Nom`, `Prenom`, `Email`, `Password`) VALUES
(1, 'Toto', 'Toto', 'toto.titi@exemple.com', 'azerty'),
(2, 'abdallah', 'oumair', 'oumairabdallah@gmail.com', 'azerty'),
(3, 'abdallah', 'oumair', 'o.abdallah194', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `Id` int(11) NOT NULL,
  `Nom_ville` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`Id`, `Nom_ville`) VALUES
(1, 'Acoua'),
(2, 'Mtsangadoua'),
(3, 'Bandraboua'),
(4, 'Handréma'),
(5, 'Bandrélé'),
(6, 'Mtsamoudou'),
(7, 'Nyambadao'),
(8, 'Bouéni'),
(9, 'Hagnoundrou'),
(10, 'Bambo-Ouest'),
(11, 'Mzouazia'),
(12, 'Moinatrindi'),
(13, 'Mbouanatsa'),
(14, 'Chiconi'),
(15, 'Sohoa'),
(16, 'Chirongui'),
(17, 'Poroani'),
(18, 'Tsimkoura'),
(19, 'Miréréni'),
(20, 'Mramadoudou'),
(21, 'Malamani'),
(22, 'Dembéni'),
(23, 'Tsararano'),
(24, 'Iloni'),
(25, 'Ajangoua'),
(26, 'Ongojou'),
(27, 'Dzaoudzi'),
(28, 'Labattoir'),
(29, 'Kani-Kéli'),
(30, 'Choungui'),
(31, 'Kanibé'),
(32, 'M’Bouini'),
(33, 'Mronabéja'),
(34, 'Passy-Kéli'),
(35, 'Koungou'),
(36, 'Longoni'),
(37, 'Kangani'),
(38, 'Trévani'),
(39, 'Majicavo-Koropa'),
(40, 'Majicavo-Lamir'),
(41, 'Mamoudzou'),
(42, 'Kawéni'),
(43, 'Mtsapéré'),
(44, 'Cavani'),
(45, 'Passamaïnty'),
(46, 'Tsoundzou 1'),
(47, 'Tsoundzou 2'),
(48, 'Vahibé'),
(49, 'Mtsamboro'),
(50, 'Mtsahara'),
(51, 'Hamjago'),
(52, 'Mtsangamouji'),
(53, 'Chembenyoumba'),
(54, 'Ouangani'),
(55, 'Barakani'),
(56, 'Kahani'),
(57, 'Pamandzi'),
(58, 'Sada'),
(59, 'Mangajou'),
(60, 'Tsingoni'),
(61, 'Combani');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `modes_travails`
--
ALTER TABLE `modes_travails`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Offre_type_contrat` (`Id_type_contrat`),
  ADD KEY `Offre_mode_travail` (`Id_mode_travail`),
  ADD KEY `Offre_ville` (`Id_ville`),
  ADD KEY `Offre_statut` (`Id_statut`);

--
-- Index pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Postulation_user` (`Id_user`),
  ADD KEY `postulation_offre` (`Id_offre`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `types_contrats`
--
ALTER TABLE `types_contrats`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `modes_travails`
--
ALTER TABLE `modes_travails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `postulations`
--
ALTER TABLE `postulations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types_contrats`
--
ALTER TABLE `types_contrats`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `Offre_mode_travail` FOREIGN KEY (`Id_mode_travail`) REFERENCES `modes_travails` (`Id`),
  ADD CONSTRAINT `Offre_statut` FOREIGN KEY (`Id_statut`) REFERENCES `statuts` (`Id`),
  ADD CONSTRAINT `Offre_type_contrat` FOREIGN KEY (`Id_type_contrat`) REFERENCES `types_contrats` (`Id`),
  ADD CONSTRAINT `Offre_ville` FOREIGN KEY (`Id_ville`) REFERENCES `villes` (`Id`);

--
-- Contraintes pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD CONSTRAINT `Postulation_user` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `postulation_offre` FOREIGN KEY (`Id_offre`) REFERENCES `offres` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
