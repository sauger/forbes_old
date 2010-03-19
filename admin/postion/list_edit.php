<?php
	require_once('../../frame.php');
	judge_role();
	
	$id = $_REQUEST['id'];
	$page = new table_class("fb_postion");
	$page->find($id);
	
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$language_tag = $_REQUEST['language_tag'] ? $_REQUEST['language_tag'] : 0;
	
	$db = get_db();
	$c = array();
	array_push($c, "language_tag=$language_tag");
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%'");
	}
	if($category_id > 0){
		array_push($c, "category_id=$category_id");
	}
	$news = $db->query("select * from fb_news_postion where postion_id=$id");
	$ids = $news[0]->news_id;
	$rids = $news[0]->id;
	for($i=1;$i<count($news);$i++){
		$ids.=','.$news[$i]->news_id;
		$rids .= ','.$news[$i]->id;
	}
	
	if($is_adopt!=''){
		if($is_adopt==0&&$ids!=''){
			array_push($c, "id not in({$ids})");
		}elseif($is_adopt==1&&$ids!=''){
			array_push($c, "id in({$ids})");
		}elseif($is_adopt==0&&$ids==''){
		}elseif($is_adopt==1&&$ids==''){
			array_push($c, "id=''");
		}
	}
	$news = new table_class($tb_news);
	$record = $news->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'priority asc,created_at desc'),20);
	
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
		js_include_tag('category_class','admin/postion/postion_list');
		$category = new category_class('news');
		$category->echo_jsdata();		
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">
				<input style="margin-left:20px" class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
				<span id="span_category"></span><select id="language_tag" name="language_tag" class="sau_search">					
					<option value="0" <? if($_REQUEST['language_tag']=="0"){?>selected="selected"<? }?>>中文</option>
					<option value="1" <? if($_REQUEST['language_tag']=="1"){?>selected="selected"<? }?>>English</option>
				</select><select id=adopt name="adopt" style="width:90px" class="sau_search">
					<option value="">加入状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已加入</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未加入</option>
				</select>
				<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
				<input type="button" value="搜索" id="search_button" style="height:20px; border:2px solid #999999; ">
				　　<a href="list.php?id=<?php echo $page->page_id;?>">返回位置管理</a>
			</td>
		</tr>
		<tr class="tr2">
			<td width="385">标题</td><td width="80">所属类别</td><td width="130">发布时间</td><td width="200">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td style="text-align:left; text-indent:12px;"><a href="<?php echo "/news/news.php?id={$record[$i]->id}";?>" target="_blank"><?php echo strip_tags($record[$i]->title);?></a></td>
					<td>
						<a href="?category=<?php echo $record[$i]->category_id;?>" style="color:#0000FF">
							<?php echo $category->find($record[$i]->category_id)->name;?>
						</a>
					</td>
					<td >
						<?php echo $record[$i]->created_at;?>
					</td>
					<td>
						<?php if($record[$i]->is_adopt=="1"){?>
						<span style="cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="">加入</span>
						<?php }?>
						<?php if($record[$i]->is_adopt=="0"){?>
						<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>">删除</span>
						<?php }?>

						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate();?>　<button id=clear_priority>清空优先级</button>　<button id=edit_priority>编辑优先级</button></td>
		</tr>
		<input type="hidden" id="db_table" value="<?php echo $tb_news;?>">
		<input type="hidden" id="list_id" value="<?php echo $id?>">
	</table>
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