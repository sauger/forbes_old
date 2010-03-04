<?php require_once('../../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="4">　<a href="edit.php?">添加广告位</a></td>
		</tr>
		<tr class="tr2">
			<td width="200">广告</td>
			<td width="200">描述</td>
			<td width="180">像素大小</td>
			<td width="175">操作</td>
		</tr>
		<?php
			$db = get_db();
			$records = $db->query("select * from fb_ad_ggw order by priority");
			$count = count($records);
			for($i=0;$i<$count;$i++){
		?>
		<tr class=tr3 id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->name;?></td>
			<td><?php echo $records[$i]->description;?></td>						
			<td><?php echo $records[$i]->size;?></td>
			<td><a href="edit.php?id=<?php echo $records[$i]->id;?>" target="admin_iframe">编辑</a>
				<a class="del" name="<?php echo $records[$i]->id;?>" style="color:#ff0000; cursor:pointer">删除</a>
				<input type="text" class="priority" name="<?php echo $records[$i]->id;?>" value="<?php echo ($records[$i]->priority!=100)?$records[$i]->priority:'';?>" style="width:30px;">
			</td>
		</tr>
		<?php }?>
		<input type="hidden" id="db_table" value="fb_ad_ggw">
	</table>
	<table width="795" border="0">
		<tr colspan="5" class=tr3>
			<td><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
		</tr>
	</table>
</body>
</html>
