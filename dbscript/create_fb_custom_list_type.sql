CREATE TABLE `forbes`.`fb_custom_list_type` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256)  NOT NULL,
  `table_name` varchar(50)  NOT NULL COMMENT '榜单记录表明',
  `comment` text  COMMENT '注释',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`name`)
)
ENGINE = MyISAM
COMMENT = '自定义榜单类别';
