CREATE TABLE  `forbes`.`fb_page_pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '位置名称，唯一',
  `display` varchar(500) DEFAULT NULL COMMENT '显示字符串',
  `href` varchar(256) DEFAULT NULL COMMENT 'url链接地址',
  `image1` varchar(256) DEFAULT NULL COMMENT '图片1链接',
  `image2` varchar(256) DEFAULT NULL COMMENT '图片2链接',
  `page_name` varchar(50) DEFAULT NULL COMMENT '页面名称',
  `end_time` varchar(20) DEFAULT NULL COMMENT '过期时间',
  `description` varchar(256) DEFAULT NULL COMMENT '描述',
  `alias` varchar(50) DEFAULT NULL COMMENT 'name的别名',
  `static_href` varchar(256) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL COMMENT '注释',
  PRIMARY KEY (`id`),
  KEY `new_index1` (`page_name`),
  KEY `new_index2` (`name`)
);
