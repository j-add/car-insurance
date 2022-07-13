# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Database: car_insurance
# Generation Time: 2022-03-31 10:23:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table car_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_type`;

CREATE TABLE `car_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('s','m','l','xl') NOT NULL DEFAULT 's',
  `type_multiplier` float(2,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `car_type` WRITE;
/*!40000 ALTER TABLE `car_type` DISABLE KEYS */;

INSERT INTO `car_type` (`id`, `type`, `type_multiplier`)
VALUES
	(1,'s',1.5),
	(2,'m',1.8),
	(3,'l',2.0),
	(4,'xl',2.2);

/*!40000 ALTER TABLE `car_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cover_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cover_type`;

CREATE TABLE `cover_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` enum('3','3FT','FC') NOT NULL DEFAULT '3',
  `cover_multiplier` float(2,1) NOT NULL DEFAULT '0.6',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cover_type` WRITE;
/*!40000 ALTER TABLE `cover_type` DISABLE KEYS */;

INSERT INTO `cover_type` (`id`, `name`, `cover_multiplier`)
VALUES
	(1,'3',0.6),
	(2,'3FT',0.8),
	(3,'FC',0.9);

/*!40000 ALTER TABLE `cover_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quotes`;

CREATE TABLE `quotes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL DEFAULT '',
  `car_type_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL,
  `cost` varchar(255) NOT NULL DEFAULT '',
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;

INSERT INTO `quotes` (`id`, `customer_name`, `car_type_id`, `cover_id`, `cost`, `accepted`)
VALUES
	(1,'Cuthbert',2,3,'312.65',0),
	(2,'Gerbert',1,2,'270.98',0);

/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
