-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 25 Juillet 2017 à 09:50
-- Version du serveur :  5.7.18-0ubuntu0.16.10.1
-- Version de PHP :  7.0.18-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biker`
--

-- --------------------------------------------------------

--
-- Structure de la table `JLpeLJpmTp_events`
--

CREATE TABLE `JLpeLJpmTp_events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` varchar(20) NOT NULL,
  `endDate` date NOT NULL,
  `description` text NOT NULL,
  `location` varchar(120) NOT NULL,
  `contribution` varchar(30) NOT NULL,
  `idUsers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `JLpeLJpmTp_events`
--

INSERT INTO `JLpeLJpmTp_events` (`id`, `name`, `startDate`, `startTime`, `endDate`, `description`, `location`, `contribution`, `idUsers`) VALUES
(10, 'test', '2017-07-23', '15:00:00', '2017-07-24', 'hgfdgfhffhfgfghgjjhfh', 'noyon', '10', 2),
(12, 'rock fest', '2017-08-05', '19:00:00', '2017-08-05', 'show sexy\r\nbuvette\r\nconcert', '5 rue de l\'enfer 60000 Beauvais', '15', 17);

-- --------------------------------------------------------

--
-- Structure de la table `JLpeLJpmTp_group`
--

CREATE TABLE `JLpeLJpmTp_group` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_groupType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `JLpeLJpmTp_groupType`
--

CREATE TABLE `JLpeLJpmTp_groupType` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `JLpeLJpmTp_groupType`
--

INSERT INTO `JLpeLJpmTp_groupType` (`id`, `name`) VALUES
(1, 'MC'),
(2, 'MCP'),
(3, 'ASSO'),
(4, 'FEDERATION'),
(5, 'INDEPENDANT');

-- --------------------------------------------------------

--
-- Structure de la table `JLpeLJpmTp_users`
--

CREATE TABLE `JLpeLJpmTp_users` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `idMotorcycleClub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `JLpeLJpmTp_users`
--

INSERT INTO `JLpeLJpmTp_users` (`id`, `mail`, `login`, `password`, `idMotorcycleClub`) VALUES
(2, 'guillaume.lebot@free.fr', 'guihome', '$2y$10$KsWd/2rhUHhvNprLfiODEOLox4jqxfFa8XYgQTpON3tANosYfXo7m', NULL),
(3, 'quentin@hotmail.com', 'quentin', '$2y$10$ZRN6rQuvPWSR24pB79oMwu5b5wxm2MtX3QCMmD4bv8N4.aGJSlX6m', NULL),
(7, 'Gohm@toto.com', 'ohm', '$2y$10$zSCVqCI06ZOH89GppY8FJ.xiM3s7jsaOTyFAa/OPsTK5vXipswKy6', NULL),
(9, 'priscilia@orange.fr', 'priscilia', '$2y$10$90Bb2FGuuQemkhosTXKzgOTSWEoxn1KrJ9C8Lyy./rWqjBBRO3mAm', NULL),
(12, 'seb.lb@neuf.fr', 'SEB', '$2y$10$YrFQ.GHkiOTTUxGiIUC7/eC6dBiHJW8Jo4lccnYbFMK2X4V35kGzO', NULL),
(13, 'pipette@free.fr', 'pipette', '$2y$10$lp33eIIPzoW39oyMDOP66OMgQ8lESpGoIDvwI/ya0nyRl2By/Bl9.', NULL),
(14, 'jerome@orange.fr', 'jerome', '$2y$10$.iW5eZliHGZFA6n00Sm0.eOOWdB4UuzF5zIfCa9T/Y5WLaN4fDuR2', NULL),
(15, 'maeva@free.fr', 'maeva', '$2y$10$rTr9V0flXNeXKScDqk7AZOjmo1TlQ2FbZ1SLk.4RYOJWAJ4I0d4Wi', NULL),
(16, 'filou@bbox.fr', 'filou', '$2y$10$1fpWxPbRpRyMLA6X5V9uGumPB0eMizhnEWaIZ5ZkbVwEWTLyf89Sm', NULL),
(17, 'coco@orange.fr', 'corentin', '$2y$10$KPsIy3wJXEiOQlmjESwbHuSVG3jv/LcbHn3wsaKqQho3OWwh3bMVy', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `JLpeLJpmTp_events`
--
ALTER TABLE `JLpeLJpmTp_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_eventsIdUsers` (`idUsers`);

--
-- Index pour la table `JLpeLJpmTp_group`
--
ALTER TABLE `JLpeLJpmTp_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`);

--
-- Index pour la table `JLpeLJpmTp_groupType`
--
ALTER TABLE `JLpeLJpmTp_groupType`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `JLpeLJpmTp_users`
--
ALTER TABLE `JLpeLJpmTp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `FK_usersIdMotorcycleClub` (`idMotorcycleClub`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `JLpeLJpmTp_events`
--
ALTER TABLE `JLpeLJpmTp_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `JLpeLJpmTp_group`
--
ALTER TABLE `JLpeLJpmTp_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `JLpeLJpmTp_groupType`
--
ALTER TABLE `JLpeLJpmTp_groupType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `JLpeLJpmTp_users`
--
ALTER TABLE `JLpeLJpmTp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `JLpeLJpmTp_events`
--
ALTER TABLE `JLpeLJpmTp_events`
  ADD CONSTRAINT `FK_eventsIdUsers` FOREIGN KEY (`idUsers`) REFERENCES `JLpeLJpmTp_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `JLpeLJpmTp_users`
--
ALTER TABLE `JLpeLJpmTp_users`
  ADD CONSTRAINT `FK_usersIdMotorcycleClub` FOREIGN KEY (`idMotorcycleClub`) REFERENCES `JLpeLJpmTp_groupType` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
