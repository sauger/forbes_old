DROP TABLE IF EXISTS `forbes`.`fb_fhbd`;
CREATE TABLE  `forbes`.`fb_fhbd` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pm` int(10) unsigned default NULL COMMENT '�ۺ�����',
  `sr` float default NULL COMMENT '����',
  `bgl` float default NULL COMMENT '�ع���',
  `sbly` text COMMENT '�ϰ�����',
  `zp` varchar(255) default NULL COMMENT '��Ƭ',
  `bd_id` int(10) unsigned default NULL COMMENT '��ID',
  `fh_id` int(10) unsigned default NULL COMMENT '����ID',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;