CREATE TABLE  `forbes`.`fb_dynamic_fortune_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_index` int(10) unsigned NOT NULL COMMENT '当天排名',
  `regdate` datetime DEFAULT NULL COMMENT '登记时间',
  `fortune` int(10) unsigned NOT NULL COMMENT '财富数量',
  `richer_id` int(11) NOT NULL COMMENT '富豪id',
  `name` varchar(256) NOT NULL COMMENT '富豪名称',
  PRIMARY KEY (`id`),
  KEY `new_index` (`richer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='动态富豪历史';
CREATE TABLE  `forbes`.`fb_dynamic_fortune_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `richer_id` int(11) NOT NULL COMMENT '富豪id',
  `current_index` int(10) unsigned NOT NULL COMMENT '当前排名',
  `last_index` int(10) unsigned DEFAULT NULL COMMENT '上一天排名',
  `name` varchar(255) NOT NULL COMMENT '富豪姓名',
  `fortune` int(11) NOT NULL COMMENT '财富，单位RMB',
  `regdate` datetime DEFAULT NULL COMMENT '登记时间',
  PRIMARY KEY (`id`),
  KEY `new_index` (`richer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='动态富豪榜';

