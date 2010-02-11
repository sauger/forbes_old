DROP TABLE IF EXISTS `forbes`.`fb_mr`;
CREATE TABLE  `forbes`.`fb_mr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(10) unsigned DEFAULT NULL COMMENT '年份',
  `zy` varchar(255) DEFAULT NULL COMMENT '职业',
  `sr` float DEFAULT NULL COMMENT '收入',
  `bgl` float DEFAULT NULL COMMENT '曝光率',
  `sbly` text COMMENT '上榜理由',
  `mr_zp` varchar(255) DEFAULT NULL COMMENT '名人照片',
  `mr_jj` text COMMENT '名人简介',
  `zhpm` int(10) unsigned DEFAULT NULL COMMENT '综合排名',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `xb` varchar(45) DEFAULT NULL COMMENT '性别',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`sr`,`bgl`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;