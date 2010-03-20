CREATE TABLE  `forbes`.`fb_rich_list_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `overall_order` int(11) DEFAULT NULL COMMENT '综合排名',
  `fortune` float DEFAULT NULL COMMENT '年度收入',
  `reason` text COMMENT '上榜理由',
  `rich_id` int(11) DEFAULT NULL COMMENT '富豪id',
  `list_id` int(11) NOT NULL COMMENT '所属榜单ID',
  `company` varchar(255) DEFAULT NULL COMMENT '公司',
  `industry` varchar(255) DEFAULT NULL COMMENT '财富来源行业',
  `zone` varchar(255) DEFAULT NULL COMMENT '地区',
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `age` varchar(5) DEFAULT NULL COMMENT '年龄',
  `gender` varchar(10) DEFAULT '男' COMMENT '性别',
  `image` varchar(256) DEFAULT NULL COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
