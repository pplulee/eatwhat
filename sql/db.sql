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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
(11,'速食'),
(14,'希腊菜'),
(15,'卷'),
(16,'炸鸡'),
(17,'披萨');

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant` */

insert  into `restaurant`(`id`,`name`,`address`,`richness`,`method`,`priority`) values 
(1,'Nando\'s Manchester - Oxford Road','Oxford Rd The Quad, Manchester',2,'both',0),
(2,'McDonald\'s','36/38 Oxford St, Manchester',1,'both',0),
(3,'Red Restaurant 红餐厅','Basement, 103 Portland St, Manchester',-1,'both',0),
(4,'湘之味','1st Floor, 19-21 George St, Manchester',2,'both',0),
(5,'小羊城','17 George St, Manchester',2,'both',0),
(6,'Star Chef星厨','61-63 Whitworth St, Manchester',-1,'both',0),
(7,'中原餐厅','86 Princess St, Manchester',-1,'both',0),
(8,'东馆','73 Cavendish St, Manchester',2,'both',0),
(9,'美点菜馆','45-47 Faulkner St, Manchester',2,'both',0),
(10,'天外天','Heron House, 1 Lincoln Square, Manchester',3,'both',0),
(11,'翠华大酒楼','1st floor, Connaught Bldg, 58-60 George St, Manchester',2,'both',0),
(12,'川锅香','45-47 Faulkner Street (upper ground floor), Manchester',2,'both',0),
(13,'大家乐','59 Faulkner St, Manchester',1,'both',0),
(14,'皇城酒楼','Amadeus House, 52-56 George St, Manchester',-1,'both',0),
(15,'红辣椒','70-72 Portland St, Manchester',2,'both',0),
(16,'红辣椒8号店 RED CHILLI（曼大店）','403 Oxford Rd, Manchester',2,'both',0),
(17,'椒香馆','The Quadrangle, 6, 1 Lower Ormond St, Manchester',-1,'both',0),
(18,'品味','28 Princess St, Manchester',-1,'both',0),
(19,'老北京烤鸭馆','1 Liverpool St., Salford',-1,'both',0),
(20,'金煌大酒楼','1st & 2nd Floor Wing Yip Business Centre, Cassidy Close, Ancoats, Manchester',2,'both',0),
(21,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',-1,'both',0),
(22,'One Plu','42 Charles St, Manchester',2,'both',0),
(23,'皇城酒樓','58 George St, Manchester',-1,'both',0),
(24,'Tampopo Albert Square','16 Albert Square, Manchester',2,'both',0),
(25,'萤火虫韩国料理','77 Princess St, Manchester',2,'both',0),
(26,'羊城楼','34 Princess St, Manchester',2,'both',0),
(27,'Manchester Chinese Restaurant 曼城楼','48A George St, Manchester',1,'both',0),
(28,'Tai Wu','81-97 Upper Brook St, Manchester',2,'both',0),
(29,'Chuan Restaurant','44 Canal St, Manchester',-1,'both',0),
(30,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',1,'both',0),
(31,'Phetpailin Thai Restaurant','46 George St, Manchester',-1,'both',0),
(32,'I Am Pho','44 George St, Manchester',2,'both',0),
(34,'63 Degrees','104 High St, Manchester',3,'both',0),
(36,'Emoji Restaurant','28 Higher Cambridge St, Manchester',-1,'both',0),
(37,'辣妹子','Chester St, City Centre, Manchester',2,'both',0),
(38,'Koreana Restaurant','40A King St W, Manchester',2,'both',0),
(39,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',2,'both',0),
(40,'Chimaek','Unit 8, The Quadrangle, Hulme St, Manchester',2,'both',0),
(42,'WAZUZHI (formerly Wasabi)','63 Faulkner St, Manchester',1,'both',0),
(43,'Try Thai','Upper Ground Floor, 52-54 Faulkner St, Manchester',2,'both',0),
(44,'天外天大排档','Arndale House, Market St, Manchester',1,'both',0),
(45,'Plymouth Grove Chinese Restaurant 小树林','65 Plymouth Grove, Manchester',1,'both',0),
(46,'Jin Ji Chinese Restaurant 錦記私房菜館','The Cantonese Chinese Restaurant, 52 Portland St, Manchester',-1,'both',0),
(47,'CHEF DIAO 刁师傅餐馆','92-94 Oldham St, Manchester',2,'both',0),
(48,'滋味烤鱼 Spicy city Restaurants','Faulkner St, Manchester',-1,'both',0),
(49,'The Rice Bowl','33A Cross St, Manchester',2,'both',0),
(50,'Szechuan Kitchen','57 Faulkner St, Manchester',-1,'both',0),
(51,'京粤家','8 Polygon St, Manchester',-1,'both',0),
(52,'烧一丁','Unit1, New Islington Mill Regent Trading Estate, Oldfield Rd, Manchester',-1,'both',0),
(53,'New Gi Foo Chinese Takeaway','621 Stretford Rd, Old Trafford, Stretford, Manchester',-1,'both',0),
(54,'Oodles Manchester','6A Oxford Rd, Manchester',-1,'both',0),
(55,'SWEATING CHICKEN叫只蒸鸡','298 Oxford Rd, Manchester',-1,'both',0),
(56,'WOOD Manchester','Jack Rosenthal St, Manchester',3,'both',0),
(57,'My Thai Restaurant','11 John Dalton St, Manchester',1,'both',0),
(58,'Turtle Bay','33-35 Oxford St, Manchester',2,'both',0),
(59,'Pizza Express','3, Tony Wilson Place, First St, Manchester',2,'both',0),
(60,'Don Giovanni | Italian Restaurant Manchester','1-2, Peter House, 1 Oxford St, Manchester',-1,'both',0),
(61,'Honest Burgers Manchester','36 Bridge St, Manchester',2,'both',0),
(62,'Wasabi Sushi Restaurant','14, The Printworks, Hanover, Withy Grove, Manchester',-1,'both',0),
(63,'Ohio Fried Chicken','24 Wilmslow Rd, Rusholme, Manchester',-1,'both',0),
(64,'YO! - Manchester Piccadilly','Upper Level, Piccadilly Station, Manchester',-1,'both',0),
(65,'Do Eat Restaurant','Unit B1, city tower, Mosley St, Manchester',-1,'both',0),
(66,'Shawarma Wraps & Salad Box','193 Wilmslow Road, Manchester',-1,'both',0),
(67,'The Athenian - Greek Gyros & Souvlaki','Unit 10, Foundry Business Park, Ordsall Lane, Salford, Manchester',-1,'both',0),
(68,'Nomi Katsu','Salford Editions Unit 10, Manchester,Foundry Business Park, Ordsall Lane, Salford, Manchester',-1,'both',0),
(69,'Laros - Greek Street Food MCR','Unit D, Aldow Enterprise Park, Manchester',-1,'both',0),
(70,'Dixy Chicken','135 Oxford Rd, Manchester',-1,'both',0),
(71,'Zaytoni','127b Oxford Road, Manchester',-1,'both',0),
(72,'KFC','12a Oxford Road, Manchester',-1,'both',0),
(73,'Monga Fried Chicken 艋舺雞排','61-63 Whitworth Street, Manchester',-1,'both',0),
(74,'Five Guys','Unit 4, university Green, Oxford Road, Manchester',-1,'both',0),
(75,'Pizza Hut','133 Oxford Rd, Manchester',-1,'both',0);

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
