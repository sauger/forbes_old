-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	6.0.0-alpha-community-nt-debug


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
-- Definition of table `fb_ad_ggw`
--

DROP TABLE IF EXISTS `fb_ad_ggw`;
CREATE TABLE `fb_ad_ggw` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '广告位名称',
  `description` text COMMENT '描述',
  `size` varchar(45) DEFAULT NULL COMMENT '尺寸',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_ad_ggw`
--

/*!40000 ALTER TABLE `fb_ad_ggw` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_ad_ggw` ENABLE KEYS */;


--
-- Definition of table `fb_ad_pd`
--

DROP TABLE IF EXISTS `fb_ad_pd`;
CREATE TABLE `fb_ad_pd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT '广告频道',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `fb_ad_pd`
--

/*!40000 ALTER TABLE `fb_ad_pd` DISABLE KEYS */;
INSERT INTO `fb_ad_pd` (`id`,`name`) VALUES 
 (1,'全站'),
 (2,'生活'),
 (3,'创业'),
 (4,'多频道');
/*!40000 ALTER TABLE `fb_ad_pd` ENABLE KEYS */;


--
-- Definition of table `fb_admin_menu`
--

DROP TABLE IF EXISTS `fb_admin_menu`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `fb_admin_menu`
--

/*!40000 ALTER TABLE `fb_admin_menu` DISABLE KEYS */;
INSERT INTO `fb_admin_menu` (`id`,`name`,`href`,`parent_id`,`description`,`priority`,`target`,`is_root`,`role_level`) VALUES 
 (1,'系统管理','#',0,'系统管理',8,'#',1,2),
 (2,'类别管理','#',0,'类别管理',7,'#',1,1),
 (3,'内容管理','#',0,'内容管理',1,'#',1,1),
 (4,'新闻管理','/admin/news/news_list.php',3,'新闻管理',1,'#',0,1),
 (5,'图片管理','/admin/image/image_list.php',3,'图片管理',2,'#',0,1),
 (6,'视频管理','/admin/video/video_list.php',3,'视频管理',3,'#',0,1),
 (7,'新闻类别管理','/admin/category/category_list.php?type=news',2,'新闻类别管理',1,'#',0,1),
 (8,'图片类别管理','/admin/category/category_list.php?type=image',2,'图片类别管理',2,'#',0,1),
 (9,'视频类别管理','/admin/category/category_list.php?type=video',2,'视频类别管理',3,'#',0,1),
 (10,'菜单管理','/admin/menu/menu_list.php',1,'菜单管理',1,'admin_iframe',0,2),
 (11,'用户管理','/admin/user/user_list.php',1,'用户管理',2,'admin_iframe',0,2),
 (12,'数据库管理','/admin/dbadmin/',1,'数据库管理',2,'admin_iframe',0,2),
 (13,'榜单管理','#',0,'榜单管理',2,'admin_iframe',1,1),
 (14,'公司管理','/admin/company/list.php',0,'',3,'admin_iframe',0,1),
 (15,'名人管理','/admin/famous/',0,'',4,'admin_iframe',0,1),
 (16,'名人榜管理','/admin/famous_list/',13,'',2,'admin_iframe',0,1),
 (17,'富豪榜管理','/admin/rich_list/',13,'',1,'admin_iframe',0,1),
 (18,'富豪管理','/admin/rich/list.php',0,'',5,'admin_iframe',0,1),
 (19,'汇率管理','/admin/currency/',0,'',6,'admin_iframe',0,1),
 (20,'城市榜管理','/admin/city_list/',13,'',3,'admin_iframe',0,1),
 (21,'城市管理','/admin/city/',0,'',6,'admin_iframe',0,1),
 (22,'数据导入','admin/data_upload/',0,'',100,'admin_iframe',0,1),
 (23,'自定义榜单管理','/admin/list/',13,NULL,NULL,'admin_iframe',1,1),
 (24,'位置管理','/admin/postion/index.php',0,NULL,0,'admin_iframe',0,1),
 (25,'导航管理','/admin/navigation/index.php',0,NULL,100,'admin_iframe',0,1);
/*!40000 ALTER TABLE `fb_admin_menu` ENABLE KEYS */;


--
-- Definition of table `fb_bangdan_leixing`
--

DROP TABLE IF EXISTS `fb_bangdan_leixing`;
CREATE TABLE `fb_bangdan_leixing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '榜单名称',
  `item_count` int(11) NOT NULL COMMENT '该榜单拥有数量',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_bangdan_leixing`
--

/*!40000 ALTER TABLE `fb_bangdan_leixing` DISABLE KEYS */;
INSERT INTO `fb_bangdan_leixing` (`id`,`name`,`item_count`,`update_date`,`comment`) VALUES 
 (1,'名人榜',0,'2010-02-08 16:34:07',NULL),
 (2,'城市榜',0,'0000-00-00 00:00:00',NULL),
 (3,'动态富豪榜',0,'2010-02-08 16:34:07',NULL),
 (4,'富豪榜',0,'0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `fb_bangdan_leixing` ENABLE KEYS */;


--
-- Definition of table `fb_category`
--

DROP TABLE IF EXISTS `fb_category`;
CREATE TABLE `fb_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type` varchar(255) DEFAULT NULL COMMENT '类别类型',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  `parent_id` int(10) DEFAULT NULL COMMENT '父类别',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `sort_id` int(11) NOT NULL DEFAULT '0' COMMENT '归类ID',
  `level` int(10) unsigned DEFAULT NULL COMMENT '级别',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_category`
--

/*!40000 ALTER TABLE `fb_category` DISABLE KEYS */;
INSERT INTO `fb_category` (`id`,`category_type`,`name`,`description`,`parent_id`,`priority`,`sort_id`,`level`) VALUES 
 (1,'news','陆家嘴早餐','',0,3,0,1),
 (2,'news','创业',NULL,0,5,0,1),
 (3,'news','商业',NULL,0,6,0,1),
 (4,'news','科技',NULL,0,7,0,1),
 (5,'news','投资',NULL,0,4,0,1),
 (6,'news','每日头条',NULL,0,1,0,1),
 (8,'news','最受欢迎',NULL,0,8,0,1),
 (9,'news','编辑推荐',NULL,0,9,0,1),
 (16,'news','城市','城市首页',0,2,0,1),
 (17,'news','城市-活动',NULL,16,5,16,2),
 (18,'news','投资-推荐文章','投资推荐文章',5,1,5,2),
 (19,'news','投资-专题','投资专题',5,2,5,2),
 (20,'news','投资-文章','投资文章',5,3,5,2),
 (21,'news','投资-专栏','投资专栏',5,4,5,2),
 (22,'news','投资-活动','投资活动',5,5,5,2),
 (23,'news','创业-推荐文章','创业推荐文章',2,1,2,2),
 (24,'news','创业-专题',NULL,2,2,2,2),
 (25,'news','创业-文章',NULL,2,3,2,2),
 (26,'news','创业-专栏','创业专栏',2,4,2,2),
 (27,'news','创业-活动','创业活动',2,5,2,2),
 (28,'news','商业-推荐文章','商业推荐文章',3,1,3,2),
 (29,'news','商业-专题','商业专题',3,2,3,2),
 (30,'news','商业-文章','商业文章',3,3,3,2),
 (31,'news','商业-专栏','商业专栏',3,4,3,2),
 (32,'news','商业-活动','商业活动',3,5,3,2),
 (33,'news','科技-推荐文章','推荐文章',4,1,4,2),
 (34,'news','科技-专题','科技专题',4,2,4,2),
 (35,'news','科技-文章','科技文章',4,3,4,2),
 (36,'news','科技-专栏','科技专栏',4,4,4,2),
 (37,'news','科技-活动','科技活动',4,5,4,2),
 (38,'news','城市-推荐文章','城市推荐文章',16,1,16,2),
 (39,'news','城市-专题','城市专题',16,2,16,2),
 (40,'news','城市-文章','城市文章',16,3,16,2),
 (41,'news','城市-专栏','城市专栏',16,4,16,2),
 (42,'news','富豪频道',NULL,0,10,0,1),
 (43,'news','富豪报道','富豪报道',42,1,42,2),
 (44,'news','创富者说','创富者说',42,2,42,2);
/*!40000 ALTER TABLE `fb_category` ENABLE KEYS */;


--
-- Definition of table `fb_city`
--

DROP TABLE IF EXISTS `fb_city`;
CREATE TABLE `fb_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET gb2312 DEFAULT NULL COMMENT '中文名称',
  `province_name` varchar(255) CHARACTER SET gb2312 DEFAULT NULL COMMENT '所属省',
  `level` int(10) unsigned DEFAULT NULL COMMENT '行政级别，1直辖市2省会城市3计划单列市4地级市5县级市',
  `name2` varchar(255) DEFAULT NULL COMMENT '别名',
  `e_name` varchar(255) DEFAULT NULL COMMENT '英文名',
  `area` varchar(255) DEFAULT NULL COMMENT '面积',
  `population` varchar(255) DEFAULT NULL COMMENT '人口',
  `airdrome` varchar(255) DEFAULT NULL COMMENT '机场',
  `territory` varchar(255) DEFAULT NULL COMMENT '所属地区',
  `railway` varchar(255) DEFAULT NULL COMMENT '火车站',
  `position` varchar(255) DEFAULT NULL COMMENT '地理位置',
  `gdf` varchar(255) DEFAULT NULL COMMENT '城市GDF',
  `photo` varchar(255) DEFAULT NULL COMMENT '城市照片',
  `description` text COMMENT '城市简介',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='城市';

--
-- Dumping data for table `fb_city`
--

/*!40000 ALTER TABLE `fb_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_city` ENABLE KEYS */;


--
-- Definition of table `fb_city_list`
--

DROP TABLE IF EXISTS `fb_city_list`;
CREATE TABLE `fb_city_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市榜单';

--
-- Dumping data for table `fb_city_list`
--

/*!40000 ALTER TABLE `fb_city_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_city_list` ENABLE KEYS */;


--
-- Definition of table `fb_city_list_attribute`
--

DROP TABLE IF EXISTS `fb_city_list_attribute`;
CREATE TABLE `fb_city_list_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(10) unsigned DEFAULT NULL COMMENT '榜单ID',
  `name` varchar(255) DEFAULT NULL COMMENT '属性名',
  `priority` int(10) unsigned DEFAULT NULL COMMENT '属性位置',
  `list_order` int(10) unsigned DEFAULT '0' COMMENT '顺序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市榜单属性';

--
-- Dumping data for table `fb_city_list_attribute`
--

/*!40000 ALTER TABLE `fb_city_list_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_city_list_attribute` ENABLE KEYS */;


--
-- Definition of table `fb_city_list_content`
--

DROP TABLE IF EXISTS `fb_city_list_content`;
CREATE TABLE `fb_city_list_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned DEFAULT NULL COMMENT '城市ID',
  `list_id` int(10) unsigned DEFAULT NULL COMMENT '榜单ID',
  `attribute_id` int(10) unsigned DEFAULT NULL COMMENT '属性ID',
  `value` varchar(255) DEFAULT NULL COMMENT '属性内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市榜内容';

--
-- Dumping data for table `fb_city_list_content`
--

/*!40000 ALTER TABLE `fb_city_list_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_city_list_content` ENABLE KEYS */;


--
-- Definition of table `fb_collection`
--

DROP TABLE IF EXISTS `fb_collection`;
CREATE TABLE `fb_collection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_type` varchar(55) DEFAULT NULL COMMENT '类型',
  `resource_id` int(10) unsigned DEFAULT NULL COMMENT '收藏品id',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 ROW_FORMAT=DYNAMIC COMMENT='用户收藏';

--
-- Dumping data for table `fb_collection`
--

/*!40000 ALTER TABLE `fb_collection` DISABLE KEYS */;
INSERT INTO `fb_collection` (`id`,`resource_type`,`resource_id`,`created_at`,`user_id`) VALUES 
 (1,'fb_news',4,'2010-03-17 10:16:41',NULL),
 (2,'fb_news',6,'2010-03-17 11:17:25',NULL),
 (3,'fb_news',8,'2010-03-17 14:28:02',NULL);
/*!40000 ALTER TABLE `fb_collection` ENABLE KEYS */;


--
-- Definition of table `fb_currency`
--

