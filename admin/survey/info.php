<?php
    require_once('../frame.php');
	$db = get_db();
	$id = intval($_REQUEST['id']);
	$r_id = intval($_REQUEST['r_id']);
	$page_index = isset($_REQUEST['page']) ? ($_REQUEST['page']-1) : 0;
	
	$sql = "select * from hoau_question where problem_id={$id} order by priority asc";
	$record = $db->paginate($sql,4);
	$item = $db->query("select t2.* from hoau_question t1 join hoau_question_item t2 on t1.id=t2.question_id where t1.problem_id={$id} order by priority asc");
	$re = $db->query("select * from hoau_question_record_info where record_id=$r_id");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('drd/wjdc2','breadcom');
		use_jquery();
		js_include_tag('top');
		rights($_SESSION["hoaurights"],'7');
	?>
</head>
<body  style="background:#ffffff">
	<div id="title">
		<div style="float:left">问卷调查</div>
	</div>
	<div id="list">
		<?php for($i=0;$i<count($record);$i++){
		?>
		<div class=list_line>
			<div class="num"><?php echo ($page_index*4+$i+1);?>.</div>
			<div class=title>
				<?php echo $record[$i]->name;?>
			</div>
			<?php
			    $item_id = 0;
				for($j=0;$j<count($re);$j++){
					if($re[$j]->question_id==$record[$i]->id){
						$item_id = $re[$j]->item_id;
					}
				}
				for($j=0;$j<count($item);$j++){
					if($item[$j]->question_id==$record[$i]->id){
			?>
			<div class="item_box">
				<div class="item"><input type="radio" <?php if($item[$j]->id==$item_id)echo 'checked="cchecked"';?> name="item<?php echo $i?>" style="float:left;display:inline;" value="<?php echo $item[$j]->id?>"><div style="width:550px;float:left;display:inline"><?php echo $item[$j]->name;?></div></div>
			</div>
			<?php
					}
				}
			?>
			<input type="hidden" name="id[]" value="<?php echo $record[$i]->id;?>">
		</div>
		<?php
		} ?>
	</div>
	<div id=paginate><?php paginate();?></div>
	<a href="show.php?id=<?php echo $id;?>"><button id="tj">返回</button></a>
</body>
</html>
