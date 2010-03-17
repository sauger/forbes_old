DROP TABLE IF EXISTS `forbes`.`fb_yh_sc`;
CREATE TABLE  `forbes`.`fb_yh_sc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yh_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `type` int(10) unsigned NOT NULL COMMENT '收藏类型，1为文章，2为富豪，3为名人',
  `item_id` int(10) unsigned NOT NULL COMMENT '收藏项目ID',
  `time` datetime NOT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收藏';

DROP TABLE IF EXISTS `forbes`.`fb_yh_xx`;
CREATE TABLE  `forbes`.`fb_yh_xx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hy` varchar(255) DEFAULT NULL COMMENT '行业',
  `zw` varchar(255) DEFAULT NULL COMMENT '职位',
  `xb` varchar(10) DEFAULT NULL COMMENT '性别',
  `sf` varchar(100) DEFAULT NULL COMMENT '省份',
  `cs` varchar(100) DEFAULT NULL COMMENT '城市',
  `xl` varchar(255) DEFAULT NULL COMMENT '学历',
  `gzdw` varchar(255) DEFAULT NULL COMMENT '工作单位',
  `gsxz` varchar(255) DEFAULT NULL COMMENT '公司性质',
  `gsgm` varchar(255) DEFAULT NULL COMMENT '公司员工规模',
  `sfss` varchar(10) DEFAULT NULL COMMENT '是否是上市公司',
  `szbm` varchar(255) DEFAULT NULL COMMENT '所在部门',
  `gscp` varchar(255) DEFAULT NULL COMMENT '公司制造的产品',
  `gsyye` varchar(255) DEFAULT NULL COMMENT '公司年营业额',
  `grsr` varchar(255) DEFAULT NULL COMMENT '个人年收入',
  `txdz` varchar(255) DEFAULT NULL COMMENT '通信地址',
  `yb` varchar(255) DEFAULT NULL COMMENT '邮编',
  `gddh1` varchar(255) DEFAULT NULL COMMENT '固定电话-区号',
  `gddh2` varchar(255) DEFAULT NULL COMMENT '固定电话-总机',
  `gddh3` varchar(255) DEFAULT NULL COMMENT '固定电话-分机',
  `sj` varchar(255) DEFAULT NULL COMMENT '手机',
  `msn` varchar(255) DEFAULT NULL COMMENT 'msn',
  `qq` varchar(255) DEFAULT NULL COMMENT 'qq',
  `tx` varchar(255) DEFAULT NULL COMMENT '头像',
  `time` datetime DEFAULT NULL COMMENT '注册时间',
  `xm` varchar(100) DEFAULT NULL COMMENT '姓名',
  `yh_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息';