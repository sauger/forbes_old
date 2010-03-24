<?php
	include '../../frame.php';
	$start_time = $_POST['start_time'];
	$ent_time = $_POST['end_time'];
	if($start_time){
		$c[] = "created_at >='{$start_time} 00:00:00'";
	}
	if($ent_time){
		$c[] = "created_at <='{$ent_time} 23:59:59'";
	}
	
	$sql = "SELECT count(*) as icount,b.nick_name FROM fb_news a left join fb_user b on a.publisher = b.id";
	if($c){
		$sql .= " where " .implode(' and ',$c);
	}
	$sql .= " group by publisher order by icount DESC";
	
	
	$db = get_db();
	$items = $db->query($sql);
?>
<?php if($db->record_count <= 0 || !$items){
	die("没有找到记录");
}?>
<table width="795" border="0" id="list">
			<tr class="tr2">
				<td>姓名</td><td>数量</td>
			</tr>
<?php 
foreach ($items as $v) { ?>
<tr class="tr4">
	<td><?php echo $v->nick_name;?></td>
	<td><?php echo $v->icount;?></td>
</tr>
<?php }?>
</table>
<?php 
$sql = "SELECT count(*) as icount,b.nick_name,c.name  FROM fb_news a left join fb_user b on a.publisher = b.id left join fb_category c on a.category_id = c.id";
	if($c){
		$sql .= " where " .implode(' and ',$c);
	}
	$sql .= " group by category_id,publisher order by icount DESC";
	$items = $db->query($sql);
?>
<a id="detail" href="#">查看详细</a>

<div id="div_detail" style="display:none;">
<table width="795" border="0">
			<tr class="tr2">
				<td>姓名</td><td width="115">文章分类</td><td>数量</td>
			</tr>
<?php 
foreach ($items as $v) { ?>
<tr class="tr4">
	<td><?php echo $v->nick_name;?></td>
	<td><?php echo $v->name;?></td>
	<td><?php echo $v->icount;?></td>
</tr>
<?php }?>
</table>
</div>