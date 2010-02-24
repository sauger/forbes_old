CREATE TABLE  `forbes`.`fb_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL COMMENT '货币代码，唯一',
  `name` varchar(256) DEFAULT NULL COMMENT '显示名称，后台可控制',
  `rate` float NOT NULL COMMENT '汇率，相对人民币汇率，例如：美元 则此字段值为 6.802',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `new_index` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='货币管理';