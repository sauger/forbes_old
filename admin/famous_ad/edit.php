<?php
	require_once('../../frame.php');
	$db = get_db();
	$fid = $_REQUEST['f_id'];
	$famous = new table_class('fb_mr');
	$famous->find($fid);
	$sql = "select * from fb_famous_ad where famous_id=".$fid;
	$record = $db->query($sql);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/famous/famous_ad');
		validate_form("famous_edit");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="famous_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　 <?php if($id!=''){echo "编辑名人代言";}else{echo "添加名人代言";}?> <a href="/admin/famous/index.php"><img src="/images/btn_back.png" border=0></a> <span id="add_item" type="button" title="添加项目" style="cursor:pointer"><img src="/images/btn_add.png" border=0></span></td>
		</tr>
		<tr class=tr4>
			<td class=td1>姓名</td>
			<td width="665">
				<?php echo $famous->name;?>
			</td>
		</tr>
		<?php for($i=0;$i<count($record);$i++){?>
		<tr class=tr4>
			<td class=td1>题目</td>
			<td>
				<input type="text" name="old_title[]" value="<?php echo $record[$i]->title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>上传照片</td>
			<td>
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<input type="file" name="old_photo[]">（请上传小于2M的照片）<a target="_blank" href="<?php echo $record[$i]->photo;?>">点击查看照片</a>
				　<button class="remove_old_item" type="button">删除</button>
				<input type="hidden" name="old_id[]" value="<?php echo $record[$i]->id;?>">
			</td>
		</tr>
		<?php }?>
		<tr class=tr4>
			<td class=td1>题目</td>
			<td>
				<input type="text" name="title[]">
			</td>
		</tr>
		<tr class=tr4 id="first">
			<td class=td1>上传照片</td>
			<td>
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<input type="file" name="photo[]">（请上传小于2M的照片）
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center">
				<input id="submit" type="submit" value="完成">
				<input type="hidden" name="id" value="<?php echo $fid;?>">
			</td>
		</tr>	
	</table>
	</form>
</body>
</html>