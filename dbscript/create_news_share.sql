CREATE TABLE `forbes`.`fb_news_share` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `nick_name` VARCHAR(255),
  `email` VARCHAR(255),
  `user` VARCHAR(45),
  `created_at` DATETIME,
  `news_id` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)