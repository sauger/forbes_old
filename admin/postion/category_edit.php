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

<body>
<div id=icaption>
    <div id=title>选择类别</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>	
	<form id="industry" action="list_edit.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td width="15%" class=td1>位置名称</td>
			<td width="85%"><?php echo $record->name;?>
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
</div>	
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
		});
	});
</script>