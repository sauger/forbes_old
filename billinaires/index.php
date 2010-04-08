<?php 
	require_once(dirname(__FILE__).'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-富豪首页</title>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('public','fh_index');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
	<? require_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　<a href="">富豪检索结果</a></div>
		<div id=cyline></div>
		<div id=fh_left>
			<div id=fh_l_t_l></div>
			<?php 
					$pos_name = "richindex_head";
							
			?>
			<div id=fh_l_t_c pos ="<?php echo $pos_name;?>">
				<div id=pic>
					<img border=0 src="<?php echo $pos_items->$pos_name->image1;?>"/>
					<div id=fd></div>
					<div id=fd_t>
						<div id=fd_t_l></div>
						<div id=fd_t_r><a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
					</div>
					<div id=fd_b>
						<div id=content>
							 <a href="<?php echo $pos_items->$pos_name->href;?>">　　<?php echo $pos_items->$pos_name->description;?></a>	
						</div>	
					</div>
				</div>
			</div>	
			<div id=fh_l_t_r></div>
			<div id=fh_l_m_l>
				<div class=l_m_l_t_title><a href="">动态富豪榜-富豪个人财富价值排名 1月31日</a></div>
				<div class=l_m_l_t_content>
					<div id=c_title>
						<div class=pm>排名</div><div class="sx">|</div><div class=name>姓名</div><div class="sx">|</div><div class=cfs>财富数（亿）</div><div class="sx">|</div><div class=sex>性别</div><div class="sx">|</div><div class=age>年龄</div><div class="sx">|</div><div class=cmpname>公司名</div>
					</div>
					<div class=c_content>
						<div class=pm>1.</div><div class="sx"></div><div class=name>刘家豪</div><div class="sx"></div><div class=cfs>150</div><div class="sx"></div><div class=sex>男</div><div class="sx"></div><div class=age>62</div><div class="sx"></div><div class=cmpname>东方希望、民生</div>
						<div class=dash></div>
						<div class=pm>2.</div><div class="sx"></div><div class=name>刘家豪</div><div class="sx"></div><div class=cfs>150</div><div class="sx"></div><div class=sex>男</div><div class="sx"></div><div class=age>62</div><div class="sx"></div><div class=cmpname>东方希望、民生</div>
						<div class=dash></div>
						<div class=pm>3.</div><div class="sx"></div><div class=name>刘家豪</div><div class="sx"></div><div class=cfs>150</div><div class="sx"></div><div class=sex>男</div><div class="sx"></div><div class=age>62</div><div class="sx"></div><div class=cmpname>东方希望、民生</div>
						<div class=dash></div>
						<div class=pm>4.</div><div class="sx"></div><div class=name>刘家豪</div><div class="sx"></div><div class=cfs>150</div><div class="sx"></div><div class=sex>男</div><div class="sx"></div><div class=age>62</div><div class="sx"></div><div class=cmpname>东方希望、民生</div>
					</div>
					<div id=moreinfo>
						<button></button>	
					</div>
					<div class=l_m_l_dash></div>
					<div class=l_m_l_b_title>
						<div class=pic></div>
						<div class=wz>图片富豪榜</div>
						<div class=l_b_sx>|</div>
						<div class=more><a href=""><img border=0 src="/images/index/more.jpg"></a></div>
					</div>
					<div class=l_m_l_b_l_content>
						<?php for($i=0;$i<3;$i++){
							$pos_name = "richindex_piclist_{$i}";
						?>
							<div class=context <?php show_page_pos($pos_name)?>>
								<div class=sj><img src="/images/fh/icon2.jpg"></div>
								<div class=l_m_l_context><a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
							</div>
						<?php } ?>
					</div>
					<div class=l_m_l_b_r_content>
						<?php for($i=3;$i<6;$i++){ 
							$pos_name = "richindex_piclist_{$i}";
						?>
							<div class=context <?php show_page_pos($pos_name)?>>
								<div class=sj><img src="/images/fh/icon2.jpg"></div>
								<div class=l_m_l_context><a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
							</div>
						<?php } ?>
					</div>
					<div class=l_m_l_b_dash></div>
					<div id=l_m_b>
						<?php for($i=0;$i<5;$i++){ 
							$pos_name = "richindex_picture_{$i}";
						?>
						<div class=l_m_b_content <?php show_page_pos($pos_name)?>>
							<div class=pic><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 src="<?php echo $pos_items->$pos_name->image1?>"></a></div>
							<div class=piccontent>
								<a href="<?php echo $pos_items->$pos_name->href;?>"><span style="font-weight:bold;"><?php echo $pos_items->$pos_name->display;?></span><br><?php echo $pos_items->$pos_name->description;?></a>	
							</div>
						</div>
						<?php } ?>	
					</div>
				</div>
			</div>
				<div id=fh_l_m_r>
					<div class="l_m_r_t_title">富豪检索</div>
					<div class=l_m_r_t_content_l>
						<img src="/images/fh/l_m_r_b_sx.jpg">	
					</div>
					<div class="l_m_r_t_content_r">
						<div class=content>富豪姓名：<input type="text" /></div>
						<div class=content>年 龄 段：<select></select></div>
						<div class=content>资产规模：<select></select></div>
						<div class=content>国　　籍：<select></select></div>
						<div class=content>行　　业：<select></select></div>
						<div class=content><button></button></div>
					</div>
					<div id=r_pic1>
						<a href=""><img border=0 src="/images/fh/three.jpg"></a>	
					</div>
					<div id=r_pic2>
						<a href=""><img border=0 src="/images/fh/four.jpg"></a>	
					</div>
				</div>
			</div>
			<div id=fh_t_r>
				<div id=fh_t_r_t>
					<div class=title>
						<div class=wz>富豪榜单</div>
						<div class=more><a href=""><img border=0 src="/images/index/c_r_t_more.jpg"></a></div>	
					</div>
					<div id=content>
						<?php for($i=0; $i<8; $i++){
							$pos_name = "richindex_richlist_{$i}"; 
						?>
						<div class=context <?php show_page_pos($pos_name)?>>
							<div class=point></div>
							<div class=cl><a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id=fh_t_r_b>
					<div class=title>
						<div class=wz>2009年度中国富豪榜</div>
						<div class=more><a href=""><img border=0 src="/images/index/c_r_t_more.jpg"></a></div>	
					</div>
					<div class=content1>
						<div class=pic1>
							<a href=""><img border=0 src="/images/fh/five.jpg"></a>
						</div>
						<div class=piccontent1>
							<a href=""><span style="font-weight:bold; color:#333333;">刘永行</span><br>东方希望集团<br>30亿</a>	
						</div>
						<div class=num1></div>
					</div>
					<?php for($i=2;$i<16;$i++){ ?>
					<div class=content2>
						<div class=name>
							刘永行
						</div>
						<div class=zc>
							30亿美元
						</div>
						<div class=num<?php echo $i;?>></div>
					</div>
					<?php } ?>
					<div id=fhqd>富豪清单　<select></select></div>
					<div id=gz>
						<a href="" style="color:#0f78b0;">排名</a>　　<a href="">姓名</a>　　<a href="">名开头字母顺序</a>	
						<a href="">年龄</a>　　<a href="">资产规则</a>　　<a href="">城市区域</a>	
					</div>
				</div>
			</div>
			<div id=fh_m>
					<a href=""><img border=0 src="/images/fh/six.jpg"></a>
			</div>
			<div id=fh_b_l>
				<div id=fh_b_l_title>富豪报道</div>
				<div id=fh_b_l_l>
					<?php 
					for($i=0;$i<3;$i++){
						$pos_name = "richindex_news_{$i}";
					?>
					<div class=content <?php show_page_pos($pos_name)?> <?php if($i>0) echo' style="margin-top:40px;"';?>>
							<div class=content_title><a href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->display;?></a></div>
							<div class=content_jz>记者:<?php echo $pos_items->$pos_name->alias;?></div>
							<div class=content_content><a href="<?php echo $pos_items->$pos_name->href;?>">　　<?php echo $pos_items->$pos_name->description;?></a></div>
					</div>	
					<?php }?>
				</div>
				<div id=fh_b_l_r>
					<?php 
					for($i=3;$i<6;$i++){
						$pos_name = "richindex_news_{$i}";
					?>
					<div class=content <?php show_page_pos($pos_name)?> <?php if($i>3) echo' style="margin-top:40px;"';?>>
							<div class=content_title><a href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->display;?></a></div>
							<div class=content_jz>记者:<?php echo $pos_items->$pos_name->alias;?></div>
							<div class=content_content><a href="<?php echo $pos_items->$pos_name->href;?>">　　<?php echo $pos_items->$pos_name->description;?></a></div>
					</div>	
					<?php }?>
				</div>
			</div>
			<div id=fh_b_dash></div>
			<div id=fh_b_r>
				<div class=fh_b_r_title>创富者说</div>
				<?php for($i=0;$i<3;$i++){ 
					$pos_name = "richindex_news1_{$i}";
				?>
				<div class=fh_b_r_content <?php show_page_pos($pos_name)?>>
					<div class=pic><a href="<?php echo $pos_items->$pos_name->href;?>"><img border=0 src="<?php echo $pos_items->$pos_name->image1;?>"></a></div>
					<div class=pictitle><a href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->display;?></a></div>
					<div class=piccontent><a href="">　　<?php echo $pos_items->$pos_name->description;?></a></div>
				</div>
				<?php } ?>
				<div id=fh_b_r_dash></div>
				<div class=fh_b_r_title>评论定制</div>
				<div id=fh_b_r_b_content>
					<div id=content_t>
						<div id=content_t_l>
							订阅福布斯快闻　<input type="radio"><span style="font-size:12px; font-weight:normal; color:#666666;">我要定制</span>	
						</div>
						<div id=content_t_r>
							<button>定制</button>	
						</div>	
					</div>
					<div id=content_b>
						<div id=content_b_l>
							<span style="font-size:13px; color:#000000; font-weight:bold;">订阅分类文章</span>
							<div class=cl><input type="radio">富豪　<input type="radio">创业　<input type="radio">商业</div>
							<div class=cl><input type="radio">科技　<input type="radio">投资　<input type="radio">生活</div>
						</div>
						<div id=content_b_r>
							<button>定制</button>	
						</div>	
					</div>	
				</div>
			</div>
			<? require_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
		</div>
	</body>
</html>