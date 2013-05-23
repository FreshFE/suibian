CREATE DATABASE  IF NOT EXISTS `suibian3` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `suibian3`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: suibian3
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'2013/21/519c89c65750f.png','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519c89c65750f','brother_sites_arrow.png','application/octet-stream','png',1136,'thumb',1369213382,1369213382),(2,'2013/21/519cc58b98c63.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519cc58b98c63','20134119735784.jpg','application/octet-stream','jpg',178078,'thumb',1369228683,1369228683),(3,'2013/21/519cc592e8c8f.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519cc592e8c8f','20134119821926.jpg','application/octet-stream','jpg',156356,'thumb',1369228690,1369228690),(4,'2013/21/519cc59926f5f.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519cc59926f5f','201341192252144.jpg','application/octet-stream','jpg',176116,'thumb',1369228697,1369228697),(5,'2013/21/519d67a42e8d4.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d67a42e8d4','20134119735784.jpg','application/octet-stream','jpg',178078,'400x400,480x800',1369270180,1369270180),(6,'2013/21/519d67cb1f872.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d67cb1f872','20134119735784.jpg','application/octet-stream','jpg',178078,'400x400,480x800',1369270219,1369270219),(7,'2013/21/519d684cb2b95.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d684cb2b95','20134119735784.jpg','application/octet-stream','jpg',178078,'400x400,480x800',1369270349,1369270349),(8,'2013/21/519d686bce815.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d686bce815','20134119735784.jpg','application/octet-stream','jpg',178078,'400x400,480x800',1369270380,1369270380),(9,'2013/21/519d687b12e0c.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d687b12e0c','2013330172057395.jpg','application/octet-stream','jpg',46486,'400x400,480x800',1369270395,1369270395),(10,'2013/21/519d68f1b2a08.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d68f1b2a08','20134119735784.jpg','application/octet-stream','jpg',178078,'400x400,480x800',1369270514,1369270514),(11,'2013/21/519d6976765c1.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d6976765c1','20134119735784.jpg','application/octet-stream','jpg',178078,'400x400,480x800',1369270646,1369270646),(12,'2013/21/519d69867abcd.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d69867abcd','201341192252144.jpg','application/octet-stream','jpg',176116,'400x400,480x800,thumb',1369270662,1369270662),(13,'2013/21/519d698dd58de.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d698dd58de','20134119821926.jpg','application/octet-stream','jpg',156356,'400x400,480x800,thumb',1369270670,1369270670),(14,'2013/21/519d6994ea3e8.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d6994ea3e8','pair_small.jpg','application/octet-stream','jpg',116718,'400x400,480x800,thumb',1369270677,1369270677),(15,'2013/21/519d6fe720c0d.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d6fe720c0d','7d10aa5b0c04a641YY.jpg','application/octet-stream','jpg',113288,'400x400,480x800,thumb',1369272295,1369272295),(16,'2013/21/519d77811439a.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d77811439a','m_1353386435840.jpg','application/octet-stream','jpg',566204,'400x400,480x800,thumb',1369274241,1369274241),(17,'2013/21/519d778ba6921.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d778ba6921','m_1353386449124.jpg','application/octet-stream','jpg',624555,'400x400,480x800,thumb',1369274252,1369274252),(18,'2013/21/519d7794899da.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d7794899da','540121_191629003_2.jpg','application/octet-stream','jpg',189686,'400x400,480x800,thumb',1369274261,1369274261),(19,'2013/21/519d8de50c920.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d8de50c920','m_1353386435840.jpg','application/octet-stream','jpg',566204,'400x400,480x800,thumb',1369279973,1369279973),(20,'2013/21/519d8dfbef0c1.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d8dfbef0c1','m_1353386435840.jpg','application/octet-stream','jpg',566204,'400x400,480x800,thumb',1369279996,1369279996),(21,'2013/21/519d8e0b53d5f.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d8e0b53d5f','m_1353386435840.jpg','application/octet-stream','jpg',566204,'400x400,480x800,thumb',1369280011,1369280011),(22,'2013/21/519d8f195cbe9.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519d8f195cbe9','CgQCr1Fjs2SAGSsUAAKnh3RRxcI26801_1000x1000.jpg','application/octet-stream','jpg',195846,'400x400,480x800,thumb',1369280281,1369280281),(23,'2013/21/519db4def3c03.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519db4def3c03','7d10aa5b0c04a641YY.jpg','application/octet-stream','jpg',113288,'400x400,480x800,thumb',1369289951,1369289951),(24,'2013/21/519db4eda69c6.jpg','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519db4eda69c6','7d10aa5b0c04a641YY.jpg','application/octet-stream','jpg',113288,'400x400,480x800,thumb',1369289966,1369289966),(25,'2013/21/519db660d66d0.png','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519db660d66d0','Untitled-2.png','application/octet-stream','png',89009,'400x400,480x800,thumb',1369290337,1369290337),(26,'2013/21/519db6a80b385.png','./upload/images/','o','2013/21/','./upload/images/o/2013/21/','519db6a80b385','33.png','application/octet-stream','png',63330,'400x400,480x800,thumb',1369290408,1369290408);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_log`
--

DROP TABLE IF EXISTS `login_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_log` (
  `int` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip` char(15) NOT NULL,
  `phone_dev` varchar(60) NOT NULL,
  `login_type` varchar(45) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`int`),
  KEY `fk_login_record_user_id_idx` (`user_id`),
  CONSTRAINT `fk_login_record_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_log`
