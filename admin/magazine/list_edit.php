<?php
	require_once('../../frame.php');
	judge_role();
	
	$id = $_REQUEST['id'];
	$page = new table_class("fb_position");
	$page->find($id);
	
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$language_tag = $_REQUEST['language_tag'] ? $_REQUEST['language_tag'] : 0;
	
	$db = get_db();
	
	$sql = "select id,title,short_title,created_at,category_id from fb_news where 1=1";
	$sql .= " and language_tag=$language_tag";
	if($title!= ''){
		$sql .= " and (title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%')";
	}
	if($category_id > 0){
		$sql .= " and category_id=$category_id";
	}
	$news = $db->query("select * from fb_magazine_relation where magazine_id=$id");
	$news_count = count($news);
	$ids = $news[0]->resource_id;
	for($i=1;$i<count($news);$i++){
		$ids.=','.$news[$i]->resource_id;
	}
	
	if($is_adopt==1){
		$sql .= " and id in ($ids)";
	}elseif($is_adopt=='0'){
		if($ids!=''){
			$sql .= " and id not in ($ids)";
		}
	}
	$sql .= " order by priority asc,created_at desc";
	$record = $db->paginate($sql,30);
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('category_class','admin/magazine/relation');
		$category = new category_class('news');
		$category->echo_jsdata();		
	?>
</head>

<body>
<div id=icaption>
    <div id=title>加入文章</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
		<select id="language_tag" name="language_tag" class="sau_search">					
				<option value="0" <? if($_REQUEST['language_tag']=="0"){?>selected="selected"<? }?>>中文</option>
				<option value="1" <? if($_REQUEST['language_tag']=="1"){?>selected="selected"<? }?>>English</option>
		</select>
		<select id=adopt name="adopt" style="width:90px" class="sau_search">
				<option value="">加入状况</option>
				<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已加入</option>
				<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未加入</option>
		</select>
		<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
	
		<tr class=itable_title>
			<td width=35%>标题</td><td width=15%>所属类别</td><td width=15%>发布时间</td><td width=15%>操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td style="text-align:left; text-indent:12px;"><a href="<?php echo "/news/news.php?id={$record[$i]->id}";?>" target="_blank"><?php echo strip_tags($record[$i]->title);?></a></td>
					<td align=left>
						<a href="?category=<?php echo $record[$i]->category_id;?>" style="color:#0000FF">
							<?php echo $category->find($record[$i]->category_id)->name;?>
						</a>
					</td>
					<td align=left>
						<?php echo $record[$i]->created_at;?>
					</td>
					<td>
						<?php 
							$rate_flag = false;
							for($j=0;$j<$news_count;$j++){
								if($record[$i]->id==$news[$j]->resource_id){ $rate_flag=true;?>
								<?php if($news[$j]->is_show=="1"){?>
								<span style="cursor:pointer" class="set_down" name="<?php echo $news[$j]->id;?>" title="取消置于封面"><img src="/images/btn_up.png" border="0"></span>
								<?php }?>
								<?php if($news[$j]->is_show=="0"){?>
								<span style="cursor:pointer" class="set_up" name="<?php echo $news[$j]->id;?>" title="置于封面"><img src="/images/btn_unup.png" border="0"></span>
								<?php }?>
								<span style="cursor:pointer" class="revocation" name="<?php echo $news[$j]->id;?>" title="删除"><img src='/images/btn_delete.png' border='0'></span>
								<input type="text" class="priority"  name="<?php echo $news[$j]->id;?>"  value="<?php echo $news[$j]->priority;?>" style="width:40px;">
								<?php }?>
						<?php }
							if(!$rate_flag){
						?>
						<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="加入"><img src='/images/btn_add.png' border='0'></span>
						<?php }?>
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10><?php paginate();?>　<button id=edit_priority>编辑优先级</button> 		<input type="hidden" id="db_table" value="<?php echo $tb_news;?>">		<input type="hidden" id="list_id" value="<?php echo $id?>"></td>
		</tr>
	</table>
</div>
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