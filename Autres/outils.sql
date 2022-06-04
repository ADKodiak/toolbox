-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 juin 2022 à 16:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `outils`
--

-- --------------------------------------------------------

--
-- Structure de la table `boite`
--

DROP TABLE IF EXISTS `boite`;
CREATE TABLE IF NOT EXISTS `boite` (
  `id_boite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_boite`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boite`
--

INSERT INTO `boite` (`id_boite`, `nom`, `description`) VALUES
(1, 'boite1', 'belle');

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

DROP TABLE IF EXISTS `outils`;
CREATE TABLE IF NOT EXISTS `outils` (
  `id_outils` int(11) NOT NULL AUTO_INCREMENT,
  `fonction` varchar(50) NOT NULL,
  `marque` varchar(25) DEFAULT NULL,
  `garantie` int(11) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `etat` varchar(25) DEFAULT NULL,
  `id_boite` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL DEFAULT '1',
  `photo` varchar(250) DEFAULT NULL,
  `fichier` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_outils`),
  KEY `RelationBoiteOutils` (`id_boite`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `outils`
--

INSERT INTO `outils` (`id_outils`, `fonction`, `marque`, `garantie`, `date_achat`, `description`, `etat`, `id_boite`, `quantite`, `photo`, `fichier`) VALUES
(4, 'Décapeur', 'Boshe', 2, '2022-04-06', 'test', 'Non fonctionel', 1, 508, '', NULL),
(6, 'Arthur', 'D\'hertog', 0, '2022-05-04', '', 'Non fonctionel', 1, 1, 'https://media-exp1.licdn.com/dms/image/C4E03AQG1NbWLKmEO7w/profile-displayphoto-shrink_800_800/0/1604315189656?e=1657152000&amp;v=beta&amp;t=NPxNl7F8U32P1apSgTLGfpBHerC19Ytp9eO__J8yBRY', NULL),
(7, 'Arthur', 'D\'hertog', 0, '2022-05-04', 'bof', 'Non fonctionel', 1, 0, 'https://media-exp1.licdn.com/dms/image/C4E03AQG1NbWLKmEO7w/profile-displayphoto-shrink_100_100/0/1604315189656?e=1655337600&amp;v=beta&amp;t=q9aETAR0k3_X8iFiImhmXDsC155UZU2EHCwakoJnmIo', NULL),
(8, 'Arthur', 'D\'hertog', -1, '2022-05-04', 'un peu prétentieux \r\nun peu intelligent \r\nun peu bo ', 'Mauvais état', 1, 1, 'https://www.troiscouleurs.fr/wp-content/uploads/2017/06/miguel-vasquez-miguel-vasquez-bestfriends12-465-581-int.jpg', NULL),
(9, 'Testo', 'Testo', 12, '2022-05-03', 'Magnifique', 'Non fonctionel', 1, 3, '', NULL),
(10, 'alex ', 'dache', 6, '2022-05-19', '', 'Neuf', 1, 1, '', NULL),
(11, 'fichier', 'dache', 1, '2022-04-28', '', 'Bon état', 1, -1, '', NULL),
(12, 'fi', 'D\'hertog', 1, '2022-04-29', '', 'Neuf', 1, 1, '', 'uploads/alex.jpg'),
(13, 'boite ', 'dache', 12, '2022-05-20', 'bo', 'Bon état', 1, 12, '', 'uploads/Arthur_grant.jpg'),
(16, 'cyril', 'kaisin', -1, '2022-05-18', '', 'Non fonctionel', 1, 1, '', 'uploads/B32C1072-E9A5-44F1-96B5-4BB97DF66318.jpg'),
(18, 'Marteau', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `id_boite` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_boite`,`id_utilisateur`),
  UNIQUE KEY `RelationPossederBoite` (`id_boite`),
  KEY `RelationPossederUtilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`id_boite`, `id_utilisateur`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `langue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mdp`, `mail`, `langue`) VALUES
(1, 'D\'Hertog', 'Arthur', '$2y$10$pNJNxxxW7nD3vt04KxOh8uEiQURHCQ6I/3FbLusXVUQ50hobNXX6a', 'arthur@dhertog.be', 'fr'),
(2, 'Dache', 'Alexandra', '$2y$10$BtvQeX8EInjmPlYyDSa.beIvoXH5w7Gdxt9fyPFsUGhhT8S.JR94.', 'alexia.dache@gmail.com', 'en');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `outils`
--
ALTER TABLE `outils`
  ADD CONSTRAINT `RelationOutilsBoite` FOREIGN KEY (`id_boite`) REFERENCES `boite` (`id_boite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `RelationPossederBoite` FOREIGN KEY (`id_boite`) REFERENCES `boite` (`id_boite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RelationPossederUtilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
