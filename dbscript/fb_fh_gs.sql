DROP TABLE IF EXISTS `forbes`.`fb_fh_gs`;
CREATE TABLE  `forbes`.`fb_fh_gs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fh_id` varchar(100) NOT NULL COMMENT '����ID',
  `gs_id` varchar(100) NOT NULL COMMENT '��˾ID',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;