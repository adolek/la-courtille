-- phpMyAdmin SQL Dump
-- version 4.9.9
-- https://www.phpmyadmin.net/
--
-- Hôte : db5006292334.hosting-data.io
-- Généré le : lun. 31 jan. 2022 à 14:26
-- Version du serveur : 5.7.36-log
-- Version de PHP : 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs5254611`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `idActivite` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE `articles` (
  `idArticle` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `titre` varchar(50) NOT NULL,
  `texte` varchar(3000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `idUser`, `titre`, `texte`, `image`, `audio`, `date`) VALUES
(2, 1, 'La cantine', 'La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv La cantine est un espace ou les eleve peuvent manger ljfnvlsnfg:nxvjlbnxlfknglkdf,bln xjcv ', '', '', '2022-01-05'),
(9, 1, 'Les cousins', 'ljnlk,l', 'Les couzzz.JPG', '', '2022-01-12'),
(23, 1, 'les Classe de neige', 'La classe est un espace ou les eleve peuvent ï¿½tudier', '', '', '2022-01-05'),
(24, 1, 'actu 1', 'dsfxcgvbhjncfvgbhnjdctfvgybhunj', 'actu 1.jpeg', '', '2022-01-24');

-- --------------------------------------------------------

--
-- Structure de la table `modification`
--

CREATE TABLE `modification` (
  `idModif` int(11) NOT NULL,
  `textModif` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `modification`
--

INSERT INTO `modification` (`idModif`, `textModif`) VALUES
(1, 'mercredi 29 septembre'),
(2, '13h30 à 15h pour les 6ème et 5ème'),
(3, '15h à 16h30 pour les 4ème et 3ème'),
(4, '14h à 15h30 pour le groupe 1'),
(5, '15h30 à 17h pour le groupe 2'),
(6, '13h30 à 15h pour les 6ème et 5ème'),
(7, '15h à 16h30 pour les 4ème et 3ème'),
(8, 'à déterminer'),
(9, 'à déterminer'),
(10, '8 ordinateurs');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` enum('admin','prof','secretariat','documentaliste') NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `mdp`, `nom`, `type`, `token`) VALUES
(1, 'admin@gmail.com', '$2y$12$0QjUsZOYNUXgxwmD8SMSwO2VSDk6QMnO9GJbrPpPjX2xucQF/iqLK', 'nom_admin', 'admin', NULL),
(5, 'moi@mail', '$2y$12$ikGUrGgNLqUK/2QbUfSopO2o4tiWG0bxGjMtP0E5zfNtn3S24KWaW', 'moi', 'prof', NULL),
(6, 'mail', '$2y$12$I4EF8PMNImgif16gGNNEde0saDAdY.3RxJGvrGggD77kh8Bdoe/cm', 'ad', 'prof', NULL),
(12, 'yes', '$2y$12$0PogDeZ/IFoa09rdx.GKNOn/hCReWUTauCHGEAXUlSdgZwqCa5tSW', 'secretaire', 'secretariat', NULL),
(13, '1', '$2y$12$Et8xsURhmTrqZBP4Rab1xusC43Mii2G0Ft.Euxzb/z0E5h.3ZFGFS', 'elle', 'documentaliste', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`idActivite`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`idModif`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `idActivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `modification`
--
ALTER TABLE `modification`
  MODIFY `idModif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
