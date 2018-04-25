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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'5acefe2d0d074','0','cakes','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',1,'5a5ee5058a2a5','2018-04-12 01:05:25','2018-04-12 01:05:25'),(2,'5acefe37df7b1','0','chips','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,'5a5ee5058a2a5','2018-04-12 01:05:35','2018-04-12 01:05:35'),(3,'5acefe499bede','5acefe2d0d074','fruit cakes','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,'5a5ee5058a2a5','2018-04-12 01:05:53','2018-04-12 01:05:53');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
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
  `start_publication_date` date DEFAULT NULL,
  `start_publication_time` time DEFAULT NULL,
  `end_publication_date` date DEFAULT NULL,
  `end_publication_time` time DEFAULT NULL,
  `deliverable_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_of_availability` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_info` longtext COLLATE utf8mb4_unicode_ci,
  `offered_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item`
--

LOCK TABLES `food_item` WRITE;
/*!40000 ALTER TABLE `food_item` DISABLE KEYS */;
INSERT INTO `food_item` VALUES (1,'5aceff58c8c56','strawberry cake','5acefe2d0d074','a:1:{i:0;s:22:\"food_5ad0c1f8ebe31.jpg\";}','2018-04-25','2018-04-23',NULL,'2018-04-26',NULL,NULL,'a:2:{s:5:\"12:15\";s:5:\"12:30\";s:5:\"20:30\";s:5:\"20:30\";}','dsdfsdf','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.','5acefd572f85e',NULL,'200',1,'2018-04-12 01:10:24','2018-04-14 04:43:46',NULL),(2,'5aceff88d86f7','mango cake','5acefe2d0d074','a:1:{i:0;s:22:\"food_5aceff88eb3b6.jpg\";}','2018-04-26','2018-04-23',NULL,'2018-04-25',NULL,NULL,'a:2:{s:5:\"12:15\";s:5:\"12:15\";s:5:\"14:15\";s:5:\"16:15\";}','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','5acefd572f85e',NULL,'50',1,'2018-04-12 01:11:12','2018-04-12 01:11:12',NULL),(3,'5acf0000339cb','potato chips','5acefe37df7b1','a:0:{}','2018-04-24','2018-04-23',NULL,'2018-04-27',NULL,'kolikataaa','a:1:{s:5:\"12:15\";s:5:\"12:30\";}','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,','by injected humour,','5acefd572f85e',NULL,'30',1,'2018-04-12 01:13:12','2018-04-14 07:16:21',NULL),(4,'5acf00dd688b9','banana chips','5acefe37df7b1','a:2:{i:0;s:22:\"food_5acf00dd7b5ba.jpg\";i:1;s:22:\"food_5acf00dd7b835.jpg\";}','2018-04-25',NULL,NULL,NULL,NULL,NULL,'a:2:{s:5:\"11:00\";s:5:\"11:30\";s:5:\"12:00\";s:5:\"12:30\";}','Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words','Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words','5acf0095e0903',NULL,'150',1,'2018-04-12 01:16:53','2018-04-14 04:30:30',NULL),(5,'5acf14860f946','Strawberry Cakes','5acefe37df7b1','a:1:{i:0;s:22:\"food_5acf1486527ad.jpg\";}','2018-04-26',NULL,NULL,NULL,NULL,NULL,'a:1:{s:5:\"13:45\";s:5:\"13:45\";}','yuyuky','yukyuk','5acefd572f85e',NULL,'66',1,'2018-04-12 02:40:46','2018-04-13 08:54:44','2018-04-13 08:54:44'),(19,'5ad47604d7b6a','Sssss','5acefe37df7b1','a:1:{i:0;s:22:\"food_5ad47604e9934.jpg\";}','2018-04-27',NULL,NULL,NULL,NULL,'koli','a:1:{s:5:\"16:00\";s:5:\"17:00\";}','sssssssssss',NULL,'5acefd572f85e',NULL,'500',1,'2018-04-16 04:38:04','2018-04-16 04:43:44',NULL),(20,'5ad5a62a9b938','ergergergerg','5acefe37df7b1','a:1:{i:0;s:22:\"food_5ad5a62adc7a7.png\";}','2018-04-19','2018-04-17','02:00:23','2018-04-19','03:11:25','koli','a:1:{s:5:\"13:30\";s:5:\"14:00\";}','erergergrg',NULL,'5acefd572f85e',NULL,'11',1,'2018-04-17 02:15:46','2018-04-24 00:18:45','2018-04-24 00:18:45'),(21,'5ad5be008d95f','ee','5acefe2d0d074',NULL,'2018-04-18','2018-04-18','02:56:47','2018-04-19','02:56:52',NULL,'a:1:{s:5:\"15:00\";s:5:\"16:00\";}','gerg','rtrtertg','5acefd572f85e',NULL,'333',1,'2018-04-17 03:57:28','2018-04-17 03:58:31',NULL),(22,'5ad5c219c686e','rrr','5acefe2d0d074',NULL,'2018-04-17','2018-04-18','03:14:46','2018-04-19','03:14:50',NULL,'a:1:{s:5:\"15:15\";s:5:\"15:30\";}','rr','rwrwer','5acefd572f85e',NULL,'44',1,'2018-04-17 04:14:57','2018-04-24 00:18:51','2018-04-24 00:18:51'),(23,'5ad5c8cad722b','ddddd','5acefe37df7b1','a:1:{i:0;s:22:\"food_5ad5c8cb03b04.jpg\";}','2018-04-17','2018-04-17','03:42:12','2018-04-19','03:42:42','koli','a:1:{s:5:\"15:45\";s:5:\"16:00\";}','dddd','ddd','5acefd572f85e',NULL,'55',0,'2018-04-17 04:43:30','2018-04-17 04:47:29',NULL),(24,'5ad5c9666b2aa','qqqq','5acefe2d0d074','a:1:{i:0;s:23:\"food_5ad5c9667aff3.jpeg\";}','2018-04-18','2018-04-16','03:45:58','2018-04-18','03:46:03','koli','a:1:{s:5:\"16:00\";s:5:\"16:30\";}','qqqq',NULL,'5acefd572f85e',NULL,'11',1,'2018-04-17 04:46:06','2018-04-17 04:46:06',NULL),(25,'5adec4b264357','Strawberry Cakes1','5acefe2d0d074','a:1:{i:0;s:22:\"food_5adec4b287ec4.png\";}','2018-04-30','2018-04-25','11:16:20','2018-04-26','11:16:23','koli','a:2:{s:5:\"11:30\";s:5:\"12:00\";s:5:\"12:30\";s:5:\"13:00\";}','tt',NULL,'5acefd572f85e',NULL,'22',1,'2018-04-24 00:16:26','2018-04-24 00:17:33',NULL),(26,'5adeca5d76113','aaaadd','5acefe2d0d074','a:1:{i:0;s:22:\"food_5adeca5d8dcef.png\";}','2018-05-01','2018-04-23','11:40:28','2018-04-28','11:40:30','kol123','a:1:{s:5:\"12:00\";s:5:\"12:30\";}','adasd',NULL,'5adec9ea03290',NULL,'33',1,'2018-04-24 00:40:37','2018-04-24 00:40:37',NULL);
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item_costing`
--

