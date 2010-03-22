DROP TABLE IF EXISTS `forbes`.`fb_magazine`;
CREATE TABLE  `forbes`.`fb_magazine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL COMMENT '杂志名',
  `publish_data` datetime DEFAULT NULL COMMENT '发行时间',
  `title` varchar(256) DEFAULT NULL COMMENT '导语标题',
  `description` text COMMENT '导语内容',
  `img_src` varchar(256) DEFAULT NULL COMMENT '封面图片',
  `img_src2` varchar(256) DEFAULT NULL COMMENT '导语图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `forbes`.`fb_magazine_image`;
CREATE TABLE  `forbes`.`fb_magazine_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `magazine_id` int(10) unsigned DEFAULT NULL COMMENT '杂志ID',
  `url` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  `src` varchar(256) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `forbes`.`fb_magazine_relation`;
CREATE TABLE  `forbes`.`fb_magazine_relation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `magazine_id` int(10) unsigned DEFAULT NULL,
  `resource_id` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into fb_admin_menu (name,href,parent_id,priority,target,is_root,role_level) values ('杂志管理','/admin/magazine/','3','4','admin_iframe','1','1');