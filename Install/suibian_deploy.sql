CREATE DATABASE  IF NOT EXISTS `suibian` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `suibian`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: suibian
-- ------------------------------------------------------
-- Server version	5.5.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL,
  `name` varchar(15) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,0,'餐品','',1),(2,1,'盖浇饭','',1),(3,1,'面','',2),(4,0,'餐厅','',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `content` varchar(500) NOT NULL,
  `hidden` tinyint(3) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_goods_category_cid_idx` (`cid`),
  CONSTRAINT `fk_goods_category_cid` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (5,1,1,'锅贴',6.00,'还不错',1,0,1367483140,''),(6,3,1,'雪菜肉丝面',6.00,'额',1,0,0,''),(7,2,2,'烧卖',10.00,'为什么高教区没有盛泽烧卖',1,0,0,''),(8,3,3,'薯条',9.00,'好吧，我是怎么会想出放这项的',1,0,0,''),(9,3,0,'汶竹面',30.00,'',1,1367482733,1367482975,'2013/18/5182225cf3b60.png');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(26) NOT NULL,
  `basepath` char(16) NOT NULL,
  `typepath` char(1) NOT NULL,
  `subpath` char(8) NOT NULL,
  `savepath` char(26) NOT NULL,
  `saverule` char(13) NOT NULL,
  `originalname` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `extension` char(4) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `thumbname` varchar(50) NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'2013/18/5182225cf3b60.png','./upload/images/','o','2013/18/','./upload/images/o/2013/18/','5182225cf3b60','1.1.1-320-480.png','application/octet-stream','png',145662,'thumb',1367482973,1367482973),(2,'2013/18/51822406f09a8.png','./upload/images/','o','2013/18/','./upload/images/o/2013/18/','51822406f09a8','Suibian_v1.0.0.png','application/octet-stream','png',114434,'thumb',1367483399,1367483399);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_record`
--

DROP TABLE IF EXISTS `login_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_record` (
  `int` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`int`),
  KEY `fk_login_record_user_id_idx` (`user_id`),
  CONSTRAINT `fk_login_record_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_record`
--

LOCK TABLES `login_record` WRITE;
/*!40000 ALTER TABLE `login_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `price` decimal(12,2) unsigned NOT NULL,
  `school` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '订单状态。\\n0 => 订单被创建，但是未执行，\\n100 => 订单在处理中，\\n200 => 订单在配送中，\\n300 => 订单已经完成。',
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_user_user_id_idx` (`user_id`),
  KEY `fk_orders_shop_id_idx` (`shop_id`),
  CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shop_id` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (169,1,1,0.00,'','','','',0,0,0),(170,1,2,0.00,'','','','',0,0,0),(171,1,3,0.00,'','','','',0,0,0),(172,1,1,0.00,'','','','',0,0,0),(173,1,2,0.00,'','','','',0,0,0),(174,1,3,0.00,'','','','',0,0,0),(175,1,1,0.00,'北京大学','404','田柯','',0,0,0),(176,1,2,0.00,'北京大学','404','田柯','',0,0,0),(177,1,3,0.00,'北京大学','404','田柯','',0,0,0),(178,1,1,0.00,'北京大学','404','田柯','',0,0,0),(179,1,2,0.00,'北京大学','404','田柯','',0,0,0),(180,1,3,0.00,'北京大学','404','田柯','',0,0,0),(181,1,1,12.00,'北京大学','404','田柯','',0,0,0),(182,1,2,10.00,'北京大学','404','田柯','',0,0,0),(183,1,3,9.00,'北京大学','404','田柯','',0,0,0),(184,1,1,12.00,'北京大学','404','田柯','',0,0,0),(185,1,2,10.00,'北京大学','404','田柯','',0,0,0),(186,1,3,9.00,'北京大学','404','田柯','',0,0,0),(187,1,1,12.00,'北京大学','404','田柯','',0,0,0),(188,1,2,10.00,'北京大学','404','田柯','',0,0,0),(189,1,3,9.00,'北京大学','404','田柯','',0,0,0),(190,1,1,12.00,'北京大学','404','田柯','13862531169',0,0,0),(191,1,2,10.00,'北京大学','404','田柯','13862531169',0,0,0),(192,1,3,9.00,'北京大学','404','田柯','13862531169',0,0,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_food`
--

DROP TABLE IF EXISTS `orders_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(10) unsigned NOT NULL,
  `food_id` int(10) unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL COMMENT '单位数量',
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_goods_orders_id_idx` (`orders_id`),
  KEY `fk_orders_goods_goods_id_idx` (`food_id`),
  CONSTRAINT `fk_orders_goods_goods_id` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_goods_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_food`
--

LOCK TABLES `orders_food` WRITE;
/*!40000 ALTER TABLE `orders_food` DISABLE KEYS */;
INSERT INTO `orders_food` VALUES (265,178,5,1,1367492690,1367492690),(266,178,6,2,1367492690,1367492690),(267,179,7,2,1367492690,1367492690),(268,180,8,2,1367492690,1367492690),(269,181,5,1,1367492741,1367492741),(270,181,6,2,1367492741,1367492741),(271,182,7,2,1367492741,1367492741),(272,183,8,2,1367492741,1367492741),(273,184,5,1,1367492752,1367492752),(274,184,6,2,1367492752,1367492752),(275,185,7,2,1367492752,1367492752),(276,186,8,2,1367492752,1367492752),(277,187,5,1,1367492779,1367492779),(278,187,6,2,1367492779,1367492779),(279,188,7,2,1367492779,1367492779),(280,189,8,2,1367492779,1367492779),(281,190,5,1,1367492967,1367492967),(282,190,6,2,1367492967,1367492967),(283,191,7,2,1367492967,1367492967),(284,192,8,2,1367492967,1367492967);
/*!40000 ALTER TABLE `orders_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive_address`
--

DROP TABLE IF EXISTS `receive_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receive_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `school` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receive_address_user_id_idx` (`user_id`),
  CONSTRAINT `fk_receive_address_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_address`
--

LOCK TABLES `receive_address` WRITE;
/*!40000 ALTER TABLE `receive_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `receive_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `content` varchar(500) NOT NULL,
  `hidden` tinyint(3) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shops_category_cid_idx` (`cid`),
  CONSTRAINT `fk_shops_category_cid` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (1,4,'四海游龙','额，一般吧',1,0,1367483428,'2013/18/51822406f09a8.png'),(2,4,'老娘舅','家常便饭',1,0,0,''),(3,4,'百碗香排骨饭','超级排骨饭',1,0,0,'');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'minowu@foxmail.com','admin','7c4a8d09ca3762af61e59520943dc26494f8941b',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `typeof` char(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_user_id_idx` (`user_id`),
  CONSTRAINT `fk_user_role_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,2,'');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-02 19:14:49
