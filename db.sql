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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`) values 
(1,'中餐'),
(2,'亚洲料理'),
(3,'癌'),
(4,'家乡の美食'),
(5,'狗都不吃'),
(6,'憨八嘎'),
(7,'欧洲料理'),
(8,'美洲料理'),
(9,'带英本帮菜'),
(10,'pb最爱的vegan'),
(11,'速食');

/*Table structure for table `restaurant` */

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text,
  `postcode` varchar(9) DEFAULT NULL,
  `richness` tinyint(4) DEFAULT '-1',
  `method` enum('takeaway','eatin','both') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'both',
  `priority` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `richness` (`richness`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant` */

insert  into `restaurant`(`id`,`name`,`address`,`postcode`,`richness`,`method`,`priority`) values 
(1,'Nando\'s Manchester - Oxford Road','Oxford Rd The Quad, Manchester','M1 5QS',2,'both',0),
(2,'McDonald\'s','36/38 Oxford St, Manchester','M1 5EJ',1,'both',0),
(4,'Red Restaurant 红餐厅','Basement, 103 Portland St, Manchester',NULL,-1,'both',0),
(5,'湘之味','1st Floor, 19-21 George St, Manchester',NULL,3,'both',0),
(6,'小羊城','17 George St, Manchester',NULL,2,'both',0),
(7,'Star Chef星厨','61-63 Whitworth St, Manchester',NULL,-1,'both',0),
(8,'中原餐厅','86 Princess St, Manchester',NULL,-1,'both',0),
(9,'东馆','73 Cavendish St, Manchester',NULL,3,'both',0),
(10,'美点菜馆','45-47 Faulkner St, Manchester',NULL,2,'both',0),
(11,'天外天','Heron House, 1 Lincoln Square, Manchester',NULL,3,'both',0),
(12,'羊城楼','34 Princess St, Manchester',NULL,3,'both',0),
(13,'翠华大酒楼','1st floor, Connaught Bldg, 58-60 George St, Manchester',NULL,2,'both',0),
(14,'川锅香','45-47 Faulkner Street (upper ground floor), Manchester',NULL,3,'both',0),
(15,'大家乐','59 Faulkner St, Manchester',NULL,2,'both',0),
(16,'皇城酒楼','Amadeus House, 52-56 George St, Manchester',NULL,-1,'both',0),
(17,'红辣椒','70-72 Portland St, Manchester',NULL,2,'both',0),
(18,'红辣椒8号店 RED CHILLI（曼大店）','403 Oxford Rd, Manchester',NULL,2,'both',0),
(19,'椒香馆','The Quadrangle, 6, 1 Lower Ormond St, Manchester',NULL,1,'both',0),
(20,'品味','28 Princess St, Manchester',NULL,4,'both',0),
(21,'老北京烤鸭馆','1 Liverpool St., Salford',NULL,-1,'both',0),
(22,'金煌大酒楼','1st & 2nd Floor Wing Yip Business Centre, Cassidy Close, Ancoats, Manchester',NULL,2,'both',0),
(23,'辣妹子','Chester St, City Centre, Manchester',NULL,2,'both',0),
(24,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',NULL,-1,'both',0),
(25,'One Plus Chinese Restaurant','42 Charles St, Manchester',NULL,2,'both',0),
(26,'皇城酒樓','58 George St, Manchester',NULL,-1,'both',0),
(27,'Tampopo Albert Square','16 Albert Square, Manchester',NULL,2,'both',0),
(28,'萤火虫韩国料理','77 Princess St, Manchester',NULL,2,'both',0),
(29,'天外天大排档','Arndale House, Market St, Manchester',NULL,1,'both',0),
(30,'Manchester Chinese Restaurant','48A George St, Manchester',NULL,1,'both',0),
(31,'Tai Wu','81-97 Upper Brook St, Manchester',NULL,2,'both',0),
(32,'Chuan Restaurant','44 Canal St, Manchester',NULL,-1,'both',0),
(33,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',NULL,1,'both',0),
(34,'Phetpailin Thai Restaurant','46 George St, Manchester',NULL,-1,'both',0),
(35,'I Am Pho','44 George St, Manchester',NULL,-1,'both',0),
(36,'必胜客餐厅','6/12 Fountain St, Manchester',NULL,2,'both',0),
(37,'63 Degrees','104 High St, Manchester',NULL,3,'eatin',0),
(38,'必胜客餐厅','15 Corporation St, Manchester',NULL,2,'both',0),
(39,'中国城','56 Faulkner St, Manchester',NULL,-1,'both',0),
(40,'Emoji Restaurant','28 Higher Cambridge St, Manchester',NULL,-1,'both',0),
(41,'Koreana Restaurant','40A King St W, Manchester',NULL,2,'both',0),
(42,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',NULL,2,'both',0),
(43,'MyLahore Manchester','14-18 Wilmslow Rd, Rusholme, Manchester',NULL,2,'both',0),
(44,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',NULL,4,'eatin',0),
(45,'One Plus Chinese Restaurant','42 Charles St, Manchester',NULL,2,'both',0),
(46,'皇城酒樓','58 George St, Manchester',NULL,-1,'both',0),
(47,'Tampopo Albert Square','16 Albert Square, Manchester',NULL,2,'both',0),
(48,'萤火虫韩国料理','77 Princess St, Manchester',NULL,2,'both',0),
(49,'天外天大排档','Arndale House, Market St, Manchester',NULL,1,'both',0),
(50,'Manchester Chinese Restaurant','48A George St, Manchester',NULL,1,'both',0),
(51,'Tai Wu','81-97 Upper Brook St, Manchester',NULL,2,'both',0),
(52,'Chuan Restaurant','44 Canal St, Manchester',NULL,-1,'both',0),
(53,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',NULL,1,'both',0),
(54,'Phetpailin Thai Restaurant','46 George St, Manchester',NULL,-1,'both',0),
(55,'I Am Pho','44 George St, Manchester',NULL,2,'both',0),
(56,'必胜客餐厅','6/12 Fountain St, Manchester',NULL,2,'both',0),
(57,'63 Degrees','104 High St, Manchester',NULL,3,'eatin',0),
(58,'必胜客餐厅','15 Corporation St, Manchester',NULL,2,'takeaway',0),
(59,'中国城','56 Faulkner St, Manchester',NULL,-1,'both',0),
(60,'Emoji Restaurant','28 Higher Cambridge St, Manchester',NULL,-1,'both',0),
(61,'Koreana Restaurant','40A King St W, Manchester',NULL,2,'both',0),
(62,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',NULL,3,'both',0),
(63,'MyLahore Manchester','14-18 Wilmslow Rd, Rusholme, Manchester',NULL,2,'both',0),
(64,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',NULL,-1,'both',0),
(65,'One Plus Chinese Restaurant','42 Charles St, Manchester',NULL,2,'both',0),
(66,'皇城酒樓','58 George St, Manchester',NULL,-1,'both',0),
(67,'Tampopo Albert Square','16 Albert Square, Manchester',NULL,2,'both',0),
(68,'萤火虫韩国料理','77 Princess St, Manchester',NULL,3,'both',0),
(69,'天外天大排档','Arndale House, Market St, Manchester',NULL,1,'both',0),
(70,'Manchester Chinese Restaurant','48A George St, Manchester',NULL,3,'both',0),
(71,'Tai Wu','81-97 Upper Brook St, Manchester',NULL,3,'both',0),
(72,'Chuan Restaurant','44 Canal St, Manchester',NULL,-1,'both',0),
(73,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',NULL,1,'both',0),
(74,'Phetpailin Thai Restaurant','46 George St, Manchester',NULL,-1,'both',0),
(75,'I Am Pho','44 George St, Manchester',NULL,3,'both',0),
(76,'必胜客餐厅','6/12 Fountain St, Manchester',NULL,2,'both',0),
(77,'63 Degrees','104 High St, Manchester',NULL,3,'both',0),
(78,'必胜客餐厅','15 Corporation St, Manchester',NULL,2,'takeaway',0),
(79,'中国城','56 Faulkner St, Manchester',NULL,-1,'both',0),
(80,'Emoji Restaurant','28 Higher Cambridge St, Manchester',NULL,-1,'both',0),
(81,'Koreana Restaurant','40A King St W, Manchester',NULL,3,'both',0),
(82,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',NULL,3,'both',0),
(83,'MyLahore Manchester','14-18 Wilmslow Rd, Rusholme, Manchester',NULL,2,'both',0),
(84,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',NULL,-1,'both',0),
(85,'One Plus Chinese Restaurant','42 Charles St, Manchester',NULL,2,'both',0),
(86,'皇城酒樓','58 George St, Manchester',NULL,4,'both',0),
(87,'Tampopo Albert Square','16 Albert Square, Manchester',NULL,2,'both',0),
(88,'萤火虫韩国料理','77 Princess St, Manchester',NULL,2,'both',0),
(89,'天外天大排档','Arndale House, Market St, Manchester',NULL,1,'both',0),
(90,'Manchester Chinese Restaurant','48A George St, Manchester',NULL,1,'both',0),
(91,'Tai Wu','81-97 Upper Brook St, Manchester',NULL,2,'both',0),
(92,'Chuan Restaurant','44 Canal St, Manchester',NULL,-1,'both',0),
(93,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',NULL,1,'both',0),
(94,'Phetpailin Thai Restaurant','46 George St, Manchester',NULL,-1,'both',0),
(95,'I Am Pho','44 George St, Manchester',NULL,2,'both',0),
(96,'必胜客餐厅','6/12 Fountain St, Manchester',NULL,2,'both',0),
(97,'63 Degrees','104 High St, Manchester',NULL,3,'both',0),
(98,'必胜客餐厅','15 Corporation St, Manchester',NULL,2,'both',0),
(99,'中国城','56 Faulkner St, Manchester',NULL,-1,'both',0),
(100,'Emoji Restaurant','28 Higher Cambridge St, Manchester',NULL,-1,'both',0),
(101,'Koreana Restaurant','40A King St W, Manchester',NULL,2,'both',0),
(102,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',NULL,2,'both',0),
(103,'MyLahore Manchester','14-18 Wilmslow Rd, Rusholme, Manchester',NULL,2,'both',0),
(104,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',NULL,-1,'both',0),
(105,'One Plus Chinese Restaurant','42 Charles St, Manchester',NULL,2,'both',0),
(106,'皇城酒樓','58 George St, Manchester',NULL,-1,'both',0),
(107,'Tampopo Albert Square','16 Albert Square, Manchester',NULL,2,'both',0),
(108,'萤火虫韩国料理','77 Princess St, Manchester',NULL,2,'both',0),
(109,'天外天大排档','Arndale House, Market St, Manchester',NULL,3,'both',0),
(110,'Manchester Chinese Restaurant','48A George St, Manchester',NULL,1,'both',0),
(111,'Tai Wu','81-97 Upper Brook St, Manchester',NULL,3,'both',0),
(112,'Chuan Restaurant','44 Canal St, Manchester',NULL,-1,'both',0),
(113,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',NULL,1,'both',0),
(114,'Phetpailin Thai Restaurant','46 George St, Manchester',NULL,-1,'both',0),
(115,'I Am Pho','44 George St, Manchester',NULL,2,'both',0),
(116,'必胜客餐厅','6/12 Fountain St, Manchester',NULL,2,'both',0),
(117,'63 Degrees','104 High St, Manchester',NULL,3,'both',0),
(118,'必胜客餐厅','15 Corporation St, Manchester',NULL,2,'takeaway',0),
(119,'中国城','56 Faulkner St, Manchester',NULL,-1,'both',0),
(120,'Emoji Restaurant','28 Higher Cambridge St, Manchester',NULL,-1,'both',0),
(121,'Koreana Restaurant','40A King St W, Manchester',NULL,2,'both',0),
(122,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',NULL,2,'both',0),
(123,'MyLahore Manchester','14-18 Wilmslow Rd, Rusholme, Manchester',NULL,2,'both',0);

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
(2,5),
(2,6),
(71,1),
(71,2),
(78,8),
(68,2),
(118,8),
(77,7),
(44,1),
(109,1),
(9,1),
(9,2),
(20,1),
(20,2),
(70,1),
(86,1),
(86,2),
(37,7),
(14,1),
(14,2),
(12,1),
(12,2),
(5,1),
(5,2),
(58,8),
(57,7),
(15,1),
(15,2),
(82,2),
(82,4),
(75,2),
(111,1),
(111,2),
(81,2),
(62,2),
(62,4);

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
