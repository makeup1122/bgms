-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: bgms
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `name` varchar(24) NOT NULL COMMENT '属性名',
  `value` varchar(64) NOT NULL COMMENT '属性值',
  `remark` text NOT NULL COMMENT '字段说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'limit','4000','每日人数限制');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `ip` varchar(16) DEFAULT NULL COMMENT '设备IP地址',
  `print_status` varchar(36) NOT NULL COMMENT '打印设备状态',
  `print_info` varchar(64) NOT NULL COMMENT '打印设备信息',
  `scan_status` varchar(36) NOT NULL COMMENT '扫描设备状态',
  `scan_info` varchar(64) NOT NULL COMMENT '扫描设备信息',
  `status` int(11) NOT NULL COMMENT '设备状态',
  `login_time` datetime DEFAULT NULL COMMENT '登录注册时间',
  `logout_time` datetime NOT NULL COMMENT '注销时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (6,'192.168.1.81','1001','通讯错或者未联接打印机','2','读卡设备初始化失败',2,'2016-02-03 11:45:20','2016-02-03 11:45:25'),(7,'192.168.1.103','1001','通讯错或者未联接打印机','2','读卡设备初始化失败',2,'2016-02-02 23:21:29','2016-02-02 23:22:19'),(8,'192.168.1.109','1001','通讯错或者未联接打印机','2','读卡设备初始化失败',1,'2016-02-03 17:36:42','0000-00-00 00:00:00'),(9,'192.168.1.104','1001','通讯错或者未联接打印机','0','初始化成功 ',2,'2016-02-04 00:43:26','2016-02-04 00:43:40');
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_archives`
--

DROP TABLE IF EXISTS `fuel_archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_archives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` int(10) unsigned NOT NULL,
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `version` smallint(5) unsigned NOT NULL,
  `version_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_archives`
--

LOCK TABLES `fuel_archives` WRITE;
/*!40000 ALTER TABLE `fuel_archives` DISABLE KEYS */;
INSERT INTO `fuel_archives` VALUES (1,1,'fuel_pages','{\"id\":1,\"location\":\"index.php\",\"layout\":\"main\",\"published\":\"yes\",\"cache\":\"yes\",\"date_added\":\"2016-01-31 22:51:12\",\"last_modified\":\"2016-01-31 22:51:12\",\"last_modified_by\":\"\",\"variables\":[{\"id\":\"1\",\"page_id\":\"1\",\"name\":\"page_title\",\"scope\":\"\",\"value\":\"\\u9996\\u9875\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"index.php\",\"page_published\":\"yes\"},{\"id\":\"2\",\"page_id\":\"1\",\"name\":\"meta_description\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"index.php\",\"page_published\":\"yes\"},{\"id\":\"3\",\"page_id\":\"1\",\"name\":\"meta_keywords\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"index.php\",\"page_published\":\"yes\"},{\"id\":\"4\",\"page_id\":\"1\",\"name\":\"heading\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"index.php\",\"page_published\":\"yes\"},{\"id\":\"5\",\"page_id\":\"1\",\"name\":\"body\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"index.php\",\"page_published\":\"yes\"},{\"id\":\"6\",\"page_id\":\"1\",\"name\":\"body_class\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"index.php\",\"page_published\":\"yes\"}]}',1,'2016-02-01 06:51:12',1),(2,1,'fuel_pages','{\"id\":\"1\",\"location\":\"test\\/index.php\",\"layout\":\"main\",\"published\":\"yes\",\"cache\":\"yes\",\"date_added\":\"2016-01-31 22:51:12\",\"last_modified\":\"2016-01-31 22:52:10\",\"last_modified_by\":\"1\",\"variables\":[{\"id\":\"7\",\"page_id\":\"1\",\"name\":\"page_title\",\"scope\":\"\",\"value\":\"\\u9996\\u9875\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"test\\/index.php\",\"page_published\":\"yes\"},{\"id\":\"8\",\"page_id\":\"1\",\"name\":\"meta_description\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"test\\/index.php\",\"page_published\":\"yes\"},{\"id\":\"9\",\"page_id\":\"1\",\"name\":\"meta_keywords\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"test\\/index.php\",\"page_published\":\"yes\"},{\"id\":\"10\",\"page_id\":\"1\",\"name\":\"heading\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"test\\/index.php\",\"page_published\":\"yes\"},{\"id\":\"11\",\"page_id\":\"1\",\"name\":\"body\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"test\\/index.php\",\"page_published\":\"yes\"},{\"id\":\"12\",\"page_id\":\"1\",\"name\":\"body_class\",\"scope\":\"\",\"value\":\"\",\"type\":\"string\",\"language\":\"english\",\"active\":\"yes\",\"layout\":\"main\",\"location\":\"test\\/index.php\",\"page_published\":\"yes\"}]}',2,'2016-02-01 06:52:10',1),(3,1,'fuel_navigation','{\"id\":\"1\",\"location\":\"\\/test\\/index.php\",\"group_id\":\"1\",\"nav_key\":\"\\/test\\/index.php\",\"label\":\"\\u9996\\u9875\",\"parent_id\":\"0\",\"precedence\":\"0\",\"attributes\":\"\",\"selected\":\"\",\"hidden\":\"no\",\"language\":\"english\",\"published\":\"yes\"}',1,'2016-02-01 06:54:12',1);
/*!40000 ALTER TABLE `fuel_archives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_blocks`
--

DROP TABLE IF EXISTS `fuel_blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_blocks` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` text COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_blocks`
--

LOCK TABLES `fuel_blocks` WRITE;
/*!40000 ALTER TABLE `fuel_blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_categories`
--

DROP TABLE IF EXISTS `fuel_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `context` varchar(100) NOT NULL DEFAULT '',
  `language` varchar(30) NOT NULL DEFAULT 'english',
  `precedence` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `published` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_categories`
--

LOCK TABLES `fuel_categories` WRITE;
/*!40000 ALTER TABLE `fuel_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_logs`
--

DROP TABLE IF EXISTS `fuel_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_logs`
--

LOCK TABLES `fuel_logs` WRITE;
/*!40000 ALTER TABLE `fuel_logs` DISABLE KEYS */;
INSERT INTO `fuel_logs` VALUES (1,'2016-01-31 22:45:15',1,'Successful login by \'admin\' from 10.240.0.97','debug'),(2,'2016-01-31 22:51:12',1,'Pages item <em>index.php</em> created','info'),(3,'2016-01-31 22:52:10',1,'Pages item <em>test/index.php</em> edited','info'),(4,'2016-01-31 22:54:12',1,'Navigation item <em>首页</em> edited','info'),(5,'2016-01-31 23:11:08',1,'1 item for <em>pages</em> deleted','info'),(6,'2016-01-31 23:11:49',1,'1 item for <em>navigation</em> deleted','info'),(7,'2016-02-01 18:27:57',1,'Successful login by \'admin\' from 10.240.0.97','debug'),(8,'2016-02-01 18:28:19',1,'Password reset from CMS for \'admin\' from 10.240.0.190','debug'),(9,'2016-02-01 18:47:52',0,'Failed login by \'admin\' from 10.240.0.190, login attempts:   1','debug'),(10,'2016-02-01 18:47:56',1,'Successful login by \'admin\' from 10.240.0.21','debug'),(11,'2016-02-01 19:22:52',1,'Successful login by \'admin\' from 10.240.0.136','debug'),(12,'2016-02-02 00:41:21',0,'Failed login by \'admin\' from 10.240.0.97, login attempts:   1','debug'),(13,'2016-02-02 00:41:25',1,'Successful login by \'admin\' from 10.240.0.97','debug');
/*!40000 ALTER TABLE `fuel_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_navigation`
--

DROP TABLE IF EXISTS `fuel_navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The part of the path after the domain name that you want the link to go to (e.g. comany/about_us)',
  `group_id` int(5) unsigned NOT NULL DEFAULT '1',
  `nav_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The nav key is a friendly ID that you can use for setting the selected state. If left blank, a default value will be set for you.',
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name you want to appear in the menu',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Used for creating menu hierarchies. No value means it is a root level menu item',
  `precedence` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The higher the number, the greater the precedence and farther up the list the navigational element will appear',
  `attributes` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Extra attributes that can be used for navigation implementation',
  `selected` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The pattern to match for the active state. Most likely you leave this field blank',
  `hidden` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'A hidden value can be used in rendering the menu. In some areas, the menu item may not want to be displayed',
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'Determines whether the item is displayed or not',
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id_nav_key_language` (`group_id`,`nav_key`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_navigation`
--

LOCK TABLES `fuel_navigation` WRITE;
/*!40000 ALTER TABLE `fuel_navigation` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_navigation_groups`
--

DROP TABLE IF EXISTS `fuel_navigation_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_navigation_groups` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_navigation_groups`
--

LOCK TABLES `fuel_navigation_groups` WRITE;
/*!40000 ALTER TABLE `fuel_navigation_groups` DISABLE KEYS */;
INSERT INTO `fuel_navigation_groups` VALUES (1,'main','yes');
/*!40000 ALTER TABLE `fuel_navigation_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_page_variables`
--

DROP TABLE IF EXISTS `fuel_page_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_page_variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('string','int','boolean','array') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'string',
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_id` (`page_id`,`name`,`language`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_page_variables`
--

LOCK TABLES `fuel_page_variables` WRITE;
/*!40000 ALTER TABLE `fuel_page_variables` DISABLE KEYS */;
INSERT INTO `fuel_page_variables` VALUES (7,1,'page_title','','首页','string','english','yes'),(8,1,'meta_description','','','string','english','yes'),(9,1,'meta_keywords','','','string','english','yes'),(10,1,'heading','','','string','english','yes'),(11,1,'body','','','string','english','yes'),(12,1,'body_class','','','string','english','yes');
/*!40000 ALTER TABLE `fuel_page_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_pages`
--

DROP TABLE IF EXISTS `fuel_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Add the part of the url after the root of your site (usually after the domain name). For the homepage, just put the word ''home''',
  `layout` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name of the template to associate with this page',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'A ''yes'' value will display the page and an ''no'' value will give a 404 error message',
  `cache` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'Cache controls whether the page will pull from the database or from a saved file which is more effeicent. If a page has content that is dynamic, it''s best to set cache to ''no''',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`),
  KEY `layout` (`layout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_pages`
--

LOCK TABLES `fuel_pages` WRITE;
/*!40000 ALTER TABLE `fuel_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_permissions`
--

DROP TABLE IF EXISTS `fuel_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'In most cases, this should be the name of the module (e.g. news)',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_permissions`
--

LOCK TABLES `fuel_permissions` WRITE;
/*!40000 ALTER TABLE `fuel_permissions` DISABLE KEYS */;
INSERT INTO `fuel_permissions` VALUES (1,'Pages','pages','yes'),(2,'Pages: Create','pages/create','yes'),(3,'Pages: Edit','pages/edit','yes'),(4,'Pages: Publish','pages/publish','yes'),(5,'Pages: Delete','pages/delete','yes'),(6,'Blocks','blocks','yes'),(7,'Blocks: Create','blocks/create','yes'),(8,'Blocks: Edit','blocks/edit','yes'),(9,'Blocks: Publish','blocks/publish','yes'),(10,'Blocks: Delete','blocks/delete','yes'),(11,'Navigation','navigation','yes'),(12,'Navigation: Create','navigation/create','yes'),(13,'Navigation: Edit','navigation/edit','yes'),(14,'Navigation: Publish','navigation/publish','yes'),(15,'Navigation: Delete','navigation/delete','yes'),(16,'Categories','categories','yes'),(17,'Categories: Create','categories/create','yes'),(18,'Categories: Edit','categories/edit','yes'),(19,'Categories: Publish','categories/publish','yes'),(20,'Categories: Delete','categories/delete','yes'),(21,'Tags','tags','yes'),(22,'Tags: Create','tags/create','yes'),(23,'Tags: Edit','tags/edit','yes'),(24,'Tags: Publish','tags/publish','yes'),(25,'Tags: Delete','tags/delete','yes'),(26,'Site Variables','sitevariables','yes'),(27,'Assets','assets','yes'),(28,'Site Documentation','site_docs','yes'),(29,'Users','users','yes'),(30,'Permissions','permissions','yes'),(31,'Manage','manage','yes'),(32,'Cache','manage/cache','yes'),(33,'Logs','logs','yes'),(34,'Settings','settings','yes'),(35,'Generate Code','generate','yes');
/*!40000 ALTER TABLE `fuel_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_relationships`
--

DROP TABLE IF EXISTS `fuel_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_relationships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `candidate_table` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `candidate_key` int(11) NOT NULL,
  `foreign_table` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `candidate_table` (`candidate_table`,`candidate_key`),
  KEY `foreign_table` (`foreign_table`,`foreign_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_relationships`
--

LOCK TABLES `fuel_relationships` WRITE;
/*!40000 ALTER TABLE `fuel_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_settings`
--

DROP TABLE IF EXISTS `fuel_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module` (`module`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_settings`
--

LOCK TABLES `fuel_settings` WRITE;
/*!40000 ALTER TABLE `fuel_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_site_variables`
--

DROP TABLE IF EXISTS `fuel_site_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_site_variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'leave blank if you want the variable to be available to all pages',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_site_variables`
--

LOCK TABLES `fuel_site_variables` WRITE;
/*!40000 ALTER TABLE `fuel_site_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_site_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_tags`
--

DROP TABLE IF EXISTS `fuel_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `precedence` int(11) NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_tags`
--

LOCK TABLES `fuel_tags` WRITE;
/*!40000 ALTER TABLE `fuel_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuel_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuel_users`
--

DROP TABLE IF EXISTS `fuel_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuel_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `reset_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `super_admin` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuel_users`
--

LOCK TABLES `fuel_users` WRITE;
/*!40000 ALTER TABLE `fuel_users` DISABLE KEYS */;
INSERT INTO `fuel_users` VALUES (1,'admin','9d5d8efa61c1deac499647dbdf959b553abdb95a','makeup1123@163.com','li','bing','english','','b5498ff9a4dd3c7c877b448d2ebef651','yes','yes');
/*!40000 ALTER TABLE `fuel_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `print_log`
--

DROP TABLE IF EXISTS `print_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `print_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `devID` int(11) DEFAULT NULL COMMENT '设备ID',
  `print_time` varchar(64) DEFAULT NULL COMMENT '打印的时间',
  `print_barcode` varchar(24) DEFAULT NULL COMMENT '打印的一维码内容',
  `print_info` varchar(64) DEFAULT NULL COMMENT '打印的信息',
  `print_type` int(1) NOT NULL COMMENT '打印类型',
  `idtype` varchar(8) NOT NULL COMMENT '证件类型',
  `scan_pic` varchar(64) NOT NULL COMMENT '扫描采集图像存放路径',
  `people_num` int(11) NOT NULL COMMENT '人数（团体票、其他票）',
  `sex` varchar(2) NOT NULL COMMENT '性别',
  `id_num` varchar(32) NOT NULL COMMENT '证件号码',
  `name` varchar(12) NOT NULL COMMENT '姓名',
  `hasChild` int(11) NOT NULL COMMENT '是否携带儿童',
  `hasGroup` int(11) NOT NULL COMMENT '是否为团队携带者',
  `stamp_time` datetime NOT NULL COMMENT '时间戳',
  `result` int(11) NOT NULL COMMENT '打印结果',
  `error_msg` varchar(64) NOT NULL COMMENT '错误信息',
  `isdelete` int(1) NOT NULL COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `print_log`
--

LOCK TABLES `print_log` WRITE;
/*!40000 ALTER TABLE `print_log` DISABLE KEYS */;
INSERT INTO `print_log` VALUES (4,3,'2016年1月31日 22:17:52','142234198808072810','姓名: 李冰 性别:男 (身份证)',1,'身份证','',0,'男','142234198808072810','李冰',0,0,'2016-01-31 22:17:56',1,'打印正常',0),(5,3,'2016年1月31日 22:18:13','142234198808072810','姓名: 李冰 性别:男 (身份证)',1,'身份证','',0,'男','142234198808072810','李冰',0,0,'2016-01-31 22:18:17',1,'打印正常',0),(6,3,'2016年1月31日 22:18:40','142234198808072810','姓名: 李冰 性别:男 (身份证)',1,'身份证','',0,'男','142234198808072810','李冰',0,0,'2016-01-31 22:18:44',1,'打印正常',0),(7,3,'2016年1月31日 22:20:11','142234198808072810','姓名: 李冰 性别:男 (身份证)',1,'身份证','',0,'男','142234198808072810','李冰',0,0,'2016-01-31 22:20:15',1,'打印正常',0),(8,3,'2016年1月31日 22:20:27','142234198808072810','姓名: 李冰 性别:男 (身份证)',1,'身份证','',0,'男','142234198808072810','李冰',0,0,'2016-01-31 22:20:30',1,'打印正常',0),(9,3,'2016年1月31日 22:21:10','E16670386','姓名: 吉丽娜 性别:女 (其他)',1,'其他','',0,'女','E16670386','吉丽娜',0,0,'2016-01-31 22:21:14',1,'打印正常',0),(10,3,'2016年1月31日 22:24:51','W65095688','姓名: 李冰 性别:男 (其他)',1,'其他','',0,'男','W65095688','李冰',0,0,'2016-01-31 22:24:55',1,'打印正常',0),(12,3,'2016年1月31日 22:26:37','123123123','姓名:  性别: (身份证)',1,'身份证','',0,'','123123123','',0,0,'2016-01-31 22:26:41',1,'打印正常',0),(13,3,'2016年1月31日 22:27:36','142234198808072810','姓名: 李冰 性别:男 (身份证)',1,'身份证','',0,'男','142234198808072810','李冰',0,0,'2016-01-31 22:27:40',1,'打印正常',0),(14,3,'2016年1月31日 22:27:42','142234198808072810','儿童票 (身份证)',2,'身份证','',0,'男','142234198808072810','李冰',1,0,'2016-01-31 22:27:46',1,'打印正常',0),(15,3,'2016年1月31日 22:27:48','142234198808072810','团体票:213人 (身份证)',3,'身份证','',213,'男','142234198808072810','李冰',0,1,'2016-01-31 22:27:52',1,'打印正常',0),(16,3,'2016年1月31日 22:27:51','123123123','学生票:123人 (学生证)',4,'学生证','',123,'','123123123','',0,0,'2016-01-31 22:27:55',1,'打印正常',0),(17,3,'2016年1月31日 22:27:56','123123123','其它票类:34人 (其他证件)',5,'其他证件','',34,'','123123123','',0,0,'2016-01-31 22:28:00',1,'打印正常',0),(18,3,'2016年1月31日 22:42:19','KA6364499956','学生票:12222人 (学生证)',4,'学生证','',12222,'','KA6364499956','',0,0,'2016-01-31 22:42:23',1,'打印正常',0),(19,3,'2016年1月31日 22:42:30','PW5959215667','其它票类:2222人 (其他证件)',5,'其他证件','',2222,'','PW5959215667','',0,0,'2016-01-31 22:42:34',1,'打印正常',0);
/*!40000 ALTER TABLE `print_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(12) DEFAULT NULL COMMENT '用户名',
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `verify` varchar(6) DEFAULT NULL COMMENT '随机盐',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(14) DEFAULT NULL COMMENT '手机号码',
  `remark` varchar(128) DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT NULL COMMENT '状态',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录的IP',
  `role_id` int(1) NOT NULL COMMENT '角色ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','pcYthxTLEtpeJloR++s5bX0R9SmKebk6c2bqpRdIsiPGQoCW1En2S6u3vcNVEKJU5AT0G/1//IhSwXECI7S9ig==','spZZNQ','testA@163.com1','186000000001','超级管理员?1',0,'2016-02-19 05:12:01','2016-02-25 02:46:22','2016-02-29 15:11:09','10.240.0.136',0),(31,'libing','u/xTPfwytFHTyz7s5ToSDiyjZFbFDcRuM50RLbmzTYNMIoWFPp+0q0kAQC9ZxJTeKNpyR7LJ8y/DTRfExlUsJw==','xrUbJf','123','123123','',0,'2016-02-25 06:39:12','0000-00-00 00:00:00','0000-00-00 00:00:00','',0),(32,'789','ABjJEFJ1aH58gQ3eSmSuLtQc5lGCF/P8/Of00qUcsYclfe2oB22JY4JFxUZOD9axCDHDZD455k4EiZRKGYuLeA==','1JUwrX','ui','79879','u',1,'2016-02-27 02:06:27','2016-02-27 05:04:04','0000-00-00 00:00:00','',0),(33,'dasdas','a/C7Gt1sgliffh/MIrhKKvi2ERqC7CbtXQFCh2tc/LbkcbCDMxVao5tdgTW08RMs1VF/T6UzMujd+F4ECfJ2xA==','gvxbnO','313213123','312313','313212312',1,'2016-02-27 05:04:49','0000-00-00 00:00:00','0000-00-00 00:00:00','',1),(34,'da s k d j','vnaykLFcJ/u29XeEmO3YdqfXz8vKMyEOyfOcXLBhrDetDmLcN1iAwXHxubHkgk0gydGpr5NpDsl4svH6vkE/EQ==','k4P3wl','j k l j','k j l k','k',0,'2016-02-28 03:28:19','0000-00-00 00:00:00','0000-00-00 00:00:00','',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-29 10:52:38
