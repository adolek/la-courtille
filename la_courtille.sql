-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 jan. 2022 à 08:19
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `idUser`, `titre`, `texte`, `image`, `audio`, `date`) VALUES
(9, 1, 'Les couzzz', 'fezgfzeafezfzea', 'Les couzzz.JPG', '', '2022-01-12'),
(2, 1, 'La cantine', 'La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv ', '', '', '2022-01-05'),
(1, 1, 'Les Rûches', 'Dans les ruches, il y a des abeilles', 'Les abeilles.JPG', '', '2022-01-12'),
(23, 1, 'les Classe', 'La classe est un espace ou les eleve peuvent étudier', '', '', '2022-01-05');

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
  `type` enum('admin','prof') NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `mdp`, `nom`, `type`, `token`) VALUES
(1, 'admin@gmail.com', '$2y$12$0QjUsZOYNUXgxwmD8SMSwO2VSDk6QMnO9GJbrPpPjX2xucQF/iqLK', 'admin', 'admin', NULL),
(5, 'moi@mail', '$2y$12$ikGUrGgNLqUK/2QbUfSopO2o4tiWG0bxGjMtP0E5zfNtn3S24KWaW', 'moi', 'prof', NULL),
(6, 'mail', '$2y$12$I4EF8PMNImgif16gGNNEde0saDAdY.3RxJGvrGggD77kh8Bdoe/cm', 'ad', 'prof', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
