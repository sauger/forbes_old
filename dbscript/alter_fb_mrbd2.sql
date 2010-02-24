ALTER TABLE `forbes`.`fb_mrbd` ADD COLUMN `sr_pm` INTEGER UNSIGNED COMMENT '收入排名' AFTER `mr_id`,
 ADD COLUMN `bgl_pm` INTEGER UNSIGNED COMMENT '曝光率排名' AFTER `sr_pm`;