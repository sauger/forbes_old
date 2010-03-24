ALTER TABLE `forbes`.`fb_fh_gs` RENAME TO `forbes`.`fb_rich_company`,
 CHANGE COLUMN `fh_id` `rich_id` integer  NOT NULL  COMMENT '富豪ID',
 CHANGE COLUMN `gs_id` `company_id` integer NOT NULL  COMMENT '公司ID';
