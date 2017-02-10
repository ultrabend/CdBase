-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 10 Février 2017 à 15:43
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cdbase`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `id` smallint(6) NOT NULL,
  `brainz_album` varchar(40) CHARACTER SET latin1 NOT NULL,
  `discogs_id` int(16) NOT NULL,
  `band_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(80) CHARACTER SET latin1 NOT NULL,
  `year` varchar(12) CHARACTER SET latin1 NOT NULL,
  `released` varchar(16) NOT NULL,
  `nb_tracks` tinyint(4) NOT NULL,
  `label` varchar(30) CHARACTER SET latin1 NOT NULL,
  `barcode` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `format` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `media` tinyint(4) NOT NULL,
  `genre` varchar(40) CHARACTER SET latin1 NOT NULL,
  `country` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bands`
--

CREATE TABLE `bands` (
  `id` smallint(3) UNSIGNED NOT NULL,
  `brainz_band` varchar(30) NOT NULL,
  `discogs_id` int(16) NOT NULL,
  `name` varchar(45) NOT NULL,
  `profile` text NOT NULL,
  `country` varchar(30) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  `yearbegin` varchar(4) DEFAULT NULL,
  `members` text NOT NULL,
  `urls` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `id_track` varchar(6) NOT NULL,
  `ncd` tinyint(2) UNSIGNED DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `duration` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` varchar(8) NOT NULL,
  `language` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `bands`
--
ALTER TABLE `bands`
  MODIFY `id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT pour la table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1130;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
