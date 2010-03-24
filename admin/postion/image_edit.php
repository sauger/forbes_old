<?php
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$db = get_db();
	$c = array();
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%'");
	}
	if($category_id > 0){
		array_push($c, "category_id=$category_id");
	}
	$news = $db->query("select * from fb_position_relation where type='image' and position_id=$id");
	$news_count = count($news);
	$ids = $news[0]->news_id;
	for($i=1;$i<$news_count;$i++){
		$ids.=','.$news[$i]->news_id;
	}
	
	if($is_adopt==1){
		if($ids!=''){
			array_push($c, "id in ($ids)");
		}else{
			array_push($c, "id is null");
		}
	}elseif($is_adopt=='0'){
		if($ids!=''){
			array_push($c, "id not in ($ids)");
		}
	}
	
	
	$image = new table_images_class();
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
		js_include_tag('category_class','admin/position/image_list');
		$category = new category_class('image');
		$category->echo_jsdata();		
	?>
</head>
<body>
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="5" width="795">　自定义图片<a href="index.php"><img src="/images/btn_back.png" border=0></a>
			<input style="margin-left:20px" class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
				<span id="span_category"></span><select id=adopt name="adopt" style="width:90px" class="sau_search">
					<option value="">加入状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已加入</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未加入</option>
				</select>
				<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
				<input type="button" value="搜索" id="search_button" style="height:20px; border:2px solid #999999; ">
			</td>
		</tr>
	</table>
	<div class="div_box">
		<?php for($i=0;$i<count($images);$i++){?>
		<div class=v_box id="<?php echo $images[$i]->id;?>">
			<a href="<?php echo $images[$i]->src;?>" target="_blank"><img src="<?php echo $images[$i]->src_path('middle');?>" height="100" border="0"></a>
			<div class=content>
				<a href="<?php echo $images[$i]->src_path('small');?>" target="_blank" style="color:#000000; text-decoration:none">
					<?php echo $images[$i]->title;?>
				</a>
			</div>
			<div class=content>
				<a href="?category=<?php echo $images[$i]->category_id;?>" style="color:#0000FF">
					<a href="?category=<?php echo $images[$i]->category_id;?>" style="color:#0000FF"><?php echo $category->find($images[$i]->category_id)->name; ?></a>
				</a>
			</div>
			<div class=content>
				<?php echo $images[$i]->created_at; ?>
			</div>
			<div class=content style="height:20px">
				<?php 
					$rate_flag = false;
					for($j=0;$j<$news_count;$j++){
						if($images[$i]->id==$news[$j]->news_id){ $rate_flag=true;?>
						<span style="cursor:pointer" class="revocation" name="<?php echo $news[$j]->id;?>" title="删除"><img src='/images/btn_delete.png' border='0'></span>
						<input type="text" class="priority"  name="<?php echo $news[$j]->id;?>"  value="<?php echo $news[$j]->priority;?>" style="width:40px;">
						<?php break;}?>
				<?php }
					if(!$rate_flag){
				?>
				<span style="cursor:pointer" class="publish" name="<?php echo $images[$i]->id;?>" title="加入"><img src='/images/btn_add.png' border='0'></span>
				<?php }?>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?>　<button id=edit_priority>编辑优先级</button><input type="hidden" id="list_id" value="<?php echo $id?>"></td>
			</tr>
		</table>
	</div>
	<input type="hidden" id="db_table" value="<?php echo $tb_images;?>">
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
			category_id = $('.category_select:last').val();
			$('#search_category').val(id);
			search_news();
		});
	});
</script>

