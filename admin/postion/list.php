<?php
	require_once('../../frame.php');
	
	$id = $_REQUEST['id'];
	$page = new table_class("fb_position");
	$page->find($id);
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_position where page_id=$id";
	if($search!=''){
		$sql .= " where name like '%".$search."%'";
	}
	$record = $db->paginate($sql,15);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>

<body>
<div id=icaption>
    <div id=title>位置管理</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>	

</div>	
	
	
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="3">
				　<?php echo $page->name;?>位置管理　<a href="index.php">返回页面列表</a>
			</td>
		</tr>
		<tr class="tr2">
			<td>位置名称</td><td>操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></a></td>
					<td>
						<a href="list_edit2.php?id=<?php echo $record[$i]->id;?>" class="list_edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">使用已有类别</a>
						<a href="list_edit.php?id=<?php echo $record[$i]->id;?>" class="list_edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">配置新闻</a>
					</td>
				</tr>
		<?php
			}
		?>
			<tr class="tr3">
				<input type="hidden" id="db_table" value="fb_position">
				<td colspan=6><?php paginate();?></td>
			</tr>
		</table>	

	</body>
</html>
<script>
$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_b').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($("#search").attr('value'));
}
</script>