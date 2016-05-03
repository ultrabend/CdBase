SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `albums` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `brainz_album` varchar(40) CHARACTER SET latin1 NOT NULL,
  `band_id` smallint(5) unsigned NOT NULL,
  `title` varchar(80) CHARACTER SET latin1 NOT NULL,
  `year` varchar(12) CHARACTER SET latin1 NOT NULL,
  `nb_tracks` tinyint(4) NOT NULL,
  `label` varchar(30) CHARACTER SET latin1 NOT NULL,
  `barcode` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `format` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `media` tinyint(4) NOT NULL,
  `genre` varchar(40) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

CREATE TABLE IF NOT EXISTS `bands` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `brainz_band` varchar(30) NOT NULL,
  `name` varchar(45) NOT NULL,
  `country` varchar(30) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  `yearbegin` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `id_track` tinyint(3) unsigned NOT NULL,
  `ncd` tinyint(2) unsigned DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1234 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
