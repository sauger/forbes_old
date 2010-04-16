ALTER TABLE `forbes`.`fb_comment` ADD COLUMN `magzine_number` varchar(50)  COMMENT '杂志期刊好' AFTER `title`,
 ADD COLUMN `email` varchar(256)  COMMENT 'email' AFTER `magzine_number`,
 ADD COLUMN `mobile` varchar(20)  AFTER `email`;
