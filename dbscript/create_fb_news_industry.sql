CREATE TABLE `forbes`.`fb_news_industry` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `news_id` integer  NOT NULL COMMENT 'x新闻ID',
  `industry_id` integer  NOT NULL COMMENT '行业ID',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`news_id`)
)
COMMENT = '新闻行业关联表';
