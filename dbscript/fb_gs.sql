DROP TABLE IF EXISTS `forbes`.`fb_gs`;
CREATE TABLE  `forbes`.`fb_gs` (
  `id` int(11) NOT NULL auto_increment,
  `mc` varchar(255) default NULL COMMENT '����',
  `sf` varchar(20) default NULL COMMENT ' ʡ��',
  `cs` varchar(50) default NULL COMMENT '����',
  `dz` varchar(512) default NULL COMMENT '��ַ',
  `wz` varchar(512) default NULL COMMENT '��ַ',
  `js` text COMMENT '����',
  `ssdm` varchar(30) default NULL COMMENT '���й�˾����',
  `gj` varchar(45) default NULL COMMENT '����',
  `jys` varchar(45) default NULL COMMENT '������',
  `hbid` varchar(45) default NULL COMMENT '����ID',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;