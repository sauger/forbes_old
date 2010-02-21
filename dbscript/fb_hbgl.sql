DROP TABLE IF EXISTS `forbes`.`fb_hbgl`;
CREATE TABLE  `forbes`.`fb_hbgl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hb_nc` varchar(255) DEFAULT NULL,
  `hb_dv` varchar(255) DEFAULT NULL,
  `hb_gj` varchar(255) DEFAULT NULL,
  `hb_hl` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;