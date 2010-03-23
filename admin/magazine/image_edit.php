<?php
	require_once('../../frame.php');
	judge_role();
	$id = $_GET['id'];
	$pid = $_GET['pid'];
	if($id!='')	{
		$image = new table_class('fb_magazine_image');
		$image->find($id);
		$pid = $image->magazine_id;
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin','colorbox');
		use_jquery();
		js_include_tag('admin/magazine/image','jquery.colorbox-min.js');
	?>
</head>
<body style="background:#E1F0F7">
	<form id="picture_edit" enctype="multipart/form-data" action="image.post.php" method="post"> 
	<table width="795" border="0">
		<tr bgcolor="#f9f9f9" height="25px;" style="font-weight:bold; font-size:13px;">
			<td colspan="2" width="795">　　<?php if($id){echo "修改图片";}else{echo "添加图片";}?><a href="img_list.php?id=<?php echo $pid;?>"><img src="/images/btn_back.png" border=0></td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>优先级</td><td align="left"><input type="text" size="10" id="priority" name="image[priority]" value="<?php if($image->priority!=100){echo $image->priority;}?>">(1-100)</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>选择图片</td><td align="left"><input name="image" id="upfile" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)
			<?php if($image->src!=''){?><a href="<?php echo $image->src;?>" class="colorbox" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr>
		<tr bgcolor="#f9f9f9" height="30px;">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布图片"></td>
		</tr>	
	</table>
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden"  name="image[magazine_id]" value="<?php echo $pid;?>">
	</form>
</body>
</html>
