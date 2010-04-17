<div id=l>
		<div id=news_title><?php echo $title;?></div>
		<div id=news_info>作者：<?php echo $news->author;?>　　发布于：<?php echo substr($news->created_at,0,10);?></div>
		<div id=news_tools>
			<?php if(isset($english_news)){?>
				<div style="border-left:0" class=news_tools_btn><img src="/images/news/btn_cn.png"><span class=news_tools_span><a href="<?php echo get_news_url($news)?>">正文</a></span></div>
				<div class=top_title><img src="/images/news/btn_en.png"><span class=news_tools_span>English</span></div>
			<?php }else{?>
				<div style="border-left:0" class=news_tools_btn><img src="/images/news/btn_cn.png"><span class=news_tools_span>正文</span></div>
			<?php if(isset($english_id)){?>
				<div class=news_tools_btn><img src="/images/news/btn_en.png"><span class=news_tools_span><a href=<?php echo get_news_en_url($news)?>>English</a></span></div>
			<?php }?>
			<?php }?>
				<div class=news_tools_btn><img src="/images/news/btn_share.png"><span class=news_tools_span><a href="share.php?news_id=<?php echo $id;?>">分享</a></span></div>
				<div class=news_tools_btn><img src="/images/news/btn_print.png"><span class=news_tools_span><a href="javascript:window.print();">打印</a></span></div>
				<div class=news_tools_btn><img id=font_down src="/images/news/font3.gif" class=news_tools_span style="margin:0"><span class=news_tools_span><a>字体大小</a></span><img id=font_up src="/images/news/font2.gif" class=news_tools_span></div>
				<div style="border-right:0" class=news_tools_btn>
				<?php if($news->pdf_src!=''){?>
					<img src="/images/news/btn_donwload.png">
					<span class=news_tools_span><a target="_blank" href="<?php echo $news->pdf_src;?>">下载PDF格式</a></span>
				<?php }?>
				</div>
				<div style="border:0" class=news_tools_btn2>
					<img src="/images/news/btn_collection.png"><span class=news_tools_span><a href="<?php echo $news->id;?>" id=a_collect>加入收藏</a></span>
				</div>
		</div>

		<div id=news_text>
			<div id=news_text_info>
					<div class=info_title style="width:180px;">来源于：福布斯中文网</div>
					<?php if($news->top_info!=''){?>
							<div id=info_resource><?php echo $news->top_info;?></div>
					<?php }?>
          
          <?php
						if($news->author!=''){
							$record = $db->query("select id,created_at,short_title,title from fb_news where author='{$news->author}' and id!=$id limit 3");
							if(count($record)>0){
					?>
					<div class=info_title style="margin-top:15px;">该作者的其他文章</div>
					<div class=info_more><a href="news_list.php?news_id=<?php echo $id?>&type=author"><img src="/images/news/more.png" border=0></a></div>
					<div class=info_list>
						<ul>
							<?php for($i=0;$i<count($record);$i++){?>
							<li><a href="<?php echo get_news_url($record[$i])?>" title="<?php echo strip_tags($record[$i]->title);?>"><?php echo $record[$i]->short_title?></a></li>	
							<?php }?>
						</ul>
					</div>
					<?php
							}
						}
					?>


          <?php
						if($news->related_news!=''){
								$record = $db->query("select id,created_at,title,short_title from fb_news where id in({$news->related_news})");
					?>
					<div class=info_title style="margin-top:15px;">推荐的评论文章</div>
					<div class=info_more><a href="news_list.php?news_id=<?php echo $id?>&type=author"><img src="/images/news/more.png" border=0></a></div>
					<div class=info_list>
						<ul>
							<?php for($i=0;$i<count($record);$i++){?>
							<li><a href="<?php echo get_news_url($record[$i])?>" title="<?php echo strip_tags($record[$i]->title);?>"><?php echo $record[$i]->short_title?></a></li>	
							<?php }?>
						</ul>
					</div>
					<?php }?>
					
					<div class=info_dash></div>

					<div class=info_keywords>
					<?php 
							$keywords = explode('||',$news->keywords);
								for($i=0;$i<count($keywords);$i++){
									if (empty($keywords[$i])) continue;
									$out[]="<a href=\"news_list.php?keyword=" .urlencode($keywords[$i])."\">{$keywords[$i]}</a>";
								}
							echo implode('、',$out);
					?>
						</div>
						<div id=info_keywords_bottom>
							<div class=info_title>文章的关键字</div>
						</div>
			</div>
								
			<?php if($news->ad_id){?>
			<div id=ad_roll></div>
			<div id=ad_box><img src="/images/news/picture6.jpg"></div>
			<?php }?>								
	
			<div id=news_content><?php echo get_fck_content($content);?></div>
			<div id=news_paginate><?php print_fck_pages2($content,'news.php?id='.$news->id."&lang={$_GET['lang']}");?></div>
    </div>
		<div id=news_comment></div>
		<input type="hidden" value="<?php echo $id;?>" id=newsid></input>
				
</div>