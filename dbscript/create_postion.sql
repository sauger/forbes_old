DROP TABLE IF EXISTS `forbes`.`fb_news_position`;
CREATE TABLE  `forbes`.`fb_news_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(10) unsigned DEFAULT NULL,
  `news_id` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `forbes`.`fb_position`;
CREATE TABLE  `forbes`.`fb_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `position_limit` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;