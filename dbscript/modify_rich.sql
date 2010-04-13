ALTER TABLE `forbes`.`fb_rich` MODIFY COLUMN `birthday` varchar(20) UNSIGNED DEFAULT NULL COMMENT '出生年月',
 ADD COLUMN `college` varchar(256)  COMMENT '毕业院校' AFTER `fortune`,
 ADD COLUMN `education` varchar(256)  COMMENT '学历' AFTER `college`;
