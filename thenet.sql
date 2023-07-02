-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: thenet
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `id` char(36) NOT NULL,
  `first_name` text,
  `second_name` text,
  `age` int DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `biography` text,
  `city` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` char(32) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('1','Eva','TheFirstWoman',21,'2002-07-02','Hey! I\'m Eva. I hope I can make you laugh, get through a tough day, and show you some cool new ways to live life ☺️🧡🌈\n','Amsterdam','$2y$10$7ixKy36yfnI3/NJfMEgCl.usoSoFIZNMRFKXRUz6tEkVbzePQcZ5i','5bb684c7280fc18b271e3ddea67c9988'),('1ED4FF5F-53C8-4BD7-9033-DA2DD26E6A4C','Olga','Butygina',22,'2001-07-02','Hi there!','Moscow','$2y$10$V1L92ObO01MjUI9ttiFc5ecUMczeeeX0ovkhHyV8p0qbUsKUyt/B.',NULL),('B426A00F-71F1-4B1D-B507-3C715368B4FC','Olga','Butygina',22,'2001-07-02','I like volleyball and coding','Moscow','$2y$10$Ger6f5d04V73N/hxXTTahOkXTraLZzCqq2WG1mahMJpVxL1PP/1/q',NULL),('D374FD90-1E49-4FE1-9BA1-6875D567A405','Olga','Butygina',22,'2001-07-02','My hobbies are Volleyball and Box','Moscow','$2y$10$zBNaKVL2wzBKnrxhvPunCOimyBLiiencBJsdxzBou0AbH3oYCxSmm',NULL);
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

-- Dump completed on 2023-07-02 22:49:28
