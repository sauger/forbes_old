<?php
	require_once('../../frame.php');
	judge_role();
	$category = new category_class('news');
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$up = $_REQUEST['up'];
	$language_tag = $_REQUEST['language_tag'] ? $_REQUEST['language_tag'] : 0;
	
	$db = get_db();
	$c = array();
	array_push($c, "language_tag=$language_tag");
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%'");
	}
	if($category_id > 0){
		$cate_ids = implode(',',$category->children_map($category_id));
		array_push($c, "category_id in($cate_ids)");
	}
	if($is_adopt!=''){
		array_push($c, "is_adopt=$is_adopt");
	}
	$news = new table_class($tb_news);
	$record = $news->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'created_at desc,category_id'),30);
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
		js_include_tag('admin_pub','category_class','admin/pub/search','admin/news/news_list');
		$category->echo_jsdata();		
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">　
				<a href="/admin/news/news_edit.php" id="add_news">发布新闻</a>
				<input style="margin-left:20px" class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
				<span id="span_category"></span><select id=adopt name="adopt" style="width:90px" class="sau_search">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
				</select><select id="language_tag" name="language_tag" class="sau_search">					
					<option value="0" <? if($_REQUEST['language_tag']=="0"){?>selected="selected"<? }?>>中文</option>
					<option value="1" <? if($_REQUEST['language_tag']=="1"){?>selected="selected"<? }?>>English</option>
				</select><select id=up name="up" style="width:90px" class="sau_search" style="display:none">
					<option value="">是否置顶</option>
					<option value="1" <? if($_REQUEST['up']=="1"){?>selected="selected"<? }?>>已置顶</option>
					<option value="0" <? if($_REQUEST['up']=="0"){?>selected="selected"<? }?>>未置顶</option>
				</select>
				<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
				<input type="button" value="搜索" id="search_button" style="height:20px; border:2px solid #999999; ">
			</td>
		</tr>
		<tr class="tr2">
			<td width="395">标题</td><td width="120">所属类别</td><td width="130">发布时间</td><td width="150">操作</td>
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
						<a href="/admin/news/news_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/btn_edit.png" border="0"></a>　
						<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/btn_delete.png" border="0"></span>　
						<?php if($record[$i]->is_adopt=="1"){?>
						<span style="cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/btn_apply.png" border="0"></span>
						<?php }?>
						<?php if($record[$i]->is_adopt=="0"){?>
						<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/btn_unapply.png" border="0"></span>
						<?php }?>
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate("",null,"page",true);?>　<button id=clear_priority style="display:none">清空优先级</button>　<button id=edit_priority  style="display:none">编辑优先级</button>		<input type="hidden" id="db_table" value="<?php echo $tb_news;?>"></td>
		</tr>
	</table>
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
			var category_id = $('.category_select:last').val();
			if(category_id <= 0){
				var count = $('.category_select').length;
				for(var i=count-1;i>=0;i--){
					if($('.category_select:eq(' + i +')').val() > 0 ){
						category_id = $('.category_select:eq(' + i +')').val();
						break;
					}
				}
			}
			$('#search_category').val(category_id);
			search_news();
		});
	});
</script>