ALTER TABLE `forbes`.`fb_user` ADD COLUMN `chinese_name` varchar(20)  COMMENT '中文拼音，用于快速搜索' AFTER `image_src`;
