<?php
$db_script_str = "
DROP TABLE IF EXISTS `{$db_database_name}`.`{$table_prex}admin_menu`;
CREATE TABLE  `{$db_database_name}`.`{$table_prex}admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `description` text,
  `priority` int(10) unsigned DEFAULT '100',
  `target` varchar(255) DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `role_level` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET={$db_code} ROW_FORMAT=FIXED;
DROP TABLE IF EXISTS `{$db_database_name}`.`{$table_prex}user`;
CREATE TABLE  `{$db_database_name}`.`{$table_prex}user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT 'member',
  `role_level` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET={$db_code} ROW_FORMAT=DYNAMIC;
DROP TABLE IF EXISTS `{$db_database_name}`.`{$table_prex}category`;
CREATE TABLE  `{$db_database_name}`.`{$table_prex}category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type` varchar(255) DEFAULT NULL COMMENT '类别类型',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  `parent_id` int(10) DEFAULT NULL COMMENT '父类别',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET={$db_code};
DROP TABLE IF EXISTS `{$db_database_name}`.`{$table_prex}images`;
CREATE TABLE  `{$db_database_name}`.`{$table_prex}images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `description` text COMMENT '简介',
  `url` varchar(255) DEFAULT NULL COMMENT '地址',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT '类别ID',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `publisher` varchar(45) DEFAULT NULL COMMENT '发布者',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `is_adopt` tinyint(1) unsigned DEFAULT '0' COMMENT '是否发布',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `src` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `thumb_name` varchar(255) DEFAULT NULL COMMENT '缩略图',  
  PRIMARY KEY (`id`),
  KEY `Index_2` (`category_id`,`is_adopt`)
) ENGINE=InnoDB DEFAULT CHARSET={$db_code} ROW_FORMAT=DYNAMIC;
DROP TABLE IF EXISTS `{$db_database_name}`.`{$table_prex}news`;
CREATE TABLE  `{$db_database_name}`.`{$table_prex}news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT '新闻类别ID',
  `priority` int(11) DEFAULT '100' COMMENT '优先级',
  `click_count` int(11) DEFAULT '0' COMMENT '点击次数',
  `is_adopt` tinyint(1) DEFAULT '0' COMMENT '是否发布',
  `forbbide_copy` tinyint(1) DEFAULT NULL COMMENT '禁止复制',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `title` text COMMENT '标题',
  `short_title` text COMMENT '短标题',
  `description` longtext COMMENT '简介',
  `content` longtext COMMENT '内容',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `last_edited_at` datetime DEFAULT NULL COMMENT '最后编辑时间',
  `publisher` varchar(255) DEFAULT NULL COMMENT '发布者',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `news_type` varchar(255) DEFAULT '1' COMMENT '新闻类型',
  `file_name` varchar(255) DEFAULT NULL COMMENT '文件新闻的文件名',
  `target_url` varchar(255) DEFAULT NULL COMMENT '链接新闻的链接地址',
  `photo_src` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `video_photo_src` varchar(255) DEFAULT NULL COMMENT '视频图片地址',
  `image_flag` tinyint(1) DEFAULT '0' COMMENT '是否是图片新闻',
  `video_flag` tinyint(1) DEFAULT '0' COMMENT '是否是视频新闻',
  `video_src` varchar(255) DEFAULT NULL COMMENT '视频地址',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`created_at`),
  KEY `Index_3` (`category_id`,`is_adopt`),
  KEY `Index_5` (`tags`),
  KEY `Index_6` (`is_adopt`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET={$db_code};
DROP TABLE IF EXISTS `{$db_database_name}`.`{$table_prex}video`;
CREATE TABLE  `{$db_database_name}`.`{$table_prex}video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `is_adopt` int(10) unsigned DEFAULT '0' COMMENT '是否发布',
  `photo_url` varchar(254) DEFAULT NULL COMMENT '视频图片链接',
  `video_url` varchar(254) DEFAULT NULL COMMENT '视频链接',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '点击量',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT '类别ID',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` longtext COMMENT '简介',
  `online_url` varchar(255) DEFAULT NULL COMMENT '在线视频地址',
  `publisher` varchar(45) DEFAULT NULL COMMENT '发布者',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`priority`),
  KEY `Index_4` (`is_adopt`),
  KEY `Index_5` (`title`),
  KEY `Index_6` (`category_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET={$db_code} ROW_FORMAT=DYNAMIC;";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root,role_level) values ('系统管理','#',0,'系统管理',3,'#',1,2);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('类别管理','#',0,'类别管理',1,'#',1);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('内容管理','#',0,'内容管理',2,'#',1);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('新闻管理','/admin/news/news_list.php',3,'新闻管理',1,'#',0);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('图片管理','/admin/image/image_list.php',3,'图片管理',2,'#',0);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('视频管理','/admin/video/video_list.php',3,'视频管理',3,'#',0);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('新闻类别管理','/admin/category/category_list.php?type=news',2,'新闻类别管理',1,'#',0);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('图片类别管理','/admin/category/category_list.php?type=image',2,'图片类别管理',2,'#',0);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root) values ('视频类别管理','/admin/category/category_list.php?type=video',2,'视频类别管理',3,'#',0);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root,role_level) values ('菜单管理','/admin/menu/menu_list.php',1,'菜单管理',1,'admin_iframe',0,2);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root,role_level) values ('用户管理','/admin/user/user_list.php',1,'用户管理',2,'admin_iframe',0,2);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}admin_menu` (name,href,parent_id,description,priority,target,is_root,role_level) values ('数据库管理','/admin/dbadmin/',1,'数据库管理',2,'admin_iframe',0,2);";
$db_script_str .= "insert into `{$db_database_name}`.`{$table_prex}user` (name,nick_name,password,role_name,role_level) values ('admin','超级管理员','admin','admin',2);";
$db_script_array = explode(';', $db_script_str)

?>