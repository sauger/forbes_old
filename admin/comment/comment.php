<?php
	require_once('../../frame.php');
	$type = $_REQUEST['type'];
	$id = $_REQUEST['id'];
	$conditions = null;
	if($type)$conditions[] = 'resource_type="'.$type.'"';
	if($id)$conditions[] = 'resource_id='.$id;
	if($_GET['s_text']){ $conditions[]='nick_name  like "%'.trim($_REQUEST['s_text']).'%"' ." or comment like '%{$_GET['s_text']}%'";}
	if($conditions!=null){
		$conditions = implode(' and ',$conditions);
		$conditions = array("conditions" => $conditions);
	}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/comment');
	?>
	<style type="text/css">
	</style>
</head>
<body>
	<div id=icaption>
	    <div id=title>评论管理</div>
	</div>
	<div id=isearch>
		<span style="line-height:22px;">搜索内容</span><input id="s_text" type="text" value="<?php echo $_GET['s_text']?>" />
				<input type="button" value="搜索" id="search_button">
	</div>
	<div id="itable">
	<table width="795" border="0" id="list">
		<tr class="tr2">
			<td width="150">留言人</td><td width="100">IP</td><td width="350">留言内容</td><td width="150">留言时间</td><td width="150">操作</td>
		</tr>
		<?php
			$comment = new table_class("fb_comment");
			$record = $comment->paginate("all", $conditions ,30);
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
				
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->nick_name;?></td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><?php echo $record[$i]->comment;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><a class="del_comment" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer">删除</a></td>
				</tr>
		<?php
			}
		?>
	</table>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
		<input type="hidden" id="db_talbe" value="fb_comment">
		<input type="hidden" id="id" value="<?php echo $record[0]->id;?>">
		<input type="hidden" id="r_id" value="<?php echo $id;?>">
		<input type="hidden" id="r_type" value="<?php echo $type;?>">
	</div>
</body>
</html>