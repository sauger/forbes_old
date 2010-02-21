DROP TABLE IF EXISTS `forbes`.`fb_fhbd`;
CREATE TABLE  `forbes`.`fb_fhbd` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pm` int(10) unsigned default NULL COMMENT '综合排名',
  `sr` float default NULL COMMENT '收入',
  `bgl` float default NULL COMMENT '曝光率',
  `sbly` text COMMENT '上榜理由',
  `zp` varchar(255) default NULL COMMENT '照片',
  `year` int(10) unsigned default NULL COMMENT '年份',
  `fh_id` int(10) unsigned default NULL COMMENT '富豪ID',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;