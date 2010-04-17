-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: 61.129.115.241    Database: forbes
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5.1-log

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
-- Table structure for table `fb_admin_menu`
--

DROP TABLE IF EXISTS `fb_admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fb_admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `description` text,
  `priority` int(10) unsigned DEFAULT '100',
  `target` varchar(255) DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `role_level` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fb_admin_menu`
--

LOCK TABLES `fb_admin_menu` WRITE;
/*!40000 ALTER TABLE `fb_admin_menu` DISABLE KEYS */;
INSERT INTO `fb_admin_menu` VALUES (1,'系统管理','#',0,'系统管理',4,'#',1,2),(2,'类别管理','#',0,'类别管理',5,'#',1,1),(3,'内容管理','#',0,'内容管理',1,'#',1,1),(4,'新闻管理','/admin/news/news_list.php',3,'新闻管理',1,'admin_iframe',0,1),(5,'图片管理','/admin/image/image_list.php',3,'图片管理',2,'admin_iframe',0,1),(6,'视频管理','/admin/video/video_list.php',3,'视频管理',3,'admin_iframe',0,1),(7,'新闻类别管理','/admin/category/category_list.php?type=news',2,'新闻类别管理',1,'admin_iframe',0,1),(8,'图片类别管理','/admin/category/category_list.php?type=image',2,'图片类别管理',2,'admin_iframe',0,1),(9,'视频类别管理','/admin/category/category_list.php?type=video',2,'视频类别管理',3,'admin_iframe',0,1),(10,'菜单管理','/admin/menu/menu_list.php',1,'菜单管理',1,'admin_iframe',0,2),(11,'用户管理','/admin/user/user_list.php',1,'用户管理',2,'admin_iframe',0,2),(12,'数据库管理','/admin/dbadmin/dbmigrate.php',1,'数据库管理',2,'admin_iframe',0,2),(13,'榜单管理','#',0,'榜单管理',2,'#',1,1),(24,'页面管理','#',0,NULL,8,'#',1,1),(26,'文章榜单','/admin/category/category_list.php?type=file_list',2,'',4,'admin_iframe',0,1),(29,'文章发布统计','/admin/report/publish_news_report.php',1,NULL,4,'admin_iframe',1,2),(30,'常规榜单管理','/admin/list/',13,NULL,1,'admin_iframe',1,1),(31,'图片榜单管理','/admin/list/picture_list_list.php',13,NULL,2,'admin_iframe',1,1),(32,'文章榜单管理','/admin/list/file_list_list.php',13,NULL,3,'admin_iframe',1,1),(33,'行业管理','/admin/industry/',1,NULL,100,'admin_iframe',1,2),(34,'敏感词管理','/admin/filte_words/list.php',1,NULL,100,'admin_iframe',0,2),(35,'静态页面','#',0,NULL,6,'#',1,1),(36,'静态化首页','/admin/static/?type=index',35,NULL,100,'admin_iframe',1,1),(37,'静态化顶部','/admin/static/?type=top',35,'2',100,'admin_iframe',1,1),(38,'静态化底部','/admin/static/?type=bottom',35,NULL,100,'admin_iframe',1,1),(39,'奢侈品管理','/admin/lux',0,NULL,7,'#',1,1),(40,'顶部FLASH','/admin/life/list.php?type=top',39,NULL,100,'admin_iframe',1,1),(41,'中部flash','/admin/life/list.php?type=middle',39,NULL,100,'admin_iframe',1,1),(42,'新闻flash','/admin/life/list.php?type=news',39,NULL,100,'admin_iframe',1,1),(43,'网站首页','/admin/position/page.php?page=index',24,NULL,1,'admin_iframe',1,1),(44,'公司管理','/admin/company/list.php',3,NULL,100,'admin_iframe',1,1),(45,'名人管理','/admin/famous/',3,NULL,100,'admin_iframe',1,1),(46,'富豪管理','/admin/rich/list.php',3,NULL,100,'admin_iframe',1,1),(47,'汇率管理','/admin/currency/',3,NULL,100,'admin_iframe',1,1),(48,'城市管理','/admin/city/',3,NULL,100,'admin_iframe',1,1),(49,'导航管理','/admin/navigation/',1,NULL,100,'admin_iframe',1,2),(50,'富豪首页','/admin/position/page.php?page=billinaires/index',24,NULL,3,'admin_iframe',1,1),(51,'榜单首页','/admin/position/page.php?page=list/index',24,NULL,2,'admin_iframe',1,1),(52,'投资首页','/admin/position/page.php?page=investment/index',24,NULL,4,'admin_iframe',1,1),(53,'创业首页','/admin/position/page.php?page=initiate/index',24,NULL,5,'admin_iframe',1,1),(54,'商业首页','/admin/position/page.php?page=business/index',24,NULL,6,'admin_iframe',1,1),(55,'科技首页','/admin/position/page.php?page=tech/index',24,NULL,7,'admin_iframe',1,1),(56,'城市首页','/admin/position/page.php?page=city/index',24,NULL,8,'admin_iframe',1,1),(57,'活动管理','/admin/event',3,NULL,9,'admin_iframe',1,1),(62,'生活首页','/admin/position/page.php?page=life/index',24,NULL,100,'admin_iframe',0,1),(63,'杂志管理','#',0,NULL,3,'admin_iframe',0,1),(64,'杂志管理','/admin/magazine/',63,NULL,100,'admin_iframe',0,1),(65,'往期杂志管理','/admin/magazine/old_magazine_index.php',63,NULL,100,'admin_iframe',0,1),(66,'杂志订阅查看','/admin/magazine/magazine_order_index.php',63,NULL,100,'admin_iframe',0,1);
/*!40000 ALTER TABLE `fb_admin_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-16 19:06:00
