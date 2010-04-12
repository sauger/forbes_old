<?php
	require_once('../../frame.php');
	$id = intval($_REQUEST['id']);
	$question = new table_class('fb_survey_question');
	if(isset($id)){
		$question->find($id);
		$db = get_db();
		$item = $db->query("select * from fb_survey_item where question_id=$id");
		$item_count = $db->record_count;
	}else{
		$item_count = 0;
	}
	$p_id = $_REQUEST['p_id'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("menu_form");
?>
<body>
<div id=icaption>
    <div id=title><?php if(isset($id)){echo "编辑问题";}else{echo "添加问题";}?></div>
	 <a href="list.php?id=<?php echo $p_id;?>" id=btn_back></a>
</div>
<div id=itable>
	<table cellspacing="1" align="center">
	<form id="menu_form" method="post" action="edit2.post.php">
		<tr class=tr4>
			<td class=td1 width="15%">标题：</td>
			<td width="85%" align="left"><input type="text" name="post[name]" style="width:600px;" value="<?php echo $question->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级：</td>
			<td align="left"><input type="text" name="post[priority]" value="<?php echo $question->priority;?>" class="number"></td>
		</tr>
		<?php for($i=0;$i<$item_count;$i++){?>
		<tr class=tr4>
			<td class=td1>选项：</td>
			<td align="left"><input type="text" name="item[name][]" style="width:600px;" value="<?php echo $item[$i]->name;?>">
			<input type="hidden" name="item[id][]" value="<?php echo $item[$i]->id;?>"></td>
		</tr>
		<?php }?>
		<?php for($i=0;$i<8-$item_count;$i++){?>
		<tr class=tr4>
			<td class=td1>选项：</td>
			<td align="left"><input type="text" style="width:600px;" name="item[new_name][]"></td>
		</tr>
		<?php }?>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="p_id" value="<?php echo $p_id;?>"> 
	</form>
	</table>
</div>
</body>
</html>
