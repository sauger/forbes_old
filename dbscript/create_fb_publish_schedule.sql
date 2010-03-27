CREATE TABLE `forbes`.`fb_publish_schedule` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `publish_date` datetime  COMMENT '定时发布时间',
  `resource_id` integer ,
  `resource_type` varchar(20)  COMMENT 'news',
  `status` integer  DEFAULT 0 COMMENT '状态：0未执行，1已执行',
  PRIMARY KEY (`id`)
)
COMMENT = '定时发布';
