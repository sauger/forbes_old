DROP TABLE IF EXISTS `forbes`.`fb_news_postion`;
CREATE TABLE  `forbes`.`fb_news_postion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postion_id` int(10) unsigned DEFAULT NULL,
  `news_id` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `forbes`.`fb_postion`;
CREATE TABLE  `forbes`.`fb_postion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `postion_limit` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;