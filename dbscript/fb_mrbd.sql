DROP TABLE IF EXISTS `forbes`.`fb_mrbd`;
CREATE TABLE  `forbes`.`fb_mrbd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pm` int(10) unsigned DEFAULT NULL COMMENT '综合排名',
  `sr` float DEFAULT NULL COMMENT '收入',
  `bgl` float DEFAULT NULL COMMENT '曝光率',
  `sbly` text COMMENT '上榜理由',
  `zp` varchar(255) DEFAULT NULL COMMENT '照片',
  `year` int(10) unsigned DEFAULT NULL COMMENT '年份',
  `mr_id` int(10) unsigned DEFAULT NULL COMMENT '名人ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;