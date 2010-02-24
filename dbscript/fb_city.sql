DROP TABLE IF EXISTS `forbes`.`fb_city`;
CREATE TABLE  `forbes`.`fb_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `province_name` varchar(255) DEFAULT NULL COMMENT '所属省',
  `level` int(10) unsigned DEFAULT NULL COMMENT '行政级别，1直辖市2省会城市3计划单列市4地级市5县级市',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市';