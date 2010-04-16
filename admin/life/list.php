<?php
	require_once('../../frame.php');
	$db = get_db();
	$title = $_REQUEST['title'];
	$type=$_REQUEST['type'];
	$is_adopt = $_REQUEST['adopt'];
	$db = get_db();
	$c = array();
	array_push($c,"type='".$type."'");
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%'");
	}
	$news = $db->query("select * from fb_life_flash where type='".$type."'");
	$news_count = count($news);
	
	
	$image = new table_class('fb_life_flash');
	$images = $image->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'priority asc,created_at desc'),12);
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
		js_include_tag('category_class','admin_pub','admin/flash.js');
		$category = new category_class('image');
		$category->echo_jsdata();		
	?>
</head>
<body>
<div id=icaption>
  <div id=title><?php if($type<>"news"){echo "自定义图片";}else{ echo "自定义新闻";} ?></div>
  <a href="edit.php?type=<?php echo $type; ?>" id=btn_add></a>
  <div id="scxml" class="btn_generate" param="<?php echo $type; ?>">生成FLASH</div>
</div>
<div id=itable>
	<? if($type<>"news"){ ?>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="35%">图片</td><td width="35%">名称</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php for($i=0;$i<count($images);$i++){?>
		<tr class=tr3 id=<?php echo $images[$i]->id;?>>
			<td  height=60><a href="<?php echo $images[$i]->src;?>" target="_blank"><img src="<?php echo $images[$i]->src;?>" width="50" height="50" border="0"></a></td>
			<td><?php echo $images[$i]->title;?></td>
			<td><?php echo $images[$i]->created_at;?></td>
			<td>
				<?php if($images[$i]->is_adopt=="1"){?>
					<span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $images[$i]->id;?>">撤消</span>
				<?php }?>
				<?php if($images[$i]->is_adopt=="0"){?>
					<span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $images[$i]->id;?>">发布</span>
				<?php }?>
				<a href="edit.php?id=<?php echo $images[$i]->id;?>&type=<?php echo $type; ?>" style="color:#000000; text-decoration:none"><img border=0 src="/images/btn_edit.png"></a> 
				<span style="cursor:pointer; color:#FF0000" class="del" name="<?php echo $images[$i]->id;?>"><img border=0 src="/images/btn_delete.png"></span>
				<input type="text" class="priority" name="<?php echo $images[$i]->id;?>" value="<?php if($images[$i]->priority!=100){echo $images[$i]->priority;}?>" style="width:40px;">
				<input type="hidden" id="priorityh<? echo $p;?>" value="<?php echo $images[$i]->id;?>" style="width:40px;">	
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority >清空优先级</button>
				<button id=edit_priority  >编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_life_flash">
				<input type="hidden" id="relation" value="image">
			</td>
		</tr>
  </table>
  <?php }else{ ?>
  <table cellspacing="1" align="center">
		<tr class="itable_title">
			<td width="70%">标题</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($images);$i++){
		?>
				<tr class=tr3 id=<?php echo $images[$i]->id;?> >
					<td style="text-indent:12px;"><a href="<?php echo $images[$i]->url;?>" target="_blank"><?php echo strip_tags($images[$i]->title);?></a></td>
					<td >
						<?php echo $images[$i]->created_at;?>
					</td>
					<td>
						<?php 
							$rate_flag = false;
							for($j=0;$j<$news_count;$j++){
								if($images[$i]->id==$news[$j]->news_id){ $rate_flag=true;?>
								<span style="cursor:pointer" class="revocation" name="<?php echo $news[$j]->id;?>" title="<img border=0 src="/images/btn_delete.png">"><img src='/images/btn_delete.png' border='0'></span>
								<input type="text" class="priority"  name="<?php echo $news[$j]->id;?>"  value="<?php echo $news[$j]->priority;?>" style="width:40px;">
								<?php break;}?>
						<?php }
							if(!$rate_flag){
						?>
							<a href="edit.php?id=<?php echo $images[$i]->id;?>&type=<?php echo $type; ?>" style="color:#000000; text-decoration:none"><img border=0 src="/images/btn_edit.png"></a> 
							<span style="cursor:pointer; color:#FF0000" class="del" name="<?php echo $images[$i]->id;?>"><img border=0 src="/images/btn_delete.png"></span>
							<input type="text" class="priority" name="<?php echo $images[$i]->id;?>" value="<?php if($images[$i]->priority!=100){echo $images[$i]->priority;}?>" style="width:40px;">
						<?php }?>
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>　
				<button id=clear_priority>清空优先级</button>
				<button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_life_flash">
				<input type="hidden" id="relation" value="image"></td>
		</tr>
		<input type="hidden" id="p_type" value="flash_news">
	</table>
	<?php } ?>
	</div>
	<input type="hidden" id="db_table" value="<?php echo $tb_images;?>">
	<input type="hidden" id="p_type" value="top_flash">
</body>
</html>

