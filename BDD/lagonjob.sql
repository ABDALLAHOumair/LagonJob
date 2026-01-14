-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 déc. 2025 à 18:12
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
  `Nom` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(256) NOT NULL,
  `Id_typ_contrat` int(11) NOT NULL,
  `Id_mode_travail` int(11) NOT NULL,
  `Id_ville` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Structure de la table `types_contrats`
--

CREATE TABLE `types_contrats` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'abdallah', 'oumair', 'oumairabdallah@gmail.com', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `Offre_type_contrat` (`Id_typ_contrat`),
  ADD KEY `Offre_mode_travail` (`Id_mode_travail`),
  ADD KEY `Offre_ville` (`Id_ville`);

--
-- Index pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Postulation_user` (`Id_user`),
  ADD KEY `postulation_offre` (`Id_offre`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `postulations`
--
ALTER TABLE `postulations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_contrats`
--
ALTER TABLE `types_contrats`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `Offre_mode_travail` FOREIGN KEY (`Id_mode_travail`) REFERENCES `modes_travails` (`Id`),
  ADD CONSTRAINT `Offre_type_contrat` FOREIGN KEY (`Id_typ_contrat`) REFERENCES `types_contrats` (`Id`),
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
