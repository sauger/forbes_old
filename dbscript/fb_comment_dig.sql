CREATE TABLE `forbes`.`fb_comment_dig` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `comment_id` INTEGER  NOT NULL,
  `up` INTEGER  DEFAULT 0,
  `down` INTEGER  DEFAULT 0,
  PRIMARY KEY (`id`)
)
