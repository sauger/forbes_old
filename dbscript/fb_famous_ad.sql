DROP TABLE IF EXISTS `forbes`.`fb_famous_ad`;
CREATE TABLE  `forbes`.`fb_famous_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `famous_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET gb2312 DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET gb2312 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='名人代言';