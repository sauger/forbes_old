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
-- Table structure for table `fb_rights`
--

DROP TABLE IF EXISTS `fb_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fb_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '权限类型1：系统权限2：后台菜单权限',
  `nick_name` varchar(255) DEFAULT NULL COMMENT '昵称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fb_rights`
--

LOCK TABLES `fb_rights` WRITE;
/*!40000 ALTER TABLE `fb_rights` DISABLE KEYS */;
INSERT INTO `fb_rights` VALUES (20,'4',2,'新闻管理'),(21,'5',2,'图片管理'),(22,'6',2,'视频管理'),(23,'7',2,'新闻类别管理'),(24,'8',2,'图片类别管理'),(25,'9',2,'视频类别管理'),(26,'10',2,'菜单管理'),(27,'11',2,'用户管理'),(28,'12',2,'数据库管理'),(29,'26',2,'文章榜单'),(30,'29',2,'文章发布统计'),(31,'30',2,'常规榜单管理'),(32,'31',2,'图片榜单管理'),(33,'32',2,'文章榜单管理'),(34,'33',2,'行业管理'),(35,'34',2,'敏感词管理'),(36,'36',2,'静态化首页'),(37,'37',2,'静态化顶部'),(38,'38',2,'静态化底部'),(39,'40',2,'顶部FLASH'),(40,'41',2,'中部flash'),(41,'42',2,'新闻flash'),(42,'43',2,'网站首页'),(43,'44',2,'公司管理'),(44,'45',2,'名人管理'),(45,'46',2,'富豪管理'),(46,'47',2,'汇率管理'),(47,'48',2,'城市管理'),(48,'49',2,'导航管理'),(49,'50',2,'富豪首页'),(50,'51',2,'榜单首页'),(51,'52',2,'投资首页'),(52,'53',2,'创业首页'),(53,'54',2,'商业首页'),(54,'55',2,'科技首页'),(55,'56',2,'城市首页'),(56,'57',2,'活动管理'),(57,'62',2,'生活首页'),(58,'64',2,'杂志管理'),(59,'65',2,'往期杂志管理'),(60,'66',2,'杂志订阅查看'),(61,'67',2,'专栏首页'),(62,'68',2,'角色管理'),(63,'top_news',1,'置顶新闻'),(64,'comment_news',1,'管理新闻评论'),(65,'publish_news',1,'发布新闻'),(66,'delete_news',1,'删除新闻');
/*!40000 ALTER TABLE `fb_rights` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-17 13:35:51
