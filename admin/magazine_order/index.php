<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "SELECT t1.id,t1.created_at,t2.year,t2.name,t3.name as uname FROM fb_magazine_order t1 join fb_old_magazine t2 on t1.magazine_id=t2.id join fb_yh t3 on t1.user_id=t3.id where 1=1";
	if($search!=''){
		$sql .= " and t2.name like '%$search%'";
	}
	$sql .= " order by created_at desc";
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
    <div id=title>杂志订阅查看</div>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="40%">杂志名称</td><td width="20%">订阅时间</td><td width="20%">用户名</td><td width="20%">删除</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->year;?>年-<?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><?php echo $record[$i]->uname;?></td>
					<td>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="db_table" value="fb_magazine_order">
			</td>
		</tr>
		</table>	
	</div>
	</body>
</html>
<script>
$(function(){
	$(".sau_search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($(".sau_search").attr('value'));
}
</script>