CREATE TABLE `forbes`.`fb_list_relation` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `list_id` INTEGER UNSIGNED,
  `rela_id` INTEGER UNSIGNED,
  `priority` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
