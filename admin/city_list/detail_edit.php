<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		validate_form("city_edit");
		js_include_tag('admin/city/add')
	?>
</head>

<?php
	$id = $_REQUEST['id'];
	$list_id = $_REQUEST['list_id'];
	if($id!=''){
		$city = new table_class('fb_city');
		$city->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="city_edit" action="detail_edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo '编辑榜单';}else{echo '添加榜单';}?></td>
		</tr>
		<tr class=tr4>
			<td width="130">城市名称</td>
			<td width="695" align="left">
				<input type="text" id="city_name" value="<?php echo $city->name;?>">
				<span id="err_info"></span>
				<input type="hidden" name="city_id" id="city_id" value="<?php echo $city->id;?>">
			</td>
		</tr>
		<?php
			$db = get_db();
			$sql = "select * from fb_city_list_attribute where list_id=$list_id order by priority";
			$records = $db->query($sql);
			$count = count($records);
			if($id!=''){
				$sql = "select * from fb_city_list_content where list_id=$list_id and city_id=$id";
				$record = $db->query($sql);
				$count2 = count($record);
			}
			for($i=0;$i<$count;$i++){
		?>
		<tr class=tr4>
			<td width="130"><?php echo $records[$i]->name;?></td>
			<td width="695" align="left">
				<?php if($id!=''){
					for($j=0;$j<$count2;$j++){
						if($record[$j]->attribute_id==$records[$i]->id){
				?>
				<input type="text" name="attr_value[]" value="<?php echo $record[$j]->value;?>">
				<input type="hidden" name="content_id[]" value="<?php echo $record[$j]->id;?>">
				<?php
						};
					}
				}else{?>
				<input type="text" class="required" name="attr_value[]" >
				<input type="hidden" name="attr_id[]" value="<?php echo $records[$i]->id;?>">
				<?php }?>
			</td>
		</tr>
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="finish" type="button" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="list_id" id="list_id" value="<?php echo $list_id;?>">
	</form>
</body>
</html>