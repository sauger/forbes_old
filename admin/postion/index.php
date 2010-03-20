<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_position where page_id=0";
	$record = $db->paginate($sql,15);
	$count = count($record);
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
			<td colspan="3">
				　位置管理 <a href="edit.php">添加页面</a>
			</td>
		</tr>
		<tr class="tr2">
			<td width="300">位置名称</td><td width="200">条数限制</td><td width="295">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td></td>
					<td>
						<a href="list.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">管理</a>
						<a href="edit.php?pid=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">添加位置</a>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<?php
					$records = $db->query("select * from fb_position where page_id={$record[$i]->id}");
					for($j=0;$j<count($records);$j++){
				?>
				<tr class="tr3" id=<?php echo $records[$j]->id;?> name="<?php echo $record[$i]->name;?>">
					<td class="sub_menu"><li style="color:#0000ff;"><?php echo $records[$j]->name;?></li></td>
					<td><?php echo $records[$j]->position_limit;?></td>
					<td><a href="list_edit2.php?id=<?php echo $records[$j]->id;?>" class="list_edit" name="<?php echo $records[$j]->id;?>" style="cursor:pointer">使用已有类别</a>
						<a href="list_edit.php?id=<?php echo $records[$j]->id;?>" class="list_edit" name="<?php echo $records[$j]->id;?>" style="cursor:pointer">配置新闻</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $records[$j]->id;?>">删除</span></td>
				</tr>
		<?php
			}}j
		?>
			<tr class="tr3">
				<td colspan=6><?php paginate();?>			<input type="hidden" id="db_table" value="fb_position"></td>
			</tr>
		</table>	

	</body>
</html>