<?php
	require_once('../../frame.php');
	judge_role();
	
	$id = $_GET['id'];
	$db = get_db();
	$images = $db->paginate("select * from fb_magazine_image where magazine_id=".$id." order by priority asc,created_at desc",12);
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
<div id=icaption>
    <div id=title>图片管理</div>
    <a href="index.php" id=btn_back></a>
	  <a href="image_edit.php?pid=<?php echo $id; ?>" id=btn_add></a>
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="70%">图片</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php for($i=0;$i<count($images);$i++){?>
		<tr class=tr3 id=<?php echo $images[$i]->id;?>>
			<td  height=60><a href="<?php echo $images[$i]->src;?>" target="_blank"><img src="<?php echo $images[$i]->src;?>" width="50" height="50" border="0"></a></td>
			<td><?php echo $images[$i]->created_at;?></td>
			<td>
				<a href="image_edit.php?id=<?php echo $images[$i]->id;?>" style="color:#000000; text-decoration:none">编辑</a> 
				<span style="cursor:pointer; color:#FF0000" class="del" name="<?php echo $images[$i]->id;?>">删除</span>
				<input type="text" class="priority" name="<?php echo $images[$i]->id;?>" value="<?php if($images[$i]->priority!=100){echo $images[$i]->priority;}?>" style="width:40px;">
				<input type="hidden" id="priorityh<? echo $p;?>" value="<?php echo $images[$i]->id;?>" style="width:40px;">	
			</td>
		</tr>
		<?php }?>
			<tr class="btools">
				<td colspan="10"><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
			</tr>
		</table>
	</div>
	<input type="hidden" id="db_table" value="fb_magazine_image">
</body>
</html>