DROP TABLE IF EXISTS `fb_currency`;
CREATE TABLE `fb_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL COMMENT '货币代码，唯一',
  `name` varchar(256) DEFAULT NULL COMMENT '显示名称，后台可控制',
  `rate` float NOT NULL COMMENT '汇率，相对人民币汇率，例如：美元 则此字段值为 6.802',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `new_index` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COMMENT='货币管理';

--
-- Dumping data for table `fb_currency`
--

/*!40000 ALTER TABLE `fb_currency` DISABLE KEYS */;
INSERT INTO `fb_currency` (`id`,`code`,`name`,`rate`,`update_date`) VALUES 
 (71,'cny','人民币',1,'2010-02-26 14:13:21'),
 (72,'gbp','英镑',10.4721,'2010-02-26 14:13:21'),
 (73,'hkd','港币',0.881,'2010-02-26 14:13:21'),
 (74,'usd','美元',6.8401,'2010-02-26 14:13:21'),
 (75,'chf','瑞士法郎',6.3628,'2010-02-26 14:13:21'),
 (76,'sgd','新加坡元',4.8667,'2010-02-26 14:13:21'),
 (77,'sek','瑞典克朗',0.957,'2010-02-26 14:13:21'),
 (78,'dkk','丹麦克朗',1.2513,'2010-02-26 14:13:21'),
 (79,'nok','挪威克朗',1.1571,'2010-02-26 14:13:21'),
 (80,'jpy','日元',0.07678,'2010-02-26 14:13:21'),
 (81,'cad','加拿大元',6.4743,'2010-02-26 14:13:21'),
 (82,'aud','澳大利亚元',6.0995,'2010-02-26 14:13:21'),
 (83,'eur','欧元',9.3128,'2010-02-26 14:13:21'),
 (84,'mop','澳门元',0.857,'2010-02-26 14:13:21'),
 (85,'php','菲律宾比索',0.1483,'2010-02-26 14:13:21'),
 (86,'thb','泰国铢',0.2071,'2010-02-26 14:13:21'),
 (87,'nzd','新西兰元',4.7572,'2010-02-26 14:13:21'),
 (88,'krw','韩国元',0.006,'2010-02-26 14:13:21');
/*!40000 ALTER TABLE `fb_currency` ENABLE KEYS */;


--
-- Definition of table `fb_custom_list_table_1`
--

DROP TABLE IF EXISTS `fb_custom_list_table_1`;
CREATE TABLE `fb_custom_list_table_1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field_1` int(11) DEFAULT NULL COMMENT '排名',
  `field_2` varchar(255) DEFAULT NULL COMMENT '姓名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_field_2` (`field_2`),
  KEY `index_field_1` (`field_1`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `fb_custom_list_table_1`
--

/*!40000 ALTER TABLE `fb_custom_list_table_1` DISABLE KEYS */;
INSERT INTO `fb_custom_list_table_1` (`id`,`field_1`,`field_2`) VALUES 
 (1,1,'陈龙');
/*!40000 ALTER TABLE `fb_custom_list_table_1` ENABLE KEYS */;


--
-- Definition of table `fb_custom_list_type`
--

DROP TABLE IF EXISTS `fb_custom_list_type`;
CREATE TABLE `fb_custom_list_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `table_name` varchar(50) DEFAULT NULL COMMENT '榜单记录表明',
  `comment` text COMMENT '注释',
  PRIMARY KEY (`id`),
  KEY `new_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gb2312 COMMENT='自定义榜单类别';

--
-- Dumping data for table `fb_custom_list_type`
--

/*!40000 ALTER TABLE `fb_custom_list_type` DISABLE KEYS */;
INSERT INTO `fb_custom_list_type` (`id`,`name`,`table_name`,`comment`) VALUES 
 (1,'测试榜单','fb_custom_list_table_1',NULL);
/*!40000 ALTER TABLE `fb_custom_list_type` ENABLE KEYS */;


--
-- Definition of table `fb_famous_ad`
--

DROP TABLE IF EXISTS `fb_famous_ad`;
CREATE TABLE `fb_famous_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `famous_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET gb2312 DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET gb2312 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='名人代言';

--
-- Dumping data for table `fb_famous_ad`
--

/*!40000 ALTER TABLE `fb_famous_ad` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_famous_ad` ENABLE KEYS */;


--
-- Definition of table `fb_fh`
--

DROP TABLE IF EXISTS `fb_fh`;
CREATE TABLE `fb_fh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `xb` varchar(10) DEFAULT '0' COMMENT 'Ա0Ů1',
  `birthday` int(10) unsigned DEFAULT NULL,
  `grjl` text COMMENT '˾',
  `nl` varchar(100) DEFAULT NULL,
  `jrpm` varchar(100) DEFAULT NULL,
  `gj` varchar(100) DEFAULT NULL,
  `fh_zp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_2` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=759 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_fh`
--

/*!40000 ALTER TABLE `fb_fh` DISABLE KEYS */;
INSERT INTO `fb_fh` (`id`,`name`,`xb`,`birthday`,`grjl`,`nl`,`jrpm`,`gj`,`fh_zp`) VALUES 
 (2,'丁磊','1',1971,'','',NULL,'',NULL),
 (3,'荣智健(及家族)','1',1942,'','61',NULL,'中国',NULL),
 (4,'许荣茂','1',1950,'','53',NULL,'中国',NULL),
 (5,'鲁冠球 ','1',1945,'','58',NULL,'中国',NULL),
 (6,'刘永好 ','1',1951,'','52',NULL,'中国',NULL),
 (7,'陈天桥 ','1',1973,'','30',NULL,'中国',NULL),
 (8,'刘永行 ','1',1948,'','55',NULL,'中国',NULL),
 (9,'叶立培(及家族) ','1',1944,'','59',NULL,'中国',NULL),
 (10,'郭广昌 ','1',1967,'','36',NULL,'中国',NULL),
 (11,'陈丽华','0',1941,'','62',NULL,'中国',NULL),
 (12,'徐明','1',1971,'','32',NULL,'中国',NULL),
 (13,'刘根山 ','1',1957,'','46',NULL,'中国',NULL),
 (14,'王传福 ','1',1966,'','37',NULL,'中国',NULL),
 (15,'张涌 ','1',1966,'','37',NULL,'中国',NULL),
 (16,'朱孟依 ','1',1959,'','44',NULL,'中国',NULL),
 (17,'杨卓舒 ','0',1952,'','51',NULL,'中国',NULL),
 (18,'刘汉元','1',1964,'','39',NULL,'中国',NULL),
 (19,'明金星','1',1958,'','45',NULL,'中国',NULL),
 (20,'陶新康 ','1',1953,'','50',NULL,'中国',NULL),
 (21,'张朝阳','1',1964,'','39',NULL,'中国',NULL),
 (22,'叶韦辰 ','1',1964,'','39',NULL,'中国',NULL),
 (23,'童锦泉','1',1955,'','48',NULL,'中国',NULL),
 (24,'孙广信 ','1',1962,'','41',NULL,'中国',NULL),
 (25,'王玉锁(及家族)','1',1964,'','39',NULL,'中国',NULL),
 (26,'黄光裕','1',1969,'','35',NULL,'中国',NULL),
 (27,'杜厦','1',1948,'','56',NULL,'中国',NULL),
 (29,'周福仁','1',1951,'','53',NULL,'中国',NULL),
 (30,'刘方','0',1979,'','25',NULL,'中国',NULL),
 (31,'周泽荣','1',1955,'','49',NULL,'中国',NULL),
 (32,'张荣坤','1',1973,'','31',NULL,'中国',NULL),
 (33,'楼忠福','1',1954,'','50',NULL,'中国',NULL),
 (34,'欧亚平','1',1962,'','42',NULL,'中国',NULL),
 (35,'李兆会','1',1981,'','23',NULL,'中国',NULL),
 (36,'黄茂如家族','1',1965,'','39',NULL,'中国',NULL),
 (37,'刘长乐','1',1951,'','53',NULL,'中国',NULL),
 (38,'李金元','1',1958,'','46',NULL,'中国 ',NULL),
 (39,'吕向阳','1',1962,'','42',NULL,'中国',NULL),
 (40,'黄宏生','1',1956,'','48',NULL,'中国',NULL),
 (41,'陈卓贤兄弟','1',1967,'','37',NULL,'中国 ',NULL),
 (42,'刘小明','1',1955,'','49',NULL,'中国',NULL),
 (43,'郭浩家族','1',1955,'','49',NULL,'中国 ',NULL),
 (44,'周建和','1',1963,'','41',NULL,'中国 ',NULL),
 (45,'张佛恩','1',1952,'','52',NULL,'中国 ',NULL),
 (46,'缪寿良','1',1955,'','49',NULL,'中国',NULL),
 (47,'钭正刚','1',1953,'','51',NULL,'中国 ',NULL),
 (48,'祝义才','1',1964,'','40',NULL,'中国',NULL),
 (49,'梁亮胜','1',1951,'','53',NULL,'中国',NULL),
 (50,'张跃','1',1960,'','44',NULL,'中国',NULL),
 (51,'周庆治','1',1955,'','49',NULL,'中国',NULL),
 (52,'蔡天真家族','1',1961,'','43',NULL,'中国',NULL),
 (53,'沈雯','1',1958,'','46',NULL,'中国',NULL),
 (54,'冯光成','1',1951,'','53',NULL,'中国',NULL),
 (55,'黄如论','1',1953,'','51',NULL,'中国',NULL),
 (56,'吴良定','1',1947,'','57',NULL,'中国',NULL),
 (57,'荣海','1',1957,'','47',NULL,'中国',NULL),
 (58,'李书福','1',1963,'','41',NULL,'中国',NULL),
 (59,'卢志强','1',1951,'','53',NULL,'中国',NULL),
 (60,'黄俊钦','1',1967,'','37',NULL,'中国',NULL),
 (61,'李德文','1',1950,'','54',NULL,'中国 ',NULL),
 (62,'张志祥','1',1967,'','37',NULL,'中国',NULL),
 (63,'刘志强','1',1964,'','40',NULL,'中国',NULL),
 (64,'霍东龄','1',1956,'','48',NULL,'中国',NULL),
 (65,'史跃武家族','1',1973,'','31',NULL,'中国',NULL),
 (66,'高元坤','1',1958,'','46',NULL,'中国',NULL),
 (67,'沈文荣','1',1946,'','58',NULL,'中国',NULL),
 (68,'米恩华','1',1958,'','46',NULL,'中国 ',NULL),
 (69,'宗庆后','1',1945,'','59',NULL,'中国',NULL),
 (70,'张芝庭','1',1945,'','59',NULL,'中国',NULL),
 (71,'李永军家族','1',1967,'','37',NULL,'中国',NULL),
 (72,'缪双大及兄弟','1',1951,'','53',NULL,'中国',NULL),
 (73,'朱保国','1',1961,'','43',NULL,'中国',NULL),
 (74,'许家印','1',1959,'','45',NULL,'中国',NULL),
 (75,'韩国龙','1',1955,'','49',NULL,'中国',NULL),
 (76,'张雷','1',1962,'','42',NULL,'中国',NULL),
 (77,'夏朝嘉','1',1949,'','55',NULL,'中国',NULL),
 (78,'宋卫平','1',1958,'','46',NULL,'中国 ',NULL),
 (79,'张思民','1',1962,'','42',NULL,'中国',NULL),
 (80,'顾雏军','1',1959,'','45',NULL,'中国 ',NULL),
 (81,'李宁家族','1',1963,'','41',NULL,'中国',NULL),
 (82,'李兴浩','1',1954,'','50',NULL,'中国 ',NULL),
 (83,'荣克敏家族','1',1944,'','60',NULL,'中国',NULL),
 (84,'严晓群','1',1967,'','37',NULL,'中国',NULL),
 (85,'孙宏斌','1',1963,'','41',NULL,'中国',NULL),
 (86,'顾云奎家族','1',1936,'','68',NULL,'中国',NULL),
 (87,'韩真发','1',1953,'','51',NULL,'中国',NULL),
 (88,'张果喜','1',1952,'','52',NULL,'中国',NULL),
 (89,'陈涵霖','1',1957,'','47',NULL,'中国',NULL),
 (90,'韩敬远','1',1957,'','47',NULL,'中国',NULL),
 (91,'徐周文','1',1943,'','61',NULL,'中国',NULL),
 (92,'姚小东','1',1970,'','34',NULL,'中国',NULL),
 (93,'孙荫环','1',1950,'','54',NULL,'中国',NULL),
 (94,'陆克平','1',1943,'','61',NULL,'中国',NULL),
 (95,'左宗申','1',1952,'','52',NULL,'中国',NULL),
 (96,'张力','1',1953,'','51',NULL,'中国',NULL),
 (97,'胡葆森','1',1957,'','47',NULL,'中国',NULL),
 (98,'孙甚林','1',1953,'','51',NULL,'中国',NULL),
 (99,'陈润光','1',1954,'','50',NULL,'中国',NULL),
 (100,'梁稳根','1',1956,'','48',NULL,'中国',NULL),
 (101,'周连奎','1',1961,'','43',NULL,'中国',NULL),
 (102,'梁信军','1',1969,'','35',NULL,'中国',NULL),
 (103,'马化腾','1',1972,'','32',NULL,'中国',NULL),
 (104,'黄丽丽','0',1963,'','41',NULL,'中国',NULL),
 (105,'孔展鹏','1',1964,'','40',NULL,'中国',NULL),
 (106,'关凌翔','1',1961,'','43',NULL,'中国',NULL),
 (107,'曹明芳','1',1946,'','58',NULL,'中国',NULL),
 (108,'林秀成','1',1951,'','53',NULL,'中国',NULL),
 (109,'蓝伟光','1',1962,'','42',NULL,'新加坡',NULL),
 (110,'王铁光','1',1965,'','39',NULL,'中国',NULL),
 (111,'陈健','1',1963,'','41',NULL,'中国',NULL),
 (112,'陈伟东','1',1964,'','40',NULL,'中国',NULL),
 (113,'任运良','1',1955,'','49',NULL,'中国',NULL),
 (114,'牛根生','1',1958,'','46',NULL,'中国',NULL),
 (115,'余渐富','1',1957,'','47',NULL,'中国',NULL),
 (116,'张松桥','1',1965,'','39',NULL,'中国',NULL),
 (117,'徐冠巨家族','1',1961,'','43',NULL,'中国',NULL),
 (118,'朱骏','1',1967,'','37',NULL,'中国',NULL),
 (119,'乔秋生','1',1951,'','53',NULL,'中国',NULL),
 (120,'叶祥尧家族','1',1953,'','51',NULL,'中国',NULL),
 (121,'尹明善','1',1939,'','64',NULL,'中国',NULL),
 (122,'邝汇珍','1',1956,'','48',NULL,'中国',NULL),
 (123,'施文博','1',1951,'','53',NULL,'中国',NULL),
 (124,'昝圣达','1',1963,'','41',NULL,'中国 ',NULL),
 (125,'张茵','0',1957,'','47',NULL,'美国',NULL),
 (126,'庄元','1',1968,'','36',NULL,'中国 ',NULL),
 (127,'张文中','1',1963,'','41',NULL,'中国',NULL),
 (128,'范现国','1',1960,'','44',NULL,'中国',NULL),
 (129,'许连捷（许自连）','1',1953,'','51',NULL,'中国',NULL),
 (130,'曲乃杰','1',1960,'','44',NULL,'中国',NULL),
 (131,'胡成中家族','1',1961,'','43',NULL,'中国',NULL),
 (132,'卢楚其兄弟','1',1951,'','53',NULL,'中国',NULL),
 (133,'成清波','1',1962,'','42',NULL,'中国',NULL),
 (134,'张钧','1',1963,'','41',NULL,'中国',NULL),
 (135,'童文其','1',1956,'','48',NULL,'中国 ',NULL),
 (136,'林伟雄','1',1954,'','50',NULL,'中国',NULL),
 (137,'张海','1',1974,'','30',NULL,'中国 ',NULL),
 (138,'李宴清','1',1955,'','49',NULL,'中国',NULL),
 (139,'张桂平','1',1951,'','53',NULL,'中国',NULL),
 (140,'孙树华','1',1964,'','40',NULL,'中国',NULL),
 (141,'戴志康','1',1964,'','40',NULL,'中国',NULL),
 (142,'李勤夫','1',1962,'','42',NULL,'中国',NULL),
 (143,'王建沂家族','1',1963,'','41',NULL,'中国',NULL),
 (144,'袁柏仁','1',1964,'','40',NULL,'中国',NULL),
 (145,'赵步长','1',1939,'','65',NULL,'中国',NULL),
 (146,'张锴雍','1',1961,'','43',NULL,'中国',NULL),
 (147,'王春鸣家族','1',1949,'','55',NULL,'中国',NULL),
 (211,'吴国迪','1',1960,'','45',NULL,'中国',NULL),
 (149,'杨树坪','1',1957,'','47',NULL,'中国',NULL),
 (150,'李德福','1',1957,'','47',NULL,'中国',NULL),
 (151,'姚原兄弟','1',1956,'','48',NULL,'中国',NULL),
 (152,'姚俊良家族','1',1952,'','52',NULL,'中国',NULL),
 (153,'陈丽芬','0',1958,'','46',NULL,'中国',NULL),
 (154,'傅军','1',1957,'','47',NULL,'中国',NULL),
 (155,'南存辉家族','1',1964,'','40',NULL,'中国',NULL),
 (156,'周益明','1',1974,'','30',NULL,'中国',NULL),
 (157,'曹德旺','1',1945,'','59',NULL,'中国',NULL),
 (158,'庞宝根','1',1957,'','47',NULL,'中国',NULL),
 (159,'王超斌','1',1956,'','48',NULL,'中国',NULL),
 (160,'周云帆','1',1975,'','29',NULL,'中国',NULL),
 (161,'杨宁','1',1975,'','29',NULL,'中国',NULL),
 (162,'李彦宏','1',1968,'','36',NULL,'中国',NULL),
 (163,'杨澜','0',1968,'','36',NULL,'中国',NULL),
 (164,'朱敏','1',1948,'','56',NULL,'美国',NULL),
 (165,'吴鹰','1',1959,'','45',NULL,'美国',NULL),
 (166,'徐万茂','1',1945,'','59',NULL,'中国',NULL),
 (167,'姚新义家族','1',1964,'','40',NULL,'中国',NULL),
 (168,'张宝全','1',1957,'','47',NULL,'中国',NULL),
 (169,'任正非','1',1944,'','60',NULL,'中国',NULL),
 (170,'陈荣','1',1959,'','45',NULL,'中国',NULL),
 (171,'张大中','1',1948,'','56',NULL,'中国',NULL),
 (172,'刘军','1',1966,'','38',NULL,'中国',NULL),
 (173,'周海江','1',1966,'','38',NULL,'中国',NULL),
 (174,'郭家学家族','1',1966,'','38',NULL,'中国',NULL),
 (175,'蒋泉龙','1',1952,'','52',NULL,'中国',NULL),
 (176,'邹伟','1',1970,'','34',NULL,'美国',NULL),
 (177,'祝维沙','1',1956,'','48',NULL,'中国',NULL),
 (178,'刘振江','1',1949,'','55',NULL,'中国',NULL),
 (179,'虞锋','1',1963,'','41',NULL,'中国',NULL),
 (180,'秦诗禄','1',1944,'','60',NULL,'中国',NULL),
 (181,'陆锦','1',1953,'','51',NULL,'中国',NULL),
 (182,'郑有全','1',1954,'','50',NULL,'中国',NULL),
 (184,'李松坚','1',1963,'','41',NULL,'中国',NULL),
 (185,'王伟','1',1964,'','40',NULL,'中国',NULL),
 (186,'邢拴林','1',1964,'','40',NULL,'中国',NULL),
 (187,'邱继宝','1',1962,'','42',NULL,'中国 ',NULL),
 (188,'周辞美','1',1942,'','62',NULL,'中国',NULL),
 (189,'王文京','1',1964,'','40',NULL,'中国',NULL),
 (190,'张士平家族','1',1947,'','57',NULL,'中国',NULL),
 (191,'李伟波','1',1962,'','42',NULL,'中国',NULL),
 (192,'孙少锋','1',1966,'','38',NULL,'中国',NULL),
 (193,'张兴标家族','1',1946,'','58',NULL,'中国',NULL),
 (194,'廉华','1',1961,'','43',NULL,'中国',NULL),
 (195,'求伯君','1',1964,'','40',NULL,'中国',NULL),
 (196,'冯东明','1',1959,'','45',NULL,'中国',NULL),
 (197,'华国强','1',1952,'','52',NULL,'中国',NULL),
 (198,'霍东岭 ','1',1956,'','47',NULL,'中国',NULL),
 (199,'唐万里','1',1956,'','47',NULL,'中国',NULL),
 (200,'吴炳新','1',1938,'','65',NULL,'中国',NULL),
 (201,'品向阳','1',1962,'','41',NULL,'中国',NULL),
 (202,'吴一坚','1',1960,'','43',NULL,'中国',NULL),
 (203,'高远坤','1',1958,'','45',NULL,'中国',NULL),
 (204,'剪英海','1',1962,'','41',NULL,'中国',NULL),
 (205,'段永平','1',1961,'','42',NULL,'中国',NULL),
 (206,'Lily Huang','1',1963,'','40',NULL,'中国',NULL),
 (207,'欧俊发','1',1942,'','61',NULL,'中国',NULL),
 (208,'宋殿权','1',1955,'','48',NULL,'中国',NULL),
 (209,'沈家','1',1949,'','54',NULL,'中国',NULL),
 (210,'张扬','1',1962,'','41',NULL,'中国',NULL),
 (212,'金福音家族','1',1950,'','55',NULL,'中国',NULL),
 (213,'马云','1',1964,'','41',NULL,'中国',NULL),
 (214,'何享健','1',1942,'','63',NULL,'中国',NULL),
 (215,'李东军','1',1958,'','47',NULL,'中国 ',NULL),
 (216,'金惠明','1',1953,'','52',NULL,'中国',NULL),
 (217,'何金明家族','1',1954,'','51',NULL,'中国',NULL),
 (218,'戴皓','1',1964,'','41',NULL,'中国',NULL),
 (219,'王健林','1',1954,'','51',NULL,'中国',NULL),
 (220,'丁立国','1',1970,'','35',NULL,'中国',NULL),
 (221,'魏东','1',1969,'','36',NULL,'中国',NULL),
 (222,'潘政民','1',1969,'','36',NULL,'中国',NULL),
 (223,'陈索斌','1',1965,'','40',NULL,'中国',NULL),
 (224,'孙启玉兄弟','1',1949,'','56',NULL,'中国',NULL),
 (225,'黄怒波','1',1956,'','49',NULL,'中国',NULL),
 (226,'江南春','1',1973,'','32',NULL,'中国',NULL),
 (227,'杨钊兄弟','1',1953,'','52',NULL,'中国',NULL),
 (228,'邹锡昌','1',1963,'','42',NULL,'中国',NULL),
 (229,'兰世立','0',1966,'','39',NULL,'中国',NULL),
 (230,'陈早春','1',1973,'','32',NULL,'中国',NULL),
 (231,'李振江','1',1956,'','49',NULL,'中国',NULL),
 (232,'谢炳','1',1952,'','53',NULL,'中国',NULL),
 (233,'黄水寿','1',1947,'','58',NULL,'中国',NULL),
 (234,'吴晓东夫妇','1',1957,'','48',NULL,'中国',NULL),
 (235,'陈泳妃','0',1961,'','44',NULL,'中国',NULL),
 (236,'王祖同','1',1945,'','60',NULL,'中国',NULL),
 (237,'吕慧','0',1949,'','56',NULL,'中国',NULL),
 (238,'荣克敏夫妇','1',1944,'','61',NULL,'中国',NULL),
 (239,'汪群斌','1',1969,'','36',NULL,'中国',NULL),
 (240,'范伟','1',1969,'','36',NULL,'中国',NULL),
 (241,'卢国纪父子','1',1923,'','82',NULL,'中国 ',NULL),
 (242,'邓伟','1',1963,'','42',NULL,'中国',NULL),
 (243,'王均金家族','1',1968,'','37',NULL,'中国',NULL),
 (244,'李安民家族','1',1945,'','60',NULL,'中国 ',NULL),
 (245,'王振滔','1',1965,'','40',NULL,'中国',NULL),
 (246,'徐勇','1',1964,'','41',NULL,'中国',NULL),
 (247,'寿柏年','1',1954,'','51',NULL,'中国',NULL),
 (248,'阮水龙家族','1',1935,'','70',NULL,'中国',NULL),
 (249,'王树生','1',1954,'','51',NULL,'中国',NULL),
 (250,'郑大清','1',1959,'','46',NULL,'中国',NULL),
 (251,'王义政','1',1968,'','37',NULL,'中国',NULL),
 (252,'安治富','1',1946,'','59',NULL,'中国',NULL),
 (253,'张新明家族','1',1963,'','42',NULL,'中国',NULL),
 (254,'张德生','1',1949,'','56',NULL,'中国',NULL),
 (255,'张国兴','1',1947,'','58',NULL,'中国',NULL),
 (256,'李洪信','1',1953,'','52',NULL,'中国',NULL),
 (257,'刘绍喜','1',1963,'','42',NULL,'中国',NULL),
 (258,'梁广义家族','1',1956,'','49',NULL,'中国',NULL),
 (259,'崔根良','1',1957,'','48',NULL,'中国',NULL),
 (260,'施健','1',1954,'','51',NULL,'中国',NULL),
 (261,'杨绍鹏','1',1958,'','47',NULL,'中国',NULL),
 (262,'柯希平','1',1960,'','45',NULL,'中国',NULL),
 (263,'马建荣家族','1',1964,'','41',NULL,'中国',NULL),
 (264,'魏建军家族','1',1964,'','41',NULL,'中国 ',NULL),
 (265,'侯为贵','1',1942,'','63',NULL,'中国',NULL),
 (266,'张文荣家族','1',1965,'','40',NULL,'中国',NULL),
 (267,'修涞贵','1',1950,'','55',NULL,'中国',NULL),
 (268,'李新炎','1',1951,'','54',NULL,'中国',NULL),
 (269,'徐之伟家族','1',1951,'','54',NULL,'中国',NULL),
 (270,'吴瑞林','1',1952,'','53',NULL,'中国',NULL),
 (271,'翟韶均','1',1958,'','47',NULL,'中国',NULL),
 (272,'朱志平','1',1962,'','43',NULL,'中国',NULL),
 (273,'吴海军','1',1966,'','39',NULL,'中国',NULL),
 (274,'王张兴','1',1967,'','38',NULL,'中国',NULL),
 (275,'徐浩宇','1',1972,'','33',NULL,'中国',NULL),
 (276,'廖长光','1',1951,'','54',NULL,'中国',NULL),
 (277,'张清海','1',1955,'','50',NULL,'中国',NULL),
 (278,'张志东','1',1972,'','33',NULL,'中国',NULL),
 (279,'戴伟','1',1960,'','45',NULL,'中国',NULL),
 (280,'潘石屹','1',1963,'','42',NULL,'中国',NULL),
 (281,'杨铿','1',1962,'','43',NULL,'中国',NULL),
 (282,'罗韶宇家族','1',1958,'','47',NULL,'中国',NULL),
 (283,'朱文臣家族','1',1966,'','39',NULL,'中国',NULL),
 (284,'李水荣','1',1956,'','49',NULL,'中国',NULL),
 (285,'黄文仔','1',1953,'','52',NULL,'中国',NULL),
 (286,'郑胜涛','1',1952,'','53',NULL,'中国',NULL),
 (287,'赵永亮','1',1957,'','48',NULL,'中国',NULL),
 (288,'汪远思','1',1951,'','54',NULL,'中国',NULL),
 (289,'李艳归','1',1953,'','52',NULL,'中国',NULL),
 (290,'李义超','1',1954,'','51',NULL,'中国',NULL),
 (291,'刘沧龙','1',1956,'','49',NULL,'中国',NULL),
 (292,'汪力成','1',1960,'','45',NULL,'中国',NULL),
 (293,'汪建国','1',1960,'','45',NULL,'中国',NULL),
 (294,'王滨','1',1965,'','40',NULL,'中国',NULL),
 (295,'董德福','1',1972,'','33',NULL,'中国',NULL),
 (296,'尤小平','1',1958,'','47',NULL,'中国',NULL),
 (297,'朱张金','1',1965,'','40',NULL,'中国',NULL),
 (298,'俞乃奋','0',1965,'','40',NULL,'中国',NULL),
 (299,'黄伟家族','1',1959,'','46',NULL,'中国',NULL),
 (300,'郑生华','1',1962,'','43',NULL,'中国',NULL),
 (301,'陈晓','1',1958,'','47',NULL,'中国',NULL),
 (302,'薛靛民','1',1959,'','46',NULL,'中国',NULL),
 (303,'周连期家族','1',1962,'','43',NULL,'中国',NULL),
 (304,'张河川','1',1956,'','49',NULL,'中国',NULL),
 (305,'陈华','1',1966,'','39',NULL,'中国',NULL),
 (306,'郑秀康','1',1946,'','59',NULL,'中国',NULL),
 (307,'崔玉莲','0',1951,'','54',NULL,'中国',NULL),
 (308,'沈南鹏','1',1967,'','38',NULL,'中国',NULL),
 (309,'张志利','1',1962,'','43',NULL,'中国',NULL),
 (310,'李劳牛','1',1965,'','40',NULL,'中国',NULL),
 (311,'栗建伟','1',1966,'','39',NULL,'中国',NULL),
 (312,'苏增福家族','1',1968,'','37',NULL,'中国',NULL),
 (313,'袁利群','1',1969,'','36',NULL,'中国',NULL),
 (314,'严健军','1',1966,'','39',NULL,'中国',NULL),
 (315,'鄢贤华','1',1960,'','55',NULL,'中国',NULL),
 (316,'邵钦祥家族','1',1954,'','51',NULL,'中国',NULL),
 (317,'周天宝','1',1952,'','53',NULL,'中国',NULL),
 (318,'高德康','1',1952,'','53',NULL,'中国',NULL),
 (319,'沈国军','1',1960,'','45',NULL,'中国 ',NULL),
 (320,'刘殿波夫妇','1',1965,'','40',NULL,'中国',NULL),
 (321,'徐群','1',1958,'','47',NULL,'中国',NULL),
 (322,'崔明杰','1',1968,'','37',NULL,'中国',NULL),
 (323,'Lily Wang家族','0',1959,'','46',NULL,'中国',NULL),
 (324,'甘源','1',1062,'','43',NULL,'中国',NULL),
 (325,'李桂莲','0',1946,'','59',NULL,'中国',NULL),
 (326,'远勤山','1',1958,'','47',NULL,'中国',NULL),
 (327,'李兴','1',1954,'','51',NULL,'中国',NULL),
 (328,'徐诚惠','1',1965,'','40',NULL,'中国',NULL),
 (329,'朱湘桂家族','1',1949,'','56',NULL,'中国',NULL),
 (330,'李文漫','1',1941,'','64',NULL,'中国',NULL),
 (331,'方悟校','1',1949,'','56',NULL,'中国',NULL),
 (332,'孙才科家族','1',1952,'','53',NULL,'中国',NULL),
 (333,'陈平','1',1955,'','50',NULL,'中国',NULL),
 (334,'韩文臣','1',1957,'','48',NULL,'中国',NULL),
 (335,'陈鸿成家族','1',1958,'','47',NULL,'中国',NULL),
 (336,'刘忠元','1',1961,'','44',NULL,'中国',NULL),
 (337,'史玉柱','1',1962,'','43',NULL,'中国',NULL),
 (338,'刘武','1',1963,'','42',NULL,'中国',NULL),
 (339,'郭梓文','1',1964,'','41',NULL,'中国',NULL),
 (340,'李建宏','1',1965,'','40',NULL,'中国',NULL),
 (341,'刘远炳','1',1966,'','39',NULL,'中国',NULL),
 (342,'卢伟光','1',1966,'','39',NULL,'中国',NULL),
 (343,'王填','1',1968,'','37',NULL,'中国',NULL),
 (344,'秦志尚','1',1948,'','57',NULL,'中国',NULL),
 (345,'赖振元','1',1939,'','66',NULL,'中国',NULL),
 (346,'陆汉振','1',1955,'','50',NULL,'中国',NULL),
 (347,'朱宝良','1',1962,'','43',NULL,'中国',NULL),
 (348,'李一奎','1',1951,'','54',NULL,'中国',NULL),
 (349,'阎吉英','1',1951,'','54',NULL,'中国',NULL),
 (350,'陈泽民','1',1953,'','52',NULL,'中国',NULL),
 (351,'黄晞家族','0',1962,'','43',NULL,'中国',NULL),
 (352,'邱建林','1',1963,'','42',NULL,'中国',NULL),
 (353,'陈维平','1',1961,'','44',NULL,'中国',NULL),
 (354,'叶仙玉','1',1957,'','48',NULL,'中国',NULL),
 (355,'何伟','1',1957,'','48',NULL,'中国',NULL),
 (356,'杨新民','1',1948,'','57',NULL,'中国',NULL),
 (357,'赵华山','1',1949,'','56',NULL,'中国',NULL),
 (358,'郑保忠兄弟','1',1953,'','52',NULL,'中国',NULL),
 (359,'吴忠静','1',1956,'','49',NULL,'中国',NULL),
 (360,'伍跃时兄妹','1',1958,'','47',NULL,'中国',NULL),
 (361,'傅光明','1',1954,'','51',NULL,'中国',NULL),
 (362,'沈飞宇','1',1956,'','49',NULL,'中国',NULL),
 (363,'林丹','1',1956,'','49',NULL,'中国',NULL),
 (364,'冯立社','1',1958,'','47',NULL,'中国',NULL),
 (365,'谢国胜','1',1962,'','43',NULL,'中国',NULL),
 (366,'陈奕熙','1',1966,'','39',NULL,'中国',NULL),
 (367,'夏春亭','1',1955,'','50',NULL,'中国',NULL),
 (368,'吴坚忠','1',1957,'','48',NULL,'中国',NULL),
 (369,'李非列','1',1965,'','40',NULL,'中国',NULL),
 (370,'冷友斌','1',1968,'','37',NULL,'中国',NULL),
 (371,'张荣链','1',1968,'','37',NULL,'中国',NULL),
 (372,'杨天夫','1',1961,'','44',NULL,'中国',NULL),
 (373,'李伟','1',1968,'','37',NULL,'中国',NULL),
 (374,'孙利永','1',1970,'','35',NULL,'中国',NULL),
 (375,'叶世渠','1',1950,'','55',NULL,'中国',NULL),
 (376,'常永芳','1',1953,'','52',NULL,'中国',NULL),
 (377,'邵亦波','1',1973,'','32',NULL,'中国',NULL),
 (378,'韩召善','1',1950,'','55',NULL,'中国',NULL),
 (379,'李大鹏','1',1950,'','55',NULL,'中国',NULL),
 (380,'孙庆炎','0',1951,'','54',NULL,'中国',NULL),
 (381,'蒋茂远','1',1952,'','53',NULL,'中国',NULL),
 (382,'夏明宪','1',1953,'','52',NULL,'中国',NULL),
 (383,'金良顺','1',1954,'','51',NULL,'中国',NULL),
 (384,'王水福','1',1955,'','50',NULL,'中国',NULL),
 (385,'杨敏','0',1955,'','50',NULL,'中国',NULL),
 (386,'乔鲁豫','1',1955,'','50',NULL,'中国',NULL),
 (387,'韩伟夫妇','1',1956,'','49',NULL,'中国',NULL),
 (388,'黄巧灵','1',1958,'','47',NULL,'中国',NULL),
 (389,'徐其明','1',1960,'','45',NULL,'中国',NULL),
 (390,'王中军兄弟','1',1960,'','45',NULL,'中国',NULL),
 (391,'陈伟峰','1',1961,'','44',NULL,'中国',NULL),
 (392,'张秀根','1',1961,'','44',NULL,'中国',NULL),
 (393,'王振华','1',1962,'','43',NULL,'中国',NULL),
 (394,'陈金飞','1',1962,'','43',NULL,'中国',NULL),
 (395,'黄少良家族','1',1963,'','42',NULL,'中国',NULL),
 (396,'明德泉','1',1963,'','42',NULL,'中国',NULL),
 (397,'颜宝铃家族','0',1964,'','41',NULL,'中国',NULL),
 (398,'郑福双','1',1965,'','40',NULL,'中国',NULL),
 (399,'钱金耐','1',1965,'','40',NULL,'中国',NULL),
 (400,'王长田','1',1965,'','40',NULL,'中国',NULL),
 (401,'杨毫','1',1965,'','40',NULL,'中国',NULL),
 (402,'季琦','1',1966,'','39',NULL,'中国',NULL),
 (403,'孙江榕','1',1967,'','38',NULL,'中国',NULL),
 (404,'陈一舟','1',1969,'','36',NULL,'中国',NULL),
 (405,'梁建章','1',1970,'','35',NULL,'中国',NULL),
 (406,'盛静生','1',1971,'','34',NULL,'中国',NULL),
 (407,'梁健','1',1971,'','34',NULL,'中国',NULL),
 (408,'朱林瑶','0',1969,'','37',NULL,'中国',NULL),
 (409,'张成飞','1',1968,'','38',NULL,'中国',NULL),
 (410,'刘忠田','1',1964,'','42',NULL,'中国',NULL),
 (411,'张近东','1',1963,'','43',NULL,'中国',NULL),
 (412,'陆倩芳','0',1961,'','45',NULL,'中国',NULL),
 (413,'吴岳明','1',1966,'','40',NULL,'中国',NULL),
 (414,'张修基','1',1934,'','72',NULL,'中国',NULL),
 (415,'徐航','1',1962,'','44',NULL,'中国',NULL),
 (416,'袁志敏','1',1961,'','45',NULL,'中国',NULL),
 (417,'郦松校','1',1965,'','41',NULL,'中国',NULL),
 (418,'王中旺','1',1970,'','36',NULL,'中国',NULL),
 (419,'俞敏洪','1',1962,'','44',NULL,'中国',NULL),
 (420,'吴惠天','1',1943,'','63',NULL,'中国',NULL),
 (421,'李向前家族','1',1968,'','38',NULL,'中国',NULL),
 (422,'陈金凤','0',1963,'','43',NULL,'中国',NULL),
 (423,'贾廷亮','1',1956,'','50',NULL,'中国',NULL),
 (424,'薛向东','1',1959,'','47',NULL,'中国',NULL),
 (425,'吉为','1',1957,'','49',NULL,'中国',NULL),
 (426,'康敬为','1',1970,'','36',NULL,'中国',NULL),
 (427,'高云峰家族','1',1967,'','39',NULL,'中国',NULL),
 (428,'张祥青','1',1970,'','36',NULL,'中国',NULL),
 (429,'许奇峰家族','1',1963,'','43',NULL,'中国',NULL),
 (430,'高仕军','1',1966,'','40',NULL,'中国',NULL),
 (431,'霍炽昌','1',1963,'','43',NULL,'中国',NULL),
 (432,'安康家族','1',1949,'','57',NULL,'中国',NULL),
 (433,'潘超文','1',1963,'','43',NULL,'中国',NULL),
 (434,'冯海良家族','1',1960,'','46',NULL,'中国',NULL),
 (435,'刘益谦','1',1963,'','43',NULL,'中国',NULL),
 (436,'叶华能','1',1952,'','54',NULL,'中国',NULL),
 (437,'王勇','1',1950,'','56',NULL,'中国',NULL),
 (438,'莫天全','1',1964,'','42',NULL,'中国',NULL),
 (439,'袁汉源','1',1962,'','44',NULL,'中国',NULL),
 (440,'易贤忠家族','1',1958,'','48',NULL,'中国',NULL),
 (441,'林宗岐','0',1933,'','73',NULL,'中国',NULL),
 (442,'陈建成家族','1',1959,'','47',NULL,'中国',NULL),
 (443,'丁志忠','1',1970,'','36',NULL,'中国',NULL),
 (444,'刘汉','1',1964,'','41',NULL,'中国',NULL),
 (445,'韩长安','1',1966,'','40',NULL,'中国',NULL),
 (446,'孙佑安兄弟','1',1963,'','43',NULL,'中国',NULL),
 (447,'丁建通','1',1941,'','65',NULL,'中国',NULL),
 (448,'李保平','1',1966,'','40',NULL,'中国',NULL),
 (449,'李登海','1',1949,'','57',NULL,'中国',NULL),
 (450,'文一波','1',1968,'','38',NULL,'中国',NULL),
 (451,'胡钢家族','1',1958,'','48',NULL,'中国',NULL),
 (452,'徐锦鑫','1',1955,'','51',NULL,'中国',NULL),
 (453,'余斌','1',1964,'','42',NULL,'中国',NULL),
 (455,'王明均','1',1959,'','47',NULL,'中国',NULL),
 (456,'邓鸿','1',1963,'','43',NULL,'中国',NULL),
 (457,'乔伟光','1',1970,'','36',NULL,'中国',NULL),
 (458,'胡谅伦','1',1959,'','47',NULL,'中国',NULL),
 (459,'吴良好','1',1948,'','58',NULL,'中国',NULL),
 (460,'涂国身','1',1965,'','41',NULL,'中国',NULL),
 (461,'陈学利','1',1951,'','55',NULL,'中国',NULL),
 (462,'赵蓓','0',1958,'','48',NULL,'中国',NULL),
 (463,'李如成','1',1953,'','53',NULL,'中国',NULL),
 (464,'陆廷秀','1',1961,'','45',NULL,'中国',NULL),
 (465,'钱月宝','0',1949,'','57',NULL,'中国',NULL),
 (466,'李国庆','1',1964,'','42',NULL,'中国',NULL),
 (467,'陈清渊家族','1',1956,'','48',NULL,'中国',NULL),
 (468,'陈志峰','1',1963,'','43',NULL,'中国',NULL),
 (469,'黄鸣','1',1958,'','48',NULL,'中国',NULL),
 (470,'王福才','1',1955,'','51',NULL,'中国',NULL),
 (471,'常兆华','1',1963,'','43',NULL,'中国',NULL),
 (472,'吴志泽','1',1960,'','46',NULL,'中国',NULL),
 (473,'霍振祥','1',1950,'','56',NULL,'中国',NULL),
 (474,'赵宁家族','1',1981,'','25',NULL,'中国',NULL),
 (475,'沈国荣','1',1949,'','57',NULL,'中国',NULL),
 (476,'苏纲','1',1959,'','47',NULL,'中国',NULL),
 (477,'周明华','1',1965,'','41',NULL,'中国',NULL),
 (478,'陈保华','1',1963,'','43',NULL,'中国',NULL),
 (479,'陈大年','1',1978,'','28',NULL,'中国',NULL),
 (480,'杨惠妍','0',1981,'','26',NULL,'中国',NULL),
 (481,'彭小峰','1',1975,'','32',NULL,'中国',NULL),
 (482,'杨贰珠','1',1951,'','56',NULL,'中国',NULL),
 (483,'孔健岷','1',1968,'','39',NULL,'中国',NULL),
 (484,'苗连生','1',1956,'','51',NULL,'中国',NULL),
 (485,'鲜扬','1',1974,'','33',NULL,'中国',NULL),
 (486,'苏汝波','1',1955,'','52',NULL,'中国',NULL),
 (487,'区学铭','1',1950,'','57',NULL,'中国',NULL),
 (488,'张耀垣','1',1946,'','61',NULL,'中国',NULL),
 (489,'张克强','1',1960,'','47',NULL,'中国',NULL),
 (490,'陈义红夫妇','1',1958,'','49',NULL,'中国',NULL),
 (491,'郭梓文家族','1',1965,'','42',NULL,'中国',NULL),
 (492,'耿建明','1',1962,'','45',NULL,'中国',NULL),
 (493,'任元林','1',1954,'','53',NULL,'中国',NULL),
 (494,'周传有','1',1964,'','43',NULL,'中国',NULL),
 (495,'董书通','1',1951,'','56',NULL,'中国',NULL),
 (496,'朱新礼','1',1952,'','55',NULL,'中国',NULL),
 (497,'张宏伟','1',1954,'','53',NULL,'中国',NULL),
 (498,'朱玉国','1',1952,'','55',NULL,'中国',NULL),
 (499,'潘雄','1',1964,'','43',NULL,'中国',NULL),
 (500,'马兴法家族','1',1962,'','45',NULL,'中国',NULL),
 (501,'吴亚军','0',1964,'','43',NULL,'中国',NULL),
 (502,'李华','1',1966,'','41',NULL,'中国',NULL),
 (503,'丁世家','1',1964,'','43',NULL,'中国',NULL),
 (504,'盛百椒','1',1952,'','55',NULL,'中国',NULL),
 (505,'王东','1',1959,'','48',NULL,'中国',NULL),
 (506,'景柱','1',1966,'','41',NULL,'中国',NULL),
 (507,'车建兴','1',1964,'','43',NULL,'中国',NULL),
 (508,'潘慰','0',1956,'','51',NULL,'中国',NULL),
 (509,'何清华','1',1946,'','61',NULL,'中国',NULL),
 (510,'陈国鹰家族','1',1963,'','44',NULL,'中国',NULL),
 (511,'周忻','1',1968,'','39',NULL,'中国',NULL),
 (512,'孙飘扬','1',1958,'','49',NULL,'中国',NULL),
 (513,'项建军','1',1960,'','47',NULL,'中国',NULL),
 (514,'修刚','1',1955,'','52',NULL,'中国',NULL),
 (515,'李贤义','1',1952,'','55',NULL,'中国',NULL),
 (516,'孔健涛','1',1971,'','36',NULL,'中国',NULL),
 (517,'林天助','1',1942,'','65',NULL,'中国',NULL),
 (518,'乔晞','1',1962,'','45',NULL,'中国',NULL),
 (519,'池宇峰','1',1971,'','36',NULL,'中国',NULL),
 (520,'周健','1',1969,'','38',NULL,'中国',NULL),
 (521,'李仲初','1',1963,'','44',NULL,'中国',NULL),
 (522,'邱建林家族','1',1963,'','44',NULL,'中国',NULL),
 (523,'李建华','1',1951,'','56',NULL,'中国',NULL),
 (524,'高彦明','1',1957,'','50',NULL,'中国',NULL),
 (525,'严彬','1',1954,'','53',NULL,'中国',NULL),
 (526,'黄红云','1',1966,'','41',NULL,'中国',NULL),
 (527,'郭恩元家族','1',1948,'','59',NULL,'中国',NULL),
 (528,'宋子明','1',1968,'','39',NULL,'中国',NULL),
 (529,'姜纯','1',1960,'','47',NULL,'中国',NULL),
 (530,'唐修国','1',1963,'','44',NULL,'中国',NULL),
 (531,'郑永刚','1',1958,'','49',NULL,'中国',NULL),
 (532,'楼国强','1',1957,'','50',NULL,'中国',NULL),
 (533,'缪汉根','1',1965,'','42',NULL,'中国',NULL),
 (534,'沈学如','1',1954,'','53',NULL,'中国',NULL),
 (535,'毛中吾','1',1962,'','45',NULL,'中国',NULL),
 (536,'向文波','1',1962,'','45',NULL,'中国',NULL),
 (537,'蒋锡培','1',1963,'','44',NULL,'中国',NULL),
 (538,'朱兴良家族','1',1959,'','48',NULL,'中国',NULL),
 (539,'欧通国','1',1959,'','48',NULL,'中国',NULL),
 (540,'王鹤鸣父子','1',1949,'','58',NULL,'中国',NULL),
 (541,'马兴田','1',1969,'','38',NULL,'中国',NULL),
 (542,'夏佐全','1',1962,'','45',NULL,'中国',NULL),
 (543,'杨文龙夫妇','1',1962,'','45',NULL,'中国',NULL),
 (544,'孔健楠','1',1966,'','41',NULL,'中国',NULL),
 (545,'曾云枢','1',1954,'','53',NULL,'中国',NULL),
 (546,'王鹏','1',1974,'','33',NULL,'中国',NULL),
 (547,'涂建民','1',1947,'','60',NULL,'中国',NULL),
 (548,'袁明','1',1963,'','44',NULL,'中国',NULL),
 (549,'任晋生','1',1961,'','46',NULL,'中国',NULL),
 (550,'饶陆华','1',1965,'','42',NULL,'中国',NULL),
 (551,'宋济隆','1',1963,'','44',NULL,'中国',NULL),
 (552,'池清林','1',1947,'','60',NULL,'中国',NULL),
 (553,'蒋勇','1',1971,'','36',NULL,'中国',NULL),
 (554,'安英','1',1959,'','48',NULL,'中国',NULL),
 (555,'林江怀','1',1968,'','39',NULL,'中国',NULL),
 (556,'王正华','1',1944,'','63',NULL,'中国',NULL),
 (557,'李生贵','1',1958,'','49',NULL,'中国',NULL),
 (558,'张兰','0',1958,'','49',NULL,'中国',NULL),
 (559,'孙日贵','1',1955,'','52',NULL,'中国',NULL),
 (560,'周和平夫妇','1',1964,'','43',NULL,'中国',NULL),
 (561,'刘海龙','1',1950,'','57',NULL,'中国',NULL),
 (562,'翁荣金兄弟','1',1963,'','44',NULL,'中国',NULL),
 (563,'黄培钊','1',1960,'','47',NULL,'中国',NULL),
 (564,'陈兴康','1',1946,'','61',NULL,'中国',NULL),
 (565,'陈建铭','1',1956,'','51',NULL,'中国',NULL),
 (566,'黄建荣','1',1957,'','50',NULL,'中国',NULL),
 (567,'夏鼎湖','1',1944,'','63',NULL,'中国',NULL),
 (568,'周儒欣','1',1963,'','44',NULL,'中国',NULL),
 (569,'徐玉锁夫妇','1',1965,'','42',NULL,'中国',NULL),
 (570,'朱小坤','1',1957,'','50',NULL,'中国',NULL),
 (571,'靳保芳','1',1952,'','55',NULL,'中国',NULL),
 (572,'孙德良','1',1972,'','35',NULL,'中国',NULL),
 (573,'罗玉平','1',1966,'','41',NULL,'中国',NULL),
 (574,'张晓平','1',1962,'','45',NULL,'中国',NULL),
 (575,'张中能夫妇','1',1963,'','44',NULL,'中国',NULL),
 (576,'单银木','1',1960,'','47',NULL,'中国',NULL),
 (577,'谢保军','1',1962,'','45',NULL,'中国',NULL),
 (578,'李宝库','1',1966,'','41',NULL,'中国',NULL),
 (579,'周成建','1',1965,'','42',NULL,'中国',NULL),
 (580,'许景南','1',1955,'','52',NULL,'中国',NULL),
 (581,'邱亚夫','1',1958,'','49',NULL,'中国',NULL),
 (582,'朱相桂','1',1949,'','58',NULL,'中国',NULL),
 (583,'方吾校夫妇','1',1949,'','58',NULL,'中国',NULL),
 (584,'李途纯','1',1958,'','49',NULL,'中国',NULL),
 (585,'陈志樟','1',1965,'','42',NULL,'中国',NULL),
 (586,'宋伯康','1',1958,'','49',NULL,'中国',NULL),
 (587,'张毓强','1',1955,'','52',NULL,'中国',NULL),
 (588,'董才平','1',1963,'','44',NULL,'中国',NULL),
 (589,'袁金华','1',1959,'','48',NULL,'中国',NULL),
 (590,'柴国生','1',1953,'','54',NULL,'中国',NULL),
 (591,'高纪凡夫妇','1',1965,'','42',NULL,'中国',NULL),
 (592,'冯仑','1',1959,'','48',NULL,'中国',NULL),
 (593,'卢增祥','1',1971,'','36',NULL,'中国',NULL),
 (594,'朱建华','1',1969,'','38',NULL,'中国',NULL),
 (595,'杨志远','1',1953,'','54',NULL,'中国',NULL),
 (596,'田莉','0',1963,'','44',NULL,'中国',NULL),
 (597,'张彦夫','1',1967,'','40',NULL,'中国',NULL),
 (598,'施正荣','1',1963,'','45',NULL,'中国 ',NULL),
 (599,'王健林家族','1',1954,'','54',NULL,'中国',NULL),
 (600,'张荣华','0',1969,'','39',NULL,'中国',NULL),
 (601,'邢利斌','1',1967,'','41',NULL,'中国',NULL),
 (602,'陈金霞','0',1968,'','40',NULL,'中国',NULL),
 (603,'李赶坡','1',1950,'','58',NULL,'中国',NULL),
 (604,'方威','1',1973,'','35',NULL,'中国',NULL),
 (605,'杨休','1',1961,'','47',NULL,'中国',NULL),
 (606,'孟庆南家族','1',1958,'','50',NULL,'中国',NULL),
 (607,'陈光标','1',1968,'','40',NULL,'中国',NULL),
 (608,'林秀成家族','1',1955,'','53',NULL,'中国',NULL),
 (609,'黄世再','1',1951,'','57',NULL,'中国',NULL),
 (610,'刘满世','1',1948,'','60',NULL,'中国',NULL),
 (611,'杨敏家族','0',1955,'','53',NULL,'中国',NULL),
 (612,'杨钊家族','1',1947,'','61',NULL,'中国',NULL),
 (613,'刘建民夫妇','1',1953,'','55',NULL,'中国',NULL),
 (614,'何茂雄夫妇','1',1961,'','47',NULL,'中国',NULL),
 (615,'黄善年','1',1962,'','46',NULL,'中国',NULL),
 (616,'黄小平','1',1958,'','50',NULL,'中国',NULL),
 (617,'霍庆华','1',1961,'','47',NULL,'中国',NULL),
 (618,'虞松波','1',1964,'','44',NULL,'中国',NULL),
 (619,'金惠明家族','1',1953,'','55',NULL,'中国',NULL),
 (620,'刘艳国家族','1',1969,'','39',NULL,'中国',NULL),
 (621,'郭占春家族','1',1954,'','54',NULL,'中国',NULL),
 (622,'茹伯兴家族','1',1947,'','61',NULL,'中国',NULL),
 (623,'陈隆基','1',1956,'','52',NULL,'中国',NULL),
 (624,'陈凯旋家族','1',1958,'','50',NULL,'中国',NULL),
 (625,'任铁柱','1',1960,'','48',NULL,'中国',NULL),
 (626,'周泊霖','1',1953,'','55',NULL,'中国',NULL),
 (627,'柴慧京家族','1',1961,'','47',NULL,'中国',NULL),
 (628,'陈妙林','1',1952,'','56',NULL,'中国',NULL),
 (629,'侯抗胜家族','1',1953,'','55',NULL,'中国',NULL),
 (630,'黄焕明','1',1963,'','45',NULL,'中国',NULL),
 (631,'茅永红','1',1954,'','54',NULL,'中国',NULL),
 (632,'唐骏','1',1962,'','46',NULL,'中国',NULL),
 (633,'叶德林','1',1956,'','52',NULL,'中国',NULL),
 (634,'俞国生家族','1',1957,'','51',NULL,'中国',NULL),
 (635,'袁玉珠','1',1953,'','55',NULL,'中国',NULL),
 (636,'王旭宁','1',1969,'','39',NULL,'中国',NULL),
 (637,'柯永开兄弟','1',1966,'','42',NULL,'中国',NULL),
 (638,'郑坚江','1',1962,'','46',NULL,'中国',NULL),
 (639,'胡柏藩家族','1',1962,'','46',NULL,'中国',NULL),
 (640,'戴永革','1',1968,'','40',NULL,'中国',NULL),
 (641,'陈五奎','1',1958,'','50',NULL,'中国',NULL),
 (642,'梁衍锋家族','1',1965,'','43',NULL,'中国',NULL),
 (643,'刘松山家族','1',1973,'','35',NULL,'中国',NULL),
 (644,'欧宗荣家族','1',1964,'','44',NULL,'中国',NULL),
 (645,'吴道洪','1',1966,'','42',NULL,'中国',NULL),
 (646,'袁凯飞','1',1952,'','56',NULL,'中国',NULL),
 (647,'张泉','1',1969,'','39',NULL,'中国',NULL),
 (648,'郑跃文','1',1962,'','46',NULL,'中国',NULL),
 (649,'丁水波','1',1970,'','38',NULL,'中国',NULL),
 (650,'王永红家族','1',1972,'','36',NULL,'中国',NULL),
 (651,'瞿晓铧','1',1964,'','44',NULL,'中国',NULL),
 (652,'张童生','1',1957,'','51',NULL,'中国',NULL),
 (653,'朴龙华','1',1962,'','46',NULL,'中国',NULL),
 (654,'林伟雄夫妇','1',1954,'','54',NULL,'中国',NULL),
 (655,'张振武','1',1966,'','42',NULL,'中国',NULL),
 (656,'李刚家族','1',1963,'','45',NULL,'中国',NULL),
 (657,'俞乃奋家族','0',1965,'','43',NULL,'中国',NULL),
 (658,'陈锦石家族','1',1962,'','46',NULL,'中国',NULL),
 (659,'董现君','1',1963,'','45',NULL,'中国',NULL),
 (660,'马西波','1',1960,'','48',NULL,'中国',NULL),
 (661,'吴忠泉','1',1968,'','40',NULL,'中国',NULL),
 (662,'周建平家族','1',1960,'','48',NULL,'中国',NULL),
 (663,'邹蕴玉','0',1963,'','45',NULL,'中国',NULL),
 (664,'刘润红','0',1968,'','40',NULL,'中国',NULL),
 (665,'虞阿五','1',1941,'','67',NULL,'中国',NULL),
 (666,'陈建华','1',1971,'','37',NULL,'中国',NULL),
 (667,'高靖海','1',1966,'','42',NULL,'中国',NULL),
 (668,'霍炽昌家族','1',1963,'','45',NULL,'中国',NULL),
 (669,'任平','1',1963,'','45',NULL,'中国',NULL),
 (670,'荣秀丽','0',1963,'','45',NULL,'中国',NULL),
 (671,'孙宏原家族','1',1964,'','44',NULL,'中国',NULL),
 (672,'王文彪家族','1',1958,'','50',NULL,'中国',NULL),
 (673,'张强','1',1960,'','48',NULL,'中国',NULL),
 (674,'张轩松家族','1',1971,'','37',NULL,'中国',NULL),
 (675,'陈榕生家族','1',1958,'','50',NULL,'中国',NULL),
 (676,'裘国根夫妇','1',1969,'','39',NULL,'中国 ',NULL),
 (677,'施侃成','1',1962,'','46',NULL,'中国',NULL),
 (678,'徐明波','1',1964,'','44',NULL,'中国',NULL),
 (679,'富彦斌','1',1964,'','44',NULL,'中国',NULL),
 (680,'宫学斌','1',1937,'','71',NULL,'中国',NULL),
 (681,'梁庆德','1',1937,'','71',NULL,'中国',NULL),
 (682,'刘洪林','1',1951,'','57',NULL,'中国',NULL),
 (683,'张代理','1',1955,'','53',NULL,'中国',NULL),
 (684,'张志熔','1',1972,'','36',NULL,'中国',NULL),
 (685,'陆永华','1',1964,'','44',NULL,'中国',NULL),
 (686,'姜滨家族','1',1966,'','42',NULL,'中国',NULL),
 (687,'林水盘','1',1968,'','40',NULL,'中国',NULL),
 (688,'朱国平家族','1',1960,'','48',NULL,'中国',NULL),
 (689,'丁敏儿家族','1',1957,'','51',NULL,'中国',NULL),
 (690,'张铁汉家族','1',1958,'','50',NULL,'中国',NULL),
 (691,'卢柏强家族','1',1962,'','46',NULL,'中国',NULL),
 (692,'许智明','1',1964,'','44',NULL,'中国',NULL),
 (693,'周晓光','0',1962,'','46',NULL,'中国',NULL),
 (694,'朱共山','1',1957,'','52',NULL,'中国',NULL),
 (695,'王久芳父子','1',1963,'','46',NULL,'中国',NULL),
 (696,'何著胜','1',1947,'','62',NULL,'中国',NULL),
 (697,'雷菊芳','0',1953,'','56',NULL,'中国',NULL),
 (698,'许健康','1',1952,'','57',NULL,'中国',NULL),
 (699,'叶澄海家族','1',1943,'','66',NULL,'中国',NULL),
 (700,'阙文彬夫妇','1',1963,'','46',NULL,'中国',NULL),
 (701,'牛宜顺','1',1955,'','54',NULL,'中国',NULL),
 (702,'秦志威','1',1965,'','44',NULL,'中国',NULL),
 (703,'杨龙忠','1',1964,'','45',NULL,'中国',NULL),
 (704,'陈启源夫妇','1',1962,'','47',NULL,'中国',NULL),
 (705,'林龙安夫妇','1',1964,'','45',NULL,'中国',NULL),
 (706,'邹节明家族','1',1943,'','66',NULL,'中国',NULL),
 (707,'王伟林夫妇','1',1962,'','47',NULL,'中国',NULL),
 (708,'蔡东青','1',1969,'','40',NULL,'中国',NULL),
 (709,'乔鲁予','1',1956,'','53',NULL,'中国',NULL),
 (710,'梁社增父子','1',1932,'','77',NULL,'中国',NULL),
 (711,'薛光林','1',1949,'','60',NULL,'中国',NULL),
 (712,'郭文华','1',1962,'','47',NULL,'中国',NULL),
 (713,'姜俊平','1',1950,'','49',NULL,'中国',NULL),
 (714,'赖宁昌','1',1969,'','40',NULL,'中国',NULL),
 (715,'王伟贤','1',1964,'','45',NULL,'中国',NULL),
 (716,'郭金东','1',1965,'','44',NULL,'中国',NULL),
 (717,'张才奎','1',1951,'','58',NULL,'中国',NULL),
 (718,'莫建华 ','1',1970,'','39',NULL,'中国',NULL),
 (719,'朱慧明','1',1963,'','46',NULL,'中国',NULL),
 (720,'张泽民夫妇','1',1964,'','45',NULL,'中国',NULL),
 (721,'邱光和','1',1951,'','58',NULL,'中国',NULL),
 (722,'周亚仙','0',1960,'','49',NULL,'中国',NULL),
 (723,'吴光明','1',1962,'','47',NULL,'中国',NULL),
 (724,'郑钟南','1',1949,'','60',NULL,'中国',NULL),
 (725,'岑钊雄','1',1970,'','39',NULL,'中国',NULL),
 (726,'郑峰文','1',1966,'','43',NULL,'中国',NULL),
 (727,'王信恩','1',1950,'','59',NULL,'中国',NULL),
 (728,'陈劲松夫妇','1',1964,'','45',NULL,'中国',NULL),
 (729,'鲁楚平','1',1965,'','44',NULL,'中国',NULL),
 (730,'宋世新','1',1969,'','40',NULL,'中国',NULL),
 (731,'索朗多吉(李炎）','1',1963,'','46',NULL,'中国',NULL),
 (732,'冯小华','1',1956,'','53',NULL,'中国',NULL),
 (733,'吴建荣夫妇','1',1957,'','52',NULL,'中国',NULL),
 (734,'陈卓南','1',1964,'','45',NULL,'中国',NULL),
 (735,'陈卓喜','1',1959,'','50',NULL,'中国',NULL),
 (736,'黄其森','1',1965,'','44',NULL,'中国',NULL),
 (737,'李笙安','1',1957,'','52',NULL,'中国',NULL),
 (738,'王劲','1',1963,'','46',NULL,'中国',NULL),
 (739,'陈卓雄','1',1957,'','52',NULL,'中国',NULL),
 (740,'李学纯','1',1951,'','58',NULL,'中国',NULL),
 (741,'王永泉','1',1949,'','60',NULL,'中国',NULL),
 (742,'王海鹏','1',1971,'','38',NULL,'中国',NULL),
 (743,'黄振达家族','1',1947,'','62',NULL,'中国',NULL),
 (744,'杨寿海 ','1',1957,'','52',NULL,'中国',NULL),
 (745,'李春波','1',1960,'','49',NULL,'中国',NULL),
 (746,'何伯权','1',1960,'','49',NULL,'中国',NULL),
 (747,'林来嵘','1',1968,'','41',NULL,'中国',NULL),
 (748,'王久林','1',1955,'','54',NULL,'中国',NULL),
 (749,'高星','1',1953,'','56',NULL,'中国',NULL),
 (750,'袁亚非','1',1964,'','45',NULL,'中国',NULL),
 (751,'张道才家族','1',1950,'','59',NULL,'中国',NULL),
 (752,'高乃则','1',1961,'','48',NULL,'中国',NULL),
 (753,'潘伟明 ','1',1964,'','45',NULL,'中国',NULL),
 (754,'王景连','1',1962,'','47',NULL,'中国',NULL),
 (755,'许晓明','1',1963,'','46',NULL,'中国',NULL),
 (756,'荀建华','1',1962,'','47',NULL,'中国',NULL),
 (757,'杨文江','1',1972,'','37',NULL,'中国',NULL),
 (758,'庄儒桂','1',1960,'','49',NULL,'中国',NULL);
/*!40000 ALTER TABLE `fb_fh` ENABLE KEYS */;


--
-- Definition of table `fb_fh_grcf`
--

DROP TABLE IF EXISTS `fb_fh_grcf`;
CREATE TABLE `fb_fh_grcf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fh_id` int(11) NOT NULL,
  `zc` varchar(512) NOT NULL COMMENT 'ʲ',
  `jzrq` datetime NOT NULL COMMENT 'ֹ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='˲Ƹ';

--
-- Dumping data for table `fb_fh_grcf`
--

/*!40000 ALTER TABLE `fb_fh_grcf` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_fh_grcf` ENABLE KEYS */;


--
-- Definition of table `fb_fh_gs`
--

DROP TABLE IF EXISTS `fb_fh_gs`;
CREATE TABLE `fb_fh_gs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fh_id` varchar(100) NOT NULL COMMENT 'ID',
  `gs_id` varchar(100) NOT NULL COMMENT '˾ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fb_fh_gs`
--

/*!40000 ALTER TABLE `fb_fh_gs` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_fh_gs` ENABLE KEYS */;


--
-- Definition of table `fb_fhb`
--

DROP TABLE IF EXISTS `fb_fhb`;
CREATE TABLE `fb_fhb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(256) DEFAULT NULL,
  `unit` varchar(20) NOT NULL DEFAULT '亿人民币',
  `publish_year` int(11) DEFAULT NULL COMMENT '榜单年份',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_fhb`
--

/*!40000 ALTER TABLE `fb_fhb` DISABLE KEYS */;
INSERT INTO `fb_fhb` (`id`,`year`,`unit`,`publish_year`) VALUES 
 (1,'2003年富豪榜','亿美元',2003),
 (2,'2005','亿美元',2005);
/*!40000 ALTER TABLE `fb_fhb` ENABLE KEYS */;


--
-- Definition of table `fb_fhbd`
--

DROP TABLE IF EXISTS `fb_fhbd`;
CREATE TABLE `fb_fhbd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pm` int(10) unsigned DEFAULT NULL COMMENT 'ۺ',
  `sr` float DEFAULT NULL,
  `bgl` float DEFAULT NULL COMMENT 'ع',
  `sbly` text COMMENT 'ϰ',
  `zp` varchar(255) DEFAULT NULL COMMENT 'Ƭ',
  `bd_id` int(11) DEFAULT NULL,
  `fh_id` int(10) unsigned DEFAULT NULL COMMENT 'ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_2` (`bd_id`,`fh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fb_fhbd`
--

/*!40000 ALTER TABLE `fb_fhbd` DISABLE KEYS */;
INSERT INTO `fb_fhbd` (`id`,`pm`,`sr`,`bgl`,`sbly`,`zp`,`bd_id`,`fh_id`) VALUES 
 (1,1,10.76,NULL,'','',1,2);
/*!40000 ALTER TABLE `fb_fhbd` ENABLE KEYS */;


--
-- Definition of table `fb_gs`
--

DROP TABLE IF EXISTS `fb_gs`;
CREATE TABLE `fb_gs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mc` varchar(255) DEFAULT NULL,
  `sf` varchar(20) DEFAULT NULL COMMENT ' ʡ',
  `cs` varchar(50) DEFAULT NULL,
  `dz` varchar(512) DEFAULT NULL COMMENT 'ַ',
  `wz` varchar(512) DEFAULT NULL COMMENT 'ַ',
  `js` text,
  `ssdm` varchar(30) DEFAULT NULL COMMENT 'й˾',
  `gj` varchar(45) DEFAULT NULL,
  `jys` varchar(45) DEFAULT NULL,
  `hbid` varchar(45) DEFAULT NULL COMMENT 'ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_gs`
--

/*!40000 ALTER TABLE `fb_gs` DISABLE KEYS */;
INSERT INTO `fb_gs` (`id`,`mc`,`sf`,`cs`,`dz`,`wz`,`js`,`ssdm`,`gj`,`jys`,`hbid`) VALUES 
 (14,'11','1','','','','<p>1</p>','111','1','SZ','71');
/*!40000 ALTER TABLE `fb_gs` ENABLE KEYS */;


--
-- Definition of table `fb_hbgl`
--

DROP TABLE IF EXISTS `fb_hbgl`;
CREATE TABLE `fb_hbgl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hb_nc` varchar(255) DEFAULT NULL,
  `hb_dv` varchar(255) DEFAULT NULL,
  `hb_gj` varchar(255) DEFAULT NULL,
  `hb_hl` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `new_field` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_hbgl`
--

/*!40000 ALTER TABLE `fb_hbgl` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_hbgl` ENABLE KEYS */;


--
-- Definition of table `fb_images`
--

DROP TABLE IF EXISTS `fb_images`;
CREATE TABLE `fb_images` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_images`
--

/*!40000 ALTER TABLE `fb_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_images` ENABLE KEYS */;


--
-- Definition of table `fb_mr`
--

DROP TABLE IF EXISTS `fb_mr`;
CREATE TABLE `fb_mr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zy` varchar(255) DEFAULT NULL COMMENT '职业',
  `mr_zp` varchar(255) DEFAULT NULL COMMENT '名人照片',
  `mr_jj` text COMMENT '名人简介',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `xb` varchar(45) DEFAULT NULL COMMENT '性别',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fb_mr`
--

/*!40000 ALTER TABLE `fb_mr` DISABLE KEYS */;
INSERT INTO `fb_mr` (`id`,`zy`,`mr_zp`,`mr_jj`,`name`,`xb`) VALUES 
 (1,'运动员','/upload/famous_images/Qc1yiZGv0I.jpg','','姚明','男'),
 (2,'演员','/upload/famous_images/22NzgZ8rmb.gif','','章子怡','女'),
 (3,'运动员','/upload/famous_images/6RTh4bJfRI.jpg','','易建联','男'),
 (4,'运动员',NULL,'','郭晶晶','女'),
 (5,'运动员',NULL,'','刘翔','男'),
 (6,'演员',NULL,'','李连杰','男'),
 (7,'演员',NULL,'','赵薇','女'),
 (8,'演员',NULL,'','范冰冰','女'),
 (9,'演员','/upload/famous_images/ttU4NA0fzN.jpg','','周迅','女'),
 (10,'演员',NULL,'','李冰冰','女'),
 (11,'演员',NULL,'','孙俪','女'),
 (12,'演员',NULL,'','巩俐','女'),
 (13,'演员',NULL,'','葛优','男'),
 (14,'运动员',NULL,'','张怡宁','女'),
 (15,'演员',NULL,'','赵本山','男'),
 (16,'演员',NULL,'','黄晓明','男'),
 (17,'运动员',NULL,'','林丹','男'),
 (18,'导演',NULL,'','张艺谋','男'),
 (19,'演员',NULL,'','张国立','男'),
 (20,'运动员',NULL,'','王励勤','男'),
 (21,'歌手',NULL,'','张靓颖','女'),
 (22,'演员',NULL,'','徐静蕾','女'),
 (23,'钢琴家',NULL,'','郎朗','男'),
 (24,'演员',NULL,'','陈坤','男'),
 (25,'相声演员',NULL,'','郭德纲','男'),
 (26,'歌手',NULL,'','李宇春','女'),
 (27,'运动员',NULL,'','王皓','男'),
 (28,'演员',NULL,'','陈好','女'),
 (29,'演员',NULL,'','濮存昕','男'),
 (30,'运动员',NULL,'','马琳','男'),
 (31,'运动员',NULL,'','杨威','男'),
 (32,'歌手',NULL,'','刘欢','男'),
 (33,'导演',NULL,'','冯小刚','男'),
 (34,'演员',NULL,'','陈宝国','男'),
 (35,'演员',NULL,'','蒋雯丽','女'),
 (36,'钢琴家',NULL,'','李云迪','男'),
 (37,'运动员',NULL,'','邹凯','男'),
 (38,'演员',NULL,'','邓超','男'),
 (39,'演员',NULL,'','黄圣依','女'),
 (40,'演员',NULL,'','黎明','男'),
 (41,'主持人',NULL,'','李湘','女'),
 (42,'演员',NULL,'','刘烨','男'),
 (43,'演员',NULL,'','刘亦菲','女'),
 (44,'演员',NULL,'','陈道明','男'),
 (45,'演员',NULL,'','孙红雷','男'),
 (46,'演员',NULL,'','王宝强','男'),
 (47,'演员',NULL,'','张涵予','男'),
 (48,'运动员',NULL,'','王楠','女'),
 (49,'主持人',NULL,'','何炅','男'),
 (50,'主持人',NULL,'','谢娜','女'),
 (51,'教练员',NULL,'','李永波','男'),
 (52,'导演',NULL,'','陈凯歌','男'),
 (53,'演员',NULL,'','张静初','女'),
 (54,'演员',NULL,'','佟大为','男'),
 (55,'演员',NULL,'','张丰毅','男'),
 (56,'演员',NULL,'','袁泉','女'),
 (57,'演员',NULL,'','宋丹丹','女'),
 (58,'运动员',NULL,'','郑洁','女'),
 (59,'运动员',NULL,'','郑智','男'),
 (60,'主持人',NULL,'','杨澜','女'),
 (61,'演员',NULL,'','高圆圆','女'),
 (62,'演员',NULL,'','王刚','男'),
 (63,'演员',NULL,'','陆毅','男'),
 (64,'模特',NULL,'','杜鹃','女'),
 (65,'演员',NULL,'','黄奕','女'),
 (66,'运动员',NULL,'','李小鹏','男'),
 (67,'运动员',NULL,'','陈燮霞','女'),
 (68,'演员',NULL,'','李小璐','女'),
 (69,'演员',NULL,'','范伟','男'),
 (70,'运动员',NULL,'','谢杏芳','女'),
 (71,'运动员',NULL,'','李娜','女'),
 (72,'主持人',NULL,'','陈鲁豫','男'),
 (73,'演员',NULL,'','姚晨','女'),
 (74,'作家',NULL,'','于丹','女'),
 (75,'演员',NULL,'','胡军','男'),
 (76,'演员',NULL,'','冯远征','男'),
 (77,'音乐人',NULL,'','张亚东','男'),
 (78,'演员',NULL,'','宋佳','女'),
 (79,'运动员',NULL,'','吴敏霞','女'),
 (80,'运动员',NULL,'','梁文冲','男'),
 (81,'主持人',NULL,'','汪涵','男'),
 (82,'演员',NULL,'','郭涛','男'),
 (83,'歌手',NULL,'','陈楚生','男'),
 (84,'歌手',NULL,'','许巍','男'),
 (86,'运动员',NULL,'','杜丽','女'),
 (88,'作家',NULL,'','郭敬明','男'),
 (89,'演员',NULL,'','张雨绮','女'),
 (90,'演员',NULL,'','李小冉','女'),
 (91,'演员',NULL,'','陈建斌','男'),
 (92,'演员',NULL,'','张一山','男'),
 (93,'收藏家',NULL,'','马未都','男'),
 (94,'导演',NULL,'','贾樟柯','男'),
 (95,'导演',NULL,'','李少红','女'),
 (96,'歌手',NULL,'','韩庚','男'),
 (97,'运动员',NULL,'','仲满','男'),
 (98,'运动员',NULL,'','郭晓冬','男'),
 (99,'导演',NULL,'','高希希','男'),
 (100,'演员',NULL,'','陈数','女'),
 (101,'演员',NULL,'','李欣汝','女'),
 (102,'演员',NULL,'','柳云龙','男'),
 (103,'演员',NULL,'','夏雨','男'),
 (104,'演员',NULL,'','李幼斌','男'),
 (105,'运动员',NULL,'','孙继海','男'),
 (106,'歌手',NULL,'','羽泉','男'),
 (107,'作家',NULL,'','易中天','男'),
 (108,'运动员',NULL,'','丁俊晖','男'),
 (109,'演奏组合',NULL,'','女子十二乐坊','女'),
 (110,'歌手',NULL,'','何洁','女'),
 (111,'运动员',NULL,'','邵佳一','男'),
 (112,'演员',NULL,'','梅婷','女'),
 (113,'舞蹈演员',NULL,'','谭元元','女'),
 (114,'歌唱组合',NULL,'','花儿乐队','男'),
 (115,'主持人',NULL,'','黄健翔','男'),
 (116,'演员',NULL,'','汤唯','女'),
 (117,'歌手',NULL,'','周笔畅','女'),
 (118,'演员',NULL,'','黄磊','男'),
 (119,'导演',NULL,'','姜文','男'),
 (120,'演员',NULL,'','蒋勤勤','女'),
 (121,'模特',NULL,'','裴蓓','女'),
 (122,'作家',NULL,'','王朔','男'),
 (123,'运动员',NULL,'','董方卓','男'),
 (124,'作家',NULL,'','韩寒','男'),
 (125,'演员',NULL,'','徐峥','男'),
 (126,'作家',NULL,'','张牧野','男'),
 (127,'演员',NULL,'','刘嘉玲','女'),
 (128,'演员',NULL,'','张铁林','男'),
 (129,'演员',NULL,'','胡歌','男'),
 (130,'演员',NULL,'','王姬','女'),
 (131,'演员',NULL,'','陶虹','女'),
 (132,'运动员',NULL,'','古力','男'),
 (133,'演员',NULL,'','徐帆','女'),
 (134,'歌手',NULL,'','阿朵','女'),
 (135,'歌手',NULL,'','满文军','男'),
 (136,'选秀',NULL,'','蒲巴甲','男'),
 (137,'运动员',NULL,'','李金羽','男'),
 (138,'演员',NULL,'','于娜','女'),
 (139,'模特',NULL,'','姜培琳','女'),
 (140,'主持人',NULL,'','刘仪伟','男'),
 (141,'歌手',NULL,'','张含韵','女'),
 (142,'主持人',NULL,'','李霞','女'),
 (143,'歌手',NULL,'','韩雪','女'),
 (144,'歌手',NULL,'','薛之谦','男'),
 (145,'歌手',NULL,'','林依轮','男'),
 (146,'歌手',NULL,'','爱戴','女'),
 (147,'运动员',NULL,'','张连伟','男'),
 (148,'运动员',NULL,'','常昊','男'),
 (149,'歌手',NULL,'','谭维维','女'),
 (150,'选秀',NULL,'','吴建飞','男'),
 (151,'演员',NULL,'','喻恩泰','男'),
 (152,'主持人',NULL,'','戴军','男'),
 (153,'作家',NULL,'','余华','男'),
 (154,'出版人',NULL,'','洪晃','男'),
 (155,'主持人',NULL,'','李静','女'),
 (156,'主持人',NULL,'','李彬','男'),
 (157,'歌手',NULL,'','韩红','女'),
 (158,'歌手',NULL,'','庞龙','男'),
 (159,'运动员',NULL,'','田亮','男'),
 (160,'演员',NULL,'','刘晓庆','女'),
 (161,'歌手',NULL,'','杨坤','男'),
 (162,'演员',NULL,'','胡兵','男'),
 (163,'歌手',NULL,'','王蓉','女'),
 (164,'歌手',NULL,'','香香','女'),
 (165,'歌手',NULL,'','水木年华','男'),
 (166,'演员',NULL,'','瞿颖','女'),
 (167,'演员',NULL,'','陈佩斯','男'),
 (168,'演员',NULL,'','倪萍','女'),
 (169,'演员',NULL,'','何冰','男'),
 (170,'运动员',NULL,'','罗雪娟','女'),
 (171,'运动员',NULL,'','李婷/孙甜甜','女'),
 (172,'主持人',NULL,'','李咏','男'),
 (173,'歌手',NULL,'','黄征','男'),
 (174,'导演',NULL,'','顾长卫','男'),
 (175,'导演',NULL,'','孟京辉','男'),
 (176,'模特',NULL,'','李学庆','男'),
 (177,'模特',NULL,'','春晓','女'),
 (178,'歌手',NULL,'','王菲','女'),
 (179,'歌手',NULL,'','刀郎','男'),
 (180,'歌手',NULL,'','朴树','男'),
 (181,'歌手',NULL,'','沙宝亮','男'),
 (182,NULL,NULL,NULL,NULL,NULL),
 (183,'歌手',NULL,'','陈琳','女'),
 (184,'演员',NULL,'','董洁','女'),
 (185,'歌手',NULL,'','孙悦','女'),
 (186,'舞蹈演员',NULL,'','杨丽萍','女'),
 (187,'运动员',NULL,'','郝海东','男'),
 (188,'演员',NULL,'','李亚鹏','男'),
 (189,'演员',NULL,'','宁静','女'),
 (190,'歌手',NULL,'','胡彦斌','男'),
 (191,'演员',NULL,'','斯琴高娃','女'),
 (192,'演员',NULL,'','赵文卓','男'),
 (193,'音乐人',NULL,'','三宝','男'),
 (194,'教练',NULL,'','陈忠和','男'),
 (195,'作家',NULL,'','余秋雨','男'),
 (196,'导演',NULL,'','陆川','男'),
 (197,'演员',NULL,'','黄海冰','男'),
 (198,'模特',NULL,'','王雯琴','女'),
 (199,'模特',NULL,'','佟晨洁','女'),
 (200,'主持人',NULL,'','朱军','男'),
 (201,'演讲',NULL,'','汪中求','男'),
 (202,'作家',NULL,'','海岩','男'),
 (203,'歌手',NULL,'','那英','女'),
 (204,'运动员',NULL,'','王治郅','男'),
 (205,'运动员',NULL,'','李铁','男'),
 (206,'运动员',NULL,'','巴特尔','男'),
 (207,'演员',NULL,'','唐国强','男'),
 (208,'歌唱组合',NULL,'','零点乐队','男'),
 (209,'演员',NULL,'','杨恭如','女'),
 (210,'运动员',NULL,'','张玉宁','男'),
 (211,'演员',NULL,'','王志文','男'),
 (212,'歌手',NULL,'','老狼','男'),
 (213,'音乐人',NULL,'','崔健','男'),
 (214,'导演',NULL,'','英达','男'),
 (215,'歌手',NULL,'','雪村','男'),
 (216,'导演',NULL,'','赵宝刚','男'),
 (217,'舞蹈演员',NULL,'','黄豆豆','男'),
 (218,'模特',NULL,'','吕燕','女'),
 (219,'演员',NULL,'','吕丽萍','女'),
 (220,'作家',NULL,'','池莉','女'),
 (221,'运动员',NULL,'','申雪/赵宏博','男'),
 (222,'运动员',NULL,'','赵蕊蕊','女'),
 (223,'作家',NULL,'','洪昭光','男'),
 (224,'记者',NULL,'','闾丘露薇','女'),
 (225,'作家',NULL,'','刘震云','男'),
 (226,'作家',NULL,'','徐小平','男'),
 (227,'歌手',NULL,'','孙楠','男'),
 (228,'模特',NULL,'','姜培林','女'),
 (229,'演员',NULL,'','孙海英','男'),
 (230,'歌手',NULL,'','郑钧','男'),
 (231,NULL,NULL,NULL,NULL,NULL),
 (232,'运动员',NULL,'','郑洁、晏紫','女'),
 (233,'导演',NULL,'','张纪中','男');
/*!40000 ALTER TABLE `fb_mr` ENABLE KEYS */;


--
-- Definition of table `fb_mrb`
--

DROP TABLE IF EXISTS `fb_mrb`;
CREATE TABLE `fb_mrb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(256) DEFAULT NULL,
  `publish_year` int(11) DEFAULT NULL COMMENT '榜单年份',
  `unit` varchar(20) NOT NULL DEFAULT '亿人民币',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='˰';

--
-- Dumping data for table `fb_mrb`
--

/*!40000 ALTER TABLE `fb_mrb` DISABLE KEYS */;
INSERT INTO `fb_mrb` (`id`,`year`,`publish_year`,`unit`) VALUES 
 (9,'2004年名人榜',2004,'亿人民币'),
 (10,'2005年名人榜',2005,'亿人民币'),
 (11,'2006年名人榜',2006,'亿人民币'),
 (12,'2007年名人榜',2007,'亿人民币'),
 (13,'2008年名人榜',2008,'亿人民币'),
 (14,'2009年名人榜',2009,'亿人民币');
/*!40000 ALTER TABLE `fb_mrb` ENABLE KEYS */;


--
-- Definition of table `fb_mrbd`
--

DROP TABLE IF EXISTS `fb_mrbd`;
CREATE TABLE `fb_mrbd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pm` int(10) unsigned DEFAULT NULL COMMENT '综合排名',
  `sr` float DEFAULT NULL COMMENT '收入',
  `bgl` float DEFAULT NULL COMMENT '曝光率',
  `sbly` text COMMENT '上榜理由',
  `zp` varchar(255) DEFAULT NULL COMMENT '照片',
  `bd_id` int(11) DEFAULT NULL,
  `mr_id` int(10) unsigned DEFAULT NULL COMMENT '名人ID',
  `sr_pm` int(10) unsigned DEFAULT NULL COMMENT '收入排名',
  `bgl_pm` int(10) unsigned DEFAULT NULL COMMENT '曝光率排名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_2` (`bd_id`,`mr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fb_mrbd`
--

/*!40000 ALTER TABLE `fb_mrbd` DISABLE KEYS */;
INSERT INTO `fb_mrbd` (`id`,`pm`,`sr`,`bgl`,`sbly`,`zp`,`bd_id`,`mr_id`,`sr_pm`,`bgl_pm`) VALUES 
 (2,1,12000,0,'<p>为众多国际品牌代言，在众星云集的NBA中也是炙手可热。</p>',NULL,9,1,13,257),
 (3,2,2600,0,'<p>总能与大牌导演合作，也为可口可乐等国际品牌看好</p>',NULL,9,2,45,271),
 (4,3,1900,0,'<p>去年有4部电影上映，又马不停蹄地新拍了4部。</p>',NULL,9,7,69,272),
 (5,4,2800,0,'<p>推出新专辑《将爱》后在香港的8场演唱会场场爆满，再次证明&ldquo;歌坛天后&rdquo;的实力。</p>',NULL,9,178,40,273),
 (6,5,2800,0,'<p>《周渔的火车》上演后又接拍两部法国电影。</p>',NULL,9,12,39,274),
 (7,6,1800,0,'<p>除了电影《十面埋伏》，今年还接拍了长城润滑油等4部广告片。</p>',NULL,9,18,77,275),
 (8,7,1200,0,'<p>&quot;俏黄蓉&quot;配音遭非议，新专辑却热卖。</p>',NULL,9,9,129,276),
 (9,8,6600,0,'<p>香港的广告天王，今年拍了3部电影。</p>',NULL,9,40,18,277),
 (11,9,2400,0,'<p>因演唱影视剧主题歌走红，全年演出超过100场。</p>',NULL,9,227,52,278),
 (12,10,14000,0,'<p>好莱坞的中国明星，为国内品牌代言也价格不菲。</p>',NULL,9,6,9,279),
 (13,11,4000,0,'<p>拍戏不多，但为浪琴、SKII等高档品牌代言。</p>',NULL,9,127,25,280),
 (14,12,2000,0,'<p>最忙碌的女歌手，平安夜演唱会使她的身价一路飙升。</p>',NULL,9,157,60,270),
 (15,13,1500,0,'<p>影视演员出身的偶像明星，现在还向歌坛发展。</p>',NULL,9,63,97,269),
 (16,14,2000,0,'<p>内地最成功的音乐组合，去年发行新专辑《没你不行》，举办两次个人演唱会。</p>',NULL,9,106,61,268),
 (17,15,1000,0,'<p>在英超联赛中站住脚，未来的身价还会上升。</p>',NULL,9,105,166,258),
 (18,16,1000,0,'<p>主演中国版《欲望城市》使她的演出场次减少，但并不影响其歌坛的地位。</p>',NULL,9,203,169,259),
 (19,17,1600,0,'<p>去年靠违约金拿到200万美元</p>',NULL,9,204,87,260),
 (20,18,1100,0,'<p>电视剧《刘老根》系列让人们知道赵本山不仅仅会演小品。</p>',NULL,9,15,154,261),
 (21,19,1300,0,'<p>电影《手机》再次证明，有了葛优，票房就有了保证。</p>',NULL,9,13,112,262),
 (22,20,900,0,'<p>去年出任李宁公司在英国的代言人。</p>',NULL,9,205,203,263),
 (23,21,1700,0,'<p>电视剧片酬最高的男演员，去年与香港众多影帝共动出演《无间道III》。</p>',NULL,9,44,82,264),
 (24,22,840,0,'<p>《理发师》的退出不样该《天地英雄》中的光芒。</p>',NULL,9,119,225,265),
 (25,23,1000,0,'<p>内地出场费最高的音乐人。《嫁给刘欢》使其知名度锦上添花。</p>',NULL,9,32,174,266),
 (26,24,960,0,'<p>幸运地拿到NBA总决赛冠军戒指，并迎来国内广告代言。</p>',NULL,9,206,189,267),
 (27,25,880,0,'<p>自编自导自演《我和爸爸》，由她自导自演的第二部电影也已经开拍。</p>',NULL,9,22,211,281),
 (28,26,980,0,'<p>去年一口气主演了8部影视据，是内地人气上升最快的男演员。</p>',NULL,9,42,182,282),
 (29,27,980,0,'<p>在冯小刚的贺岁片《手机》中担任重要角色，从古装剧转型。</p>',NULL,9,8,183,296),
 (30,28,990,0,'<p>模特出身的胡兵今年共拍了100集电视剧。</p>',NULL,9,162,181,297),
 (31,29,1200,0,'<p>影视剧形象多变，广告代言也是种类多样。</p>',NULL,9,207,124,298),
 (32,30,850,0,'<p>蹿升最快的男歌手，4场夏日巡演与陈琳组成&ldquo;双子星&rdquo;。</p>',NULL,9,161,223,299),
 (33,31,900,0,'<p>连年推出新专辑，是时尚音乐代表人物。</p>',NULL,9,183,204,300),
 (34,32,1800,0,'<p>内地演出场面最火爆的摇滚乐队。</p>',NULL,9,208,72,301),
 (35,33,770,0,'<p>既能导又能演的影视大腕。</p>',NULL,9,19,243,302),
 (36,34,690,0,'<p>电视剧《天一生水》中身兼监制、编剧、导演、主演四职，还出版了自己的散文集和唱片</p>',NULL,9,118,277,303),
 (37,35,560,0,'<p>《我把青春献给你》和他的贺岁片一样受到关注。</p>',NULL,9,33,341,304),
 (38,36,540,0,'<p>迅速接下了3部影片、2个广告片，&ldquo;刘晓庆&rdquo;这个品牌依然很有市场。</p>',NULL,9,160,355,305),
 (39,37,970,0,'<p>无论电影还是电视剧，都是绝对的男主角。</p>',NULL,9,75,188,295),
 (40,38,650,0,'<p>电影《和你在一起》以150万美元卖给美国发行商米高梅。</p>',NULL,9,52,296,294),
 (41,39,670,0,'<p>影视歌三栖明星，广告价位居高不下。</p>',NULL,9,166,287,293),
 (42,40,600,0,'<p>频繁出席各种公益活动，一度的广告明星，但去年收入有减。</p>',NULL,9,29,318,283),
 (43,41,850,0,'<p>中国影视界的常青树，片约不断。</p>',NULL,9,191,222,284),
 (44,42,680,0,'<p>广告代言收入是她做主持人收入的5倍。</p>',NULL,9,41,278,285),
 (45,43,450,0,'<p>&ldquo;中国第一前锋&rdquo;也是国内&ldquo;第一年薪&rdquo;。</p>',NULL,9,187,406,286),
 (46,44,600,0,'<p>主演《金粉世家》，今年仍将有多部电视剧上演。</p>',NULL,9,24,317,287),
 (47,45,630,0,'<p>出生在上海的港星，为拍戏常往返香港和内地。</p>',NULL,9,209,308,288),
 (48,46,380,0,'<p>帮助上海申花夺得末代甲A冠军，去年的最受欢迎</p>',NULL,9,210,445,289),
 (49,47,550,0,'<p>与冯小刚是最佳夫妻拍档。</p>',NULL,9,133,346,290),
 (50,48,500,0,'<p>&ldquo;皇阿玛&rdquo;去年不再演皇帝，却仍在多个广告中穿龙袍</p>',NULL,9,128,371,291),
 (51,49,540,0,'<p>《芬妮的微笑》让他上了法庭，《美人依旧》让他倍受期待。</p>',NULL,9,211,356,292),
 (52,50,470,0,'<p>校园民谣的代表人物，去年担任了凤凰卫视《走出非洲》的外景主持。</p>',NULL,9,212,393,306),
 (53,51,480,0,'<p>中国摇滚教父，在国际上也有一定的影响力，发起的&ldquo;真唱运动&rdquo;已渐成气侯。</p>',NULL,9,213,387,256),
 (54,52,490,0,'<p>先后与郭富城、杨紫琼和任贤齐合作，努力成为新一代女打星。</p>',NULL,9,10,383,206),
 (55,53,590,0,'<p>出演中国版的《欲望城市》，广告商用她来打动成熟女性。</p>',NULL,9,35,325,220),
 (56,54,420,0,'<p>著名作家也瞄准了影视圈。</p>',NULL,9,195,430,221),
 (57,55,760,0,'<p>代言美国&ldquo;美神莱&rdquo;钻石的一笔收入是普通模特拍广告收入的10多倍。</p>','',9,228,249,222),
 (58,56,350,0,'<p>延续了&ldquo;石光荣&rdquo;的知名度，与吕丽萍是最知名的银屏伉俪。</p>','',9,229,468,223),
 (59,57,310,0,'<p>《白桦树》后沉寂4年，去年终于推出新专辑《生如夏花》。</p>','',9,180,484,224),
 (60,58,380,0,'<p>新专辑《我们的生活》因翻唱老歌引来非议。</p>','',9,230,443,225),
 (61,59,500,0,'<p>海岩电视剧《玉观音》的播出使她一夜成名。</p>','',9,11,376,226),
 (62,60,400,0,'<p>光头形象出演电视剧《白银谷》付出不小代价。</p>','',9,189,440,227),
 (63,61,470,0,'<p>陈好：《粉红女郎》中的&ldquo;万人迷&rdquo;，随着该剧在全国热播，广告费一路见涨。</p>','',9,28,396,228),
 (64,62,330,0,'<p>&ldquo;海岩电视剧&rdquo;捧红一班影视明星，自己的书也跟着畅销。</p>','',9,202,476,229),
 (65,63,200,0,'<p>主演《射雕》并为《黑客帝国》配音，自导自演《海滩》反响平平。</p>','',9,188,552,219),
 (66,64,500,0,'<p>情景喜剧导演，还是电视节目主持人。</p>','',9,214,375,218),
 (67,65,270,0,'<p>靠网络成名，是歌手中的另类。</p>','',9,215,516,217),
 (68,66,480,0,'<p>一度是海岩的御用导演，身价不菲。</p>','',9,216,386,207),
 (69,67,550,0,'<p>大型舞剧中频繁的国际合作，让黄豆豆的身价迅速跃上了国际标准。</p>','',9,217,351,208),
 (70,68,320,0,'<p>　频繁和大牌明星合作，走的是当年章子怡走红的路线。</p>','',9,184,478,209),
 (71,69,270,0,'<p>创作的影视音乐作品捧红诸多歌手，自己的知名度也在提升。</p>','',9,193,513,210),
 (72,70,300,0,'<p>《还珠3》捧红的女明星。拍戏不多，却被广告商看好。</p>','',9,65,494,211),
 (73,71,360,0,'<p>　田亮：去年的比赛成绩不理想，仍然是运动员中的广告明星。</p>','',9,159,451,212),
 (74,72,260,0,'<p>活跃于校园的创作型歌手。</p>','',9,84,520,213),
 (75,73,290,0,'<p>创作型歌手，音乐界的后起之秀，号称&ldquo;小天王&rdquo;。</p>','',9,190,502,214),
 (76,74,130,0,'<p>没拿到一个世界冠军，却是国内唯一收入超过百万的棋手。</p>','',9,148,592,215),
 (77,75,320,0,'<p>被称为中国&ldquo;首席娱记&rdquo;曾登上美国《时代周刊》。</p>','',9,142,482,216),
 (78,76,230,0,'<p>一部《心相约》发行量超过30万，带来了60万的收入。</p>','',9,72,533,230),
 (79,77,440,0,'<p>&quot;丑模&quot;今年代言了贝纳通和欧莱雅。</p>','',9,218,412,231),
 (80,78,230,0,'<p>已成名多年的女演员现在仍活跃于银屏。</p>','',9,219,534,245),
 (81,79,300,0,'<p>国内最著名也是最繁忙的音乐制作人，王菲等多位歌手的成功都离不开他。</p>','',9,77,496,246),
 (82,80,320,0,'<p>中国最高产的女作家之一。签约世纪英雄后，又一个&ldquo;女海岩&rdquo;诞生了。</p>','',9,220,480,247),
 (83,81,270,0,'<p>运动员出身的电视剧明星。</p>','',9,131,517,248),
 (84,82,330,0,'<p>为了打造中国&ldquo;第一美男&rdquo;的品牌，经纪公司已经做好了头两年亏本的打算。</p>','',9,176,473,249),
 (85,83,190,0,'<p>健胜苑国际乒乓球巡回大奖赛的一项冠军便拿到了6万美元奖金。</p>','',9,20,562,250),
 (86,84,180,0,'<p>去年接连夺得世锦赛和世界杯的冠军。</p>','',9,48,569,251),
 (87,85,160,0,'<p>夺得世界杯冠军世界乒联排名第一的男选手。</p>','',9,30,580,252),
 (88,86,200,0,'<p>在世锦赛和世界花样滑冰大奖赛等国际赛事中共夺得4项冠军</p>','',9,221,559,253),
 (89,87,180,0,'<p>中国女排夺冠的主力，美丽的形象深入人心。</p>','',9,222,566,254),
 (90,88,200,0,'<p>《周渔的火车》后和巩俐的诽闻让人忽略了他的演技。</p>','',9,45,553,244),
 (91,89,240,0,'<p>由歌手转型的主持人，活跃于《非常访问》等5个电视栏目。</p>','',9,152,530,243),
 (92,90,160,0,'<p>参加世界田径黄金联赛成绩不俗，并为耐克和可口可乐做代言。</p>','',9,5,576,242),
 (93,91,200,0,'<p>去年因海岩剧《玉观音》而成名。</p>','',9,54,555,232),
 (94,92,220,0,'<p>拿到新加坡和中国高尔夫球公开赛冠军，但与亚巡赛奖金王还是失之交臂。</p>','',9,147,538,233),
 (95,93,210,0,'<p>同时担任4个电视栏目的主持人。</p>','',9,140,544,234),
 (96,94,160,0,'<p>17岁的大男孩，一部《幻城》就卖出了100万本。</p>','',9,88,577,235),
 (97,95,170,0,'<p>著名心血管专家，健康知识讲座和书记都广受欢迎。</p>','',9,223,572,236),
 (98,96,100,0,'<p>因报道伊拉克战争而一举成名的战地记者，战争结束即出版《我已出发》。</p>','',9,224,600,237),
 (99,97,120,0,'<p>在电影《手机》全国放映的一个月时间里，刘震云的同名小说就卖出了22万册。</p>','',9,225,596,238),
 (100,98,140,0,'<p>所有心血花在大型舞剧&ldquo;云南映像&rdquo;，不惜把广告代言的收入也投进去。</p>','',9,186,590,239),
 (101,99,100,0,'<p>在《幸运52》和《非常6＋1》中和观众一起娱乐。</p>','',9,172,601,240),
 (102,100,100,0,'<p>随着新书《骑驴找马》和《图穷对话录》的热销，徐小平的咨询、演讲业务都在同步升值</p>','',9,226,602,241),
 (103,1,15000,0,'<p>众多国际品牌在身，又代言麦当劳、豪雅表。</p>','',10,1,8,255),
 (104,2,3500,0,'<p>《十面埋伏》《2046》的女主角再接《艺妓回忆录》。</p>','',10,2,31,307),
 (105,3,2300,0,'<p>最受瞩目的奥运明星，雅典归来身价猛增。</p>','',10,5,55,359),
 (106,4,1500,0,'<p>人气最旺的女演员推出第二张专辑，让人刮目相看。</p>','',10,7,98,373),
 (107,5,2200,0,'<p>&ldquo;菲比寻常&rdquo;去年巡演7场。</p>','',10,178,56,374),
 (108,6,1500,0,'<p>《十面埋伏》继续领跑2004华语电影票房。</p>','',10,18,96,375),
 (109,7,1200,0,'<p>从不错过情人节档期的电影女主角。</p>','',10,9,131,376),
 (110,8,1600,0,'<p>圣诞夜演唱会显示了他在内地歌坛的实力。</p>','',10,227,85,377),
 (111,9,4500,0,'<p>集众多国际品牌代言于一身，重返电视荧屏。</p>','',10,127,22,378),
 (112,10,1200,0,'<p>投身华纳唱片，影视剧女主角也想唱唱歌。</p>','',10,8,132,379),
 (113,11,1500,0,'<p>偶像小生不缺人气，缺少力作</p>','',10,63,95,380),
 (114,12,2000,0,'<p>片约不断，仍活跃在国际影坛</p>','',10,12,64,381),
 (115,13,1200,0,'<p>名不见经传的西域歌手一夜成名</p>','',10,179,133,382),
 (116,14,1200,0,'<p>演而忧则唱，新专辑全面&ldquo;渗透&rdquo;</p>','',10,24,134,372),
 (117,15,1200,0,'<p>《天下无贼》中的配角依然夺目</p>','',10,13,135,371),
 (118,16,1100,0,'<p>&ldquo;跳水王子&rdquo;陷入商业漩涡</p>','',10,159,145,370),
 (119,17,1000,0,'<p>坐拥两枚奥运金牌，多个代言收入囊中</p>','',10,4,170,360),
 (120,18,900,0,'<p>《天下无贼》又让冯氏贺岁片名利双收</p>','',10,33,202,361),
 (121,19,1300,0,'<p>《马大帅1》热播，《马大帅2》有戏</p>','',10,15,110,362),
 (122,20,1100,0,'<p>机遇颇佳的男演员去年进军好莱坞</p>','',10,42,156,363),
 (123,21,1300,0,'<p>从康熙到纪晓岚，张国立成了收视率的保证</p>','',10,19,115,364),
 (124,22,10000,0,'<p>60场中国民乐演出风靡日本、美国、东南亚</p>','',10,109,14,365),
 (125,23,1100,0,'<p>华语歌坛最卖座的组合在沈阳、北京举办了两场个唱</p>','',10,106,149,366),
 (126,24,1800,0,'<p>《中国式离婚》又展演技</p>','',10,44,71,367),
 (127,25,1100,0,'<p>完成专辑《感动》的录制，演出繁忙</p>','',10,157,147,368),
 (129,26,1100,0,'<p>实力派歌手为摩托罗拉代言</p>','',10,180,144,369),
 (130,NULL,NULL,NULL,NULL,NULL,NULL,NULL,606,3),
 (131,27,1000,0,'<p>《啼笑姻缘》和《双响炮》中的角色风格迥异</p>','',10,162,177,383),
 (132,28,850,0,'<p>出演《飞鹰》和《天下无贼》，开始走性感路线</p>','',10,10,217,384),
 (133,29,900,0,'<p>缺乏新作但身价看涨，开始进军影视圈</p>','',10,161,205,398),
 (134,30,1000,0,'<p>自导自演《一个陌生女人的来信》，捧回国际大奖</p>','',10,22,173,399),
 (135,31,970,0,'<p>电视剧中的女主角接替赵薇代言欧泊莱</p>','',10,120,187,400),
 (136,32,950,0,'<p>转投华娱新东家，又迎来&ldquo;钻石婚姻&rdquo;</p>','',10,41,190,401),
 (137,33,1100,0,'<p>主演《天龙八部》和《康定情歌》，是屏目中的&ldquo;硬汉&rdquo;</p>','',10,75,155,402),
 (138,34,900,0,'<p>&ldquo;中国太阳&rdquo;代言了网络游戏</p>','',10,105,206,403),
 (139,35,730,0,'<p>影视、代言接连不断，话剧舞台也少不了她</p>','',10,160,259,404),
 (140,36,1100,0,'<p>十余个广告代言种类繁多</p>','',10,128,152,405),
 (141,37,1100,0,'<p>电视剧中频频登场，公益和商业广告接二连三</p>','',10,133,153,406),
 (142,38,700,0,'<p>《欢歌2004》个人演唱会上一展歌喉</p>','',10,32,276,407),
 (143,39,1500,0,'<p>58集历史剧《汉武大帝》展示了他的表演功力</p>','',10,34,93,397),
 (144,40,510,0,'<p>内地歌坛上升最快的男歌手</p>','',10,181,370,396),
 (145,41,700,0,'<p>老歌手需要突破，2005推出新专辑</p>','',10,183,275,395),
 (146,42,650,0,'<p>《一个陌生女人的来信》和《大清风云》哄的表现不俗</p>','',10,119,299,385),
 (147,43,790,0,'<p>主持、拍戏、唱歌、广告代言一个都不能少</p>','',10,166,237,386),
 (148,44,580,0,'<p>&ldquo;小燕子&rdquo;变身王琦瑶，主演《长恨歌》</p>','',10,65,327,387),
 (149,45,760,0,'<p>公益、商业两不误</p>','',10,29,246,388),
 (150,46,800,0,'<p>曾经的主持人，去年连接了7部电视剧</p>','',10,62,230,389),
 (151,47,760,0,'<p>电视剧中的&ldquo;小家碧玉&rdquo;，颇有观众缘</p>','',10,184,248,390),
 (152,48,650,0,'<p>领衔《红粉世家》，坐牢电视剧女主角</p>','',10,11,301,391),
 (153,49,550,0,'<p>《双响炮》又让万人迷火了一把</p>','',10,28,345,392),
 (154,50,560,0,'<p>蛰伏两年之后推出了新作《她和她们》</p>','',10,185,342,393),
 (155,51,730,0,'<p>从《康定情歌》到《公主复仇记》，陶虹渐&ldquo;红&rdquo;</p>','',10,131,262,394),
 (156,52,810,0,'<p>大型舞剧&ldquo;云南印象&rdquo;去年巡演200场，迎来了收获的季节</p>','',10,186,228,408),
 (157,53,550,0,'<p>《中国式离婚》热播，成熟女人形象收到广告商青睐</p>','',10,35,350,358),
 (158,54,800,0,'<p>6个栏目，100多场活动让她马不停蹄</p>','',10,142,234,308),
 (159,55,350,0,'<p>35岁的中国第一前锋踏上英甲之旅</p>','',10,187,465,322),
 (160,56,350,0,'<p>接戏不多，但&ldquo;鹏菲恋&rdquo;让他频频曝光</p>','',10,188,461,323),
 (161,57,500,0,'<p>加盟《马大帅2》，牵手赵本山</p>','',10,189,372,324),
 (162,58,480,0,'<p>走出&ldquo;王语嫣&rdquo;，又成&ldquo;小龙女&rdquo;，内地版金庸剧红人</p>','',10,43,390,325),
 (163,59,360,0,'<p>两枚奥运金牌能让代言物超所值</p>','',10,14,454,326),
 (164,60,360,0,'<p>能到能演，才华横溢，去年签约华谊兄弟</p>','',10,118,452,327),
 (165,61,550,0,'<p>迅速走红的一线小生又演《神雕侠侣》中的杨过</p>','',10,16,347,328),
 (166,62,350,0,'<p>奥运网球冠军为联想、肯德基和非常可乐代言</p>','',10,171,466,329),
 (167,63,410,0,'<p>&ldquo;小天王&rdquo;的第三张专辑依然热销，全年演出在100场以上</p>','',10,190,433,330),
 (168,64,550,0,'<p>赵本山的老搭档，《马大帅2》继续装疯卖傻</p>','',10,69,352,331),
 (169,65,400,0,'<p>水中奇葩直指2008</p>','',10,NULL,436,321),
 (170,66,580,0,'<p>历经无数经典之后，在《青花》中的反串值得期待</p>','',10,191,329,320),
 (171,67,780,0,'<p>名模变主持，魅力不减</p>','',10,139,240,319),
 (172,65,400,0,'<p>水中奇葩直指2008</p>','',10,170,435,309),
 (173,68,640,0,'<p>无论影视剧还是广告片，出镜就是铮铮铁汉</p>','',10,45,303,310),
 (174,69,530,0,'<p>文武兼备的男演员《七剑》中显身手</p>','',10,192,360,311),
 (175,70,290,0,'<p>娱乐节目主持人唱起《栀子花开》</p>','',10,49,504,312),
 (176,71,410,0,'<p>《云南印象》中的编曲有开个人音乐会</p>','',10,193,434,313),
 (177,72,720,0,'<p>《东方夜谭》中玩起脱口秀</p>','',10,140,264,314),
 (178,73,260,0,'<p>奥运女双冠军人气不减</p>','',10,48,524,315),
 (179,74,250,0,'<p>中国队冲击世界杯功亏一篑，惟其表现可圈可点</p>','',10,111,526,316),
 (180,75,290,0,'<p>可口可乐选中奥运会男双冠军</p>','',10,30,500,317),
 (181,76,200,0,'<p>中国女排再创辉煌的当家人喜欢《笑对人生》</p>','',10,194,551,318),
 (182,77,310,0,'<p>《我不是黄蓉》一个月卖出12万张，跻身一线</p>','',10,163,487,332),
 (183,78,360,0,'<p>360集的《绝对隐私》共有10个故事可拍</p>','',10,95,455,333),
 (184,79,340,0,'<p>新书《借我一生》招来非议，旧作版权收入颇丰</p>','',10,195,471,347),
 (185,80,150,0,'<p>以72胜22负战绩在围棋选手中独占鳌头</p>','',10,132,586,348),
 (186,81,120,0,'<p>先夺希腊公开赛冠军，后失雅典奥运最重金牌</p>','',10,27,595,349),
 (187,82,300,0,'<p>新人出道，脚踏影视歌三栖</p>','',10,146,497,350),
 (188,83,200,0,'<p>一部《可可西里》让年轻的陆川声名鹊起</p>','',10,196,548,351),
 (189,84,500,0,'<p>武侠剧中侠骨与柔肠并重的&ldquo;古装王子&rdquo;</p>','',10,197,374,352),
 (190,85,450,0,'<p>中国&ldquo;老虎&rdquo;被邀奥古斯塔大师赛</p>','',10,147,407,353),
 (191,86,460,0,'<p>大陆名模去年再次登上《ELLE》封面</p>','',10,198,398,354),
 (192,87,180,0,'<p>中国围棋的领军人物尚缺一个世界冠军</p>','',10,148,567,355),
 (193,88,270,0,'<p>唱歌、演戏都火不过主持《超级访问》</p>','',10,152,511,356),
 (194,89,400,0,'<p>访谈节目主持人与康师傅方便面&ldquo;有约&rdquo;</p>','',10,72,441,346),
 (195,90,150,0,'<p>歌曲独有的人文气息使他们成为校园音乐的代表</p>','',10,165,589,345),
 (196,91,220,0,'<p>百步穿杨，射落雅典奥运会一金</p>','',10,86,535,344),
 (197,92,250,0,'<p>青春派小说&ldquo;掌门人&rdquo;推出《岛》系列</p>','',10,88,528,334),
 (198,93,150,0,'<p>激情演绎《宋氏王朝》</p>','',10,221,583,335),
 (199,94,350,0,'<p>成为欧莱雅新收购品牌&ldquo;小护士&rdquo;的代言人</p>','',10,199,462,336),
 (200,95,120,0,'<p>《艺术人生》继续&ldquo;煽情&rdquo;，趁热打铁出新书</p>','',10,200,593,337),
 (201,96,340,0,'<p>《细节决定成功》的畅销带来110场演讲</p>','',10,201,469,338),
 (202,97,120,0,'<p>《幸运52》与《非常6+1》都继续火爆</p>','',10,172,594,339),
 (203,98,150,0,'<p>去年有三部电视剧、两部话剧和观众见面</p>','',10,130,588,340),
 (204,99,100,0,'<p>走出《三重门》，《长安乱》仍然有读者</p>','',10,124,599,341),
 (205,100,160,0,'<p>新书旧作均被看好，各种版本让读者眼花缭乱</p>','',10,202,578,342),
 (206,1,17000,0,'<p>与火箭续约5年，新合同总价值超过7600万美元</p>','',11,1,5,343),
 (207,2,1900,0,'<p>《如果&middot;爱》中尝试歌舞剧，代言MOTO等品牌</p>','',11,9,66,357),
 (208,3,3600,0,'<p>走国际路线，通过《夜宴》重归国内市场</p>','',11,2,29,205),
 (209,4,1300,0,'<p>影视歌全面收获，出道多年人气不减</p>','',11,7,114,53),
 (210,5,2600,0,'<p>赛场内跑出12个冠军，赛场外广告代言不断</p>','',11,5,44,67),
 (211,6,1000,0,'<p>超女冠军，连接5个代言，又成太合麦田力捧新人</p>','',11,26,167,68),
 (212,7,1700,0,'<p>影视歌全面出击，广告代言步步升级</p>','',11,8,79,69),
 (213,8,1500,0,'<p>大制作《无极》国内上映两个月，票房突破2亿</p>','',11,52,94,70),
 (214,9,1600,0,'<p>推出新专辑，反响不及翻唱《神话》主题曲</p>','',11,227,88,71),
 (215,10,1300,0,'<p>当红女星去年缺少力作，但广告代言仍然丰收</p>','',11,10,116,72),
 (216,11,2800,0,'<p>《一江春水》热播，代言收入丰厚</p>','',11,127,38,73),
 (217,12,1100,0,'<p>电影《夜宴》投资1.5亿，冯导首次尝试古装武侠片</p>','',11,33,158,74),
 (218,13,3800,0,'<p>连续主演两部美国大片，作为国际巨星的表现值得期待</p>','',11,12,27,75),
 (219,14,880,0,'<p>当家小生缺少影视力作，写真文集和唱片专辑相继推出</p>','',11,63,209,76),
 (220,15,900,0,'<p>&ldquo;马大帅&rdquo;玩足球，东北喜剧明星分身乏术</p>','',11,15,208,66),
 (221,16,990,0,'<p>影视歌当红小生，去年主演《云水谣》和《理发师》</p>','',11,24,180,65),
 (222,17,850,0,'<p>又一个电视剧当红演员出了新专辑</p>','',11,28,219,64),
 (223,18,800,0,'<p>影视剧缺少新作，但&ldquo;老徐的博客&rdquo;拔得新浪博客头筹</p>','',11,22,232,54),
 (224,19,810,0,'<p>多才多艺的主持人，演出和商业活动都安排得满满当当</p>','',11,49,229,55),
 (225,20,720,0,'<p>国际国内赛事频频夺冠，女子跳水一枝独秀</p>','',11,4,265,56),
 (226,21,750,0,'<p>第5张新专辑的人气不如一首《神话》火热</p>','',11,157,254,57),
 (227,22,1800,0,'<p>前后两手脍炙人口的歌曲靠彩铃和铃声下载让他名声鹊起</p>','',11,158,73,58),
 (228,23,750,0,'<p>年初与英超曼城续约，年末重回首发阵容</p>','',11,105,252,59),
 (229,24,1700,0,'<p>片酬最高的男影星电视和广告代言一个接一个</p>','',11,44,81,60),
 (230,25,620,0,'<p>音乐话剧《琥珀》中又演又唱</p>','',11,42,311,61),
 (231,26,550,0,'<p>与高仓健合作《千里走单骑》之后，又将在新片中与巩俐牵手</p>','',11,18,348,62),
 (232,27,1000,0,'<p>接戏少而精，《夜宴》中继续联手冯小刚</p>','',11,13,172,63),
 (233,28,1400,0,'<p>活力四射的青春乐队，新专辑和彩铃歌曲一并&ldquo;喜唰唰&rdquo;</p>','',11,114,104,77),
 (234,29,790,0,'<p>电视女演员推出新专辑，广告代言增多</p>','',11,65,239,78),
 (235,30,1200,0,'<p>电视剧持续高产，自导自演，全家上阵</p>','',11,19,125,92),
 (236,31,12000,0,'<p>《2005丝绸之旅音乐会》热销，2006年计划全球巡演300场</p>','',11,109,12,93),
 (237,32,1100,0,'<p>影视新作鲜有上映，以好主妇形象在电视广告中频频亮相</p>','',11,35,157,94),
 (238,33,700,0,'<p>离开国家队的跳水王子依然受到广告商青睐</p>','',11,159,274,95),
 (239,34,730,0,'<p>最受欢迎的歌唱组合，新专辑《三十》销售成绩不错</p>','',11,106,260,96),
 (240,35,1300,0,'<p>实力派男演员连续出演古装戏</p>','',11,34,111,97),
 (241,36,660,0,'<p>拍戏、代言、歌舞剧，老明星重返娱乐圈风头不减当年</p>','',11,160,288,98),
 (242,37,350,0,'<p>未进&ldquo;超女前三&rdquo;，但承揽了不少广告代言</p>','',11,110,460,99),
 (243,38,980,0,'<p>无论电视剧和广告代言，总离不了&ldquo;皇上&rdquo;形象</p>','',11,128,184,100),
 (244,39,770,0,'<p>公益代言明星也被众多商业代言看中</p>','',11,29,242,101),
 (245,40,610,0,'<p>从小品、电视剧到电影，逐渐树立了自己的表演风格</p>','',11,69,315,91),
 (246,41,650,0,'<p>与台湾两大女星先后合作，实力歌手今年不寂寞</p>','',11,161,294,90),
 (247,42,860,0,'<p>先出单曲，后拍电影，全面进军日本市场</p>','',11,162,215,89),
 (248,43,630,0,'<p>创作性女歌手借助网络人气上升</p>','',11,163,307,79),
 (249,44,440,0,'<p>影视新人借&ldquo;星女郎&rdquo;成名，接戏拍片马不停蹄</p>','',11,39,410,80),
 (250,45,220,0,'<p>唱功一流的&ldquo;超级女声&rdquo;，商业活动相对低调</p>','',11,117,536,81),
 (251,46,440,0,'<p>《独自等待》之后，与袁泉共跳《上海伦巴》</p>','',11,103,411,82),
 (252,47,710,0,'<p>实力派男星今年新拍影视剧不多，广告代言更少</p>','',11,75,270,83),
 (253,48,660,0,'<p>靠一首网络歌曲《猪之歌》迅速蹿红</p>','',11,164,289,84),
 (254,49,450,0,'<p>电视剧女演员首次参加电影《霍元甲》</p>','',11,11,404,85),
 (255,50,680,0,'<p>电视剧档期排满，偶尔客串主持</p>','',11,62,281,86),
 (256,51,450,0,'<p>内地艺人首签日本索尼，影视红人进军歌坛</p>','',11,43,403,87),
 (257,52,570,0,'<p>内地出演40集《大汉天子3》，巩固古装一线小生地位</p>','',11,16,335,88),
 (258,53,520,0,'<p>与丰田杯失之交臂，但首获奖金40万美元的应氏杯冠军</p>','',11,148,363,102),
 (259,54,360,0,'<p>《青红》女主角走上戛纳红地毯</p>','',11,61,458,52),
 (260,55,170,0,'<p>牵手华谊兄弟和华友世纪，超女季军前景看好</p>','',11,21,574,16),
 (261,56,820,0,'<p>最忙碌的女主持人，全年主持近800期电视节目</p>','',11,142,226,17),
 (262,57,570,0,'<p>带有校园气息的歌唱组合，人气继续上身但缺少力作</p>','',11,165,336,18),
 (263,58,420,0,'<p>德乙影子杀手年未屡建奇功，续约前景看好</p>','',11,111,428,19),
 (264,59,310,0,'<p>状态神勇，接连夺冠，年终世界排名第一</p>','',11,20,492,20),
 (265,60,440,0,'<p>一出话剧、一部电视剧、一张新专辑</p>','',11,166,413,21),
 (266,61,360,0,'<p>湖南卫视金牌女主持，超级女声中的表现是个亮点</p>','',11,41,457,22),
 (267,62,320,0,'<p>《孔雀》之后迅速走红，两部新片主攻海外市场</p>','',11,53,479,23),
 (268,63,260,0,'<p>囊括国际、国内重大赛事冠军，女乒新领军人物名副其实</p>','',11,14,518,24),
 (269,64,430,0,'<p>去年改编小说《无极》，今年还可能主持节目</p>','',11,88,420,25),
 (270,65,510,0,'<p>&ldquo;中国老虎&rdquo;追随伍兹出任别克代言人</p>','',11,147,369,26),
 (271,66,480,0,'<p>颇为勤奋的老歌手在演技方面有所突破</p>','',11,145,388,15),
 (272,67,350,0,'<p>荧屏硬汉的感情戏同样让人叫好</p>','',11,45,467,14),
 (273,68,310,0,'<p>去年只在中央大戏《乔家大院》中出演了女主角</p>','',11,120,489,13),
 (274,69,400,0,'<p>自导自演舞台剧《舞台》，全国巡演50场</p>','',11,167,438,5),
 (275,70,370,0,'<p>影视剧新作不断，代言瞄准中老年市场</p>','',11,168,447,6),
 (276,71,220,0,'<p>乖乖女代言&ldquo;蒙牛&rdquo;，去年&ldquo;超女&rdquo;今年走红</p>','',11,141,541,7),
 (277,72,330,0,'<p>连夺中国公开赛和英国锦标赛冠军，18岁中国少年创台球神话</p>','',11,108,474,8),
 (278,73,560,0,'<p>主持脱口秀和综艺节目，广告代言仍和美食有关</p>','',11,140,339,9),
 (279,74,170,0,'<p>羽坛&ldquo;超级丹&rdquo;战绩不俗，代言肯德基</p>','',11,17,573,11),
 (280,75,280,0,'<p>演罢音乐话剧《琥珀》，又高唱《电影之歌》</p>','',11,56,509,12),
 (281,76,170,0,'<p>出道十年，北京演唱会又唱起青春之歌</p>','',11,84,570,4),
 (282,77,520,0,'<p>成熟沉稳的实力男演员被广告商看好</p>','',11,55,364,10),
 (283,78,470,0,'<p>勤奋的话剧演员从&ldquo;小人物&rdquo;熬成影视剧男一号</p>','',11,169,395,27),
 (284,79,370,0,'<p>写书、赛车、博客、唱歌，一个都不能少</p>','',11,124,449,28),
 (285,80,180,0,'<p>安利纽崔莱看中了中国篮球的未来之星</p>','',11,3,565,41),
 (286,81,200,0,'<p>奥运蛙后首接广告，为飘柔洗发水代言</p>','',11,170,557,42),
 (287,82,210,0,'<p>奥运金牌组合仍需要更多的冠军去证明自己的实力</p>','',11,171,546,43),
 (288,83,190,0,'<p>性感女歌手当起了主持人，表现可圈可点</p>','',11,146,560,44),
 (289,NULL,NULL,NULL,NULL,NULL,NULL,NULL,607,2),
 (290,84,150,0,'<p>主持人颇有人气，《梦想中国》不比《超级女声》</p>','',11,172,587,45),
 (291,85,210,0,'<p>创作型男歌手专辑和代言都有新表现</p>','',11,173,545,46),
 (292,86,410,0,'<p>访谈节目主持人每年都有新代言</p>','',11,72,432,47),
 (293,87,270,0,'<p>著名主持人访问《天下女人》，《杨澜访谈录》接连出书</p>','',11,60,510,48),
 (294,88,200,0,'<p>处女作《孔雀》让他声名鹊起，在柏林捧回银熊奖</p>','',11,174,550,49),
 (295,89,360,0,'<p>常常客串主持人，但走秀依然是这位名模的主要收入来源</p>','',11,139,453,50),
 (296,90,230,0,'<p>英俊小生凭借《仙剑奇侠传》成为年轻人的新偶像</p>','',11,129,532,40),
 (297,91,100,0,'<p>独揽国内四大冠军头衔，与世界冠军一步之遥</p>','',11,132,603,39),
 (298,92,220,0,'<p>先锋话剧导演的《琥珀》《魔山》均获市场肯定</p>','',11,175,537,29),
 (299,93,290,0,'<p>北京、上海、湖北、江苏7个栏目转不停</p>','',11,152,506,30),
 (300,94,260,0,'<p>风情万种的土家族女歌手代言了手机和网游</p>','',11,134,519,31),
 (301,95,100,0,'<p>长篇力作《兄弟》大卖，拉动10年前旧作热销</p>','',11,153,604,32),
 (302,96,180,0,'<p>《超级访问》和《情感方程式》两个王牌之后，又有新栏目</p>','',11,155,568,33),
 (303,97,210,0,'<p>&quot;中国首席男模&quot;得到了价格不菲的影视合同</p>','',11,176,543,34),
 (304,98,100,0,'<p>人气正升的新名模即将转行做歌手</p>','',11,177,605,35),
 (305,99,130,0,'<p>成功主持超级女声节目，和超女们一起红遍全国</p>','',11,81,591,36),
 (306,100,150,0,'<p>中国首位接连登《Vogue》中文版和法文版封面的女模特</p>','',11,64,582,37),
 (307,1,26000,0,'<p>受伤的&ldquo;小巨人&rdquo;身负总值7600万美元的NBA合同和众多国际品牌代言。</p>','',12,1,3,38),
 (308,2,5800,0,'<p>中国飞人12.88破世界记录，广告代言接连升级。</p>','',12,5,19,51),
 (309,3,3500,0,'<p>《黄金甲》惹得满城争议，票房收入不菲。</p>','',12,18,30,103),
 (310,4,1800,0,'<p>国际影星吃老本，赴美读书无新作。</p>','',12,2,75,155),
 (311,5,4600,0,'<p>《迈阿密风云》、《黄金甲》接连上映，星光闪耀海内外。</p>','',12,12,21,169),
 (312,6,2300,0,'<p>新晋金马影后，出演《明明》，代言升级。</p>','',12,9,54,170),
 (313,7,1900,0,'<p>影星明星代言品牌众多，也是奢侈品牌商业活动的常客。</p>','',12,8,68,171),
 (314,8,1300,0,'<p>两场个人演唱会，多个重量级代言，&ldquo;人气王&rdquo;当之无愧。</p>','',12,26,113,172),
 (315,9,1800,0,'<p>博客出书带动广告代言，出演《伤城》、《刺马》。</p>','',12,22,74,173),
 (316,10,2500,0,'<p>未拍新作，广告代言活动依然不断。</p>','',12,127,49,174),
 (317,11,1200,0,'<p>尝试战争片《集结号》，代言M&amp;M巧克力。</p>','',12,33,127,175),
 (318,12,1400,0,'<p>连夺澳网、温网冠军，第一对晋级WTA一级赛事决赛的中国组合。</p>','',12,232,103,176),
 (319,13,1700,0,'<p>万宝龙亚洲新代言人，出演杜琪峰新作。</p>','',12,10,78,177),
 (320,14,1200,0,'<p>二人转走进大会堂，电影、电视让本山分身乏术。</p>','',12,15,126,178),
 (321,15,950,0,'<p>连出3张专辑，海豚公主开启音乐之旅。</p>','',12,21,191,168),
 (322,16,2400,0,'<p>荧幕硬汉再演《集结号》，广告代言又上台阶。</p>','',12,75,51,167),
 (323,17,1150,0,'<p>魅力小生《云水谣》、《门》中表现不俗，推出新专辑。</p>','',12,24,140,166),
 (324,18,2000,0,'<p>实力男星魅力不减，电视剧、广告代言持续不断。</p>','',12,44,62,156),
 (325,19,1350,0,'<p>主演《大敦煌》央视热播，海外发行新专辑。</p>','',12,28,105,157),
 (327,20,1000,0,'<p>影视剧没有新作，广告代言收入颇丰。</p>','',12,13,176,158),
 (328,21,1000,0,'<p>导演电影《第601个电话》、主演《金婚》，新作不多。</p>','',12,19,178,159),
 (329,22,15000,0,'<p>钢琴天才备受众多国际顶级品牌青睐，全球演出超过150场。</p>','',12,23,7,160),
 (330,23,980,0,'<p>&ldquo;发光体&rdquo;何洁专辑、图书、影视、广告多元发展。</p>','',12,110,186,161),
 (331,24,1100,0,'<p>当红男星出演《鹿鼎记》、《新上海滩》，广告价值尚待挖掘。</p>','',12,16,148,162),
 (332,25,930,0,'<p>出演新版《上海滩》、《甜蜜蜜》，备受广告主青睐。</p>','',12,11,198,163),
 (333,26,1000,0,'<p>&ldquo;德云社&rdquo;全年演出160场，相声观众回来了。</p>','',12,25,165,164),
 (334,27,1150,0,'<p>影视作品表现平平，却是商业活动和广告代言的宠儿。</p>','',12,65,137,165),
 (335,28,600,0,'<p>百万代言网络游戏，两张专辑，一部电影。</p>','',12,117,321,179),
 (336,29,880,0,'<p>争议女星麻烦缠身，《武林大会》表现抢眼。</p>','',12,39,210,180),
 (337,30,990,0,'<p>年轻影帝又出单曲，《康熙秘史》、《胡笳岁月》好戏连连。</p>','',12,103,179,194),
 (338,31,2200,0,'<p>影视男星风头正盛，广告代言不断增加。</p>','',12,34,57,195),
 (339,32,900,0,'<p>湖南卫视当家花旦转战北京，广告代言数不胜数。</p>','',12,41,207,196),
 (340,33,720,0,'<p>影、视、话剧分量不足，广告代言不如人意。</p>','',12,42,263,197),
 (341,34,1000,0,'<p>与英超曼城球队又成功续约两年，全新代言华晨骏捷。</p>','',12,105,171,198),
 (342,35,760,0,'<p>多才多艺的主持人出演经典话剧《暗恋桃花源》。</p>','',12,49,250,199),
 (343,36,1000,0,'<p>一部《金婚》50集，好主妇形象深入人心。</p>','',12,35,175,200),
 (344,37,13000,0,'<p>全球巡演50场，十二乐坊掀起民乐演出热潮。</p>','',12,109,11,201),
 (345,38,1600,0,'<p>缺少新代表作品，&ldquo;皇上&rdquo;形象根深蒂固。</p>','',12,128,89,202),
 (346,39,910,0,'<p>出演《尖峰时刻3》，代言欧珀莱、雷达表。</p>','',12,53,200,203),
 (347,40,2600,0,'<p>钢琴王子牵手奔驰，7张专辑全球发行。</p>','',12,36,46,193),
 (348,41,450,0,'<p>北爱尔兰杯正赛夺冠，亚运赛场包揽三项冠军，台球少年签约蒙牛。</p>','',12,108,405,192),
 (349,42,700,0,'<p>金庸武侠剧导演继续翻拍《鹿鼎记》，拍戏之余拍广告。</p>','',12,233,271,191),
 (350,43,480,0,'<p>影视红人日本学习音乐、舞蹈，推出新专辑。</p>','',12,43,389,181),
 (351,44,920,0,'<p>性格男星备受关注，《铁三角》、《天堂口》接踵而至。</p>','',12,45,199,182),
 (352,45,620,0,'<p>清纯女星在电影《宝贝计划》、《男才女貌》中表现不俗。</p>','',12,61,314,183),
 (353,46,720,0,'<p>实力组合举办2场个唱，又推新专辑。</p>','',12,106,266,184),
 (354,47,660,0,'<p>《品三国》卖出130万册，大学教授变身文化名人。</p>','',12,107,290,185),
 (355,48,840,0,'<p>出道多年的影视明星出了新专辑。</p>','',12,112,224,186),
 (356,49,500,0,'<p>成功转会德甲升班马，9次首发，表现尚佳。</p>','',12,111,373,187),
 (357,50,570,0,'<p>当红小生带伤上阵，电影、电视、专辑一个都不少。</p>','',12,129,337,188),
 (358,51,1100,0,'<p>主持电视节目又播广播剧，拍摄电视剧近百集。</p>','',12,62,159,189),
 (359,52,1500,0,'<p>国际超模T台绽放，代言LV、GAP等5大国际品牌。</p>','',12,64,99,190),
 (360,53,420,0,'<p>CBA新星代言安利、伊利和网游《街头篮球》，潜力看好。</p>','',12,3,427,204),
 (361,54,360,0,'<p>连续打进温网8强和德国公开赛4强,世界排名闯入前20。</p>','',12,71,450,154),
 (362,55,790,0,'<p>公益形象推动商业代言，&ldquo;好男人&rdquo;上演《男人底线》。</p>','',12,29,238,104),
 (363,56,1100,0,'<p>实力派女明星全年出演电视剧超过100集。</p>','',12,130,150,118),
 (364,57,680,0,'<p>新晋小生出演电影《集结号》、电视剧《甜蜜蜜》。</p>','',12,38,283,119),
 (365,58,770,0,'<p>接演电视剧超过100集，还演舞台剧。</p>','',12,131,241,120),
 (366,59,540,0,'<p>主演《暗恋桃花源》，阳光形象接拍凯越旅行车广告。</p>','',12,118,358,121),
 (367,60,470,0,'<p>LG杯夺得个人首个世界冠军，收入居国内棋手首席。</p>','',12,132,394,122),
 (368,61,560,0,'<p>明星夫妻，影视和广告搭档默契，人气上升。</p>','',12,91,340,123),
 (369,62,580,0,'<p>影视作品均无力作，广告代言依旧。</p>','',12,133,328,124),
 (370,63,300,0,'<p>足球小将闯荡欧洲，签约曼联，前途无量。</p>','',12,123,498,125),
 (371,64,310,0,'<p>国际乒联职业巡回赛总决赛女单、女双双料冠军，状态稳定。</p>','',12,14,490,126),
 (372,65,570,0,'<p>热辣女歌手能歌善舞，演出火爆。</p>','',12,134,333,127),
 (373,66,160,0,'<p>央视体育名嘴签约凤凰卫视继续战斗。</p>','',12,115,581,117),
 (374,67,650,0,'<p>老歌手换东家出专辑，全年演出超过50场。</p>','',12,135,300,116),
 (375,68,290,0,'<p>话剧、专辑、新书全面出击，精灵女主持掀起娱乐风暴。</p>','',12,50,503,115),
 (377,69,420,0,'<p>好男儿冠军一举成名，片约、广告纷至沓来。</p>','',12,136,425,105),
 (378,70,270,0,'<p>休笔一年的赛车手今年将出2本新作。</p>','',12,124,515,106),
 (379,71,350,0,'<p>狂扫26个联赛进球,中国最佳射手当值无愧。</p>','',12,137,464,107),
 (380,72,290,0,'<p>《琥珀》之后主演话剧《暗恋桃花源》，全国巡演90场。</p>','',12,56,505,108),
 (381,73,280,0,'<p>世界排名第一的乒乓国手，去年战绩平平</p>','',12,20,507,109),
 (382,74,430,0,'<p>模特出身的影视明星发了新专辑。</p>','',12,NULL,418,110),
 (383,74,430,0,'<p>模特出身的影视明星发了新专辑。</p>','',12,NULL,419,111),
 (384,74,430,0,'<p>模特出身的影视明星发了新专辑。</p>','',12,NULL,421,112),
 (385,74,430,0,'<p>模特出身的影视明星发了新专辑。</p>','',12,NULL,423,113),
 (386,74,430,0,'<p>模特出身的影视明星发了新专辑。</p>','',12,138,422,114),
 (387,75,650,0,'<p>T台红人全面发展，影视、主持、写作、代言四面开花</p>','',12,139,297,128),
 (388,76,170,0,'<p>重夺汤姆斯杯的中国领军人物,获得5项公开赛冠军</p>','',12,17,571,129),
 (389,77,540,0,'<p>从上海到北京，综艺主持人最受美食品牌青睐。</p>','',12,140,357,143),
 (390,78,330,0,'<p>湖南卫视人气男主持势头强劲，接代言、发单曲。</p>','',12,81,477,144),
 (391,79,280,0,'<p>乖巧女孩稳步上升，专辑、代言均有收获。</p>','',12,141,508,145),
 (392,80,570,0,'<p>娱乐女主播加盟体育电视杂志《NBA制造》。</p>','',12,142,334,146),
 (393,81,290,0,'<p>电视主持人社会活动频繁，新推电子杂志。</p>','',12,60,501,147),
 (394,82,520,0,'<p>人物访谈《鲁豫有约》全年超过300期，卖到全国27家电视台。</p>','',12,72,367,148),
 (395,83,420,0,'<p>清纯歌手同时出演影视剧，代言FANCL和网游。</p>','',12,143,424,149),
 (396,84,340,0,'<p>2005年&ldquo;我型我秀&rdquo;热门选手至今人气不减。</p>','',12,144,470,150),
 (398,85,460,0,'<p>流行歌手重温旧业，主持《天天饮食》还出《林家食铺》</p>','',12,145,400,151),
 (399,86,270,0,'<p>《舞林大会》秀舞技，年底推出新专辑《万众爱戴》。</p>','',12,146,514,152),
 (400,87,150,0,'<p>《三峡好人》威尼斯得奖，艺术片导演代言中国移动。</p>','',12,94,585,142),
 (401,88,210,0,'<p>《岛》出到第8本，畅销书作家成立文化公司。</p>','',12,88,547,141),
 (402,89,420,0,'<p>高尔夫老将继续征战，中国巡回赛奖金王。</p>','',12,147,429,140),
 (403,90,150,0,'<p>去年杀入三星杯决赛,今年夺冠,仍有春兰杯值得期待。</p>','',12,148,584,130),
 (404,91,180,0,'<p>勇夺多哈亚运会男单冠军，信心提升，前景看好。</p>','',12,27,563,131),
 (405,92,120,0,'<p>新一届超女代表初出茅庐，尚需努力。</p>','',12,149,597,132),
 (406,93,270,0,'<p>好男儿季军进军娱乐圈，还要继续加油！</p>','',12,150,512,133),
 (407,94,310,0,'<p>《武林外传》一举成名，影视、主持、舞台剧应接不暇。</p>','',12,151,491,134),
 (408,95,310,0,'<p>最热门男主持人手握10多个电视栏目的话筒。</p>','',12,152,488,135),
 (409,96,160,0,'<p>《兄弟》（下）继续畅销，老作品一版再版。</p>','',12,153,579,136),
 (410,97,200,0,'<p>杂志出版人热衷当主持、拍电影和写博客，话题不断。</p>','',12,154,554,137),
 (411,98,260,0,'<p>读《论语》谈心得，儒家经典让女教授火了一把。</p>','',12,74,521,138),
 (412,99,260,0,'<p>出杂志、出单曲，当红女主持5个栏目忙不停。</p>','',12,155,522,139),
 (413,100,220,0,'<p>娱乐综艺主持人转战安徽、北京、河北。</p>','',12,156,540,153),
 (414,1,38780,1,'<p>&ldquo;小巨头&rdquo;奥运年风头更劲，收入、曝光率双料冠军。</p>','',13,1,1,409),
 (415,2,16320,3.67,'<p>飞人主场作战备受瞩目，广告收入陡然攀高。</p>','',13,5,6,412),
 (416,3,24000,8.67,'<p>功夫皇帝连演3部电影，又做慈善&ldquo;壹基金&rdquo;。</p>','',13,6,4,418),
 (417,4,2900,7.33,'<p>签约雄鹿征战NBA，商业价值挖掘不够。</p>','',13,3,37,417),
 (418,5,5500,10,'<p>出演大戏《梅兰芳》和《骑士》，央视春晚一展歌喉。</p>','',13,2,20,420),
 (419,6,1950,5,'<p>百变女郎成立工作室，与港片亲密接触。</p>','',13,8,65,413),
 (420,7,1700,11.67,'<p>参演吴宇森巨制《赤壁》，广告缺乏大品牌。</p>','',13,7,80,423),
 (421,8,2500,17.67,'<p>精灵女星演《画皮》，更是顶级品牌活动的常客。</p>','',13,9,48,432),
 (422,9,2050,24.33,'<p>登上封面最多的女星封后华表，重金续约华谊。</p>','',13,10,58,442),
 (423,10,2000,17,'<p>自导自演《乡村爱情2》，推动&ldquo;二人转&rdquo;走出国门。</p>','',13,15,63,430),
 (424,11,3400,31.67,'<p>献声《蓝莓之夜》，力扛好莱坞新片《上海》。</p>','',13,12,32,460),
 (425,12,1420,19.33,'<p>电子杂志《开啦》当主编，才女气质吸引广告代言。</p>','',13,22,101,433),
 (426,13,1570,20,'<p>相声演员投身影视圈，拍摄2部电视剧和1部电影。</p>','',13,25,91,434),
 (427,14,3110,46,'<p>《金婚》收视飘红，主演百集大戏《中国往事》。</p>','',13,19,33,494),
 (428,15,1350,27.67,'<p>实力女歌手2张新专辑，7场个人演唱会，百余场演出。</p>','',13,21,106,449),
 (429,16,1200,24.33,'<p>推出首张专辑《Ming》，当红小生倍受奢侈品牌垂青。</p>','',13,16,130,441),
 (430,17,1300,29.67,'<p>话剧《西望长安》演7场，又将主演冯式电影《贵族》。</p>','',13,13,117,453),
 (431,18,1250,36.67,'<p>&ldquo;超级丹&rdquo;频频夺冠，形象俊朗拿下10个广告。</p>','',13,17,120,469),
 (432,19,1530,44.67,'<p>广告新宠涉足影坛，《金山》有望开启国际舞台。</p>','',13,11,92,486),
 (433,20,1095,31.33,'<p>能歌善舞演出不断，影视剧尚需力作。</p>','',13,39,160,458),
 (434,21,1100,31.67,'<p>老天王重出江湖，领衔《江山美人》、《梅兰芳》。</p>','',13,40,146,463),
 (435,22,8500,66,'<p>新作《贝多芬》全球发行，重量级代言纷至沓来。</p>','',13,23,16,554),
 (436,23,800,21.33,'<p>暂别影坛、潜心准备奥运会开幕式。</p>','',13,18,235,435),
 (437,24,1800,61,'<p>《卧薪尝胆》央视首播，实力演员退居幕后当老板。</p>','',13,44,76,540),
 (438,25,1103,41.67,'<p>女教授改说元曲，将经典文学大众化运动进行到底。</p>','',13,74,143,479),
 (439,26,4030,72.33,'<p>钢琴王子《乐动柏林》，古典市场渐入佳境。</p>','',13,36,24,571),
 (440,27,930,36,'<p>推出全新专辑《我的》，全国5城市巡回演唱人气</p>','',13,26,196,468),
 (441,28,1100,45.67,'<p>&ldquo;三米板女皇&rdquo;受商家热捧，北京奥运冲刺女板六</p>','',13,4,151,491),
 (442,29,2700,74,'<p>全新演绎经典剧《茶馆》和《子夜》，广告代言稳中有升。</p>','',13,34,42,573),
 (443,30,1220,55.67,'<p>《西安事变》延续硬朗风格，《赤壁》赵子龙值得期待。</p>','',13,75,122,520),
 (444,31,940,45,'<p>影视作品缺乏惊喜，形象定位尚需清晰。</p>','',13,42,194,487),
 (445,32,1150,55.33,'<p>《家有儿女》风靡全国，女笑星体会《幸福深处》。</p>','',13,57,139,519),
 (446,33,680,32,'<p>话剧《艳遇》好评如潮，不羁影帝绯闻缠身。</p>','',13,103,280,464),
 (447,34,1800,77,'<p>实力派演员《闯关东》，再创收视热潮。</p>','',13,104,70,580),
 (448,35,1220,64.67,'<p>&ldquo;万人迷&rdquo;离开橙天娱乐，主演《纸醉金迷》，表现尚佳。</p>','',13,28,121,550),
 (449,36,1050,55,'<p>本赛季一次首发三次替补，&ldquo;太阳&rdquo;在曼城地位明显下降</p>','',13,105,162,517),
 (450,37,1020,54,'<p>女主持兼顾北京和湖南两家卫视，成立文化公司投资拍电影。</p>','',13,41,163,511),
 (451,38,860,49.67,'<p>《士兵突击》一夜成名，草根明星登上春晚。</p>','',13,46,214,503),
 (452,39,850,46.67,'<p>坚守话剧舞台，公益形象广受品牌垂青。</p>','',13,29,220,495),
 (453,40,940,60,'<p>实力组合忙演出没有新专辑，拍摄奥运公益广告。</p>','',13,106,195,537),
 (454,41,740,45.67,'<p>倾情出演《奋斗》，《赤壁》中崭露头角。</p>','',13,54,257,490),
 (455,42,730,45,'<p>老教授成金招牌，每本书都很好卖。</p>','',13,107,261,489),
 (456,43,817,54.33,'<p>世锦赛男单冠军，代言收入更上层楼。</p>','',13,20,227,512),
 (457,44,430,5.33,'<p>成绩持续低迷，神奇小子亟需调整。</p>','',13,108,415,414),
 (458,45,650,40,'<p>主演电影《南京！南京！》，代言数量增加。</p>','',13,61,298,476),
 (459,46,490,13,'<p>《集结号》票房突破2.6亿，执导《贵族》重返喜剧电影。</p>','',13,33,381,425),
 (460,47,1650,97.33,'<p>国际名模专注T台，代言活动数不胜数。</p>','',13,64,84,606),
 (461,48,800,60,'<p>夫妻搭档电影《立春》，居家形象受广告商首肯。</p>','',13,35,233,536),
 (462,49,870,64.67,'<p>发行第三张专辑《自己》，勤奋男主持受学生产品商家欣赏。</p>','',13,49,212,549),
 (463,50,430,11,'<p>签约英冠查尔顿，借奥运东风代言阿迪。</p>','',13,59,416,421),
 (464,51,652,47,'<p>奥运夺冠热门选手商业价值被认可。</p>','',13,48,291,497),
 (465,52,1400,90,'<p>时尚古典组合发行《上海》，全球演出70场。</p>','',13,109,102,600),
 (466,53,730,56,'<p>《蒙古人》入围奥斯卡，个性演员潜力无穷。</p>','',13,45,258,522),
 (467,54,710,55,'<p>第二张专辑反响平平，演出却应接不暇。</p>','',13,110,268,518),
 (468,55,670,57.33,'<p>继《玉战士》之后，再次出演跨国合资大片《约翰&middot;拉贝》。</p>','',13,53,285,529),
 (469,56,870,78.33,'<p>知性风格驾轻就熟，女主持出书、代言、电子杂志忙不停。</p>','',13,72,213,584),
 (470,57,650,53.67,'<p>&ldquo;阳光&rdquo;女人经营有道，主持、慈善、商业三不误。</p>','',13,60,295,510),
 (471,58,550,38.33,'<p>新赛季替补出场居多，伤病困扰，前景暗淡。</p>','',13,111,353,472),
 (472,59,625,52.33,'<p>快乐女主持开个唱，代言麦当劳。</p>','',13,50,310,508),
 (473,60,600,49,'<p>严肃大片《梅兰芳》值得期待。</p>','',13,52,320,500),
 (474,61,850,79.67,'<p>《赤壁》中演曹操，形象刚毅代言UPS。</p>','',13,55,218,587),
 (475,62,620,54.33,'<p>情感剧女主角遭遇婚姻挫折。</p>','',13,112,313,514),
 (476,63,1140,98.33,'<p>蜚声海外的芭蕾演员代言劳力士，新作《鹊桥》上海唯美亮相。</p>','',13,113,141,608),
 (477,64,600,52,'<p>率领中国羽毛球队备战奥运，代言欧莱雅等众多品牌。</p>','',13,51,322,507),
 (478,65,680,75,'<p>实力派演员去年无力作，《三国演义》值得期待。</p>','',13,91,284,575),
 (479,66,795,82,'<p>老戏骨主持、广播剧样样精通。</p>','',13,62,236,592),
 (480,67,520,45.67,'<p>郑洁脚伤影响成绩，女双姊妹花缺席诸多赛事。</p>','',13,232,366,492),
 (481,68,640,65.33,'<p>青少年偶像推出《花龄盛会》。</p>','',13,114,304,551),
 (482,69,590,56.33,'<p>新打法有待磨合，广告代言一路高升。</p>','',13,14,326,525),
 (483,70,580,56,'<p>&ldquo;快乐男生&rdquo;走穴马不停蹄，音乐作品尚需努力。</p>','',13,83,330,524),
 (484,71,550,54.33,'<p>商业活动和代言频繁，娱乐明星首度开唱</p>','',13,115,349,515),
 (485,72,200,26.33,'<p>&ldquo;安女郎&rdquo;一炮走红，登上《名利场》封面。</p>','',13,116,558,445),
 (486,73,500,49,'<p>出专辑，忙演出，广告代言表现欠佳。</p>','',13,117,378,501),
 (487,74,634,71,'<p>囊括7场超级赛单打冠军，外形俊俏代言化妆品。</p>','',13,70,305,567),
 (488,75,630,71.67,'<p>儒雅形象演绎经典名剧，文艺气质令代言别具风情。</p>','',13,118,306,569),
 (489,76,310,38.33,'<p>《太阳照常升起》曲高和寡，高傲导演代言全球通。</p>','',13,119,486,473),
 (490,77,600,66.33,'<p>个性女星延续喜剧风格，广告代言纷至沓来。</p>','',13,73,319,556),
 (491,78,310,38.37,'<p>女网一姐伤愈返赛场，世界排名第15。</p>','',13,71,485,474),
 (492,79,651,80.67,'<p>亚巡赛奖金王代言百龄坛。</p>','',13,80,292,590),
 (493,80,610,72.33,'<p>温婉女星出演《四世同堂》，事业家庭双丰收。</p>','',13,120,316,570),
 (494,81,680,87.33,'<p>《甜蜜蜜》、《新上海滩》好评如潮，热播剧导演连拍4部新片。</p>','',13,99,282,598),
 (495,82,330,48.33,'<p>推出专辑《孤独的花朵》，代言汇源果汁、丰田汽车。</p>','',13,56,475,499),
 (496,83,574,67,'<p>6个冠军不负众望，商业代言接二连三。</p>','',13,27,332,560),
 (497,84,532,62.67,'<p>《悲伤逆流成河》销量突破百万，为&ldquo;快乐男声&rdquo;主题曲填词。</p>','',13,88,359,543),
 (498,85,480,56,'<p>青春偶像签约新东家，更进一步尚需力作。</p>','',13,38,392,523),
 (499,86,490,61.67,'<p>签约保利博纳，电视剧演员改拍电影。</p>','',13,65,382,541),
 (500,87,300,45,'<p>清纯女星尝试反面角色，有望借《功夫之王》跻身国际影坛。</p>','',13,43,499,488),
 (501,88,700,98,'<p>担任迪奥春夏时装秀开场模特一鸣惊人。</p>','',13,121,273,607),
 (502,89,200,43,'<p>沉寂6年之后3本新书相继出炉。</p>','',13,122,556,483),
 (503,90,300,46.67,'<p>尚未进入曼联一线阵容，地位略显尴尬。</p>','',13,123,495,496),
 (504,91,400,56.67,'<p>叛逆少年日臻稳重，写书、赛车享受生活。</p>','',13,124,437,528),
 (505,92,556,76.67,'<p>脱口秀主持人出漫画、演话剧、拍电影样样不落。</p>','',13,81,343,579),
 (506,93,360,61,'<p>《闯关东》表现抢眼，多次与实力派男星搭档。</p>','',13,78,456,539),
 (507,94,350,58.67,'<p>艺术片导演受国际影坛认可，也拍商业广告。</p>','',13,94,459,533),
 (508,95,460,66.67,'<p>《大电影2》受好评，签约星皓片约不断。</p>','',13,82,399,559),
 (509,96,260,54.67,'<p>《集结号》中冲出的黑马，精彩表现深入人心。</p>','',13,47,523,516),
 (510,97,495,78.67,'<p>影视演员在话剧《建筑大师》和《吁天》中展现实力。</p>','',13,131,379,585),
 (511,98,310,67.67,'<p>领衔大型话剧《兄弟》，独特风格受认可。</p>','',13,125,483,562),
 (512,99,490,85,'<p>自导自演《功勋》全国热播，魅力男星身陷《血色迷雾》。</p>','',13,102,384,596),
 (513,100,385,95.33,'<p>《鬼吹灯》系列火了一把，衍生品开发赚得钵满盆溢。</p>','',13,126,442,604),
 (514,1,35777,1.33,'<p>&ldquo;第一中锋&rdquo;为中国奥运军团举旗，收入、曝光率6连冠。</p>','',14,1,2,410),
 (515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,608,1),
 (516,2,7800,6.67,'<p>国际巨星为奔驰、香格里拉等大品牌代言。</p>','',14,2,17,416),
 (517,3,3710,5.67,'<p>助中国男篮挺进奥运前八，健康外形代言绿箭。</p>','',14,3,28,415),
 (518,4,3050,11.67,'<p>六连冠完美落幕，跳水女皇事业、爱情双丰收。</p>','',14,4,34,422),
 (519,5,13028,1.67,'<p>折戟奥运影响商业价值，商家信心需佳绩挽回。</p>','',14,5,10,411),
 (520,6,3000,12,'<p>功夫巨星无新作，全心投入&ldquo;壹基金&rdquo;。</p>','',14,6,35,424),
 (521,7,2400,9.67,'<p>电影《赤壁》、《画皮》之后转战小荧幕《一个女人的史诗》。</p>','',14,7,50,419),
 (522,8,2680,13.33,'<p>《胭脂雪》热播，自拍自演第二部电视剧《金大班》。</p>','',14,8,43,426),
 (523,9,2700,16,'<p>3部电影接连上映，演技广受认可。</p>','',14,9,41,429),
 (524,10,2310,27,'<p>金鸡百花封后，广告升级，缺乏影视力作。</p>','',14,10,53,447),
 (525,11,2040,21.67,'<p>罗马故事电影节影后俏丽代言欧珀莱。</p>','',14,11,59,437),
 (526,12,4400,42.33,'<p>担纲《碟海风云》，中年女星地产、家居、家电广告不断。</p>','',14,12,23,482),
 (527,13,1680,29.67,'<p>中年男星犯桃花，两部爱情电影接连上映。</p>','',14,13,83,454),
 (528,14,1345,23,'<p>国球头号女单选手广告激增。</p>','',14,14,108,439),
 (529,15,1900,31,'<p>喜剧之王携爱徒上春晚，《关东大先生》央视首播。</p>','',14,15,67,457),
 (530,16,1590,28,'<p>影视红星转战歌坛，牵手国际大牌。</p>','',14,16,90,451),
 (531,17,1475,31.33,'<p>奥运男单冠军成就大满贯梦想，&ldquo;超级丹&rdquo;成商家金字招牌。</p>','',14,17,100,459),
 (532,18,1000,17.33,'<p>执导奥运开幕式蜚声全球、身价倍增。</p>','',14,18,168,431),
 (533,19,2530,46,'<p>《纪晓岚》梅开四度，&ldquo;反身&rdquo;出演《大搜查》。</p>','',14,19,47,493),
 (534,20,1150,26.67,'<p>失守北京奥运男单冠军，健朗形象受广告商垂青。</p>','',14,20,138,446),
 (535,21,945,24.33,'<p>推出同名新专辑，为电影《画皮》献唱。</p>','',14,21,192,443),
 (536,22,1350,42.33,'<p>新片《新宿事件》将上映，杂志写真代言全面开花。</p>','',14,22,107,481),
 (537,23,9100,68.67,'<p>北京奥运会开幕式的演奏让郎朗名利达到巅峰。</p>','',14,23,15,564),
 (538,24,860,30.67,'<p>《故梦》跨越70年，忧郁男星商业魅力同样非凡。</p>','',14,24,216,456),
 (539,25,1055,41.33,'<p>自编自导自演电视剧《县长老叶》，还主持两档电视节目。</p>','',14,25,161,478),
 (540,26,651,14.33,'<p>《少年中国》受欢迎，线上发行突破百万次。</p>','',14,26,293,427),
 (541,27,765,30,'<p>国际乒联排名第一，代言多个品牌。</p>','',14,27,244,455),
 (542,28,1340,56.67,'<p>《三国演义》饰演貂蝉，广告宠儿发单曲。</p>','',14,28,109,527),
 (543,29,1250,58,'<p>话剧行家出新书、演电视剧，成熟气质吸引众多品牌。</p>','',14,29,119,532),
 (544,30,850,40.67,'<p>摘取奥运男单冠军，巡回赛奖金颇丰。</p>','',14,30,221,477),
 (545,31,760,37.33,'<p>奥运摘得2金1银，体操老将爱情、事业双丰收。</p>','',14,31,247,470),
 (546,32,1200,57.33,'<p>与&ldquo;月光女神&rdquo;同唱奥运主题曲，演出身价陡增。</p>','',14,32,128,530),
 (547,33,560,15,'<p>重归冯式戏剧《非诚勿扰》，票房轻取3亿。</p>','',14,33,338,428),
 (548,34,2910,82,'<p>&ldquo;戏霸&rdquo;义演纪实剧《震撼世界的七日》</p>','',14,34,36,591),
 (549,35,940,49.33,'<p>居家广告女王导演处女作《伞》</p>','',14,35,193,502),
 (550,36,3800,89.67,'<p>潜心欧美演出，发行自传式纪录片《新浪漫主义》。</p>','',14,36,26,599),
 (551,37,1130,59,'<p>初出茅庐的体操小将揽获3枚奥运金牌、5个广告代言。</p>','',14,37,142,534),
 (552,38,644,31.67,'<p>主演新版《倚天屠龙记》受关注，代言中国电信。</p>','',14,38,302,461),
 (553,39,930,54.33,'<p>加盟英皇变身唱片新人，多部电影拍摄中</p>','',14,39,197,513),
 (554,40,600,27.67,'<p>出演中年梅兰芳，老天王在杭州开个唱。</p>','',14,40,323,450),
 (555,41,1185,66,'<p>首次投资小成本电影《十全九美》，票房、口碑兼得。</p>','',14,41,136,553),
 (556,42,700,37.67,'<p>《我们生活的年代》热播，硬汉形象深入人心。</p>','',14,42,272,471),
 (557,43,750,44.33,'<p>凭借《功夫之王》踏入国际影坛，甜美女星出演恐怖片《六层》。</p>','',14,43,253,484),
 (558,44,1600,79.67,'<p>没有大的作品却有10个广告合同代言。</p>','',14,44,86,586),
 (559,45,620,31.67,'<p>《梅兰芳》配角抢眼，电影电视两手抓。</p>','',14,45,312,462),
 (560,46,530,22,'<p>&ldquo;许三多&rdquo;人气不减出自传,影视歌都是本色演出。</p>','',14,46,361,438),
 (561,47,542,27.33,'<p>实力派男星主演《身份的证明》再次火爆。</p>','',14,47,354,448),
 (562,48,520,25.67,'<p>国球领军女将在北京奥运完美谢幕。</p>','',14,48,365,444),
 (563,49,1255,77.33,'<p>快乐主持成为地方台收视率保证，忙里偷闲演电视剧。</p>','',14,49,118,582),
 (564,50,910,63.33,'<p>勤奋女主持出新电影、新唱片、新书。</p>','',14,50,201,545),
 (565,51,745,53,'<p>带领国羽揽三金，金牌教练代言忙。</p>','',14,51,255,509),
 (566,52,500,28.67,'<p>《梅兰芳》惊艳四方，屡获殊荣不忘公益事业。</p>','',14,52,377,452),
 (567,53,800,63.33,'<p>时尚活动座上宾，电影《A面B面》挑战演技。</p>','',14,53,231,546),
 (568,54,528,34.67,'<p>幸福新郎体验《爱情左右》，《赤壁》中展露头角。</p>','',14,54,362,467),
 (569,55,1010,77,'<p>老戏骨《赤壁》中演曹操，广告代言也当仁不让。</p>','',14,55,164,581),
 (570,56,714,57.67,'<p>音乐取得不俗成绩，商业价值逐步被发掘。</p>','',14,56,267,531),
 (571,57,760,64.33,'<p>《马文的战争》受欢迎，拒上春晚起风波</p>','',14,57,245,548),
 (572,58,439,23.33,'<p>温网进4强，刷新中国网球单打在大满贯中的最好成绩。</p>','',14,58,414,440),
 (573,59,460,34.33,'<p>足球先生征战海外成主力。</p>','',14,59,397,466),
 (574,60,710,63,'<p>商业活动马不停蹄，主持、杂志、代言&ldquo;三得利&rdquo;。</p>','',14,60,269,544),
 (575,61,755,67.67,'<p>话剧《哈姆雷特1990》搭档濮存昕和林兆华，演技受肯定。</p>','',14,61,251,561),
 (576,62,980,64,'<p>职业和绅再出山，北京台主持鉴宝、辽宁台讲故事。</p>','',14,62,185,547),
 (577,63,495,42,'<p>《夜幕下的哈尔滨》热播，英俊小生挑战新版诸葛亮。</p>','',14,63,380,480),
 (578,64,1210,96.33,'<p>亚洲超模活跃于T台，姣好面容和身材为众多国际品牌代言。</p>','',14,64,123,605),
 (579,65,590,56.33,'<p>出演电影《十全九美》，上海女星被光明乳业选中</p>','',14,65,324,526),
 (580,66,420,34.33,'<p>新一代体操王子摘3金代言李宁。</p>','',14,66,426,465),
 (581,67,555,59.33,'<p>&ldquo;举&rdquo;起中国奥运首金，代言耐克。</p>','',14,67,344,535),
 (582,68,480,50,'<p>签约华友世纪，唱响《东方美》。</p>','',14,68,391,504),
 (583,69,455,47.33,'<p><strong>离开赵本山的日子，笑星依旧片约不断。</strong></p>','',14,69,401,498),
 (584,70,410,39.67,'<p>奥运羽毛球女单比赛屈居第二，广告代言却有收获。</p>','',14,70,431,475),
 (585,71,255,21.33,'<p>闯进奥运女单前4，全年29胜15负</p>','',14,71,525,436),
 (586,72,740,82.33,'<p>《鲁豫有约》收视率居高不下，女主持兼作制片人。</p>','',14,72,256,593),
 (587,73,670,76,'<p>逐渐摆脱喜剧束缚，出演《荣宝斋》、《天堂凹》。</p>','',14,73,286,577),
 (588,74,445,50,'<p>女教授讲座、商业活动不断，《论语》之后又说《昆曲》。</p>','',14,74,409,505),
 (589,75,580,70,'<p>主演《机器侠》、《苦竹林》，硬汉风格坚持到底。</p>','',14,75,331,566),
 (590,76,518,76.33,'<p>情感剧男主角在《非诚勿扰》中客串同性恋出彩儿。</p>','',14,76,368,578),
 (591,77,490,69.67,'<p>金牌制作人举办首场个人音乐会，推出首张个人专辑。</p>','',14,77,385,565),
 (592,78,450,65.33,'<p>《赤壁》中展风情，《中国往事》受好评。</p>','',14,78,408,552),
 (593,79,320,51,'<p>跳水、拍广告都是郭晶晶的最佳搭档。</p>','',14,79,481,506),
 (594,80,680,94.67,'<p>赛事忙，成绩好，奖金多，代言大牌续约。</p>','',14,80,279,603),
 (595,81,628,91,'<p>《天天向上》出风头，娱乐主持偏爱收藏。</p>','',14,81,309,601),
 (596,82,455,68.33,'<p>坚持喜剧风格，电影一部接一部。</p>','',14,82,402,563),
 (597,83,375,60.33,'<p>和东家天娱闹纠纷，推出新单曲《一个人的冬天》。</p>','',14,83,446,538),
 (598,84,300,56,'<p>创作歌手推出新专辑《爱如少年》。</p>','',14,84,493,521),
 (599,85,165,44.33,'<p>错失首金留遗憾，俏丽形象受青睐。</p>','',14,86,575,485),
 (600,86,239,62.67,'<p>&ldquo;80后&rdquo;畅销书作家转型当高管。</p>','',14,88,531,542),
 (601,87,250,66.67,'<p>&ldquo;星女郎&rdquo;魅力四射，出演《女人不坏》、《少林少女》。</p>','',14,89,527,558),
 (602,88,430,83.67,'<p>电影、电视剧齐头并进，靓丽女星广告价值待开发。</p>','',14,90,417,594),
 (603,89,370,75.67,'<p>实力派男星演曹操，与妻儿一起拍广告。</p>','',14,91,448,576),
 (604,90,400,80,'<p>《家有女儿》走出的&ldquo;童星&rdquo;，主持、电影全面出击。</p>','',14,92,439,588);
INSERT INTO `fb_mrbd` (`id`,`pm`,`sr`,`bgl`,`sbly`,`zp`,`bd_id`,`mr_id`,`sr_pm`,`bgl_pm`) VALUES 
 (605,91,380,80.33,'<p>观复博物馆主讲古董、写收藏风靡全国。</p>','',14,93,444,589),
 (606,92,240,71,'<p>《二十四城记》戛纳首映为地震灾区筹款。</p>','',14,94,529,568),
 (607,93,200,66,'<p>拍摄新版《红楼梦》让第五代女导演成为舆论焦点。</p>','',14,95,549,555),
 (608,94,180,66.33,'<p>韩国归来的偶像歌手在中国大有市场。</p>','',14,96,564,557),
 (609,95,220,74.67,'<p>高挑男运动员为中国男子击剑对赢得第一枚奥运金牌。</p>','',14,97,539,574),
 (610,96,335,84,'<p>八点档电视剧男主角片约不断。</p>','',14,98,472,595),
 (611,97,190,74,'<p>《纸醉金迷》成收视冠军，紧张拍摄新版《三国演义》。</p>','',14,99,561,572),
 (612,98,350,91.67,'<p>实力女星主演张爱玲经典作品《倾城之恋》。</p>','',14,100,463,602),
 (613,99,100,77.67,'<p>丑女&ldquo;林无敌&rdquo;另类走红，签下多芬广告。</p>','',14,101,598,583),
 (614,100,210,87,'<p>《血色迷雾》全国热播，筹备下一步自导自演作品《东风雨》。</p>','',14,102,542,597);
/*!40000 ALTER TABLE `fb_mrbd` ENABLE KEYS */;


--
-- Definition of table `fb_navigation`
--

DROP TABLE IF EXISTS `fb_navigation`;
CREATE TABLE `fb_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `href` varchar(256) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `target` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_navigation`
--

/*!40000 ALTER TABLE `fb_navigation` DISABLE KEYS */;
INSERT INTO `fb_navigation` (`id`,`name`,`href`,`parent_id`,`target`,`type`,`priority`) VALUES 
 (1,'首页','/',0,'_slef','top',NULL),
 (2,'能源重工',NULL,1,'_slef','top',NULL),
 (3,'榜单',NULL,0,'_slef','both',NULL),
 (4,'富豪榜',NULL,3,'_slef','both',NULL),
 (5,'城市榜',NULL,3,'_slef','both',NULL),
 (6,'公司榜',NULL,3,'_slef','both',NULL),
 (7,'体育榜',NULL,3,'_slef','both',NULL),
 (8,'名人榜',NULL,3,'_slef','both',NULL),
 (9,'教育榜',NULL,3,'_slef','both',NULL),
 (10,'富豪',NULL,0,'_slef','both',NULL),
 (11,'富豪榜',NULL,10,'_slef','both',NULL),
 (12,'富豪报道',NULL,10,'_slef','both',NULL),
 (13,'富豪对话',NULL,10,'_slef','both',NULL),
 (14,'图片富豪榜',NULL,10,'_slef','both',NULL),
 (15,'投资','/tz/index.php?id=5',0,'_slef','both',NULL),
 (16,'慈善',NULL,15,'_slef','both',NULL),
 (17,'保险',NULL,15,'_slef','both',NULL),
 (18,'基金',NULL,15,'_slef','both',NULL),
 (19,'股票',NULL,15,'_slef','both',NULL),
 (20,'收藏',NULL,15,'_slef','both',NULL),
 (21,'创业','/tz/index.php?id=2',0,'_slef','both',NULL),
 (22,'创业故事',NULL,21,'_slef','both',NULL),
 (23,'创业投资',NULL,21,'_slef','both',NULL),
 (24,'创业人物',NULL,21,'_slef','both',NULL),
 (25,'商业','/tz/index.php?id=3',0,'_slef','both',NULL),
 (26,'能源重工',NULL,25,'_slef','both',NULL),
 (27,'汽车',NULL,25,'_slef','both',NULL),
 (28,'快速消费品',NULL,25,'_slef','both',NULL),
 (29,'健康产业',NULL,25,'_slef','both',NULL),
 (30,'房产',NULL,25,'_slef','both',NULL),
 (31,'物流零售',NULL,25,'_slef','both',NULL),
 (32,'金融',NULL,25,'_slef','both',NULL),
 (33,'3C',NULL,25,'_slef','both',NULL),
 (34,'文化媒体',NULL,25,'_slef','both',NULL),
 (35,'旅游酒店',NULL,25,'_slef','both',NULL),
 (36,'领导力',NULL,25,'_slef','both',NULL),
 (37,'职场',NULL,25,'_slef','both',NULL),
 (38,'科技','/tz/index.php?id=4',0,'_slef','both',NULL),
 (39,'创新',NULL,38,'_slef','both',NULL),
 (40,'能源',NULL,38,'_slef','both',NULL),
 (41,'生物',NULL,38,'_slef','both',NULL),
 (42,'医药',NULL,38,'_slef','both',NULL),
 (43,'TNT',NULL,38,'_slef','both',NULL),
 (44,'城市',NULL,0,'_slef','both',NULL),
 (45,'城市报道',NULL,44,'_slef','both',NULL),
 (46,'城市资料',NULL,44,'_slef','both',NULL),
 (47,'城市活动',NULL,44,'_slef','both',NULL),
 (48,'城市列表',NULL,44,'_slef','both',NULL),
 (49,'城市特辑',NULL,44,'_slef','both',NULL),
 (50,'城市评论',NULL,44,'_slef','both',NULL),
 (51,'奢华',NULL,0,'_slef','both',NULL),
 (52,'奢侈品',NULL,51,'_slef','both',NULL),
 (53,'旅游',NULL,51,'_slef','both',NULL),
 (54,'社交圈',NULL,51,'_slef','both',NULL),
 (55,'礼仪课堂',NULL,51,'_slef','both',NULL),
 (56,'专栏',NULL,0,'_slef','both',NULL),
 (57,'特约记者',NULL,56,'_slef','both',NULL),
 (58,'记者专栏',NULL,56,'_slef','both',NULL),
 (59,'增长俱乐部',NULL,0,'_slef','bottom',NULL),
 (60,'创业创富',NULL,59,'_slef','both',NULL),
 (61,'公司/产业研究报告',NULL,59,'_slef','both',NULL),
 (62,'投融资行业分析报告',NULL,59,'_slef','both',NULL),
 (63,'VC/PE/投资人数据库',NULL,59,'_slef','both',NULL),
 (64,'项目创业者数据库',NULL,59,'_slef','both',NULL),
 (65,'会员俱乐部',NULL,0,'_slef','bottom',NULL),
 (66,'会员俱乐部介绍',NULL,65,'_slef','both',NULL),
 (67,'读者调查',NULL,65,'_slef','both',NULL),
 (68,'申请赠阅',NULL,65,'_slef','both',NULL),
 (69,'会员公告',NULL,65,'_slef','both',NULL),
 (70,'读者来函',NULL,65,'_slef','both',NULL),
 (71,'礼品兑换',NULL,65,'_slef','both',NULL);
/*!40000 ALTER TABLE `fb_navigation` ENABLE KEYS */;


--
-- Definition of table `fb_news`
--

DROP TABLE IF EXISTS `fb_news`;
CREATE TABLE `fb_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT '新闻类别ID',
  `priority` int(11) DEFAULT '100' COMMENT '优先级',
  `click_count` int(11) DEFAULT '0' COMMENT '点击次数',
  `is_adopt` int(11) DEFAULT '0' COMMENT '是否发布',
  `forbbide_copy` int(11) DEFAULT NULL COMMENT '禁止复制',
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
  `image_flag` int(10) unsigned DEFAULT '0' COMMENT '是否是图片新闻',
  `video_flag` int(10) unsigned DEFAULT '0' COMMENT '是否是视频新闻',
  `video_src` varchar(255) DEFAULT NULL COMMENT '视频地址',
  `language_tag` int(11) DEFAULT '0',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `related_news` varchar(100) DEFAULT NULL COMMENT '相关新闻ID，记录相关新闻的id，使用，分割',
  `pdf_src` varchar(255) DEFAULT NULL COMMENT 'pdf源文件',
  `ad_id` int(11) DEFAULT NULL,
  `sub_headline` varchar(100) DEFAULT NULL COMMENT '子头条',
  `wap_title` varchar(256) DEFAULT NULL COMMENT 'wap标题',
  `author_id` int(11) DEFAULT NULL,
  `author_type` int(10) unsigned DEFAULT NULL COMMENT '1',
  `author_image` varchar(255) DEFAULT NULL,
  `top_info` text COMMENT '头信息',
  `set_up` int(10) unsigned DEFAULT '0' COMMENT '是否置顶',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`created_at`),
  KEY `Index_3` (`category_id`,`is_adopt`),
  KEY `Index_5` (`tags`),
  KEY `Index_6` (`is_adopt`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_news`
--

/*!40000 ALTER TABLE `fb_news` DISABLE KEYS */;
INSERT INTO `fb_news` (`id`,`category_id`,`priority`,`click_count`,`is_adopt`,`forbbide_copy`,`tags`,`title`,`short_title`,`description`,`content`,`created_at`,`last_edited_at`,`publisher`,`keywords`,`news_type`,`file_name`,`target_url`,`photo_src`,`video_photo_src`,`image_flag`,`video_flag`,`video_src`,`language_tag`,`author`,`related_news`,`pdf_src`,`ad_id`,`sub_headline`,`wap_title`,`author_id`,`author_type`,`author_image`,`top_info`,`set_up`) VALUES 
 (3,2,100,0,1,NULL,NULL,'2','2	 ','<p>\r\n	21</p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none\">\r\n	 </div>\r\n','<p>\r\n	21</p>\r\n','2010-02-26 17:50:26','2010-03-19 18:32:20',NULL,'121','1',NULL,'','',NULL,0,0,NULL,0,'hoho','3',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,0),
 (9,6,100,0,1,NULL,NULL,'Toyota Hybrid Horror Hoax','Toyota Hybrid Horror',NULL,'<p>\r\n	On the very day <b>Toyota</b> was <a href=\"http://www.washingtonpost.com/wp-dyn/content/article/2010/03/08/AR2010030804944.html\"><font color=\"#003399\">making a high-profile defense</font></a> of its cars, one of them was speeding out of control,\" said <b>CBS</b> News--and a vast number of other media outlets worldwide. The driver of a 2008 <b>Toyota</b> Prius, James Sikes, called 911 to say his accelerator was stuck, he was zooming faster than 90 miles per hour and absolutely couldn\\\"t slow down.</p>\r\n<p>\r\n	It got far more dramatic, though. The California Highway Patrol responded and \"To get the runaway car to stop, they actually had to put their patrol car in front of the Prius and step on the brakes.\" During over 20 harrowing minutes, according to NBC\\\"s report, Sikes \"did everything he could to try to slow down that Prius.\" Others said, \"Radio traffic indicated the driver was unable to turn off the engine or shift the car into neutral.\"</p>\r\n','2010-03-17 14:04:29','2010-03-17 14:41:07',NULL,NULL,'1',NULL,NULL,NULL,NULL,0,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
 (15,6,100,0,1,NULL,NULL,'意大利国家电力拟将绿色业务上市 ','意大利国家电力拟将绿色业务上市 ','<p>\r\n	大利国家电力公司(Enel)昨日透露了可再生能源子公司上市，融资130亿欧元（合177亿美元）的计划。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	意大利国家电力公司(Enel)昨日透露了可再生能源子公司上市，融资130亿欧元（合177亿美元）的计划。</p>\r\n<p>\r\n	Enel Green Power (EGP)少数股权的首次公开发行(IPO)，可能成为2008年夏季金融危机爆发以来欧洲规模最大的IPO。</p>\r\n<p>\r\n	Enel首席执行官富尔维奥•孔蒂(Fulvio Conti)表示，未来几周，公司将举行一场“选美比赛”，甄选顾问，并计划在4月发布招股说明书，以在年底前完成股票发售。公司将在意大利和西班牙两地同时上市。</p>\r\n<p>\r\n	然而，Enel也在继续与“战略投资者”谈判，包括来自北非和波斯湾的主权财富基金及有政府背景的公司，商讨由其收购EGP部分股权以支持IPO的可能性。</p>\r\n<p>\r\n	孔蒂表示，他希望在6月前就协议达成共识。与此同时，Enel将股息减半，并制定了削减资本支出以减少负债的计划。</p>\r\n<p>\r\n	在2007至2009年间，Enel为收购西班牙最大电力公司Endesa大举借债，截至去年底，公司净债务达510亿欧元，一年内几乎增加了10亿欧元。</p>\r\n<p>\r\n	在伦敦进行年度战略发布时，Enel制定了到2014年将债务减至390亿欧元的计划，并预测未来4年资本支出将持续缩水，从今年的70亿欧元减至48亿欧元。</p>\r\n<p>\r\n	公司还将2009年度股息从2008年的每股0.49欧元减至每股0.25欧元。</p>\r\n<p>\r\n	继去年完成32亿欧元的资产出售之后，Enel计划2010年再出售70亿欧元的资产，其中包括出售EGP的部分股权。</p>\r\n<p>\r\n	近几年里，其它欧洲能源公司也将部分可再生能源业务挂牌上市，以从高速发展的“绿色”技术——尤其是风能——更高的股市评级中获利。</p>\r\n','2010-03-19 13:42:00','2010-03-19 13:42:00',NULL,'绿色业务 电力','1',NULL,NULL,NULL,'/upload/news/z1TftRqjx1.jpg',0,0,NULL,0,'超级管理员','7,8,11',NULL,NULL,'11,12,13','意大利国家电力拟将绿色业务上市 ',NULL,1,NULL,'<br />\r\n',0),
 (6,15,3,0,1,NULL,NULL,'	谷歌退出迷局未解 百度上演股价反超','	谷歌退出迷局未解','<p>\r\n	谷歌会退出中国吗？伴随着其高管前前后后堪称反复的表态，这似乎成了一个天问。<br />\r\n	3月15日，坊间传言，谷歌将在当晚就此做出最后决定，但目前看来这并没有成为事实。与此同时，又有消息称，谷歌中国需要在本月底进行ICP牌照年检，这将是一个决定分晓的时刻。<br />\r\n	3月16日下午，记者就此致电谷歌中国公关部相关人士，其表示，谷歌中国一切正常，没有任何相关消息可以发布。<br />\r\n	 </p>\r\n','<p>\r\n	谷歌会退出中国吗？伴随着其高管前前后后堪称反复的表态，这似乎成了一个天问。<br />\r\n	3月15日，坊间传言，谷歌将在当晚就此做出最后决定，但目前看来这并没有成为事实。与此同时，又有消息称，谷歌中国需要在本月底进行ICP牌照年检，这将是一个决定分晓的时刻。<br />\r\n	3月16日下午，记者就此致电谷歌中国公关部相关人士，其表示，谷歌中国一切正常，没有任何相关消息可以发布。<br />\r\n	不过，就在一切悬而未决之际，其在中国一直未能超越的竞争对手百度，却悄然上演了一场“股价超越”。美国时间3月15日，百度股价在纳斯达克常规交易中上涨26.6美元，涨幅为4.8%，报收于576.84美元，创下1个多月以来的最高单日涨幅，首次超过谷歌。后者当天报收于563.18美元。<br />\r\n	百度股价晴雨表<br />\r\n	“百度股价的上涨，显然受益于谷歌或将退出中国消息的影响。”多位互联网业内人士对记者表示，自今年1月底开始，受谷歌真真假假的退出中国消息，百度股价开始单边上扬。<br />\r\n	而从百度股价的上扬轨迹来看，其与谷歌退出中国消息的反复也颇为相关。美国时间1月12日，谷歌突然宣布，因受到来自中国黑客攻击以及不愿继续进行关键词审查，将考虑关闭中国网站并退出中国市场。受这一消息影响，谷歌在盘后交易中股价跌1.3%，报583.05美元；百度股价盘后涨7%，至413.26美元/股。<br />\r\n	1月15日，百度股价上涨至467.68美元的新高。1月19日，谷歌中国在“Google黑板报”上以Google全球副总裁、主管大中华区销售业务的刘允和上海工程研究院院长杨文洛的联合名义发表了《澄清不实的传言》一文。文中指出，一些报道称我们已经关闭了在中国的办公室是不属实的。在此前后，百度股价开始呈现下滑趋势，到1月29日，百度股价报至411.71美元。<br />\r\n	然而第二天，“谷歌将退出中国”的消息再掀波澜，百度股价又重拾升势。2月1日，谷歌CEO施密特在达沃斯论坛上再次表达了强硬的姿态。“从当时施密特的表态来看，谷歌态度是坚决的。”业内人士对记者表示，这意味着谷歌离开中国的可能性在增大。<br />\r\n	记者在1月底登录“google.cn”网站时，曾多次无法正常登录，而点击“google.com”也没有像往常一样直接跳转到谷歌中文网页。据接近谷歌中国的人士猜测，“这可能是谷歌在检测一旦.cn撤退后，将对.com网站流量产生多大的影响。”<br />\r\n	正是从2月份开始，百度的股价开始爬坡，从2月1日的开盘价417.78美元开始，高歌猛进一直到3月15日的576.84美元收盘价，超过谷歌。<br />\r\n	有业内人士表示，谷歌是百度在华的最大竞争者，占据了中国约30%的市场份额。一旦谷歌退出中国，无疑将进一步强化百度的市场霸主地位，而百度股价超过谷歌某种程度上也颇具象征意义</p>\r\n','2010-03-17 10:06:07','2010-03-18 10:04:57',NULL,'google 搜索 百度','1',NULL,NULL,NULL,'/upload/news/CeZQe8oMfD.jpg',0,0,NULL,0,'rice','1,3','/upload/news/Vx8QzVWDHJ.pdf',NULL,'5,3',NULL,NULL,1,NULL,NULL,0),
 (7,2,2,0,1,NULL,NULL,'价格谈判机制将启，高价药迈过医保槛','\r\n	高价药迈过医保槛\r\n','<p>\r\n	通过这个医保价格谈判机制，一些价格过高但确有疗效的药品将得以进入医保报销范围。6月份进行的首轮谈判或将出现外企一边倒的情况</p>\r\n','<p>\r\n	“我们一个药是要进入谈判机制的，就是力比泰。因为政府方面也非常希望这个药能够出现在全国报销目录当中。”3月14日，礼来中国新任总裁艾博来向记者表示。<br />\r\n	这是去年11月30日新一版医保报销目录公布以来，首次有药品明确表示进入医保价格谈判机制。通过这个机制，一些价格过高，但确有疗效的药品，就此将得以进入医保报销范围。<br />\r\n	以往的医保政策中，“低水平、广覆盖、可持续”成为主导思路。但随着近年来恶性疾病的增多，人力资源和社会保障部（简称“人保部”）也开始考虑那些曾经的“暴利”药品普及的问题。<br />\r\n	3月16日，先声药业政策事务部总经理罗兴洪也对记者表示，早在3月2日，公司已经和人保部有过沟通，“目前等待谈判的约有十多个品种，我们也有两个产品想进入谈判。但具体方案和负责机构还没有完全确定下来”。<br />\r\n	然而这一工作进程很可能在最近加快。“近几天人保部组织部分外企召开了一次磋商会议，谈判机制这几个月内就会启动。”礼来中国副总裁邢军表示。<br />\r\n	谈判将启<br />\r\n	此前，以原研药为主的国外制药企业一直苦于其高价药品无法进入国内医保，推广起来难度很大，而礼来正是其中的代表之一。<br />\r\n	以恶性胸膜间皮瘤特效药力比泰为例，每瓶价格超过13000元，一般按疗程需4到6瓶，病人实际负担超过5万元。<br />\r\n	价格谈判机制无疑为这些药品提供了进入报销范围的渠道。去年11月23日，国家发改委等三部门联合发布了《改革药品和医疗服务价格形成机制的意见》，其中明确提到“探索建立医药费用供需双方谈判机制”。<br />\r\n	随后公布的新医保目录对于这一机制的表述为，“对临床疗效确切有重大创新价值但价格昂贵，可能对基金产生风险的部分药品品种及其费用支付方式和标准进行谈判”。<br />\r\n	但是4个多月来，这一机制并未有实际进展，这让苦等多日的中外药企不免失落。最关键的是，企业在是否进入谈判机制的问题上并没多大话语权。<br />\r\n	罗兴洪告诉记者，人保部对于进入价格谈判的药品采取的是专家推荐制，由各路专家从近几年上市的药品库中挑选高价但临床上确有需要的药品，再征求企业意见，最后由人保部与企业就具体价格进行谈判。换句话说，也就是协商如何把价格降低，换取进入医保报销的资格。“企业没有自行申请权。”<br />\r\n	这样一来，药企就被置于被动的地位上。而且，在品种选择上，人保部的取向似乎也并不完全看重使用量。<br />\r\n	据邢军介绍，就力比泰而言，其治疗的癌症主要是石棉接触工伤引起的，比较罕见。能够进入谈判机制，说明国家很重视工伤治疗这一块</p>\r\n','2010-03-17 10:40:09','2010-03-17 12:07:33',NULL,'医药 生物 医保','1',NULL,NULL,NULL,'/upload/news/5AlQyWcHLb.jpg',0,0,NULL,0,'echo','6','/upload/news/AqqlV4GwxG.pdf',NULL,'6',NULL,NULL,NULL,NULL,NULL,0),
 (8,6,1,0,1,NULL,NULL,'中国呼吁美国跨国公司游说华盛顿','中国呼吁美国跨国公司游说华盛顿','<p>\r\n	中国昨日呼吁美国跨国公司对奥巴马政府进行游说，避免在人民币汇率问题上采取保护主义措施。目前美国国会议员对中国的态度似乎正转向强硬。</p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none\">\r\n	 </div>\r\n','<p>\r\n	中国商务部发言人姚坚表示，一些公司已经在展开游说，反对近期针对中国输美产品的限制措施，他希望现在有更多公司加入这一行列。</p>\r\n<p>\r\n	“我<a href=\"http://www.sohu.com\">们也希望，在中国的美资企业能够在美国也表达他们的诉求，通过他们的观点来促进全球贸易的正常开展，共同反对贸易保护主义，”姚坚表</a>示。</p>\r\n<p>\r\n	中方发表这一言论之际，适逢华盛顿方面围绕中国汇率政策的政治情绪有所升温。在纽约州民主党参议员查克·舒默(Chuck Schumer)和南卡罗来纳州共和党参议员林赛·格雷厄姆(Lindsey Graham)的牵头下，一批参议员表示，中国拒绝让人民币升值，正影响着美国经济复苏，损害着美国的竞争力。</p>\r\n<p>\r\n	“即使在经济状况好的时期，中国操纵汇率也是不可接受的。在目前失业率高达10%的时候，我们对此简直无法容忍，”舒默在一份声明中表示。这些参议员已提交一份立法议案，一旦获得通过，该法将要求美国财政部指明哪些国家的“货币汇率在根本上失调”，以及美国需要对哪些国家采取“优先行动”。</p>\r\n<p>\r\n	根据上述立法议案，那些国家将有近一年时间调整本国货币汇率，如果它们做不到，美国政府将必须在世界贸易组织(WTO)对其提起正式申诉。美国财政部还将必须与<a href=\"http://finance.ifeng.com/forex/whyw/20100317/1937825.shtml\">美联储(Federal Reserve</a>)和其它国家央行就“在外汇市场上采取补救性干预”进行“磋商”。<img alt=\"\" src=\"/upload/images/1265105891_00566_small.jpg\" style=\"border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; width: 242px; border-bottom: 1px solid; height: 154px\" /></p>\r\n<p>\r\n	某些措施可更早采取，包括禁止中国企业参与美国政府合约，请求国际货币基金组织(IMF)与中国磋商，以及在倾销计算中纳入汇率低估的因素。</p>\r\n<p>\r\n	数年来，舒默和格雷厄姆一直在美国国会牵头反对中国的汇率政策，并曾不时提交类似的议案。</p>\r\n<p>\r\n	但在中美之间近期在汇率等一系列问题上的紧张升级之际，他们的努力也许获得了新的支持。</p>\r\n<p>\r\n	上周日，中国总理温家宝警告称，其它国家在汇率问题上对中国施压，无异于保护主义，并坚称人民币没有低估。</p>\r\n<p>\r\n	“那是（让人受不了的）最后一根稻草，”舒默表示。他抱怨称，美国成了“说教对象”。“我们受够了，我们再也不会忍气吞声了。”</p>\r\n<p>\r\n	美国财政部每年两次发布汇率报告。下一份报告将于4月15日发布。目前奥巴马政府面临的压力越来越大，要求其正式将中国列为“汇率操纵国”。迄今为止奥巴马政府一直不愿走出这一步，尽管奥巴马在2008年竞选期间曾严厉批评中国的汇率制度。</p>\r\n<p>\r\n	一位美国财政部官员昨日表示，该机构正在研究舒默-格雷厄姆议案。 “我们也对中国的汇率政策有严重关切，”这位官员表示，并补充称，中国应当借经济回升之机，“恢复”人民币升值进程。“更加以市场为导向的中国汇率，将对更强劲、更平衡的全球经济作出不可或缺的贡献，这对于确保美国企业和工人的持久复苏至关重要，”这位官员表示。</p>\r\n<div style=\"page-break-after: always\">\r\n	<span style=\"display: none\">&nbsp;</span></div>\r\n<p>\r\n	在中国经营的美国跨国企业长期反对华盛顿方面针对自己眼中的人民币低估采取行动。“人民币若升值10%-15%，将对美国经常账户赤字产生非常轻度的边际影响，”美国MFS投资管理公司董事长、哈佛商学院(Harvard Business School)高级讲师罗伯特·博森(Robert Pozen)对英国《金融时报》表示。“美国需要保持平静。希望它不要把中国列为汇率操纵国。”</p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none\">\r\n	 </div>\r\n','2010-03-17 13:20:35','2010-03-19 15:02:56',NULL,'对华 华盛顿 美国','1',NULL,NULL,'/upload/images/1265105891_00566_small.jpg','/upload/news/vRW7jcIqn4.JPG',0,0,NULL,0,'超级管理员','1,3,5,6,7','/upload/news/Otao1jSDNL.pdf',1,'6,7','中国呼吁美国跨国公司游说华盛顿',NULL,1,NULL,'<p>\r\n	 </p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none\">\r\n	 </div>\r\n<br />\r\n',1),
 (10,2,100,0,1,NULL,NULL,NULL,NULL,NULL,NULL,'2010-03-17 16:12:29','2010-03-17 16:12:32',NULL,NULL,'1',NULL,NULL,NULL,NULL,0,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
 (11,18,100,0,1,NULL,NULL,'主权财富基金开始“敞开心扉”','主权财富基金开始“敞开心扉”','<p class=\"dropcap\" style=\"text-indent: 0px\">\r\n	作为全球最大但也最为隐秘的国有投资基金之一，阿布扎比投资局(Adia)在改善信息披露方面迈出了不大、但非常重要的一步：本周，该基金发布了第一份年度评估报告。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px\">\r\n	作为全球最大但也最为隐秘的国有投资基金之一，阿布扎比投资局(Adia)在改善信息披露方面迈出了不大、但非常重要的一步：本周，该基金发布了第一份年度评估报告。</p>\r\n<p>\r\n	报告对细节轻描淡写，而且所披露的内容也大部分早已为外部观察人士所知。然而，阿布扎比投资局的这份报告显示出该基金在提高透明度方面的进步，也会成为银行家们仔细研读的对象。据估计，该基金资产总额在4000亿至4500亿美元之间，许多银行家都希望能够管理其中部分资产。</p>\r\n<p>\r\n	阿布扎比投资局从未披露过自身的资产总额或是发表过报告，而且直到2008年5月，其网站都很简陋，只列有基金名称、地址和总机号码。自1976年成立以来，其高管层只接受过4次正式采访，除了员工以外，能够获准进入其总部大楼的，只有寻求业务机会的资深国际银行家和基金经理人。</p>\r\n<p>\r\n	主权财富基金的不透明一直是西方批评人士的关注焦点之一，他们对专制国家做出的带有政治动机的投资决定心怀忧虑。随着急剧上涨的资产价格充实了许多主权基金的钱袋、让它们成为全球市场上的大玩家，这些基金所引发的争议也开始升温。</p>\r\n<p>\r\n	国际货币基金组织(IMF)因此为主权财富基金制定了“最佳做法”，以改善它们的透明度与治理。主要主权基金于2008年9月采纳了这些指导意见——当时有多家基金已向西方银行注资了数十亿美元——但其效果现在才刚刚开始显现。IMF的指导意见被称为《圣地亚哥原则》(Santiago Principles)，是非强制性的，但许多基金都尝试着对要求提高公开性的呼声做出回应——阿布扎比投资局的报告就是一个例证。</p>\r\n<p>\r\n	“我们对这些基金依然知之甚少，但我们跟踪关注它们已经有一段时间了，它们在披露程度方面的进步是显而易见的，”鲁比尼全球经济咨询公司(RGE)经济学家雷切尔•津巴(Rachel Ziemba)表示。</p>\r\n<p>\r\n	“这些基金现在全都在考虑，在不损害自身战略的前提下，它们能够披露哪些信息。”</p>\r\n<p>\r\n	《圣地亚哥原则》由20多条“得到普遍接受的原则与做法”构成，列出了信息披露、投资动机、企业治理和风险管理方面的目标。去年4月在科威特新成立的主权财富基金国际论坛(International Forum of Sovereign Wealth Funds)正式批准了这些原则。</p>\r\n<p>\r\n	阿布扎比投资局发布年度评估报告之前，新加坡的两家主权财富基金——新加坡政府投资公司(GIC)和淡马锡(Temasek)——也采取了同样的行动。它们编制的年度报告意在消除外界的一种印象，即它们的投资活动过于隐秘。GIC是在2008年首次发表年度报告的，此前该基金利用新加坡外汇储备开展投资活动已有27年。GIC表示，这么做是考虑到美国和欧洲“日益强烈的关切”。</p>\r\n<p>\r\n	GIC副主席陈庆炎(Tony Tan)在报告中表示，报告意在“让投资界和我们所投资的国家确信，我们的活动只有一个目的——获得投资回报。”</p>\r\n<p>\r\n	卡塔尔投资局(Qatar Investment Authority)旗下的直接投资机构卡塔尔控股(Qatar Holding)也一直在考虑发布一份与阿布扎比投资局类似的报告。“这项工作正在进行中，”一位内部人士表示，并指出卡塔尔投资局的报告可能会透露更多细节信息。</p>\r\n<p>\r\n	尽管披露程度正在改善，但没有多少人指望很多主权财富基金会变得和挪威政府全球养老基金(Government Pension Fund - Global)一样透明，后者在报告中列明了资金规模、业绩以及投资内容。很少有哪家基金会公开披露遭询问最频繁的一则信息——它们管理的资产总额。</p>\r\n','2010-03-18 17:45:40','2010-03-18 18:28:38',NULL,'基金 ','1',NULL,NULL,NULL,'/upload/news/MDKGnsevee.jpg',0,0,NULL,0,'超级管理员','7,8',NULL,NULL,'6,7','主权财富基金开始“敞开心扉”',NULL,1,NULL,'<p class=\"dropcap\" style=\"text-indent: 0px\">\r\n	详见《福布斯》中文杂志2010年5月刊，英文原稿出处 <a href=\"http://www.forbes.com/2010/03/17/mentor-find-job-leadership-careers-planning.html?boxes=Homepagetoprated\">http://www.forbes.com/2010/03/17/mentor-find-job-leadership-careers-planning.html?boxes=Homepagetoprated</a></p>\r\n',0),
 (12,28,100,0,1,NULL,NULL,'传统纺织行业纷纷卖壳求生 家纺异军突起前景看好','传统纺织行业纷纷卖壳求生','<p>\r\n	 </p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none;\">\r\n	 </div>\r\n','<p>\r\n	几家欢乐几家愁，很少被人注意的纺织板块目前显然正是这种境况。</p>\r\n<p>\r\n	在最新的大智慧行业分类（证监会行业）中，曾经以化纤纺织为主业的ST鲁置业（600223.SH）还赫然在列，但实际上这家公司早在去年7月6日便已经完成了重大资产重组，转型房地产业务并更名为鲁商置业。</p>\r\n<p>\r\n	无独有偶，同样的事情还发生在上市不到4年的德棉股份（002072.SZ）身上，这家公司在经历2008年的巨亏后，毅然选择放弃棉纺织业务，转型房地产业。</p>\r\n<p>\r\n	<b>毛利率大幅下降</b></p>\r\n<p>\r\n	“只能说是行业的无奈吧，这几年我们也接触过很多纺织类企业，公司业绩经常会受到行业波动的影响。”上海某券商并购部总经理告诉记者。</p>\r\n<p>\r\n	上海另一家本地券商的纺织行业首席分析师则向记者坦言，“我们也注意到了这样一个倾向。”</p>\r\n<p>\r\n	上述分析师告诉记者，“纺织行业是个传统的充分竞争行业，同质化比较严重，产能相对过剩又造成竞争异常激烈，再加上这两年出口收到金融危机影响，造成有些公司退出了这个行业。”</p>\r\n<p>\r\n	2009年前三季度的数据显示，在证监会划分的44家纺织类上市公司中，净资产收益率超过5%的仅有14家，占比不到32%。</p>\r\n<p>\r\n	“这里面有很多公司实行多元化经营，有的则已经完成重组更换主业，即便不考虑这些，这样的比例在整个A股市场都是偏低的。”前述并购界人士分析，正因为如此，纺织类公司也成为这位专门从事“企业买卖”的业内人士所关注的重点领域。</p>\r\n<p>\r\n	德棉股份在过去几年里的遭遇被视为基础纺织业的一个缩影。这家2006年10月份登陆中小板的公司，位于全国重点产棉区之一的山东德州，尽管坐拥原材料成本优势，但公司业绩仍然没能逃开全行业都面临的宿命。</p>\r\n<div style=\"page-break-after: always;\">\r\n	<span style=\"display: none;\">&nbsp;</span></div>\r\n<p>\r\n	在上市的前两年，公司尚能维持每年2500万元左右的净利润，各项财务指标也相对稳定。但2008年公司在营收下降21%的前提下，净利润爆出5320.19万元的亏损，这一亏损额甚至将该公司上市两年来的净利润尽数赔光。</p>\r\n<p>\r\n	该公司最新披露的业绩快报显示，2009年公司亏损额进一步增加至1.09亿元。公司董事会对两年来巨额亏损的解释几乎如出一辙，均是受行业和市场影响，产品销量、售价下降而原材料价格上涨，导致毛利率大幅下降等等。</p>\r\n<p>\r\n	这样的无奈在中金公司纺织服装行业分析师郭海燕的一则报告中清晰可见。其对重点关注的行业公司作出的业绩预测显示，2009年业绩增长5%以上的几乎全是附加值相对较高的服装类公司。</p>\r\n<p>\r\n	纺织类的公司仅有鲁泰A和华润锦华被认为是略有增长。正因为如此，上述业绩预测的标题被定为“子行业格局大不同”。</p>\r\n<p>\r\n	与行业面临的困境相比，人民币升值带来的压力同样让纺织行业喘不过气来。</p>\r\n<p>\r\n	据几家劳动密集型产业的相关商会粗略计算，人民币每升值1%，行业的净利润率就将相应下降1%，而当前这些行业的平均净利润只有3%-5%。</p>\r\n<p>\r\n	尽管来自商务部的最新数据显示，今年1-2月，国内纺织品的出口增幅达到39.42%，但另一项数据让这样的增长显得并不稳固。据湘财证券宏观部的预测，今年人民币的升值幅度将达到3%-5%，这对纺织行业无疑是雪上加霜。</p>\r\n<p>\r\n	<b>纺织业新势力</b></p>\r\n<p>\r\n	然而，在传统纺织类公司四面楚歌的同时，一些位于产业链高端的新兴纺织类公司却率先成为纺织业蓝海的开拓者。</p>\r\n<p>\r\n	“如果将传统纺织行业比喻为一个竞争惨烈的红海，那么国内的家纺行业显然是一个新兴的蓝海。”前述并购人士告诉记者。</p>\r\n<p>\r\n	在传统的纺织类企业无奈选择退出炽热的资本圈的同时，以家纺企业为代表的一批纺织行业新贵却选择了积极挺进，他们的异军突起也让投资者对这一相对默默无闻的传统领域产生了新的兴趣。</p>\r\n<p>\r\n	2009年下半年，罗莱家纺（002293.SZ）和富安娜（002327.SZ）相继登陆中小板，湖南梦洁家纺也顺利通过IPO审核，让家纺这一纺织类细分行业开始进入投资者的视野。</p>\r\n<p>\r\n	如果不考虑刚刚上市、股本较小的因素，罗莱家纺和富安娜以45.24元/股和37.38元/股的高价，成为整个纺织服装板块68家公司中股价最高的两只股票。这一现象被前述分析人士形象地称之为“老树开新花”。</p>\r\n<div style=\"page-break-after: always;\">\r\n	<span style=\"display: none;\">&nbsp;</span></div>\r\n<p>\r\n	一个有趣的数据让这种现象显得颇为合理。有资料显示，2007年美国消费者大概消费了10亿条毛巾和5.5亿套床单和枕套，几乎等于每个家庭购买了至少9条毛巾和5条床单和枕套。</p>\r\n<p>\r\n	“这一数据意味着随着中国经济的发展，国内消费能力还有巨大的提升空间，罗莱家纺这样的细分行业龙头率先借力资本市场，显然将分得第一杯羹。”前述上海券商研究员告诉记者。而富安娜和梦洁家纺的相继上市也被认为是行业巨头之间竞争的一种表现。</p>\r\n<p>\r\n	在罗莱家纺最新公布的业绩快报中，整个行业的差距显而易见。与德棉股份超过1亿元的亏损相比，罗莱家纺2009年的净利润高达1.52亿元，同比增长35.19%。尽管上市融资导致公司净资产由3.05亿元大幅增加至13.37亿元，但该公司加权平均净资产收益率仍然高达25.88%。</p>\r\n<p>\r\n	尚未公布年报业绩的富安娜去年前三季度即实现净利润 5075.38万元，每股盈利0.66元，净资产收益率高达30.12%，表现同样不俗。</p>\r\n<p>\r\n	与国泰君安行业研究员对一家传统纺织企业“主营业务并无明显亮点，未来盈利能力改善空间有限”的评价相比，国联证券分析师杨帆认为受国内居民收入持续增长及消费升级等因素的驱动，“近年来家用纺织品行业已经成为纺织行业中成长速度最快和发展潜力最大的子行业，行业发展前景广阔”。</p>\r\n<p>\r\n	尽管市盈率颇高，但在罗莱家纺最新一期的前十大股东中，依然有全国社保基金102组合等4家机构榜上有名，无疑体现出机构同样对这一细分行业充满期待。</p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none;\"></div>\r\n','2010-03-19 12:21:53','2010-03-19 13:02:37',NULL,'纺织 家纺','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','8,11',NULL,NULL,'7,8','传统纺织行业纷纷卖壳求生',NULL,1,NULL,'<p>\r\n	<a href=\"http://www.forbes.com\">www.forbes.com</a></p>\r\n<div firebugversion=\"1.5.3\" id=\"_firebugConsole\" style=\"display: none;\">\r\n	 </div>\r\n',0),
 (13,6,100,0,1,NULL,NULL,'摩根大通也曾利用回购交易','摩根大通也曾利用回购交易','<p>\r\n	摩根大通(JPMorgan Chase)曾将一些回购交易记为出售，这似乎表明，并非只有破产银行雷曼兄弟(Lehman Brothers)如此解读新会计规则。雷曼兄弟如今臭名昭著的“回购105”(Repo 105)交易，正是上述会计花招的产物</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	摩根大通(JPMorgan Chase)曾将一些回购交易记为出售，这似乎表明，并非只有破产银行雷曼兄弟(Lehman Brothers)如此解读新会计规则。雷曼兄弟如今臭名昭著的“回购105”(Repo 105)交易，正是上述会计花招的产物。</p>\r\n<p>\r\n	与从未在资产负债表上披露回购交易效应的雷曼不同，在新会计规则出台后，摩根大通从2001年起在其年报中详细列明回购出售与购买交易的年终价值。该操作在2005年该公司与美一银行(Bank One)合并后终止。一名发言人表示：“这些交易的数额非常小，且进行了充分的披露。”</p>\r\n<p>\r\n	安东•沃卢克斯(Anton Valukas)上周披露了雷曼将回购出售作为缩小其资产负债表手段的做法。美国法庭于2009年1月任命沃卢克斯彻查美国历史上最大破产案的原因。</p>\r\n<p>\r\n	沃卢克斯报告称，雷曼的“回购105”交易量于每季度末飙增，因为高管们试图缩小资产负债表，以使该银行看上去更加健康。</p>\r\n<p>\r\n	回购交易长期以来一直是投资银行至关重要的融资手段，一般会保留在银行的资产负债表上。但在某些情况下，银行可将这些交易记为出售，从而将它们移出资产负债表。</p>\r\n<p>\r\n	摩根大通的账目上记录了出售（雷曼所作的那种交易）与购买，这意味着，它扮演了进行相同交易的其它机构的交易对手角色。</p>\r\n<p>\r\n	据信，它的交易对手不是雷曼，而沃卢克斯的报告中也没有列出摩根大通。</p>\r\n','2010-03-19 13:11:20','2010-03-19 13:37:02',NULL,'摩根 回购','1',NULL,NULL,NULL,'/upload/news/80xHAbrNVq.JPG',0,0,NULL,0,'超级管理员','13,12',NULL,NULL,'11,8,13','摩根大通也曾利用回购交易',NULL,1,NULL,'<br />\r\n',1),
 (14,6,100,0,1,NULL,NULL,'保诚CEO回绝出任法国兴业银行董事邀请','保诚CEO回绝出任法国兴业银行董事','<p>\r\n	英国保诚集团(Prudential)首席执行官迪德简•蒂亚姆(Tidjane Thiam)回绝了加入法国兴业银行(Societe Generale)董事会的邀请</p>\r\n','<div class=\"showenglish\" sizcache=\"6\" sizset=\"108\">\r\n	英国保诚集团(Prudential)首席执行官迪德简•蒂亚姆(Tidjane Thiam)回绝了加入法国兴业银行(Societe Generale)董事会的邀请。此前，投资者对蒂亚姆在努力敲定该英国寿险集团对友邦保险(AIA)雄心勃勃的355亿美元收购之际，竟然还能考虑这样一个角色感到震惊。</div>\r\n<div class=\"content\" id=\"bodytext\" sizcache=\"6\" sizset=\"109\" style=\"font-size: 12px; color: rgb(68, 68, 68);\">\r\n	<p>\r\n		在兴业银行于周三宣布，它将在5月举行的下届年度大会上提名蒂亚姆出任该行的非执行董事之后，投资者向保诚发出了大量抗议。</p>\r\n	<p>\r\n		这则消息传来之际，正值保诚高管在会晤投资者，试图说服他们支持保诚收购美国国际集团(AIG)亚洲业务。这笔交易将使保诚集团的规模扩大1倍，但需要增发210亿美元新股。</p>\r\n	<p>\r\n		许多投资者担心，交易完成后，在整合多家公司方面将有高度的执行风险，而交易的规模本身以及配股增发的成本，也使一些投资者犹豫。</p>\r\n	<p>\r\n		蒂亚姆昨日在一份声明中表示，他对被选中出任上述职位感到荣幸。兴业银行股东本来将于5月对此进行表决。</p>\r\n	<p>\r\n		但他接着表示：“我目前最重要的任务是，继续专注于为我们的股东创造良好的业绩，并确保这笔转型交易以及随后整合友邦保险的成功。”</p>\r\n	<p>\r\n		接近保诚集团的人士坚称，批准该集团首席执行官出任兴业非执行董事的过程从未完成，该集团对兴业的声明感到意外。</p>\r\n	<p>\r\n		不过，熟悉兴业银行的人士表示，若没有收到蒂亚姆办公室的恰当批准，该银行绝不会发表上述声明。</p>\r\n</div>\r\n','2010-03-19 13:27:32','2010-03-19 13:37:50',NULL,'保诚集团 兴业银行','1',NULL,NULL,NULL,'/upload/news/snwGKFQsYH.JPG',0,0,NULL,0,'超级管理员','11,8',NULL,NULL,'8,7','保诚CEO回绝出任法国兴业银行董事',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0),
 (16,6,100,0,1,NULL,NULL,'印度油企呼吁该国建立主权财富基金 ','印度油企建立主权财富基金 ','<p>\r\n	印度政府与业内官员表示，印度国有石油行业正要求政府创建该国的首只主权财富基金(SWF)，以便与中国在获取全球能源资产的竞争中抗衡</p>\r\n','<p>\r\n	官员们表示，石油部与财政部正在就设立一只主权投资基金进行讨论，目前讨论处于初级阶段，且尚未设立任何最后期限。</p>\r\n<p>\r\n	该计划如被采纳，将会摒弃印度政府于2006年推动的倡议：即印度与中国联手竞购全球能源项目，以降低成本。</p>\r\n<p>\r\n	印度石油部与国有能源集团已告诉政府，来自本国2780亿美元外汇储备的资金，将有助于他们与在海外投入重金的中国能源公司开展竞争。</p>\r\n<p>\r\n	孔蒂表示，他希望在6月前就协议达成共识。与此同时，Enel将股息减半，并制定了削减资本支出以减少负债的计划。</p>\r\n<p>\r\n	在2007至2009年间，Enel为收购西班牙最大电力公司Endesa大举借债，截至去年底，公司净债务达510亿欧元，一年内几乎增加了10亿欧元。</p>\r\n<p>\r\n	在伦敦进行年度战略发布时，Enel制定了到2014年将债务减至390亿欧元的计划，并预测未来4年资本支出将持续缩水，从今年的70亿欧元减至48亿欧元。</p>\r\n<p>\r\n	公司还将2009年度股息从2008年的每股0.49欧元减至每股0.25欧元。</p>\r\n<p>\r\n	继去年完成32亿欧元的资产出售之后，Enel计划2010年再出售70亿欧元的资产，其中包括出售EGP的部分股权。</p>\r\n<p>\r\n	近几年里，其它欧洲能源公司也将部分可再生能源业务挂牌上市，以从高速发展的“绿色”技术——尤其是风能——更高的股市评级中获利。</p>\r\n','2010-03-19 13:45:59','2010-03-19 13:45:59',NULL,'印度 财富基金','1',NULL,NULL,NULL,'/upload/news/48iCJsLZ3M.jpg',0,0,NULL,0,'超级管理员','13,14',NULL,NULL,'11,13','印度油企建立主权财富基金 ',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0),
 (17,6,100,0,1,NULL,NULL,'腾讯：打击不良短信可能影响业务 ','打击不良短信可能影响业务 ','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	腾讯(Tencent)昨日表示，中国打击手机低俗短信的行动已开始损害其业务。以市值衡量，腾讯是全球第三大互联网公司。</p>\r\n','<p>\r\n	腾讯运营着全球最受欢迎的即时通讯服务和《地下城与勇士》(Dungeon &amp; Fighter)等网络游戏。这次预警是一个初步迹象，表明中国严格的审查机制可能开始对本国互联网业的繁荣产生负面影响。</p>\r\n<p>\r\n	腾讯表示，其移动服务业务的前景并不清晰。这部分业务占其营收的17%。</p>\r\n<p>\r\n	“我们可能会感觉到监管环境的负面影响，”公司总裁刘炽平(Martin Lau)表示。“运营环境正变得越来越有挑战性。”与此同时，腾讯2009年利润与营收均实现激增。</p>\r\n<p>\r\n	过去15个月里，中国政府对所谓的“有害内容”加大了打击力度。尽管政府辩称这些措施针对的是淫秽色情信息与垃圾短信，但关闭网站和短信拦截的措施也波及政治敏感内容。</p>\r\n<p>\r\n	腾讯管理层表示，政府去年11月出人意料地决定暂停WAP业务计费——消费者本来可通过这种方式购买网上内容，并将费用直接计入自己的手机账单——也影响了第四季度业绩，而且今年造成的损失会更大。</p>\r\n<p>\r\n	刘炽平补充道，全球最大移动运营商中国移动(China Mobile)试图通过限制特定内容提供商发送短信来清理“不良”内容，这也对行业产生了附带损害。</p>\r\n<p>\r\n	腾讯的业务基础是即时通讯服务QQ，目前该服务拥有逾5亿活跃帐户。过去几年里，该公司构建了包括社交网络应用、虚拟商品和网络游戏在内的丰富产品范围。</p>\r\n','2010-03-19 13:52:00','2010-03-19 13:52:00',NULL,'腾讯 短信 游戏','1',NULL,NULL,NULL,'/upload/news/vdEJsgydiF.jpg',0,0,NULL,0,'超级管理员','8,7,6',NULL,NULL,'13,14,16','打击不良短信可能影响业务 ',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0),
 (18,43,100,0,1,NULL,NULL,'宗庆后成为大陆首富的背后 ','宗庆后成为大陆首富的背后 ','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	在全球经济危机期间，中国在西方国家的痛苦中夸耀自己的高增长，很是嘲笑了西方一番——而且他们不会让任何人忘记这一点。外商抱怨说，从政府官员到客户，中方人员涌现出了新一波的必胜信念。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	在全球经济危机期间，中国在西方国家的痛苦中夸耀自己的高增长，很是嘲笑了西方一番——而且他们不会让任何人忘记这一点。外商抱怨说，从政府官员到客户，中方人员涌现出了新一波的必胜信念。</p>\r\n<p>\r\n	现在，中国有了新的吹嘘资本。《福布斯》(Forbes)杂志宣布，中国首次成为除美国外拥有亿万富翁最多的国家。中国大陆的首富是杭州娃哈哈(Wahaha)集团董事长宗庆后。娃哈哈是中国最著名的饮料公司之一，也是中国一起最有名官司中的非正式输家。</p>\r\n<p>\r\n	围绕“娃哈哈”商标的使用权，宗庆后与他的合资伙伴达能(Danone)斗争多年。达能指责宗庆后在合资企业之外另设相关公司，销售与娃哈哈形成竞争的产品。宗庆后否认了这一点。但瑞典的一个仲裁小组认为，宗庆后违反了保密协定和不竞争协议。这一仲裁结论促成了双方的和解。</p>\r\n<p>\r\n	媒体报道说，达能获得了胜利。但情况确实如此吗？</p>\r\n<p>\r\n	宗庆后以3亿欧元(合4.09亿美元)买下了达能在合资公司的股权，价格远低于达能的要求。最终，他至少利用了这家欧洲领先食品品牌之一的错误，成为了中国的首富。</p>\r\n<p>\r\n	这样的成绩足以让一个小国自鸣得意了，而在今天的中国，沾沾自喜的情绪当然不会少。</p>\r\n','2010-03-19 14:24:40','2010-03-19 14:24:40',NULL,'首富 富豪','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','11,7',NULL,NULL,'11,12','宗庆后成为大陆首富的背后 ',NULL,1,NULL,'<p>\r\n	www.forbes.com</p>\r\n',0),
 (19,28,100,0,1,NULL,NULL,'香港华懋集团可能公开上市 ','香港华懋集团可能公开上市 ','<p>\r\n	家族经营的慈善基金会——华懋基金(Chinachem Charitable Foundation)表示，将考虑把香港最大的私营地产开发商华懋集团(Chinachem Group)公开上市。上月，该基金在一场轰动性的法庭诉讼中赢得了龚如心(Nina Wang)遗产的控制权。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	家族经营的慈善基金会——华懋基金(Chinachem Charitable Foundation)表示，将考虑把香港最大的私营地产开发商华懋集团(Chinachem Group)公开上市。上月，该基金在一场轰动性的法庭诉讼中赢得了龚如心(Nina Wang)遗产的控制权。</p>\r\n<p>\r\n	龚如心的弟弟、华懋集团主席龚仁心(Kung Yan-sum)在庭审结束后首次接受采访时表示，只要有利于慈善工作，华懋集团就会上市。</p>\r\n<p>\r\n	但他表示，目前还没有立即将集团上市的计划。自龚如心及其丈夫50年前创办该集团以来，它一直是一家私人持股公司。</p>\r\n<p>\r\n	龚仁心表示：“上市工作非常复杂。需要考虑许多事情，比如市场环境和公司的发展规划。这是我们未来需要考虑的事情。”他同时也是华懋基金的掌舵人。</p>\r\n<p>\r\n	上月的一次香港庭审，将龚如心的全部财产判给了其家人运营的信托基金华懋基金。</p>\r\n<p>\r\n	在历时漫长且备受瞩目的庭审中，法庭驳回了风水师陈振聪(Tony Chan)的遗产继承请求。陈自称是龚如心的地下情人，并称龚如心曾希望将财产留给他。</p>\r\n<p>\r\n	龚仁心在接管华懋前曾做了30年的医生。他表示，自己觉得，家人是实现姐姐对于华懋愿景的最佳人选。</p>\r\n<p>\r\n	“俗话说：血浓于水。我们是管理这家慈善基金和公司、让她梦想成真的最佳人选，因为我们是她的家人。我们最了解她，”现年67岁的龚仁心说道。</p>\r\n<p>\r\n	龚如心的愿望之一就是出资设立一个中国版的诺贝尔奖(Nobel prize)，龚仁心表示，家人们“肯定会设立这个奖项。”</p>\r\n<p>\r\n	对于龚仁心而言，获得姐姐财产的控制权并不容易。据他透露，这笔财产价值约为400亿到500亿港元（合51亿至64亿美元）。</p>\r\n<p>\r\n	在龚如心于2007年4月因癌症去世后，陈振聪声称，他手上有一份龚如心指定自己为唯一继承人的遗嘱。龚如心标志性的马尾辫与迷你裙为她赢得了“小甜甜”的昵称。</p>\r\n<p>\r\n	这造成了陈振聪与华懋基金——一份较早时候订立的遗嘱的受益人——之间激烈的遗产争夺战。</p>\r\n<p>\r\n	该案件与龚如心与公公之间的遗产争夺战如出一辙。在丈夫王德辉(Teddy)遭绑架失踪9年，并于1999年被宣布法律死亡后，公公开始了对华懋控制权的争夺。</p>\r\n<p>\r\n	龚如心在2005年赢得了那场诉讼，从而成为亚洲最富有的女性。</p>\r\n<p>\r\n	龚仁心告诉英国《金融时报》，华懋将继续把重点放在香港，同时也会研究中国内地的机会。</p>\r\n<p>\r\n	不过，他表示，所有重大商业决策都必须与德勤(Deloitte Touche Tohmatsu)的会计师进行讨论。法院2007年委任德勤管理龚如心的遗产，在陈振聪表示将对判决提出上诉后，目前仍负责监督这家公司。</p>\r\n<p>\r\n	下月，华懋将开始出租24层高的豪华住宅楼百合花(Lily)，其地皮是1997年以55.5亿港元购得。该大楼由下而上渐进式地向外展开，位于奢华港岛南端。</p>\r\n<p>\r\n	自2002年完工以来，这座由福斯特爵士(Lord Foster)设计的大楼一直处于空置状态，原因是龚如心的诉讼、健康状况以及在如何使用这座大楼上迟疑不决。</p>\r\n<p>\r\n	龚仁心表示：“我姐姐将她的心血全部倾注在了百合花身上。她在香港主权移交后的首次土地拍卖中购买了这块土地，以示对香港回归祖国的支持。对她而言，这不仅仅是一块土地，而是意味着很多很多。”</p>\r\n<p>\r\n	当被问及想对陈振聪说点什么时，龚仁心说道：“好自为之，做个好人，善待他人。”</p>\r\n','2010-03-19 14:30:43','2010-03-19 14:30:43',NULL,'龚如心 小甜甜  华懋','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','14,17',NULL,NULL,'11,16','香港华懋集团可能公开上市 ',NULL,1,NULL,'<br />\r\n',0),
 (20,18,100,0,1,NULL,NULL,'地产公司CREO拟转赴新加坡上市 ','CREO拟转赴新加坡上市 ','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	地产公司中国房地产机会(CREO)计划从伦敦另类投资市场(AIM)退市，转而在新加坡上市，此举是为了提高其股票相对于其中国资产组合价值（8.4亿英镑）的估值水平。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	地产公司中国房地产机会(CREO)计划从伦敦另类投资市场(AIM)退市，转而在新加坡上市，此举是为了提高其股票相对于其中国资产组合价值（8.4亿英镑）的估值水平。</p>\r\n<p>\r\n	在中国拥有办公楼、商铺及住宅地产的CREO将就此征询投资者的意见。公司表示，此举可能有助于缩小其资产净值与股价之间的差距。</p>\r\n<p>\r\n	自2008年房地产市场暴跌以来，CREO的股价一直较其资产净值有大幅折价。上周五收盘时，折价幅度达到68%，昨日该股收于342便士，下跌23.5便士。</p>\r\n<p>\r\n	CREO董事理查德·大卫(Richard David)表示，同类地产公司在亚洲的定价水平完全不同，通常股价较净资产值的折让幅度都很小，甚至会有溢价，部分原因在于投资者临近中国市场和公司拥有的资产。</p>\r\n<p>\r\n	他表示，此举将使公司位置更接近其资产基础，从而可能使其股票获得重新定价，估值水平得以与亚洲上市同行一致，并能利用亚洲市场股东的流动性。如果获得股东批准，公司可能在6月前从AIM退市。</p>\r\n<p>\r\n	大卫表示，AIM曾为CREO提供了一个忠实的股东基础，这些股东的持股将转换为在新加坡上市的新公司股份。</p>\r\n<p>\r\n	CREO昨天发布了全年业绩。截至12月31日，CREO的投资组合价值为91.9亿人民币。每股净资产值全年下降了14%，主要原因是汇率波动，但下半年增长了7%，达到11.37英镑。</p>\r\n<p>\r\n	CREO表示，取得上述进展，是通过处置非核心资产，为投资资产进行再融资，并改善资本状况。</p>\r\n<p>\r\n	公司向股东表示，将以每股330便士的价格发出收购要约。</p>\r\n','2010-03-19 14:33:40','2010-03-19 14:33:40',NULL,'房产 上市 ','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','7,8',NULL,NULL,'18,19','CREO拟转赴新加坡上市 ',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0),
 (21,18,100,0,1,NULL,NULL,'中国银行积极涉足美国商业地产市场 ','中国银行涉足美国商业地产','<p>\r\n	中国银行(Bank of China)正成为投资于困境中的美国商业地产业的最大的非美国银行之一，其驻美银行家正在市场上四处寻觅新交易。</p>\r\n','<p>\r\n	世邦魏理仕(CBRE)的数据显示，在美国多数银行陷于瘫痪、商业抵押贷款支持证券市场冻结的情况下，外资银行如今提供逾60%的商业地产债务融资。</p>\r\n<p>\r\n	这些新来者愿意提供融资，这在一定程度上填补了一个真空，并令人产生希望：至少在美国的几个大市场，下滑的最糟糕时刻也许已经过去。分析师们表示，中行和其它外资银行通过这么做，能够得益于当今尤其具有吸引力的放贷条款和息差。</p>\r\n<p>\r\n	中行纽约分行总经理黎晓静表示：“我们的北京总部正鼓励各海外分行参与当地放贷业务，只要我们能够控制风险。”</p>\r\n<p>\r\n	黎晓静表示，得益于保守的指导原则，中行在房地产业没有不良贷款。该行的营销材料称，它只能提供相当于房地产价值65%的贷款，若相关房地产是酒店，可提供的贷款就更少。但是，尽管多数银行如今对超过5000万美元至1亿美元的放贷敬而远之，但中行积极寻觅并愿意持有更大的头寸。比如，中行为纽约时代广场附近的纽约时报(New York Times)大楼提供了1.2亿美元。</p>\r\n<p>\r\n	“我们与多家房地产公司保持合作关系，”黎晓静表示。“由于我们持有这些贷款，因此他们知道自己在与谁做生意。”</p>\r\n<p>\r\n	中行纽约分行负责商业地产信贷的雷蒙德•乔(Raymond Qiao)表示，与许多其它外资银行一样，中行只对美国几个门户城市（如纽约、洛杉矶和旧金山）的知名商业资产有兴趣。</p>\r\n<p>\r\n	比如，当房地产投资信托SL Green Realty Corp需要为纽约时代广场的一栋写字楼进行再融资时，就接洽了中行，请中行牵头一个贷款辛迪加。</p>\r\n<p>\r\n	中行带来了新资金，它自己提供了4.75亿美元抵押贷款的近一半资金，而该交易中的多数其它银行只是滚动了自己的头寸，还抽出了一部分资金。</p>\r\n<p>\r\n	SL Green总裁安德鲁•马蒂亚斯(Andrew Mathias)表示：“中国银行拥有庞大的资产负债表，相比其它银行，它更愿意持有大额的抵押贷款投资。”</p>\r\n','2010-03-19 14:45:03','2010-03-19 14:45:03',NULL,'银行 房地产 ','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员',NULL,NULL,NULL,NULL,'中国银行涉足美国商业地产',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0),
 (22,18,100,0,1,NULL,NULL,'后昂山时代的缅甸与中国','后昂山时代的缅甸与中国','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	根据缅甸政府宣布的新选举法，以及政党组织法，任何要参选的政党不得接纳正在服刑的人、宗教人士、公务员等成为党员，这就确定诺贝尔和平奖得主昂山素姬在未来的大选中出局。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	根据缅甸政府宣布的新选举法，以及政党组织法，任何要参选 的政党不得接纳正在服刑的人、宗教人士、公务员等成为党员，这就确定诺贝尔和平奖得主昂山素姬在未来的大选中出局。另外，任何政党如果不被接纳成为参选的 政党，那就是非法政党，必须解散。换句话说，昂山领导的民盟如果不能参选，也必须解散。新法公布后，昂山素姬立刻呼吁各政党和人民抵制新选举法，联合国秘 书长潘基文和美国国务院军发表公开讲话，对军政府此举提出批评，认为其不符合国际社会对缅甸大选的期待。</p>\r\n<p>\r\n	民盟如果不能参选，由吴觉敏（华文姓名胡华）等创立的缅甸民主联合党就成为执政党之外最大的反对党。该党明确支持新的选举法，并宣布投入选举，同时 也承认会在大选后加入执政党的联合政府。本刊记者在温哥华专访了该党常务副主席吴觉敏，他坦言昂山时代走入终点，缅甸面临新的发展机遇，虽然美国和欧盟可 能希望他们成为西方的新盟友，但缅甸民主联合党在西方和中国之间，优先选择与中国合作，共同打造新的经济圈。以下是访谈内容。</p>\r\n<p>\r\n	丁：军政府公布了选举法和政党组织法，你觉得是否公平合理？</p>\r\n<p>\r\n	吴：如果从西方民主的游戏规则来看，当然不公平，不合理，不但军政府不选就占据了百分之二十五的席次，同时，给与其他政党登记参选的时间如此之短， 颇有突然袭击的味道。但是，从僵持了几十年的政治死局来讲，这又是进步。有选举，军政府的统治就有了结束的可能，而不穿军装的政府，总比拿著枪的军人执政 好。</p>\r\n<p>\r\n	丁：根据新法，昂山素季非但不能参选，民盟如果要登记参选，还必须开除她，昂山呼吁起来反对，你觉得昂山和民盟的命运如何？</p>\r\n<p>\r\n	吴：昂山素姬的时代，随著选举开始就结束了。民盟开除和不开除昂山，都不可能参与选举了，而缅甸人民也变得现实，不会大规模起来抗争，阻止选举的进行。据我所知，民盟已经出局了。</p>\r\n<p>\r\n	丁：你参与领导的缅甸民主联合党（UDP)是否会依据新法登记参选？军政府是否会同意？</p>\r\n<div style=\"page-break-after: always;\">\r\n	<span style=\"display: none;\">&nbsp;</span></div>\r\n<p>\r\n	吴：我们已经著手登记参选，目前在联邦和省的层次，推出百人参选，而军政府其实内部已经表态同意我们党的参选。我们并不准备挑战执政党的多数席位，但会推出足够组成关键少数的人员参选，我自己估计大选后，我党在国会将会有五十到八十人的议员，占据五分之一到七分之一的席次。我们并非要夺权，而是要带动国家的正面建设。</p>\r\n<p>\r\n	丁：登记参选的政党才能合法存在，你觉得缅甸未来制衡执政党的力量何在？是否就是你们的政党？</p>\r\n<p>\r\n	吴：毫无疑问，我们将成为军政府支持的执政党之外，最大的政党，但我们不会在野，而是会参与联合政府的角色。</p>\r\n<p>\r\n	丁：联合国秘书长和美国都谴责这个新法，你觉得大选结果会否被国际社会认同？国际社会对缅甸的制裁会否缓和？</p>\r\n<p>\r\n	吴：一定会。在目前的形势下，西方和联合国还会支持一下昂山，因为这是政治的需要。但是，根据我党与欧盟美国的沟通渠道，他们会在选举后与新政府展开合作对话，这是百分之百的事情。</p>\r\n<p>\r\n	丁：国际社会都认为未来的大选是政治闹剧，你觉得会否给缅甸发展带来实质性的进步？</p>\r\n<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	吴：会带来实质性的进步，在缅甸这样的社会，进步不可能是一夜之间的“颜色革命“，而是相对缓慢的，但选举启动的改革步伐，不可能终止，人民在取得渐进改革好处后，会支持文人政府，地方与中央的关系，也会有一个改变。缅甸的这种情况，对国际社会也有好处。</p>\r\n<p>\r\n	丁：大选后，你会否重返缅甸主持经济工作？</p>\r\n<p>\r\n	吴：如果没有意外，我一定会回去，跟军政府的多次接触显示，他们希望我党和我本人国家经济建设上扮演重要角色，坦率说，我回去会接新政府副总理一级的工作，负责中央与地方的经济重建，缅甸地方与中央的矛盾，必须在繁荣经济的前提下得到缓解，我在这方面，有别人难以取代的地位与作用。</p>\r\n<p>\r\n	丁： 大选对中缅关系，印度缅甸关系，以及缅甸在东盟的地位会带来怎样的影响？</p>\r\n<p>\r\n	吴:大选对中国是比较利多，理由很简单，因为大选后的文人政府，形象当然好过以前，中国是支持缅甸最大的国家，背负了军政府的骂名，如今可以轻松一下。对于我们党来说，虽然与欧美关系密切，但仍然是把中国放在第一位，关键是看中国如何看待我们，是否把我们看成是良性的制约？</p>\r\n<p>\r\n	缅甸经济发展了，对东盟就是正面意义。问题是西方，他们支持昂山那么多年，如今民盟几乎走向消亡，以至于他们找不到代理人。印度最近做了很多工作，希望强化对缅甸的影响。因此，各大国争取缅甸的动作，会越来越积极。这对缅甸来说是好事，对中国来说，则是挑战。</p>\r\n','2010-03-19 14:47:48','2010-03-19 14:47:48',NULL,'国际关系','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员',NULL,NULL,NULL,NULL,'后昂山时代的缅甸与中国',NULL,1,NULL,'<br />\r\n',0),
 (23,18,100,0,1,NULL,NULL,'中国是否应该减持美国国债？ ','中国是否应该减持美国国债？ ','<p>\r\n	奥巴马不顾中国的强烈反对，如期会见西藏流亡领袖达赖喇嘛，再度给紧张的中美关系投上阴影。</p>\r\n','<p class=\"dropcap\" style=\"text-indent: 0px;\">\r\n	奥巴马不顾中国的强烈反对，如期会见西藏流亡领袖达赖喇嘛，再度给紧张的中美关系投上阴影。当然，从另外一个角度来看，中国的连续抗议也产生了效果，那就是奥巴马会见达赖的地点和形式发生了变化，不在象征性极强的白宫椭圆形办公室，而是在地图室，而且不对外公开，变相成了高调的“秘密会见”，这在某种程度上等于给了北京很大的面子，以此减少这次会面带来的冲击。没有人会相信达赖方面所说的话，即美国希望通过这次会面，向北京传递一个强烈的信息，即必须要解决西藏问题。其实不然，奥巴马的会面，纯粹是美国国内政党政治的需要，以及美国需要在与中国进行的各类政治谈判中，保持住各种可以利用的政治筹码，因为随著中国的快速崛起，随著两岸关系的缓和，美国的筹码越来越少。</p>\r\n<p>\r\n	一如美国在挑战中国的时候，很小心不要把中国逼入死角，总是留下一点回旋的余地，其目的就是要获得中国希望妥协而付出的代价，因为逼入死角，唯一的结果就是破罐破摔，鱼死网破，中国如今在挑战美国的时候，也要防止逼美国走入死角，而是要“给出路”，让美国付出代价来妥协，这才是外交的高手段。中国要面子，美国也要面子，能够做到我给你面子，你得给我里子，这就是双赢。</p>\r\n<p>\r\n	西藏问题和台湾问题，是中国的核心利益，美国对台军售，会见达赖喇嘛，带来的挑战很严重。如何化解？那就是釜底抽薪，在对台军售问题上，北京采取对美国强硬，对台湾则更柔软，这次春节，胡锦涛主席到福建看望台商，引发台湾朝野的震动，认为是对台发出“重要信息”。这就是“区别对待”，也是正确的途径，而同意美国航空母舰停靠香港，更是直接向美国表达缓和的姿态；台湾问题的处理方法，也可以用在西藏问题上，对待达赖喇嘛，不但要持续与其代表谈判，只要谈判对话继续，西方在西藏问题上就难以挑战北京，如果北京更进一步，邀请达赖走访五台山之类的佛教圣地，就可以大幅减少达赖在西方的影响力。</p>\r\n<p>\r\n	有人说，中国连续减持美国国债，是对美国的惩罚。这是错误的思路，如果减持美债，是为了分散外汇投资，那无可厚非，但如果是政治考量，那就是得不偿失。众所周知，不买美债，买欧元，买加元，买日元，买黄金，是否就真的安全？真的能赚钱？如果能，那当然要做。如果不能，为了政治考量硬做，那就是“笨”，维持美国最大的债权国，对中国相当有利，美国人在心理上就认为中国是最信任美国的朋友。日本人就充分知道这一点，中国减持美债的时候，日本尽管经济状况比中国差，反而加码，增持美债，再度成为第一，日本人很清楚，欧盟的问题比美国更大，买欧元，风险不比买美债小，那不如买美债，而一旦中国减持加大，美国被迫提升利息，还可以大捞一把，一举两得，何乐而不为？</p>\r\n<p>\r\n	由此可见，中国外交面临两个问题，一个是了解什？是美国的核心利益，一个是如何与美国“两手较量”？伊朗问题，绝对是美国的核心利益，伊朗拥有核武，对美国，对以色列是一场噩梦，美国和以色列一定不会坐视不理，北韩拥有核武，只是挑战美国的东亚战略，但伊朗拥有核武，就是挑战美国的全球能源战略，就是给以色列带来灭顶之灾的危机。因此，美国为了制裁伊朗，不惜向俄罗斯妥协，承诺不再积极推动俄罗斯周边国家的“颜色革命”（其实效果也不行），同时也放缓在东欧的飞弹防御系统部署，莫斯科当然高兴。如今只剩下中国，伊朗拼命拉拢中国反对制裁。北京怎么办？两害取其轻，中国如果能得到美国的保证，确保中国在中东地区的石油供应，以及放缓对华贸易战争的尺度，不妨劝伊朗停止“核武发展”，不然就支持美国的制裁案。伊朗问题的挑战迫在眉睫，与其消极拖延表态，不如让美国付出战略利益的交换。说到底，伊朗持有核武器，长期来说，不但危害中东地区的稳定，也对中国新疆地区的稳定带来隐患，因为伊朗的野心不但是核武，更重要的是重建大波斯帝国。因此，中国必须抓住最佳时机，寻求最大回报，在关键的时候，挺美国与欧盟一把，可谓一箭双雕。</p>\r\n','2010-03-19 14:50:08','2010-03-19 14:50:08',NULL,'国债 ','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','7,8',NULL,NULL,'13,14','中国是否应该减持美国国债？ ',NULL,1,NULL,'<p>\r\n	www.forbes.com</p>\r\n',0),
 (24,24,100,0,1,NULL,NULL,'土豆网CEO王微：Hulu模式照搬到中国不现实 ','Hulu模式照搬到中国不现实 ','<p>\r\n	美国Hulu模式近期在中国网络视频行业引起关注，不过土豆网CEO王微似乎并不看好该模式，他认为将Hulu模式完全照搬到中国视频行业并不现实。</p>\r\n','<p>\r\n	美国Hulu模式近期在中国网络视频行业引起关注，不过土豆网CEO王微似乎并不看好该模式，他认为将Hulu模式完全照搬到中国视频行业并不现实。</p>\r\n<p>\r\n	　　今日土豆网举行2010土豆印象节倒计时30天发布会，会后王微与媒体进行了交流。在谈及百度视频公司奇艺、酷6剧场等推崇的Hulu模式时，王微认为中国网民的视频需求和美国网民并不一样。</p>\r\n<p>\r\n	　　“美国观众只想看美国的节目，所以几家媒体可以提供给绝大多数美国观众想看的内容，而中国观众想看到美国、韩国、日本等各个国家和地区的内容。”王微说，“中国要搭建出一个Hulu模式比联合国还难。”</p>\r\n<p>\r\n	　　与酷6网高调将长视频与短视频分开、搭建Hulu模式剧场类似，土豆网早在2008年就推出高清正版频道“黑豆”，当时也被外界猜测其将探索Hulu模式，不过王微并不这么认为，他表示用户贡献的内容一直占到八成比例，用户分享视频仍将是土豆网的很大部分。</p>\r\n<p>\r\n	　　深陷各种诉讼和版权混战之中，王微对于纠纷和盈利问题十分谨慎，始终未正面回答。有分析人士认为，王微所认为的Hulu模式不适合中国，也是由于中国视频版权过于分散，渠道也相对复杂，所以完全照搬会有一定难度。</p>\r\n<p>\r\n	　　不过对于长时间处于烧钱不能盈利的中国网络视频行业而言，完全正版化的Hulu模式无疑是解决广告收入的好方法。上述分析人士认为，在版权混战过后各网站策略和定位将逐步清晰，互联网视频今年有望形成相对稳定的格局。</p>\r\n','2010-03-19 14:57:20','2010-03-19 14:57:20',NULL,'土豆 王微 ','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','11,12',NULL,NULL,'13,18','Hulu模式照搬到中国不现实 ',NULL,1,NULL,'<br />\r\n',0),
 (25,23,100,0,1,NULL,NULL,'柳传志勾勒联想新路径：移动互联网机会来了','移动互联网机会来了','<p>\r\n	柳传志的柳氏智慧与管理理念成就了联想和其个人的传奇。</p>\r\n','<p>\r\n	大概一年前，已退休的柳传志重新担任联想集团董事局主席，在业界引发震动。如今柳传志面临的是金融危机与产业变革叠加所引发的新挑战和新机遇。云计算、物联网的出现，三网融合、四屏融合成为现实，计算机产业正面临“三十年未有之变局”。而联想已经形成了规模制造、销售的能力，还拥有了一定的研发创新能力。</p>\r\n<p>\r\n	　　上周联想控股有限公司董事长、总裁、党委书记、联想集团有限公司董事局主席柳传志就如何在新形势下破题接受了南方报业传媒集团记者联合采访。他说，联想不甘于现在的位置。</p>\r\n<p>\r\n	　　柳传志认为寻求技术突破是联想的一贯目标</p>\r\n<p>\r\n	　　<strong>我没有做过“制造”</strong></p>\r\n<p>\r\n	　　南方都市报(以下简称“南都”)：过去26年联想一直都是“中国制造”的成功典范，中国产业如今面临转型升级，联想在未来的路上会有怎样的思路？</p>\r\n<p>\r\n	　　柳传志：我从没觉得联想一开始就是走“中国制造”的路，然后到一个阶段飞跃到“中国创造”。我经常有种感触，中国的高科技企业，如何把技术跟市场结合，这一点可能更为重要。这些年联想研究院进行了大量投入，对前瞻性的事物深入研究，现在确实得到了一个好的机会，那就是移动互联网的出现，新的设备将突破原有的操作系统，可以不用微软操作系统，可以不用英特尔的CPU。我们相应的新产品4月份发布，这会突破原有的利润继续下降的状况。</p>\r\n<p>\r\n	　　在我心里，从来不认为联想永远就是制造型企业，联想应该永远是一个创新型的企业。在技术创新方面，企业确实需要有一定的积累，需要对市场有深刻的了解，技术和各个环节实现相互衔接，需要全面的管理能力、资金的积累等等。这有点像吃馒头，一个人吃到第四个馒头才能饱，你不能说吃前三个馒头的人一定就是“中国制造”，到第四个馒头才是“中国创造”。</p>\r\n<p>\r\n	　　我们从第一天开始，目标就是冲着将来在技术上要有所突破的公司。如果说，中国制造只是给人家做加工生产，这算是制造，那我从来不承认，我哪一天做过制造。</p>\r\n<p>\r\n	　　<strong>联想3+2破题路径</strong></p>\r\n<p>\r\n	　　南都：金融危机对PC产业冲击明显，尤其是对IBM等商务机市场。在金融危机最糟糕的09年之后，联想赢利的着力点将放在哪里？</p>\r\n<p>\r\n	　　柳传志：金融危机让联想出现较大的亏损，我们也探讨在战略上进行调整。首先，电脑行业里出现非常明显的发展规律，即商业客户增长的速度低于消费类客户的增长。联想并购的IBM PC在海外主要做商业客户，所以第一个调整是向消费类方面发展。这种转变意味着供应链调整，需要较大的投入，这一项工作会让公司的面貌有所变化。第二，加强对新兴市场的开拓。纵观世界整体发展状况，新兴市场的电脑行业发展(速度)高过成熟市场，联想要坚决扩大新兴市场的份额，这是联想实现市场提升的所在。第三，保住成熟市场。</p>\r\n<p>\r\n	　　这三点之后，联想接下来要做的一件事就是技术突破，推出一种全新的产品，是纯手持型的电脑，这种电话电脑将完全具备iPhone(手机上网)和黑莓的功能，而且价格还能够让中国的客户接受。这一产品将先在中国试练，再向世界其他地区推广，要能够经受住反复的考验，打出品牌。</p>\r\n<p>\r\n	　　再接下来，还要向更新的技术领域推进，比如物联网和云计算的结合，这一点是以后的部署计划，相关工作已经开始。</p>\r\n<p>\r\n	<strong>布局云计算需厚积薄发</strong></p>\r\n<p>\r\n	　　南都：您刚才提到了联想的几步走战略，能否介绍一下，物联网和云计算这些新事物的出现对PC产业格局的影响？</p>\r\n<p>\r\n	　　柳传志：我们刚开始调查研究，还没有正式形成战略部署。当物联网和云计算的结合出现，可能又是让人的生活方式和环境有一个巨大突破，突破到什么程度，现在还真是要看技术发展的状况。物联网本身实际上是传感器技术和云计算技术的结合。我在无锡时了解到，太湖里的蓝藻被发现时已经不可收拾。如果在太湖里把传感器撒下去，当有蓝藻苗出现时，通过传感和计算，人们能够及时、清楚地了解其动向。</p>\r\n<p>\r\n	　　南都：目前主要是美国的谷歌、微软在主导云计算的发展，您觉得中国企业能在哪些环节突破？</p>\r\n<p>\r\n	　　柳传志：中国企业在高性能服务器上虽然不能排在世界第一、第二，但是距离并不是很大，关键还是在软件水平，而这也是一个厚积薄发的过程。20年前我们卖电脑的时候，我们曾经有一支做软件服务的队伍，如今在分出去的神州数码。但是消费者往往不认同软件的价值，只愿意为硬件买单，这就使得中国的软件力量相对薄弱。其次是不能急，不能拿长跑当做短跑。我们做事的方法是把一个长远目标分成几个阶段，做第一个阶段的时候就要考虑为第二阶段做准备，边做边调整。现在我们第一件事是先把适合中国用的产品先推出，如三网合一的产品，这是我们的长项。</p>\r\n<p>\r\n	　　</p>\r\n','2010-03-19 15:01:10','2010-03-19 15:18:45',NULL,'移动互联网 ','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','14,16',NULL,NULL,'21,24','移动互联网机会来了',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0);
INSERT INTO `fb_news` (`id`,`category_id`,`priority`,`click_count`,`is_adopt`,`forbbide_copy`,`tags`,`title`,`short_title`,`description`,`content`,`created_at`,`last_edited_at`,`publisher`,`keywords`,`news_type`,`file_name`,`target_url`,`photo_src`,`video_photo_src`,`image_flag`,`video_flag`,`video_src`,`language_tag`,`author`,`related_news`,`pdf_src`,`ad_id`,`sub_headline`,`wap_title`,`author_id`,`author_type`,`author_image`,`top_info`,`set_up`) VALUES 
 (26,23,100,0,1,NULL,NULL,'领航资本创始人杨镭：将投资进行到底 扎根创投 ','领航资本创始人杨镭','<p>\r\n	他的身份不停地在创业者和职业经理人之间切换，他有四次成功创业的经历。如今，他找到了一项可以终身从事的职业——风险投资</p>\r\n','<p>\r\n	他称自己是“三清团”，从上幼儿园到读高中、上大学，都在清华。离开清华之后，他变成了一个不安分的人，他的身份不停地在创业者和职业经理人之间切换，他有四次成功创业的经历。如今，他找到了一项可以终身从事的职业——风险投资</p>\r\n<p>\r\n	　　6岁的时候，杨镭就开始在清华园里“啃”线装古书了，虽然无法全部看懂，但他却读得如醉如痴。</p>\r\n<p>\r\n	　　坐在位于北京市东三环边富尔大厦18层的办公楼里，看着三环路对面倾斜的央视新大楼，领航资本董事总经理杨镭回忆起了自己的成长岁月，他笑称自己是“三清团”，由于父母都在清华工作，杨镭从小在清华园长大，从上幼儿园到读高中，都没有离开过清华，其后短暂下乡插队，读大学时又回到了清华。</p>\r\n<p>\r\n	　　据杨镭介绍，由于在清华园，在高级知识分子扎堆的地方中长大，杨镭从小就爱学习，学习从来不让家长操心。而且受周围专家学者们的熏陶，他对物质看得很淡，养成了有抱负但又不张扬的性格。走上社会之后，也有很强的社会责任感。</p>\r\n<p>\r\n	　　当然，杨镭的清华童年也不乏童趣。当时的清华大学校园，远不如现在这么繁华，除了教学、居住设施之外，很多地方还很荒凉，杨镭抓鸟、摸鱼，游泳，溜冰，在那里度过了自己美好的童年时光。</p>\r\n<p>\r\n	　　1978年，杨镭考入清华大学电机系。在上大学的5年时间里，杨镭一直担任班里的团支部书记，同时积极参与学生会的工作，经常组织校内的各种大型文体活动，锻炼了他的组织和管理能力。</p>\r\n<p>\r\n	<strong>　　走出清华</strong></p>\r\n<p>\r\n	　　在清华上大学期间，杨镭的班主任是中国科学院院士、中国著名的自动控制和电力系统动态学专家卢强。文革之后年轻教师断档，给学生们上课的都是一批有名的老教授，他们讲课思路清晰，听起来特别过瘾，让杨镭受益匪浅。</p>\r\n<p>\r\n	　　杨镭回忆，清华有很多优秀的理念和传统，当时讲得并不多。他们在清华上学的时候，也常觉得日子很平淡，一天一天很快就过去了。只有走出校门以后，回想起自己在清华大学读书和生活的经历，才会发现那些理念和传统，对他们的成长有着潜移默化的作用，深刻地影响了他们的人生。</p>\r\n<p>\r\n	　　清华有句话叫“给你猎枪，不给你面包”，给你面包你觉得很高兴，但总有吃完的一天。而给你猎枪，你便可以拿着它打遍天下，在社会上立足，这辈子都有东西吃。这句话让杨镭终身受益。</p>\r\n<p>\r\n	　　清华还有一句话叫做“行胜于言”，清华的学生与其他学校的学生不同，清华人不善于张扬，做事扎实严谨。而且清华人抱团，协作精神很好，可以一起干事业。清华的校训——“厚德载物，自强不息”，要求清华学子要不断追求，不懈奋斗，绝不气馁。</p>\r\n<p>\r\n	　　杨镭大学毕业时，本来有机会留校任教，但他仔细想过之后，还是决定离开。因为清华还有一句老话——“清华一条虫，外面一条龙。</p>\r\n<p>\r\n	　　”这时候，杨镭发现自己是一个不安分的人，他不愿留在清华，继续过按部就班的生活，他渴望去外面，闯荡世界。</p>\r\n<p>\r\n	　　虽然大学毕业之后离开了清华，但杨镭对清华仍然怀有深厚的眷恋之情，他经常参加清华同学举办的活动，并且在校友邓锋的介绍下，加入了清华企业家协会（TEEC）。这个协会2001年成立于硅谷，参加者必须是清华毕业生，同时也得是知名企业的创始人或CEO。2007年，杨镭担任过该协会的主席，华旗爱国者的董事长冯军是现任主席。</p>\r\n<div style=\"page-break-after: always;\">\r\n	<span style=\"display: none;\">&nbsp;</span></div>\r\n<p>\r\n	<strong>　　创业狂人</strong></p>\r\n<p>\r\n	　　用杨镭的话来说，他喜欢不停地迎接挑战。他最喜欢的一个词是“创业者”，他以这个称号自励、自傲。因为愿意迎接挑战，所以接下来杨镭的人生显得丰富多彩。</p>\r\n<p>\r\n	　　研究生毕业后，杨镭被分配到水利电力部下属的一家研究所工作。他曾经作为专家组成员，参加了三峡方案的论证。论证工作结束后，研究所决定派杨镭出国学习。出国之前，在进行外语培训期间，杨镭和几个朋友一起创办了一家电脑销售公司。</p>\r\n<p>\r\n	　　虽然在筹集创业资金时遇到了一些困难，但困难解决之后，公司运营出奇的顺利，几个年轻人用了几分钟就赚到了“第一桶金”，用赚来的钱大家各自买了一双名牌鞋，吃了一顿海鲜。</p>\r\n<p>\r\n	　　杨镭去美国的的目是读博士，但刚到美国，他就被美国能源公司ABB相中。结果他放弃读书，去ABB工作了四年。这之后，杨镭渴望做更有挑战性的工作，于是自学了一些通讯方面的知识，跳槽去了硅谷的一家通讯公司。1994年，香港新世界电话公司到美国硅谷招聘高级管理人员，杨镭去了香港。在这家公司担任INFA电信销售和商业发展部总经理。</p>\r\n<p>\r\n	　　然而，在杨镭的内心深处，还是特别渴望创业，特别怀念和几个伙伴第一次在中国创业时的情景。因此，当创业机会再度降临时，杨镭伸手就抓住了它。</p>\r\n<p>\r\n	　　1995年9月，美国波士顿技术公司旗下STI公司的一位高管找到杨镭，答应给杨镭投资一笔钱，并让他以STI公司CEO的身份回中国，推销该公司的“语音信箱”等产品。杨镭看到再次创业的机会来了，于是毅然放弃了在香港的高薪和舒适的生活，开始了他的第二次创业。</p>\r\n<p>\r\n	　　这是杨镭创业经历中较为艰难的一次。STI公司给的创业投资很少，为节约成本，杨镭住在借来的一套房子里。前8个月，杨镭早出晚归四处奔波，但一分钱收入也没有。“那时候，你会怀疑自己做的这件事情到底对不对，你所做的产品会不会被市场接受。”杨镭回忆。还好，到了第九个月的时候，公司获得了一笔数千万元的订单，情况立刻出现了逆转。</p>\r\n<p>\r\n	　　经过3年多的努力，STI产品在中国的市场占有率，由零迅速提升到了70%，成功地占领了中国市场，杨镭也被媒体称为是“开拓中国语音和手机短信的第一人”。</p>\r\n<p>\r\n	　　1999年初，波士顿技术公司与另一家美国公司合并，利用这个机会，杨镭回到硅谷度假。当时正值网络投资热潮，看到当地年轻人的创业狂热，杨镭也热血沸腾，他立即作出决定，留在硅谷，开始自己人生的第三次创业。</p>\r\n<p>\r\n	　　在进行了初步的市场调研之后，杨镭与两个朋友一起成立了一家名叫网络情报的公司，主要业务是对市场上不同厂家同类产品的价格进行比较，类似如今的互联网搜索引擎。</p>\r\n<p>\r\n	　　在美国，中国人要想得到风险投资，非常困难。经过不懈地努力，杨镭得到了美国“风险投资之父”ArthurRock的投资。2003年，网络情报公司已经做得有声有色，一大批美国大公司成了他们的固定客户。</p>\r\n<p>\r\n	　　也是在这一年，经掌上灵通创始人吴峻力邀，杨镭回到上海，担任掌上灵通的CEO。掌上灵通是一家从事无线增值业务的公司，主要为手机用户提供短信、游戏等服务。杨镭带领掌上灵通迅速扭亏为盈。2004年3月，掌上灵通成功登陆纳斯达克。杨镭还将掌上灵通上市的故事写成了一本书，名字叫《飞向纳斯达克的分分秒秒》。如今这本书已经成为很多企业高管带领企业去纳斯达克上市之前的必读书。</p>\r\n<p>\r\n	　　后来，由于受到无线运营商的挤压，作为无线增值服务商的掌上灵通生存空间越来越小，利润也逐年下滑，杨镭感到很憋屈。2006年2月，杨镭再次跳槽。这一次，他放弃做实业，投身投资行业。他接受了清华校友邓锋的邀请，担任北极光创投的投资合伙人。离开北极光创投之后，2008年10月，杨镭第四次创业，创立了领航资本投资公司。</p>\r\n<p>\r\n	<strong>　扎根创投</strong></p>\r\n<p>\r\n	　　有一段时间，甚至包括杨镭的父母，都觉得他的职业变换得太快了。当杨镭暂时稳定下来后，他们劝杨镭说：“现在这个工作挺好，你不要再跳了啊。”可是没过多久，杨镭又换工作了，因为他喜欢寻找新的机会，喜欢不断地挑战自我。用杨镭的话说就是，“我已经爬上了一座高山，但前面还有一座更高的山峰我要去征服。为了登上另一座山峰，我必须先回到谷底。”</p>\r\n<p>\r\n	　　不过，创立领航资本之后，杨镭表示，如果不出意外，他不会再改变所从事的行业了，因为投资是一个可以终身从事的职业，是一个可以至死方休的职业。</p>\r\n<p>\r\n	　　杨镭介绍，他和风险投资公司接触，最早是在1999年。当时杨镭在硅谷创业，为了获得投资，杨镭几乎拜访过硅谷所有顶尖的风险投资公司。几经周折，终于获得了风投。其后，杨镭经常和风投的人一起工作、交流，对风投的行事风格非常了解，当时杨镭就觉得风险投资这项工作他也可以做。</p>\r\n<p>\r\n	　　成功创业和经营企业的经历，锻炼了杨镭，让他对企业有一种得天独厚的判断力，可以很敏锐地判断出一家企业是否有前途，产品是否有市场。有了一定的积累之后，杨镭也一直在做天使投资人，看到好的项目，他就以个人名义加以投资，结果他投资的项目，大部分都获得了非常丰厚的回报。</p>\r\n<p>\r\n	　　进入北极光创投后，杨镭获得了更多实战的机会，掌握了更多的投资技能，从一个优秀的创业者逐步转变成一个优秀的投资家。在北极光创投期间，杨镭前后共参与投资了十多个项目，几个他主要参与投资的项目，今天回过头来看，都很不错，最好的项目已获得了十倍以上的升值。而他拒绝投资的项目，回过头来看，基本上都出了问题。</p>\r\n<p>\r\n	　　从事风险投资工作给了杨镭更多的自信，所以离开北极光创投之后，在朋友的邀请下，杨镭又加入了领航资本的创业团队。</p>\r\n<p>\r\n	　　丰富的人生阅历，帮助杨镭积累了大量的人脉。为了成立领航资本，杨镭邀请自己的老朋友新华都公司CEO唐骏、恒基伟业总裁张征宇等业内资深大腕，做投资合伙人，对领航资本进行投资。据杨镭介绍，领航资本一期基金规模在1亿美元以上。</p>\r\n<p>\r\n	　　其普通合伙人主要是来自欧洲和日本等国家和地区的财团，包括保险公司、证券公司，国际国内知名大企业的投资基金等。</p>\r\n<p>\r\n	　　领航资本总的说来是成长型基金，以投资高科技、高成长的企业为主，主要做新能源、健康、环保等领域的投资，原则上每个项目的投资额会在300万到700万美元之间，对项目的总体要求希望满足四个条件：已验证的商业模式，一定规模的收入，已经或者将要实现利润，每年具有50%以上的成长性。</p>\r\n<p>\r\n	　　杨镭介绍，金融危机对他们的投资几乎没有产生影响。因为领航资本是一支新的投资基金，没有背包袱，可以轻装上阵。金融危机对他们反而是个机会。经济不好的时候，资产价格比较低，企业家心态也比较好，相对而言，更容易找到好项目。目前，他们手中已经积累了一些好项目，2009年预计会投资5到7个左右的项目。</p>\r\n','2010-03-19 15:23:11','2010-03-19 15:23:11',NULL,'杨镭 掌上灵通 创投人','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','11,8',NULL,NULL,'17,25','领航资本创始人杨镭',NULL,1,NULL,'<br />\r\n',0),
 (27,23,100,0,1,NULL,NULL,'杨镭笃定投资圈 泰山基金圆天使梦继续修炼心态 ','泰山基金圆天使梦继续修炼心态 ','<p>\r\n	<font face=\"楷体_GB2312\">　从创业者转型为投资人之后，杨镭终于决心“安定”下来，将自己“未来的青春”一心一意投入到风险投资领域。</font></p>\r\n','<p>\r\n	　杨镭的“不安分”是“有案可查”的。</p>\r\n<p>\r\n	　　1983年从清华大学电机系毕业后，他每几年就要更新一次自己的工作环境和记录：1988年，在北京中关村创办电脑公司；1989年，任美国能源公司ABB亚太区项目技术经理；1993年，加入美国硅谷一家通信公司；1994年，任香港新世界电话公司INFA电信销售与商业发展部总经理；1995年，加入波士顿STI公司，回国开拓中国语音信箱及短信市场；1999年，获“风险投资之父”Author Rock的青睐，在美国创办 RIVAL WATCH（网络情报）公司；2003年，回国出任灵通网CEO，11个月后带领该公司在纳斯达克上市；2006年，加盟北极光创投，涉足风险投资领域；2008年，成立领航资本风险投资基金，任董事总经理；2009年，联合欧洲最大的机构天使投资者山友集团，成立泰山天使投资基金，任创始合伙人。</p>\r\n<p>\r\n	　　“我是一个耐不住寂寞的人。”杨镭这样解释自己的职业生涯，“在工作中，如果觉得再找不到一种力量，或者是激发潜力空间的时候，我就会跳出来。”</p>\r\n<p>\r\n	　<strong>　泰山天使：情结</strong></p>\r\n<p>\r\n	　　随着接触的企业、创业者越来越多，杨镭发现自己过去的经验、积累的行业和人脉资源可以帮助更多创业者，而这也是更好实现个人价值的一种方式。“目前我的主要精力放在领航资本，这是我的职业；成立泰山天使投资基金，则是另外一种情结——国内的天使投资基金太少了，风险投资基金更喜欢关注成长期的企业，而处于‘死亡谷’阶段的企业基本被忽视了。我希望能把国外一些相对成功的天使基金模式、经验、多元的退出渠道借鉴过来，创建中国天使投资领先性机构，来帮助初创型公司更好地成长。”</p>\r\n<p>\r\n	　　在国外，天使投资基金的发展相对比较成熟。据相关数据显示，在欧美发达国家，天使基金所投的公司项目数平均为风险投资基金的20倍左右，其资金总量也较为充足；而国内，充当天使投资人角色的，大多为成功的企业家，不成规模，行为、分布都比较分散。</p>\r\n<p>\r\n	　　“天使和VC的最大区别在于，VC用别人的钱投资，天使则用自己的钱投资。天使是个人行为，并非一项职业，甚至更像一种爱好，就像你去搜集古董、字画。再加上较高的投资风险，以及所需的投资激情、经验等因素，这类人群就变得非常少了。”杨镭解释道。</p>\r\n<p>\r\n	　　另外，倘若把创业比喻为做菜，那么天使投资也许在买菜、洗菜的阶段就要介入，甚至要和创业者一起研究配方，一起做菜；而风险投资往往在后期基本成熟的阶段介入，并不需要参与具体运营和管理。</p>\r\n<p>\r\n	　　如果说风险投资是靠质量取胜，那么天使投资往往是在项目数量上下功夫。以欧洲山友集团的创始人Dr. Cornelius Boersch为例，15年来先后投资了近400家公司，虽然仅1/10获得了良好的回报，但足以让他赚得盆满钵满；就像好莱坞的电影制作，十个中有一个成功，就足以赚回所有的成本。在投资领域，与更大风险相伴的往往有更高的利润。</p>\r\n<p>\r\n	　　“泰山天使投资基金一期规模2000万美元，主要出资方是欧洲山友集团，目前在北京已经有十多个天使投资人加入，很快我们会在上海、深圳等地发展起来。泰山天使投资基金有点像俱乐部这种形式，我更多是在搭一个平台，让很多有才华、有经济实力、有理想、有热情的人一起创造。”杨镭说。从项目角度来说，泰山天使投资基金的单笔投资额度在10万至50万美元之间；同时不以地域、领域为界限，更强调项目本身的回报机会。</p>\r\n<p>\r\n	　　现在，如果走进杨镭位于北京CBD的泰山天使投资基金办公室，你也许就能找到一种“门庭若市”的感觉。“我们每天至少都要看五六个项目，还有很多项目通过各种渠道和方式找上门来。今天早上还有一个外地赶来的创业者，等了5个小时要见我们……”杨镭说，“在未来三四年中，泰山天使投资基金计划投上百个项目。”</p>\r\n<p>\r\n	　　在天使投资项目上，杨镭是主要把关人，他有三点原则：第一，创业者必须全身心投入，不能兼职或利用业余时间来做；第二，创业初期必须拿很少的工资，最好自己再能投入一点钱，这是决心的表现；第三，就是好的市场前景、商业模式及创业团队。</p>\r\n<p>\r\n	<strong>领航资本：职业</strong></p>\r\n<p>\r\n	　　和每周五在泰山天使投资基金的办公室工作一天不同，杨镭每周的前四天几乎都在为领航资本“打拼奔波”。</p>\r\n<p>\r\n	　　领航资本是杨镭在“金融风暴”之前成立的一支风险投资基金，一期规模1亿美元，其普通合伙人主要是来自欧洲、日本等国家和地区的财团，包括保险公司、证券公司、投资基金等，比如大和集团、三井住友。该基金以投资高科技、高成长企业为主，主要做新能源、健康、环保等领域的投资，原则上每个项目的投资额在300万至700万美元之间。</p>\r\n<p>\r\n	　　“在领航资本，我们对项目总体有几个条件，比如已验证的商业模式；一定规模的收入，已经或者将要实现利润；每年具有50％以上的成长性。”杨镭介绍说，因为领航资本是一支新投资基金，没有背包袱，可以轻装上阵，金融危机对他们反而是个机会。经济低谷期，资产估值比较低，相对而言更容易找到好项目。2009年预计会投资5-7个左右的项目，目前有3个已经达成了投资意向。</p>\r\n<p>\r\n	　　虽然身为投资人，但作为一支新基金的创始人，从另一个角度来看，杨镭依然在“创业的路上”。新基金，更需要尽快用优秀成绩来证明自己。</p>\r\n<p>\r\n	　　“有时做投资就像在逛艺术品博物馆，不同的风险投资机构，会有不同的投资眼光；领航资本要做的，就是要打造一个精品投资公司，宁缺毋滥，以质量和投资回报率取胜。”杨镭希望通过自己广阔的人脉圈及各种渠道，从不同行业中选择出数一数二的企业去投资，和它们合作，共同打造精品公司。</p>\r\n<p>\r\n	　　领航资本的另一个特点就是，投资以后会花很多的力量去帮助被投公司。“比如在初期，我会花两三个星期到公司去跟他们沟通、交谈，甚至帮他们去见客户、做订单、制定战略等。”杨镭说。</p>\r\n<div style=\"page-break-after: always;\">\r\n	<span style=\"display: none;\">&nbsp;</span></div>\r\n<p>\r\n	<strong>　　继续修炼：心态</strong></p>\r\n<p>\r\n	　　虽然早已是“资深创业者”和“新兴投资人”，经历了“商海”二十余年的起起伏伏，杨镭依然认为，投资是一项非常难做的工作，用投行人自己一句比较调侃的话说就是“一个案子，结果没投成，后悔一辈子；倘若投进去，一辈子后悔”。“从分析到决策再到后期跟踪、执行，都很复杂，更没有一个案子是你觉得一定会赚钱的，还有不少的运气成分在里面。”</p>\r\n<p>\r\n	　　同时在杨镭看来，中国创业者最大的优势就是他们对市场的敏感度，以及那种在挫折中执著、顽强的精神，问题就在于长板很长，短板也非常明显；启动能力强，后劲却不足。“很多创业家都在初期把企业做得有声有色，如把一个企业比喻成一个孩子的话，他成长到十七八岁，开始成为青年人走向社会的时候，抽烟、喝酒很多问题都出现了。”</p>\r\n<p>\r\n	　　作为投资人，杨镭力求自己能用一种平常的心态去对待案子。“有好的案子我就追，若追不到，或因别人争抢导致价格虚高，也不勉强去争。”他认为，无论做创业者还是投资人，心态都是很重要的，而这一点，他自己还在继续修炼中。</p>\r\n<p>\r\n	 </p>\r\n','2010-03-19 15:26:17','2010-03-19 15:26:17',NULL,'杨镭  泰山资本 天使投资','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','26',NULL,NULL,'26','泰山基金圆天使梦继续修炼心态 ',NULL,1,NULL,'<br />\r\n',0),
 (28,25,100,0,1,NULL,NULL,'创业路上的五点建议','创业路上的五点建议','<p>\r\n	 </p>\r\n','<p>\r\n	1、选择你所关心的，选择你所喜欢的。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 命运不是机遇，而是选择。在我们的生活中，除了姓氏、血型等于生俱带的东西不可以选择，其他都可以进行选择。所谓生活，就是不停的在做选择题。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 创业更是如此。既然是选择题，为何不让自己的心里阳光一点呢？</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 选择自己关心的、喜欢的并适合的创业方向才是真正有发展的。兴趣是最好的老师，兴趣就是支持你走下去，发展壮大自己的事业，直到自己成功的最大动力和灵感。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; “做自己喜欢和善于做的事，上帝也会助你走向成功。”这是世界首富比尔。盖茨说过的一句话。比尔。盖茨是计算机方面的天才，早在他还没有成名的时候，他对计算机就十分痴迷，并且是一个典型的工作狂，但这种“工作”完全是出于一种本能的爱好，这种爱好在他在湖滨中学时期就已表现得淋漓尽致。那时候，为了研究和电脑玩扑克的程序，他简直到了如饥似渴的程度。扑克和计算机消耗了他的大部分时间。像其他所专注的事情一样，盖茨玩扑克很认真，但他第一次玩得糟透了，但他并不气馁，最后终于成了扑克高手，并研制成了这种计算机程序。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、关心你所选择的，喜欢你所选择的。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 在做选择题之前，我们可以去犹豫，去彷徨，一旦选定，就要关心你所选择的，喜欢你所选择的，就要一往无前。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 就好像一支香烟，可以选择去博物馆，可以选择静静的躺在烟盒里。但是，只有她选择了火柴之后，她的生命、她的价值才可能充分燃烧。否则，即使她有纤细的外壳，有一根根柔韧的烟丝，也就是个摆设。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 选择你所喜欢的，喜欢你所选择的。不是每个人都有运气能拥有自己喜欢的事业。所以，当很多条件决定了我们不能选择我们真正喜欢的人的时候，我们所能做的，就是喜欢我们所选择的。不要羡慕别人的幸福和快乐，用心珍惜自己的所有，你也会和他一样地幸福快乐。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3、创业需要热情，但热情也要适度。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 创业最需要的是什么？毫无疑问，就是热情。因为，创业初期，你可能一无所有。但最不缺少的，就是热情。只要有了热情，就可能燃起创业的那团火。星星之火，都可以燎原，更何况一团火呢。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 但我要说的是，我们对创业的热情应该适度。人类应该留一些时间和空间给多样化的人性追求。你可以对每一样追求都抱有热情，但是稍做调整可以为你带来适度的热情。当你是一位创业人士的时候，你会对自己的梦想充满热情，但是你也可以很关心生活中的其他方面。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 或者说，百分百的工作狂是很难成功的。尤其当你是一个团队的老大，一个CEO的时候，更是如此。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4、不要以为自己什么都懂。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 人和人之间是有差别的，每个人都有优势，都有擅长和不擅长的东西，关键是要对自己有所认识。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 这一点，在很多功成名就的职业经理人开始创业的时候，表现的最为明显。曾经的在很大的公司里做过CEO，做过高管，就以为自己吃嘛嘛香，干嘛嘛会了。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5、不要咬太大口，嘴巴会嚼不动。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 做梦不罚款，不上税。做梦的时候，可以想做多大的创业梦就做多大，但是当你已经准备好要实现它的时候，你就要理智一些，把你的梦想与生活结合起来。这也许有点难，特别是第一次。但是不要让它阻住你的脚步。你知道你必须尝试，即使结果可能是失败。但不是说你要鲁莽，要增加你失败的可能性，所以要花时间评估一下自己，根据能力制订自己的梦想。</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 专注于市场中一个尽可能小的可能存在的难题，而你又能够帮助客户解决这个难题。不要想着什么都做，贪多嚼不烂。小可以变大，船小好调头，小可以带给你很多优势，缝隙市场可以变成一个大市场。不要试图把几亿上网用户都当成你的用户，没用，能真正解决一部分用户的一部分需求，就足够你玩儿的。</p>\r\n','2010-03-19 15:54:11','2010-03-19 15:54:11',NULL,'创业','1',NULL,NULL,NULL,NULL,0,0,NULL,0,'超级管理员','11,12',NULL,NULL,'11,12','创业路上的五点建议',NULL,1,NULL,'<p>\r\n	 </p>\r\n',0);
/*!40000 ALTER TABLE `fb_news` ENABLE KEYS */;


--
-- Definition of table `fb_news_relationship`
--

DROP TABLE IF EXISTS `fb_news_relationship`;
CREATE TABLE `fb_news_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chinese_news_id` int(11) NOT NULL COMMENT '涓枃鏂伴椈ID',
  `english_news_id` int(11) NOT NULL COMMENT '鑻辨枃鏂伴椈ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='涓嫳鏂囨柊闂诲叧鑱旇〃';

--
-- Dumping data for table `fb_news_relationship`
--

/*!40000 ALTER TABLE `fb_news_relationship` DISABLE KEYS */;
INSERT INTO `fb_news_relationship` (`id`,`chinese_news_id`,`english_news_id`) VALUES 
 (2,8,9),
 (3,3,10);
/*!40000 ALTER TABLE `fb_news_relationship` ENABLE KEYS */;


--
-- Definition of table `fb_position`
--

DROP TABLE IF EXISTS `fb_position`;
CREATE TABLE `fb_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `position_limit` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_position`
--

/*!40000 ALTER TABLE `fb_position` DISABLE KEYS */;
INSERT INTO `fb_position` (`id`,`name`,`type`,`page_id`,`category_id`,`position_limit`) VALUES 
 (1,'首页',NULL,0,NULL,NULL),
 (2,'每日头条','category',1,6,4),
 (3,'陆家嘴早餐',NULL,1,NULL,3),
 (4,'投资首页',NULL,0,NULL,NULL),
 (6,'投资首页头条','news',4,18,5),
 (7,'投资首页投资文章','category',4,18,5),
 (8,'投资首页文章','category',4,20,10),
 (9,'投资首页投资专题','category',4,19,8),
 (10,'投资首页投资专栏','category',4,21,3),
 (11,'创业首页',NULL,0,NULL,NULL),
 (12,'创业首页头条','news',11,NULL,5),
 (13,'创业首页创业文章','category',11,23,5),
 (14,'创业首页文章','category',11,25,10),
 (15,'创业首页创业专题','category',11,24,8),
 (16,'创业首页创业专栏','category',11,26,3),
 (17,'商业首页',NULL,0,NULL,NULL),
 (18,'商业首页头条','news',17,NULL,5),
 (19,'商业首页商业文章','category',17,28,5),
 (20,'商业首页文章','category',17,30,10),
 (21,'商业首页商业专题','category',17,29,8),
 (22,'商业首页商业专栏','category',17,31,3),
 (23,'科技首页',NULL,0,NULL,NULL),
 (24,'科技首页头条','news',23,NULL,5),
 (25,'科技首页科技文章','category',23,33,5),
 (26,'科技首页文章','category',23,35,10),
 (27,'科技首页科技专题','category',23,34,8),
 (28,'科技首页科技专栏','category',23,36,3);
/*!40000 ALTER TABLE `fb_position` ENABLE KEYS */;


--
-- Definition of table `fb_position_relation`
--

DROP TABLE IF EXISTS `fb_position_relation`;
CREATE TABLE `fb_position_relation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(10) unsigned DEFAULT NULL,
  `news_id` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_position_relation`
--

/*!40000 ALTER TABLE `fb_position_relation` DISABLE KEYS */;
INSERT INTO `fb_position_relation` (`id`,`position_id`,`news_id`,`priority`) VALUES 
 (1,2,8,1),
 (2,2,7,2),
 (3,2,6,3),
 (4,6,26,1),
 (5,6,25,2),
 (6,6,24,3),
 (7,6,22,4),
 (9,7,18,NULL),
 (10,7,17,NULL),
 (11,7,16,NULL),
 (12,7,15,NULL),
 (13,7,14,NULL),
 (14,6,21,5),
 (15,12,8,NULL),
 (16,12,7,NULL),
 (17,12,26,NULL),
 (18,12,24,NULL),
 (19,12,23,NULL),
 (20,18,21,NULL),
 (21,18,20,NULL),
 (22,18,14,NULL),
 (23,18,13,NULL),
 (24,18,11,NULL),
 (25,24,21,NULL),
 (26,24,24,NULL),
 (27,24,17,NULL),
 (28,24,26,NULL),
 (29,24,28,NULL);
/*!40000 ALTER TABLE `fb_position_relation` ENABLE KEYS */;


--
-- Definition of table `fb_user`
--

DROP TABLE IF EXISTS `fb_user`;
CREATE TABLE `fb_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT 'member',
  `role_level` int(10) unsigned DEFAULT '0',
  `image_src` varchar(255) DEFAULT NULL,
  `descripition` text,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `fb_user`
--

/*!40000 ALTER TABLE `fb_user` DISABLE KEYS */;
INSERT INTO `fb_user` (`id`,`name`,`nick_name`,`password`,`role_name`,`role_level`,`image_src`,`descripition`) VALUES 
 (1,'admin','超级管理员','admin','admin',2,NULL,NULL),
 (2,'editor','编辑','editor','admin',1,NULL,NULL);
/*!40000 ALTER TABLE `fb_user` ENABLE KEYS */;


--
-- Definition of table `fb_video`
--

DROP TABLE IF EXISTS `fb_video`;
CREATE TABLE `fb_video` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fb_video`
--

/*!40000 ALTER TABLE `fb_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_video` ENABLE KEYS */;


--
-- Definition of table `fb_yh`
--

DROP TABLE IF EXISTS `fb_yh`;
CREATE TABLE `fb_yh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `fb_yh`
--

/*!40000 ALTER TABLE `fb_yh` DISABLE KEYS */;
INSERT INTO `fb_yh` (`id`,`name`,`email`,`password`) VALUES 
 (1,'justin','411192132@163.com','53dd9c6005f3cdfc5a69c5c07388016d');
/*!40000 ALTER TABLE `fb_yh` ENABLE KEYS */;


--
-- Definition of table `fb_yh_dy`
--

DROP TABLE IF EXISTS `fb_yh_dy`;
CREATE TABLE `fb_yh_dy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yh_id` int(10) unsigned DEFAULT NULL COMMENT '用户ID',
  `jhtj` int(10) unsigned DEFAULT NULL COMMENT '精华推荐',
  `fh` int(10) unsigned DEFAULT NULL COMMENT '富豪',
  `cy` int(10) unsigned DEFAULT NULL COMMENT '创业',
  `sy` int(10) unsigned DEFAULT NULL COMMENT '商业',
  `kj` int(10) unsigned DEFAULT NULL COMMENT '科技',
  `tz` int(10) unsigned DEFAULT NULL COMMENT '投资',
  `sh` int(10) unsigned DEFAULT NULL COMMENT '生活',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户订阅信息';

--
-- Dumping data for table `fb_yh_dy`
--

/*!40000 ALTER TABLE `fb_yh_dy` DISABLE KEYS */;
INSERT INTO `fb_yh_dy` (`id`,`yh_id`,`jhtj`,`fh`,`cy`,`sy`,`kj`,`tz`,`sh`) VALUES 
 (1,1,NULL,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `fb_yh_dy` ENABLE KEYS */;


--
-- Definition of table `fb_yh_log`
--

DROP TABLE IF EXISTS `fb_yh_log`;
CREATE TABLE `fb_yh_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yh_id` int(10) unsigned DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登录记录';

--
-- Dumping data for table `fb_yh_log`
--

/*!40000 ALTER TABLE `fb_yh_log` DISABLE KEYS */;
INSERT INTO `fb_yh_log` (`id`,`yh_id`,`time`) VALUES 
 (1,1,'2010-03-17 15:03:02'),
 (2,1,'2010-03-17 17:15:22'),
 (3,1,'2010-03-18 16:24:39');
/*!40000 ALTER TABLE `fb_yh_log` ENABLE KEYS */;


--
-- Definition of table `fb_yh_sc`
--

DROP TABLE IF EXISTS `fb_yh_sc`;
CREATE TABLE `fb_yh_sc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yh_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `type` int(10) unsigned NOT NULL COMMENT '收藏类型，1为文章，2为富豪，3为名人',
  `item_id` int(10) unsigned NOT NULL COMMENT '收藏项目ID',
  `time` datetime NOT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收藏';

--
-- Dumping data for table `fb_yh_sc`
--

/*!40000 ALTER TABLE `fb_yh_sc` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_yh_sc` ENABLE KEYS */;


--
-- Definition of table `fb_yh_xx`
--

DROP TABLE IF EXISTS `fb_yh_xx`;
CREATE TABLE `fb_yh_xx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hy` varchar(255) DEFAULT NULL COMMENT '行业',
  `zw` varchar(255) DEFAULT NULL COMMENT '职位',
  `xb` varchar(10) DEFAULT NULL COMMENT '性别',
  `sf` varchar(100) DEFAULT NULL COMMENT '省份',
  `cs` varchar(100) DEFAULT NULL COMMENT '城市',
  `xl` varchar(255) DEFAULT NULL COMMENT '学历',
  `gzdw` varchar(255) DEFAULT NULL COMMENT '工作单位',
  `gsxz` varchar(255) DEFAULT NULL COMMENT '公司性质',
  `gsgm` varchar(255) DEFAULT NULL COMMENT '公司员工规模',
  `sfss` varchar(10) DEFAULT NULL COMMENT '是否是上市公司',
  `szbm` varchar(255) DEFAULT NULL COMMENT '所在部门',
  `gscp` varchar(255) DEFAULT NULL COMMENT '公司制造的产品',
  `gsyye` varchar(255) DEFAULT NULL COMMENT '公司年营业额',
  `grsr` varchar(255) DEFAULT NULL COMMENT '个人年收入',
  `txdz` varchar(255) DEFAULT NULL COMMENT '通信地址',
  `yb` varchar(255) DEFAULT NULL COMMENT '邮编',
  `gddh1` varchar(255) DEFAULT NULL COMMENT '固定电话-区号',
  `gddh2` varchar(255) DEFAULT NULL COMMENT '固定电话-总机',
  `gddh3` varchar(255) DEFAULT NULL COMMENT '固定电话-分机',
  `sj` varchar(255) DEFAULT NULL COMMENT '手机',
  `msn` varchar(255) DEFAULT NULL COMMENT 'msn',
  `qq` varchar(255) DEFAULT NULL COMMENT 'qq',
  `tx` varchar(255) DEFAULT NULL COMMENT '头像',
  `time` datetime DEFAULT NULL COMMENT '注册时间',
  `xm` varchar(100) DEFAULT NULL COMMENT '姓名',
  `yh_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息';

--
-- Dumping data for table `fb_yh_xx`
--

/*!40000 ALTER TABLE `fb_yh_xx` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_yh_xx` ENABLE KEYS */;


--
-- Definition of table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `pwd` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `test`
--

/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
