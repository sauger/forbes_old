<?php
	require_once('../../frame.php');
	judge_role();
	
	$type = $_REQUEST['type'];
	switch($type){
		case "news":
	        $category_name = "新闻";
	        break;
	    case "image":
	        $category_name = "图片";
	        break;
	    case "video":
	        $category_name = "视频";
			break;
		default:
			$category_name = "其他";
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/menu_list');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">　 <a href="category_edit.php?type=<?php echo $type;?>">添加<?php echo $category_name;?>类别</a></td>
		</tr>
		<tr class="tr2">
			<td width="330">类别名称</td><td width="100">优先级</td><td width="60">级别</td><td width="300">操作</td>
		</tr>
		<?php
			$category = new category_class();
			show_category($category,0,$type,'',0);
		?>
		<input type="hidden" id="db_table" value="<?php echo $tb_category?>">
	</table>
	<table width="795" border="0">
		<tr colspan="5" class=tr3>
			<td><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
		</tr>
	</table>
</body>
</html>
