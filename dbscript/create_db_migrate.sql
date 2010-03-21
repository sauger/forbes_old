CREATE TABLE  `forbes`.`db_migrate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(256) DEFAULT NULL COMMENT '脚本名称',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8
