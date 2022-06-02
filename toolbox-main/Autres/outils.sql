-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 mai 2022 à 12:59
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boite`
--

INSERT INTO `boite` (`id_boite`, `nom`, `description`) VALUES
(1, 'boite1', 'belle'),
(2, 'gtgtgt', 'gtgtgt'),
(3, 'Inventaire Stock B', 'Inventaire du stock '),
(4, 'jhddg', 'kjedj');

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
  `id_boite` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '1',
  `photo` varchar(250) DEFAULT NULL,
  `fichier` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_outils`),
  KEY `RelationBoiteOutils` (`id_boite`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `outils`
--

INSERT INTO `outils` (`id_outils`, `fonction`, `marque`, `garantie`, `date_achat`, `description`, `etat`, `id_boite`, `quantite`, `photo`, `fichier`) VALUES
(4, 'Décapeur', 'Boshe', 2, '2022-04-06', 'test', 'Non fonctionel', 1, 508, '', NULL),
(5, 'Marteau', NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL),
(6, 'Arthur', 'D\'hertog', 0, '2022-05-04', '', 'Non fonctionel', 1, 1, 'https://media-exp1.licdn.com/dms/image/C4E03AQG1NbWLKmEO7w/profile-displayphoto-shrink_800_800/0/1604315189656?e=1657152000&amp;v=beta&amp;t=NPxNl7F8U32P1apSgTLGfpBHerC19Ytp9eO__J8yBRY', NULL),
(7, 'Arthur', 'D\'hertog', 0, '2022-05-04', 'bof', 'Non fonctionel', 1, 0, 'https://media-exp1.licdn.com/dms/image/C4E03AQG1NbWLKmEO7w/profile-displayphoto-shrink_100_100/0/1604315189656?e=1655337600&amp;v=beta&amp;t=q9aETAR0k3_X8iFiImhmXDsC155UZU2EHCwakoJnmIo', NULL),
(8, 'Arthur', 'D\'hertog', -1, '2022-05-04', 'un peu prétentieux \r\nun peu intelligent \r\nun peu bo ', 'Mauvais état', 1, 1, 'https://www.troiscouleurs.fr/wp-content/uploads/2017/06/miguel-vasquez-miguel-vasquez-bestfriends12-465-581-int.jpg', NULL),
(9, 'Testo', 'Testo', 12, '2022-05-03', 'Magnifique', 'Non fonctionel', 1, 3, '', NULL),
(10, 'alex ', 'dache', 6, '2022-05-19', '', 'Neuf', 1, 1, '', NULL),
(11, 'fichier', 'dache', 1, '2022-04-28', '', 'Bon état', 1, -1, '', NULL),
(12, 'fi', 'D\'hertog', 1, '2022-04-29', '', 'Neuf', 1, 1, '', 'uploads/alex.jpg'),
(13, 'boite ', 'dache', 12, '2022-05-20', 'bo', 'Bon état', 1, 12, '', 'uploads/Arthur_grant.jpg'),
(14, 'Arthur', 'dache', 1, '2022-05-19', '', 'Mauvais état', 1, 12, '', 'uploads/Logo.jpg'),
(15, 'Baptiste', 'Lefebvre', 151, '2019-03-10', '', 'Bon état', 1, 1, '', NULL),
(16, 'cyril', 'kaisin', -1, '2022-05-18', '', 'Non fonctionel', 1, 1, '', 'uploads/B32C1072-E9A5-44F1-96B5-4BB97DF66318.jpg'),
(17, 'Marteau', NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, NULL);

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
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id_test`, `date`) VALUES
(1, '2022-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `tester`
--

DROP TABLE IF EXISTS `tester`;
CREATE TABLE IF NOT EXISTS `tester` (
  `id_outils` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  PRIMARY KEY (`id_outils`,`id_test`) USING BTREE,
  KEY `RelationTesterOutils` (`id_outils`) USING BTREE,
  KEY `RelationTesterTest` (`id_test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'D\'Hertog', 'Arthur', '$2y$10$pNJNxxxW7nD3vt04KxOh8uEiQURHCQ6I/3FbLusXVUQ50hobNXX6a', 'arthur@dhertog.be', NULL),
(2, 'Dache', 'Alexandra', '$2y$10$BtvQeX8EInjmPlYyDSa.beIvoXH5w7Gdxt9fyPFsUGhhT8S.JR94.', 'alexia.dache@gmail.com', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `outils`
--
ALTER TABLE `outils`
  ADD CONSTRAINT `RelationOutilsBoite` FOREIGN KEY (`id_boite`) REFERENCES `boite` (`id_boite`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `RelationPossederBoite` FOREIGN KEY (`id_boite`) REFERENCES `boite` (`id_boite`),
  ADD CONSTRAINT `RelationPossederUtilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `tester`
--
ALTER TABLE `tester`
  ADD CONSTRAINT `RelationTesterOutils` FOREIGN KEY (`id_outils`) REFERENCES `outils` (`id_outils`),
  ADD CONSTRAINT `RelationTesterTest` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
