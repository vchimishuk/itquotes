-- MySQL dump 10.13  Distrib 5.1.41, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: itquotes
-- ------------------------------------------------------
-- Server version	5.1.41

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
-- Table structure for table `Quote`
--

DROP TABLE IF EXISTS `Quote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Quote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `textRu` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `textEn` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `author` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `createdTime` int(11) NOT NULL,
  `approvedTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Quote`
--

LOCK TABLES `Quote` WRITE;
/*!40000 ALTER TABLE `Quote` DISABLE KEYS */;
INSERT INTO `Quote` VALUES (8,'Beauty is more important in computing than anywhere else in technology because software is so complicated. Beauty is the ultimate defence against complexity.','Beauty is more important in computing than anywhere else in technology because software is so complicated. Beauty is the ultimate defence against complexity.','David Gelernter',1254297509,NULL),(9,'Measuring programming progress by lines of code is like measuring aircraft building progress by weight','Measuring programming progress by lines of code is like measuring aircraft building progress by weight','Bill Gates',1254297509,NULL),(10,'I don\'t do build tests before comitting; users generate better error messages than gcc','I don\'t do build tests before comitting; users generate better error messages than gcc','Some KDE developer',1254297509,1254487146),(12,'I\'ve always lived cheaply … like a student, basically. And I like that, because it means that money is not telling me what to do','I\'ve always lived cheaply … like a student, basically. And I like that, because it means that money is not telling me what to do','Stallman, Richard',1254297509,1254324470),(13,'','Some people, when confronted with a problem, think\r\n“I know, I\'ll use regular expressions.”   Now they have two problems','Jamie Zawinski',1254297509,1254304537),(14,'So I really hope everybody’s wrong and everything doesn’t ”move to the web.”  Because if it does, one day I will either have to reluctantly join this boring movement, or I’ll have to find another profession','So I really hope everybody’s wrong and everything doesn’t ”move to the web.”  Because if it does, one day I will either have to reluctantly join this boring movement, or I’ll have to find another profession','Michael Braude',1254297509,1254300355),(20,NULL,NULL,NULL,1254398505,NULL);
/*!40000 ALTER TABLE `Quote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuoteTag`
--

DROP TABLE IF EXISTS `QuoteTag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuoteTag` (
  `quoteId` int(10) unsigned NOT NULL,
  `tagId` int(10) unsigned NOT NULL,
  UNIQUE KEY `uniqIndex` (`quoteId`,`tagId`),
  KEY `quoteId` (`quoteId`),
  KEY `tagId` (`tagId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuoteTag`
--

LOCK TABLES `QuoteTag` WRITE;
/*!40000 ALTER TABLE `QuoteTag` DISABLE KEYS */;
INSERT INTO `QuoteTag` VALUES (8,3),(8,7),(8,8),(9,8),(14,8);
/*!40000 ALTER TABLE `QuoteTag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tag`
--

DROP TABLE IF EXISTS `Tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (3,'One'),(5,'Two'),(7,'Three'),(8,'Four'),(9,'Five'),(10,'Six'),(11,'7'),(12,'8'),(13,'9'),(15,'Ten'),(16,'Elleven'),(17,'Twelve');
/*!40000 ALTER TABLE `Tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'voice','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-12-02 15:03:05
