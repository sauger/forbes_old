	<div id=forbes_tlt>
			<?php $record_show = get_news_by_pos('每日头条');	?>
  		<div id=headline>
				<div class=headline_pic id=headline_pic_0><a href="<?php echo get_news_url($record_show[$i]);?>"><img border=0 width=300 height=200 src="<?php echo $record_show[0]->video_photo_src; ?>"></a></div>
				<?php for($i=1;$i<4;$i++){?>
				<div class=headline_pic id="headline_pic_<?php echo $i;?>" style="display:none;"><a href="<?php echo get_news_url($record_show[$i]);?>"><img border=0 width=300 height=200 src="<?php echo $record_show[$i]->video_photo_src; ?>"></a></div>
				<?php }?>
				<div id=headline_content>
					<div class=headline_title id=headline_title_0><a href="<?php echo get_news_url($record_show[0]);?>"><?php echo $record_show[0]->short_title; ?></a></div>
					<div class=headline_title id=headline_title_1 style="display:none;"><a href="<?php echo get_news_url($record_show[1]);?>"><?php echo $record_show[1]->short_title; ?></a></div>
					<div class=headline_title id=headline_title_2 style="display:none;"><a href="<?php echo get_news_url($record_show[2]);?>"><?php echo $record_show[2]->short_title; ?></a></div>
					<div class=headline_title id=headline_title_3 style="display:none;"><a href="<?php echo get_news_url($record_show[3]);?>"><?php echo $record_show[3]->short_title; ?></a></div>
					<div class=headline_description id=headline_description_0><?php echo $record_show[0]->description; ?></div>
					<div class=headline_description id=headline_description_1 style="display:none;"><?php echo strip_tags($record_show[1]->description); ?></div>
					<div class=headline_description id=headline_description_2 style="display:none;"><?php echo strip_tags($record_show[2]->description); ?></div>
					<div class=headline_description id=headline_description_3 style="display:none;"><?php echo strip_tags($record_show[3]->description); ?></div>
					
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
				<div id=column_btnl></div>
				<?php for($i=0;$i<3;$i++){ ?>
					<div class=content>
						<div class=cpic><a href=""><img border=0 src="/images/other/one.jpg"></a></div>
						<div class=ccl><a href="">后危机时更</a></div>
					</div>
				<?php } ?>
				<div id=column_btnr></div>


				<div class=list1>
					<div class=list1_title><a href="<?php echo get_news_url($record_show[0]);?>" title="<?php echo $record_show[0]->title;?>"><?php echo $record_show[0]->short_title;?></a></div>
				</div>
				<?php for($i=1;$i<5;$i++){ ?>
					<div class=list2 <? if($i==0){?>style="margin-top:10px;"<?php } ?>><a href="<?php echo get_news_url($record_show[$i]);?>" title="<?php echo $record_show[$i]->title;?>"><?php echo $record_show[$i]->short_title;?></a></div>
				<?php } ?>
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
				<div id=dictionary_bl><a href="">股指期货</a></div>
				<div id=dictionary_br><a href="">future 	index</a></div>
			</div>

			<div id=activity>
				<div class=public_top1>
					<div class=public_caption1>论坛活动</div>
					<a href="" class=public_more1></a>
				</div>
				<div class=public_box1>
					<div id=images><img src="/images/other/three.jpg"></div>
					<div id=context>
						<span style="font-size:13px; font-weight:bold; color:#333385">2010福布斯中国经济发展论坛</span><br>举办日期：3月18日<br>地点：上海</div>
						<div id=info><a href="">查看详细</a></div>	
				</div>
				<div class=public_bottom1></div>
			</div>
			
			<div id=club>
					<div class=club_caption1>增长俱乐部</div>
					<a href="" class=club_more1></a>
					<div class=content>
							<div class=pic>
								<a href=""><img border=0 src="images/other/one.jpg"></a>	
							</div>	
							<div class=pictitle>
								<a href="">沪二手房议价空间议价</a>
							</div>
							<div class=piccontent>
								<a href="">2月初，因受贿罪和滥用职权罪，中国出口信用保险公司......</a>
							</div>
					</div>
					<div class=bottom>
						<div class=bottom_l><a href="">我要报名</a></div>
						<div class=bottom_r><a style="color:#000000;" href="">VC/PE/天使人投资人数据库</a></div>	
					</div>
			</div>
			
			
			
			<div id=city>
					<div class=city_caption1>城市</div>
					<a href="" class=city_more1></a>
					<div class=content>
							<div class=pic>
								<a href=""><img border=0 src="images/other/one.jpg"></a>	
							</div>	
							<div class=pictitle>
								<a href="">沪二手房议价空间议价</a>
							</div>
							<div class=piccontent>
								<a href="">2月初，因受贿罪和滥用职权罪，中国出口信用保险公司......</a>
							</div>
					</div>
					<div class=bottom>
						<div class=bottom_l><a href="">城市榜</a></div>
						<div class=bottom_r><a style="color:#000000;" href="">太仓：被低估的商业城市</a></div>	
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
				<?php for($i=0;$i<8;$i++){ ?>
					<div class=writer>
						<div class=writer_pic><a href=""><img border=0 src="images/index/seven.jpg"></a></div>
						<div class=writer_name>
							<a href="">
								<span style="font-weight:bold;">康健</span><br>
								康桥健笔
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
						<div class=pic><a href=""><img border=0 src="images/other/five.jpg"></a></div>
						<div class=pictitle>福布斯2010/1</div>
						<div class=context>在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</div>	

			 			 <div id=mag_dash></div>

						<div id=search>往期杂志查阅</div>
						<div id=sel><select></select>　<select></select></div>
						<button id="btnonline"></button><button id="sq"></button>
						<div id=ck><a href="">查看杂志列表>></a></div>

				</div>
				<div class=public_bottom1></div>
			</div>
		</div>	