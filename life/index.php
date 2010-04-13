<?php 
	require_once(dirname(__FILE__).'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-奢侈品</title>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('public','right','life');
		init_page_items();
	?>
</head>
<body>
<div id=ibody>
<? require_once(dirname(__FILE__).'/../inc/top.inc.php');?>
<div id=life_top>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="960" height="540">
       <param name="movie" value="/flash/scroll.swf">
       <param name="quality" value="high">
       <param name="wmode" value="transparent" />
       <embed src="/flash/scroll.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="960" height="540"></embed>
	</object>
</div>
<div id=life_middle>
	<div id="life_middle_flash">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="525" height="140">
            <param name="movie" value="/flash/wenzi.swf">
            <param name="quality" value="high">
            <param name="wmode" value="transparent" />
            <embed src="/flash/wenzi.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="525" height="140"></embed>
			</object>
	</div>
	<div id=life_middle_bg></div>
	<?php $pos_name = "lifeindex_column"?>
	<div id=life_middle_column <?php show_page_pos($pos_name)?>>
		<div id=picture><img src="<?php echo $pos_items->$pos_name->image1;?>" width="120" height="120" border="0" /></div>
		<div id=title><?php echo $pos_items->$pos_name->display;?></div>
		<div id=text><?php echo $pos_items->$pos_name->description;?></div>
		<div id=link><a href="<?php echo $pos_items->$pos_name->href;?>">进入专栏</a></div>
	</div>
</div>	

<div id=life_bottom>
  <div id=life_bottom_left>
  		<div class=life_caption>
				<div class=captions>奢华<span>推荐</span></div>
			</div>
			<div id=life_bottom_flash>
			  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="656" height="190">
             <param name="movie" value="/flash/gallery.swf">
              <param name="quality" value="high">
              <param name="wmode" value="transparent" />
              <embed src="/flash/gallery.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="656" height="190"></embed>
			   </object>
			</div>
      
      <div class=life_box>
 				<div class=life_caption>
					<div class=captions>服饰钟表</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				
				<?php $pos_name = "liftindex_news_1";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
							<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="210" height="160" />
				</div>
				<div class=title><?php echo $pos_items->$pos_name->display;?></div>
				<div class=description><?php echo $pos_items->$pos_name->description?></div>
      </div>
      
      <div class=life_box>
  			<div class=life_caption>
					<div class=captions>豪车</div>
					<div class=line>|</div>
					<a href="" class=more></a>      	
				</div>	
				
				<?php $pos_name = "liftindex_news_2";?>
				<div id=picture <?php show_page_pos($pos_name)?>>
						<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="210" height="160" />
				</div>
				<div class=title><?php echo $pos_items->$pos_name->display;?></div>
				<div class=description><?php echo $pos_items->$pos_name->description?></div>
      </div>
      
      <div class=life_box>
  			<div class=life_caption>
					<div class=captions>游艇飞机</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>	
				<?php $pos_name = "liftindex_news_3";	?>
				<div id=picture <?php show_page_pos($pos_name)?>>
							<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="210" height="160" />
				</div>
				<div class=title><?php echo $pos_items->$pos_name->display;?></div>
				<div class=description><?php echo $pos_items->$pos_name->description?></div>				
				
				
				
      </div>            





				<div id=b_l_b>
					<div id=title>
						<div style="width:60px; float:left; display:inline;">名利场</div><div id=more></div>
					</div>
					<?php $pos_name = "lifeindex_news_mlc"?>
					<div id=picture <?php show_page_pos($pos_name)?>>
						<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="460" height="200" />
					</div>
					<div id=text <?php show_page_pos($pos_name)?>>
						<div id=title1>
							<?php  echo $pos_items->$pos_name->display;?>
						</div>
						<div id=text1>
							<?php  echo $pos_items->$pos_name->description?>
						</div>
					</div>
				</div>
				<div id=b_l_m>
					<div id=b_l_m_l>
						<div id=title>
							<div style="width:60px; float:left; display:inline;">美酒美食</div><div id=more></div>
						</div>
						<?php 
							$pos_name = "liftindex_news_4";
						?>
						<div id=picture <?php show_page_pos($pos_name)?>>
							<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="200" height="150" />
						</div>
						<div id=text <?php show_page_pos($pos_name)?>>
							<div id=title1>
								<?php echo $pos_items->$pos_name->display;?>
							</div>
							<div id=text1>
								<?php echo $pos_items->$pos_name->description?>
							</div>
						</div>
					</div>
					<div id=b_l_m_l>
						<div id=title>
							<div style="width:60px; float:left; display:inline;">体面</div><div id=more></div>
						</div>
						<?php 
							$pos_name = "liftindex_news_5";
						?>
						<div id=picture <?php show_page_pos($pos_name)?>>
							<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="200" height="150" />
						</div>
						<div id=text <?php show_page_pos($pos_name)?>>
							<div id=title1>
								<?php echo $pos_items->$pos_name->display;?>
							</div>
							<div id=text1>
								<?php echo $pos_items->$pos_name->description?>
							</div>
						</div>
					</div>
					<div id=b_l_m_l>
						<div id=title>
							<div style="width:60px; float:left; display:inline;">文化娱乐</div><div id=more></div>
						</div>
						<?php 
							$pos_name = "liftindex_news_6";
						?>
						<div id=picture <?php show_page_pos($pos_name)?>>
							<img src="<?php echo $pos_items->$pos_name->image1;?>" border="0" width="200" height="150" />
						</div>
						<div id=text <?php show_page_pos($pos_name)?>>
							<div id=title1>
								<?php echo $pos_items->$pos_name->display;?>
							</div>
							<div id=text1>
								<?php echo $pos_items->$pos_name->description?>
							</div>
						</div>
					</div>
				</div>
  </div>
			
			
			
			<div id=b_r>
				<div id=b_r_t>
					<?php $pos_name = "lifeindex_ly"?>
					<div id=title>
						<div style="width:60px; float:left; display:inline;">旅游</div><div id=more></div>
					</div>
					<div id=picture <?php show_page_pos($pos_name)?>>
						<a href="<?php echo $pos_items->$pos_name->href;?>"><img src="<?php echo $pos_items->$pos_name->image1?>" border="0" width="240" height="160" /></a>
					</div>
				</div>
				<div id=b_r_t style="margin-top:32px;">
				<?php $pos_name = "lifeindex_hz"?>
					<div id=title>
						<div style="width:60px; float:left; display:inline;">豪宅</div><div id=more></div>
					</div>
					<div id=picture <?php show_page_pos($pos_name)?>>
						<a href="<?php echo $pos_items->$pos_name->href;?>"><img src="<?php echo $pos_items->$pos_name->image1?>" border="0" width="240" height="160" /></a>
					</div>
				</div>
				<div id=b_r_b>
					<div id=title>
						<div style="width:60px; float:left; display:inline;">关注</div><div id=more></div>
					</div>
					<div id=line>
					</div>
					<?php 
						for($i=0;$i<5;$i++ ){
							$pos_name = "lifeindex".$i;
					?>
					<div id=list <?php show_page_pos($pos_name);?>>
						<a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a>
					</div>
					<?php }?>
				</div>
				<div id=b_r_t style="margin-top:40px;">
					<div id=title>
						<div style="width:60px; float:left; display:inline;">奢华专题</div><div id=more></div>
					</div>
					<?php $pos_name = "lifeindex_zt"?>
					<div id=picture <?php show_page_pos($pos_name);?>>
						<a href="<?php echo $pos_items->$pos_name->href;?>"><img src="<?php echo $pos_items->$pos_name->image1?>" border="0" width="240" height="160" /></a>
					</div>
				</div>
				<div id=title1<?php show_page_pos($pos_name);?>v>
					<a href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->display;?></a>
				</div>
			</div>
</div>
<? require_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
</div>
</body>