CREATE TABLE `forbes`.`fb_page_pos` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(30)  NOT NULL COMMENT '位置名称，唯一',
  `display` varchar(500)  COMMENT '显示字符串',
  `href` varchar(256)  COMMENT 'url链接地址',
  `image1` varchar(256)  COMMENT '图片1链接',
  `image2` varchar(256)  COMMENT '图片2链接',
  `page_name` varchar(50)  COMMENT '页面名称',
  `end_time` varchar(20)  COMMENT '过期时间',
  `reserver` varchar(256)  COMMENT '保留字段',
  PRIMARY KEY (`id`),
  INDEX `new_index1`(`page_name`),
  INDEX `new_index2`(`name`)
);
