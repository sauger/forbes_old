DROP TABLE IF EXISTS `forbes`.`fb_fh`;
CREATE TABLE  `forbes`.`fb_fh` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) default NULL COMMENT '姓名',
  `xb` varchar(10) default '0' COMMENT '性别：0女性1男性',
  `birthday` datetime default NULL COMMENT '生日',
  `grjl` text COMMENT '个人经历',
  `nl` varchar(100) default NULL COMMENT '年龄',
  `jrpm` varchar(100) default NULL COMMENT '今日排名',
  `gj` varchar(100) default NULL COMMENT '国籍',
  `fh_zp` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;