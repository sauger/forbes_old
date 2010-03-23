ALTER TABLE `forbes`.`fb_magazine_relation` ADD COLUMN `is_show` INTEGER UNSIGNED DEFAULT 0 COMMENT '是否显示先封面' AFTER `priority`;
ALTER TABLE `forbes`.`fb_magazine` ADD COLUMN `is_adopt` INTEGER UNSIGNED DEFAULT 0 COMMENT '是否发布为最新' AFTER `img_src2`;
ALTER TABLE `forbes`.`fb_magazine` ADD COLUMN `short_title` VARCHAR(256) COMMENT '首页导语' AFTER `is_adopt`;
