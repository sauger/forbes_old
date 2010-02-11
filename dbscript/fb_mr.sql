DROP TABLE IF EXISTS `forbes`.`fb_mr`;
CREATE TABLE  `forbes`.`fb_mr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zy` varchar(255) DEFAULT NULL COMMENT '职业',
  `mr_zp` varchar(255) DEFAULT NULL COMMENT '名人照片',
  `mr_jj` text COMMENT '名人简介',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `xb` varchar(45) DEFAULT NULL COMMENT '性别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;