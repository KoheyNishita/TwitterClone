-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: twitter_clone
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `follow_user_id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `follow_user_id` (`follow_user_id`),
  KEY `followed_user_id` (`followed_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,'active',2,3,'2021-02-19 07:05:49','2021-02-19 07:05:49'),(2,'active',2,1,'2021-02-19 07:05:54','2021-02-19 07:05:54'),(3,'active',4,1,'2021-11-22 14:12:27','2021-11-22 14:12:27'),(4,'active',1,4,'2021-11-22 14:16:39','2021-11-22 14:16:39');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `user_id` (`user_id`),
  KEY `tweet_id` (`tweet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,'active',2,12,'2021-02-19 07:17:43','2021-02-19 07:17:43'),(2,'deleted',2,5,'2021-02-19 07:17:58','2021-02-19 07:17:58'),(3,'active',2,7,'2021-02-19 07:17:59','2021-02-19 07:17:59'),(4,'active',2,14,'2021-02-19 07:18:01','2021-02-19 07:18:01'),(5,'active',2,16,'2021-02-19 07:18:06','2021-02-19 07:18:06'),(6,'active',2,18,'2021-02-19 07:18:06','2021-02-19 07:18:06'),(7,'deleted',4,17,'2021-11-22 14:14:54','2021-11-22 14:14:54'),(8,'deleted',4,17,'2021-11-22 14:15:17','2021-11-22 14:15:17'),(9,'active',4,17,'2021-11-22 14:15:35','2021-11-22 14:15:35'),(10,'active',4,16,'2021-11-22 14:15:35','2021-11-22 14:15:35'),(11,'active',1,20,'2021-11-22 14:16:32','2021-11-22 14:16:32');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `received_user_id` int(11) NOT NULL,
  `sent_user_id` int(11) NOT NULL,
  `message` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `received_user_id` (`received_user_id`),
  KEY `sent_user_id` (`sent_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'active',3,2,'繝輔か繝ｭ繝ｼ縺輔ｌ縺ｾ縺励◆縲・,'2021-02-19 07:05:49','2021-02-19 07:05:49'),(2,'active',1,2,'繝輔か繝ｭ繝ｼ縺輔ｌ縺ｾ縺励◆縲・,'2021-02-19 07:05:54','2021-02-19 07:05:54'),(3,'active',3,2,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-02-19 07:17:43','2021-02-19 07:17:43'),(4,'active',1,2,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-02-19 07:17:58','2021-02-19 07:17:58'),(5,'active',1,4,'繝輔か繝ｭ繝ｼ縺輔ｌ縺ｾ縺励◆縲・,'2021-11-22 14:12:27','2021-11-22 14:12:27'),(6,'active',1,4,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-11-22 14:14:54','2021-11-22 14:14:54'),(7,'active',1,4,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-11-22 14:15:17','2021-11-22 14:15:17'),(8,'active',1,4,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-11-22 14:15:35','2021-11-22 14:15:35'),(9,'active',1,4,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-11-22 14:15:35','2021-11-22 14:15:35'),(10,'active',4,1,'縺・＞縺ｭ・√＆繧後∪縺励◆縲・,'2021-11-22 14:16:32','2021-11-22 14:16:32'),(11,'active',4,1,'繝輔か繝ｭ繝ｼ縺輔ｌ縺ｾ縺励◆縲・,'2021-11-22 14:16:39','2021-11-22 14:16:39');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tweets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL,
  `body` varchar(140) NOT NULL,
  `image_name` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `user_id` (`user_id`),
  KEY `body` (`body`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,'active',2,'縺ゅ≠縺ゅ≠縺・r\n縺ゅ≠縺ゅ≠縺・,NULL,'2018-01-19 05:32:02','2018-01-19 05:32:02'),(2,'active',2,'縺・＞縺・＞縺Ыr\n縺・＞縺・＞縺・,NULL,'2018-02-20 05:32:15','2018-02-20 05:32:15'),(3,'active',2,'縺・≧縺・≧縺・r\n縺・≧縺・≧縺・,NULL,'2018-08-05 05:32:30','2018-08-05 05:32:30'),(4,'active',1,'螟ｪ驛・縺ｧ縺・,NULL,'2018-08-21 06:32:57','2018-08-21 06:32:57'),(5,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″2',NULL,'2019-03-22 05:33:12','2019-03-22 05:33:12'),(6,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″3',NULL,'2019-04-09 05:33:38','2019-04-09 05:33:38'),(7,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″4',NULL,'2019-11-10 05:33:54','2019-11-10 05:33:54'),(8,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″5',NULL,'2019-12-01 05:34:40','2019-12-01 05:34:40'),(9,'active',2,'縺医∴縺医∴縺・r\n縺医∴縺医∴縺・,NULL,'2020-06-18 05:35:10','2020-06-18 05:35:10'),(10,'active',2,'縺翫♀縺翫♀縺浬r\n縺翫♀縺翫♀縺・,NULL,'2020-07-11 05:35:17','2020-07-11 05:35:17'),(11,'active',3,'XXX',NULL,'2020-08-10 05:35:29','2020-08-10 05:35:29'),(12,'active',3,'YYY',NULL,'2020-10-25 05:35:31','2020-10-25 05:35:31'),(13,'active',3,'ZZZ',NULL,'2021-01-03 05:35:34','2021-01-03 05:35:34'),(14,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″6',NULL,'2021-01-19 05:35:57','2021-01-19 05:35:57'),(15,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″7',NULL,'2021-02-28 05:36:00','2021-02-28 05:36:00'),(16,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″8',NULL,'2021-03-10 05:40:04','2021-03-10 05:40:04'),(17,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″9','sample-post.jpg','2021-04-05 05:36:07','2021-04-05 05:36:07'),(18,'active',1,'螟ｪ驛・縺ｮ縺､縺ｶ繧・″10',NULL,'2021-04-18 12:36:12','2021-04-18 12:36:12'),(19,'active',4,'譌･譛ｬ隱槭〒繝・せ繝医ヤ繧､繝ｼ繝・r\nTest tweet on English',NULL,'2021-11-22 14:14:04','2021-11-22 14:14:04'),(20,'active',4,'隧ｦ縺励↓闃ｱ轣ｫ繧呈遠縺｡荳翫￡縺ｾ縺励◆・育判蜒乗兜遞ｿ繝・せ繝茨ｼ・,'4_20211122141432.JPG','2021-11-22 14:14:32','2021-11-22 14:14:32'),(21,'active',4,'',NULL,'2021-11-22 14:58:41','2021-11-22 14:58:41');
/*!40000 ALTER TABLE `tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `nickname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `nickname` (`nickname`),
  KEY `name` (`name`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'active','螟ｪ驛・','user1','test1@example.com','$2y$10$vH3LhLuEfhLPxtpxsQ7z8.ZEkXZQqfLX9uFG9snf30EZedPB58LJW','sample-person.jpg','2021-02-19 05:28:51','2021-02-19 05:28:51'),(2,'active','螟ｪ驛・','user2','test2@example.com','$2y$10$zXEIm1IExBFyg/JU4PTxwOoKv3ylTCV7Dtx89LtStxaJE/5k9EbVK',NULL,'2021-02-19 05:30:36','2021-02-19 05:30:36'),(3,'active','螟ｪ驛・','user3','test3@example.com','$2y$10$TtuLPc4ybw/8TX1bFVp99ehvpfhyISVbdBC9kdZsX7U74qyRlquZm',NULL,'2021-02-19 05:31:13','2021-02-19 05:31:13'),(4,'active','谺｡驛・,'test_jiro','test4@example.com','$2y$10$TMDx/qN/RGog6Y9NL9TNUeZt2Y8ORV4g4f1Y2KnvnabOdaQdOmYla','4_20211122141335.png','2021-11-22 14:12:00','2021-11-22 14:13:35');
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

-- Dump completed on 2021-11-24 15:52:59
