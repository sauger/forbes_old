DROP TABLE IF EXISTS `forbes`.`fb_navigation`;
CREATE TABLE  `forbes`.`fb_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `href` varchar(256) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `target` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;