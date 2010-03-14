CREATE TABLE `forbes`.`fb_collection` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `resoure_type` VARCHAR(55) COMMENT '类型',
  `resoure_id` INTEGER UNSIGNED COMMENT '收藏品id',
  `created_at` DATETIME COMMENT '创建时间',
  `user_id` INTEGER UNSIGNED COMMENT '用户id',
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
COMMENT = '用户收藏';