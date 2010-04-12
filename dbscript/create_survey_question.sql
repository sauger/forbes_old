CREATE TABLE `forbes`.`fb_survey_question` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256) ,
  `survey_id` integer ,
  `priority` integer ,
  PRIMARY KEY (`id`)
)
