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
  		<div id=headline>
				<div class=headline_pic id=headline_pic_0><a href="<?php echo $pos_items->index_hl_0->href;?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->index_hl_0->image1; ?>"></a></div>
				<?php for($i=1;$i<4;$i++){
					$pos_name = "index_hl_{$i}";
				?>
				<div class=headline_pic id="headline_pic_<?php echo $i;?>" style="display:none;"><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->$pos_name->image1; ?>"></a></div>
				<?php }?>
				<div id=headline_content>
					<div class=headline_title id=headline_title_0 <?php show_page_pos("index_hl_0")?>><a href="<?php echo $pos_items->index_hl_0->href;?>"><?php echo $pos_items->index_hl_0->display; ?></a></div>
					<div class=headline_title id=headline_title_1 style="display:none;" <?php show_page_pos("index_hl_1")?>><a href="<?php echo $pos_items->index_hl_1->href;?>"><?php echo $pos_items->index_hl_1->display; ?></a></div>
					<div class=headline_title id=headline_title_2 style="display:none;" <?php show_page_pos("index_hl_2")?>><a href="<?php echo $pos_items->index_hl_2->href;?>"><?php echo $pos_items->index_hl_2->display; ?></a></div>
					<div class=headline_title id=headline_title_3 style="display:none;" <?php show_page_pos("index_hl_3")?>><a href="<?php echo $pos_items->index_hl_3->href;?>"><?php echo $pos_items->index_hl_3->display; ?></a></div>
					<div class=headline_description id=headline_description_0><?php echo $pos_items->index_hl_0->description; ?></div>
					<div class=headline_description id=headline_description_1 style="display:none;"><?php echo $pos_items->index_hl_1->description; ?></div>
					<div class=headline_description id=headline_description_2 style="display:none;"><?php echo $pos_items->index_hl_2->description; ?></div>
					<div class=headline_description id=headline_description_3 style="display:none;"><?php echo $pos_items->index_hl_3->description; ?></div>
					  
			    	<?php for($j=0;$j<=3;$j++){?>
					<div class=headline_related id=headline_related_<?php echo $j?> <?php if($j<>0){echo "style='display:none'";}?> >
					<?php				
							for($i=0;$i<3;$i++)
							{$pos_name = "index_hl".$j."_r".$i;
					?>
					<div class=list <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name,false);?></div>
					<?php
							}
					?>				
					</div>
				  <? }?>	
	
					<div id=more></div>
					<div id=btn>
						<div class=headline_btn1 id=l style="background:url(/images/index/slideshow_back.gif) no-repeat;"></div>
						<div class=headline_btn2 id=0 style="background:url(/images/index/slideshow_active.gif) no-repeat"></div>
						<div class=headline_btn2 id=1 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn2 id=2 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn2 id=3 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=headline_btn1 id=r style="background:url(/images/index/slideshow_next.gif) no-repeat"></div>
					</div>
				</div>
			</div>
			<? /* headline-end */?>
			
		 <div id=forbes_tltb>	
			 <div id=lujiazui>
  		 	 <div id=lujiazui_caption><a href="">陆家嘴早餐</a><span>Lujiazui Breakfast</span></div>
  		 	 	<?php for($i=0;$i<3;$i++){
  		 	 		$pos_name = "index_bf".$i;
  		 	 	?>
			 	 <div class=lujiazui_list <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name);?></div>
			 	 <?php }?>
			 </div>
			 <? /* lujiazui-end */?>
						 
			 <div id=subject>
			 	 <div id=subject_btnl></div>
			 	 <?php for($i=0;$i<8;$i++){ $pos_name = "index_sub".$i;?>
			 	 <div <?php show_page_pos($pos_name)?> class=subject_content id=subject_content_<?php echo $i?> <?php if($i>2){echo "style='display:none'";}?>>
			 			<div class=subject_pic><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 src="<?php echo $pos_items->$pos_name->image1;?>"></a></div>
			 			<div class=subject_list><a href="<?php echo $pos_items->$pos_name->href;?>" title="<?php echo $pos_items->$pos_name->title;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
			 	 </div>
			 	 <?php } ?>
			 	 <div id=subject_btnr></div>
			 </div>
			 <? /* subject-end */?>
			 		
		 </div>
		</div> 
		 
		 
		<div id=forbes_trt>
			<div class="title selected">富豪榜</div>
			<div class=title>财富过山车</div>	
			<div class=title>名人榜</div>	
			<div class=title>城市榜</div>
			<div id=phb>
				<div id=ph><span style="margin-left:10px;">排名</span><span style="margin-left:55px;">姓名</span><span style="margin-left:50px;">财富（亿）</span><span style="margin-left:20px;">变动</span></div>
				<div id=phname>
					<?php 
					$db = get_db();
					$items = $db->query("select * from fb_dynamic_fortune_list order by current_index asc limit 10");
					for($i=0;$i<10;$i++) {
						if($items[$i]->current_index < $items[$i]->last_index){
							$word = '↑';
							$class = 'up';
						}else if($items[$i]->current_index > $items[$i]->last_index){
							$word = '↓';
							$class = 'down';
						}else{
							$word = '-';
							$class = '';
						}
					?>
					<div class=content><span style="width: 40px; color:#000000; font-weight:bold;"><?php echo $i+1;?>.</span><span style="width:40px;margin-left:40px;"><a style="margin-left:0px;" href=""><?php echo $items[$i]->name;?></a></span><span style="margin-left:50px;width:40px;"><?php echo $items[$i]->fortune;?></span><span style="font-size:14px; font-weight:bold;margin-left:40px;" class="<?php echo $class;?>"><?php echo $word;?></span></div>
					<?php }?>
					<!-- 
					<div class=content><span style="width: 40px; color:#000000; font-weight:bold;">10.</span><span style="width:40px;margin-left:40px;"><a style="margin-left:0px;" href="">刘行</a></span><span style="margin-left:50px;width:40px;">64.1</span><span style=" font-size:14px; font-weight:bold;margin-left:40px;" class=down>↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">3.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">4.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">5.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">6.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">7.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">8.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					<div class=content>　 <span style="color:#000000; font-weight:bold;">9.</span><a href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#FF0000; font-size:14px; font-weight:bold;">↑</span></div>
					<div class=content>　<span style="color:#000000; font-weight:bold;">10.</span><a style="margin-left:48px;" href="">刘永行</a>　　　　　304.0　　　　 <span style="color:#33CC00; font-size:14px; font-weight:bold;">↓</span></div>
					 -->
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
			<div class=caption>
				<div class=captions>创业<span>Enterpreneur</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title <?php show_page_pos("index_bus0")?>><a href="<?php echo $pos_items->index_bus0->href;?>" title="<?php echo$pos_items->index_bus0->title;?>"><?php echo $pos_items->index_bus0->display;?></a></div>
					<div class=list1_description><a href="<?php echo $pos_items->index_bus0->href;?>"><?php echo $pos_items->index_bus0->description;?></a></div>
				</div>
				<?php
				for($i=0;$i<3;$i++){ $pos_name = "index_bus".($i+1);?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?> <?php show_page_pos($pos_name);?>><?php show_page_href($pos_items,$pos_name);?></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
			
			
			<div class=caption>
				<div class=captions>商业<span>Business</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title <?php show_page_pos("index_business0")?>><?php show_page_href($pos_items,'index_business0');?></div>
					<div class=list1_description><a href="<?php echo $pos_items->index_business0->href;?>"><?php echo $pos_items->index_business0->description;?></a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ $pos_name="index_business".($i+1);?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?> <?php show_page_pos($pos_name);?>><?php show_page_href($pos_items,$pos_name);?></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
						
			
			<div class=caption>
				<div class=captions>科技<span>Tech</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div class=list1>
					<div class=list1_title <?php show_page_pos("index_tech0");?>><?php show_page_href($pos_items,'index_tech0');?></div>
					<div class=list1_description><a href="<?php echo $pos_items->index_tech0->href;?>"><?php echo $pos_items->index_tech0->description;?></a></div>
				</div>
				<?php for($i=0;$i<4;$i++){ $pos_name="index_tech".($i+1);?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?> <?php show_page_pos($pos_name);?>><?php show_page_href($pos_items,$pos_name);?></div>
				<?php } ?>
			</div>
			<div class=dashed></div>
						
			
			<div class=caption>
				<div class=captions>专栏<span>Columns</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=forbes_l_content>
				<div id=column_btnl style="background:none; cursor:auto;"></div>
				<div id="column_box">
				<?php 
					for($i=0;$i<5;$i++){ 
						$pos_name = "index_author".$i;
				?>
					<div class=content <?php show_page_pos($pos_name);?> name="<?php echo 'author'.$i;?>">
						<div <?php if($i==0){?>style="filter:alpha(opacity=100); opacity:1;"<?php }?> class=cpic><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 src="<?php echo $pos_items->$pos_name->image1;?>"></a></div>
						<div class=ccl><?php show_page_href($pos_items,$pos_name,false);?></div>
					</div>
				<?php } ?>
				</div>
				<div id=column_btnr></div>
				
				<?php 
					for($i=0;$i<5;$i++){
				?>
				<div name="<?php echo 'author'.$i;?>" <?php if($i==0){?>style="display:inline"<?php }?> class="cloumn_news_box">
					<div class=list1>
						<div class=list1_title <?php show_page_pos('index_author'.$i.'_r0');?>><?php show_page_href($pos_items,'index_author'.$i.'_r0');?></div>
					</div>
					<?php 
						for($j=1;$j<4;$j++){
							$pos_name = 'index_author'.$i.'_r'.$j;
					?>
						<div class=list2 <?php show_page_pos($pos_name);?>><?php show_page_href($pos_items,$pos_name);?></div>
					<?php } ?>
				</div>
				<?php }?>
			</div>
			<div class=dashed></div>
			
			
			<div class=caption>
				<div class=captions>读者高见<span>Readers Say</span></div>
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
			<div class=caption>
				<div class=captions>投资<span>Money & Investment</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div id=forbes_l_content>
			 	<div class=list1 >
					<div class=list1_title <?php show_page_pos("index_invest0")?>><a href="<?php echo $pos_items->index_invest0->href;?>"><?php echo $pos_items->index_invest0->display;?></a></div>
					<div class=list1_description2>
						<a class=list1_pic href="<?php echo $pos_items->index_invest0->href;?>"><img border=0 width=70 height=70 src="<?php echo $pos_items->index_invest0->image1;?>"></a><p style="width:10px; height:51px; float:left; display:inline;"></p><?php show_page_desc($pos_items,'index_invest0');?></a>
					</div>
					<?php for($i=1;$i<=5;$i++){ $pos_name = "index_invest".$i;?>
						<div class=list2 style="margin-left:3px;" <?php show_page_pos($pos_name);?>><?php show_page_href($pos_items,$pos_name);?></div>
					<?php } ?>
				</div>
			</div>	
			<div class=dashed style="height:10px;"></div>

	  		<div class=caption>
				<div class=captions>生活<span>Life</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
			<div class=list1>
					<div <?php show_page_pos("index_luxu0");?> class=image><?php show_page_img($pos_items,'index_luxu0',1,150,130)?></div>
					<div class=image_content style="margin-left:15px;">
						<div class=image_list><?php show_page_href($pos_items,'index_luxu0',false)?></div>
						<div class=image_description><?php show_page_desc($pos_items,'index_luxu0')?></div>
					</div>
					<div  <?php show_page_pos("index_luxu1")?> class=image_content style="margin-top:20px;">
						<div class=image_list><?php show_page_href($pos_items,'index_luxu1',false)?></div>
						<div class=image_description><?php show_page_desc($pos_items,'index_luxu1')?></div>
					</div>
					<div class=image style="margin-top:20px; margin-left:5px;"><?php show_page_img($pos_items,'index_luxu1',1,150,130)?></div>
			</div>
		</div>
		
		
		<div id=forbes_r>
			<div id=dictionary>
				<div id=dictionary_t>
					<div id=dictionary_tl <?php show_page_pos("index_dict0");?>><a  href="<?php echo $pos_items->index_dict0->href;?>"><?php echo $pos_items->index_dict0->display;?></a></div>
					<div id=dictionary_tr><span <?php show_page_pos("index_dict1");?>><a href="<?php echo $pos_items->index_dict1->href;?>"><?php echo $pos_items->index_dict1->display;?></a></span>  |  <span <?php show_page_pos("index_dict2");?>><a href="<?php echo $pos_items->index_dict2->href;?>"><?php echo $pos_items->index_dict2->display;?></a></span></div>
				</div>
				<div id=dictionary_bl <?php show_page_pos("index_dict3");?>><?php show_page_href($pos_items,'index_dict3')?></div>
				<div id=dictionary_br <?php show_page_pos("index_dict4");?>><?php show_page_href($pos_items,'index_dict4')?></div>
			</div>

			<div id=activity>
				<div class=public_top1>
					<div class=public_caption1>论坛活动<span>Conferences</span></div>
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
					<div class=club_caption1>增长俱乐部<span>Up Club</span></div>
					<a href="" class=club_more1></a>
					<div class=content <?php show_page_pos("index_club0")?>>
						<div class=pic>
							<?php show_page_img($pos_items,'index_club0')?>
						</div>	
						<div class=pictitle>
							<?php show_page_href($pos_items,'index_club0')?>
						</div>
						<div class=piccontent>
							<?php show_page_desc($pos_items,'index_club0')?>
						</div>
					</div>
					<div class=bottom>
						<div class=bottom_l <?php show_page_pos("index_club1");?>><?php show_page_href($pos_items,'index_club1',false)?></div>
						<div class=bottom_r <?php show_page_pos("index_club2");?>>
							<?php show_page_href($pos_items,'index_club2',false)?>
						</div>	
					</div>
			</div>
			
			
			
			<div id=city>
					<div class=city_caption1>城市<span>Best Cities</span></div>
					<a href="" class=city_more1></a>
					<div class=content <?php show_page_pos("index_city0");?>>
						<div class=pic>
							<?php show_page_img($pos_items,'index_city0')?>
						</div>	
						<div class=pictitle>
							<?php show_page_href($pos_items,'index_city0')?>
						</div>
						<div class=piccontent>
							<?php show_page_desc($pos_items,'index_city0')?>
						</div>
					</div>
					<div class=bottom>
						<div class=bottom_l <?php show_page_pos("index_city1");?>><?php show_page_href($pos_items,'index_city1',false)?></div>
						<div class=bottom_r <?php show_page_pos("index_city2");?>>
							<?php show_page_href($pos_items,'index_city2',false)?>
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
			<?php for($i=0;$i<6;$i++){ $pos_name = "index_pop".$i;?>
					<div class=list3 <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></div>
			<?php } ?>
			<div class=dashed></div>
		</div>
		<div id="div_caption2" style="display:none;">
			<?php for($i=0;$i<6;$i++){ $pos_name = "index_reco".$i;?>
					<div class=list3 <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></div>
			<?php } ?>
			<div class=dashed></div>
		</div>
		</div>
		
		<div class=forbes_r>
			
			<div id=inventory>
				<div class=public_top1>
					<div class=public_caption1 style="color:#4990B9;">在线调查<span>Survey</span></div>
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
				<div class=captions>采编智库<span>Bloggers</span></div>
				<div class=line>|</div>
				<a href="" class=more></a>
			</div>
				<?php 
				for($i=0;$i<8;$i++){ $pos_name = "index_jour".$i;?>
					<div class=writer <?php show_page_pos($pos_name)?>>
						<div class=writer_pic><?php show_page_img($pos_items,$pos_name)?></div>
						<div class=writer_name>
							<a href="<?php echo $pos_items->$pos_name->href;?>">
								<span style="font-weight:bold;"><?php echo $pos_items->$pos_name->display;?></span><br>
								<?php echo $pos_items->$pos_name->title;?>
							</a>	
						</div>	
					</div>
				<?php } ?>
		</div>
		

		<div class=forbes_r>
			
			<div id=mag>
				<div class=public_top1>
					<div class=public_caption1 style="color:#4990B9;">福布斯杂志<span>Magazine Archive</span></div>
					<a href="" class=public_more1></a>
				</div>
				<div id=mag_content  <?php show_page_pos("index_magazine");?>>
						<div class=pic><?php show_page_img($pos_items,"index_magazine")?></div>
						<div class=pictitle><?php show_page_href($pos_items,"index_magazine")?></div>
						<div class=context><?php show_page_desc($pos_items,"index_magazine")?></div>	

			 			 <div id=mag_dash></div>

						<div id=search>往期杂志查阅</div>
						<div id=sel>
							<select id="old_magazine">
								<option value=''></option>
								<?php 
									$magazine = $db->query("select year from fb_old_magazine group by year order by year desc");
									$year_count = $db->record_count;
									for($i=0;$i<$year_count;$i++){
								?>
								<option value="<?php echo $magazine[$i]->year;?>"><?php echo $magazine[$i]->year;?>年</option>
								<?php }?>
							</select>
							<select id="show_magazine">
								<option value=""></option>
							</select>
						</div>
						<a id="btnonline"></a>
						<a id="sq"></a>
						<div id=ck><a href="/magazine/list.php">查看杂志列表>></a></div>

				</div>
				<div class=public_bottom1></div>
			</div>
		</div>	
	<?php require_once('inc/bottom.inc.php');?>
	</div>
</body>
</html>
