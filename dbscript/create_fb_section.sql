CREATE TABLE `forbes`.`fb_section` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` char(20)  NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `new_index`(`name`)
)
COMMENT = '频道';
