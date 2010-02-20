<?php
	require_once('../../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	if($id!=''){
		$famous = new table_class('fb_mr');
		$famous->find($id);
	}
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
		//validate_form("famous_edit");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="famous_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo "编辑名人资料";}else{echo "添加名人资料";}?></td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td>
			<td width="695" align="left">
				<input type="text" name="mr[name]" value="<?php echo $famous->name;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td>性别</td>
			<td align="left">
				<input type="radio" name="mr[xb]" value="女" <?php if($famous->xb=='女'){ ?>checked="checked"<?php } ?> class="required">女
				<input type="radio" name="mr[xb]" value="男" <?php if($famous->xb=='男'){ ?>checked="checked"<?php } ?> class="required">男
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">职业</td>
			<td align="left">
				<input type="text" name="mr[zy]" value="<?php echo $famous->zy;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">上传照片</td>
			<td align="left">
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<input type="file" name="photo" id="photo" <?php if($id=='')echo 'class="required"';?>>（请上传小于2M的照片）<?php if($id!=''){?><a target="_blank" href="<?php echo $famous->mr_zp?>">点击查看照片</a><?php }?>
			</td>
		</tr>
		<tr class="tr4">
			<td height=265>个人简介</td><td><?php show_fckeditor('mr[mr_jj]','Admin',true,"265",$famous->mr_jj);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
</body>
</html>