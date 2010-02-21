-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema forbes
--

CREATE DATABASE IF NOT EXISTS forbes;
USE forbes;

--
-- Definition of table `forbes`.`fb_admin_menu`
--

DROP TABLE IF EXISTS `forbes`.`fb_admin_menu`;
CREATE TABLE  `forbes`.`fb_admin_menu` (
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `forbes`.`fb_admin_menu`
--

/*!40000 ALTER TABLE `fb_admin_menu` DISABLE KEYS */;
LOCK TABLES `fb_admin_menu` WRITE;
INSERT INTO `forbes`.`fb_admin_menu` VALUES  (1,'系统管理','#',0,'系统管理',3,'#',1,2),
 (2,'类别管理','#',0,'类别管理',1,'#',1,1),
 (3,'内容管理','#',0,'内容管理',2,'#',1,1),
 (4,'新闻管理','/admin/news/news_list.php',3,'新闻管理',1,'#',0,1),
 (5,'图片管理','/admin/image/image_list.php',3,'图片管理',2,'#',0,1),
 (6,'视频管理','/admin/video/video_list.php',3,'视频管理',3,'#',0,1),
 (7,'新闻类别管理','/admin/category/category_list.php?type=news',2,'新闻类别管理',1,'#',0,1),
 (8,'图片类别管理','/admin/category/category_list.php?type=image',2,'图片类别管理',2,'#',0,1),
 (9,'视频类别管理','/admin/category/category_list.php?type=video',2,'视频类别管理',3,'#',0,1),
 (10,'菜单管理','/admin/menu/menu_list.php',1,'菜单管理',1,'admin_iframe',0,2),
 (11,'用户管理','/admin/user/user_list.php',1,'用户管理',2,'admin_iframe',0,2),
 (12,'数据库管理','/admin/dbadmin/',1,'数据库管理',2,'admin_iframe',0,2),
 (13,'榜单管理','#',0,'榜单管理',100,'admin_iframe',1,2);
INSERT INTO `forbes`.`fb_admin_menu` VALUES  (14,'公司管理','/admin/company/list.php',0,'',100,'admin_iframe',0,1),
 (15,'名人管理','/admin/famous/',0,'',100,'admin_iframe',0,1),
 (16,'名人榜管理','/admin/famous_list/',13,'',100,'admin_iframe',0,1),
 (17,'富豪榜','/admin/rich_list/',13,'',100,'admin_iframe',0,1),
 (18,'富豪管理','/admin/rich/list.php',0,'',100,'admin_iframe',0,1),
 (19,'汇率管理','/admin/currency/',0,'',100,'admin_iframe',0,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_admin_menu` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
