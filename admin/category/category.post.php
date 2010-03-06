<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
		<?php 
			include("../../frame.php"); 
		?>
	</head>
	<body>
		<?php		
			$cate = new table_class($tb_category);
			if($_REQUEST['id']){
				$cate->find($_REQUEST['id']);
			}
			if($cate->update_attributes($_POST['post'])){
				redirect('category_list.php?type='.$_POST['post']['category_type'].'');
			}else{
				display_error('修改类别失败');
				echo '<a href="category_list.php">返回</a>';
			}
			
			
		?>
	</body>
</html>