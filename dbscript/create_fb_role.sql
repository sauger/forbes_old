CREATE TABLE  `forbes`.`fb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` text COMMENT '备注',
  `nick_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `new_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
CREATE TABLE  `forbes`.`fb_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '权限类型1：系统权限2：后台菜单权限',
  `nick_name` varchar(255) DEFAULT NULL COMMENT '昵称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
CREATE TABLE  `forbes`.`fb_role_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `rights_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
