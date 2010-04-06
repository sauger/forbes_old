<?php 
	require_once( dirname(__FILE__) .'/frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯首页</title>
	<?php
		use_jquery();
		js_include_tag('public','index');
		css_include_tag('public','index');
	?>
</head>
<body>
	<div id=ibody>
	<?php require_once('inc/top.inc.php');?>
	<?php 
		function get_news_url($news){
			return dynamic_news_url($news);
		}
		//$pos_items = get_page_items('index2');
		init_page_items();
	?>
		<div id=forbes_tlt>
			<?php $record_show = get_news_by_pos('每日头条');	?>
  		<div id=headline>
				<div class=headline_pic id=headline_pic_0><a href="<?php echo $pos_items->index2_hl_0->href;?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->index2_hl_0->image1; ?>"></a></div>
				<?php for($i=1;$i<4;$i++){
					$pos_name = "index2_hl_{$i}";
				?>
				<div class=headline_pic id="headline_pic_<?php echo $i;?>" style="display:none;"><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->$pos_name->image1; ?>"></a></div>
				<?php }?>
				<div id=headline_content>
					<div class=headline_title id=headline_title_0 pos="index2_hl_0"><a href="<?php echo $pos_items->index2_hl_0->href;?>"><?php echo $pos_items->index2_hl_0->display; ?></a></div>
					<div class=headline_title id=headline_title_1 style="display:none;" pos="index2_hl_1"><a href="<?php echo $pos_items->index2_hl_1->href;?>"><?php echo $pos_items->index2_hl_1->display; ?></a></div>
					<div class=headline_title id=headline_title_2 style="display:none;" pos="index2_hl_2"><a href="<?php echo $pos_items->index2_hl_2->href;?>"><?php echo $pos_items->index2_hl_2->display; ?></a></div>
					<div class=headline_title id=headline_title_3 style="display:none;" pos="index2_hl_3"><a href="<?php echo $pos_items->index2_hl_3->href;?>"><?php echo $pos_items->index2_hl_3->display; ?></a></div>
					<div class=headline_description id=headline_description_0><?php echo $pos_items->index2_hl_0->description; ?></div>
					<div class=headline_description id=headline_description_1 style="display:none;"><?php echo $pos_items->index2_hl_1->description; ?></div>
					<div class=headline_description id=headline_description_2 style="display:none;"><?php echo $pos_items->index2_hl_2->description; ?></div>
					<div class=headline_description id=headline_description_3 style="display:none;"><?php echo $pos_items->index2_hl_3->description; ?></div>
					
			    	<?php for($j=0;$j<=3;$j++){?>	
					<div class=headline_related id=headline_related_<?php echo $j?> <?php if($j<>0){echo "style='display:none'";}?> >
					<?php				
					 		$sub_news_str=explode(",",$record_show[$j]->sub_headline); 
				  			$sub_news_str_num=sizeof($sub_news_str)-1;

							for($i=0;$i<$sub_news_str_num;$i++)
							{
								  if($sub_news_str_num<1){break;}
									$sql="select id,created_at,n.short_title from fb_news n where n.id=".$sub_news_str[$i];
									$record_sub_news = $db -> query($sql);
									echo '<div class=list><a href="'.get_news_url($record_sub_news[0]).'">'.strip_tags($record_sub_news[0]->short_title).'</a></div>';
							}
					?>				
					</div>
				  <? }?>	
	
					<div id=more></div>
					<div id=btn>
						<div class=headline_btn1 id=l style="background:url(images/index/slideshow_back.gif) no-repeat;"></div>
						<div class=headline_btn2 id=0 style="background:url(images/index/slideshow_active.gif) no-repeat"></div>
						<div class=headline_btn2 id=1 style="background:url(images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn2 id=2 style="background:url(images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn2 id=3 style="background:url(images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn1 id=r style="background:url(images/index/slideshow_next.gif) no-repeat"></div>
					</div>
				</div>
			</div>
			<? /* headline-end */?>
			
		 <div id=forbes_tltb>	
			 <?php
				 $record_show = get_news_by_pos('陆家嘴早餐');
  		 ?>
			 <div id=lujiazui>
  		 	 <div id=lujiazui_caption><a href="">陆家嘴早餐</a></div>
  		 	 	<?php for($i=0;$i<3;$i++){?>
			 	 <div class=lujiazui_list><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title; ?>"><?php echo $record_show[$i]->short_title; ?></a></div>
			 	 <?php }?>
			 </div>
			 <? /* lujiazui-end */?>
						 
			 <?php
				 $record_show = get_news_by_pos('首页专题');
  		 ?>
			 <div id=subject>
			 	 <div id=subject_btnl></div>
			 	 <?php for($i=0;$i<8;$i++){ ?>
			 	 <div class=subject_content id=subject_content_<?php echo $i?> <?php if($i>2){echo "style='display:none'";}?>>
			 			<div class=subject_pic><a href="<?php echo get_news_url($record_show[$i]);?>"><img border=0 src="<?php echo $record_show[$i]->video_photo_src;?>"></a></div>
			 			<div class=subject_list><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title;?>"><?php echo $record_show[$i]->short_title;?></a></div>
			 	 </div>
			 	 <?php } ?>
			 	 <div id=subject_btnr></div>
			 </div>
			 <? /* subject-end */?>
			 		
		 </div>
		</div> 
		 
		 
		<div id=forbes_trt>
			<div class=title style="background:url('images/index/block2.jpg') no-repeat; font-weight:bold; color:#000000;">富豪榜</div>
			<div class=title>财富过山车</div>	
			<div class=title>名人榜</div>	
			<div class=title>城市榜</div>
			<div id=phb>
				<div id=ph>　排名　　 　 姓名　　　　 财富（亿）　　 变动</div>
				<div id=phname>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">1.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">2.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">3.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">4.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">5.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">6.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">7.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">8.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">9.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　<span style="color:#000000; font-weight:bold;">10.</span><a style="margin-left:48px;" href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
				</div>
				<div id=bottom>
					<div id=title>实时财富动态</div>
					<?php for($i=0;$i<2;$i++){ ?>
						<div class=bottom_list>瑞银与高盛领跑AIG香港上市业务</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	
		<div class=forbes_l>
			<?php $record_show = get_news_by_pos('首页创业栏目头条');	?>
			<div class=caption>
				<div class=captions>创业</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title><a href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a></div>
					<div class=list1_description><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo strip_tags($record_show[0]->description);?></a></div>
				</div>
				<?php
				$record_show = get_news_by_pos('首页创业栏目标题'); 
				for($i=0;$i<3;$i++){ ?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?>><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title;?>"><?php echo $record_show[$i]->short_title;?></a></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
			
			
			<?php $record_show = get_news_by_pos('首页商业栏目头条');	?>
			<div class=caption>
				<div class=captions>商业</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title><a href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a></div>
					<div class=list1_description><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo strip_tags($record_show[0]->description);?></a></div>
				</div>
				<?php $record_show = get_news_by_pos('首页商业栏目标题');	?>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?>><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title;?>"><?php echo $record_show[$i]->short_title;?></a></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
						
			
			<?php $record_show = get_news_by_pos('首页科技栏目头条');	?>
			<div class=caption>
				<div class=captions>科技</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title><a href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a></div>
					<div class=list1_description><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo strip_tags($record_show[0]->description);?></a></div>
				</div>
				<?php $record_show = get_news_by_pos('首页科技栏目标题');	?>
				<?php for($i=0;$i<4;$i++){ ?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?>><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title;?>"><?php echo $record_show[$i]->short_title;?></a></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
						
			
			<div class=caption>
				<div class=captions>专栏</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div id=column_btnl style="background:none; cursor:auto;"></div>
				<div id="column_box">
				<?php 
					$pos = $db->query("select id,position_limit from fb_position where name='首页专栏'");
					$sql = "SELECT t1.id,t1.nick_name,t1.image_src,t1.column_name,count(t3.id) as news_num FROM fb_position_relation t2 join fb_user t1 on t1.id=t2.news_id left join fb_news t3 on t1.id=t3.author_id where  t2.position_id={$pos[0]->id} group by t1.id order by t2.priority,t1.id,t3.created_at";
					$author = $db->query($sql);
					$author_count = $db->record_count;
					$sql = "SELECT t1.id as a_id,t1.nick_name,t1.image_src,t1.column_name,t1.description,t3.id,t3.title,t3.created_at,t3.short_title FROM fb_position_relation t2 join fb_user t1 on t1.id=t2.news_id join fb_news t3 on t1.id=t3.author_id where t3.is_adopt=1 and t2.position_id={$pos[0]->id} order by t2.priority,t1.id,t3.created_at";
					$news = $db->query($sql);
					for($i=0;$i<$author_count;$i++){ 
				?>
					<div class=content name="<?php echo $author[$i]->id;?>">
						<div <?php if($i==0){?>style="filter:alpha(opacity=100); opacity:1;"<?php }?> class=cpic><a href="/column/column.php?id=<?php echo $author[$i]->id;?>"><img border=0 src="<?php echo $author[$i]->image_src;?>"></a></div>
						<div class=ccl><a href="/column/column.php?id=<?php echo $author[$i]->id;?>"><?php if(!$author[$i]->column_name){echo $author[$i]->nick_name;}else{echo $author[$i]->column_name;}?>专栏</a></div>
					</div>
				<?php } ?>
				</div>
				<div id=column_btnr></div>
				
				<?php 
					$news_count = 0;	
					for($i=0;$i<$author_count;$i++){
				?>
				<div name="<?php echo $author[$i]->id;?>" <?php if($i==0){?>style="display:inline"<?php }?> class="cloumn_news_box">
					<?php if($author[$i]->news_num){?>
					<div class=list1>
						<div class=list1_title><a href="<?php echo get_news_url($news[$news_count]);?>" title="<?php echo $news[$news_count]->title;?>"><?php echo $news[$news_count]->short_title;?></a></div>
					</div>
					<?php 
						$add = $author[$i]->news_num;
						if($add>4)$add=4;
						for($j=$news_count+1;$j<($news_count+$add);$j++){ 
					?>
						<div class=list2><a href="<?php echo get_news_url($news[$j]);?>" title="<?php echo $news[$j]->title;?>"><?php echo $news[$j]->short_title;?></a></div>
					<?php }} ?>
				</div>
				<?php $news_count = $news_count+$author[$i]->news_num;}?>
			</div>
			<div class=dashed></div>
			
			
			<div class=caption>
				<div class=captions style="width:60px">读者高见</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<?php 
				$comments = $db->query("select * from fb_comment where resource_type='news' order by created_at desc limit 4");
				$news = new table_class('fb_news');
				for($i=0;$i<4;$i++){
					$news->find($comments[$i]->resource_id);
			?>
			<div class=context style="overflow: hidden;"><a href=""><?php echo $comments[$i]->comment?></a></div>
			<div class=context1><a href=""><?php echo $comments[$i]->nick_name;?></a>　|　<a href="<?php echo get_news_url($news);?>"><?php echo $news->short_title;?></a></div>
			<?php }?>
		</div>
		
		<div class=forbes_l style="margin-left:25px;">
			<?php $record_show = get_news_by_pos('首页投资栏目头条');	?>
			<div class=caption>
				<div class=captions>投资</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div id=forbes_l_content>
			 	<div class=list1 >
					<div class=list1_title><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->short_title ?></a></div>
					<div class=list1_description2>
						<a class=list1_pic href="<?php echo get_news_url($record_show[0]);?>"><img border=0 width=70 height=70 src="<?php echo $record_show[0]->video_photo_src ?>"></a><p style="width:10px; height:51px; float:left; display:inline;"></p><a href=""><?php echo strip_tags($record_show[0]->description);?></a>
					</div>
					<?php $record_show = get_news_by_pos('首页投资栏目标题');	?>
					<?php for($i=0;$i<5;$i++){ ?>
						<div class=list2 style="margin-left:3px;"><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title;?>"><?php echo $record_show[$i]->short_title;?></a></div>
					<?php } ?>
				</div>
			</div>	
			<div class=dashed style="height:10px;"></div>

			<?php $record_show = get_news_by_pos('首页奢华栏目');	?>
	  	<div class=caption>
				<div class=captions>奢华</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=list1>
					<div class=image><a href="<?php echo get_news_url($record_show[0]);?>"><img border=0 src="<?php echo $record_show[0]->video_photo_src ?>" width=150 height=130></a></div>
					<div class=image_content style="margin-left:15px;">
						<div class=image_list><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->short_title ?></a></div>
						<div class=image_description><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->description ?></a></div>
					</div>
					<div class=image_content style="margin-top:20px;">
						<div class=image_list><a href="<?php echo get_news_url($record_show[1]);?>"><?php echo $record_show[1]->short_title ?></a></div>
						<div class=image_description><a href="<?php echo get_news_url($record_show[1]);?>"><?php echo $record_show[1]->description ?></a></div>
					</div>
					<div class=image style="margin-top:20px; margin-left:5px;"><a href="<?php echo get_news_url($record_show[1]);?>"><img border=0 src="<?php echo $record_show[1]->video_photo_src ?>"  width=150 height=130></a></div>
			</div>
		</div>
		
		
		<div id=forbes_r>
			<div id=dictionary>
				<div id=dictionary_t>
					<div id=dictionary_tl><a href="">财经魔鬼词典</a></div>
					<div id=dictionary_tr><a href="">实用商业词汇</a>  |  <a href="">实用财经词汇</a></div>
				</div>
				<?php
					$record_show = get_news_by_pos('财经魔鬼词典');
				?>
				<div id=dictionary_bl><a title="<?php echo $record_show[0]->title;?>" href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->short_title;?></a></div>
				<div id=dictionary_br><a title="<?php echo $record_show[1]->title;?>" href="<?php echo get_news_url($record_show[1]);?>"><?php echo $record_show[1]->short_title;?></a></div>
			</div>

			<div id=activity>
				<div class=public_top1>
					<div class=public_caption1>论坛活动</div>
					<a href="" class=public_more1></a>
				</div>
				<div class=public_box1>
				<?php
					$record_show = get_news_by_pos('论坛活动','首页');
				?>
					<div id=images><img src="<?php echo $record_show[0]->image;?>"></div>
					<div id=context>
						<span style="font-size:13px; font-weight:bold; color:#333385"><?php echo $record_show[0]->title;?></span><br>举办日期：<?php echo $record_show[0]->time?><br>地点：<?php echo $record_show[0]->place?></div>
						<div id=info><a target="_blank" href="<?php echo $record_show[0]->url?>">查看详细</a></div>	
				</div>
				<div class=public_bottom1></div>
			</div>
			
			<div id=club>
					<div class=club_caption1>增长俱乐部</div>
					<a href="" class=club_more1></a>
					<div class=content>
						<?php
							$record_show = get_news_by_pos('增长俱乐部','首页');
						?>
						<div class=pic>
							<a href="<?php echo get_news_url($record_show[0]);?>"><img border=0 src="<?php echo $record_show[0]->video_photo_src;?>"></a>	
						</div>	
						<div class=pictitle>
							<a href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a>
						</div>
						<div class=piccontent>
							<a href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->description;?></a>
						</div>
					</div>
					<div class=bottom>
						<div class=bottom_l><a href="">我要报名</a></div>
						<?php
							$record_show = get_news_by_pos('增长俱乐部新闻','首页');
						?>
						<div class=bottom_r>
							<a style="color:#000000;" href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a>
						</div>	
					</div>
			</div>
			
			
			
			<div id=city>
					<div class=city_caption1>城市</div>
					<a href="" class=city_more1></a>
					<div class=content>
						<?php
							$record_show = get_news_by_pos('城市','首页');
						?>					
						<div class=pic>
							<a href="<?php echo get_news_url($record_show[0]);?>"><img border=0 src="<?php echo $record_show[0]->video_photo_src;?>"></a>	
						</div>	
						<div class=pictitle>
							<a href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a>
						</div>
						<div class=piccontent>
							<a href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->description;?></a>
						</div>
					</div>
					<div class=bottom>
						<div class=bottom_l><a href="">城市榜</a></div>
						<?php
							$record_show = get_news_by_pos('城市新闻','首页');
						?>
						<div class=bottom_r>
							<a style="color:#000000;" href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a>
						</div>	
					</div>
			</div>
		</div>
		
		
		<div class=c_r_img>
			<a href=""><img border=0 src="images/other/bannwe-for.jpg"></a>
		</div>
		
		
		<div class=forbes_l style="margin-left:25px;">
    	<div class=caption>
				<div class="caption_base caption1 caption_selected" id="cls_cpt1">最受欢迎</div>
				<div class=line>|</div>
				<div class="caption_base" id="cls_cpt2">编辑推荐</div>
		</div>
		<div id="div_caption1">
			<?php
			$record_show = $db->query("select created_at,id,short_title,title from fb_news where TO_DAYS(NOW()) - TO_DAYS(created_at) >= 7 order by click_count desc, created_at asc limit 6"); 
			?>
			<?php for($i=0;$i<6;$i++){ ?>
					<div class=list3><a href="<?php echo get_news_url($record_show[$i]);?>"><?php echo $record_show[$i]->short_title;?></a></div>
			<?php } ?>
			<div class=dashed></div>
		</div>
		<div id="div_caption2" style="display:none;">
			<?php
			$record_show = get_news_by_pos('首页编辑推荐');
			?>
			<?php for($i=0;$i<6;$i++){ ?>
					<div class=list3><a href="<?php echo get_news_url($record_show[$i]);?>"><?php echo $record_show[$i]->short_title;?></a></div>
			<?php } ?>
			<div class=dashed></div>
		</div>
		</div>
		
		<div class=forbes_r>
			
			<div id=inventory>
				<div class=public_top1>
					<div class=public_caption1 style="color:#4990B9">在线调查</div>
					<a href="" class=public_more1></a>
				</div>

				<div class=inventory_content>
					<div class=inventory_title><a href="">中国顶尖的NBA问卷调查</a></div>
					<div class=inventory_list>
							参与调查者有机会获得全年《福布斯》杂志
							<br>参与调查者有机会获得全年《福布斯》杂志
					</div>
					<a href="" class=inventory_button></a>
					<div class=inventory_dash></div>

					<div class=inventory_title><a href="">中国顶尖的NBA问卷调查</a></div>
					<div class=inventory_list>
							参与调查者有机会获得全年《福布斯》杂志
							<br>参与调查者有机会获得全年《福布斯》杂志
					</div>
					<a href="" class=inventory_button></a>
   			</div>



				<div class=public_bottom1></div>
			</div>
		</div>	
			
		<div class=forbes_l style="margin-top:0px; margin-left:25px;">
	  	<div class=caption>
				<div class=captions style="width:60px;">采编智库</div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
				<?php 
				$record_show = get_news_by_pos('采编智库','首页');
				$count = count($record_show);
				for($i=0;$i<$count;$i++){ ?>
					<div class=writer>
						<div class=writer_pic><a href="/column/column.php?id=<?php echo $record_show[$i]->id;?>"><img border=0 src="<?php echo $record_show[$i]->image_src;?>"></a></div>
						<div class=writer_name>
							<a href="/column/column.php?id=<?php echo $record_show[$i]->id;?>">
								<span style="font-weight:bold;"><?php echo $record_show[$i]->nick_name;?></span><br>
								<?php echo $record_show[$i]->column_name;?>
							</a>	
						</div>	
					</div>
				<?php } ?>
		</div>
		

		<div class=forbes_r>
			
			<div id=mag>
				<div class=public_top1>
					<div class=public_caption1 style="color:#4990B9">福布斯杂志</div>
					<a href="" class=public_more1></a>
				</div>
				<div id=mag_content>
						<?php 
							$magazine = get_news_by_pos('首页杂志');
						?>
						<div class=pic><a href="/magazine/magazine.php?id=<?php echo $magazine[0]->id;?>"><img border=0 src="<?php echo $magazine[0]->img_src3;?>"></a></div>
						<div class=pictitle><?php echo $magazine[0]->name;?></div>
						<div class=context><?php echo strip_tags($magazine[0]->description);?></div>	

			 			 <div id=mag_dash></div>

						<div id=search>往期杂志查阅</div>
						<div id=sel><select></select>　<select></select></div>
						<button id="btnonline"></button><button id="sq"></button>
						<div id=ck><a href="">查看杂志列表>></a></div>

				</div>
				<div class=public_bottom1></div>
			</div>
		</div>	
	<?php require_once('inc/bottom.inc.php');?>
	</div>
</body>
</html>
