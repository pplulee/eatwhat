/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.12 : Database - eatwhat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eatwhat` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `eatwhat`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`) values 
(1,'中餐'),
(2,'亚洲料理'),
(3,'癌'),
(4,'家乡の美食'),
(6,'憨八嘎'),
(7,'欧洲料理'),
(8,'美洲料理'),
(9,'Bri&#039;ish'),
(14,'希腊菜'),
(15,'卷'),
(16,'炸鸡'),
(17,'披萨'),
(18,'奶茶'),
(19,'火锅'),
(20,'烤肉'),
(21,'非洲料理');

/*Table structure for table `restaurant` */

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `richness` tinyint(4) DEFAULT '-1',
  `method` enum('takeaway','eatin','both') NOT NULL DEFAULT 'both',
  `priority` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `richness` (`richness`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant` */

insert  into `restaurant`(`id`,`name`,`richness`,`method`,`priority`) values 
(1,'Nando&#039;s - Oxford Road',2,'both',0),
(2,'McDonald&#039;s',1,'both',0),
(3,'Red Restaurant 红餐厅',3,'both',0),
(4,'湘之味',3,'both',0),
(5,'小羊城',3,'both',0),
(6,'Star Chef星厨',3,'both',0),
(7,'中原餐厅',3,'both',0),
(8,'东馆',4,'both',0),
(9,'美点菜馆',3,'both',0),
(10,'天外天',3,'both',0),
(11,'翠华大酒楼',4,'both',0),
(12,'川锅香',3,'both',0),
(13,'大家乐',3,'both',0),
(14,'皇城酒楼',3,'both',0),
(15,'红辣椒',3,'both',0),
(16,'红辣椒8号店 RED CHILLI（曼大店）',3,'both',0),
(17,'椒香馆',1,'both',0),
(18,'品味',3,'both',0),
(19,'老北京烤鸭馆',3,'both',0),
(20,'金煌大酒楼',4,'both',0),
(21,'星期八火锅',4,'eatin',0),
(22,'One Plus',2,'both',0),
(23,'皇城酒樓',3,'both',0),
(24,'Tampopo Albert Square',3,'both',0),
(25,'萤火虫韩国料理',3,'both',0),
(26,'羊城楼',3,'both',0),
(27,'Manchester Chinese Restaurant 曼城楼',3,'both',0),
(28,'Tai Wu',3,'both',0),
(29,'Chuan Restaurant',3,'both',0),
(30,'Restaurant Nur Malaysia Manchester',2,'both',0),
(31,'Phetpailin Thai Restaurant',3,'both',0),
(32,'I Am Pho',3,'both',0),
(34,'63 Degrees',3,'eatin',0),
(36,'Emoji Restaurant',3,'both',0),
(37,'辣妹子',3,'both',0),
(38,'Koreana Restaurant',3,'both',0),
(39,'Yuzu Japanese Tapas',3,'both',0),
(40,'Chimaek',2,'both',0),
(42,'WAZUZHI (formerly Wasabi)',3,'both',0),
(43,'Try Thai',3,'both',0),
(44,'天外天大排档',2,'both',0),
(45,'Plymouth Grove Chinese Restaurant 小树林',3,'both',0),
(46,'Jin Ji Chinese Restaurant 錦記私房菜館',2,'both',0),
(47,'CHEF DIAO 刁师傅餐馆',2,'both',0),
(48,'滋味烤鱼 Spicy city Restaurants',3,'both',0),
(49,'The Rice Bowl',3,'both',0),
(50,'Szechuan Kitchen',1,'both',0),
(51,'京粤家',3,'both',0),
(52,'烧一丁',2,'both',0),
(53,'New Gi Foo Chinese Takeaway',3,'both',0),
(54,'Oodles Manchester',2,'both',0),
(55,'SWEATING CHICKEN叫只蒸鸡',2,'both',0),
(56,'WOOD Manchester',4,'eatin',0),
(57,'My Thai Restaurant',2,'both',0),
(58,'Turtle Bay',3,'both',0),
(59,'Pizza Express',3,'eatin',0),
(60,'Don Giovanni | Italian Restaurant Manchester',4,'both',0),
(61,'Honest Burgers Manchester',3,'both',0),
(62,'Wasabi Sushi Restaurant',3,'both',0),
(63,'Ohio Fried Chicken',1,'takeaway',0),
(64,'YO! - Manchester Piccadilly',3,'both',0),
(65,'Do Eat Restaurant',3,'both',0),
(66,'Shawarma Wraps &amp; Salad Box',1,'takeaway',0),
(67,'The Athenian - Greek Gyros &amp; Souvlaki',1,'both',0),
(68,'Nomi Katsu',2,'takeaway',0),
(69,'Laros - Greek Street Food MCR',2,'both',0),
(70,'Dixy Chicken',2,'both',0),
(71,'Zaytoni',2,'both',0),
(72,'KFC',1,'takeaway',0),
(73,'Monga Fried Chicken 艋舺雞排',2,'takeaway',0),
(74,'Five Guys',2,'both',0),
(75,'Pizza Hut',3,'both',0),
(76,'Royal China Club',5,'eatin',0),
(77,'Hutong',5,'eatin',0),
(78,'WooTea Manchester 曼城乌叶',2,'both',0),
(79,'Happy Lemon',2,'both',0),
(80,'Chatime 日出茶太',2,'both',0),
(81,'ICFT',2,'both',0),
(82,'Yifang Fruit Tea Manchester University Green',2,'both',0),
(83,'A LITTLE TEA',2,'both',0),
(84,'OHAYO TEA',2,'both',0),
(85,'Gong cha Oxford Road',2,'both',0),
(86,'Uncle T',2,'both',0),
(87,'Tealive',2,'both',0),
(88,'A Nice Sip',2,'both',0),
(89,'Bobo Tea MCR',2,'both',0),
(90,'Ai Tea Drinks 珍珠奶茶',2,'both',0),
(91,'Croyaki Tea',2,'both',0),
(95,'ETCI MEHMET | Turkish Steak & Burger House',4,'eatin',0),
(96,'Hello Oriental',3,'eatin',0);

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
(37,1),
(37,2),
(46,1),
(46,2),
(38,2),
(61,6),
(61,7),
(61,8),
(36,1),
(36,2),
(43,2),
(50,1),
(50,2),
(14,1),
(14,2),
(48,1),
(48,2),
(23,1),
(23,2),
(22,1),
(22,2),
(45,1),
(45,2),
(25,2),
(19,1),
(19,2),
(4,1),
(4,2),
(39,2),
(39,4),
(56,7),
(7,1),
(7,2),
(6,1),
(6,2),
(6,19),
(76,1),
(76,2),
(44,1),
(44,2),
(64,2),
(64,4),
(55,1),
(55,2),
(55,16),
(55,18),
(16,1),
(16,2),
(58,8),
(57,2),
(71,2),
(71,15),
(20,1),
(20,2),
(13,1),
(13,2),
(74,6),
(74,8),
(77,1),
(77,2),
(11,1),
(11,2),
(51,1),
(51,2),
(12,1),
(12,2),
(28,1),
(28,2),
(3,1),
(3,2),
(49,1),
(49,2),
(29,1),
(29,2),
(29,20),
(62,2),
(62,4),
(15,1),
(15,2),
(32,2),
(5,1),
(5,2),
(10,1),
(10,2),
(53,1),
(53,2),
(27,1),
(27,2),
(42,2),
(42,4),
(18,1),
(18,2),
(8,1),
(8,2),
(8,19),
(8,20),
(26,1),
(26,2),
(65,1),
(65,2),
(40,8),
(40,16),
(60,7),
(52,1),
(52,2),
(30,2),
(59,8),
(59,17),
(75,8),
(75,17),
(34,7),
(21,1),
(21,2),
(21,19),
(24,2),
(54,2),
(31,2),
(70,7),
(70,8),
(70,9),
(70,16),
(78,18),
(79,18),
(80,18),
(81,18),
(82,18),
(83,18),
(84,18),
(85,18),
(86,18),
(87,18),
(88,18),
(89,18),
(90,18),
(91,18),
(17,1),
(17,2),
(17,18),
(2,6),
(2,8),
(2,15),
(2,16),
(72,6),
(72,8),
(72,15),
(72,16),
(67,7),
(67,14),
(67,15),
(47,1),
(47,2),
(66,2),
(66,15),
(69,7),
(69,14),
(69,15),
(73,8),
(73,16),
(73,18),
(68,2),
(68,4),
(95,6),
(95,8),
(9,1),
(9,2),
(96,1),
(63,6),
(63,8),
(63,15),
(63,16),
(1,3),
(1,6),
(1,20),
(1,21);

/*Table structure for table `richness` */

DROP TABLE IF EXISTS `richness`;

CREATE TABLE `richness` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
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
