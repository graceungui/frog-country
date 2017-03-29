/*
SQLyog Community v11.4 (64 bit)
MySQL - 5.5.24-log : Database - frogcountry
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`frogcountry` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `frogcountry`;

/*Table structure for table `frog` */

DROP TABLE IF EXISTS `frog`;

CREATE TABLE `frog` (
  `frog_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `deathdate` date DEFAULT NULL,
  `pond_id` int(11) DEFAULT NULL,
  `father` int(11) DEFAULT NULL,
  `mother` int(11) DEFAULT NULL,
  PRIMARY KEY (`frog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `frog` */

insert  into `frog`(`frog_id`,`name`,`gender`,`birthdate`,`deathdate`,`pond_id`,`father`,`mother`) values (3,'dyna','F','1995-08-16','2009-07-23',1,NULL,NULL),(6,'bernan','M','1950-01-01',NULL,6,NULL,NULL),(7,'dodong','M','1950-01-01',NULL,5,NULL,NULL),(10,'pedro','M','1950-01-01',NULL,6,NULL,NULL),(11,'eric','M','1950-01-01','1950-03-04',2,NULL,NULL),(16,'taddy','F','2016-05-29',NULL,5,NULL,NULL),(18,'janny','F','1964-01-01',NULL,6,NULL,NULL),(19,'shimily','F','1974-10-09','2020-01-04',5,NULL,NULL),(20,'janny','F','1950-01-01',NULL,5,NULL,NULL),(28,'japed','F','2014-07-04',NULL,6,NULL,NULL),(29,'menchie','F','2014-01-01',NULL,6,NULL,NULL),(30,'taddy pole','F','2016-01-01',NULL,5,NULL,NULL),(31,'jimboy','M','2011-01-01',NULL,1,NULL,NULL),(32,'chikoku','M','2012-05-04',NULL,3,NULL,NULL),(33,'cassy','F','2010-07-12',NULL,1,NULL,NULL),(34,'kyle','M','2007-04-10',NULL,2,NULL,NULL),(35,'holla','F','2006-08-03',NULL,2,NULL,NULL),(36,'sham','M','2012-03-04',NULL,4,NULL,NULL),(37,'shanny','F','2011-01-01',NULL,4,NULL,NULL),(38,'tinn','F','2013-05-12',NULL,3,NULL,NULL),(39,'taddy 3','F','2016-01-01',NULL,2,NULL,NULL);

/*Table structure for table `pond` */

DROP TABLE IF EXISTS `pond`;

CREATE TABLE `pond` (
  `pond_id` int(11) NOT NULL AUTO_INCREMENT,
  `pond_name` varchar(30) NOT NULL,
  `pond_location` varchar(50) DEFAULT NULL,
  `pond_status` tinyint(1) DEFAULT '1' COMMENT '1:open; 0:close',
  PRIMARY KEY (`pond_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `pond` */

insert  into `pond`(`pond_id`,`pond_name`,`pond_location`,`pond_status`) values (1,'Villa lily','Kuala Lumpur',1),(2,'mushroom temple','George Town',1),(3,'canal falls','Johor Bahru',1),(4,'Clear Water','Malacca City',1),(5,'Mud Flood','Ipoh',1),(6,'Black Forest','Kota Bahru',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`user_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`password`) values (1,'grace','grace');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
