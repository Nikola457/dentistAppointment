-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: dentalOffice
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_id` int DEFAULT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schedule_id_UNIQUE` (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=234255 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (234245,'retertet','2022-04-28 00:00:00','2022-04-29 00:00:00','2022-04-20 07:08:50','2022-04-20 07:08:50',123,'etretetrretret',21,'Screenshot from 2022-02-25 02-35-05_1648548901.png'),(234246,'Admin','2022-04-22 00:00:00','2022-04-23 00:00:00','2022-04-20 07:24:46','2022-04-20 07:24:46',125,'eqweqweqeqweqwe',21,'lotr_1648553209.jpeg'),(234247,'operacija zuba','2022-04-20 10:30:00','2022-04-20 19:30:00','2022-04-20 07:28:07','2022-04-20 07:28:07',127,'asdeqweqwe',20,'hp_1648591084.jpg'),(234248,'wqeqwe','2022-04-23 00:00:00','2022-04-24 00:00:00','2022-04-20 10:50:36','2022-04-20 10:50:36',126,'asdeqweqwe',21,'hp_1648591084.jpg'),(234249,'qweqw','2022-04-29 00:00:00','2022-04-30 00:00:00','2022-04-20 11:13:11','2022-04-20 11:13:11',130,'eqweqweqweqweqweqwe',24,'download_1650459964.jpeg'),(234250,'ef','2022-04-30 00:00:00','2022-05-01 00:00:00','2022-04-20 11:31:45','2022-04-20 11:31:45',133,'werewrwerwer',25,'download_1650461367.jpeg'),(234251,'wqeqwe','2022-04-07 00:00:00','2022-04-08 00:00:00','2022-04-20 12:17:11','2022-04-20 12:17:11',129,'asdeqweqwe',21,'hp_1648591084.jpg'),(234252,'Zakazivanje','2022-04-26 11:00:00','2022-04-26 17:00:00','2022-04-20 13:11:44','2022-04-20 13:11:44',131,'qweqeqe',21,'download_1650460455.jpeg'),(234253,'Zakazivanje','2022-05-05 09:00:00','2022-05-05 14:00:00','2022-05-05 11:20:10','2022-05-05 11:20:10',132,'231312',21,'download_1650460516.jpeg'),(234254,'termin','2022-06-18 00:00:00','2022-05-19 00:00:00','2022-05-23 10:24:01','2022-05-23 10:24:01',135,'Poruka',21,'download_1650467569.jpeg');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-24 12:40:37
