<div id=title>安装检查</div>
<div id=content>
	<?php
	  $can_next = true;
	  $ext_check = true;
	  echo "<div class='check_title'><b>检查PHP扩展加载情况...........................</b></div>";
	  /*
	  if (function_exists('imagecreatetruecolor')===false){ 
	  	echo "<div class='check_item unload'>GD2库未加载,无法使用图片处理类</div>";
		$can_next = false;
		$ext_check = false;
	  }
	  */
	  if(function_exists('mysql_connect')===false){
	  	echo "<div class='check_item unload'>mysql库未加载,无法连接mysql数据库</div>";
		$can_next = false;
		$ext_check = false;
	  }
	  if($ext_check){
	  	echo "<div class='check_item loaded'>检查通过</div>";		
	  }
	  echo "<div class='check_title'><b>检查文件状态...........................</b></div>";
	  $file_check = true;
	  $filename = '../config/config.php';
	  if(is_writable($filename)===false){
	  	echo "<div class='check_item unload'>config/config.php文件不可写,无法保存配置</div>";
		$can_next = false;
		$file_check = false;
	  }
	  if($file_check){
	  	echo "<div class='check_item loaded'>检查通过</div>";		
	  }
	?>
</div>