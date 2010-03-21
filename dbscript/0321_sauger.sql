ALTER TABLE `forbes`.`fb_custom_list_type` MODIFY COLUMN `list_type` INTEGER  DEFAULT 1 COMMENT '1：自定义榜单2:年度富豪榜3：年度名人榜，3：城市榜';
CREATE TABLE  `forbes`.`fb_famous_list_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL COMMENT '姓名',
  `job` varchar(100) DEFAULT NULL COMMENT '职业',
  `fortune` float DEFAULT NULL COMMENT '收入',
  `fortune_order` int(11) DEFAULT NULL COMMENT '收入排名',
  `exposure_rate` float DEFAULT NULL COMMENT '曝光率',
  `exposure_order` int(11) DEFAULT NULL COMMENT '曝光率排名',
  `overall_order` int(11) DEFAULT NULL COMMENT '综合排名',
  `famous_id` int(11) DEFAULT NULL COMMENT '名人id',
  `list_id` int(11) NOT NULL COMMENT '榜单ID',
  PRIMARY KEY (`id`),
  KEY `new_index` (`list_id`),
  KEY `new_index1` (`overall_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
ALTER TABLE `forbes`.`fb_custom_list_type` ADD COLUMN `created_at` DATETIME  COMMENT '创建时间' AFTER `unit`,
 ADD COLUMN `priority` integer  DEFAULT 100 COMMENT '优先级' AFTER `created_at`;

