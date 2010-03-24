<?php 
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-杂志列表</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('zz_list','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex><img src="/images/zz/top_title.jpg"></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a style="color:#666666;" href="">杂志　＞　</a><a href="">杂志列表</a></div>
		<div id=cyline></div>
		<div id=zzleft>
			<div id=l_t_content>
				<div class=l_title>
					<div class=wz>杂志列表信息</div>
				</div>
				<?php
					$db = get_db();
					$magazine = $db->query("select * from fb_magazine where is_adopt=1 order by publish_data");
				?>
				<div class=l_pic>
					<a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><img border=0 src="<?php echo $magazine[0]->img_src;?>"></a>	
				</div>
				<div id=r_t>
					<div id=title><a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><?php echo $magazine[0]->name;?></a></div>
				</div>
				<div class=r_b>
					<div class=title>
						<div class=wz><a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><?php echo $magazine[0]->title;?></a></div>
					</div>
					<div class=content>
						<a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><?php echo $magazine[0]->description;?></a>	
					</div>
					<div class=moreinfo><a href="magazine.php?id=<?php echo  $magazine[0]->id;?>">杂志详细介绍>></a></div>
				</div>
			</div>
			<div class=l_dash></div>
			<?php
				$sql = "select * from fb_magazine where publish_data<'{$magazine[0]->publish_data}'";
				$magazines = $db->paginate($sql,4);
				$count = count($magazines);
				for($i=0;$i<$count;$i++){
			?>
			<div class=l_b_content>
				<div class=pic>
					<a href="magazine.php?id=<?php echo $magazines[$i]->id;?>"><img border=0 src="<?php echo $magazines[$i]->img_src;?>"></a>	
				</div>
				<div class=pictitle><a href="magazine.php?id=<?php echo $magazines[$i]->id;?>"><?php echo $magazines[$i]->name;?></a></div>
				<div class=piccontent>
					<div class=pic_c_t><a href="magazine.php?id=<?php echo $magazines[$i]->id;?>"><?php echo $magazines[$i]->title;?></a></div>
					<div class=pic_c_m><a href="magazine.php?id=<?php echo $magazines[$i]->id;?>"><?php echo $magazines[$i]->description;?></a></div>
				</div>
				<div class=picinfo><a href="magazine.php?id=<?php echo $magazines[$i]->id;?>">杂志详细介绍</a></div>
			</div>
			<div class=l_dash></div>
			<?php }?>
			<div class="paginate"><?php paginate();?></div>
		</div>
		<div id=right>
			<a style="margin:0px; float:right; display:inline;" href=""><img border=0 width=317 height=265 src="/images/right/one.jpg"></a>
			<div id=r_title>
				<div class=title1>最受欢迎</div><div class=title2>编辑推荐</div>
			</div>
			<div id=r_content_left></div>
			<div id=r_content>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
			</div>
			<div id=r_content_right></div>
			<div id=r_c_title>
				<div class=title1>创业</div>
				<div class=title2>科技</div>
				<div class=title2>商业</div>
				<div class=title2>投资</div>
			</div>
			<div id=r_c_left></div>
			<div id=r_c_content>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				<div class=dash></div>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
			</div>
			<div id=r_c_right></div>
			<div id=zz_r_b_title>
				<div id=wz>行业富豪</div>	
			</div>
			<div id=r_b_left></div>
			<div id=r_b_content>
				<div class=r_b_context>
					<div class="pic"><a href=""><img border=0 src="/images/zz/seven.jpg"></a></div>
					<div class="piccontent"><img border=0 src="/images/zz/01.jpg">　<span style="font-weight:bold;">杨惠妍</span>　女　33岁<br><a href="">鸿桂圆</a>　(房地产)<br>年度排名: <span style="color:red;">7</span>　今日排名: <span style="color:red;">9</span><br>个人财富:150亿 <span style="color:#999999;">(截止日期：2010-1-22)</span></div>
				</div>
				<div class=dash></div>
				<div class=r_b_context>
					<div class="pic"><a href=""><img border=0 src="/images/zz/seven.jpg"></a></div>
					<div class="piccontent"><img border=0 src="/images/zz/01.jpg">　<span style="font-weight:bold;">杨惠妍</span>　女　33岁<br><a href="">鸿桂圆</a>　(房地产)<br>年度排名: <span style="color:red;">7</span>　今日排名: <span style="color:red;">9</span><br>个人财富:150亿 <span style="color:#999999;">(截止日期：2010-1-22)</span></div>
				</div>
				<div class=dash></div>
				<div class=r_b_context>
					<div class="pic"><a href=""><img border=0 src="/images/zz/seven.jpg"></a></div>
					<div class="piccontent"><img border=0 src="/images/zz/01.jpg">　<span style="font-weight:bold;">杨惠妍</span>　女　33岁<br><a href="">鸿桂圆</a>　(房地产)<br>年度排名: <span style="color:red;">7</span>　今日排名: <span style="color:red;">9</span><br>个人财富:150亿 <span style="color:#999999;">(截止日期：2010-1-22)</span></div>
				</div>
			</div>
			<div id=r_b_right></div>
			<div id=r_b_b>
				<div class=title><div id=wz>福布斯杂志</div></div>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/index/five.jpg"></a></div>
					<div class=piccontent>
						<div class=pictitle>福布斯2010/1</div>
						<div class=context>在去年大批新股批新股上市后，内地投资者对IPO热情逐渐消退。随着上证综合指数跌幅超过10%...</div>	
					</div>
				</div>
				<div id=r_b_b_dash></div>
				<div id=search>往期杂志查阅</div>
				<div id=sel>
					<div class="select1"><select></select></div>
					<div class="select2"><select></select></div>
				</div>
				<div id=btn><button id="btnonline"></button><button id="sq"></button></div>
				<div id=ck><a href="">查看杂志列表>></a></div>
				</div>
			</div>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>