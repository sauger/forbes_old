<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_city_list";
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
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="3">
				　城市榜管理 <a href="edit.php">添加榜单</a>   搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="115">榜单名称</td><td width="115">项目总数</td><td width="210">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></a></td>
					<td>
						<?php 
							$sql = "SELECT count(id) as num FROM fb_city_list_content where list_id=".$record[$i]->id." group by attribute_id;";
							$num = $db->query($sql);
							echo $num[0]->num;
						?>
					</td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">编辑</a>
						<a href="detail.php?id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">榜单管理</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_city_list">
		<?php
			}
		?>
			<tr class="tr3">
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