/*
SQLyog Community Edition- MySQL GUI v8.14 
MySQL - 5.1.38 : Database - itquotes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`itquotes` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;

USE `itquotes`;

/*Table structure for table `Quote` */

DROP TABLE IF EXISTS `Quote`;

CREATE TABLE `Quote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `textRu` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `textEn` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `author` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `createdTime` int(11) NOT NULL,
  `approvedTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `Quote` */

insert  into `Quote`(`id`,`textRu`,`textEn`,`author`,`createdTime`,`approvedTime`) values (8,'Beauty is more important in computing than anywhere else in technology because software is so complicated. Beauty is the ultimate defence against complexity.','Beauty is more important in computing than anywhere else in technology because software is so complicated. Beauty is the ultimate defence against complexity.','David Gelernter',1254297509,NULL),(9,'Measuring programming progress by lines of code is like measuring aircraft building progress by weight','Measuring programming progress by lines of code is like measuring aircraft building progress by weight','Bill Gates',1254297509,NULL),(10,'I don\'t do build tests before comitting; users generate better error messages than gcc','I don\'t do build tests before comitting; users generate better error messages than gcc','Some KDE developer',1254297509,NULL),(12,'I\'ve always lived cheaply … like a student, basically. And I like that, because it means that money is not telling me what to do','I\'ve always lived cheaply … like a student, basically. And I like that, because it means that money is not telling me what to do','Stallman, Richard',1254297509,NULL),(13,'','Some people, when confronted with a problem, think\r\n“I know, I\'ll use regular expressions.”   Now they have two problems','Jamie Zawinski',1254297509,1254304537),(14,'So I really hope everybody’s wrong and everything doesn’t ”move to the web.”  Because if it does, one day I will either have to reluctantly join this boring movement, or I’ll have to find another profession','So I really hope everybody’s wrong and everything doesn’t ”move to the web.”  Because if it does, one day I will either have to reluctantly join this boring movement, or I’ll have to find another profession','Michael Braude',1254297509,1254300355);

/*Table structure for table `QuoteTag` */

DROP TABLE IF EXISTS `QuoteTag`;

CREATE TABLE `QuoteTag` (
  `quoteId` int(10) unsigned NOT NULL,
  `tagId` int(10) unsigned NOT NULL,
  UNIQUE KEY `uniqIndex` (`quoteId`,`tagId`),
  KEY `quoteId` (`quoteId`),
  KEY `tagId` (`tagId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `QuoteTag` */

insert  into `QuoteTag`(`quoteId`,`tagId`) values (4,8),(8,3),(8,7),(8,8),(14,7),(14,8),(14,9),(14,10),(14,11),(14,12);

/*Table structure for table `Tag` */

DROP TABLE IF EXISTS `Tag`;

CREATE TABLE `Tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameRu` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nameEn` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `Tag` */

insert  into `Tag`(`id`,`nameRu`,`nameEn`) values (3,'foo','One'),(5,'foo','Three'),(7,'foo','Four'),(8,'foo','Five'),(9,'foo','Six'),(10,'foo','Seven'),(11,'foo','Eight'),(12,'foo','Nine'),(13,'foo','Ten'),(15,'foo','Two'),(16,'foo','111'),(17,'sasha','Sasha');

/*Table structure for table `User` */

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `User` */

insert  into `User`(`id`,`username`,`password`) values (1,'voice','e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
