-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

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
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_admin_menu` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_bangdan_leixing`
--

DROP TABLE IF EXISTS `forbes`.`fb_bangdan_leixing`;
CREATE TABLE  `forbes`.`fb_bangdan_leixing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '榜单名称',
  `item_count` int(11) NOT NULL COMMENT '该榜单拥有数量',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forbes`.`fb_bangdan_leixing`
--

/*!40000 ALTER TABLE `fb_bangdan_leixing` DISABLE KEYS */;
LOCK TABLES `fb_bangdan_leixing` WRITE;
INSERT INTO `forbes`.`fb_bangdan_leixing` VALUES  (1,'名人榜',0,'2010-02-08 16:34:07',NULL),
 (2,'城市榜',0,'0000-00-00 00:00:00',NULL),
 (3,'动态富豪榜',0,'2010-02-08 16:34:07',NULL),
 (4,'富豪榜',0,'0000-00-00 00:00:00',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_bangdan_leixing` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_category`
--

DROP TABLE IF EXISTS `forbes`.`fb_category`;
CREATE TABLE  `forbes`.`fb_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type` varchar(255) DEFAULT NULL COMMENT '类别类型',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  `parent_id` int(10) DEFAULT NULL COMMENT '父类别',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `sort_id` int(11) NOT NULL DEFAULT '0' COMMENT '归类ID',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forbes`.`fb_category`
--

/*!40000 ALTER TABLE `fb_category` DISABLE KEYS */;
LOCK TABLES `fb_category` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_category` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_fh`
--

DROP TABLE IF EXISTS `forbes`.`fb_fh`;
CREATE TABLE  `forbes`.`fb_fh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `xm` varchar(100) DEFAULT NULL COMMENT '姓名',
  `xb` bit(1) DEFAULT NULL COMMENT '性别：0女性1男性',
  `sr` datetime DEFAULT NULL COMMENT '生日',
  `grjl` text COMMENT '个人经历',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forbes`.`fb_fh`
--

/*!40000 ALTER TABLE `fb_fh` DISABLE KEYS */;
LOCK TABLES `fb_fh` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_fh` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_fh_grcf`
--

DROP TABLE IF EXISTS `forbes`.`fb_fh_grcf`;
CREATE TABLE  `forbes`.`fb_fh_grcf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fh_id` int(11) NOT NULL,
  `zc` varchar(256) NOT NULL COMMENT '资产',
  `jzrq` datetime NOT NULL COMMENT '截止日期',
  `ndpm` int(11) DEFAULT '0' COMMENT '年度排名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='富豪个人财富表';

--
-- Dumping data for table `forbes`.`fb_fh_grcf`
--

/*!40000 ALTER TABLE `fb_fh_grcf` DISABLE KEYS */;
LOCK TABLES `fb_fh_grcf` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_fh_grcf` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_gs`
--

DROP TABLE IF EXISTS `forbes`.`fb_gs`;
CREATE TABLE  `forbes`.`fb_gs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mc` varchar(255) DEFAULT NULL COMMENT '名称',
  `sf` varchar(20) DEFAULT NULL COMMENT ' 省份',
  `cs` varchar(50) DEFAULT NULL COMMENT '城市',
  `dz` varchar(512) DEFAULT NULL COMMENT '地址',
  `wz` varchar(512) DEFAULT NULL COMMENT '网址',
  `js` text COMMENT '介绍',
  `ssdm` varchar(30) DEFAULT NULL COMMENT '上市公司代码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forbes`.`fb_gs`
--

/*!40000 ALTER TABLE `fb_gs` DISABLE KEYS */;
LOCK TABLES `fb_gs` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_gs` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_images`
--

DROP TABLE IF EXISTS `forbes`.`fb_images`;
CREATE TABLE  `forbes`.`fb_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `description` text COMMENT '简介',
  `url` varchar(255) DEFAULT NULL COMMENT '地址',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT '类别ID',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `publisher` varchar(45) DEFAULT NULL COMMENT '发布者',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `is_adopt` tinyint(1) unsigned DEFAULT '0' COMMENT '是否发布',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `src` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `thumb_name` varchar(255) DEFAULT NULL COMMENT '缩略图',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`category_id`,`is_adopt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `forbes`.`fb_images`
--

/*!40000 ALTER TABLE `fb_images` DISABLE KEYS */;
LOCK TABLES `fb_images` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_images` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_news`
--

DROP TABLE IF EXISTS `forbes`.`fb_news`;
CREATE TABLE  `forbes`.`fb_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT '新闻类别ID',
  `priority` int(11) DEFAULT '100' COMMENT '优先级',
  `click_count` int(11) DEFAULT '0' COMMENT '点击次数',
  `is_adopt` tinyint(1) DEFAULT '0' COMMENT '是否发布',
  `forbbide_copy` tinyint(1) DEFAULT NULL COMMENT '禁止复制',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `title` text COMMENT '标题',
  `short_title` text COMMENT '短标题',
  `description` longtext COMMENT '简介',
  `content` longtext COMMENT '内容',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `last_edited_at` datetime DEFAULT NULL COMMENT '最后编辑时间',
  `publisher` varchar(255) DEFAULT NULL COMMENT '发布者',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `news_type` varchar(255) DEFAULT '1' COMMENT '新闻类型',
  `file_name` varchar(255) DEFAULT NULL COMMENT '文件新闻的文件名',
  `target_url` varchar(255) DEFAULT NULL COMMENT '链接新闻的链接地址',
  `photo_src` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `video_photo_src` varchar(255) DEFAULT NULL COMMENT '视频图片地址',
  `image_flag` tinyint(1) DEFAULT '0' COMMENT '是否是图片新闻',
  `video_flag` tinyint(1) DEFAULT '0' COMMENT '是否是视频新闻',
  `video_src` varchar(255) DEFAULT NULL COMMENT '视频地址',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`created_at`),
  KEY `Index_3` (`category_id`,`is_adopt`),
  KEY `Index_5` (`tags`),
  KEY `Index_6` (`is_adopt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forbes`.`fb_news`
--

/*!40000 ALTER TABLE `fb_news` DISABLE KEYS */;
LOCK TABLES `fb_news` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_news` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_user`
--

DROP TABLE IF EXISTS `forbes`.`fb_user`;
CREATE TABLE  `forbes`.`fb_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT 'member',
  `role_level` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `forbes`.`fb_user`
--

/*!40000 ALTER TABLE `fb_user` DISABLE KEYS */;
LOCK TABLES `fb_user` WRITE;
INSERT INTO `forbes`.`fb_user` VALUES  (1,'admin','超级管理员','admin','admin',2);
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_user` ENABLE KEYS */;


--
-- Definition of table `forbes`.`fb_video`
--

DROP TABLE IF EXISTS `forbes`.`fb_video`;
CREATE TABLE  `forbes`.`fb_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `is_adopt` int(10) unsigned DEFAULT '0' COMMENT '是否发布',
  `photo_url` varchar(254) DEFAULT NULL COMMENT '视频图片链接',
  `video_url` varchar(254) DEFAULT NULL COMMENT '视频链接',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT '类别ID',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` longtext COMMENT '简介',
  `online_url` varchar(255) DEFAULT NULL COMMENT '在线视频地址',
  `publisher` varchar(45) DEFAULT NULL COMMENT '发布者',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`priority`),
  KEY `Index_4` (`is_adopt`),
  KEY `Index_5` (`title`),
  KEY `Index_6` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `forbes`.`fb_video`
--

/*!40000 ALTER TABLE `fb_video` DISABLE KEYS */;
LOCK TABLES `fb_video` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fb_video` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
