CREATE TABLE `forbes`.`fb_news_keywords` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE `new_index`(`name`)
);
