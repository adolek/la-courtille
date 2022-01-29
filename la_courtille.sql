-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 29 jan. 2022 à 15:09
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
-- Base de données : `la_courtille`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

DROP TABLE IF EXISTS `activites`;
CREATE TABLE IF NOT EXISTS `activites` (
  `idActivite` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`idActivite`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`idActivite`, `image`) VALUES
(1, 'affichePlanningSilenceOnLit.jpg'),
(2, 'AfficheSiestesContÃ©es.jpg'),
(3, 'Ouvrir l\'Ã©cole aux parents pour la rÃ©ussite des enfants.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `titre` varchar(50) NOT NULL,
  `texte` varchar(3000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `idUser`, `titre`, `texte`, `image`, `audio`, `date`) VALUES
(9, 1, 'Les cousins', 'ljnlk,l', 'Les couzzz.JPG', '', '2022-01-12'),
(2, 1, 'La cantine', 'La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv ', '', '', '2022-01-05'),
(24, 1, 'actu 1', 'dsfxcgvbhjncfvgbhnjdctfvgybhunj', 'actu 1.jpeg', '', '2022-01-24'),
(23, 1, 'les Classe de neige', 'La classe est un espace ou les eleve peuvent ï¿½tudier', '', '', '2022-01-05');

-- --------------------------------------------------------

--
-- Structure de la table `modification`
--

DROP TABLE IF EXISTS `modification`;
CREATE TABLE IF NOT EXISTS `modification` (
  `idModif` int(11) NOT NULL AUTO_INCREMENT,
  `textModif` text,
  PRIMARY KEY (`idModif`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modification`
--

INSERT INTO `modification` (`idModif`, `textModif`) VALUES
(1, 'mercredi 29 septembre'),
(2, '13h30 Ã  15h pour les 6Ã¨me et 5Ã¨me'),
(3, '15h Ã  16h30 pour les 4Ã¨me et 3Ã¨me'),
(4, '14h Ã  15h30 pour le groupe 1'),
(5, '15h30 Ã  17h pour le groupe 2'),
(6, '13h30 Ã  15h pour les 6Ã¨me et 5Ã¨me'),
(7, '15h Ã  16h30 pour les 4Ã¨me et 3Ã¨me'),
(8, 'sefdxgsx'),
(9, 'Obtenir des gnÃ´mes calms');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` enum('admin','prof','secretariat','documentaliste') NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `mdp`, `nom`, `type`, `token`) VALUES
(1, 'admin@gmail.com', '$2y$12$0QjUsZOYNUXgxwmD8SMSwO2VSDk6QMnO9GJbrPpPjX2xucQF/iqLK', 'nom_admin', 'admin', NULL),
(5, 'moi@mail', '$2y$12$ikGUrGgNLqUK/2QbUfSopO2o4tiWG0bxGjMtP0E5zfNtn3S24KWaW', 'moi', 'prof', NULL),
(6, 'mail', '$2y$12$I4EF8PMNImgif16gGNNEde0saDAdY.3RxJGvrGggD77kh8Bdoe/cm', 'ad', 'prof', NULL),
(13, '1', '$2y$12$Et8xsURhmTrqZBP4Rab1xusC43Mii2G0Ft.Euxzb/z0E5h.3ZFGFS', 'elle', 'documentaliste', NULL),
(12, 'yes', '$2y$12$0PogDeZ/IFoa09rdx.GKNOn/hCReWUTauCHGEAXUlSdgZwqCa5tSW', 'secretaire', 'secretariat', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
