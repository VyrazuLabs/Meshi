-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: share_meshi
-- ------------------------------------------------------
-- Server version	5.5.58-0ubuntu0.14.04.1

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booked_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'5a9ea2e751484','','test cat2','eeee',0,'45623893256d','2018-03-06 08:47:11','2018-03-06 08:51:45'),(2,'5a9ea3d1a1ef1','','Cakes','eeeee',1,'45623893256d','2018-03-06 08:51:05','2018-03-07 08:17:42'),(3,'5a9f8498b5cf9','','Pastry','kjkjkjk',1,'45623893256d','2018-03-07 00:50:08','2018-03-07 08:18:10'),(4,'5a9fedb4f287d','0','Chips','fewfew',0,'45623893256d','2018-03-07 08:18:36','2018-04-11 08:23:07'),(5,'5aa0d81d6c135','5a9fedb4f287d','sub chips','wefwef',1,'45623893256d','2018-03-08 00:58:45','2018-03-08 01:07:55'),(6,'5aa0d838873cf','5a9f8498b5cf9','sub pastry','wefwef',1,'45623893256d','2018-03-08 00:59:12','2018-03-08 01:06:24'),(7,'5aa0da5d5bc46','5a9ea3d1a1ef1','sub cakes','sdcsdcsdcdsc',0,'45623893256d','2018-03-08 01:08:21','2018-04-11 08:21:46'),(8,'5aa0db97df53a','0','Lunch','cssdvsdv',0,'45623893256d','2018-03-08 01:13:35','2018-04-11 08:20:37');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `feedback_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'5ac746494bb5a','sfsdfsdf','sponankita@gmail.com1','rgge','erergerg','2018-04-06 04:34:57','2018-04-06 04:34:57'),(2,'5ac74743a0875','ssdfdf','sdf@g.pffffffff','ssdfsdf','sdfsdf','2018-04-06 04:39:07','2018-04-06 04:39:07'),(3,'5ac74a5416d3c','Ffsdf','demo.admin@vyrazu.coms','sdfdsfsdf','sdfsdfsdf','2018-04-06 04:52:12','2018-04-06 04:52:12'),(4,'5ac753c945563','rthtrh','hg@p.fhhhff','drgdgd','gdfgdg','2018-04-06 05:32:33','2018-04-06 05:32:33'),(5,'5ac753f8581ee','rgergerg','supratik@vyrazu.comsss','grger','gergerg','2018-04-06 05:33:20','2018-04-06 05:33:20'),(6,'5ac75a998dd76','sssssssss','sssdf@ttg.pdd','ssssssss','sssssssssssss','2018-04-06 06:01:37','2018-04-06 06:01:37'),(7,'5ac76e0cdfa74','werwer','ssdf@ttg.pdd','testsssss','sfsdfsdfsdfsdf','2018-04-06 07:24:36','2018-04-06 07:24:36'),(8,'5ac76e2360379','werwer','ssdf@ttg.pdd','testsssss','sfsdfsdfsdfsdf','2018-04-06 07:24:59','2018-04-06 07:24:59'),(9,'5ac76e6c0a224','werwer','ssdf@ttg.pdd','testsssss','sfsdfsdfsdfsdf','2018-04-06 07:26:12','2018-04-06 07:26:12'),(10,'5ac76e8bdb97d','werwer','ssdf@ttg.pdd','testsssss','sfsdfsdfsdfsdf','2018-04-06 07:26:43','2018-04-06 07:26:43'),(11,'5ac76ea2d34d8','werwer','ssdf@ttg.pdd','testsssss','sfsdfsdfsdfsdf','2018-04-06 07:27:06','2018-04-06 07:27:06'),(12,'5ac76fa3af091','sdgsdg','supratik@vyrazu.comss','sgsdg','gdfgdfgd','2018-04-06 07:31:23','2018-04-06 07:31:23'),(13,'5ac76fc55782e','sdgsdg','supratik@vyrazu.comss','sgsdg','gdfgdfgd','2018-04-06 07:31:57','2018-04-06 07:31:57'),(14,'5ac76ff4efa06','dfgdfg','dg@h.p','xgxgxg','xgxxcb','2018-04-06 07:32:44','2018-04-06 07:32:44'),(15,'5ac772d5851a2','trgtr','rrt@g.p','test feedback','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2018-04-06 07:45:01','2018-04-06 07:45:01'),(16,'5ac773a662833','rerg','hg@p.fhhh','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2018-04-06 07:48:30','2018-04-06 07:48:30');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_item`
--

DROP TABLE IF EXISTS `food_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_images` longtext COLLATE utf8mb4_unicode_ci,
  `date_of_availability` date NOT NULL,
  `time_of_availability` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `offered_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item`
