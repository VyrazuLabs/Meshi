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
INSERT INTO `category` VALUES (1,'5a9ea2e751484','','test cat2','eeee',0,'45623893256d','2018-03-06 08:47:11','2018-03-06 08:51:45'),(2,'5a9ea3d1a1ef1','','Cakes','eeeee',1,'45623893256d','2018-03-06 08:51:05','2018-03-07 08:17:42'),(3,'5a9f8498b5cf9','','Pastry','kjkjkjk',1,'45623893256d','2018-03-07 00:50:08','2018-03-07 08:18:10'),(4,'5a9fedb4f287d','','Chips','fewfew',1,'45623893256d','2018-03-07 08:18:36','2018-03-07 08:18:36'),(5,'5aa0d81d6c135','5a9fedb4f287d','sub chips','wefwef',1,'45623893256d','2018-03-08 00:58:45','2018-03-08 01:07:55'),(6,'5aa0d838873cf','5a9f8498b5cf9','sub pastry','wefwef',1,'45623893256d','2018-03-08 00:59:12','2018-03-08 01:06:24'),(7,'5aa0da5d5bc46','5a9ea3d1a1ef1','sub cakes','sdcsdcsdcdsc',1,'45623893256d','2018-03-08 01:08:21','2018-03-08 01:08:21'),(8,'5aa0db97df53a','0','Lunch','cssdvsdv',1,'45623893256d','2018-03-08 01:13:35','2018-03-08 01:13:35');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item`
--

LOCK TABLES `food_item` WRITE;
/*!40000 ALTER TABLE `food_item` DISABLE KEYS */;
INSERT INTO `food_item` VALUES (3,'5a9f7cc41b0bf','mango pastry','5a9f8498b5cf9','a:3:{i:0;s:22:\"food_5a9fef519c9f4.jpg\";i:1;s:22:\"food_5a9fef51a5040.jpg\";i:2;s:22:\"food_5a9fef51a5181.jpg\";}','2018-03-26','a:5:{s:5:\"17:00\";s:5:\"18:00\";s:5:\"20:00\";s:5:\"22:00\";s:4:\"2:00\";s:4:\"3:00\";s:4:\"7:00\";s:5:\"10:00\";s:4:\"9:26\";s:5:\"12:15\";}','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','Ingredients: Flour,baking powder,salt and sugar,eggs etc.\r\nContains: 5 Pcs of Pancakes','5a9f853163e89','30','50',1,'2018-03-25 00:16:44','2018-03-08 07:08:21'),(4,'5a9fa183e81c9','Strawberry Cakes','5a9ea3d1a1ef1','a:2:{i:0;s:22:\"food_5a9fef909cb6b.jpg\";i:1;s:22:\"food_5a9fef909cd11.jpg\";}','2018-03-25','a:5:{s:5:\"17:00\";s:5:\"17:00\";s:5:\"22:45\";s:5:\"23:45\";s:4:\"2:00\";s:4:\"3:00\";s:5:\"22:46\";s:5:\"23:45\";s:5:\"10:11\";s:5:\"12:15\";}','sdfsdsdf','Ingredients: Flour,baking powder,salt and sugar,eggs etc.\r\nContains: 5 Pcs of Pancakes','5a9e8246dbce3','30','500',1,'2018-03-25 02:53:31','2018-03-08 07:09:48'),(5,'5a9fe2218292c','Potato Chips','5a9fedb4f287d','a:3:{i:0;s:23:\"food_5a9fefca5e26c.jpeg\";i:1;s:22:\"food_5a9fefca5e40e.jpg\";i:2;s:22:\"food_5a9fefca5e4d3.png\";}','2018-03-24','a:5:{s:5:\"17:00\";s:5:\"17:00\";s:5:\"22:45\";s:5:\"23:45\";s:4:\"2:00\";s:4:\"3:00\";s:5:\"22:46\";s:5:\"23:45\";s:5:\"10:11\";s:5:\"12:15\";}','erergerg','','5a9f853163e89','23','123123',1,'2018-03-24 07:29:13','2018-03-07 08:27:30'),(6,'5aa11fa6ba2cb','gergerg','5a9ea3d1a1ef1','a:1:{i:0;s:22:\"food_5aa11fa7629b7.jpg\";}','2018-03-26','a:5:{s:5:\"17:00\";s:5:\"17:00\";s:5:\"22:45\";s:5:\"23:45\";s:4:\"2:00\";s:4:\"3:00\";s:5:\"22:46\";s:5:\"23:45\";s:5:\"10:11\";s:5:\"12:15\";}','rergre','','5a9e8246dbce3','44','444',1,'2018-03-26 06:03:58','2018-03-08 06:26:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_06_064919_create_profile_information',1),(4,'2018_03_06_135401_create_category',2),(5,'2018_03_06_142652_create_food_item',3),(6,'2018_03_07_074310_create_food_item_costing',4),(7,'2018_03_07_082505_create_review',5),(8,'2018_03_08_133212_create_order',6),(10,'2018_03_09_092314_create_cart',6),(11,'2018_03_08_133258_create_payment',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (20,'5a9f7cc41b0bf','5aafd37415842','OD7145AAFD374156D7',NULL,'5a9e7c60f3408',NULL,NULL,NULL,'2018-03-19','2:00-3:00','867',1,'2018-03-19 09:42:52','2018-03-19 09:42:52');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (16,'5aafd37415842','867','2018-03-19','2018-03-19 09:42:52','2018-03-19 09:42:52');
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
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_introduction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_dishes` int(11) DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefectures` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_for_registration` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_information`
--

LOCK TABLES `profile_information` WRITE;
/*!40000 ALTER TABLE `profile_information` DISABLE KEYS */;
INSERT INTO `profile_information` VALUES (2,'5a9e7c60f3408','8017285173','kolkata','22.572646','88.36389500000001','test description','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520343151.jpeg',NULL,80,'45623893256d',NULL,'7000091','test','test3','female','3','busy_with_working,live_alone,few_restaurants,no_time,like_to_eat,no_reason,other,busy_with_working,live_alone,few_restaurants,no_time,like_to_eat,no_reason,other,help_someone,earn_rewards_free_time,earn_rewards_bytes_parts,hobby,cooking_class,SNS_followers,other','test44','2018-03-06 06:02:49','2018-03-09 00:42:43'),(3,'5a9e81cd03e49','9007712720','kolkata','','','test','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520337356.png',NULL,70,'45623893256d',NULL,'799120','test','test','female','4','earn_rewards_free_time,other','test','2018-03-06 06:25:57','2018-03-06 06:25:57'),(4,'5a9e8246dbce3','9007712720','kolkata','22.572646','88.36389500000001','test','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520431121.png','<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/bkIYY3jy4Bo\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>',70,'45623893256d',1,'799120','test','test muni','female','4','help_someone,earn_rewards_free_time,earn_rewards_bytes_parts,hobby,cooking_class,SNS_followers,other,busy_with_working,live_alone,few_restaurants,no_time,like_to_eat,no_reason,other,help_someone,earn_rewards_free_time,earn_rewards_bytes_parts,hobby,cooking_class,SNS_followers,other','test job','2018-03-06 06:27:59','2018-03-09 00:43:16'),(5,'5a9f853163e89','90077127201','kolkata','22.572646','88.36389500000001','test','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','user_picture1520431158.jpeg',NULL,80,'45623893256d',1,'1234567','ferferf','erferf','female','3','help_someone,earn_rewards_free_time,earn_rewards_bytes_parts,hobby,cooking_class,SNS_followers,other,busy_with_working,live_alone,few_restaurants,no_time,like_to_eat,no_reason,other,help_someone,earn_rewards_free_time,earn_rewards_bytes_parts,hobby,cooking_class,SNS_followers,other','errefr','2018-03-07 00:52:41','2018-03-07 08:29:18');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','45623893256d','admin@gmail.com','$2y$10$HZyPKHkprbC4.3nrwsrT8upWRT5rbI4UnAvCPK32DCkA8Ne.WSSwy',0,'admin',1,'vo3j6zgw3lrr13pGUOVrfVKNsYzNWuhm7ns804R1XRppjCSuC4Fo4MZabi0o','2018-03-05 18:30:00','2018-03-05 18:30:00'),(4,'ankita','5a9e7c60f3408','ankita@vyrazu.com','$2y$10$HZyPKHkprbC4.3nrwsrT8upWRT5rbI4UnAvCPK32DCkA8Ne.WSSwy',2,'anky',1,'','2018-03-06 06:02:49','2018-03-23 04:31:52'),(6,'paramita','5a9e8246dbce3','paramita@vyrazu.com','$2y$10$m1orED5GL31mko2CvcZCAOmI8AEzks/Hgy1oGKDjIk2mnqSSIo9ki',1,'paro',1,'SfzFtXYad1IGKmtPF4wK8Ddi5uGZKqAksJJtBInsxpi4U8yQQRqk3LXQeAZe','2018-03-06 06:27:58','2018-03-09 08:35:33'),(7,'sonai','5a9f853163e89','sonai@vyrazu.com','$2y$10$9dU1cLpsQg5X..a.qhtP8.x.Oy8NR4JxnqDnPxUun4e1.HsTIM9pq',1,'sonu',1,NULL,'2018-03-07 00:52:41','2018-03-07 00:52:41');
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

-- Dump completed on 2018-03-23 18:28:27
