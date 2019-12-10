-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: ex2p3
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Current Database: `ex2p3`
--
drop database if exists `ex2p3`;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ex2p3` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ex2p3`;

--
-- Table structure for table `rainbow`
--

DROP TABLE IF EXISTS `rainbow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rainbow` (
  `hash` varchar(50) NOT NULL,
  `password` varchar(5) NOT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rainbow`
--

LOCK TABLES `rainbow` WRITE;
/*!40000 ALTER TABLE `rainbow` DISABLE KEYS */;
/*!40000 ALTER TABLE `rainbow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testRainbow`
--

DROP TABLE IF EXISTS `testRainbow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testRainbow` (
  `hash` varchar(50) NOT NULL,
  `password` varchar(5) NOT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testRainbow`
--

LOCK TABLES `testRainbow` WRITE;
/*!40000 ALTER TABLE `testRainbow` DISABLE KEYS */;
INSERT INTO `testRainbow` VALUES ('2af54305f183778d87de0c70c591fae4','jjj'),('9e94b15ed312fa42232fd87a55db0d39','007'),('f561aaf6ef0bf14d4208bb46a4ccb3ad','xxx');
/*!40000 ALTER TABLE `testRainbow` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-26  5:32:58
