<?php
	require_once('../frame.php');
	require_role('admin');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>Manage : Forbeschina</title>
	<?php	
		css_include_tag('admin2','colorbox');
		use_jquery();
		js_include_tag('jquery.cookie.js', 'pubfun','jquery.colorbox-min');
  ?>
</head>
<body>
<div id=ibody >
		<div id=top>
			<div id=site><?php echo $site_name; ?>后台管理</div>
			<div id=login>欢迎你：  <?php echo $_SESSION["admin_nick_name"]; ?> [<a href="/login/logout.post.php">退出</a>]</div>
		</div>
		<div id=nav1>
				<div class=nav1_menu><a href="">位置管理</a></div>		
				<div class=nav1_menu>内容管理</div>		
				<div class=nav1_menu>榜单管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
				<div class=nav1_menu>位置管理</div>		
		</div>
		
		<div id=nav2>
				<div class=nav2_menu>榜单管理</div>		
				<div class=nav2_menu>位置管理</div>		
				<div class=nav2_menu>位置管理</div>		
				<div class=nav2_menu>位置管理</div>		
				<div class=nav2_menu>位置管理</div>				
		
		</div>






<?php
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
	if($up!=''){
		array_push($c, "set_up=$up");
	}
	$news = new table_class($tb_news);
	$record = $news->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'created_at desc,category_id'),30);
?>

 <div id=admin_content>
		<div class=caption>
				<div id=title>文章管理</div>
				<a href="" id=btn_add></a>
		</div>
		<div class=tt>
				<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
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

			
		</div>

	<table width="986" border="0" id="list" align="center" cellspacing="1" bgcolor="#e7e7e7">
		<tr class="tr2">
			<td width="55%">标题</td><td width="15%">所属类别</td><td width="15%">发布时间</td><td width="15%">操作</td>
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
						<a href="news_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/btn_edit.png" border="0"></a>
						<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/btn_delete.png" border="0"></span>
						
						<?php
						if($_SESSION['role_name'] == 'admin' || $_SESSION['role_name'] == "sys_admin"){ 
							if($record[$i]->is_adopt=="1"){?>
						<span style="cursor:pointer" class="unpublish_news" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/btn_apply.png" border="0"></span>
						<?php }?>
						<?php
						 
							if($record[$i]->is_adopt=="0"){?>
						<span style="cursor:pointer" class="publish_news" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/btn_unapply.png" border="0"></span>
						<?php }}?>
						<?php if($record[$i]->set_up=="1"){?>
						<span style="cursor:pointer" class="set_down" name="<?php echo $record[$i]->id;?>" title="取消置顶"><img src="/images/btn_up.png" border="0"></span>
						<?php }?>
						<?php if($record[$i]->set_up=="0"){?>
						<span style="cursor:pointer" class="set_up" name="<?php echo $record[$i]->id;?>" title="置顶"><img src="/images/btn_unup.png" border="0"></span>
						<?php }?>
						<?php if($_SESSION['role_name'] == 'admin' || $_SESSION['role_name'] == "sys_admin"){?>
						<a  title="静态页面" href="<?php echo $static_site .static_news_url($record[$i]);?>" target="static_news"><img src="/images/btn_static.png" border="0"></a>
						<?php }?>
						<a href="/admin/comment/comment.php?id=<?php echo $record[$i]->id;?>&type=news" title="评论"><img src="/images/btn_comment.png" border="0"></a>
						<input type="hidden" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate("",null,"page",true);?>　<button id=clear_priority style="display:none">清空优先级</button>　<button id=edit_priority  style="display:none">编辑优先级</button><input type="hidden" id="relation" value="news"><input type="hidden" id="db_table" value="<?php echo $tb_news;?>"></td>
		</tr>
	</table>

 </div>












	
</div>
</body>
</html>
<script>
$(function(){
	$(".nav1_menu").mouseover(function(e){
		 $(".nav1_menu").css("font-weight","normal");
		 $(".nav1_menu").css("border-left","1px solid #ffffff");
		 $(".nav1_menu").css("border-right","1px solid #d8d8d8");
		 $(".nav1_menu").css("background","#f0f0f0");

		 $(this).css("font-weight","bold");
		 $(this).css("border-left","1px solid #E7EDDF");
		 $(this).css("border-right","1px solid #E7EDDF");
		 $(this).css("background","#E7EDDF");

	});
	
	$(".tr3").mouseover(function(e){
		 $(".tr3").css("background","#ffffff");
		 $(this).css("background","#f9f9f9");
	});	

	$(".tr3").mouseout(function(e){
		 $(".tr3").css("background","#ffffff");
	});		

});
</script>



