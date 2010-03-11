<?php
/*
 * system config file
 */
 $debug_tag = true;
 /*
  * database configuration
  */
 
 /*
  * database type
  */

 $db_type = 'mysql';
 //$db_type = 'mssql';
 //$db_server_name = 'localhost';
 //$db_database_name = 'forbes';
 //$db_user_name = 'root';
 
 $db_server_name = 'localhost';
 $db_database_name = 'forbes';
 $db_user_name = 'root'; 
 $db_password = 'xunao';
 $db_code = 'utf8';
 
 $db_server_name_bak = '127.0.0.1';
 $db_database_name_bak = 'forbes';
 $db_user_name_bak = 'root';
 $db_password_bak = 'xunao';
 $db_code_bak = 'utf8';
 
 $table_prex = 'fb_';
 
 $tb_menu = $table_prex . 'admin_menu';
 $tb_user = $table_prex . 'user';
 $tb_category = $table_prex . 'category';
 $tb_images = $table_prex . 'images';
 $tb_video = $table_prex.'video';
 $tb_news = $table_prex.'news';
 
 $g_ucenter_ip = 'http://127.0.0.1:81';
 $site_name = '福布斯中文网站';
?>