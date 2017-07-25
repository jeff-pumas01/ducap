-- MySQL dump 10.14  Distrib 5.5.33-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cs440team2
-- ------------------------------------------------------
-- Server version	5.5.33-MariaDB

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
-- Table structure for table `Administrators`
--

DROP TABLE IF EXISTS `Administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Administrators` (
  `admin_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Administrators`
--

LOCK TABLES `Administrators` WRITE;
/*!40000 ALTER TABLE `Administrators` DISABLE KEYS */;
INSERT INTO `Administrators` VALUES ('admin','administrator','howardcy@lewisu.edu','8158365134','12M15RAor/ulM'),('birdh','birdh','heatherbird@lewisu.edu','6302096331','12D1aFrK1JvMw'),('root','root','','','12O69mG8XyfSc'),('tony','anthony matsas','tony@email.com','7082286281','12ICd0/u8cAmA');
/*!40000 ALTER TABLE `Administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Attendance`
--

DROP TABLE IF EXISTS `Attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Attendance` (
  `participant_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`participant_id`,`event_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `Attendance_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `Events` (`event_id`),
  CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `Participants` (`participant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Attendance`
--

LOCK TABLES `Attendance` WRITE;
/*!40000 ALTER TABLE `Attendance` DISABLE KEYS */;
INSERT INTO `Attendance` VALUES (1,18),(25,7),(36,15),(38,14),(38,19),(39,16),(40,7),(40,16),(41,14),(41,19),(43,15),(44,7),(48,14),(48,19),(49,15),(49,19),(50,14),(50,19),(51,14),(51,15);
/*!40000 ALTER TABLE `Attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contributions`
--

DROP TABLE IF EXISTS `Contributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contributions` (
  `amount` decimal(19,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  KEY `site_id` (`site_id`),
  CONSTRAINT `Contributions_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `Sites` (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contributions`
--

LOCK TABLES `Contributions` WRITE;
/*!40000 ALTER TABLE `Contributions` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Events`
--

DROP TABLE IF EXISTS `Events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `timeStart` varchar(255) DEFAULT NULL,
  `timeLength` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `site_id` (`site_id`),
  CONSTRAINT `Events_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `Sites` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Events`
--

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;
INSERT INTO `Events` VALUES (7,'Halloween Bake Sale','2016-10-31',5,'3:30 PM',60),(12,'Clothes Drive','2016-11-01',10,'8:30 AM',120),(13,'Math Club','2016-11-05',10,'4:00 PM',45),(14,'Arts and Crafts','2016-12-01',3,'3:00 PM',60),(15,'Running Club','2016-11-30',3,'3:30 PM',30),(16,'Reading Club','2016-12-03',5,'1:00 PM',60),(17,'Book Club','2016-12-03',6,'12:00 PM',45),(18,'Board Games','2016-12-02',7,'5:00',180),(19,'Scavenger Hunt','2016-12-04',3,'10:00 AM',120);
/*!40000 ALTER TABLE `Events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Guardianship`
--

DROP TABLE IF EXISTS `Guardianship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Guardianship` (
  `participant_id` int(11) NOT NULL DEFAULT '0',
  `legal_guardian_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`participant_id`,`legal_guardian_id`),
  KEY `fk_lg_id` (`legal_guardian_id`),
  CONSTRAINT `fk_p_id` FOREIGN KEY (`participant_id`) REFERENCES `Participants` (`participant_id`),
  CONSTRAINT `fk_lg_id` FOREIGN KEY (`legal_guardian_id`) REFERENCES `Participant_Legal_Guardians` (`id`),
  CONSTRAINT `Guardianship_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `Participants` (`participant_id`),
  CONSTRAINT `Guardianship_ibfk_2` FOREIGN KEY (`legal_guardian_id`) REFERENCES `Participant_Legal_Guardians` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Guardianship`
--

LOCK TABLES `Guardianship` WRITE;
/*!40000 ALTER TABLE `Guardianship` DISABLE KEYS */;
INSERT INTO `Guardianship` VALUES (1,1),(40,3),(45,8),(46,8),(48,9),(49,10),(50,10),(51,10),(52,12),(53,13),(54,13),(55,14),(56,15);
/*!40000 ALTER TABLE `Guardianship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participant_Legal_Guardians`
--

DROP TABLE IF EXISTS `Participant_Legal_Guardians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participant_Legal_Guardians` (
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `home_number` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `other_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participant_Legal_Guardians`
--

LOCK TABLES `Participant_Legal_Guardians` WRITE;
/*!40000 ALTER TABLE `Participant_Legal_Guardians` DISABLE KEYS */;
INSERT INTO `Participant_Legal_Guardians` VALUES ('Green','Tom','5555555555',NULL,NULL,'tomgreen@lewisu.edu',1),('Wise','Jane','9998887777','8887776666','7776665555','jwise@gmail.com',2),('Simpson','Marge','3334441234','3335556666','3332224321','margesimpson@gmail.com',3),('Smith','Ralph','5551112222','2223334444','4445556666','ralphsmith@gmail.com',4),('Jones','Clara','2223334444','1112223333','9998887777','cjones@aol.com',5),('Zigler','Zoe','1112223333','1112223333','1112223333','zoezig@gmail.com',6),('Zigler','Zander','1112223333','1112223333','1112223333','zanzig@yahoo.com',7),('Yami','Yadira','2223334444','2223334444','2223334444','yaya@gmail.com',8),('Whitehall','Wade','3334445555','3334445555','3334445555','WadeWhitehall@att.net',9),('Vantas','Valentina','8887776666','8887776666','8887776666','valvantas@hotmail.net',10),('Curtis','Beth','2542069587','2542069587','2542069587','BethMCurtis@gmail.com',12),('Williams','Brian','5554443333','5554443333','5554443333','brian.williams@aol.com',13),('Laney','Michael','3178812520','3178812520','3178812520','MichaelALaney@sbcglobal.net',14),('Tsai','Mai','5555555555','5555555555','5555555555','maitsai@yahoo.com',15);
/*!40000 ALTER TABLE `Participant_Legal_Guardians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participants`
--

DROP TABLE IF EXISTS `Participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participants` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `race` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `t_shirt_size` varchar(255) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `medications` text,
  `notes` text,
  `asthma` tinyint(1) DEFAULT NULL,
  `emer_name` varchar(50) DEFAULT NULL,
  `emer_phone` varchar(10) DEFAULT NULL,
  `emer_relation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`participant_id`),
  KEY `site_id` (`site_id`),
  CONSTRAINT `Participants_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `Sites` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participants`
--

LOCK TABLES `Participants` WRITE;
/*!40000 ALTER TABLE `Participants` DISABLE KEYS */;
INSERT INTO `Participants` VALUES (1,'Thongsri','Rungkiart','M','Asian','2016-03-29','Woodview Elementary','Fourth','Medium',7,'Benadryl','One tablet as needed for seasonal allergies',0,'D Thongsri','6301112345','Sister'),(22,'Buckland','Colin','M','Caucasian','2006-05-24','Irene King Elementary','Fourth','Medium',5,'Benadryl','One tablet as needed for seasonal allergies',1,'Mary Buckland','1115552222','Grandmother'),(25,'Ogden','Alison','F','Asian','2009-04-06','Sipley Elementary','Second','Small',5,NULL,NULL,NULL,NULL,NULL,NULL),(36,'Springer','Sarah','F','African American','2008-09-12','Sipley Elementary','Third','Medium',3,NULL,NULL,NULL,NULL,NULL,NULL),(37,'Buckland','Colin','M','Caucasian','2009-11-14','Irene King Elementary','Second','Large',5,'','',0,'Cole Buckland','2223334444','Father'),(38,'Stern','Carly','F','Multi-Racial','2008-02-29','Woodview Elementary','Third','X-Small',3,'Tylenol','Take one tablet if sprained arm hurts',0,'Mary Stern','8476929376','Aunt'),(39,'Johnson','Mark','M','African-American','2010-12-04','Sipley Elementary','Kindergarten','Small',5,'','',0,'Julia Johnson','3332221111','Cousin'),(40,'Smith','Lisa','F','Multi-Racial','2004-10-30','Springfield Elementary','Sixth','Small',5,'','',0,'Selma Bouvier','5551112222','Aunt'),(41,'Jones','Carla','F','Multi-Racial','2010-10-31','Sipley Elementary','Kindergarten','Small',3,'','',0,'Carl Jones','4445556666','Uncle'),(42,'Zigler','Zack','M','African-American','2010-11-02','Woodview Elementary','Kindergarten','X-Small',5,'','',1,'Zane Zigler','1112223333','Cousin'),(43,'Zigler','Zala','F','Multi-Racial','2009-11-04','Woodview Elementary','First','X-Small',3,'','',1,'Zane Zigler','1112223333','Cousin'),(44,'Zigler','Zed','M','Multi-Racial','2008-11-03','Woodview Elementary','Second','Medium',5,'','',0,'Zane Zigler','1112223333','Cousin'),(45,'Yami','Yash','M','Asian','2010-10-20','Sipley Elementary','Kindergarten','Medium',5,'','',0,'Yama Yami','2223334444','Brother'),(46,'Yami','Yamuna','F','Asian','2006-12-30','Sipley Elementary','Fourth','Medium',5,'','',0,'Yama Yami','2223334444','Brother'),(47,'Yami','Yasha','F','Asian','2007-12-12','Sipley Elementary','Third','Medium',5,'Inhaler','Use as needed for asthma',1,'Yama Yami','1112223333','Brother'),(48,'Whitehall','Wendy','F','Other','2009-03-15','Irene King Elementary','First','Small',3,'','',1,'Walt Whitehall','5556667777','Grandpa'),(49,'Vantas','Victor','M','Hispanic/Latino','2006-02-01','Irene King Elementary','Fourth','Large',3,'','',0,'VV','5555555555','Cousin'),(50,'Vantas','Viviana','F','Hispanic/Latino','2010-05-05','Irene King Elementary','Kindergarten','X-Small',3,'','',0,'VV','5555555555','Cousin'),(51,'Vantas','Vito','M','Hispanic/Latino','2009-03-03','Irene King Elementary','First','Small',3,'','',1,'VV','5555555555','Cousin'),(52,'Curtis','Thomas','M','Multi-Racial','2006-12-04','Woodview Elementary','Fourth','Medium',5,'He can take one dose of Tylenol for pain, as administered by staff.','Recovering from broken arm',0,'Paul Curtis','5551234567','Brother'),(53,'Williams','Sarah','F','African-American','2006-10-11','Sipley','Fourth','X-Small',5,'','',0,'Cindy Williams','5555555555','Mother'),(54,'Williams','Richard','M','African-American','2005-04-15','Sipley Elementary','Fifth','Large',5,'','',0,'Cindy Williams','5555555555','Mother'),(55,'Laney','Lydia','F','Native American','2007-03-15','Woodview Elementary','Third','X-Small',3,'','',1,'Ellen Laney','4089619505','Aunt'),(56,'Tsai','Jennifer','F','Asian','2006-02-27','Woodview Elementary','Fourth','Medium',5,'','',0,'Mai Tsai','5555555555','Grandmother');
/*!40000 ALTER TABLE `Participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sites`
--

DROP TABLE IF EXISTS `Sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` char(2) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sites`
--

LOCK TABLES `Sites` WRITE;
/*!40000 ALTER TABLE `Sites` DISABLE KEYS */;
INSERT INTO `Sites` VALUES (3,'201 Recreation Drive','60440','Bolingbrook','IL','Bolingbrook Park District'),(5,'300 W Briarcliff Rd','60440','Bolingbrook','IL','Bolingbrook Library'),(6,'201 Normantown Rd','60446','Romeoville','IL','Romeoville Library'),(7,'213 N. Lombard Rd.','60101','Addison','IL','Addison Trail High School'),(8,'1014 S. Main St.','60148','Lombard','IL','Glenbard East High School'),(9,'7401 Clarendon Hills Rd.','60561','Darien','IL','Hinsdale South High School'),(10,'2806 83rd St.','60517','Woodridge','IL','Sipley Elementary School'),(11,'16028 127th Street','60439','Lemont','IL','Lemont Park District'),(12,'1925 Ohio Street','60446','Lisle','IL','Lisle Park District'),(14,'1 Eaton Ave','60446','Romeoville','IL','Irene King Elementary School');
/*!40000 ALTER TABLE `Sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Volunteer_Hours`
--

DROP TABLE IF EXISTS `Volunteer_Hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Volunteer_Hours` (
  `volunteer_id` int(11) NOT NULL,
  `monday` varchar(255) DEFAULT NULL,
  `tuesday` varchar(255) DEFAULT NULL,
  `wednesday` varchar(255) DEFAULT NULL,
  `thursday` varchar(255) DEFAULT NULL,
  `friday` varchar(255) DEFAULT NULL,
  `saturday` varchar(255) DEFAULT NULL,
  `sunday` varchar(255) DEFAULT NULL,
  KEY `volunteer_id` (`volunteer_id`),
  CONSTRAINT `Volunteer_Hours_ibfk_1` FOREIGN KEY (`volunteer_id`) REFERENCES `Volunteers` (`volunteer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Volunteer_Hours`
--

LOCK TABLES `Volunteer_Hours` WRITE;
/*!40000 ALTER TABLE `Volunteer_Hours` DISABLE KEYS */;
/*!40000 ALTER TABLE `Volunteer_Hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Volunteers`
--

DROP TABLE IF EXISTS `Volunteers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Volunteers` (
  `volunteer_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `home_number` varchar(255) DEFAULT NULL,
  `work_number` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `emer_name` varchar(50) DEFAULT NULL,
  `emer_phone` varchar(10) DEFAULT NULL,
  `emer_relation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`volunteer_id`),
  KEY `site_id` (`site_id`),
  CONSTRAINT `Volunteers_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `Sites` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Volunteers`
--

LOCK TABLES `Volunteers` WRITE;
/*!40000 ALTER TABLE `Volunteers` DISABLE KEYS */;
INSERT INTO `Volunteers` VALUES (14,'Smith','Rachel','1980-05-05','12 Center Street','60446','Romeoville','5551234567',NULL,NULL,'rachelbsmith@aim.com',5,'12BWKETBcM70Q','rsmith',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Volunteers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-09 13:40:19
