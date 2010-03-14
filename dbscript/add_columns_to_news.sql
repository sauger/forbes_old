ALTER TABLE `forbes`.`fb_news` ADD COLUMN `pdf_src` varchar(255)  COMMENT 'pdf源文件' AFTER `related_news`,
 ADD COLUMN `ad_id` integer  AFTER `pdf_src`;
