<?php
	require_once('../../frame.php');
	judge_role();
	
	$id = $_GET['id'];
	$db = get_db();
	$images = $db->query("select * from fb_magazine_image where magazine_id=$id order by priority asc,created_at desc");
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
		js_include_tag('admin_pub');
	?>
</head>
<body>
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="5" width="795">　<a href="image_edit.php?pid=<?php echo $id;?>" style="color:#0000FF">发布图片</a></td>
		</tr>
	</table>
	<div class="div_box">
		<?php for($i=0;$i<count($images);$i++){?>
		<div class=v_box id="<?php echo $images[$i]->id;?>">
			<a href="<?php echo $images[$i]->src;?>" target="_blank"><img src="<?php echo $images[$i]->src;?>" height="100" border="0"></a>
			<div class=content>
				<?php echo $images[$i]->created_at; ?>
			</div>
			<div class=content style="height:20px">
				<a href="image_edit.php?id=<?php echo $images[$i]->id;?>" class="edit" title="编辑" style="cursor:pointer"><img src="/images/btn_edit.png" border="0"></a>
				<span style="cursor:pointer;color:#FF0000" class="del" title="删除" name="<?php echo $record[$i]->id;?>"><img src="/images/btn_delete.png" border="0"></span>
				<input type="text" class="priority" name="<?php echo $images[$i]->id;?>" value="<?php if($images[$i]->priority!=100){echo $images[$i]->priority;}?>" style="width:40px;">
				<input type="hidden" id="priorityh<? echo $p;?>" value="<?php echo $images[$i]->id;?>" style="width:40px;">	
			</div>
		</div>
		<?php }?>
	</div>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
			</tr>
		</table>
	</div>
	<input type="hidden" id="db_table" value="fb_magazine_image">
</body>
</html>