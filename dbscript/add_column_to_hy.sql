ALTER TABLE `forbes`.`fb_yh` ADD COLUMN `authenticated` integer(10)  COMMENT '是否email验证0未验证，1已验证' AFTER `authenticated`;
ALTER TABLE `forbes`.`fb_yh` ADD COLUMN `authenticate_string` char(10)  COMMENT '验证字符串' AFTER `authenticated`;

