<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_activity";
	if($search!=''){
		$sql .= " where title like '%".$search."%'";
	}
	$record = $db->paginate($sql,15);
	$count = count($record);
	
	$activity = $db->query("select * from fb_position_relation where type='activity' and position_id=$id");
	$activity_count = count($activity);
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
		js_include_tag('admin/position/column_list');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">
				　自定义活动<a href="index.php"><img src="/images/btn_back.png" border=0></a>   搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="200">活动名称</td><td width="100">举办地</td><td width="140">举办时间</td><td width="150">详细页面</td><td width="200">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->title;?></td>
					<td><?php echo $record[$i]->place;?></td>
					<td><?php echo $record[$i]->time;?></td>
					<td><?php echo $record[$i]->url;?></td>
					<td>
					<?php 
						$rate_flag = false;
						for($j=0;$j<$activity_count;$j++){
							if($record[$i]->id==$activity[$j]->news_id){ $rate_flag=true;?>
							<span style="cursor:pointer" class="revocation" name="<?php echo $activity[$j]->id;?>" title="删除"><img src='/images/btn_delete.png' border='0'></span>
							<input type="text" class="priority"  name="<?php echo $activity[$j]->id;?>"  value="<?php echo $activity[$j]->priority;?>" style="width:40px;">
							<?php break;}?>
					<?php }
						if(!$rate_flag){
					?>
					<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="加入"><img src='/images/btn_add.png' border='0'></span>
					<?php }?>
					</td>
				</tr>
		<?php
			}
		?>
		<input type="hidden" id="db_table" value="fb_activity">
			<tr class="tr3">
				<td colspan=6><button id=edit_priority>编辑优先级</button><input type="hidden" id="list_id" value="<?php echo $id?>"><input type="hidden" id="p_type" value="activity"></td>
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