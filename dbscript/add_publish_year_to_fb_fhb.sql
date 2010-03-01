ALTER TABLE `forbes`.`fb_fhb` ADD COLUMN `publish_year` integer  COMMENT '榜单年份' AFTER `unit`;
ALTER TABLE `forbes`.`fb_mrb` ADD COLUMN `publish_year` integer  COMMENT '榜单年份' AFTER `year`;

