ALTER TABLE `forbes`.`fb_ipo_info` ADD COLUMN `start_time` datetime  COMMENT '开始时间' AFTER `stock_count`,
 ADD COLUMN `end_time` datetime  COMMENT '结束时间' AFTER `start_time`,
 ADD COLUMN `intval` integer  NOT NULL DEFAULT 5 COMMENT '时间间隔' AFTER `end_time`;
