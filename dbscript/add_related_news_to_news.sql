ALTER TABLE `forbes`.`fb_news` ADD COLUMN `related_news` varchar(100)  COMMENT '相关新闻ID，记录相关新闻的id，使用，分割' AFTER `author`;
