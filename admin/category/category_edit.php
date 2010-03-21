<?php
	require_once('../../frame.php');
	judge_role();
	$parent_id = ($_REQUEST['parent_id']=='')?0:$_REQUEST['parent_id'];
	$id = $_REQUEST['id'];
	$level = empty($_REQUEST['level'])?1:$_REQUEST['level'];
	if($id!=''){
		$cate = new table_class($tb_category);
		$cate->find($id);
		$parent_id = $cate->parent_id;
		$level = $cate->level;
	}
	$type = $_REQUEST['type'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		validate_form("category_form");
	?>
</head>
<body>
	<table width="795" border="0" id="list">
	<form id="category_form" method="post" action="/admin/category/category.post.php">
		<tr class=tr1>
			<td colspan="2">　
				<?php if($id){echo "修改类别";}else{echo "添加类别";}?> <a href="javascript:history.go(-1)"><img src="/images/btn_back.png" border=0></a>
			</td>
		</tr>
		<tr class=tr4>
			<td width=150>名称：</td>
			<td width=645 align="left"><input style="width:400px" type="text" name="post[name]" value="<?php echo $cate->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td>描述：</td>
			<td align="left"><input type="text" style="width:400px" name="post[description]" value="<?php echo $cate->description;?>"></td>
		</tr>
		<tr class=tr4>
			<td>优先级：</td>
			<td align="left"><input type="text" style="width:400px" name="post[priority]" id="priority" class="number" value="<?php echo $cate->priority;?>"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button> 		
			
				<input type="hidden" name="post[id]" value="<?php echo $id;?>">
				<input type="hidden" name="post[category_type]" value="<?php echo $type;?>">
				<input type="hidden" name="post[parent_id]" value="<?php echo $parent_id;?>">
				<input type="hidden" name="post[level]" value="<?php echo $level;?>">
			</td>
		</tr>

	</form>
	</table>
</body>
</html>
