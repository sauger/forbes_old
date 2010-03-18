<?php 
	require_once('../frame.php');
	$cid = intval($_REQUEST['cid']);
	if(empty($cid)){
		redirect('error.html');
		die();
	}
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-新闻列表</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('html/culture/culture','top','bottom','select2css','paginate');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>文章列表</div>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($cid);
			?>
			<div id=title1>
				<a href="/">福布斯中文网</a>
				<?php
					$len = count($parent_ids);
					for($i=$len-1;$i>0;$i--){
						$item = $category->find($parent_ids[$i]);
				?>>
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a>
				<?php
					}
					$item = $category->find($parent_ids[0]);
				?>
				><span style="color:#246BB0; margin-left:8px;"><?php echo $item->name;?></span>
			</div>
			<div id=line></div>
		</div>
		<div id=l>
			<div id=l_t>
				<div id=l_t_t>
					<div id=l_t_t1>
						文化娱乐
					</div>
				</div>
				<?php
					$top_news = $db->query("select * from fb_news where category_id={$cid} and video_photo_src!='' and set_up=1 order by priority asc,created_at desc limit 1");
					if($db->record_count==1&&(empty($_REQUEST['page'])||($_REQUEST['page']==1))){
				?>
				<div id=l_t_m>
					<div id=picture>
						<img height="200" width="300" src="<?php echo $top_news[0]->video_photo_src?>">
					</div>
					<div id=l_t_m_r>
						<div id=l_t_m_r_t1>
							<a href="news.php?id=<?php echo $top_news[0]->id;?>"><?php echo $top_news[0]->title;?></a>
						</div>
						<div id=l_t_m_r_t2>
							<?php echo $top_news[0]->description;?>
						</div>
						<div id=l_t_m_r_t3>
							<a href="news.php?id=<?php echo $top_news[0]->id;?>">详细>></a>
						</div>
					</div>
					<div id=l_t_b>
						《福布斯》　记者：<?php echo $top_news[0]->author;?>　发布于：<?php echo substr($top_news[0]->created_at,0,10);?>
					</div>
				</div>
				<?php }?>
				<div id=l_m>
					<?php
						if($db->record_count==1){
							$sql = "select id,author,created_at,title,description from fb_news where category_id=$cid and id!={$top_news[0]->id} order by priority asc,created_at desc";
						}else{
							$sql = "select id,author,created_at,title,description from fb_news where category_id=$cid order by priority asc,created_at desc";
						}
						$record = $db->paginate($sql,4);
						$count = count($record);
						for($i=0;$i<$count;$i++){
					?>
					<div class=l_m_t>
						<div class=l_m_t1>
							<div class=l_m_t2>
								<a title="<?php echo $record[$i]->title;?>" href="news.php?id=<?php echo $record[$i]->id;?>"><?php echo $record[$i]->title?></a>
							</div>
							<div class=l_m_t3>
								《福布斯》　记者：<?php echo $record[$i]->author;?>　发布于：<?php echo substr($record[$i]->created_at,0,10);?>
							</div>
							<div class=l_m_t4 >
								<?php echo $record[$i]->description;?>
							</div>
						</div>
						<div class="dash"></div>
					</div>
					<?php }?>
					<div id=page>
						<?php paginate();?>
					</div>
				</div>
			</div>
		</div>
		
		
		<div id=r>
			<div id=ad>
			</div>
			<div id=r_m_d1>
				<div id=r_m_d1_t>
					<div id=r_m_d1_t1>
						最受欢迎
					</div>
					<div id=r_m_d1_t2>
						编辑推荐
					</div>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3 style="border-style:none;">
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
			</div>
			<div id=r_m_d2>
				<div id=r_m_d2_t1>
					创业
				</div>
				<div id=r_m_d2_t2>
					科技
				</div>
				<div id=r_m_d2_t2 style="margin-left:0px;">
					商业
				</div>
				<div id=r_m_d2_t4>
					投资
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3>
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
				<div id=r_m_d1_t3 style="border-style:none;">
					<a href="">沪二价空间空间升至升至10%沪价空升至10%</a>
				</div>
			</div>
			<div id=r_m_d3>
				<div id=r_m_d3_t>
					<a href="">更多>></a>
				</div>
				<div id=picture1>
				</div>
				<div id=r_m_d3_t1>
					后危机时代更需要包机时代更需要包容与方巾
				</div>
				<div id=r_m_d3_t2>
					<a href="">最佳投资人榜单资人榜单资人榜单资人榜单资人榜单</a>
				</div>
				<div id=r_m_d3_t2 style="margin-top:4px;">
					<a href="">最佳投资人榜单资人榜单资人榜单资人榜单资人榜单</a>
				</div>
			</div>
			<div id=r_m_d4>
				<div id=r_m_d4_t>
					福布斯杂志
				</div>
				<div id=r_m_d4_t1>
					<div id=picture2>
					</div>
					<div id=r_m_d4_t2>
						<div id=r_m_d4_t3>
							福布斯2010年1月刊
						</div>
						<div id=r_m_d4_t4>
							宇星科技、搜房网、聚光科技夺得新能源等行业表现抢眼
						</div>
						<div id=r_m_d4_t4>
							宇星科技、搜房网、聚光科技夺得新能源等行业表现抢眼
						</div>
						<input type="button" id=button2><input type="button" id=button3>
					</div>
					<div id=r_m_d4_t5>
						<div id=r_m_d4_t6>
							往期杂志查阅
						</div>
						<div id=d_s1>
							<select style="width:113px; height:19px; "></select>
						</div>
						<div id=r_m_d4_t7>
							<a href="">杂志列表</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
<html>