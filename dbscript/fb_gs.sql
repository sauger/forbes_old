DROP TABLE IF EXISTS `forbes`.`fb_gs`;
CREATE TABLE  `forbes`.`fb_gs` (
  `id` int(11) NOT NULL auto_increment,
  `mc` varchar(255) default NULL COMMENT '名称',
  `sf` varchar(20) default NULL COMMENT ' 省份',
  `cs` varchar(50) default NULL COMMENT '城市',
  `dz` varchar(512) default NULL COMMENT '地址',
  `wz` varchar(512) default NULL COMMENT '网址',
  `js` text COMMENT '介绍',
  `ssdm` varchar(30) default NULL COMMENT '上市公司代码',
  `gj` varchar(45) default NULL COMMENT '国家',
  `jys` varchar(45) default NULL COMMENT '交易所',
  `hbid` varchar(45) default NULL COMMENT '货币ID',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;