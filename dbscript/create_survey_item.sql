CREATE TABLE `forbes`.`fb_survey_item` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256) ,
  `question_id` integer  NOT NULL,
  `survey_id` integer  NOT NULL,
  PRIMARY KEY (`id`)
)
