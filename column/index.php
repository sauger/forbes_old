<?php 
	require_once('../frame.php');
	$db = get_db();
	$uid = $_SESSION['user_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-专栏</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('html/column/column','top','bottom','select2css');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>专栏首页</div>
			<div id=title1><a href="">福布斯中文网</a>　>　<a style="color:#246BB0;">专栏首页</a></div>
			<div id=line></div>
		</div>
		<div id=l>
			<div id=l_t>
				<div id=l_t_l>
					<div class="t">
						<div class="t_title">特约专栏</div><div class=more></div>
					</div>
					<div id=l_t_l_t>
						<div class=t1>
							<a href="">其加薪理由是是在在期接作</a>
						</div>
						<div class=t2>
							工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)研发部。
						</div>
					</div>
					<?php 
						$sql = "SELECT t1.id,t1.nick_name,t1.image_src FROM fb_news t2 join fb_user t1 on t2.author_id=t1.id where t2.author_type=2 group by  author_id  order by t2.created_at desc limit 4";
						$author = $db->query($sql);
						$author_count = count($author);
						for($i=0;$i<$author_count;$i++){
							$news = $db->query("select id,title,short_title,description from fb_news where is_adopt=1 and author_id={$author[$i]->id} and author_type=2 order by created_at desc,priority asc limit 3");
					?>
					<div class=l_t_l_m>
						<div class=l_t_l_m_t>
							<div class=l_t_l_m_t_l>
								<div class=picture>
									<a href=""><img border="0" width="90" src="<?php if($author[$i]->image_src=='')echo '/images/html/column/picture.jpg';else echo $author[$i]->image_src;?>"></a>
								</div>
								<div class=n>
									<?php echo $author[$i]->nick_name;?>
								</div>
							</div>
							<div class=l_t_l_m_t_r>
								<div class=t1>
									<?php echo $author[$i]->nick_name;?>专栏
								</div>
								<div class=t2>
									<a href="/news/news.php?id=<?php echo $news[0]->id;?>"><?php echo $news[0]->title;?></a>
								</div>
								<div class=t3>
									<?php echo strip_tags($news[0]->description);?>
								</div>
							</div>
						</div>
						<?php
							for($j=1;$j<count($news);$j++){
						?>
						<div class=l_t_l_m_b>
							<a href="/news/news.php?id=<?php echo $news[$j]->id;?>"><?php echo $news[$j]->title;?></a>
						</div>
						<?php }?>
					</div>
					<?php }?>
				</div>
				<div id=l_t_r>
					<div class="t">
						<div style="width:120px;float:left; display:inline;">专栏文章推荐</div><div id=more></div>
					</div>
					<div id=l_t_r_t>
						<div id=t1>
							<div id=t2>
								其加薪理由是在期间是在期接作
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t4>
							工作部门 北京大学中国经学中国经济研究中心，中国证券市场研究设计中心(联办)研发部...
						</div>
					</div>
					<div id=l_t_r_t>
						<div id=t1>
							<div id=t2>
								其加薪理由是在期间是在期接作
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t4>
							工作部门 北京大学中国经学中国经济研究中心，中国证券市场研究设计中心(联办)研发部...
						</div>
					</div>
					<div id=l_t_r_t>
						<div id=t1>
							<div id=t2>
								其加薪理由是在期间是在期接作
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t4>
							工作部门 北京大学中国经学中国经济研究中心，中国证券市场研究设计中心(联办)研发部...
						</div>
					</div>
					<div id=l_t_r_m>
						<?php
							$news = $db->query("select id,title,short_title from fb_news where is_adopt=1  and author_type=2 order by created_at desc,priority asc limit 8");
							for($i=0;$i<count($news);$i++){
						?>
						<div class=t1>
							<div class=t2>
								<a href=""><?php echo $new[$i]->title;?></a>
							</div>
							<div class=t3>
								——<?php echo '';?>
							</div>
						</div>
						<?php }?>
					</div>
					<div id=l_t_r_b>
						<div class=t>
							<div class="t_title">专栏列表</div><div id=more></div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id=l_t style="margin-top:30px;border:0px; ">
				<div id=l_t_l>
					<div class="t">
						<div class="t_title">采编智库</div><div id=more></div>
					</div>
					<div id=l_t_l_t>
						<div id=t1>
							其加薪理由是是在在期接作
						</div>
						<div id=t2>
							工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)研发部。
						</div>
					</div>
					<div id=l_t_l_m>
						<div id=l_t_l_m_t>
							<div id=l_t_l_m_t_l>
								<div id=picture>
								</div>
								<div id=n>
									宋国青
								</div>
							</div>
							<div id=l_t_l_m_t_r>
								<div id=t1>
									康桥健笔专栏
								</div>
								<div id=t2>
									其加薪理由是在期间
								</div>
								<div id=t3>
									工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)研发部。
								</div>
							</div>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
					</div>
					<div id=l_t_l_m>
						<div id=l_t_l_m_t>
							<div id=l_t_l_m_t_l>
								<div id=picture>
								</div>
								<div id=n>
									宋国青
								</div>
							</div>
							<div id=l_t_l_m_t_r>
								<div id=t1>
									康桥健笔专栏
								</div>
								<div id=t2>
									其加薪理由是在期间
								</div>
								<div id=t3>
									工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)研发部。
								</div>
							</div>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
					</div>
					<div id=l_t_l_m>
						<div id=l_t_l_m_t>
							<div id=l_t_l_m_t_l>
								<div id=picture>
								</div>
								<div id=n>
									宋国青
								</div>
							</div>
							<div id=l_t_l_m_t_r>
								<div id=t1>
									康桥健笔专栏
								</div>
								<div id=t2>
									其加薪理由是在期间
								</div>
								<div id=t3>
									工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)研发部。
								</div>
							</div>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
					</div>
					<div id=l_t_l_m>
						<div id=l_t_l_m_t>
							<div id=l_t_l_m_t_l>
								<div id=picture>
								</div>
								<div id=n>
									宋国青
								</div>
							</div>
							<div id=l_t_l_m_t_r>
								<div id=t1>
									康桥健笔专栏
								</div>
								<div id=t2>
									其加薪理由是在期间
								</div>
								<div id=t3>
									工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)研发部。
								</div>
							</div>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
						<div id=l_t_l_m_b>
							<a href="">其加薪理由是在期间是在在期接作</a>
						</div>
					</div>
				</div>
				<div id=l_t_r>
					<div class="t">
						<div style="width:140px;float:left; display:inline;">采编智库文章推荐</div><div id=more></div>
					</div>
					<div id=l_t_r_t>
						<div id=t1>
							<div id=t2>
								其加薪理由是在期间是在期接作
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t4>
							工作部门 北京大学中国经学中国经济研究中心，中国证券市场研究设计中心(联办)研发部...
						</div>
					</div>
					<div id=l_t_r_t>
						<div id=t1>
							<div id=t2>
								其加薪理由是在期间是在期接作
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t4>
							工作部门 北京大学中国经学中国经济研究中心，中国证券市场研究设计中心(联办)研发部...
						</div>
					</div>
					<div id=l_t_r_t>
						<div id=t1>
							<div id=t2>
								其加薪理由是在期间是在期接作
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t4>
							工作部门 北京大学中国经学中国经济研究中心，中国证券市场研究设计中心(联办)研发部...
						</div>
					</div>
					<div id=l_t_r_m>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">其加薪理由是在期间是在在期接作</a>
							</div>
							<div id=t3>
								——宋国青
							</div>
						</div>	
				
					</div>
					<div id=l_t_r_b>
						<div class="t">
							<div class="t_title">专栏列表</div><div id=more></div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
						<div id=t1>
							<div id=t2>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
							<div id=t3>
								<a href="">周其仁—康桥健笔专栏</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id=r>
			<div id=picture>
			</div>
			<div id=r_t>
				<div id=r_t_t>
					专栏文章分类
				</div>
				<div id=r_t_m>
					<div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div>
					<div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div><div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div><div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div><div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div><div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div><div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div><div id=t1>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
						<div id=t2>
							<a href="">商业</a>
						</div>
					</div>
				</div>
			</div>
			<div id=r_b>
				<div id=r_b_t>
					<div id=t1>
						最受欢迎专栏
					</div>
					<div id=t2>
						最受欢迎智库专栏
					</div>
				</div>
				<div id=r_b_b>
					<div id=picture1>
					</div>
					<div id=t1>
						康桥健笔专栏
					</div>
					<div id=t2>
						工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)...
					</div>
					<div id=t3>
						<a href="">其加薪理由是加薪理由是加薪理由是在期间</a>
					</div>
				</div>
				<div id=r_b_b>
					<div id=picture1>
					</div>
					<div id=t1>
						康桥健笔专栏
					</div>
					<div id=t2>
						工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)...
					</div>
					<div id=t3>
						<a href="">其加薪理由是加薪理由是加薪理由是在期间</a>
					</div>
				</div>
				<div id=r_b_b>
					<div id=picture1>
					</div>
					<div id=t1>
						康桥健笔专栏
					</div>
					<div id=t2>
						工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)...
					</div>
					<div id=t3>
						<a href="">其加薪理由是加薪理由是加薪理由是在期间</a>
					</div>
				</div>
				<div id=r_b_b>
					<div id=picture1>
					</div>
					<div id=t1>
						康桥健笔专栏
					</div>
					<div id=t2>
						工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)...
					</div>
					<div id=t3>
						<a href="">其加薪理由是加薪理由是加薪理由是在期间</a>
					</div>
				</div>
				<div id=r_b_b>
					<div id=picture1>
					</div>
					<div id=t1>
						康桥健笔专栏
					</div>
					<div id=t2>
						工作部门 北京大学中国经济研究中心，中国证券市场研究设计中心(联办)...
					</div>
					<div id=t3>
						<a href="">其加薪理由是加薪理由是加薪理由是在期间</a>
					</div>
				</div>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>