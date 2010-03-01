ALTER TABLE `forbes`.`fb_fhb` MODIFY COLUMN `year` VARCHAR(256)  CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
 ADD COLUMN `unit` varchar(20)  NOT NULL DEFAULT '亿人民币' AFTER `year`;
 `year`;
