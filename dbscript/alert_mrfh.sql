ALTER TABLE `forbes`.`fb_fh` ADD UNIQUE INDEX `Index_2`(`name`);

ALTER TABLE `forbes`.`fb_fhbd` ADD UNIQUE INDEX `Index_2`(`bd_id`, `fh_id`)
, ROW_FORMAT = DYNAMIC;

ALTER TABLE `forbes`.`fb_mrbd` ADD UNIQUE INDEX `Index_2`(`bd_id`, `mr_id`)
, ROW_FORMAT = DYNAMIC;

ALTER TABLE `forbes`.`fb_mr` ADD UNIQUE INDEX `Index_2`(`name`)
, ROW_FORMAT = DYNAMIC;
