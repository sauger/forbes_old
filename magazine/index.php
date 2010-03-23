<?php 
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-杂志</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('zz','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex><img src="/images/zz/top_title.jpg"></div>
		<div id=cytitle><a style="color:#666666;" href="/">福布斯中文网　＞　</a><a style="color:#666666;" href="list.php">杂志　＞　</a><a>杂志首页</a></div>
		<div id=cyline></div>
		<div id=zzleft>
			<div class=l_t_top></div>
			<div id=l_t_content>
				<div class=l_title>
					<div class=wz>杂志列表信息</div>	
				</div>
				<?php
					$db = get_db();
					$magazine = $db->query("select * from fb_magazine where is_adopt=1 order by publish_data");
				?>
				<div class=l_pic>
					<a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><img border=0 src="<?php echo  $magazine[0]->img_src;?>"></a>	
				</div>
				<div id=r_t>
					<div id=title><a href=""><?php echo  $magazine[0]->name;?></a></div>
					<div id=content><a href="">出版日期：<?php echo substr($magazine[0]->publish_data, 0, 10);?><br>封面专题</a></div>
				</div>
				<?php
					$sql = "select t1.title,t1.short_title,t1.id,t1.description from fb_news t1 join fb_magazine_relation t2 on t1.id=t2.resource_id where t2.magazine_id={$magazine[0]->id} and t2.is_show=1 order by t2.priority limit 3";
					$magazine_news = $db->query($sql);
					for($i=0;$i<count($magazine_news);$i++){
				?>
				<div class=r_b>
					<div class=title>
						<div class=jt></div>
						<div class=wz><a href="/news/news.php?id=<?php echo $magazine_news[$i]->id;?>"><?php echo $magazine_news[$i]->short_title;?></a></div>
					</div>
					<div class=content>
						<a href=""><?php echo $magazine_news[$i]->description;?></a>	
					</div>
					<div class=r_b_dash></div>
				</div>
				<?php }?>
				<div class="l_b">
					<div class="btn_ck"><a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><img border="0" src="/images/zz/btn_ck.jpg"></a></div>
					<div class="btn_readonline"><a href="magazine.php?id=<?php echo  $magazine[0]->id;?>"><img border="0" src="/images/zz/btn_readonline.jpg"></a></div>
				</div>
			</div>
			<div class=l_t_bottom></div>
			<a style="margin-top:10px; float:left; display:inline;" href=""><img border=0 src="/images/zz/one.jpg"></a>
			<div class=l_t_top></div>
			<div id=l_b_content>
				<div class=l_title>
					<div class=wz>杂志列表信息</div>	
				</div>
				<?php 
					$sql = "select * from fb_magazine where publish_data<'{$magazine[0]->publish_data}' limit 8";
					$magazines = $db->query($sql);
					$sql = "select t1.title,t1.short_title,t1.id,t2.magazine_id from fb_news t1 join fb_magazine_relation t2 on t1.id=t2.resource_id where  t2.is_show=1 order by t2.priority";
					$news = $db->query($sql);
					$count_news = count($news);
					for($i=0;$i<count($magazines);$i++){ 
				?>
				<div class=imgandtitle>
					<div class=pic>
						<a href=""><img border=0 src="<?php echo $magazines[$i]->img_src;?>"></a>	
					</div>
					<div class=pictitle><a href=""><?php echo $magazines[$i]->name;?></a></div>
					<?php
						$num = 0;
						for($j=0;$j<$count_news;$j++){
							if($news[$j]->magazine_id==$magazines[$i]->id){
								$num++
					?>
					<div class=piccontent>
						<a href="/news/news.php?id=<?php echo $news[$j]->id;?>">·<?php echo $news[$j]->short_title;?></a>
					</div>
					<?php
							}
							if($num==3)break;
						}
					?>
				</div>
				<?php } ?>
			</div>
			<div class=l_t_bottom></div>
		</div>
		<div id=right>
			<a style="margin:0px; float:right; display:inline;" href=""><img border=0 width=317 height=265 src="/images/right/one.jpg"></a>
			<div class=r_b_b_t></div>
			<div id=r_b_b_m>
				<div class=r_b_title>杂志搜索</div>
				<div id=b_b>
					往期杂志查阅　<select></select>　<select></select><br>
					<button class=btn1></button>
					<button class=btn2>查看</button>	
				</div>
			</div>
			<div class=r_b_b_b></div>
			<a style="margin-top:20px; margin-bottom:10px; float:right; display:inline;" href=""><img border=0 width=322 height=100 src="/images/zz/three.jpg"></a>
			<div class=r_b_b_t></div>
			<div id=r_b_b>
				<div class=r_b_title>读者来函</div>
				<?php for($i=0;$i<8;$i++){ ?>
					<div class=content><a href="">中信保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口保... ...<br><span style="color:#999999;">孙尤其　｜　中信保险以来长存</span></a></div>
					<?php if($i<7){ ?>
						<div class=dash></div>
					<?php } ?>
				<?php } ?>
			</div>
			<div class=r_b_b_b></div>
		</div>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>