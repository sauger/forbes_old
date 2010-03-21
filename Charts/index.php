<?php 
	session_start();
	require_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-榜单首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('charts_index','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
		<? require_once('../inc/top.inc.php');?>
		<div id=top>
			<div id=title>福布斯新闻</div>
			<div id=title1><a href="">福布斯中文网</a> > <a href="" style="color:#246BB0;">榜单首页</a> </div>
			<div id=line></div>
		</div>
		<div id=t_l_t>
			<div id=t_l_t_t>
				<div class=head_pic id=head_pic_0><a href=""><img border=0 width=300 height=200 src="<?php echo $record_show[0]->video_photo_src; ?>"></a></div>
				<div class=head_pic id=head_pic_1 style="display:none;"><a href=""><img border=0 width=300 height=200 src="<?php echo $record_show[1]->video_photo_src; ?>"></a></div>
				<div class=head_pic id=head_pic_2 style="display:none;"><a href=""><img border=0 width=300 height=200 src="<?php echo $record_show[2]->video_photo_src; ?>"></a></div>
				<div class=head_pic id=head_pic_3 style="display:none;"><a href=""><img border=0 width=300 height=200 src="<?php echo $record_show[3]->video_photo_src; ?>"></a></div>
				<div id=t_l_t_t_r>
					<div class=head_title id=head_title_0><a href=""><?php echo $record_show[0]->short_title; ?></a></div>
					<div class=head_title id=head_title_1 style="display:none;"><a href=""><?php echo $record_show[1]->short_title; ?></a></div>
					<div class=head_title id=head_title_2 style="display:none;"><a href=""><?php echo $record_show[2]->short_title; ?></a></div>
					<div class=head_title id=head_title_3 style="display:none;"><a href=""><?php echo $record_show[3]->short_title; ?></a></div>
					<div class=head_content id=head_content_0><?php echo $record_show[0]->description; ?></div>
					<div class=head_content id=head_content_1 style="display:none;"><?php echo strip_tags($record_show[1]->description); ?></div>
					<div class=head_content id=head_content_2 style="display:none;"><?php echo strip_tags($record_show[2]->description); ?></div>
					<div class=head_content id=head_content_3 style="display:none;"><?php echo strip_tags($record_show[3]->description); ?></div>
					
				<?php for($j=0;$j<=3;$j++){?>	
					<div class=head_related id=head_related_<?php echo $j?> <?php if($j<>0){echo "style='display:none'";}?> >
					<?php				
					 		$sub_news_str=explode(",",$record_show[$j]->sub_headline); 
				  		$sub_news_str_num=sizeof($sub_news_str)-1;

							for($i=0;$i<=$sub_news_str_num;$i++)
							{
								  if($sub_news_str_num<1){break;}
									$sql="select n.short_title from fb_news n where n.id=".$sub_news_str[$i];
									$record_sub_news = $db -> query($sql);
									echo '<div class=cl><a href="">'.strip_tags($record_sub_news[0]->short_title).'</a></div>';
							}
					?>				
					</div>
				<? }?>	
	
					<div id=more><a href="">查看更多</a></div>
					<div id=btn>
						<div class=head_btn1 id=l style="background:url(images/index/slideshow_back.gif) no-repeat;"></div>
						<div class=head_btn2 id=0 style="background:url(images/index/slideshow_active.gif) no-repeat"></div>
						<div class=head_btn2 id=1 style="background:url(images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=head_btn2 id=2 style="background:url(images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=head_btn2 id=3 style="background:url(images/index/slideshow_unactive.gif) no-repeat"></div>
						<div class=head_btn1 id=r style="background:url(images/index/slideshow_next.gif) no-repeat"></div>
					</div>
				</div>
			</div>
				
			</div>
			<div style="width:293px; float:right; display:inline;">
				<div id=ad2>
				</div>
				<div id=right-div2>
				<div class=right-title1>
					生活和专题榜
				</div>
				<div class=right-title2>
					餐饮
				</div>
				<div class=right-title3>
					健康
				</div>
				<div id=right-text3>
					<li><a href="">2010中国最最佳商业城市最佳商业城市佳商</a></li>
					<li><a href="">2010中国最最佳商业城市最佳商业城市佳商</a></li>
					<li><a href="">2010中国最最佳商业城市最佳商业城市佳商</a></li>
					<li><a href="">2010中国最最佳商业城市最佳商业城市佳商</a></li>
				</div>
				<div id=right-title4>
					固定不动产
				</div>
				<div class=right-title2>
					时尚
				</div>
				<div class=right-title2>
					旅游
				</div>
				<div class=right-title2>
					汽车
				</div>
				<div class=right-title2>
					腕表
				</div>
			</div>
			<div id=right-div3>
				<div id=right-title5>
					<div id=tar1></div>评论定制
				</div>
				<div class=right-text4>
					<div style="width:100px; float:left; display:inline;"><b>订阅福布斯快闻</b></div><div id=radio><input type="radio" name="" value="">我要定制</div><div style="margin-left:27px; float:left; display:inline;"><input type="button" id=button></div>
				</div>
				<div class=right-text4>
					<b>订阅分类文章</b>
				</div>
				<div id=right-text5>
					<div class=radio1><input type="radio" name="" value="我要订">富豪</div>
					<div class=radio1><input type="radio" name="" value="我要订">创业</div>
					<div class=radio1><input type="radio" name="" value="我要订">商业</div>
					<div class=radio1><input type="radio" name="" value="我要订">投资</div>
					<div class=radio1><input type="radio" name="" value="我要订">生活</div>
				</div>
				<div style="margin-left:34px; margin-top:10px; float:left; display:inline;"><input type="button" id=button></div>
			</div>
			</div>
			<div id=left-div3>
				<div id=left-title3>
					<div style="float:left; display:inline;">榜单推荐</div><div id=more2></div>	
				</div>
				<div class=left-div3-1>
					<div class=picture3>
					</div>
					<div class=left-div3-text>
						后危机时更
					</div>
				</div>
				<div class=left-div3-1>
					<div class=picture3>
					</div>
					<div class=left-div3-text>
						后危机时更
					</div>
				</div>
				<div class=left-div3-1>
					<div class=picture3>
					</div>
					<div class=left-div3-text>
						后危机时更
					</div>
				</div>
				<div class=left-div3-1>
					<div class=picture3>
					</div>
					<div class=left-div3-text>
						后危机时更
					</div>
				</div>
				<div class=left-div3-1>
					<div class=picture3>
					</div>
					<div class=left-div3-text>
						后危机时更
					</div>
				</div>
				
			</div>
			
			<div id=left-div4>
				<div id=left-title3>
					<div style="float:left; display:inline;">常规榜单</div><div id=more2></div>	
				</div>
				<div style="width:309px; float:left; display:inline;">
					<div class=left-div4-1>
						<div class=left-title4>
							<div style="float:left; display:inline;">富豪</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=1 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					<div class=left-div4-1>
						<div class=left-title4>
							<div style="float:left; display:inline;">公司</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=3 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					<div class=left-div4-1>
						<div class=left-title4>
							<div style="float:left; display:inline;">名人</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=5 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					
					<div class=left-div4-1>
						<div class=left-title4>
							<div style="float:left; display:inline;">科技</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=7 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					
				</div>
				<div id=line2>
				</div>
				<div style="width:309px; float:left; display:inline;">
					<div class=left-div4-2>
						<div class=left-title4>
							<div style="float:left; display:inline;">科技</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=2 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					<div class=left-div4-2>
						<div class=left-title4>
							<div style="float:left; display:inline;">投资</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=4 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					
					<div class=left-div4-2>
						<div class=left-title4>
							<div style="float:left; display:inline;">城市</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=6 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					
					<div class=left-div4-2>
						<div class=left-title4>
							<div style="float:left; display:inline;">教育</div><div id=line1></div>
						</div>
						<?php $bd=$db->query('select * from fb_custom_list_type where position=8 order by year desc limit 4'); ?>
						<div class=picture4>
							<a href=""><img border=0 src="<?php echo $bd[0]->image_src; ?>"></a>
						</div>
						<div class=left-div4-text1>
							<div class=left-div4-text1-1>
								<?php echo $bd[0]->name;?>
							</div>
							<div class=left-div4-text1-2>
								<?php echo strip_tags($bd[0]->comment);?>
							</div>
						</div>
						<div class=left-div4-text>
							<?php for($i=1;$i<count($bd);$i++){ ?>
								<li><a href=""><?php echo $bd[$i]->name;?></a></li>
							<?php } ?>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>