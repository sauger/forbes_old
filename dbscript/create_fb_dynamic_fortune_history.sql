CREATE TABLE  `forbes`.`fb_dynamic_fortune_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_index` int(10) unsigned NOT NULL COMMENT '当天排名',
  `regdate` datetime DEFAULT NULL COMMENT '登记时间',
  `fortune` int(10) unsigned NOT NULL COMMENT '财富数量',
  `richer_id` int(11) NOT NULL COMMENT '富豪id',
  `name` varchar(256) NOT NULL COMMENT '富豪名称',
  PRIMARY KEY (`id`),
  KEY `new_index` (`richer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='动态富豪历史'