--

LOCK TABLES `food_item` WRITE;
/*!40000 ALTER TABLE `food_item` DISABLE KEYS */;
INSERT INTO `food_item` VALUES (3,'5a9f7cc41b0bf','mango pastry','5a9f8498b5cf9','a:5:{i:0;s:22:\"food_5ac75f776cbc9.jpg\";i:1;s:22:\"food_5ac75f77708ea.jpg\";i:2;s:22:\"food_5a9fef519c9f4.jpg\";i:3;s:22:\"food_5a9fef51a5040.jpg\";i:4;s:22:\"food_5a9fef51a5181.jpg\";}','2018-04-10','a:5:{s:5:\"17:00\";s:5:\"18:00\";s:5:\"20:00\";s:5:\"22:00\";s:4:\"2:00\";s:4:\"3:00\";s:4:\"7:00\";s:5:\"10:00\";s:4:\"9:26\";s:5:\"12:15\";}','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','Ingredients: Flour,baking powder,salt and sugar,eggs etc.\r\nContains: 5 Pcs of Pancakes','5a9f853163e89','30','50',1,'2018-03-25 00:16:44','2018-04-06 06:22:23'),(4,'5a9fa183e81c9','Strawberry Cakes','5a9ea3d1a1ef1',NULL,'2018-04-11','a:2:{s:5:\"10:00\";s:4:\"9:00\";s:5:\"12:00\";s:5:\"12:00\";}','sdfsdsdf','Ingredients: Flour,baking powder,salt and sugar,eggs etc.\r\nContains: 5 Pcs of Pancakes','5a9e8246dbce3','30','500',1,'2018-03-25 02:53:31','2018-04-10 01:07:28'),(5,'5a9fe2218292c','Potato Chips','5a9fedb4f287d','a:3:{i:0;s:23:\"food_5a9fefca5e26c.jpeg\";i:1;s:22:\"food_5a9fefca5e40e.jpg\";i:2;s:22:\"food_5a9fefca5e4d3.png\";}','2018-04-12','a:5:{s:5:\"17:00\";s:5:\"17:00\";s:5:\"22:45\";s:5:\"23:45\";s:4:\"2:00\";s:4:\"3:00\";s:5:\"22:46\";s:5:\"23:45\";s:5:\"10:11\";s:5:\"12:15\";}','erergerg','','5a9f853163e89','23','123123',1,'2018-03-24 07:29:13','2018-03-07 08:27:30');
/*!40000 ALTER TABLE `food_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_item_costing`
--

DROP TABLE IF EXISTS `food_item_costing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_item_costing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item_costing`
--

LOCK TABLES `food_item_costing` WRITE;
/*!40000 ALTER TABLE `food_item_costing` DISABLE KEYS */;
INSERT INTO `food_item_costing` VALUES (1,'5a9f7cc41b0bf','5a9f9b1957625','tax2','553','10','2018-03-07 02:26:09','2018-03-07 02:46:50'),(2,'5a9f7cc41b0bf','5a9f9c563bef3','tax1','234','345','2018-03-07 02:31:26','2018-03-07 02:46:09');
/*!40000 ALTER TABLE `food_item_costing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forget_password_token`
--

DROP TABLE IF EXISTS `forget_password_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forget_password_token` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forget_password_token`
--

LOCK TABLES `forget_password_token` WRITE;
/*!40000 ALTER TABLE `forget_password_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `forget_password_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_06_064919_create_profile_information',1),(4,'2018_03_06_135401_create_category',2),(5,'2018_03_06_142652_create_food_item',3),(6,'2018_03_07_074310_create_food_item_costing',4),(7,'2018_03_07_082505_create_review',5),(8,'2018_03_08_133212_create_order',6),(10,'2018_03_09_092314_create_cart',6),(11,'2018_03_08_133258_create_payment',7),(12,'2018_03_26_130204_create_forget_password_token_table',8),(13,'2018_03_28_130417_create_add_cover_image_to_profile_information',8),(14,'2018_04_03_072142_add_city_to_profile_table',9),(15,'2018_04_06_080934_create_feedback_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordered_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (25,'5a9f7cc41b0bf','5acb08dd453fe','OD6725ACB08DD4535B',NULL,'5a9e7c60f3408',NULL,NULL,NULL,'2018-04-09','2:00-3:00','53',1,'2018-04-09 01:01:57','2018-04-09 01:01:57'),(26,'5a9f7cc41b0bf','5acb0ba420f88','OD1115ACB0BA420EE7',NULL,'5a9e7c60f3408',NULL,NULL,NULL,'2018-04-09','20:00-22:00','53',1,'2018-04-09 01:13:48','2018-04-09 01:13:48');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (16,'5aafd37415842','867','2018-03-19','2018-03-19 09:42:52','2018-03-19 09:42:52'),(17,'5ac1e96837eda','867','2018-04-02','2018-04-02 02:57:20','2018-04-02 02:57:20'),(18,'5ac78541785a6','525','2018-04-06','2018-04-06 09:03:37','2018-04-06 09:03:37'),(19,'5ac785c497e6e','525','2018-04-06','2018-04-06 09:05:48','2018-04-06 09:05:48'),(20,'5acb086e6b1de','53','2018-04-09','2018-04-09 01:00:06','2018-04-09 01:00:06'),(21,'5acb08dd453fe','53','2018-04-09','2018-04-09 01:01:57','2018-04-09 01:01:57'),(22,'5acb0ba420f88','53','2018-04-09','2018-04-09 01:13:48','2018-04-09 01:13:48');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_information`
--

DROP TABLE IF EXISTS `profile_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_introduction` longtext COLLATE utf8mb4_unicode_ci,
  `profile_message` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_dishes` int(11) DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefectures` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_for_registration` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_information`
--

LOCK TABLES `profile_information` WRITE;
/*!40000 ALTER TABLE `profile_information` DISABLE KEYS */;
INSERT INTO `profile_information` VALUES (2,'5a9e7c60f3408','8017285173','kolkataergerg','','','','test descriptionrtrtgtrgrtg','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1522243292.png','','',30,'45623893256d',NULL,'7000092','testrthrth','test3rthrth','female','1','like_to_eat,other','2018-03-06 06:02:49','2018-04-04 00:36:18'),(3,'5a9e81cd03e49','9007712720','kolkata','','',NULL,'test','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520337356.png','',NULL,70,'45623893256d',NULL,'799120','test','test','female','4','earn_rewards_free_time,other','2018-03-06 06:25:57','2018-03-06 06:25:57'),(4,'5a9e8246dbce3','9007712720','kolkata','22.572646','88.36389500000001',NULL,'test','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520431121.png','','<iframe width=\"100%\" height=\"480\" src=\"https://www.youtube.com/embed/bkIYY3jy4Bo\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>',70,'45623893256d',6,'799120','test','test muni','female','4','help_someone,earn_rewards_free_time','2018-03-06 06:27:59','2018-04-02 08:34:35'),(5,'5a9f853163e89','90077127201','Ajmer Road, Parswanath Colony, Shanti Nagar, Brijlalpura, Jaipur, Rajasthan, India','26.8925194','75.7445714','Jaipur','ハロー Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520431158.jpeg','user_cover_picture1522745146.jpg','<iframe width=\"100%\" height=\"480\" src=\"https://www.youtube.com/embed/bkIYY3jy4Bo\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>',80,'45623893256d',1,'1234567','ferferf','erferf','female','3','help_someone,earn_rewards_free_time,earn_rewards_bytes_parts,hobby,cooking_class,SNS_followers,other','2018-03-07 00:52:41','2018-04-04 07:52:52'),(6,'5ab63d1c4c816','0123456789','garia','22.4629461','88.3967536',NULL,'test des','werfwefewfwef','wefwefwefwef','user_picture1521892635.png','',NULL,70,NULL,0,'1234569','ergergerg','ergerg','female','3','help_someone,earn_rewards_free_time','2018-03-24 06:27:16','2018-03-24 06:27:16'),(7,'5aba4a50833a2','5345345345345','cffbbcvbcv','','',NULL,'cvbcvb',NULL,NULL,'user_picture1522158159.jpg','',NULL,30,NULL,0,'23432','xxdfgdfg','dfgdfg','male','1','busy_with_working,live_alone','2018-03-27 08:12:40','2018-03-27 08:12:40'),(8,'5abb63dea5ede','0001200123','Geonkhali, West Bengal, India','22.2021731','88.04792309999999','Geonkhali','This video is to teach how to create simple Table View Controller iOS 10 using Xcode 8. In this tutorial, using Array number of items (names of Apple devices) will be displayed.',NULL,NULL,'user_picture1522668972.png','','<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3ucV0FpOmcE\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>',70,NULL,5,'700091','west bengal','Kolkata','male','3','help_someone','2018-03-28 04:13:58','2018-04-03 02:21:53'),(9,'5abb682cdcfaa','2365890236','asdadsad','','',NULL,'This video is to teach how to create simple Table View Controller iOS 10 using Xcode 8. In this tutorial, using Array number of items (names of Apple devices) will be displayed.',NULL,NULL,'user_picture1522231340.png','',NULL,50,NULL,0,'9658963','sdvdvdsv','dsvsdvsdv','female','1','busy_with_working,live_alone,few_restaurants','2018-03-28 04:32:21','2018-03-28 04:32:21'),(10,'5abd097a103ce','24234','Kolkata Station, Belgachia, Calcutta, West Bengal','','',NULL,'fgbfgb',NULL,NULL,'user_picture1522338169.jpeg',NULL,'erferre',30,NULL,1,'fgbfgb','feb','fgb','male','3','help_someone','2018-03-29 10:12:50','2018-04-02 08:49:36'),(11,'5ac1d4334b0bd','0000005602','Kolkata Station, Belgachia, Calcutta, West Bengal','22.6058132','88.3860997',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL,'user_picture1522652205.png',NULL,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/aKaNqPpZ6-I\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>',40,NULL,0,'1010101','werwer','werwer','female','3','earn_rewards_bytes_parts,hobby','2018-04-02 01:26:52','2018-04-02 01:26:52'),(12,'5ac1e16a933e7','0000007850','kolkata Airport Quarters, Dakhin Mart Kaikhalii, Calcutta, West Bengal, India','22.6375676','88.43190729999999',NULL,'rgrre',NULL,NULL,'user_picture1522655592.png',NULL,NULL,20,NULL,0,'1234563','ewfewf','ewwef','male','3','help_someone','2018-04-02 02:23:14','2018-04-02 02:23:14'),(13,'5ac1e2acdd983','0004560123','Kolkata Station, Belgachia, Calcutta, West Bengal','22.6058132','88.3860997',NULL,'lklklk',NULL,NULL,'user_picture1522655914.jpg',NULL,'',50,NULL,0,'1010102','lklkl','popopo','male','3','busy_with_working,live_alone,few_restaurants','2018-04-02 02:28:37','2018-04-02 02:36:15'),(14,'5ac20123929f5','1111112345','kodhh','','',NULL,'dfhfh','dfh','dfh','user_picture1522663714.jpg',NULL,NULL,20,'45623893256d',0,'4444444','fhfg','fgh','male','1','SNS_followers,other','2018-04-02 04:38:35','2018-04-02 04:39:15'),(15,'5ac20d2412539','3333332245','kolkata Airport Quarters, Dakhin Mart Kaikhalii, Calcutta, West Bengal, India','22.6375676','88.43190729999999',NULL,'dgdgdfg',NULL,NULL,'user_picture1522666786.png',NULL,'',50,NULL,0,'4444444','dgdg','dgdfg','female','3','live_alone','2018-04-02 05:29:48','2018-04-02 05:30:27'),(16,'5ac3335ccf0b1','3333222234','Ajmer, Rajasthan, India','26.4498954','74.6399163','Ajmer','ggsdgs',NULL,NULL,'user_picture1522742108.png',NULL,'',40,NULL,0,'3333333','fghf','fgh','other','3','help_someone','2018-04-03 02:25:09','2018-04-03 02:27:41'),(17,'5ac33486df614','5555554567','Ajmer, Rajasthan, India','26.4498954','74.6399163','Ajmer','ssddf',NULL,NULL,'user_picture1522742405.jpg',NULL,'',30,NULL,0,'5555555','fhfgh','fghfgh','other','2','busy_with_working','2018-04-03 02:30:07','2018-04-03 02:32:07'),(18,'5ac335a817552','3333333369','Pushkar, Rajasthan, India','26.489749','74.5510856','Pushkar','sdfsdf',NULL,NULL,'user_picture1522742695.png',NULL,NULL,60,NULL,0,'6666666','sdfsdf','sdfsdf','female','2','help_someone,earn_rewards_free_tim','2018-04-03 02:34:56','2018-04-03 02:34:56'),(19,'5ac336bb89178','5693663366','ajmer, Pushkar Road, Choti Basti, Pushkar, Rajasthan, India','26.4906232','74.6025696',NULL,'wefewfef','efwef','wefwe','user_picture1522742970.png',NULL,'ewfewfef',50,'45623893256d',0,'3333333','fghf','fgh','female','2','help_someone,earn_rewards_free_time','2018-04-03 02:39:31','2018-04-03 02:42:25'),(20,'5ac337c343b7d','6963696369','Pushkar, Rajasthan, India','26.489749','74.5510856',NULL,'dgdfg','dfgdfg','dfgdfg','user_picture1522743234.png',NULL,'dgdfgdfg',50,'45623893256d',0,'6666666','sdfsdf','sdfsdf','other','2','earn_rewards_free_time,earn_rewards_bytes_parts','2018-04-03 02:43:55','2018-04-03 02:43:55'),(21,'5ac3386e3f7e8','9007712724','Kolkweg, Barntrup, Germany','51.9808406','9.1188848','Barntrup','rt5rtryty',NULL,NULL,'user_picture1522744419.png',NULL,'',80,NULL,0,'700091','wb','kolkata','female','2','help_someone','2018-04-03 02:46:46','2018-04-03 03:03:39'),(22,'5ac46a02c8786','333344455','Kolkata Station, Belgachia, Calcutta, West Bengal','22.6058132','88.3860997','Kolkata','dsfsdf',NULL,NULL,'user_picture1522821631.png',NULL,NULL,50,NULL,0,'5555555','hdhfh','fhfhh','female','2','help_someone','2018-04-04 00:30:35','2018-04-04 00:30:35'),(23,'5ac46b0bb14ae','5555444434','Kolkata Station, Belgachia, Calcutta, West Bengal','22.6058132','88.3860997','Kolkata','ghghghnhgn',NULL,NULL,'user_picture1522821891.png',NULL,NULL,30,NULL,0,'4444444','hghgnghnhgn','ghnhgnghn','female','2','help_someone','2018-04-04 00:34:59','2018-04-04 00:34:59'),(24,'5ac46e0b1bf72','4444444444','Kolkata Railway Station, Belgachia, Calcutta, West Bengal, India','22.6015439','88.3829775',NULL,'rtgrtgrt','grtgrtgtrgrtg','trgrtgrtgrtgrtg','user_picture1522822665.png',NULL,'rtgrtgrtg',60,'45623893256d',0,'1111111','bfgbgfb','fgbfgbfgbfgb','female','2','help_someone','2018-04-04 00:47:47','2018-04-04 00:47:47'),(25,'5ac4831d4fb9e','5555555555','Ghaziabad, Uttar Pradesh, India','28.6691565','77.45375779999999','Ghaziabad','fhfghfgh',NULL,NULL,'user_picture1522828060.png',NULL,'ghj',20,NULL,0,'6666666','ghmghm','ghmhm','female','2','busy_with_working,help_someone','2018-04-04 02:17:41','2018-04-04 02:17:41'),(26,'5ac48411906c5','8888888877','Kolkata, West Bengal, India','22.572646','88.36389500000001','Kolkata',',jh,hj,',NULL,NULL,'user_picture1522828304.png',NULL,'jljkljkl',30,NULL,0,'6666666','hkjk','hjkhk','male','4','busy_with_working,live_alone','2018-04-04 02:21:45','2018-04-04 02:21:45'),(27,'5ac4a739d9ff3','3333333365','Yujing District, Tainan City, Taiwan','23.1060822','120.4703258',NULL,'ghnghngnghn','hjmhmhjm','hjmhjmhjm','user_picture1522837304.png',NULL,'hjhjmm',40,'45623893256d',0,'6666666','yujyuj','yujyuj','female','2','no_reason','2018-04-04 04:51:46','2018-04-04 04:51:46'),(28,'5ac4a94bb367b','3333222239','ajmer, Pushkar Road, Choti Basti, Pushkar, Rajasthan, India','26.4906232','74.6025696','','regerggrg',NULL,NULL,'user_picture1522837834.jpeg',NULL,NULL,50,NULL,0,'3333333','fghf','fgh','other','2','few_restaurants','2018-04-04 05:00:35','2018-04-04 05:00:35'),(29,'5ac4abfe22700','4444447899','Kolkata Hawrah Station, Mayapur, West Bengal, India','23.4257223','88.38924949999999','Mayapur','trhrthrth',NULL,NULL,'user_picture1522838525.jpg',NULL,NULL,40,NULL,0,'2222222','thtrh','rthrt','female','2','','2018-04-04 05:12:06','2018-04-04 05:12:06'),(30,'5ace166e3a9cd','6667778890','Kluang, ジョホール マレーシア','2.030068','103.3184639',NULL,'fgbfgbfgb','dfvdfvd','dfvdfv','user_picture1523455596.png',NULL,NULL,30,'45623893256d',0,'3333333','dfgdfg','dfgdfg','female','2','help_someone','2018-04-11 08:36:38','2018-04-11 08:36:38'),(31,'5ace1891ec63e','3333333333','Kolkata Hawrah Station, Mayapur, West Bengal, India','23.4257223','88.38924949999999','Mayapur','dbdfbdf',NULL,NULL,'user_picture1523456144.jpeg',NULL,NULL,20,NULL,0,'4444444','tyjtjytjt','yjtyjtyj','female','3','help_someone','2018-04-11 08:45:46','2018-04-11 08:45:46');
/*!40000 ALTER TABLE `profile_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewed_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (3,'5aa2368687055','5a9e8246dbce3',NULL,NULL,'45623893256d','Awsome\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',NULL,'2018-03-09 01:53:50','2018-03-09 01:53:50'),(4,'5aa23694e0734','5a9e8246dbce3',NULL,NULL,'45623893256d','Very Nice\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',NULL,'2018-03-09 01:54:04','2018-03-09 01:54:04'),(5,'5aa2378d16b76','5a9e8246dbce3',NULL,NULL,'45623893256d','Awsome\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',NULL,'2018-03-09 01:58:13','2018-03-09 01:58:13'),(6,'5aa297bfe2cfe','5a9f853163e89',NULL,NULL,'5a9e7c60f3408','test',NULL,'2018-03-09 08:48:39','2018-03-09 08:48:39'),(7,'5aa299d42e26a','5a9f853163e89',NULL,NULL,'5a9e7c60f3408','ghjghjhgj',NULL,'2018-03-09 08:57:32','2018-03-09 08:57:32'),(8,'5aa299f97d062','5a9f853163e89',NULL,NULL,'5a9e7c60f3408','ghjghjhgj',NULL,'2018-03-09 08:58:09','2018-03-09 08:58:09'),(9,'5aa29a1864619','5a9f853163e89',NULL,NULL,'5a9e7c60f3408','ghjghjhgj',NULL,'2018-03-09 08:58:40','2018-03-09 08:58:40'),(10,'5aa29a4ccfcd2','5a9e8246dbce3',NULL,NULL,'5a9e7c60f3408','yttyutyu',NULL,'2018-03-09 08:59:32','2018-03-09 08:59:32');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','45623893256d','admin@gmail.com','$2y$10$HZyPKHkprbC4.3nrwsrT8upWRT5rbI4UnAvCPK32DCkA8Ne.WSSwy',0,'admin',1,'si1m6TnUiheBI7Qgd2VeLBlo5GEu9LGelQhgJ3tTiEwjAX1Lv06Vbk1kN9Aq','2018-03-05 18:30:00','2018-03-05 18:30:00'),(4,'ankita','5a9e7c60f3408','ankita@vyrazu.com','$2y$10$w1Q4AM/BzTR79NYCcsJ/E.1WJ./V30/JMILTDZJwuBDYc.DLWGoB6',2,'anky',1,'bGfxW9E47tqpJEdCqzDbLzRtOlxmjxXX2Tgg27Tc7aBRZGQJ2SfZzJFJ6SfO','2018-03-06 06:02:49','2018-03-29 04:16:21'),(6,'paramita','5a9e8246dbce3','paramita@vyrazu.com','$2y$10$m1orED5GL31mko2CvcZCAOmI8AEzks/Hgy1oGKDjIk2mnqSSIo9ki',1,'paro',1,'0E0rty1Eed784gY6njNk4UQx2UpaYxUUaN1Rx7ZToqHRHzl2OFdZFPtvu3jK','2018-03-06 06:27:58','2018-04-02 03:59:52'),(7,'sonai','5a9f853163e89','sonai@vyrazu.com','$2y$10$ZmLpHOTZvtq./lZanAZ1hOYlE81WRcIrqfYeZmmmGZwBGef8wId5W',1,'sonu',1,'Qc9PhiOGET7iI8EfULwBHbWjyeEIrvNrSO4FN1F3jAMAJy3fQSN7AUsGYaNO','2018-03-07 00:52:41','2018-04-03 03:05:16'),(9,'serif','5ab63d1c4c816','serif@vyrazu.com','$2y$10$w1Q4AM/BzTR79NYCcsJ/E.1WJ./V30/JMILTDZJwuBDYc.DLWGoB6',1,'srf',1,'sniMgYE75ztK2ib46w0eUFFC0cpkg8YgHoAcMv430kXWFRjKnqVMCwLI8D9I','2018-03-24 06:27:16','2018-03-27 04:32:35'),(10,'Fsf','5aba4a50833a2','asad@g.p','$2y$10$RB7d4v93szog2I3I5MtVv.kfG4as/4z/oqZ44tdv9bCvxIjU25kG2',2,'sdfsdf',1,NULL,'2018-03-27 08:12:40','2018-03-27 08:12:40'),(11,'mesh creator12','5abb63dea5ede','meshcreator@gmail.com','$2y$10$ZmLpHOTZvtq./lZanAZ1hOYlE81WRcIrqfYeZmmmGZwBGef8wId5W',1,'meshi creator',1,'RDlhhMeMbbTbTpPFki7agcj2NvvA8trqsZ1nARXz5SYoxqyqua7nyZbKtY9d','2018-03-28 04:13:58','2018-04-03 00:28:06'),(12,'messiator','5abb682cdcfaa','messiator@gmail.com','$2y$10$PF7SWS4ypHlZvnfrZQcEvOrI9d7FggoZAcADsm8JXwA/mQen46k8K',2,'messi',1,'MComVE0IqoYQowMmbIn6kVcfg5apO1NXotXHmQOlUAZmfCMOegiwk5OcwmSj','2018-03-28 04:32:21','2018-03-29 07:17:55'),(13,'erfef','5abd097a103ce','exe@gmail.com','$2y$10$ffjLoVuqi6tehxxK/QKg2O5vnGdlbCxJtWDRRfMiuzXbT3se1Whze',1,'erferf',1,NULL,'2018-03-29 10:12:50','2018-03-29 10:12:50'),(14,'food creator','5ac1d4334b0bd','foodcreator@gmail.com','$2y$10$.mXE8b97./c6P6lW.h43..4kUVBU9R8eWu4uCpbf9y9UshChuC63C',1,'creator',1,NULL,'2018-04-02 01:26:51','2018-04-02 01:26:51'),(15,'food creator','5ac1e16a933e7','foodcreator2@gmail.com','$2y$10$JC9Tb1hjUL0ihv89k8A92uaqqoTJyft00O/9dciu/rc.rqRumbOlS',1,'creator',1,'gQJgwrZlrjDah2GCVRaehGb4YbDbYfViaZGAOGBpBn2Vpc75o0yc4TQajZTr','2018-04-02 02:23:14','2018-04-02 02:23:14'),(16,'food eater','5ac1e2acdd983','foodeater@gmail.com','$2y$10$rvy5J0RgEpj//zlE2pddpOllBRWuo48wO.Wk08urSWlqBCMdXEEPi',2,'eater',1,'tIZ94KTFni2CjuCR7jxlQscZpFNvAmG608tKH6DpQWqBXljd8h9wfDGukkW2','2018-04-02 02:28:37','2018-04-02 02:28:37'),(17,'fsfs','5ac20123929f5','gh@g.pdfg','$2y$10$C5NzGHRF2pQ56R3Ap5nOkOWx5pAahg4lnlsHvMD0mFeP.E9MeA2sW',1,'sdfsdf',1,NULL,'2018-04-02 04:38:35','2018-04-02 04:38:35'),(18,'ttt','5ac20d2412539','exe@gmail.com1','$2y$10$HPc5ZVpDWV78He27eFXc7.B6l3RyobveJ6LQl9nOoG9o1UG6Kmsoq',2,'ergerg',1,'fCrOEvaIG0Nwe63HT6LS7igkdV4IMg2BQpsxNrqdttf3QKKVkZ7KCRzo1oxA','2018-04-02 05:29:48','2018-04-02 05:30:27'),(19,'ewfwe','5ac3335ccf0b1','wed@g.p','$2y$10$OqCtCeG/.rhySfJlJlFA7O0HwV8ocsiB4u5OfJscrHCBBNxjszcrW',1,'wefwef',1,'IJkZOedhDVPH3ohIJHrIUgmVeLOLez1uxu9vt39Lq1vmnPDWhpSb1VkMCT0K','2018-04-03 02:25:09','2018-04-03 02:25:09'),(20,'asdadasd','5ac33486df614','hg@p.fss','$2y$10$shbAuXeXCWmAch3ZtyavY.pD4PtaHdI.Sh.iPNdDfUoGQLBYBn1Yu',2,'gfghfgh',1,'wAAkaAvm12keLqaxDKKbBBQLM9bwX2ScwhEMeDAIiff8ld1LnMkEChNLHQg0','2018-04-03 02:30:07','2018-04-03 02:30:07'),(21,'dgdfg','5ac335a817552','hs@w.pq','$2y$10$Yr7AamYyPEZmYiyo9riui.KWXEWKaaWbQdIqIJac9YShJ2gzwcfJq',1,'dfgdg',1,'Ygjtb2LcKP01Kov32VTZRvqFS4GmcPpmJr6A2HV1pxnpr2uSd5l8z47Dyfbj','2018-04-03 02:34:56','2018-04-03 02:34:56'),(22,'ssfsf','5ac336bb89178','fsd@r.pss1','$2y$10$HklyaHaOORtMtgMu3tD2.uu66QUW.x9sj2TlGjOQ2URm0XLxonLeK',1,'sdsdf',1,NULL,'2018-04-03 02:39:31','2018-04-03 02:39:31'),(23,'fghgh','5ac337c343b7d','hj@f.pfghdfd','$2y$10$B4SQmYWUfdqrwFTBag84Du2SbQ18PT4KLgczCVpY7mZeIJ3BD.yJS',1,'fghfgh',1,NULL,'2018-04-03 02:43:55','2018-04-03 02:43:55'),(24,'grreg','5ac3386e3f7e8','testdev@gmail.com1','$2y$10$Mf/SwlM4Lx2btm7/F8IQ/en1pOvg2e.Iuf6/Au.TSDtQcUDRMnhkG',1,'ergerg',1,'ef5s12RXA5k0nKUXH1pKEobozu9pdQhyL5UE47i8WZk4KsgRKPr0K14GBlDq','2018-04-03 02:46:46','2018-04-03 02:46:46'),(25,'dfgdfg','5ac4691e5f7f5','jk@r.dj','$2y$10$LkWAXuYKQ8EYw0sXlxKsqu2wU1ivxqflxivz9laySEUHci2i1mrGC',1,'dfgdfg',1,NULL,'2018-04-04 00:26:46','2018-04-04 00:26:46'),(26,'dfgdfg','5ac46a02c8786','jk@r.dj1','$2y$10$55SuMQcKM21Z20g4YYRZGu1zFaWdmH6ITmOGiaYC73VJfufB4NqKy',1,'dfgdfg',1,'ItqkdSy9YNd69F6StXJONpUe4WF4ou7z76qPgHcAIMYYC2ipSUGUGaMvW7US','2018-04-04 00:30:34','2018-04-04 00:30:34'),(27,'rty','5ac46b0bb14ae','h@w.phhh','$2y$10$VfIC8jXRQf0Vms03TCI48OGkFrJt9U0ZWX1dKdvVoP36MDkTeEzr.',1,'rtyrty',1,'0a0JUHHyuNlT0clidQFal5zK9jisUApBe05fx5iDSvI8F7iJamEjNCVxsgNq','2018-04-04 00:34:59','2018-04-04 00:34:59'),(28,'wfwef','5ac46e0b1bf72','citizen@gmail.comc','$2y$10$ZNOVnnrU0lzoE07XI1yWauNqZ0M.BiQ4VuOhuq2XkUZMGfokeS4nW',1,'wefwef',1,NULL,'2018-04-04 00:47:47','2018-04-04 00:47:47'),(29,'egergrg','5ac4831d4fb9e','gh@g.pggggggd','$2y$10$IVAXH0ofnFaNISKdrKqNuef3YLbsMuYPYF8F1Q9qK8I1BtVzITmHq',1,'ergergerg',1,'yzrcyO8Tukq1vdf952vmmKYlDhaFW0kCPp2hJp1J3gGS6ZnrpCsoyqcG0g9n','2018-04-04 02:17:41','2018-04-04 02:17:41'),(30,'ghjghjghjghj','5ac48411906c5','kaustuv@vyrazu.com11','$2y$10$/ziOwSdawL0p/MClLLFeG.fUtobX15rypzlsjAftPNIsvnub2.WDa',2,'ghjghjj',1,NULL,'2018-04-04 02:21:45','2018-04-04 02:21:45'),(31,'tyjtyj','5ac4a739d9ff3','jhj@h.piihh','$2y$10$yKSx7FJnyVsIhzRdV2UUcO7Yta6COUqFBnYLuN5ssyUVRverGm6Pq',2,'tjtyj',1,NULL,'2018-04-04 04:51:46','2018-04-04 04:51:46'),(32,'Efunf','5ac4a94bb367b','wed@g.pwwwww','$2y$10$SmX48ibp8FY4Rny3AyLKBeXGKCq0.sH7MizE4B68Y1DzR81h9xvqy',2,'wefwefwef',1,'0LDd9xJn4VhwweABSYHjK7Mbq1Hk825ZmhfcImpVmHTKJB5x7OjRLQcC36Cp','2018-04-04 05:00:35','2018-04-04 05:00:35'),(33,'dvdsdv','5ac4abfe22700','hg@p.fhhh','$2y$10$QGS4OnO4yzvBKyPKR6R0EOxJg4MNS054nawIvkTua5BOKnx8BvfEu',2,'sdsvdv',1,'au1LPDZ07dgbM2sPUbnyhlbAKTjsZCjBnQPbNwSAZ3Qxhbn31C3Lm57wu063','2018-04-04 05:12:06','2018-04-04 05:12:06'),(34,'wefwef','5ace166e3a9cd','aaaa@g.p','$2y$10$sWOv41pqA6Uv4Jw2jsohKOOp9Z2sr9r/s15QIB/12o4Fpm3WBTYMu',1,'wefwefweaa',1,NULL,'2018-04-11 08:36:38','2018-04-11 08:36:38'),(35,'assdf','5ace1891ec63e','aaaaaaa@h.pp','$2y$10$eMsvUyDJf4mci/V0pemhRuuSuELjzZfS2WRPOpiCTferygbLeF7YG',1,'afasfasf',1,NULL,'2018-04-11 08:45:46','2018-04-11 08:45:46');
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

-- Dump completed on 2018-04-11 19:49:20