LOCK TABLES `food_item_costing` WRITE;
/*!40000 ALTER TABLE `food_item_costing` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_06_064919_create_profile_information',1),(4,'2018_03_06_135401_create_category',1),(5,'2018_03_06_142652_create_food_item',1),(6,'2018_03_07_074310_create_food_item_costing',1),(7,'2018_03_07_082505_create_review',1),(8,'2018_03_08_133212_create_order',1),(9,'2018_03_08_133258_create_payment',1),(10,'2018_03_09_092314_create_cart',1),(11,'2018_03_26_130204_create_forget_password_token_table',1),(12,'2018_03_28_130417_create_add_cover_image_to_profile_information',1),(13,'2018_04_03_072142_add_city_to_profile_table',1),(14,'2018_04_06_080934_create_feedback_table',1),(15,'2018_04_12_092714_add_nullable_shortinfo_to_food_item',2),(16,'2018_04_12_125738_add_deliverable_area_to_profile_information',3),(17,'2018_04_13_131345_add_deleted_at_to_users',4),(18,'2018_04_13_131447_add_deleted_at_to_profile_information',5),(19,'2018_04_13_131545_add_deleted_at_to_food_item',6),(20,'2018_04_13_131652_add_deleted_at_to_review',7),(21,'2018_04_13_131726_add_deleted_at_to_order',8),(22,'2018_04_13_132026_add_deleted_at_to_payment',9),(23,'2018_04_13_141025_add_deleted_at_to_food_item_costing',10),(24,'2018_04_14_122655_create_add_deliverable_area_to_fooditems',11),(29,'2018_04_16_093311_create_publication_date_to_food_item',12),(30,'2018_04_17_113857_modify_field_of_order',13),(31,'2018_04_17_114947_modify_datatype_of_payment',14),(32,'2018_04_20_141931_create_reviews_table',15);
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
  `date_of_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_delivery` date DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (7,'5aceff58c8c56','5ad99c10599d7','OD5465AD99C1059619',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-21','20:30','210',1,'2018-04-20 02:21:44','2018-04-20 02:21:44',NULL),(8,'5aceff88d86f7','5ad9b2ef06bf7','OD6615AD9B2EF06B1C',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-21','15:15','53',1,'2018-04-20 03:59:19','2018-04-20 03:59:19',NULL),(9,'5aceff88d86f7','5ad9dc6ea3674','OD4395AD9DC6EA3589',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-21','12:15','53',1,'2018-04-20 06:56:22','2018-04-20 06:56:22',NULL),(10,'5aceff88d86f7','5ad9ff8a17616','OD7735AD9FF8A1753E',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-21','14:45','53',1,'2018-04-20 09:26:10','2018-04-20 09:26:10',NULL),(11,'5aceff88d86f7','5ad9fff150d52','OD6485AD9FFF150C5F',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-21','15:15','53',1,'2018-04-20 09:27:53','2018-04-20 09:27:53',NULL),(12,'5aceff58c8c56','5adec5eb5f3ee','OD1085ADEC5EB5B698',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-25','20:30','210',1,'2018-04-24 00:21:39','2018-04-24 00:21:39',NULL),(13,'5aceff58c8c56','5adec94b86d4d','OD4445ADEC94B86C76',NULL,'5acefdd775fde',NULL,NULL,NULL,NULL,'2018-04-25','20:30','210',1,'2018-04-24 00:36:03','2018-04-24 00:36:03',NULL);
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
  `payment_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'5ad1a8f235445','32','2018-04-14 00:00:00','2018-04-14 01:38:34','2018-04-14 01:38:34',NULL),(2,'5ad1d3beda339','32','2018-04-14 00:00:00','2018-04-14 04:41:10','2018-04-14 04:41:10',NULL),(3,'5ad5e1a2b2c50','12','2018-04-17 11:59:30','2018-04-17 06:29:30','2018-04-17 06:29:30',NULL),(4,'5ad5e23a39b3c','12','2018-04-17 12:02:02','2018-04-17 06:32:02','2018-04-17 06:32:02',NULL),(5,'5ad98eecebbfe','210','2018-04-20 06:55:41','2018-04-20 01:25:41','2018-04-20 01:25:41',NULL),(6,'5ad99a51ded18','210','2018-04-20 07:44:17','2018-04-20 02:14:17','2018-04-20 02:14:17',NULL),(7,'5ad99c10599d7','210','2018-04-20 07:51:44','2018-04-20 02:21:44','2018-04-20 02:21:44',NULL),(8,'5ad9b2ef06bf7','53','2018-04-20 09:29:19','2018-04-20 03:59:19','2018-04-20 03:59:19',NULL),(9,'5ad9dc6ea3674','53','2018-04-20 12:26:22','2018-04-20 06:56:22','2018-04-20 06:56:22',NULL),(10,'5ad9ff8a17616','53','2018-04-20 14:56:10','2018-04-20 09:26:10','2018-04-20 09:26:10',NULL),(11,'5ad9fff150d52','53','2018-04-20 14:57:53','2018-04-20 09:27:53','2018-04-20 09:27:53',NULL),(12,'5adec5eb5f3ee','210','2018-04-24 05:51:39','2018-04-24 00:21:39','2018-04-24 00:21:39',NULL),(13,'5adec94b86d4d','210','2018-04-24 06:06:03','2018-04-24 00:36:03','2018-04-24 00:36:03',NULL);
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
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_introduction` longtext COLLATE utf8mb4_unicode_ci,
  `profile_message` longtext COLLATE utf8mb4_unicode_ci,
  `deliverable_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_information`
--

LOCK TABLES `profile_information` WRITE;
/*!40000 ALTER TABLE `profile_information` DISABLE KEYS */;
INSERT INTO `profile_information` VALUES (1,'5acefd572f85e','0123456325','kolkata Airport Quarters, Dakhin Mart Kaikhalii, Kolkata, West Bengal, India','22.6375676','88.43190729999999','Kolkata','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..................... :)','user_picture1523514709.png',NULL,'',30,'5a5ee5058a2a5',24,'0000000','kolkata','kolkata','male','1','help_someone','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','koli','2018-04-12 01:01:51','2018-04-24 00:16:26',NULL),(2,'5acefdd775fde','1234563254','New Town, West Bengal, India','22.5765243','88.4796344','Kolkata','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','user_picture1523514837.png',NULL,'',40,'5a5ee5058a2a5',0,'0000000','new town','new town','male','2','busy_with_working,live_alone','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','','2018-04-12 01:03:59','2018-04-24 00:37:03',NULL),(3,'5acefeef085f2','5555666325','Kolkata Station, Belgachia, Kolkata, West Bengal','22.6058132','88.3860997',NULL,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.','user_picture1523515117.png',NULL,NULL,50,'5a5ee5058a2a5',0,'1111111','kolkata','kolkata','male','4','earn_rewards_free_time','kolkata','kolkata',NULL,'2018-04-12 01:08:39','2018-04-12 01:08:39',NULL),(4,'5acf0095e0903','4545454545','Rajarhat, West Bengal, India','22.5765243','88.4796344','Kolkata','The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.','user_picture1523515540.png',NULL,NULL,70,NULL,1,'0000000','rajarhat','rajarhat','female','3','cooking_class',NULL,NULL,NULL,'2018-04-12 01:15:42','2018-04-12 01:16:53',NULL),(5,'5acf014530bf7','8989898956','Salt Lake City, West Bengal, India','22.5867296','88.41709879999999','Bidhannagar','All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.','user_picture1523515714.png',NULL,'',60,NULL,0,'1111111','saltlake','saltlake','female','2','few_restaurants',NULL,NULL,NULL,'2018-04-12 01:18:37','2018-04-12 01:19:28',NULL),(6,'5acf5c54119a6','5555557890','Kolkata, West Bengal, India','22.572646','88.36389500000001','Kolkata','gfbfgb','user_picture1523539015.jpg',NULL,NULL,40,NULL,0,'2222222','fgbfgb','fgbfgb','female','2','help_someone',NULL,NULL,NULL,'2018-04-12 07:47:08','2018-04-13 07:56:05','2018-04-13 07:56:05'),(7,'5acf5e641ccd8','5555556325','Kolkata, West Bengal, India','22.572646','88.36389500000001','Kolkata','hjmhjmhjm','user_picture1523539555.jpg',NULL,NULL,50,NULL,0,'3333333','jkjkjkbjdbk','kjgkjdgkj','female','2','busy_with_working',NULL,NULL,NULL,'2018-04-12 07:55:56','2018-04-13 07:56:49','2018-04-13 07:56:49'),(8,'5acf5f80db9e0','3333332256','Kolkata Station, Belgachia, Kolkata, West Bengal','22.6058132','88.3860997','Kolkata','sdvsdv','user_picture1523539839.jpg',NULL,'',30,NULL,0,'1111111','fhfgh','fghfgh','female','2','help_someone',NULL,NULL,'sdfdfsf','2018-04-12 08:00:41','2018-04-13 07:56:36','2018-04-13 07:56:36'),(9,'5acf610f248f5','3333332258','Kolkata Station, Belgachia, Kolkata, West Bengal','22.6058132','88.3860997','Kolkata','hfhfhf','user_picture1523540238.jpg',NULL,NULL,40,NULL,0,'1111111','fhfgh','fghfgh','female','2','busy_with_working',NULL,NULL,NULL,'2018-04-12 08:07:19','2018-04-13 07:56:39','2018-04-13 07:56:39'),(10,'5acf634252502','5555555567','Belgachia, Khudiram Bose Sarani, Block C, MIG Housing, Belgachia, Kolkata, Kolkata, West Bengal','22.6065931','88.385825',NULL,'fghfgh','user_picture1523540801.jpg',NULL,NULL,40,'5a5ee5058a2a5',0,'4444444','fghfgh','fghgh','female','3','help_someone','jghjghj','ghjghj',NULL,'2018-04-12 08:16:42','2018-04-13 07:56:42','2018-04-13 07:56:42'),(11,'5acf6add3d964','6666666678','Belgachia, Khudiram Bose Sarani, Block C, MIG Housing, Belgachia, Kolkata, Kolkata, West Bengal','22.6065931','88.385825','Kolkata','fghfgh','user_picture1523542747.jpg',NULL,NULL,40,NULL,0,'4444444','fghfgh','fghgh','female','2','help_someone',NULL,NULL,'fghfghfgh','2018-04-12 08:49:09','2018-04-13 07:56:45','2018-04-13 07:56:45'),(12,'5ad052cea01f4','8888888878','Kolkata Station, Belgachia, Kolkata, West Bengal','22.6058132','88.3860997',NULL,'hfghfgh','user_picture1523602118.jpg',NULL,NULL,30,'5a5ee5058a2a5',0,'1111111','yturty','rtyrty','female','2','busy_with_working','rty','rty',NULL,'2018-04-13 01:18:46','2018-04-13 07:56:47','2018-04-13 07:56:47'),(13,'5ad0574693660','6666666611','Kolkata, 西ベンガル インド','22.572646','88.36389500000001',NULL,'fgh','user_picture1523603269.jpg',NULL,NULL,40,'5a5ee5058a2a5',0,'5555555','fghfgh','fghfgh','female','2','busy_with_working','dsgsdg','sgsdg',NULL,'2018-04-13 01:37:50','2018-04-13 07:56:32','2018-04-13 07:56:32'),(14,'5ad2082637d49','3333336677','Kolkata, West Bengal, India','','',NULL,'sfsdfsdf','user_picture1523714080.png','user_cover_picture1523715243.jpg',NULL,50,'5a5ee5058a2a5',0,'3333333','hrthrth','Rthrth','female','2','help_someone,earn_rewards_free_time','fsfsdfds','sdfsdfsf','sss','2018-04-14 08:24:46','2018-04-14 08:44:03',NULL),(15,'5ad20d1d06a9c','3333332289','Kolkata Station, Belgachia, Kolkata, West Bengal','22.6058132','88.3860997',NULL,'dfbdfb','user_picture1523715355.png',NULL,NULL,60,'5a5ee5058a2a5',0,'3333333','fgfgb','fgfgbb','male','3','busy_with_working,live_alone',NULL,NULL,NULL,'2018-04-14 08:45:57','2018-04-14 08:45:57',NULL),(16,'5ad210db84e79','6666666690','Belgachia, Khudiram Bose Sarani, Block C, MIG Housing, Tala, Kolkata, Kolkata, West Bengal','22.6067326','88.38602139999999',NULL,'weewfwef','user_picture1523716383.jpg','user_cover_picture1523716397.jpg',NULL,60,'5a5ee5058a2a5',0,'4444444','dbdfbdfbdfb','dfbdfbdbdfb','female','2','help_someone,earn_rewards_free_time','ergergreg','ergergergregregreg','ergergergerregreg','2018-04-14 09:01:55','2018-04-14 09:03:17',NULL),(17,'5ad21167d3cb0','5555555581','Belgachia, Khudiram Bose Sarani, Block C, MIG Housing, Tala, Kolkata, Kolkata, West Bengal','','',NULL,'dfbdfbfdb','user_picture1523716455.jpg',NULL,NULL,60,'5a5ee5058a2a5',0,'1111111','grgregr','ergergreg','female','2','busy_with_working,live_alone',NULL,NULL,NULL,'2018-04-14 09:04:15','2018-04-14 09:04:15',NULL),(18,'5ad211ffa19fa','4444444482','Kolkata-Malancha Road, Bantala, Kolkata, 西ベンガル インド','22.5080425','88.5130452','Kolkata','dfvdfv','user_picture1523716605.jpg',NULL,'',40,NULL,0,'1111111','fbggbfgb','fgbfgbgbf','other','2','help_someone',NULL,NULL,'dsvdsv','2018-04-14 09:06:47','2018-04-14 09:07:21',NULL),(19,'5adec9ea03290','3333667756','Rajasthan, India','27.0238036','74.21793260000001','','erter','user_picture1524550120.jpg',NULL,'ththt',20,NULL,1,'3333333','rwerwre','wrwer','male','1','help_someone',NULL,NULL,'kollll2','2018-04-24 00:38:42','2018-04-24 00:40:37',NULL),(20,'5adecac61a824','3333225678','Hyderabad, Telangana, India','17.385044','78.486671','Hyderabad','wfwefwef','user_picture1524550340.jpg',NULL,NULL,40,NULL,0,'2222222','gfbgfb','fgbfgb','female','3','busy_with_working,live_alone',NULL,NULL,'','2018-04-24 00:42:22','2018-04-24 00:42:22',NULL);
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
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewed_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewed_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_item_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_ratings` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_ratings` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `communication_ratings` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `communication_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (10,'5adf43d98f64b','5acefdd775fde','5aceff58c8c56','5ad99c10599d7','3','fgbfgb','5','fbfgbfbgbb','2','dfdfvdfv','2018-04-24 09:18:57','2018-04-24 09:18:57');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','5a5ee5058a2a5','admin@gmail.com','$2y$10$HZyPKHkprbC4.3nrwsrT8upWRT5rbI4UnAvCPK32DCkA8Ne.WSSwy',0,'admin',1,'JLOp7MYPCSE3Hk83JzaHFV9duoLpsoVaac916YmrQwZAAUDrJxyCucQ1ZhEH','2018-04-11 18:30:00','2018-04-11 18:30:00',NULL),(2,'food creator1','5acefd572f85e','foodcreator1@gmail.com','$2y$10$p5cNB3Cas33C3ge0omw7VO9uFRChg2ff3q/FvSXP37SJcEIhT0v6y',1,'creator12',1,'KKTFhSbsnmtqiNe2mhgyu5zkKZMvvFIBMBHYIbOIwcLuNC1O05ZLMhEHC1Xd','2018-04-12 01:01:51','2018-04-24 00:14:50',NULL),(3,'food eater1','5acefdd775fde','foodeater1@gmail.com','$2y$10$VntSxnm2q75.mJYi2lQbIuUKGt4dqmG6zOKcIU6yZHqlI.DsAATp6',2,'foodeater1',1,'irO2tFyo2kHlzB9CVTJeke573d8isOC4qqPblKzPjmV7QrracDFLGNEGPLIH','2018-04-12 01:03:59','2018-04-24 00:37:03',NULL),(4,'food creator2','5acefeef085f2','foodcreator2@gmail.com','$2y$10$HdSHX/YWQgUaP2x.945imu1gNgDNeCNOxsNc/dIIL.dWtgeGR3CuO',1,'foodcreator2',0,'w3gTQyGoMYPnjP2NTldhvUrOxcIHA2UePXE8MLLMIEVvdIUwy1m38NT9tHoN','2018-04-12 01:08:39','2018-04-12 01:08:39',NULL),(5,'food creator3','5acf0095e0903','foodcreator3@gmail.com','$2y$10$V.Gi28aA0dYL5enPdp2I0.vyeIoSRMQMfxhjzKDhK/rNADS8QkOpW',1,'food creator3',1,'ozdUfQb0O1XJlBpChRTzqohQEVnteffzO2juLmeFBtH4uJBnsSBiBBZPAsKj','2018-04-12 01:15:42','2018-04-12 01:15:42',NULL),(6,'food eater2','5acf014530bf7','foodeater2@gmail.com','$2y$10$k0QAObu.iQ1koQg.a/.E9.zWRI1Y9p0dkbSlFCTRrYCOaCO5LRnCi',2,'food eater2',1,'7RYKScRVz3OauNh2jADmG73o8aMq6m2iavI78cxIeoB46hEWtQYEF4rR6v5Y','2018-04-12 01:18:37','2018-04-12 01:18:37',NULL),(7,'ergerg','5acf5c54119a6','gg@hh.p','$2y$10$yfjj5.rmK5B8YZUW01EUzuu3a1rYseAB4VQgvK7uNBD.f5wVM8rwC',1,'ererg',1,'pW5hDEyBEITn5nYyyVSqtMdYMkywdA4Ic0InRYmLSW1E3tbwvqcRN0K8ydYj','2018-04-12 07:47:08','2018-04-13 07:56:05','2018-04-13 07:56:05'),(8,'hkhk','5acf5e641ccd8','hg@p.fhhhhhh','$2y$10$Xg1KjPAhGIjVsXR.WflSCuWePNbongNLqxL.VkxZ6otpvZD.tZk/S',2,'hjkhjk',1,'ncdw524xr8vzmL9SvFYbxYqRXzNOI5A7u7kEYJKe5B0CNlSiUNui915F3nMr','2018-04-12 07:55:56','2018-04-13 07:56:49','2018-04-13 07:56:49'),(9,'dfgdg','5acf5f80db9e0','hhgnhgnn@h.p','$2y$10$GXQPPZxpqG/tnmTKJxl2ROWQyH3ADY6O91f30W70kZV4nMEq2eAxa',1,'dfgdfg',1,'nD4V6Dy1pswkTEFFn3sJ8JSQYE3ZywWzfLXC5Jycz9Pgi7nBKcySRW1NlTL0','2018-04-12 08:00:40','2018-04-13 07:56:36','2018-04-13 07:56:36'),(10,'fghfgh','5acf610f248f5','hhgnhgnn@h.pww','$2y$10$oIM119fHhjB7rOA3ItAeROBXOjGVWZ3V/K5bWRIRazg5lhH4wFEnC',2,'fghfgh',1,'gq3086blg97uVO2FhdcSCOVXjci6ZfINfe8naBvU98LxSlMvzsVY3ceqG9K2','2018-04-12 08:07:19','2018-04-13 07:56:39','2018-04-13 07:56:39'),(11,'ghfg','5acf634252502','ff@hhhp.m','$2y$10$XUfbX2l9/JL5uagw.bJpW.A4d.Md27.LE5Sfl7GuwNNWOhbxNQGOy',1,'dfgdfg',1,NULL,'2018-04-12 08:16:42','2018-04-13 07:56:42','2018-04-13 07:56:42'),(12,'fghfgh','5acf6add3d964','ff@hhhp.mwww','$2y$10$G.6VAQmBADvSUQxnRaj5lO3Q7MugddqEXAVx4rQLyuOG92z9NTFIu',1,'fohfgh',1,'Eh9Iw0GjJl1FzxcUdNtpYsU3aAqc0JVdTV4ILF5NCMbjxdlLecao0393nWox','2018-04-12 08:49:09','2018-04-13 07:56:45','2018-04-13 07:56:45'),(13,'rtyrty','5ad052cea01f4','hhgnhgnn@h.pff','$2y$10$mNvIYxKlzdnGh7bQfizB8O4v98NL6doAH91U8oHbXl7yPJEnMsCVa',2,'rtyrty',1,NULL,'2018-04-13 01:18:46','2018-04-13 07:56:47','2018-04-13 07:56:47'),(14,'dfgdfg','5ad0574693660','dfgdg@g.p','$2y$10$7BDYTUVRUzjJK74pq8BaWeLyjL.0NUiQ2QdycmViAG.VZhbrMll8u',2,'dfg',1,NULL,'2018-04-13 01:37:50','2018-04-13 07:56:32','2018-04-13 07:56:32'),(15,'Efwefew','5ad2082637d49','ww1@gmail.com11','$2y$10$5il5.seUgowtQ5yQe3u4Eu2ttXc3RW2PX5SH/3Npht4W8e6smB69m',1,'wewew',1,NULL,'2018-04-14 08:24:46','2018-04-14 08:24:46',NULL),(16,'ewrwer','5ad20d1d06a9c','ww1@gmail.com2222','$2y$10$wSf.v4BnQinlcFX24vBi4uylkYangCktzEd0wYedBErS3O4RKNxbO',2,'wefwer',1,NULL,'2018-04-14 08:45:57','2018-04-14 08:45:57',NULL),(17,'sdsddv','5ad210db84e79','sssdf@ttg.pdddddd','$2y$10$h7Q1J1ao1k2fJhuKf3GIgu3OGvNrIVUjiVN70/10vDW2oaeJtfHia',1,'svddsv',1,NULL,'2018-04-14 09:01:55','2018-04-14 09:01:55',NULL),(18,'dfbfdbfd','5ad21167d3cb0','bbbb@j.p','$2y$10$FRhgFiCrs4ttIIAFyHnYB.FQBX8btVhNPpis3vYwN3RKeO5z0KDx2',2,'dfbdfbfdb',1,NULL,'2018-04-14 09:04:15','2018-04-14 09:04:15',NULL),(19,'aaaaa','5ad211ffa19fa','ssss@gg.p','$2y$10$oxAmctaXhfMu2Uj82.PhjuTn7IwGfxQ8dBSdnh6Zmb4MLphhP59I2',1,'sdfsdf',1,NULL,'2018-04-14 09:06:47','2018-04-14 09:07:21',NULL),(20,'aaaaa','5adec9ea03290','aa@gmail.com1','$2y$10$/hB2U2oL.FqKlCW55kvST.U80LlfeyS79rY0jTkwFq9allBsfg9qu',1,'aa',1,'85SqegoY9cpaXhsooNcxpPxvopTkwZtSV49bMZNI4V87pQXkyt0ggR5jFMpi','2018-04-24 00:38:42','2018-04-24 00:38:42',NULL),(21,'thrth','5adecac61a824','rrt@g.pq','$2y$10$tpeuZJkpaQdDGqzivs7vpunUWLrgg2mzcKzYJWxLlrf6XsbWulgHi',2,'rthrth',1,'1XVjWCOCiNjFwyfY3DHF1i9p9dLlnkV0OVJ0EVM6O4oOA8W7QJtL6eJKrrsR','2018-04-24 00:42:22','2018-04-24 00:42:22',NULL);
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

-- Dump completed on 2018-04-24 20:21:47
