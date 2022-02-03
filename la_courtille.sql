-- phpMyAdmin SQL Dump
-- version 4.9.9
-- https://www.phpmyadmin.net/
--
-- Hôte : db5006292334.hosting-data.io
-- Généré le : jeu. 03 fév. 2022 à 14:13
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
(2, 'AfficheSiestesContees.jpg'),
(3, 'Ouvrir.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `idArticle` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `titre` varchar(50) NOT NULL,
  `texte` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `projet` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `idUser`, `titre`, `texte`, `image`, `audio`, `date`, `projet`) VALUES
(27, 1, 'Des ruches dans mon collège ', 'PUBLIC CONCERNÉ \r\nToutes classes de la 6e à la 3è et classes SEGPA. \r\n\r\nOBJECTIFS \r\n• Faire prendre conscience des enjeux pesant sur la biodiversité aux collégien.ne.s et aux équipes des collèges.\r\n• Utiliser des outils innovants pour répondre aux programmes pédagogiques de l\'Éducation nationale.\r\n\r\nTechniques\r\n• Favoriser la biodiversité en milieu urbain et au sein du collège.\r\n• Mener des études sur la vie de l\'abeille en ville. en lien avec différentes institutions et chercheur.e.s.\r\n\r\nDESCRIPTIF \r\nLa disparition des abeilles est un fait connu de tou.te.s aujourd\'hui. Elle est intimement liée à la perte de biodiversité. Mais des études montrent que les abeilles se sentent mieux en ville (moins de pollutions agricoles, climat plus doux, grandes variétés de fleurs.). C\'est pourquoi il est intéressant d\'implanter des ruches sur les collèges en Seine-Saint-Denis, en milieu urbain dense. L\'installation de ruches est un levier utile pour sensibiliser les jeunes à un mode d\'organisation sociale animale. D\'autre part, l\'utilisation pédagogique de la ruche est un élément innovant pour intéresser les collégien.ne.s à cette biodiversité et ainsi répondre aux programmes de l\'Éducation nationale. \r\n\r\nDéroulement du parcours \r\n• En amont. construction du projet pédagogique avec les collégien.ne.s, conditions nécessaires à la vie des abeilles (espèces mellifères proches du collège, point d\'eau, espace pour le décollage…), conditions de sécurité (toitures-terrasses accessibles mais sécurisées. espaces vert clos...), rencontre avec l\'apiculteur envisageable. \r\n• Installation de la ruche la première année : événement ludique et festif avec inauguration et séance pédagogique autour des ruches. \r\n• Suivi de la ruche : implication de la ruche dans les processus éducatifs (liens avec les programmes et surveillance de la ruche par l\'apiculteur. \r\n• Récolte du miel tous les ans : journée portes ouvertes du collège, événement ludique et festif avec présentation d\'une exposition liée au projet ou tout autre outil crée dans le cadre du parcours, et restitution des temps forts autour des ruches.\r\n• Des temps d\'animations spécifiques sont prévus. \r\n\r\nCONDITIONS D\'INSCRIPTION \r\nConstruire un projet pédagogique pertinent autour de l\'installation des ruches au sein de l\'établissement; puis contacter le service du Projet éducatif et de la jeunesse afin d\'examiner les critères logistiques nécessaires à l\'installation. \r\n\r\nMODE DE FINANCEMENT \r\nLe parcours est pris en charge par le Département pendant 2 ans.', 'Des ruches dans mon collège .jpg', '', '2022-01-31', 1);

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
(10, '8 ordinateurs'),
(11, 'A hauteur de la valeur de remplacement ou de la rÃ©paration'),
(12, '20.00 euros'),
(13, '10.00 euros'),
(14, '10.00 euros'),
(15, '30.00 euros'),
(16, '1er renouvellement 5.00 euros'),
(17, '2Ã¨me renouvellement 10.00 euros');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` enum('admin','prof','secretariat','documentaliste','mediateur') NOT NULL,
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
(13, '1', '$2y$12$Et8xsURhmTrqZBP4Rab1xusC43Mii2G0Ft.Euxzb/z0E5h.3ZFGFS', 'elle', 'documentaliste', NULL),
(14, 'blaisemiz@hotmail.fr', '$2y$12$XX0yPkWDU750GABTZ45a..UkiZmkkZ97At4lMypVCdJqH9jLehQDq', 'Blaise Misere', 'mediateur', NULL);

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
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `modification`
--
ALTER TABLE `modification`
  MODIFY `idModif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
