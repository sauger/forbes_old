CREATE TABLE `forbes`.`fb_ipo_info` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `rich_name` varchar(256) ,
  `image` varchar(256)  COMMENT '富豪图片',
  `comany_name` varchar(256) ,
  `stock_code` varchar(256) ,
  `currency_id` integer  COMMENT '货币种类',
  PRIMARY KEY (`id`)
)
