<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-榜单首页</title>
	<?php
		include_once(dirname(__FILE__).'/../frame.php');
		$db = get_db();
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('list/list','public','right_inc');
	?>
</head>
<body>
<?php
	$id = intval($_GET['id']);
	$order = $_GET['order'];
	if(strlen($order)>20){
		die();
	}
	$desc = intval($_GET['desc']);
	$list = new table_class('fb_custom_list_type');
	$list->find($id);
?>
	<div id=ibody>
		<?php require_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=top>
			<div id=cyindex><img src="/images/html/list/title.gif"></div>
			<div id=cytitle><a style="color:#666666;" href="/">福布斯中文网</a>　＞　<a style="color:#666666;" href="/list">榜单</a>　＞　<a><?php echo $list->name;?></a></div>
			<div id=cyline></div>
		</div>
		<div id="left">
			<div id="left_top">
				<a href="more.php?id=<?php echo $id;?>">查看详细</a>
			</div>
			<div id="list_content">
			<?php
				if($list->table_name=="fb_famous_list_items"){
			?>
				<div id="content_top">
					<table border="0" cellpadding="0" cellspacing="0" >
						<tr id="top_tr">
							<td valign="middle" width="10%"><a href="show_list.php?id=<?php echo $id;?>&order=overall_order&desc=<?php echo ($order=='overall_order')?!$desc:'0';?>">综合<br>排名</a></td>
							<td valign="middle" width="15%">姓名</td>
							<td valign="middle" width="15%">职业</td>
							<td valign="middle" width="15%"><a href="show_list.php?id=<?php echo $id;?>&order=fortune&desc=<?php echo ($order=='fortune')?!$desc:'1';?>">收入<br>（万人民币）</a></td>
							<td valign="middle" width="15%"><a href="show_list.php?id=<?php echo $id;?>&order=fortune_order&desc=<?php echo ($order=='fortune_order')?!$desc:'0';?>">收入排名</a></td>
							<td valign="middle" width="15%"><a href="show_list.php?id=<?php echo $id;?>&order=exposure_rate&desc=<?php echo ($order=='exposure_rate')?!$desc:'0';?>">曝光率指数</a></td>
							<td valign="middle" width="15%"><a href="show_list.php?id=<?php echo $id;?>&order=exposure_order&desc=<?php echo ($order=='exposure_order')?!$desc:'0';?>">曝光率排名</a></td>
						</tr>
					</table>
				</div>
				<table style="margin-left:25px;" border="0" cellpadding="0" cellspacing="0" >
					<?php
						if(empty($order)){
							$order = "overall_order";
						}
						if(empty($desc)){
							$desc = "asc";
						}else{
							$desc = "desc";
						}
						$sql = "select * from fb_famous_list_items where list_id=$id order by $order $desc";
						$list = $db->paginate($sql,20);
						$count = count($list);
						for($i=0;$i<$count;$i++){
					?>
					<tr class="btr">
						<td valign="middle" width="10%" style="color:#246BB0;"><?php echo $list[$i]->overall_order;?></td>
						<td valign="middle" width="15%">
							<?php if($list[$i]->famous_id!=''){?>
								<a href="/famous/famous.php?id=<?php echo $list[$i]->famous_id;?>">
							<?php }?>
							<?php echo $list[$i]->name;?>
							<?php if($list[$i]->famous_id!=''){?></a><?php }?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->job;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->fortune;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->fortune_order;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->exposure_rate;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->exposure_order;?></td>
					</tr>
					<?php }?>
				</table>
			<?php }else if($list->table_name=="fb_rich_list_items"){?>
				<div id="content_top">
					<table border="0" cellpadding="0" cellspacing="0" >
						<tr id="top_tr">
							<td valign="middle" width="10%"><a href="show_list.php?id=<?php echo $id;?>&order=overall_order&desc=<?php echo ($order=='overall_order')?!$desc:'0';?>">综合排名</a></td>
							<td valign="middle" width="15%">姓名</td>
							<td valign="middle" width="15%">年龄</td>
							<td valign="middle" width="15%"><a href="show_list.php?id=<?php echo $id;?>&order=fortune&desc=<?php echo ($order=='fortune')?!$desc:'1';?>">年收入<br>（<?php echo $list->unit;?>）</a></td>
							<td valign="middle" width="15%">所属省市</td>
							<td valign="middle" width="15%">公司名</td>
							<td valign="middle" width="15%">主要产业</td>
						</tr>
					</table>
				</div>
				<table style="margin-left:25px;" border="0" cellpadding="0" cellspacing="0" >
					<?php
						if(empty($order)){
							$order = "overall_order";
						}
						if(empty($desc)){
							$desc = "asc";
						}else{
							$desc = "desc";
						}
						$sql = "select * from fb_rich_list_items where list_id=$id order by $order $desc";
						$list = $db->paginate($sql,20);
						$count = count($list); 
						for($i=0;$i<$count;$i++){
					?>
					<tr class="btr">
						<td valign="middle" width="10%" style="color:#246BB0;"><?php echo $list[$i]->overall_order;?></td>
						<td valign="middle" width="15%">
							<?php if($list[$i]->rich_id!=''){?>
								<a href="/rich/rich.php?id=<?php echo $list[$i]->rich_id;?>">
							<?php }?>
							<?php echo $list[$i]->name;?>
							<?php if($list[$i]->famous_id!=''){?></a><?php }?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->age;?>岁</td>
						<td valign="middle" width="15%"><?php echo $list[$i]->fortune;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->zone;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->company;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->industry;?></td>
					</tr>
					<?php }?>
				</table>
			<?php }else{?>
				<div id="content_top">
					<table border="0" cellpadding="0" cellspacing="0" >
						<tr id="top_tr">
							<?php 
								$fields = $db->query("show full fields FROM {$list->table_name}");
								$count = $db->record_count;
								if($count>8)$count=8;
								$width = 100/$count;
								for($i=1;$i<$count;$i++){
							?>
							<td width="<?php echo $width;?>%" valign="middle">
								<?php if($fields[$i]->Key=='MUL'){
									echo "<a href='show_list.php?id=$id&order={$fields->Field}&desc=";
									echo ($order==$fields->Field)?!$desc:'1';
									echo "'>";
								}
								echo $fields[$i]->Comment;
								if($fields[$i]->Key=='MUL'){
									echo "</a>";
								}?>
							</td>
							<?php }?>
						</tr>
					</table>
				</div>
				<table style="margin-left:25px;" border="0" cellpadding="0" cellspacing="0" >
					<?php
						if(empty($order)){
							$order = "id";
						}
						if(empty($desc)){
							$desc = "asc";
						}else{
							$desc = "desc";
						}
						$sql = "select * from {$list->table_name} order by $order $desc";
						$list = $db->paginate($sql,20);
						$list_count = count($list); 
						for($i=0;$i<$list_count;$i++){
					?>
					<tr class="btr">
						<?php for($j=1;$j<$count;$j++){
							$field_name = field_.$j;
						?>
						<td  width="<?php echo $width;?>%" valign="middle" ><?php echo $list[$i]->$field_name;?></td>
						<?php }?>
					</tr>
					<?php }?>
				</table>
			<?php }?>
			</div>
			<div id="paginate">
				<?php paginate();?>
			</div>
		</div>
		<div id="right_inc">
			<?php require_once(dirname(__FILE__).'/../right/ad.php');?>
			<?php require_once(dirname(__FILE__).'/../right/favor.php');?>
			<?php require_once(dirname(__FILE__).'/../right/four.php');?>
			<?php require_once(dirname(__FILE__).'/../right/magazine.php');?>
		</div>
		<?php require_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>