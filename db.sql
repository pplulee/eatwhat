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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`) values 
(1,'中餐'),
(2,'西餐'),
(3,'癌'),
(4,'日料'),
(5,'狗都不吃'),
(6,'憨八嘎');

/*Table structure for table `restaurant` */

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text,
  `postcode` varchar(9) DEFAULT NULL,
  `richness` tinyint(4) NOT NULL DEFAULT '-1',
  `method` enum('takeaway','eatin','both') NOT NULL,
  `priority` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `richness` (`richness`),
  CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`richness`) REFERENCES `richness` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant` */

insert  into `restaurant`(`id`,`name`,`address`,`postcode`,`richness`,`method`,`priority`) values 
(1,'Nando\'s Manchester - Oxford Road','Oxford Rd The Quad, Manchester','M1 5QS',2,'both',0),
(2,'McDonald\'s','36/38 Oxford St, Manchester','M1 5EJ',1,'both',0);

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

insert  into `restaurant_tagmap`(`restaurant_id`,`category_id`) values 
(1,2),
(1,3),
(2,2),
(2,5);

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
(5,'皇朝会',5),
(6,'默认',-1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
