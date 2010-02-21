DROP TABLE IF EXISTS `forbes`.`fb_mrbd`;
CREATE TABLE  `forbes`.`fb_mrbd` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pm` int(10) unsigned default NULL COMMENT '综合排名',
  `sr` float default NULL COMMENT '收入',
  `bgl` float default NULL COMMENT '曝光率',
  `sbly` text COMMENT '上榜理由',
  `zp` varchar(255) default NULL COMMENT '照片',
  `bd_id` int(10) unsigned default NULL COMMENT '榜单ID',
  `mr_id` int(10) unsigned default NULL COMMENT '名人ID',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
