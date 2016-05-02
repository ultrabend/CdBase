-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 31 Août 2015 à 18:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `id_track` tinyint(3) unsigned NOT NULL,
  `ncd` tinyint(2) unsigned DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1185 ;

-- --------------------------------------------------------

--
-- Structure de la table `bands`
--

CREATE TABLE IF NOT EXISTS `bands` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `brainz_band` varchar(30) NOT NULL,
  `name` varchar(45) NOT NULL,
  `country` varchar(30) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  `yearbegin` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

-- --------------------------------------------------------

--
-- Structure de la table `base`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id_album` smallint(6) NOT NULL AUTO_INCREMENT,
  `brainz_album` varchar(40) NOT NULL,
  `id_band` smallint(5) unsigned NOT NULL,
  `title` varchar(80) NOT NULL,
  `year` varchar(12) NOT NULL,
  `nb_tracks` tinyint(4) NOT NULL,
  `label` varchar(30) NOT NULL,
  `barcode` varchar(40) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `media` tinyint(4) NOT NULL,
  `genre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
