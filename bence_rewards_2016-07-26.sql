# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.20.56 (MySQL 5.6.29)
# Database: bence_rewards
# Generation Time: 2016-07-26 20:47:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table expenses2015
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expenses2015`;

CREATE TABLE `expenses2015` (
  `accNo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Jan` decimal(8,2) DEFAULT NULL,
  `Feb` decimal(8,2) DEFAULT NULL,
  `Mar` decimal(8,2) DEFAULT NULL,
  `Apr` decimal(8,2) DEFAULT NULL,
  `May` decimal(8,2) DEFAULT NULL,
  `Jun` decimal(8,2) DEFAULT NULL,
  `Jul` decimal(8,2) DEFAULT NULL,
  `Aug` decimal(8,2) DEFAULT NULL,
  `Sep` decimal(8,2) DEFAULT NULL,
  `Oct` decimal(8,2) DEFAULT NULL,
  `Nov` decimal(8,2) DEFAULT NULL,
  `Dec` decimal(8,2) DEFAULT NULL,
  `Total` decimal(12,2) DEFAULT NULL,
  UNIQUE KEY `accNo` (`accNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `expenses2015` WRITE;
/*!40000 ALTER TABLE `expenses2015` DISABLE KEYS */;

INSERT INTO `expenses2015` (`accNo`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`, `Total`)
VALUES
	('',NULL,NULL,NULL,NULL,NULL,0.00,NULL,0.00,0.00,NULL,NULL,NULL,NULL),
	('100101',NULL,NULL,NULL,514.00,181.00,6.10,852.71,2132.99,7406.03,NULL,NULL,NULL,11092.83),
	('103372',NULL,NULL,NULL,12615.00,19907.00,3136.58,5026.99,12895.93,9611.40,NULL,NULL,NULL,63192.90),
	('113235',NULL,NULL,NULL,17041.00,1066.00,3205.26,11361.77,3008.82,10704.44,NULL,NULL,NULL,46387.29),
	('115205',NULL,NULL,NULL,11340.00,1595.00,4273.66,10225.06,5991.90,3801.14,NULL,NULL,NULL,37226.76),
	('115309',NULL,NULL,NULL,4194.00,1088.00,3007.46,1141.62,777.63,6151.15,NULL,NULL,NULL,16359.86),
	('115633',NULL,NULL,NULL,5261.00,5324.00,46124.95,108272.67,30671.88,26763.95,NULL,NULL,NULL,222418.45),
	('119273',NULL,NULL,NULL,19002.00,32767.00,19070.90,21163.02,36226.97,37553.16,NULL,NULL,NULL,165783.05),
	('120786',NULL,NULL,NULL,11526.00,18677.00,38124.59,51324.53,65898.35,78967.57,NULL,NULL,NULL,264518.04),
	('122552',NULL,NULL,NULL,8673.00,3886.00,5271.07,7313.71,2436.72,6005.75,NULL,NULL,NULL,33586.25),
	('130236',NULL,NULL,NULL,1060.00,1520.00,22973.85,58778.95,48886.82,2973.92,NULL,NULL,NULL,136193.54),
	('130420',NULL,NULL,NULL,7668.00,6328.00,15827.06,339.74,-470.83,959.70,NULL,NULL,NULL,30651.67),
	('133524',NULL,NULL,NULL,-17.00,218.00,2498.59,32.19,119.32,737.54,NULL,NULL,NULL,3588.64),
	('133536',NULL,NULL,NULL,0.00,237.00,223.61,1808.57,528.95,2670.21,NULL,NULL,NULL,5468.34),
	('134159',NULL,NULL,NULL,5251.00,3877.00,12351.05,10457.82,11260.38,71548.97,NULL,NULL,NULL,114746.22),
	('136826',NULL,NULL,NULL,22519.00,16563.00,19311.61,14975.12,26366.33,16354.06,NULL,NULL,NULL,116089.12),
	('138190',NULL,NULL,NULL,2342.00,2983.00,40062.38,89335.69,43534.72,19552.67,NULL,NULL,NULL,197810.46),
	('140166',NULL,NULL,NULL,7219.00,1013.00,3193.78,2391.74,-11.75,3425.93,NULL,NULL,NULL,17231.70),
	('141154',NULL,NULL,NULL,1439.00,2289.00,6639.89,1183.64,4976.08,526.22,NULL,NULL,NULL,17053.83),
	('150255',NULL,NULL,NULL,15070.00,35497.00,41449.59,52222.01,21605.53,51019.38,NULL,NULL,NULL,216863.51),
	('150957',NULL,NULL,NULL,3239.00,-114.00,14507.97,17034.76,5610.36,889.40,NULL,NULL,NULL,41167.49),
	('155309',NULL,NULL,NULL,2825.00,5384.00,11188.68,15543.88,9835.56,3801.28,NULL,NULL,NULL,48578.40),
	('159234',NULL,NULL,NULL,8028.00,1517.00,12787.09,15862.99,33593.08,2544.82,NULL,NULL,NULL,74332.98),
	('161613',NULL,NULL,NULL,0.00,0.00,557.92,2480.45,NULL,NULL,NULL,NULL,NULL,3038.37),
	('171087',NULL,NULL,NULL,38596.00,46225.00,39369.15,52408.25,38713.34,40026.64,NULL,NULL,NULL,255338.38),
	('171143',NULL,NULL,NULL,3859.00,6883.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10742.00),
	('171246',NULL,NULL,NULL,6186.00,2904.00,5347.42,23868.24,49989.12,2557.57,NULL,NULL,NULL,90852.35),
	('171442',NULL,NULL,NULL,8771.00,9016.00,10688.46,27332.78,19360.53,13563.55,NULL,NULL,NULL,88732.32),
	('176726',NULL,NULL,NULL,36.00,4008.00,0.00,7267.17,7141.59,8251.79,NULL,NULL,NULL,26704.55),
	('178539',NULL,NULL,NULL,12125.74,10767.46,27348.34,46958.99,15071.18,4686.77,NULL,NULL,NULL,116958.48),
	('187735',NULL,NULL,NULL,10407.00,4273.00,18759.30,8393.29,1883.59,1105.03,NULL,NULL,NULL,44821.21),
	('189549',NULL,NULL,NULL,2560.34,-15.46,1127.08,3594.69,24539.92,11731.08,NULL,NULL,NULL,51411.31),
	('196806',NULL,NULL,NULL,32945.00,30110.00,36268.32,63496.52,85286.60,6647.05,NULL,NULL,NULL,254753.49),
	('197609',NULL,NULL,NULL,2382.00,25782.00,29621.23,22244.68,33564.63,13479.16,NULL,NULL,NULL,127073.70),
	('200328',NULL,NULL,NULL,8609.00,3333.00,15190.75,14177.54,12295.84,42504.59,NULL,NULL,NULL,96110.72),
	('201527',NULL,NULL,NULL,2947.00,3644.00,830.82,935.47,2189.00,13872.76,NULL,NULL,NULL,24419.05),
	('202124',NULL,NULL,NULL,0.00,250.00,-699.51,420.80,0.00,0.00,NULL,NULL,NULL,-28.71),
	('203216',NULL,NULL,NULL,43274.00,15322.00,20773.89,22038.49,9566.75,20838.34,NULL,NULL,NULL,131813.47),
	('204587',NULL,NULL,NULL,214.00,12774.00,2215.68,291.50,598.30,147.75,NULL,NULL,NULL,16241.23),
	('208031',NULL,NULL,NULL,834.00,290.00,181.75,495.55,4870.77,9067.46,NULL,NULL,NULL,15739.53),
	('209276',NULL,NULL,NULL,-17.00,0.00,38.25,3477.97,42.47,745.24,NULL,NULL,NULL,4286.93),
	('209432',NULL,NULL,NULL,22278.00,4281.00,3298.86,3997.82,2093.11,5499.27,NULL,NULL,NULL,41448.06),
	('209716',NULL,NULL,NULL,13145.00,6557.00,11323.88,7330.07,9215.51,7530.25,NULL,NULL,NULL,55101.71),
	('210995',NULL,NULL,NULL,1849.00,2138.00,1061.01,4945.95,18683.49,3591.31,NULL,NULL,NULL,32268.76),
	('212014',NULL,NULL,NULL,-3174.00,330.00,-1359.00,57.71,14580.40,0.00,NULL,NULL,NULL,10435.11),
	('213441',NULL,NULL,NULL,962.00,543.00,131.09,0.00,0.00,0.00,NULL,NULL,NULL,1636.09),
	('221065',NULL,NULL,NULL,28053.00,34983.00,20858.33,134027.35,79465.29,44911.50,NULL,NULL,NULL,342298.47),
	('221308',NULL,NULL,NULL,2928.00,3593.00,18329.61,40622.43,32607.49,16165.01,NULL,NULL,NULL,114245.54),
	('221531',NULL,NULL,NULL,134.00,1236.00,214.87,128.23,1565.71,3958.38,NULL,NULL,NULL,7237.19),
	('221585',NULL,NULL,NULL,1213.00,7102.00,32673.12,14662.61,10596.77,1161.24,NULL,NULL,NULL,67408.74),
	('221646',NULL,NULL,NULL,1809.00,4620.00,2963.35,6923.64,7177.33,2493.03,NULL,NULL,NULL,25986.35),
	('222534',NULL,NULL,NULL,1409.00,2775.00,4206.79,1763.79,749.82,3459.12,NULL,NULL,NULL,14363.52),
	('224532',NULL,NULL,NULL,12125.74,10767.46,27348.34,46958.99,NULL,NULL,NULL,NULL,NULL,0.00),
	('245398',NULL,NULL,NULL,393.00,4653.00,653.78,1475.48,19.24,0.00,NULL,NULL,NULL,7194.50),
	('275826',NULL,NULL,NULL,1660.00,2175.00,14078.45,32561.07,21100.85,9645.89,NULL,NULL,NULL,81221.26),
	('276809',NULL,NULL,NULL,7738.00,211.00,13339.52,45474.89,24454.46,16568.92,NULL,NULL,NULL,107786.79),
	('449552',NULL,NULL,NULL,5360.00,5432.00,5329.55,9178.35,13524.42,4158.79,NULL,NULL,NULL,42983.11),
	('449559',NULL,NULL,NULL,164.00,2278.00,827.47,301.46,1503.42,1470.04,NULL,NULL,NULL,6544.39),
	('571041',NULL,NULL,NULL,7285.00,23267.00,6289.50,29926.38,29787.79,63015.35,NULL,NULL,NULL,159571.02),
	('574736',NULL,NULL,NULL,113.00,490.00,2154.93,-141.11,0.00,256.32,NULL,NULL,NULL,2873.14),
	('607963',NULL,NULL,NULL,33274.00,43873.00,61187.55,34401.31,22589.69,27810.92,NULL,NULL,NULL,223136.47),
	('749828',NULL,NULL,NULL,21225.00,8156.00,10812.10,10031.78,39052.00,45491.68,NULL,NULL,NULL,134768.56),
	('757943',NULL,NULL,NULL,6621.00,23070.00,6618.40,18896.23,12359.48,1725.29,NULL,NULL,NULL,69290.40),
	('800081',NULL,NULL,NULL,5431.00,6483.00,1821.55,2189.97,2963.92,2835.83,NULL,NULL,NULL,21725.27);

/*!40000 ALTER TABLE `expenses2015` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table limits2015
# ------------------------------------------------------------

DROP TABLE IF EXISTS `limits2015`;

CREATE TABLE `limits2015` (
  `accNo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `t1limit` varchar(40) NOT NULL,
  `t2limit` varchar(40) DEFAULT NULL,
  `t3limit` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`accNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `limits2015` WRITE;
/*!40000 ALTER TABLE `limits2015` DISABLE KEYS */;

INSERT INTO `limits2015` (`accNo`, `t1limit`, `t2limit`, `t3limit`)
VALUES
	('200328','83000','91000',NULL),
	('201527','105000','111000',NULL),
	('136826','94000','101000',NULL),
	('204587','88000','97000',NULL),
	('210995','20000','50000',NULL),
	('161613','20000','35000',NULL),
	('449552','25000','60000',NULL),
	('189549','20000','35000',NULL),
	('449559','20000','37000',NULL),
	('150255','88000','110000',NULL),
	('571041','100000','125000',NULL),
	('196806','145000','160000',NULL),
	('100101','20000','35000',NULL),
	('209276','20000','35000',NULL),
	('574736','30000','50000',NULL),
	('800081','20000','45000',NULL),
	('115205','30000','50000',NULL),
	('115633','115000','137000',NULL),
	('202124','70000','79000',NULL),
	('221065','300000','330000',NULL),
	('134159','75000','100000',NULL),
	('221308','110000','150000',NULL),
	('245398','40000','60000',NULL),
	('221646','50000','65000',NULL),
	('155309','60000','80000',NULL),
	('130420','70000','100000',NULL),
	('176726','75000','100000',NULL),
	('221531','100000','150000',NULL),
	('221585','125000','150000',NULL),
	('222534','100000','125000',NULL),
	('197609','65000','125000',NULL),
	('178539','300000','330000',NULL),
	('141154','30000','40000',NULL),
	('113235','25000','35000',NULL),
	('122552','111000','130000',NULL),
	('203216','150000','200000',NULL),
	('159234','38000','44000',NULL),
	('140166','20000','38000',NULL),
	('209716','25000','50000',NULL),
	('150957','80000','100000',NULL),
	('171087','137000','155000',NULL),
	('171246','66000','73000',NULL),
	('171442','74000','87000',NULL),
	('119273','100000','150000',NULL),
	('607963','200000','250000',NULL),
	('115309','49000','73000',NULL),
	('276809','24000','35000',NULL),
	('133536','45000','52000',NULL),
	('120786','220000','253000',NULL),
	('130236','130000','151000',NULL),
	('103372','172000','319000',NULL),
	('133524','39000','110000',NULL),
	('275826','95000','179000',NULL),
	('749828','190000','257000',NULL),
	('187735','49000','98000',NULL),
	('757943','32000','92000',NULL),
	('209432','25000','35000',NULL),
	('208031','25000','39000',NULL),
	('213441','25000','40000',NULL),
	('212014','23000','40000',NULL),
	('138190','201000','272000',NULL);

/*!40000 ALTER TABLE `limits2015` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table promoCodes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `promoCodes`;

CREATE TABLE `promoCodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table promotions2015
# ------------------------------------------------------------

DROP TABLE IF EXISTS `promotions2015`;

CREATE TABLE `promotions2015` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `region` int(2) NOT NULL,
  `tier` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `promotions2015` WRITE;
/*!40000 ALTER TABLE `promotions2015` DISABLE KEYS */;

INSERT INTO `promotions2015` (`id`, `title`, `thumb`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `desc`, `region`, `tier`)
VALUES
	(1,'3 Night City Break - Reykjavik','/images/thumb/reykavik.jpg','/images/promotions/reykavik.jpg',NULL,NULL,NULL,NULL,NULL,'See the beautiful city of Reykjavik with this trip to Iceland for two people to include return flights from Heathrow, accommodation for 3 nights including breakfast in a centrally located Hotel.<BR /><BR />\nReward includes:<ul>\n<li>Package for two people</li>\n<li>Return Flights from Heathrow airport</li>\n<li>Return airport transfers in Iceland</li>\n<li>Hotel accommodation at centrally located Hotel including breakfast for three nights</li>\n</ul>',31,1),
	(2,'3 Night Trip to Paris','/images/thumb/paris.jpg','/images/promotions/paris.jpg',NULL,NULL,NULL,NULL,NULL,'Visit the city of love with this trip to Paris for two people to include return flights, accommodation for three nights in a 4* Hotel including breakfast along with a prestigious dinner cruise on the famous Bateaux, complementing the spectacular sights of Paris.\n<BR /><Br />Reward includes:<ul>	\n<li>Package for two people</li>\n<li>Return Flights </li>\n<li>Return airport transfers in Paris</li>\n<li>4* Hotel accommodation including breakfast for three nights</li>\n<li>Bateaux Dinner Cruise </li>\n</ul>',31,1),
	(3,'Alton Towers - Enchanted Village','/images/thumb/altontowers.jpg','/images/promotions/alton.jpg',NULL,NULL,NULL,NULL,NULL,'Enjoy overnight accommodation at the Enchanted Village to include breakfast at Alton Towers to include Theme Park access for two days along with allocation money for lunch and dinner.\n<BR /><BR />Reward includes:<ul>	\n<li>Package for four people - 2 Adults and 2 Children (11 & under)</li>\n<li>Overnight Accommodation in the Enchanted Village to include breakfast</li>\n<li>Theme Park Access for 2 days </li>\n<li>Credit for lunch and dinner</li>\n</ul>',31,1),
	(4,'Twickenham - Six Nations','/images/thumb/twickenham.jpg','/images/promotions/twickenham.jpg',NULL,NULL,NULL,NULL,NULL,'Take in the extraordinary atmosphere of England playing Wales at Twickenham in one of the biggest games of the Six Nations. Enjoy a hospitality day to include all food and drink for the day along with top match seats to watch the game. Overnight accommodation in a 4* Hotel near Twickenham is also included in this reward.\n<BR /><BR />Reward includes:\n<ul>\n<li>Package for 2 people</li>\n<li>Overnight Accommodation in 4* Hotel near Twickenham</li>\n<li>Full hospitality day for England v Wales Six Nations Match</li>\n</ul>',31,1),
	(5,'Cheltenham Gold Cup Day','/images/thumb/cheltenham.jpg','/images/promotions/cheltenham.jpg',NULL,NULL,NULL,NULL,NULL,'Enjoy one of the most prestigious and famous horse racing events in the world with a hospitality day for 4 people at the Cheltenham Gold Cup Day. A superb glass box hospitality facility overlooking the final fences of the finishing straight will make sure you miss none of the action.\n<BR /><BR/>Reward includes:	\n<ul>\n<li>Package for 4 people</li>\n<li>Glass Box hospitality day for the Gold Cup Day at Cheltenham National Hunt Festival</li>\n</ul>',31,1),
	(114,'British Grand Prix - Silverstone','/images/thumb/grandprix.jpg','/images/promotions/grandprix.jpg',NULL,NULL,NULL,NULL,NULL,'Enjoy a full hospitality day at the British Grand Prix along with two nights accommodation including breakfast at a 4* Hotel near to Silverstone. \n<br/><br/>Reward includes:\n<ul>\n<li>Package for two people</li>\n<li>Full hospitality day for British Grand Prix</li>\n<li>Overnight Accommodation at 4* Hotel including breakfast for two nights</li>\n</ul>',31,2),
	(115,'4 Nights in Las Vegas','/images/thumb/lasvegas.jpg','/images/promotions/vegas.jpg',NULL,NULL,NULL,NULL,NULL,'The neon lights of the Las Vegas strip are a must see. With the extravagant hotels, casinos and amazing restaurants there is so much to do and enjoy in Las Vegas. This reward is for 2 people and includes return flights and airport transfers including accommodation for 4 nights in a 4* Las Vegas Hotel.\n<br /><br />Reward includes:\n<ul>\n<li>Package for two people </li>\n<li>Return Flights </li>\n<li>Return airport transfers in Las Vegas</li>\n<li>4* Hotel accommodation including breakfast for four nights</li>\n</ul>',31,2),
	(116,'Wimbledon Tennis - Mens Final','/images/thumb/wimbledon.jpg','/images/promotions/wimbledon.jpg',NULL,NULL,NULL,NULL,NULL,'Experience one of the most prestigious events of the sporting calendar - The Wimbledon Tennis Championships - enjoy strawberries and cream with a glass of Pimm\'s whilst watching the world\'s top class tennis players with your two tickets on Centre Court. With the retracting roof built on centre court in 2009, your Wimbledon experience is guaranteed except the optional cream!!\n<br /><br />Reward includes:<ul>\n<li>Package for two people</li>\n<li>Centre Court Tickets with Hospitality for Men\'s Final</li>\n<li>Overnight Accommodation at 4* Hotel including breakfast</li>\n</ul>',31,2),
	(117,'7 Nights Centre Parcs - Longleat','/images/thumb/centreparcs.jpg','/images/promotions/centerparcs.jpg',NULL,NULL,NULL,NULL,NULL,'Make the most of this superb family treat with a 7 night stay at an Executive Lodge at Centre Parcs, Longleat. Relax, unwind and make the activities the venue offers. Reward is for 4 people and includes two vouchers to use at the onsite spa facilities along with 500 pounds worth of spending money.\n<br /><br />Reward Includes:<ul>\n<li>Package for four people</li>\n<li>7 Nights in an Executive Lodge</li>\n<li>2 Spa Day Vouchers</li>\n<li>500 pounds worth of spending money</li>\n</ul>',31,2),
	(118,'The Ice Hotel - Sweden','/images/thumb/icehotel.jpg','/images/promotions/icehotel.jpg',NULL,NULL,NULL,NULL,NULL,'One of the most fascinating and astonishing places in the world, enjoy a 3 night trip to the Ice Hotel in Sweden to include return flights and transfers, accommodation at the Ice Hotel to include 1 night in an Art Suite (cold room). The reward also includes a Northern Lights Snowmobiling Tour including dinner at a wilderness hut.\n<br /><br />Reward includes:\n<ul>\n<li>Package for two people</li>\n<li>Return Flights</li>\n<li>Return airport transfers in Sweden</li>\n<li>Accommodation including breakfast for three nights</li>\n<li>Snowmobiling Northern Lights Tour</li>\n</ul>',31,2);

/*!40000 ALTER TABLE `promotions2015` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table regions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) NOT NULL,
  `r_startDate` date NOT NULL,
  `r_endDate` date NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;

INSERT INTO `regions` (`r_id`, `r_name`, `r_startDate`, `r_endDate`)
VALUES
	(31,'South & South West','2015-03-21','2016-04-16');

/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userPermissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userPermissions`;

CREATE TABLE `userPermissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `childUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `userPermissions` WRITE;
/*!40000 ALTER TABLE `userPermissions` DISABLE KEYS */;

INSERT INTO `userPermissions` (`id`, `userId`, `childUser`)
VALUES
	(1,1327,1332),
	(2,1332,1333),
	(3,1333,1334),
	(4,1333,1335),
	(5,1333,1336),
	(6,1333,1337),
	(7,1333,1338),
	(8,1333,1339),
	(9,1333,1340),
	(10,1333,1341),
	(11,1333,1342),
	(12,1333,1343),
	(13,1333,1344),
	(14,1333,1346),
	(15,1346,1349),
	(16,1346,1350),
	(17,1346,1351),
	(18,1346,1352),
	(19,1346,1353);

/*!40000 ALTER TABLE `userPermissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userPromos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userPromos`;

CREATE TABLE `userPromos` (
  `accNo` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `tier` int(1) NOT NULL,
  `promo` int(3) DEFAULT NULL,
  PRIMARY KEY (`accNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailSecondary` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` int(4) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `address4` varchar(255) DEFAULT NULL,
  `postcode` varchar(10) NOT NULL,
  `region` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `accNo` varchar(45) NOT NULL,
  `related` varchar(45) DEFAULT NULL,
  `pwreset` varchar(40) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT '1',
  `access` int(11) DEFAULT NULL,
  `promo` varchar(5) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year` int(4) NOT NULL DEFAULT '2015',
  `live` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accNo` (`accNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `emailSecondary`, `password`, `salt`, `company`, `address1`, `address2`, `address3`, `address4`, `postcode`, `region`, `phone`, `mobile`, `accNo`, `related`, `pwreset`, `verified`, `access`, `promo`, `date`, `year`, `live`)
VALUES
	(1327,'Admin','dave@finderskeepersuk.com',NULL,'753ebfb06944b34cb0ff45a9f0dfa71bbd1108bd',5698,'Finders Keepers UK','1 Fake Street','Fake Town','Fakey','test 2','BS31 2DX',1,'0123467891','','FK123',NULL,'bc7e6aad17dba7f6eec03f28a4ffc228e28c5316',1,5,NULL,'2016-07-25 20:09:08',2016,1),
	(1349,'Ben Thomas','ben@amer.co.uk',NULL,'3a5e0d65d6a118ecc49728e10de676bd3e81e75d',2662,'AMER (UK) LTD','Unit 1','Chantry Court','Marshall Road PLYMOUTH',NULL,'PL7 1YB',31,'01752-347171',NULL,'200328','26',NULL,1,1,'115','2016-07-25 20:09:08',2016,1),
	(1332,'Matt Trott','matt.trott@bssgroup.com',NULL,'a73adb1affc5eec3743f6d699054fc14dbdf717d',6849,'BSS','Albert Road','St.Phillips','Bristol',NULL,'BS2 0BS',31,'-','07711 119439','BSSRD1','FK123',NULL,1,4,NULL,'2016-07-25 20:08:44',2016,1),
	(1333,'David Simons','dave.simons@bssgroup.com',NULL,'ac01c1666a7e8864e021082aecf2b6a59098dac1',4756,'BSS ','Albert Road','St.Phillips','Bristol',NULL,'BS2 0BS',31,'0179 276 2300','07711 119 450','BSSRM1','BSSRD1',NULL,1,3,NULL,'2016-07-25 20:09:08',2016,1),
	(1334,'Simon Baker','1260.mgr@bssgroup.com',NULL,'2550fa85cf4a2510ca4c169a2d08827bbc75e3eb',4868,'Plymouth','Block G, St. Modwen Road','Parkway Industrial Estate','Plymouth',NULL,'PL6 8LH',31,'01752 675300',NULL,'26','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1335,'Geoff Dove','1240.mgr@bssgroup.com',NULL,'8764f9492bcde051d1551014e5e73f5a1c94c31c',7445,'Exeter','Unit 6 Otter Court','Manaton Close,Matford Business Park','Exeter',NULL,'EX2 8PF',31,'01392 457500',NULL,'24','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1336,'Richard Young','1290.mgr@bssgroup.com',NULL,'092e5c8f02fea8276681029a23e8315a07ab79c3',1689,'Swansea','Unit 2,Century Park','Swansea Enterprise Park','Swansea',NULL,'SA6 8RP',31,'01792 762300',NULL,'29','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1337,'Gary Davidge','gary.davidge@bssgroup.com',NULL,'7770c998140d481cd7f7955461751a55579b09e4',1867,'Swindon','Unit 4A, Euroway Industrial Estate','Blagrove','Swindon','','SN5 8YW',31,'01793 601500','07711119460','21','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1338,'Neil Pill','1250.mgr@bssgroup.com',NULL,'c26f72829ece5efb8ddc16d79b10653fe61a328b',6258,'Bristol','Albert Road','St.Phillips','Bristol','','BS2 0BS',31,'0117 972 7900','07500 784762','25','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1339,'Phil Townsend','1280.mgr@bssgroup.com','','248966cea70a33a03cb09e7445b30969db87c729',4761,'Cardiff','Unit 1, Trident Trade Park','Glass Avenue, Ocean Way','Cardiff',NULL,'CF24 5EP',31,'029 2043 2400',NULL,'28','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1340,'Dave Kibbey','1230.mgr@bssgroup.com',NULL,'9ddd2dd8d4d0a32a281c1643a88560ee2f9a56d6',7651,'Gloucester','Unit C1','Eastbrook Road','Gloucester','','GL4 3DB',31,'01452 872200','07711 897279','23','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1341,'Paul Dunn','1630.mgr@bssgroup.com',NULL,'4703b8b827bc5c3f4bcf505db08e8861eaede3c9',4512,'Oxford','Unit C Taurus, Peterley Road','Horspath Industrial Estate','Oxford',NULL,'OX4 2TZ',31,'01865 398870',NULL,'63','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1342,'Ged Magee','1820.mgr@bssgroup.com',NULL,'b7e5b9b1a6a694236b33b26aff7b0caf4277ee11',5129,'Portsmouth','Unit D4 Discovery Voyager Park','Portfield Road, Airport Industrial Estate','Portsmouth',NULL,'PO3 5FL',31,'02392 658 740',NULL,'82','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1343,'Ian Hooper','1180.mgr@bssgroup.com',NULL,'bc1a7871b3edce337fa30e5a558efe53ffc7325d',9746,'Reading','Units A2 & A3, Worton Drive','Worton Grange Industrial Estate','Reading',NULL,'RG2 0TG',31,'0118 923 8900',NULL,'18','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1344,'Ian Atkins','1140.mgr@bssgroup.com',NULL,'67b335d56b65f2661405dd203444bbb6a43a835b',6842,'Southampton','Unit 1a, Parham Drive','Boyatt Wood Trading Estate','Eastleigh',NULL,'SO50 4NU',31,'023 8068 3700',NULL,'14','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1346,'John O\'Neill','john.oneill@bssgroup.com',NULL,'a15627f3770c1ab1a51f9b5017b7b97818ed6c6b',7856,'Slough','557 Ipswich Road','Slough',NULL,NULL,'SL1 4EP',31,'0175 353 7999',NULL,'30','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1347,'Richard Tyler','1400.mgr@bssgroup.com',NULL,'ceb493a024623681e3524ab7bebdb795d21d2c18',6523,'Bournemouth','Unit 3B, Broom Road Business Park','Broom Road','Poole',NULL,'BH12 4PA',31,'01202 711300',NULL,'40','BSSRM1',NULL,1,2,NULL,'2016-07-25 20:09:08',2016,1),
	(1350,'Pete Allen','pete.joallen@blueyonder.co.uk',NULL,'f3238bc9685b545f4e5418c99a05879c345e6b6f',5687,'ALLEN WELDING LTD','Unit 26 Bell Park Close','Newnham Industrial Estate','Plympton PLYMOUTH',NULL,'PL7 4JH',31,'01752-330664',NULL,'201527','26',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1351,'Paul Murch','paul@murchandbaker.com',NULL,'9001f6bd28acd7c213456c83356a6267f81a9e9c',5072,'MURCH&BAKER HTG LTD','UNIT 2 VENTON CROSS BARNS','TIGLEY','TOTNES DEVON',NULL,'TQ9 6DP',31,'01364 649464',NULL,'136826','26',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1352,'Wayne Dove','wayne@southwestrenewables.net',NULL,'cd5e59c9b7af35fdcfa858cf9bf6a972759394b8',4163,'SOUTHWEST RENEWABLES LTD','4 ALMERIA COURT','PLYMPTON','Plymouth, Devon',NULL,'PL7 1TX',31,'07447-024025',NULL,'204587','26',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1353,'Ross Hilditch','accounts@ourheat.co.uk',NULL,'cac18f2e202ba1c031134a05ffd70ee0debdf2aa',4557,'OURHEAT LTD','15 FORE STREET','SHALDON','TORQUAY',NULL,'TQ14 0DE',31,'01626 337 937',NULL,'210995','26',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1355,'karl Marchlewski','karl@kmeng.co.uk',NULL,'f05d7b7c15ec7d3f35b0932bf7dfbe3931d9a8f6',5017,'KM ENGINEERING','UNIT 4 MARDLE WAY BUS PK','MARDLE WAY BUCKFASTLEIGH','DEVON',NULL,'TQ11 0JL',31,'01364 644134',NULL,'449552','24',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1356,'Chris Evans','chris@evansheating.org',NULL,'ffd6455ddb32c88675b748c7737e87676a93c30b',4273,'EVANS PLUMG & HTG','UNIT 10 HOWARD AVENUE','BARNSTAPLE','DEVON','','EX32 8QA',31,'01271 373932','','189549','24',NULL,1,1,'115','2016-07-25 20:09:08',2016,1),
	(1357,'John  Turnbull','johnturnbull@optimumheating.co.uk',NULL,'e2be9b4ccff4b6d8eb95321f6b84601e520d64f1',7455,'OPTIMUM HEATING LTD (Exeter Acc)','UNIT B1 BRANHAM COURT','BRANHAM CRESCENT','ROUNDSWELL BUS PK BARNSTAPLE',NULL,'EX31 3TD',31,'01271 372888',NULL,'449559','24',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1358,'Jason Quinn','jason@amrocheating.co.uk',NULL,'118525a7f076a7a46975916f39a3680c3119c183',5097,'AMROC','MELROSE CLOSE','SWANSEA ENT PK','SWANSEA',NULL,'SA6 8QE',31,'01792 700820',NULL,'150255','29',NULL,1,1,'116','2016-07-25 20:09:08',2016,1),
	(1359,'Andrew Thomas','info.ggthomasandson@btconnect.com',NULL,'ab69430c5bd06c3e654740bcade29cdd909ad288',2685,'G THOMAS & SON LIMITED','THE HAGGARD LLANGWM HILL','LLANGWM','HAVERFORDWEST','','SA62 4NG',31,'01437 890920','','571041','29',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1360,'Richard Moriarty','richard@rdmelectrical.com',NULL,'6955f77429c6b0ca1a8f2a440fa35196f0a16872',9725,'RDM ELECTRICAL','Unit 6 Cambrian Court','Ferryboat Close','Swansea Enterprise Park SWANS',NULL,'SA6 8PZ',31,'01792 701256',NULL,'196806','29',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1361,'Barry Gwynett','flarewales@btconnect.com',NULL,'0ec1f1e2eca1d582cc4e916a7f0398d51f5bb65a',6985,'FLARE WALES','GWYNFRN','NEWCASTLE EMLYN','CARMS',NULL,'SA38 9LL',31,'01239 711562',NULL,'100101','29',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1362,'Andy Woods','andywoods@drsfmservices.co.uk',NULL,'0257e6fe8c23ca027c06e54fe1625867f7c9f0f6',4863,'DRS FM SERVICES LTD','PHOENIX HOUSE','ENTERPRISE PARK','SWANSEA','','SA7 9FG',31,'01792 277170','07964346378','209276','29',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1363,'Ryan O\'Neil','r.oneill@systems-group.co.uk',NULL,'90369469bf7882c816dadf27063317aa023da664',8964,'SYSTEMS PIPEWORK','FORGE INDUSTRIAL ESTATE','MAESTEG','MID GLAM',NULL,'CF34 0AZ',31,'01656 733791',NULL,'574736','29',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1364,'Leighton Quinn','leighton@advancedheatingwales.co.uk',NULL,'708d2ed349be244da936bdd153a952cb9a173e31',3554,'ADVANCED HEATING WALES','PHILADELPHIA HOUSE','5 GLOBE STREET','MORRISTON SWANSEA','','SA6 8DD',31,'01792 311071','07967572235','800081','29',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1365,'David Burke','david.burke@rgvengineering.co.uk',NULL,'4629ba13bedcd21bb6c70cbbe3245a410aadcc08',6970,'RGV ENGINEERING','HIGH STREET','NETHERAVON NR SALISBURY','WILTS',NULL,'SP4 9PQ',31,'01980 670667',NULL,'115205','21',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1366,'Iain Sellstrom','iain@ajkservices.co.uk',NULL,'d0adfc7f92848404322f90154da4c4b791d23591',1074,'AJK SERVICES','UNIT 3 SALISBURY COLLEGE UNITS','ORDNANCE ROAD','TIDWORTH WILTS',NULL,'SP9 7QD',31,'01980 846127',NULL,'115633','21',NULL,1,1,'4','2016-07-25 20:09:08',2016,1),
	(1367,'Darren Axford','michelle@weclimited.co.uk',NULL,'3f7a1cc68e1f96515c2de993682a92eb90cb7303',4893,'WILTS ELECTRICAL CONTRACTING','Unit 10 Harris Road','Porte Marsh Ind Estate','Calne Wiltshire',NULL,'SN11 9PT',31,'01249-812850',NULL,'202124','21',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1368,'John Rankin','john.rankin@intoheat.co.uk',NULL,'5ea521f0043a13ac0c43e58833d01670d4975a6c',3237,'INTOHEAT','UNITS 6-7 SHORT WAY','THORNBURY INDUSTRIAL ESTATE','THORNBURY BRISTOL',NULL,'BS35 3UT',31,'01454-414-540',NULL,'221065','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1369,'Chris Gray','chris@heatradiationltd.co.uk',NULL,'810c71fd46a5adb176716f920a4a4f2222f7f412',1368,'HEAT RADIATION','BELVEDERE TRADING EST','TAUNTON','SOMERSET',NULL,'TA1 1BH',31,'01823 253177',NULL,'134159','25','48e5a60a03feed3a63062caa4de3375c4a5c8d2f',1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1370,'Andrew Stone','a.stone@mes-avon.co.uk',NULL,'afc147c6d27a60a6f7bfc8cd20c11091fb73c672',2972,'MECHANICAL ENG SERVICES','Unit 9J KINGSWOOD IND EST','LONGWELL GREEN','BRISTOL SO',NULL,'BS30 7DA',31,'0117 9411021',NULL,'221308','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1371,'Kevin Shorthouse','kevin@rtsengineering.co.uk',NULL,'cc56c42ba0e884c60b1eb8cdd189a0bb8bae1c7c',3691,'R.T.S','UNIT 6 SEDGEMOUNT IND PARK','BRISTOL ROAD','BRIDGWATER SOMERSET',NULL,'TA6 4AR',31,'01278 457294',NULL,'245398','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1372,'Mike Bennett','mikebennett@bristolindustrialheating.com',NULL,'a1bc58faa25ca1d0a0fb6042756d69b8247d9870',9471,'BRISTOL INDUSTRIAL HEATING','39 SILVER STREET','CONGRESBURY','BRISTOL',NULL,'BS49 5EY',31,'01275 830950',NULL,'221646','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1373,'Kevin Pullen','kevin@aquatonics.co.uk',NULL,'2752f5e49200a372da3a329ecf152f3130f629c8',7543,'AQUATONICS','OFFICE 2 DEAN HOUSE','DEAN RD AVONMOUTH','BRISTOL AVON',NULL,'BS11 8AT',31,'0117 9825008',NULL,'155309','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1375,'Nigel Gulliford','nigel@westfordmechanical.co.uk',NULL,'40188dfabf624183542f9422d2c02edf9faf6077',1485,'WESTFORD MECHANICAL','ENVIRONMENT HOUSE UNIT 2','VENTURE WAY PRIORSWOOD IND EST','TAUNTON SOMERSET',NULL,'TA2 8DG',31,'01823 323000',NULL,'130420','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1376,'Pete Richards','peter.richards@aces-online.co.uk',NULL,'ef3cc94fdd45cea6ddfe772fa16b8f6706b5d1c1',1593,'AVON COMBINED ELEC SERVICES','1-9 WHITEHOUSE LANE','BEDMINSTER','BRISTOL',NULL,'BS3 4DJ',31,'0117 9077758',NULL,'176726','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1377,'Archie Jefferies','archie@cookandharris.co.uk',NULL,'489570e2958431a72f47030311f7dd07aca5dfac',5086,'COOK&HARRIS','UNIT 3 VINCENT COURT','89-93 SOUNDWELL ROAD','STAPLEHILL BRISTOL',NULL,'BS16 4QR',31,'0117 9664792',NULL,'221531','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1378,'Rob Eason','robeason@gasworldltd.co.uk',NULL,'ab7a93004b592e10099ede2aa16145503a5107c9',7089,'GAS WORLD','UNIT 1 AVON VALLEY BUS PRK','CHAPEL WAY ST ANNES PARK','BRISTOL',NULL,'BS4 4EU',31,'01179 725 340',NULL,'221585','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1379,'Julian Hopkins','julian@ohsservices.co.uk',NULL,NULL,9655,'OCTAGON HEATING','91 HIGH STREET','STAPLE HILL','BRISTOL',NULL,'BS16 5HE',31,'0117 9575557',NULL,'222534','25','4a880636fd16898d0cbd9c5a432c98498695bf2a',1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1380,'Kevin Pullen','kevin.pullen@invek.co.uk',NULL,'d7a63be829ea276ee821fa1c78b65ca2e7663ea0',7705,'INVEK','SUITE 9-12','SUITE 9-13','CHURCH ROAD YATE BRISTOL',NULL,'BS37 5JB',31,'01454 321020',NULL,'197609','25',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1381,'Andy Blunsdon','andrew.blunsdon@priddyengineering.co.uk',NULL,'692f46f591da5a5ee82d86c5884fdeda7dc421ec',9165,'Priddy Engineering services limited','101 Central house','Central Trading Estate','Petherton road','Bristol','BS14 9BZ ',31,'0117 370 2600 ','07787414614','178539','25','63b1d41353c9cc844563a2cdf78a6427f441d3b3',1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1382,'Paul Hargest','paul@cstec.co.uk',NULL,'4d20d5ef72294ce1b6f18962c67692f14643ffc3',2075,'CONTROL&SERVICE','UNIT 29 CROSBY YARD','BRIDGEND','MID GLAM',NULL,'CF31 1JZ',31,'01656 665505',NULL,'141154','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1383,'Kevin Moulton','kevin@gibson-sts.com',NULL,'ceb38eee12bbc3ab351ed5b3ec8e7862104d2c46',4768,'GIBSON TECHNICAL SERVICES','ATLANTIC HOUSE','CHARNWOOD PARK','BRIDGEND CARDIFF',NULL,'CF31 3PL',31,'01656 767373',NULL,'113235','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1384,'Nick Barnes','nickb@amegroup.co.uk',NULL,'1656c6510fdb293ea0fa1b5233ee3d59afa6ee90',8150,'ALLIED MECHANICAL','UNIT M4','SOUTHPOINT INDUDTRIAL ESTATE','FORESHORE ROAD CARDIFF',NULL,'CF10 4SP',31,'2920470097',NULL,'122552','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1385,'Michael Prewitt','michaeleprewett@aol.com',NULL,'10c64472e00f925f0a724ae1262c4c26fb675093',3955,'MICHAEL E PREWETT','Unit 8 Mellyn Mair Bus Centre','Lamby Industrial Park','Wentloog Avenue CARDIFF',NULL,'CF3 2EX',31,'02920-770111',NULL,'203216','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1386,'Gary Jones','mail@boilerplant.co.uk',NULL,'c793c77283d5f2b2e89d698b76125ff7dd8701e3',2539,'BPM (GLAM)','(GLAMORGAN) LTD','73 SEVERN ROAD CANTON','CARDIFF SOUTH GLAM',NULL,'CF11 9EA',31,'02920 223 500',NULL,'159234','28',NULL,1,1,'118','2016-07-25 20:09:08',2016,1),
	(1387,'Peter Bailey','peterbailey@bgheat.co.uk',NULL,'a492c8b074256b84655423cdf227c4184e4733a8',8206,'BG HEAT','REGUS HSE MALTHOUSE AVE','CARDIFF GATE BUSNS PARK','CARDIFF','','CF23 8RU',31,'07000244328','07979 600878','140166','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1388,'Geraint Venebles','geraint@amser.co.uk',NULL,'3a7349c5e05b913c0a165075606a563ce76457d8',7948,'AMSER BUILDING SERVICES','UNIT 13 PACIFIC BUSINESS PARK','PACIFIC ROAD','CARDIFF',NULL,'CF24 5HJ',31,'02920 499639',NULL,'209716','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1389,'Glen Narbeth','glen@narbeths.com',NULL,'62b7994b7d7a338fe79358c7482591e70cec5767',7383,'NARBETH MECHANICAL','49 MAIN AVENUE','BRACKLA IND ESTATE','BRIDGEND',NULL,'CF31 2AZ',31,'01656 669980',NULL,'150957','28',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1390,'Ade Lusty','ade@mihltd.net',NULL,'c39a4fe62c2d6e3f75a4fe8ea22fc7bc09e00e00',9015,'M.I.H','STATION ROAD','WOODMANCOTE','CHELTENHAM GLOS',NULL,'GL52 9HW',31,'01242 678822',NULL,'171087','23',NULL,1,1,'115','2016-07-25 20:09:08',2016,1),
	(1391,'Pat Casey','enquiries@prheating.co.uk',NULL,'0dc6d852800442c756b722963f16c43654a96d96',5162,'P&R HEATING','UNIT 8 SPRINGFIELD BUS CENTRE','BRUNEL WAY','GLOUCESTERSHIRE','','GL10 3SX',31,'01453 791492','07939121636','171246','23',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1392,'Nathan Loveridge','nathan@markhollandgroup.co.uk',NULL,'46d827d96caaefcb000b0b7f1f9dbb7f8b517c49',8027,'MARK HOLLAND','VICTORIA HOUSE','CHURCHILL ROAD','LECKHAMPTON CHELTENHAM',NULL,'GL53 7EG',31,'01242 581869',NULL,'171442','23',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1393,'Melvyn Wood','melvyn@kpssouthern.co.uk',NULL,'a95751014485f6118e088d5e53f14970a8c7bf54',9099,'KPS','ODDINGTON GRANGE FARM IND.S','WESTON ON THE GREEN','BICESTER OXON',NULL,'OX25 3QW',31,'01865 331731',NULL,'119273','63',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1394,'Michael Moore','mjm@aldenltd.co.uk',NULL,'e269a1a12d78900f18411a0e179225fffdb10543',3198,'F G ALDEN','LANGFORD LOCKS','KIDLINGTON','OXFORDSHIRE',NULL,'OX5 1LJ',31,'01865 855000',NULL,'607963','63',NULL,1,1,'1','2016-07-25 20:09:08',2016,1),
	(1395,'Jim Lawton','jim.lawton@lawton-bes.co.uk',NULL,'6d8205ff0d22a82e983da8dfa665d548459842c3',1164,'LAWTON BUILDING SERVICES','UNIT 10 THE GLENMORE CENTRE','GROVE TECH PK DOWNESVIEW ROAD','WANTAGE OXFORDSHIRE',NULL,'OX12 9GN',31,'01235 766751',NULL,'115309','63',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1396,'Justin Smith','justin@darnells.ltd.uk',NULL,'18138b5e4af9ba826abaca7e4faf08e4afb03dd1',1374,'DARNELLS','OAKFIELD IND. EST.','STANTON HARCOURT ROAD','EYNSHAM OXFORD','','OX29 4TH',31,'1865883996','','276809','63',NULL,1,1,'118','2016-07-25 20:09:08',2016,1),
	(1397,'Pat Mckendrey','pat@pjmmechanical.co.uk',NULL,'de73846c2b40b941e63216e1ef6162d10014bbe7',5365,'PJM MECHANICAL SERVICES','UNIT 25 & 26','HIGHCROFT EST ENTERPRISE ROAD','HAMPSHIRE',NULL,'PO8 0BT',31,'02392 592672',NULL,'133536','82',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1398,'Aaron Tilley','aaron@admechanical.co.uk',NULL,'7aa15582a53b2deea32ffa28c9c80678b4f834a6',4978,'A D MECHANICAL SERVICES','7 FAIRWAYS BUSINESS CENTRE','AIRPORT SERVICE ROAD','PORTSMOUTH HAMPSHIRE','','PO3 5NU',31,'02392 617070','07966640799','120786','82',NULL,1,1,'118','2016-07-25 20:09:08',2016,1),
	(1399,'Dave Eves','dave@dsrmechanical.com',NULL,'0db807b6519e7570daac1ae0b11efcc277d7eb2d',6047,'DSR MECHANICAL SERVICES','UNIT 1 DOWNLEY BUSINESS PK','12 DOWNLEY ROAD','HAVANT HAMPSHIRE','','PO9 2NJ',31,'02392 471200','','130236','82',NULL,1,1,'1','2016-07-25 20:09:08',2016,1),
	(1400,'Ricky Gale','rickyamuk@googlemail.com',NULL,'f3b68f8caae8f11e8282d67845957884b35ca7cd',1585,'ADVANCED MAINTENANCE','2 CHILTERN ENTERPRISE CENTRE','STATION ROAD','THEALE BERKSHIRE',NULL,'RG7 4AA',31,'0118 930 3738',NULL,'103372','18',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1401,'Steve Roots','sroots@scomac.co.uk ',NULL,'a0bc49dc9feb0e794a4bdb076ded964a3cc5b82b',5252,'SCOMAC','SCOMAC HOUSE','247 HIGH STREET','ALDERSHOT HANTS',NULL,'GU12 4NG',31,'01252 353040',NULL,'133524','18',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1402,'Martin Wigginton','Martin.Wigginton@constantair.co.uk',NULL,'2417ac6635992b0d7b0894ac1447df19e8b4cd7b',6909,'CONSTANT AIR','CAS HOUSE HILLBOTTOM ROAD','SANDS IND EST','HIGH WYCOMBE BUCKS',NULL,'HP12 4HJ',31,'01494 469529',NULL,'275826','18',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1403,'Chass Speed','chass@absme.co.uk',NULL,'c9bbbb2282cadb4620d9a5680729b31654d43bde',1349,'ACCOLADE BUILDING SERVICES','NEW HOUSE','CHRISTCHURCH ROAD','RINGWOOD HANTS',NULL,'BH24 3AP',31,'01425-477777',NULL,'749828','14',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1404,'Mark Gillett','mark.gillett@mjgservices.co.uk',NULL,'64403d3c7bf99b2b1d98bac51d016312ed258423',8366,'MJG MECHANICAL','37 HIGH STREET','TOTTON','HAMPSHIRE',NULL,'SO40 9HL',31,'02381 789044',NULL,'187735','14',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1405,'Rob Walston','rob@dewco.co.uk',NULL,'43861cf7efaaf04f8642c930055dbf10719b1af1',9848,'DEWCO LTD','UNIT 11','CROW ARCH LANE INDUST. ESTATE','CROW ARCH LANE RINGWOOD HAM',NULL,'BH24 1PD',31,'01425 483436',NULL,'757943','14',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1406,'Eric Mc Grane ','eric@qmec.co',NULL,'85bfab67af10a98b78943cbb1de872f3753e0016',4565,'QMEC','DORNEY HOUSE','46 - 48A HIGH STREET','BURNHAM SLOUGH',NULL,'SL1 7JP',31,'07717 525162',NULL,'209432','30',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1407,'John Rielly ','john.megmechanical@aol.co.uk ',NULL,'d5d6bd59719dbe2d14b068152ef175b2ae5c41f9',5634,'MEG MECHANICAL','Pennyford','Larges Bridge Drive','BRACKNELL Berkshire',NULL,'RG12 9AJ',31,'01344 481646',NULL,'208031','30',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1408,'John Lawford ','j.lawford25@btinternet.com',NULL,'9e35a245e206e5b2e94274c0f9bd869491054bf6',8447,'JOHN LAWFORD','25 GOWERS FIELD','AYLESBURY','BUCKINGHAMSHIRE',NULL,'HP20 2QT',31,'01296 431338',NULL,'213441','30',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1409,'steve tofield','s.tofield@vortexmec.uk',NULL,'9cde9b4d1b153ab5062d0366dcf5484ace5e17bc',6234,'VORTEX','49 IRVING ROAD','KEINTON MANDEVILLE','SOMERTON','','TA11 6ET',31,'01458 223887','07595 324714','212014','40',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1410,'ashley chant','ashleychant@apchant.com',NULL,'415bc2502ecfc0a2a470bf17e19b1bb2a4562da9',9913,'A P CHANT','11B HOMEWOOD WAY','GORE CROSS BUSINESS PARK','BRIDPORT DORSET',NULL,'DT6 3FT',31,'01308 420170',NULL,'138190','40',NULL,1,1,NULL,'2016-07-25 20:09:08',2016,1),
	(1411,'Mike','emailme@mikeoram.co.uk',NULL,NULL,NULL,'Test','test','test',NULL,NULL,'BS311EW',31,'','2456465245','34513451',NULL,'1129542ca0706f0227dde25e63c82c867c00fc93',1,5,NULL,'2016-07-25 20:09:08',2016,1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
