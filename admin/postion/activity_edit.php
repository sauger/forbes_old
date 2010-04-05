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
<div id=icaption>
    <div id=title>自定义活动</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=isearch>	
		<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class="itable_title">
			<td width="20%">活动名称</td><td width="20%">举办地</td><td width="20%">举办时间</td><td width="20%">详细页面</td><td width="20%">操作</td>
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
			<tr class="tr3">
				<td colspan=6><button id=edit_priority>编辑优先级</button><input type="hidden" id="list_id" value="<?php echo $id?>"><input type="hidden" id="p_type" value="activity">		<input type="hidden" id="db_table" value="fb_activity"></td>
			</tr>
	</table>	
</div>
</body>
</html>
<script>
$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($("#search").attr('value'));
}
</script>