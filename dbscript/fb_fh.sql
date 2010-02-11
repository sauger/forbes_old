DROP TABLE IF EXISTS `forbes`.`fb_fh`;
CREATE TABLE  `forbes`.`fb_fh` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `xm` varchar(100) default NULL COMMENT '姓名',
  `xb` varchar(10) default '0' COMMENT '性别：0女性1男性',
  `sr` datetime default NULL COMMENT '生日',
  `grjl` text COMMENT '个人经历',
  `nl` varchar(100) default NULL COMMENT '年龄',
  `ndpm` varchar(100) default NULL COMMENT '年度排名',
  `jrpm` varchar(100) default NULL COMMENT '今日排名',
  `gj` varchar(100) default NULL COMMENT '国籍',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;