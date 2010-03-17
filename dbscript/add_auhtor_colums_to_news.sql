ALTER TABLE `forbes`.`fb_news` ADD COLUMN `author_type` initeger  DEFAULT 1 COMMENT '' AFTER `sub_headline`,
 ADD COLUMN `author_image` varchar(256)  COMMENT '作者照片' AFTER `author_type`;
