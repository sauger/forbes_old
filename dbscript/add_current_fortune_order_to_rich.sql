ALTER TABLE `forbes`.`fb_rich` ADD COLUMN `current_fortune_order` integer  DEFAULT 0 COMMENT '当前财富排名，由后台程序更新' AFTER `chinese_name`;
