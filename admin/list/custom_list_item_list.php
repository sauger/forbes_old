<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/list/item_list');
		$db = get_db();
		if(empty($_REQUEST['id'])) die('invalid request!');
		$id = $_REQUEST['id'];
		$db->query("select * from fb_custom_list_type where id={$id}");
		$db->move_first();
		$table_name = $db->field_by_name('table_name');
		$list_name = $db->field_by_name('name');
		$table = new table_class($table_name);
		if($_REQUEST['s_text']){
			$search_fields = array();
			if($_REQUEST['s_field'] != '0'){
				$search_fields[] = "{$_REQUEST['s_field']} like '%{$_REQUEST['s_text']}%'";
			}else{
				foreach ($table->fields as $field) {
					if($field->name == 'id') continue;
					$search_fields[] = "{$field->name} like '%{$_REQUEST['s_text']}%'";
				}
			}
			$condition = array('conditions' => implode(' or ',$search_fields));
		}
		$record = $table->paginate("all",$condition);
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="20">
				<span style="color:red;"><?php echo $list_name;?></span>
				<a href="custom_list_item_edit.php?list_id=<?php echo $id;?>">添加榜单项</a>
				  搜索　
				 <input id="s_text" type="text" value="<? echo $_REQUEST['s_text']?>">
				 搜索列名<select style="width:80px;" id="s_field">
				 	<option value="0">所有列</option>
					<?php 
						foreach ($table->fields as $field) {
							if($field->name == 'id') continue;
					?>
					<option <?php if($_REQUEST[s_field]==$field->name)echo 'selected="selected"';?> value="<?php echo $field->name;?>"><?php echo $field->comment;?></option>
					<?php }?>
				</select>　
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
				 <a href="index.php" style="cursor:pointer">返回榜单列表</a>
			</td>
		</tr>
		<tr class="tr2">
			<?php 
				foreach ($table->fields as $v) {
					if($v->name == 'id') continue;
					echo "<td>{$v->comment}</td>";
				}
			?>
			<td width="210">操作</td>
		</tr>
		<?php
			if(!is_array($record)){
				$record = array();
			}
			foreach ($record as $v) {
		?>
				<tr class="tr3" id="<?php echo $v->fields['id']->value;?>">
					<?php 
						foreach ($v->fields as $val) {
							if($val->name == 'id') continue;
							echo "<td>{$val->value}</td>";
						}
					?>
					<td>
						<a href="custom_list_item_edit.php?list_id=<?php echo $id;?>&id=<?php echo $v->fields['id']->value;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $v->fields['id']->value;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="<?php echo $table_name;?>">
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=20><?php paginate();?></td>
		</tr>
		<input type="hidden" id="id" value="<?php echo $id;?>"> 
	</table>
</body>
</html>