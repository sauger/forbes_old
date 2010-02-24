CREATE TABLE `forbes`.`fb_dynamic_fortune_list` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `richer_id` integer  NOT NULL COMMENT '富豪id',
  `current_index` integer UNSIGNED NOT NULL COMMENT '当前排名',
  `last_index` integer UNSIGNED COMMENT '上一天排名',
  `name` varchar(255)  NOT NULL COMMENT '富豪姓名',
  `fortune` integer  NOT NULL COMMENT '财富，单位RMB',  
  `regdate` datetime  COMMENT '登记时间',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`richer_id`)
)
ENGINE = MyISAM
COMMENT = '动态富豪榜';