--

LOCK TABLES `login_log` WRITE;
/*!40000 ALTER TABLE `login_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_log` ENABLE KEYS */;
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
  `status` tinyint(3) unsigned NOT NULL COMMENT '订单状态。\n0 => 订单被创建，但是未执行，\n100 => 订单在处理中，\n200 => 订单在配送中，\n300 => 订单已经完成。',
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_user_user_id_idx` (`user_id`),
  KEY `fk_orders_shop_id_idx` (`shop_id`),
  CONSTRAINT `fk_orders_shop_id` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (7,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369193678,1369193678),(8,2,1,22.00,'sas','ss','sss','sss',0,0,0),(9,2,1,22.00,'云南中医学院','as','','12345678999',0,1369275292,1369275292),(10,2,1,44.00,'云南广播电视大学','ggb','','12345678999',0,1369275462,1369275462),(11,2,1,16.00,'云南大学','苏州市工业园区仁爱路1号高博国际中心','','13862531169',20,1369287875,1369287875),(12,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369289518,1369289518),(13,2,1,6.00,'云南大学','苏州市工业园区仁爱路1号高博国际中心','','13862531169',0,1369299361,1369299361),(14,2,3,3.00,'云南大学','苏州市工业园区仁爱路1号高博国际中心','','13862531169',0,1369299361,1369299361),(15,2,2,15.00,'云南大学','苏州市工业园区仁爱路1号高','','13862531169',0,1369299414,1369299414),(16,2,1,6.00,'云南大学','苏州市工业园区仁爱路1号高','','13862531169',0,1369299432,1369299432),(17,2,2,15.00,'云南大学','苏州市工业园区仁爱路1号高','','13862531169',0,1369299432,1369299432),(18,2,1,16.00,'云南大学','苏州市工业园区仁爱路1号高','','13862531169',0,1369299462,1369299462),(19,2,2,15.00,'云南大学','苏州市工业园区仁爱路1号高','','13862531169',0,1369299478,1369299478),(20,2,2,15.00,'云南大学','苏州市工业园区仁爱路1号高博国际中心','','13862531169',0,1369300013,1369300013),(21,14,1,22.00,'云南大学','苏州市工业园区仁爱路1号高博国际中心','','13862531169',0,1369306141,1369306141),(22,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369306800,1369306800),(23,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369306833,1369306833),(24,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369306875,1369306875),(25,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369306935,1369306935),(26,2,1,38.00,'北京大学','403','田柯','13862531169',0,1369306984,1369306984),(27,14,1,22.00,'云南大学','苏州市','','13862531169',0,1369307128,1369307128),(28,14,1,16.00,'云南大学','苏州市','田珂','13862531169',0,1369307362,1369307362);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL COMMENT '单位数量',
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_goods_orders_id_idx` (`orders_id`),
  KEY `fk_orders_goods_goods_id_idx` (`product_id`),
  CONSTRAINT `fk_orders_product_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
INSERT INTO `orders_product` VALUES (6,7,1,1,1369193678,1369193678),(7,7,2,2,1369193678,1369193678),(9,8,2,2,0,0),(10,9,2,2,1369275292,1369275292),(11,9,9,3,1369275292,1369275292),(12,10,1,1,1369275462,1369275462),(13,10,2,2,1369275462,1369275462),(14,10,9,1,1369275462,1369275462),(15,11,2,4,1369287875,1369287875),(16,12,1,1,1369289518,1369289518),(17,12,2,2,1369289518,1369289518),(18,13,9,3,1369299361,1369299361),(19,14,13,3,1369299361,1369299361),(20,15,11,1,1369299414,1369299414),(21,16,9,2,1369299432,1369299432),(22,17,11,2,1369299432,1369299432),(23,18,2,1,1369299462,1369299462),(24,19,11,1,1369299478,1369299478),(25,20,11,1,1369300013,1369300013),(26,21,2,1,1369306141,1369306141),(27,21,9,1,1369306141,1369306141),(28,22,1,1,1369306800,1369306800),(29,22,2,2,1369306800,1369306800),(30,23,1,1,1369306833,1369306833),(31,23,2,2,1369306833,1369306833),(32,24,1,1,1369306875,1369306875),(33,24,2,2,1369306875,1369306875),(34,25,1,1,1369306935,1369306935),(35,25,2,2,1369306935,1369306935),(36,26,1,1,1369306984,1369306984),(37,26,2,2,1369306984,1369306984),(38,27,1,2,1369307128,1369307128),(39,28,2,1,1369307362,1369307362);
/*!40000 ALTER TABLE `orders_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `content` varchar(500) NOT NULL,
  `hidden` tinyint(3) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  `buy_counts` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_prodcut_category_id_idx` (`product_category_id`),
  CONSTRAINT `fk_product_prodcut_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,2,1,'炸大排鸡蛋面',22.00,'',1,0,0,'2013/21/519d77811439a.jpg',12),(2,2,1,'辣酱番茄意大利面',16.00,'',1,0,0,'2013/21/519d778ba6921.jpg',5),(7,1,1,'南瓜饼',20.00,'介绍',1,1369212665,1369212665,'2013/21/519d7794899da.jpg',0),(9,9,1,'鲜肉馄饨',6.00,'鲜肉馄饨',1,1369271769,1369271769,'2013/21/519d6fe720c0d.jpg',0),(10,3,2,'大份排骨饭',18.00,'介绍',1,1369279948,1369279948,'2013/21/519d8de50c920.jpg',0),(11,3,2,'中份排骨饭',15.00,'介绍',1,1369279977,1369279977,'2013/21/519d8dfbef0c1.jpg',0),(12,3,2,'小份排骨饭',12.00,'介绍',1,1369280000,1369280000,'2013/21/519d8e0b53d5f.jpg',0),(13,11,3,'脆薯条',3.00,'介绍',1,1369280087,1369280087,'2013/21/519d8f195cbe9.jpg',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL,
  `fid` int(10) unsigned NOT NULL,
  `name` varchar(15) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category_shop_id_idx` (`shop_id`),
  CONSTRAINT `fk_product_category_shop_id` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,1,0,'盖浇饭','',1),(2,1,0,'面条','',2),(3,2,0,'排骨饭','',1),(7,1,0,'煲仔饭','',3),(8,1,0,'米线','',4),(9,1,0,'馄饨','',5),(10,2,0,'蔬菜','',2),(11,3,0,'膨化食品','',1);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
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
  `phone` varchar(20) NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receive_address_user_id_idx` (`user_id`),
  CONSTRAINT `fk_receive_address_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_address`
--

LOCK TABLES `receive_address` WRITE;
/*!40000 ALTER TABLE `receive_address` DISABLE KEYS */;
INSERT INTO `receive_address` VALUES (1,2,'高博软件','苏州市工业园区仁爱路1号高博国际中心','田柯','13862531169',0,1369306800),(2,2,'北京大学','403','田柯','13862531169',1369306984,1369306984),(3,14,'云南大学','苏州市','田珂','13862531169',1369307362,1369307362);
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
  `shop_category_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `descripe` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `starttime` char(5) NOT NULL,
  `endtime` char(5) NOT NULL,
  `closing` tinyint(3) unsigned NOT NULL COMMENT '0 => 开门，1 => 关门',
  `close_msg` varchar(255) NOT NULL,
  `hidden` tinyint(3) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  `address` varchar(255) NOT NULL COMMENT '商店地址',
  `areaname` varchar(45) NOT NULL,
  `min_price` decimal(12,2) unsigned NOT NULL,
  `buy_counts` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shops_category_cid_idx` (`shop_category_id`),
  CONSTRAINT `fk_shops_category_cid` FOREIGN KEY (`shop_category_id`) REFERENCES `shop_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (1,1,'四海游龙','锅贴店','四海游龙','06:00','22:30',0,'',1,0,0,'2013/21/519db4eda69c6.jpg','西交大','独墅湖高教区',0.00,0),(2,1,'百碗香','排骨饭','百碗香排骨饭','10:30','8:30',0,'',1,0,0,'2013/21/519db660d66d0.png','文星广场食堂二楼','独墅湖高教区',0.00,0),(3,2,'随便超市','随便超市','随便超市','08:30','01:30',0,'',1,0,0,'2013/21/519db6a80b385.png','','',0.00,0);
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL,
  `name` varchar(15) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (1,0,'餐厅','',1),(2,0,'超市','',2);
/*!40000 ALTER TABLE `shop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_manager`
--

DROP TABLE IF EXISTS `shop_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `role` varchar(20) NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_user_id_shop_id` (`user_id`,`shop_id`),
  KEY `fk_shop_manager_shop_id_idx` (`shop_id`),
  KEY `fk_shop_manager_user_id_idx` (`user_id`),
  CONSTRAINT `fk_shop_manager_shop_id` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shop_manager_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_manager`
--

LOCK TABLES `shop_manager` WRITE;
/*!40000 ALTER TABLE `shop_manager` DISABLE KEYS */;
INSERT INTO `shop_manager` VALUES (1,2,1,'admin',0),(2,8,2,'admin',0),(3,9,3,'admin',0);
/*!40000 ALTER TABLE `shop_manager` ENABLE KEYS */;
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
  `password_salt` char(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  `role` varchar(20) NOT NULL COMMENT '用户角色',
  `buy_counts` int(10) unsigned NOT NULL COMMENT '购买数量',
  `total_credits` int(10) unsigned NOT NULL COMMENT '积分',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'minowu@foxmail.com','minowu','409214b6144a8f86b593e2bfb0c036accb41a8c1','6bf70e156ec89562031ec3ef4929d969','',1368885031,'','ROLE_MEMBER',0,0),(2,'minowu@vip.qq.com','威哥','409214b6144a8f86b593e2bfb0c036accb41a8c1','6bf70e156ec89562031ec3ef4929d969','',1368885031,'','ROLE_MEMBER',0,0),(3,'q','qq','c97923611d4720e5d7e1d985cfd1e69c049de3f9','c3db3f13b06472a194dd083e19618491','',1369039809,'','ROLE_MEMBER',0,0),(4,'g','g','a50def93adeebe213b11214c8e69879d25a2fdce','ffb019f0cbff21f529b7695a5852718c','',1369048102,'','ROLE_MEMBER',0,0),(5,'t','t','5b72c55c843f4b164fe33f5d721b5fb7d0231dba','2eebf0ea3e15fdd286c7d326cff22e7b','',1369099144,'','ROLE_MEMBER',0,0),(6,'jjjjj','uuu','d6caae78d81ac763893ed702601cd03f8b2abc72','67c405f7622dd66c97d6bd5c84ff36e0','',1369101024,'','ROLE_MEMBER',0,0),(7,'sb','h','261274cb3b99a3f13c30932302b21e39c6dae98a','9591964b63cc21db6f606d921c4c4c93','',1369101126,'','ROLE_MEMBER',0,0),(8,'wwv@admin.com','wwv','409214b6144a8f86b593e2bfb0c036accb41a8c1','6bf70e156ec89562031ec3ef4929d969','',1368885031,'','ROLE_MEMBER',0,0),(9,'ktian@admin.com','田柯','409214b6144a8f86b593e2bfb0c036accb41a8c1','6bf70e156ec89562031ec3ef4929d969','',1368885031,'','ROLE_MEMBER',0,0),(10,'k','半红的枫叶','a0061047aa6186c0326e0bdfa9b569b12398ecec','b7de09fa393738e32dbf2a6f136094e4','',1369302558,'','ROLE_MEMBER',0,0),(11,'jj','JJ','7af46adc3cb65b22f1aaed9a2d97643f662c3c47','f63d91326fcb51ea799f2449cd404d62','',1369302715,'','ROLE_MEMBER',0,0),(12,'gg','GG','78ab76aa8665381b516b0ba66ab6ddc1a7cd51a3','09d29c0fb5e83179bde6d4950ff45a14','',1369302878,'','ROLE_MEMBER',0,0),(13,'gh','GH','da2f93c4aa6def899abbd5b217341ee86f3b7ddd','dc51530997023a5211de391760530de2','',1369303173,'','ROLE_MEMBER',0,0),(14,'ghj','GHJ','dc6b275d57b53374f81b4890f44807085f23882e','9774d8e3a0ab8c726b4db28d1b998770','',1369303238,'','ROLE_MEMBER',0,0),(15,'toan@ghj.com','ghh','0091d5d3b83d81bd80355125b428febe3f5f2886','73d21e902e05ec17d88ba4a152a9b54e','',1369310808,'','ROLE_MEMBER',0,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-23 20:29:50
