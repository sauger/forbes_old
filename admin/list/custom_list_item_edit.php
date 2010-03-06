<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		if(intval($_REQUEST['list_id']) <= 0) die('invalide request!');
		$list_id = $_REQUEST['list_id'];
		$id = intval($_REQUEST['id']);
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		//get the list
		$db = get_db();
		$db->query("select * from fb_custom_list_type where id={$list_id}");
		$db->move_first();
		$table_name = $db->field_by_name('table_name');
		$list_name = $db->field_by_name('name');
		$table = new table_class($table_name);
		if($id){
			$table->find($id);
		}
	?>
</head>

<body>
	<form action="custom_list_item.post.php" method="post">
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">
			<a href="custom_list_item_list.php?id=<?php echo $list_id;?>"><?php echo $list_name;?></a><?php if($id){ ?>编辑<?php }else{ ?>添加<?php }?>榜单项 
			</td>
		</tr>
		<?php foreach ($table->fields as $field) {
			if($field->name == 'id') continue;
		?>
		<tr class=tr4>
			<td><?php echo $field->comment?></td>
			<td align="left">
				<input type="text" name="list[<?php echo $field->name;?>]" value="<?php echo $field->value;?>">
			</td>
		</tr>
		<?php }?>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="finish" type="submit" value="保　　　　　存"></td>
		</tr>	
		<tr class="tr3">
			<td colspan=6><?php paginate();?></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>"> 
		<input type="hidden" name="list_id" value="<?php echo $list_id;?>"></input>
		<input type="hidden" name="table_name" value="<?php echo $table_name;?>"></input>
	</table>
	</form>
</body>
</html>