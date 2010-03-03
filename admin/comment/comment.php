<?php
	require_once('../../frame.php');
	$type = $_REQUEST['type'];
	$id = $_REQUEST['id'];
	$conditions = null;
	$conditions[] = 'resource_type="'.$type.'"';
	$conditions[] = 'resource_id='.$id;
	if($_REQUEST['key1']!=""){
		$conditions[] = 'nick_name  like "%'.trim($_REQUEST['key1']).'%"';
	}
	if($_REQUEST['key2']!=""){
		$conditions[] = 'comment  like "%'.trim($_REQUEST['key2']).'%"';
	}
	if($conditions!=null){
		$conditions = implode(' and ',$conditions);
	}
	
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
		js_include_tag('admin_pub','admin/comment');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
		<tr class=tr1>
			<td colspan="5" width="795">　　　
			搜索<span style="margin-left:100px; font-size:13px">留言人&nbsp;&nbsp;<input id=user_name type="text" value="<? echo $_REQUEST['key1']?>">&nbsp;&nbsp留言内容&nbsp;&nbsp;<input id=comment type="text" value="<? echo $_REQUEST['key2']?>"></span>
			<input type="button" value="搜索" id="search" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="150">留言人</td><td width="350">留言内容</td><td width="150">留言时间</td><td width="150">操作</td>
		</tr>
		<?php
			$comment = new table_class("fb_comment");
			if($conditions!=null){
				$record = $comment->paginate("all",array('conditions' => $conditions,'order' => 'created_at desc'),18);
			}else{
				$record = $comment->paginate("all",array('conditions' => 'resource_type="'.$type.'" and resource_id="'.$id.'"','order' => 'created_at desc'),18);	
			}
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->nick_name;?></td>
					<td><?php echo $record[$i]->comment;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><a class="del_comment" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer">删除</a></td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<input type="hidden" id="db_talbe" value="fb_comment">
		<input type="hidden" id="id" value="<?php echo $record[0]->id;?>">
		<input type="hidden" id="r_id" value="<?php echo $id;?>">
		<input type="hidden" id="r_type" value="<?php echo $type;?>">
	</table>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>