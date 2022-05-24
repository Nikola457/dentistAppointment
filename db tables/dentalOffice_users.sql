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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com',NULL,'$2y$10$TFJWlQSRE943NgfrzA6dh.T1v5nRITFI51rT2bEMzu/0a6HkZRlKq',NULL,'2022-03-22 14:01:32','2022-03-22 14:01:32','232'),(18,'Nikola Kapetanovic','n.kapetanovic51@gmail.com',NULL,'$2y$10$kJ.qpD26rFm1wFANocmKbOVeKTv09owAYoqhnCOQfDch2zdM9jqQq',NULL,'2022-03-22 13:59:51','2022-03-22 13:59:51','1223'),(20,'marko markovic','markomarkovic@gmail.com',NULL,'$2y$10$yGtVVGAtatzoSZr/hKSe9OahGXAlX748rg3Ym7zNp2RLgXrjhnNoG',NULL,'2022-03-22 14:02:37','2022-03-22 14:02:37','063223153'),(21,'Test','test@gmail.com',NULL,'$2y$10$gtWCoSKglixvdY29JhiFCuyI/KwMp9QG.7E/QnKf75fctY0.PCVZq',NULL,'2022-03-25 09:58:07','2022-03-25 09:58:07','0653295203'),(22,'qweqweqwewqeqwe','qweqweqewq@gmailc.om',NULL,'$2y$10$M/m0EK3OEUxBoZaxv7hWg.DZv/W1ZMVSc52J7QO/j.TTr1M7xejE6',NULL,'2022-03-25 10:03:06','2022-03-25 10:03:06','2321425215124'),(23,'Testuser','testuser123@gmail.com',NULL,'$2y$10$ONjG/C91BoxObzC6b9mgd.gIhQpdL/wpAMu9Y4NbcGvOHMRWjKGVS',NULL,'2022-03-25 10:04:29','2022-03-25 10:04:29','12345678912'),(24,'Nikola Kapetanovic','n.kapetanovic@gmail.com',NULL,'$2y$10$1ls8iUcuJdiDgRKGBQ3PMOPFSGgnW9EUGWfhNmkCyU/V0ybIJtWnK',NULL,'2022-04-20 10:51:15','2022-04-20 10:51:15','0638854539'),(25,'Nikola123','nikol123@gmail.com',NULL,'$2y$10$6hBVwLogs04nxHxS7bIwAOVCz/o7eQJTbna3suwPpHTqVlzSP.CQC',NULL,'2022-04-20 11:29:17','2022-04-20 11:29:17','23123123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
