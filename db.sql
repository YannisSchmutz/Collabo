-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
-- Command: mysqldump --databases homestead -u homestead -p
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version       5.7.22

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
-- Current Database: `homestead`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `homestead` /*!40100 DEFAULT CHARACTER SET utf8mb4
 */;

USE `homestead`;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` VALUES (1,'Python',NULL,NULL),(2,'C#',NULL,NULL),(3,'VB',NULL,NULL)
,(4,'PHP',NULL,NULL),(5,'Java',NULL,NULL),(6,'JavaScript',NULL,NULL),(7,'F#',NULL,NULL),(8,
'C',NULL,NULL),(9,'C++',NULL,NULL),(10,'Assembly',NULL,NULL),(11,'Boxing',NULL,NULL),(12,'P
olitics',NULL,NULL),(13,'Cosplay',NULL,NULL),(14,'Machine Learning',NULL,NULL);
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `liked_by_user` tinyint(1) NOT NULL DEFAULT '0',
  `liked_by_project` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,3,0,1,NULL,NULL),(1,4,1,0,NULL,NULL),(1,5,1,1,NULL,NULL),(2,1
,1,0,NULL,NULL),(2,2,1,0,NULL,NULL),(2,5,0,1,NULL,NULL),(3,1,1,0,'2019-11-25 20:12:50','201
9-11-25 20:12:50'),(3,3,1,0,NULL,NULL),(3,4,0,1,NULL,NULL);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (183,'2019_11_25_183257_add_google2fa_secret_to_users',1),(
210,'2014_10_12_000000_create_users_table',2),(211,'2014_10_12_100000_create_password_reset
s_table',2),(212,'2019_08_19_000000_create_failed_jobs_table',2),(213,'2019_10_20_101701_cr
eate_projects_table',2),(214,'2019_10_20_101916_add_collabo_attributes_to_users_table',2),
(215,'2019_10_20_104414_create_interests_table',2),(216,'2019_10_20_105331_create_users_inte
rests_table',2),(217,'2019_10_20_115726_create_projects_interests_table',2),(218,'2019_10_2
0_122151_create_users_projects_table',2),(219,'2019_10_20_153126_create_likes_table',2),
(220,'2019_10_27_171144_remove_users_surname',2),(221,'2019_10_27_173854_add_pictures_path',2)
,(222,'2019_10_28_143804_add_caption_to_users_and_projects_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pitch` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,NULL,NULL,'SuperDuper AI project','Invest now','Some descr
iption','/pictures/ai.jpg','Change the AI world of tomorrow'),(2,NULL,NULL,'Boxing workshop
s','Invest now','Some description','/pictures/boxing.jpg','Hit fast, hit hard!'),
(3,NULL,NULL,'SuperDuper Security project','Invest now','Some description','/pictures/security.jpg','
Secure the the IT world together'),(4,NULL,NULL,'Political workshops','Invest now','Some de
scription','/pictures/general_placeholder.png','Faust hoch!'),(5,NULL,NULL,'SuperDuper VR p
roject','Invest now','Some description','/pictures/vr.jpg','Change the reality of tomorrow'
),(6,NULL,NULL,'Cosplay workshops','Invest now','Some description','/pictures/general_place
holder.png','Fantasy FTW');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_interests`
--

DROP TABLE IF EXISTS `projects_interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_interests` (
  `interest_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`,`interest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_interests`
--

LOCK TABLES `projects_interests` WRITE;
/*!40000 ALTER TABLE `projects_interests` DISABLE KEYS */;
INSERT INTO `projects_interests` VALUES (1,1,NULL,NULL),(14,1,NULL,NULL),(11,2,NULL,NULL);
/*!40000 ALTER TABLE `projects_interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pitch` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yannis Schmutz','yannis@schmutz.com',NULL,'$2y$10$hWVaUhadk/
1zOUPC5ehjQO1JZ17oQIn8ClggRwUoPtVvLslki7OxG',NULL,NULL,NULL,'Yannis pitch','Yannis descript
ion','/pictures/yannis.jpg','ML | Python | Boxing'),(2,'<script>alert(\"test\")</script>','
gian@demarmels.com',NULL,'$2y$10$f6KGIAnwybSwvHNglXK39eX.a6CcLGrviuLikIUZun36H87AH99Ma',
NULL,NULL,'2019-12-21 22:27:08','<script>alert(\"test\")</script>','Gian description','/pictur
es/2simple-backdoor.php','sdf'),(3,'Kevin Riesen','kevin@riesen.com',NULL,'$2y$10$grTQsDZRG
mccXM.u/XpOZ.E2/VqhuFZnaCiSE8iXKEqMdwO4k2rRy',NULL,NULL,NULL,'Kevin pitch','Kevin descripti
on','/pictures/kevin.png','VR | Gaming');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_interests`
--

DROP TABLE IF EXISTS `users_interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_interests` (
  `interest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`interest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_interests`
--

LOCK TABLES `users_interests` WRITE;
/*!40000 ALTER TABLE `users_interests` DISABLE KEYS */;
INSERT INTO `users_interests` VALUES (1,1,1,NULL,NULL),(4,1,1,NULL,NULL),(5,1,1,NULL,NULL),
(11,1,1,NULL,NULL),(2,2,1,NULL,NULL),(4,2,1,NULL,NULL),(5,2,1,NULL,NULL),(12,2,1,NULL,NULL)
,(3,3,1,NULL,NULL),(4,3,1,NULL,NULL),(5,3,1,NULL,NULL),(13,3,1,NULL,NULL);
/*!40000 ALTER TABLE `users_interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_projects`
--

DROP TABLE IF EXISTS `users_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_projects` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `permission` enum('readonly','reporter','manager','owner') COLLATE utf8mb4_unicode_ci NOT
 NULL DEFAULT 'readonly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_projects`
--

LOCK TABLES `users_projects` WRITE;
/*!40000 ALTER TABLE `users_projects` DISABLE KEYS */;
INSERT INTO `users_projects` VALUES (1,1,'owner',NULL,NULL),(1,2,'owner',NULL,NULL),(1,5,'r
eadonly',NULL,NULL),(2,3,'owner',NULL,NULL),(2,4,'owner',NULL,NULL),(2,6,'readonly',NULL,NULL),
(3,2,'readonly',NULL,NULL),(3,5,'owner',NULL,NULL),(3,6,'owner',NULL,NULL);
/*!40000 ALTER TABLE `users_projects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-26 15:38:28