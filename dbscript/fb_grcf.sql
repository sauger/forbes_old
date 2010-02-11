DROP TABLE IF EXISTS `forbes`.`fb_fh_grcf`;
CREATE TABLE  `forbes`.`fb_fh_grcf` (
  `id` int(11) NOT NULL auto_increment,
  `fh_id` int(11) NOT NULL,
  `zc` varchar(512) NOT NULL COMMENT '资产',
  `jzrq` datetime NOT NULL COMMENT '截止日期',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='富豪个人财富表';