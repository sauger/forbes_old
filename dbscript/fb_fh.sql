DROP TABLE IF EXISTS `forbes`.`fb_fh`;
CREATE TABLE  `forbes`.`fb_fh` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) default NULL COMMENT '����',
  `xb` varchar(10) default '0' COMMENT '�Ա�0Ů��1����',
  `birthday` datetime default NULL COMMENT '����',
  `grjl` text COMMENT '���˾���',
  `nl` varchar(100) default NULL COMMENT '����',
  `jrpm` varchar(100) default NULL COMMENT '��������',
  `gj` varchar(100) default NULL COMMENT '����',
  `fh_zp` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;