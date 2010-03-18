ALTER TABLE `forbes`.`fb_fhb` ADD COLUMN `comment` text  COMMENT '说明' AFTER `publish_year`;
ALTER TABLE `forbes`.`fb_fhb` ADD COLUMN `image_src` varchar(256)  COMMENT '榜单图片' AFTER `comment`;

