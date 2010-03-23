<?php require_once('../../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("data_upload");
	?>
</head>
<?php
	$db = get_db();
	$id = intval($_GET['id']);
	$table = $db->query("select * from fb_custom_list_type where id=$id");
	if($db->record_count==1){
		$table_name = $table[0]->table_name;
	}else{
		alert("error id");
		die();
	}
	
?>
<body style="background:#E1F0F7">
	<form id="data_upload" enctype="multipart/form-data" action="upload.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="6" width="795">　　榜单：<?php echo $table[0]->name?>　数据导入<a href="list_list.php"><img src="/images/btn_back.png" border="0"></a></td>
		</tr>
		<tr class="tr4 add">
			<td width="130">上传XLS</td>
			<td width="695" align="left">
				<input type="file" name="xls">
			</td>
		</tr>
		<tr class="tr1 add">
			<td colspan="6" width="795">　　字段匹配（在输入框里输入相应的列号，没有的相对应的列号不用输入）</td>
		</tr>
		<?php
			if($table_name=='fb_rich_list_items'||$table_name=='fb_famous_list_items'){
				$table_fields = $db->query("show full fields FROM ".$table_name." where Comment not like '%id%'");
			}else{
				$table_fields = $db->query("show full fields FROM ".$table_name);
			}
			for($i=1;$i<count($table_fields);$i++){
		?>
		<tr class="tr4 add">
			<td width="130"><?php echo $table_fields[$i]->Comment?></td>
			<td width="695" align="left">
				<input style="width:50px;" type="text"  class="number" name="<?php echo $table_fields[$i]->Field?>">
			</td>
		</tr>
		<?php
			}
		?>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布"></td>
		</tr>
		<input type="hidden" name="list_id" value="<?php echo $id;?>">
	</table>
	</form>
</body>
</html>