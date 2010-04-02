<div id=center-left>
				<div id=title3>
					<div id="news_title">
					<?php echo $title;?>
					</div>
					<div id="top_info">记者：<?php echo $news->author;?>　　发布于：<?php echo substr($news->created_at,0,10);?></div>
					<div id=title2>
						<?php if(isset($english_news)){?>
							<div style="border-left:0" class="top_title"><img src="/images/html/news/zw.gif"><span class="top_span"><a href="<?php echo get_news_url($news)?>">正文</a></span></div>
							<div class="top_title"><img src="/images/html/news/ew.gif"><span class="top_span">English</span></div>
						<?php }else{?>
							<div style="border-left:0" class="top_title"><img src="/images/html/news/zw.gif"><span class="top_span">正文</span></div>
							<?php if(isset($english_id)){?>
							<div class="top_title"><img src="/images/html/news/ew.gif"><span class="top_span"><a href=<?php echo get_news_en_url($news)?>>English</a></span></div>
							<?php }?>
						<?php }?>
						<div class="top_title"><img src="/images/html/news/fx.gif"><span class="top_span"><a href="">分享</a></span></div>
						<div class="top_title"><img src="/images/html/news/dy.gif"><span class="top_span"><a href="">打印</a></span></div>

						<div class="top_title"><img id="font_down" src="/images/html/news/font3.gif"><span class="top_span"><a>字体大小</a></span><img id="font_up" src="/images/html/news/font2.gif"></div>

						<div style="border-right:0" class="top_title2">
							<?php if($news->pdf_src!=''){?>
							<img src="/images/html/news/coin1.gif">
							<span class="top_span">
							<a target="_blank" href="<?php echo $news->pdf_src;?>" class="top_n">下载PDF格式</a>
							</span>
							<?php }?>
							<img style="margin-left:20px;" src="/images/html/news/coin2.gif"><span class="top_span"><a href="<?php echo $news->id;?>" class="top_n" id="a_collect">加入收藏</a></span>
						</div>
					</div>
				</div>
				<div id="news_text">
					<div id="left_box">
						<div id="l_b_center">
							<div id="resource">来源于：福布斯中文网</div>
							<?php if($news->top_info!=''){?>
								<div id="text4"><?php echo $news->top_info;?></div>
							<?php }?>
							<?php
								if($news->author!=''){
									$record = $db->query("select id,created_at,short_title,title from fb_news where author='{$news->author}' and id!=$id limit 3");
									if(count($record)>0){
							?>
							<div class=right-div3>
								<div class=right-title3>
									该作者的其他文章
								</div>
								<div class=tar1>
									<a href="news_list.php?news_id=<?php echo $id?>&type=author"><img src="/images/html/news/tar1.gif"></a>
								</div>
								<div class=list1>
									<ul>
									<?php for($i=0;$i<count($record);$i++){?>
									<li><a href="<?php echo get_news_url($record[$i])?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
									<?php }?>
									</ul>
								</div>
							</div>
							<?php
									}
								}
							?>
								<?php
									if($news->related_news!=''){
										$record = $db->query("select id,created_at,title,short_title from fb_news where id in({$news->related_news})");
								?>
								<div class=right-div3>
									<div class=right-title3>
									推荐的 评论文章
									</div>
									<div class=tar1>
										<a href="news_list.php?news_id=<?php echo $id?>&type=related"><img src="/images/html/news/tar1.gif"></a>
									</div>
									<div class=list1>
									<ul>
										<?php for($i=0;$i<count($record);$i++){?>
										<li><a href="<?php echo get_news_url($record[$i])?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
										<?php }?>
									</ul>
									</div>
								</div>
								<?php }?>
								<div class="dash2"></div>
								<div class=right-div3>
									<div class=keywords>
										<?php 
											$keywords = explode(' ',$news->keywords);
											$keywords2 = explode('　',$news->keywords);
											if(count($keywords)>count($keywords2)){
												for($i=0;$i<count($keywords);$i++){
													if($i!=0&&$keywords[$i]!='')echo '、';
										?>
										<a href="news_list.php?keyword=<?php echo urlencode($keywords[$i]);?>"><?php echo $keywords[$i];?></a>
										<?php
												}
											}else{
												for($i=0;$i<count($keywords2);$i++){
												if($i!=0&&$keywords2[$i]!='')echo '、';
										?>
										<a href="news_list.php?keyword=<?php echo urlencode($keywords2[$i]);?>"><?php echo $keywords2[$i];?></a>
										<?php
												}
											}
										?>	
									</div>
									<div id="keyword_bottom">
										<div style="margin-left:0;" class=right-title3>
											文章的关键字：
										</div>
									</div>
								</div>
						</div>
					</div>
					<?php if($news->ad_id){?>
					<div id="roll"></div>
					<div id="picture6"><img src="/images/html/news/picture6.jpg"></div>
					<?php }?>
					<div id=text3>
						<?php echo get_fck_content($content);?>
					</div>
					<div id="paginate">
						<?php print_fck_pages2($content,'news.php?id='.$news->id."&lang={$_GET['lang']}");?>
					</div>
				</div>
				<div class="dash"></div>
				<div id="news_comment"></div>
				<input type="hidden" value="<?php echo $id;?>" id="newsid"></input>
		  	</div>