CREATE TABLE `forbes`.`fb_picture_list_items` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256)  COMMENT '名称',
  `priority` integer  DEFAULT 100 COMMENT '优先级',
  `image` varchar(256)  COMMENT '图片地址',
  `comment` text  COMMENT '说明',
  `list_id` integer  NOT NULL COMMENT '榜单Id',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;

