<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_position');
	$record->find($id);
	if($record->category_id==''){
		$category_id = -1;
	}else{
		$category_id = $record->category_id;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('category_class');
		$category = new category_class('news');
		$category->echo_jsdata();
	?>
</head>

<body style="background:#E1F0F7">
	<form id="industry" action="list_edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　  选择类别 <a href="index.php"><img src="/images/btn_back.png" border=0></a></td>
		</tr>
		<tr class=tr4>
			<td class=td1>位置名称</td>
			<td width="665"><?php echo $record->name;?>
		</tr>
		<tr class=tr4>
			<td class=td1>选择类别</td>
			<td>
				<span id="span_category">
				<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
			</td>	
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center">
					<input id="submit" type="submit" value="完成">
					<input type="hidden" name="id" id="id"  value="<?php echo $record->id;?>">
					<input type="hidden" name="category" id="category"  value="<?php echo $category_id;?>">
			</td>
		</tr>	
	</table>

	</form>
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
		});
	});
</script>