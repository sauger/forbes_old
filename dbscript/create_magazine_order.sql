CREATE TABLE `forbes`.`fb_magazine_order` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `magazine_id` integer  NOT NULL,
  `user_id` integer  NOT NULL,
  `created_at` datetime  NOT NULL,
  PRIMARY KEY (`id`)
)
