ALTER TABLE `forbes`.`fb_custom_list_type` ADD COLUMN `position` varchar(10)  DEFAULT '1' AFTER `comment`;
ALTER TABLE `forbes`.`fb_custom_list_type` ADD COLUMN `image_src` varchar(256)  COMMENT '榜单图片' AFTER `position`;
ALTER TABLE `forbes`.`fb_custom_list_type` ADD COLUMN `list_type` integer  DEFAULT 0 COMMENT '0：自定义榜单1:年度富豪榜2：年度名人榜，3：城市榜' AFTER `image_src`;
ALTER TABLE `forbes`.`fb_custom_list_type` ADD COLUMN `year` integer  COMMENT '发布年份' AFTER `list_type`;
ALTER TABLE `forbes`.`fb_custom_list_type` ADD COLUMN `unit` varchar(50)  DEFAULT '亿人民币' COMMENT '单位' AFTER `year`;

