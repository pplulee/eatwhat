/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 5.7.37-log : Database - eatwhat
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`) values 
(1,'中餐'),
(2,'亚洲料理'),
(3,'癌'),
(4,'家乡の美食'),
(6,'憨八嘎'),
(7,'欧洲料理'),
(8,'美洲料理'),
(9,'带英本帮菜'),
(14,'希腊菜'),
(15,'卷'),
(16,'炸鸡'),
(17,'披萨'),
(18,'奶茶'),
(19,'火锅'),
(20,'烤肉');

/*Table structure for table `restaurant` */

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text,
  `richness` tinyint(4) DEFAULT '-1',
  `method` enum('takeaway','eatin','both') NOT NULL DEFAULT 'both',
  `priority` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `richness` (`richness`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant` */

insert  into `restaurant`(`id`,`name`,`address`,`richness`,`method`,`priority`) values 
(1,'Nando&#039;s Manchester - Oxford Road','Oxford Rd The Quad, Manchester',1,'both',0),
(2,'McDonald&#039;s','36/38 Oxford St, Manchester',1,'both',0),
(3,'Red Restaurant 红餐厅','Basement, 103 Portland St, Manchester',3,'both',0),
(4,'湘之味','1st Floor, 19-21 George St, Manchester',3,'both',0),
(5,'小羊城','17 George St, Manchester',3,'both',0),
(6,'Star Chef星厨','61-63 Whitworth St, Manchester',3,'both',0),
(7,'中原餐厅','86 Princess St, Manchester',3,'both',0),
(8,'东馆','73 Cavendish St, Manchester',4,'both',0),
(9,'美点菜馆','45-47 Faulkner St, Manchester',2,'both',0),
(10,'天外天','Heron House, 1 Lincoln Square, Manchester',3,'both',0),
(11,'翠华大酒楼','1st floor, Connaught Bldg, 58-60 George St, Manchester',4,'both',0),
(12,'川锅香','45-47 Faulkner Street (upper ground floor), Manchester',3,'both',0),
(13,'大家乐','59 Faulkner St, Manchester',3,'both',0),
(14,'皇城酒楼','Amadeus House, 52-56 George St, Manchester',3,'both',0),
(15,'红辣椒','70-72 Portland St, Manchester',3,'both',0),
(16,'红辣椒8号店 RED CHILLI（曼大店）','403 Oxford Rd, Manchester',3,'both',0),
(17,'椒香馆','The Quadrangle, 6, 1 Lower Ormond St, Manchester',1,'both',0),
(18,'品味','28 Princess St, Manchester',3,'both',0),
(19,'老北京烤鸭馆','1 Liverpool St., Salford',3,'both',0),
(20,'金煌大酒楼','1st & 2nd Floor Wing Yip Business Centre, Cassidy Close, Ancoats, Manchester',4,'both',0),
(21,'星期八火锅','Unit 7, The Quadrangle, Hulme St, Manchester',4,'eatin',0),
(22,'One Plus','42 Charles St, Manchester',2,'both',0),
(23,'皇城酒樓','58 George St, Manchester',3,'both',0),
(24,'Tampopo Albert Square','16 Albert Square, Manchester',3,'both',0),
(25,'萤火虫韩国料理','77 Princess St, Manchester',3,'both',0),
(26,'羊城楼','34 Princess St, Manchester',3,'both',0),
(27,'Manchester Chinese Restaurant 曼城楼','48A George St, Manchester',3,'both',0),
(28,'Tai Wu','81-97 Upper Brook St, Manchester',3,'both',0),
(29,'Chuan Restaurant','44 Canal St, Manchester',3,'both',0),
(30,'Restaurant Nur Malaysia Manchester','177 Wilmslow Rd, Rusholme, Manchester',2,'both',0),
(31,'Phetpailin Thai Restaurant','46 George St, Manchester',3,'both',0),
(32,'I Am Pho','44 George St, Manchester',3,'both',0),
(34,'63 Degrees','104 High St, Manchester',3,'eatin',0),
(36,'Emoji Restaurant','28 Higher Cambridge St, Manchester',3,'both',0),
(37,'辣妹子','Chester St, City Centre, Manchester',3,'both',0),
(38,'Koreana Restaurant','40A King St W, Manchester',3,'both',0),
(39,'Yuzu Japanese Tapas','City Centre, 39 Faulkner St, Manchester',3,'both',0),
(40,'Chimaek','Unit 8, The Quadrangle, Hulme St, Manchester',2,'both',0),
(42,'WAZUZHI (formerly Wasabi)','63 Faulkner St, Manchester',3,'both',0),
(43,'Try Thai','Upper Ground Floor, 52-54 Faulkner St, Manchester',3,'both',0),
(44,'天外天大排档','Arndale House, Market St, Manchester',2,'both',0),
(45,'Plymouth Grove Chinese Restaurant 小树林','65 Plymouth Grove, Manchester',3,'both',0),
(46,'Jin Ji Chinese Restaurant 錦記私房菜館','The Cantonese Chinese Restaurant, 52 Portland St, Manchester',2,'both',0),
(47,'CHEF DIAO 刁师傅餐馆','92-94 Oldham St, Manchester',2,'both',0),
(48,'滋味烤鱼 Spicy city Restaurants','Faulkner St, Manchester',3,'both',0),
(49,'The Rice Bowl','33A Cross St, Manchester',3,'both',0),
(50,'Szechuan Kitchen','57 Faulkner St, Manchester',1,'both',0),
(51,'京粤家','8 Polygon St, Manchester',3,'both',0),
(52,'烧一丁','Unit1, New Islington Mill Regent Trading Estate, Oldfield Rd, Manchester',2,'both',0),
(53,'New Gi Foo Chinese Takeaway','621 Stretford Rd, Old Trafford, Stretford, Manchester',3,'both',0),
(54,'Oodles Manchester','6A Oxford Rd, Manchester',2,'both',0),
(55,'SWEATING CHICKEN叫只蒸鸡','298 Oxford Rd, Manchester',2,'both',0),
(56,'WOOD Manchester','Jack Rosenthal St, Manchester',4,'eatin',0),
(57,'My Thai Restaurant','11 John Dalton St, Manchester',2,'both',0),
(58,'Turtle Bay','33-35 Oxford St, Manchester',3,'both',0),
(59,'Pizza Express','3, Tony Wilson Place, First St, Manchester',3,'eatin',0),
(60,'Don Giovanni | Italian Restaurant Manchester','1-2, Peter House, 1 Oxford St, Manchester',4,'both',0),
(61,'Honest Burgers Manchester','36 Bridge St, Manchester',3,'both',0),
(62,'Wasabi Sushi Restaurant','14, The Printworks, Hanover, Withy Grove, Manchester',3,'both',0),
(63,'Ohio Fried Chicken','24 Wilmslow Rd, Rusholme, Manchester',1,'both',0),
(64,'YO! - Manchester Piccadilly','Upper Level, Piccadilly Station, Manchester',3,'both',0),
(65,'Do Eat Restaurant','Unit B1, city tower, Mosley St, Manchester',3,'both',0),
(66,'Shawarma Wraps & Salad Box','193 Wilmslow Road, Manchester',1,'takeaway',0),
(67,'The Athenian - Greek Gyros & Souvlaki','Unit 10, Foundry Business Park, Ordsall Lane, Salford, Manchester',2,'both',0),
(68,'Nomi Katsu','Salford Editions Unit 10, Manchester,Foundry Business Park, Ordsall Lane, Salford, Manchester',2,'both',0),
(69,'Laros - Greek Street Food MCR','Unit D, Aldow Enterprise Park, Manchester',2,'both',0),
(70,'Dixy Chicken','135 Oxford Rd, Manchester',2,'both',0),
(71,'Zaytoni','127b Oxford Road, Manchester',2,'both',0),
(72,'KFC','12a Oxford Road, Manchester',2,'takeaway',0),
(73,'Monga Fried Chicken 艋舺雞排','61-63 Whitworth Street, Manchester',2,'both',0),
(74,'Five Guys','Unit 4, university Green, Oxford Road, Manchester',2,'both',0),
(75,'Pizza Hut','133 Oxford Rd, Manchester',3,'both',0),
(76,'Royal China Club','40-42 Baker St, London',5,'eatin',0),
(77,'Hutong','33 St Thomas St, London',5,'both',0),
(78,'WooTea Manchester 曼城乌叶','44 George Street Front part ground floor, Manchester M1 4HF',2,'both',0),
(79,'Happy Lemon','84 Portland St, Manchester M1 4GX',2,'both',0),
(80,'Chatime 日出茶太','93 Princess St, Manchester M1 4HT',2,'both',0),
(81,'ICFT','101, The Arthouse, 43 George St, Manchester M1 4AB',2,'both',0),
(82,'Yifang Fruit Tea Manchester University Green','Unit 10, 130 University Green, Manchester M13 9GP',2,'both',0),
(83,'A LITTLE TEA','41 Whitworth St W, Manchester M1 5BD',2,'both',0),
(84,'OHAYO TEA','95 Princess St, Manchester M1 4HT',2,'both',0),
(85,'Gong cha Oxford Road','149-153 Oxford Rd, Manchester M1 7EE',2,'both',0),
(86,'Uncle T','Vita Living East Circle Square, 9 Nobel Wy., Manchester M1 7FT',2,'both',0),
(87,'Tealive','58 Mosley St, Manchester M2 3HZ',2,'both',0),
(88,'A Nice Sip','FC13-14 Arndale Market, 49 High St, Manchester M4 3AH',2,'both',0),
(89,'Bobo Tea MCR','105 Market St, Manchester M1 1NN',2,'both',0),
(90,'Ai Tea Drinks 珍珠奶茶','26 Kirkgate, Huddersfield HD1 1QQ',2,'both',0),
(91,'Croyaki Tea','Fennel St, Manchester M4 3TR',2,'both',0);

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
(9,1),
(9,2),
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
(63,6),
(63,8),
(63,15),
(25,2),
(19,1),
(19,2),
(4,1),
(4,2),
(39,2),
(39,4),
(47,2),
(56,7),
(72,6),
(72,8),
(72,16),
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
(69,7),
(57,2),
(71,2),
(71,15),
(67,7),
(67,14),
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
(66,2),
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
(68,2),
(68,4),
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
(73,8),
(73,16),
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
(1,3),
(1,6),
(1,8),
(1,16),
(2,6),
(2,8),
(2,15),
(2,16);

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
