CREATE TABLE `forbes`.`fb_survey` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `name` varchar(255) ,
  `image` varchar(255) ,
  `description` text ,
  `created_at` DATETIME  NOT NULL,
  `priority` INTEGER  DEFAULT 100,
  `is_adopt` INTEGER  DEFAULT 0,
  PRIMARY KEY (`id`)
)
