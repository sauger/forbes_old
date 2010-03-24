ALTER TABLE `forbes`.`fb_fh_grcf` RENAME TO `forbes`.`fb_rich_fortune`,
 CHANGE COLUMN `fh_id` `rich_id` INTEGER  NOT NULL ,
 CHANGE COLUMN `zc` `fortune` VARCHAR(256) NOT NULL COMMENT '财富',
 CHANGE COLUMN `jzrq` `fortune_year` INTEGER  DEFAULT NULL COMMENT 'ֹ财富统计年份',
 CHANGE COLUMN `ndpm` `fortune_order` INTEGER UNSIGNED DEFAULT 0 COMMENT '年度排名',
COMMENT = '富豪财富记录';
