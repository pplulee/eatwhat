/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 8.0.12 : Database - eatwhat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`) values 
(1,'默认分类');

/*Table structure for table `restaurant` */

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text,
  `richness` tinyint(4) DEFAULT '-1',
  `method` enum('takeaway','eatin','both') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'both',
  `priority` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `richness` (`richness`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant` */

insert  into `restaurant`(`id`,`name`,`address`,`richness`,`method`,`priority`) values 
(1,'McDonald\'s','36/38 Oxford St, Manchester',1,'both',0);

/*Table structure for table `restaurant_tagmap` */

DROP TABLE IF EXISTS `restaurant_tagmap`;

CREATE TABLE `restaurant_tagmap` (
  `restaurant_id` smallint(5) unsigned NOT NULL,
  `category_id` tinyint(4) unsigned NOT NULL,
  KEY `category_id` (`category_id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `restaurant_tagmap_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `restaurant_tagmap_ibfk_3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `restaurant_tagmap` */

/*Table structure for table `richness` */

DROP TABLE IF EXISTS `richness`;

CREATE TABLE `richness` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price_count` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `richness` */

insert  into `richness`(`id`,`name`,`price_count`) values 
(1,'省钱',1),
(2,'正常',2),
(3,'消费',3),
(4,'狠狠消费',4),
(5,'皇朝会',5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
