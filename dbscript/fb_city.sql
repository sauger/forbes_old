DROP TABLE IF EXISTS `forbes`.`fb_city`;
CREATE TABLE  `forbes`.`fb_city` (
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

DROP TABLE IF EXISTS `forbes`.`fb_city_list`;
CREATE TABLE  `forbes`.`fb_city_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市榜单';

DROP TABLE IF EXISTS `forbes`.`fb_city_list_attribute`;
CREATE TABLE  `forbes`.`fb_city_list_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(10) unsigned DEFAULT NULL COMMENT '榜单ID',
  `name` varchar(255) DEFAULT NULL COMMENT '属性名',
  `priority` int(10) unsigned DEFAULT NULL COMMENT '属性位置',
  `list_order` int(10) unsigned DEFAULT '0' COMMENT '顺序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市榜单属性';

DROP TABLE IF EXISTS `forbes`.`fb_city_list_content`;
CREATE TABLE  `forbes`.`fb_city_list_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned DEFAULT NULL COMMENT '城市ID',
  `list_id` int(10) unsigned DEFAULT NULL COMMENT '榜单ID',
  `attribute_id` int(10) unsigned DEFAULT NULL COMMENT '属性ID',
  `value` varchar(255) DEFAULT NULL COMMENT '属性内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市榜内容';