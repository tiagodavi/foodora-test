CREATE DATABASE  IF NOT EXISTS `foodora` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `foodora`;
-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: foodora
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` (`id`, `name`) VALUES (1,'FooBar');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_schedule`
--

DROP TABLE IF EXISTS `vendor_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_schedule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint(20) DEFAULT NULL,
  `week_day` tinyint(4) NOT NULL DEFAULT '0',
  `all_day` tinyint(3) NOT NULL DEFAULT '0',
  `start_hour` time DEFAULT NULL,
  `stop_hour` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_schedule`
--

LOCK TABLES `vendor_schedule` WRITE;
/*!40000 ALTER TABLE `vendor_schedule` DISABLE KEYS */;
INSERT INTO `vendor_schedule` (`id`, `vendor_id`, `week_day`, `all_day`, `start_hour`, `stop_hour`) VALUES (1,1,2,0,'19:00:00','22:00:00'),(2,1,3,0,'19:00:00','22:00:00'),(3,1,4,0,'19:00:00','22:00:00'),(4,1,5,0,'19:00:00','22:00:00'),(5,1,6,0,'11:00:00','14:00:00'),(6,1,6,0,'19:00:00','23:59:59'),(7,1,7,1,NULL,NULL);
/*!40000 ALTER TABLE `vendor_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_special_day`
--

DROP TABLE IF EXISTS `vendor_special_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_special_day` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint(20) DEFAULT NULL,
  `special_date` date DEFAULT NULL,
  `event_type` enum('opened','closed') DEFAULT NULL,
  `all_day` tinyint(1) DEFAULT NULL,
  `start_hour` time DEFAULT NULL,
  `stop_hour` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_special_day`
--

LOCK TABLES `vendor_special_day` WRITE;
/*!40000 ALTER TABLE `vendor_special_day` DISABLE KEYS */;
INSERT INTO `vendor_special_day` (`id`, `vendor_id`, `special_date`, `event_type`, `all_day`, `start_hour`, `stop_hour`) VALUES (1,1,'2015-12-24','closed',1,NULL,NULL),(2,1,'2015-12-25','closed',1,NULL,NULL),(3,1,'2015-12-26','opened',0,'19:00:00','22:00:00'),(4,1,'2015-12-27','opened',0,'19:00:00','22:00:00');
/*!40000 ALTER TABLE `vendor_special_day` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-03 21:08:23
