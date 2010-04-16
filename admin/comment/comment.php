<?php
	require_once('../../frame.php');
	$type = $_REQUEST['type'];
	$type = empty($type) ? "news" : $type; 
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
		<span style="line-height:22px;">搜索内容</span>
		<input id="s_text" type="text" value="<?php echo $_GET['s_text']?>" />
		<span style="line-height:22px;">评论类型</span>
		<select id="comment_type">
			<option value="news">新闻评论</option>
			<option value="magazine">杂志评论</option>
		</select>
		<script>
			$('#comment_type').val('<?php echo $type;?>');
		</script>
		<input type="button" value="搜索" id="search_button">
	</div>
	<div id="itable">
	<?php 
		if($type == 'magazine'){
			include '_magazine.php';
		}else{
			include '_comment.php';
		}
	?>
		<input type="hidden" id="db_table" value="fb_comment">
		<input type="hidden" id="id" value="<?php echo $record[0]->id;?>">
		<input type="hidden" id="r_id" value="<?php echo $id;?>">
	</div>
</body>
</html>