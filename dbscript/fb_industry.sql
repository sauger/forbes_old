DROP TABLE IF EXISTS `forbes`.`fb_company_industry`;
CREATE TABLE  `forbes`.`fb_company_industry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned DEFAULT NULL,
  `industry_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行业公司关联';

DROP TABLE IF EXISTS `forbes`.`fb_industry`;
CREATE TABLE  `forbes`.`fb_industry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行业';