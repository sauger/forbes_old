<?php 
	require_once('../frame.php');
	require_login();
	$db = get_db();
	$uid = $_SESSION['user_id'];
	$type = $_REQUEST['type'];
	if(empty($type))$type='news';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-用户</title>
	<?php
		use_jquery();
		js_include_tag('public','user/user','jquery.colorbox-min');
		css_include_tag('html/user/user','public','html/user/favorites','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>用户中心</div>
			<div id=title1><a style="color:#626262;" href="">个人中心</a> > <a href="" style="color:#246BB0;">个人基本信息</a> </div>
			<div id=line></div>
		</div>
		<div id=left>
			<div id=left_top>
				用户中心导航
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c1a.gif">
					<img style="display:none" src="/images/html/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user_info.php">个人基本信息</div></a>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c2a.gif">
					<img style="display:none" src="/images/html/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user_order.php">订阅信息</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list2">
				<div class="iconb">
					<img style="display:none" src="/images/html/user/c3a.gif">
					<img style="display:inline" src="/images/html/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user_favorites.php">我的收藏</a></div>
				<div class="icon2"  style="display:inline"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c4a.gif">
					<img style="display:none" src="/images/html/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user_password.php">修改登录密码</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
		</div>
		<div class=right>
			<div class=right_title>
				<span style="float:left;display:inline">我的收藏</span>
				<?php $log = $db->query("select * from fb_yh_log where yh_id=$uid order by id desc limit 2");?>
				<span class="r_t_right">亲爱的<?php echo $_SESSION['name'];?>：您上次登录的时间是 <?php if($db->record_count==2) echo $log[1]->time;else echo $log[0]->time;?></span>
			</div>
			<div class="right_text">
				<div class=right-title2>
					<div name="news" <?php if($type=="news"){?>style="background:url(/images/html/user/right_title.jpg); color:#055C99;"<?php }?> class=right-title4>
						专栏文章
					</div>
					<div name="rich" <?php if($type=="rich"){?>style="background:url(/images/html/user/right_title.jpg); color:#055C99;"<?php }?> class=right-title4>
						收藏的富豪
					</div>
					<div name="famous" <?php if($type=="famous"){?>style="background:url(/images/html/user/right_title.jpg); color:#055C99;"<?php }?> class=right-title4>
						收藏的名人
					</div>
					<div name="column" <?php if($type=="column"){?>style="background:url(/images/html/user/right_title.jpg); color:#055C99;"<?php }?> class=right-title4>
						收藏的专栏
					</div>
				</div>
				<div class=right-text id="news" <?php if($type=="news")echo 'style="display:inline;"';?>>
					<div class="right_box">
					<?php
						$sql = "select t1.title,t1.id,t2.created_at from fb_news t1 join fb_collection t2 on t1.id=t2.resource_id where t2.resource_type='fb_news' and t2.user_id=$uid order by t2.created_at";
						$news = $db->paginate($sql,7,'news_page');
						$news_count = count($news);
						for($i=0;$i<$news_count;$i++){
					?>
					<div class=li1><a target="_blank" title="<?php echo strip_tags($news[$i]->title);?>" href="/news/news.php?id=<?php echo $news[$i]->id;?>"><?php echo $news[$i]->title;?></a></div><div class=li2> 收藏于：<?php echo substr($news[$i]->created_at, 0, 10);?></div>
					<?php
						}
					?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=news",null,'news_page');?></div>
				</div>
				<div class=right-text id="rich" <?php if($type=="rich")echo 'style="display:inline;"';?>>
					<div class="right_box">
					<?php
						#$list = $db->query("select id from fb_fhb where publish_year=".date('Y'));
						$list = $db->query("select id from fb_fhb where publish_year=2010");
						$sql = "select t1.*,t3.pm from fb_fh t1 join fb_collection t2 on t1.id=t2.resource_id join fb_fhbd t3 on t1.id=t3.fh_id where t2.resource_type='fb_fh' and t2.user_id=$uid and t3.bd_id={$list[0]->id} order by t2.created_at";
						if($db->record_count==1){
							$rich = $db->paginate($sql,4,'rich_page');
							$rich_count = count($rich);
						}else{
							$rich_count = 0;
						}
					
						$rich_list = $db->query("select t1.bd_id,t3.year,t1.fh_id from fb_fhbd t1 join fb_collection t2 on t1.fh_id=t2.resource_id join fb_fhb t3 on t1.bd_id=t3.id where t2.resource_type='fb_fh' and t2.user_id=$uid  order by t2.created_at");
						$list_count = $db->record;
						for($i=0;$i<$rich_count;$i++){
							$money = $db->query("select * from fb_fh_grcf where fh_id={$rich[$i]->id} order by jzrq desc limit 1");
							$company = $db->query("select t2.mc,t2.id from fb_fh_gs t1 join fb_gs t2 on t1.gs_id=t2.id where t1.fh_id={$rich[$i]->id}");
							$com_count = count($company);
							if($db->record_count>0){
								$ind_ids = $company[0]->id;
								if(count($ind_ids)>1){
									for($k=1;$k<count($company);$k++){
										$ind_ids .= ','.$company[$k]->id;
									}
								}
								$industry = $db->query("select t2.id,t2.name from fb_company_industry t1 join fb_industry t2 on t1.industry_id=t2.id where t1.company_id in ({$ind_ids}) group by name");
								$ind_count = count($industry);
							}else{
								$ind_count = 0;
							}
							
					?>
					<div class="rich_box">
						<div class="rich_pic"><img src="<?php echo $rich[$i]->fh_zp;?>" width="70" height="70"></div>
						<div class="rich_info">
							<div class="rich_name"><a href="/rich/rich.php?id=<?php echo $rich[$i]->id;?>"><?php echo $rich[$i]->name;?></a> <?php if($rich[$i]->xb==1)echo '男';elseif($rich[$i]->xb==0)echo '女';?> <?php if($rich[$i]->birthday!='')echo (date('Y')-$rich[$i]->birthday).'岁'?></div>
							<div class="rich_com"><?php for($j=0;$j<$com_count;$j++){if($j!=0)echo ',';?><a class="style1" href="company.php?id=<?php echo $company[$j]->id;?>"><?php echo $company[$j]->mc;?></a><?php }?></div>
							<div class="rich_ind">（<?php for($j=0;$j<$ind_count;$j++){if($j!=0)echo ',';?><a class="style2" href="industry.php?id=<?php echo $industry[$j]->id;?>"><?php echo $industry[$j]->name;?></a><?php }?>）</div>
							<div class="rich_rank">
								年度排名：<span class="red"><?php echo $rich[$i]->pm;?></span>　今日排名：<span class="red"></span><br/>
								个人财富：<?php echo $money[0]->zc;?><br/>
								（截止日期：<?php echo substr($money[0]->jzrq,0,10);?>）
							</div>
						</div>
						<div class="rich_bd">
							<div class="bd_left">入选榜单：</div>
							<div class="bd_list">
								<?php for($n=0;$n<$list_count;$n++){
									if($rich_list[$n]->fh_id==$rich[$i]->id){
								?>
								<a href="rich_list.php?id=<?php echo $rich_list[$n]->bd_id;?>"><?php echo $rich_list[$n]->year?></a>
								<?php }}?>
							</div>
						</div>
					</div>
					<?php
						}
					?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=rich",null,'rich_page');?></div>
				</div>
				<div class=right-text id="famous" <?php if($type=="famous")echo 'style="display:inline;"';?>>
					<div class="right_box">
						<?php
							#$list = $db->query("select id from fb_fhb where publish_year=".date('Y'));
							$list = $db->query("select id from fb_mrb where publish_year=2009");
							if($db->record_count==1){
								$sql = "select t1.id,t1.name,t1.xb,t1.mr_zp,t1.zy,t3.sr,t3.bgl,t3.sr_pm,t3.bgl_pm from fb_mr t1 join fb_collection t2 on t1.id=t2.resource_id join fb_mrbd t3 on t1.id=t3.mr_id where t2.resource_type='fb_mr' and t2.user_id=$uid and t3.bd_id={$list[0]->id} order by t2.created_at";
								$famous = $db->paginate($sql,4,'famous_page');
								$famous_count = count($famous);
							}else{
								$famous_count = 0;
							}
							$famous_list = $db->query("select t1.bd_id,t3.year,t1.mr_id from fb_mrbd t1 join fb_collection t2 on t1.mr_id=t2.resource_id join fb_mrb t3 on t1.bd_id=t3.id where t2.resource_type='fb_mr' and t2.user_id=$uid  order by t2.created_at");
							$list_count = count($famous_list);
							for($i=0;$i<$famous_count;$i++){
						?>
						<div class="famous_box">
							<div class="famous_pic">
								<img src="<?php echo $famous[$i]->mr_zp?>" width="90" height="90">
							</div>
							<div class="famous_info">
								<div class="famous_name">
									<a href="famous.php?id=<?php echo $famous[$i]->id?>"><?php echo $famous[$i]->name?></a>　<?php echo $famous[$i]->xb?>
								</div>
								<div class="famous_rank">
									<span class="blue"><?php echo $famous[$i]->zy?></span><br/>
									年度收入排名：<?php echo $famous[$i]->sr_pm;?>　收入：<?php echo $famous[$i]->sr;?>万<br/>
									曝光率排名：<?php echo $famous[$i]->bgl_pm;?>　曝光指数：<?php echo $famous[$i]->bgl;?><br/>
								</div>
							</div>
							<div class="famous_bd">
								<div class="bd_left">入选榜单：</div>
								<div class="bd_list">
									<?php for($n=0;$n<$list_count;$n++){
										if($famous_list[$n]->mr_id==$famous[$i]->id){
									?>
									<a class="famous_a" href="<?php echo $famous_list[$n]->bd_id;?>"><?php echo $famous_list[$n]->year;?></a>
									<?php }}?>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=famous",null,'famous_page');?></div>
				</div>
				<div class=right-text id="column" <?php if($type=="column")echo 'style="display:inline;"';?>>
					<div class="right_box">
						<?php
							$sql = "select t1.* from fb_collection t2 join fb_user t1 on t1.id=t2.resource_id where t2.user_id=$uid and t2.resource_type='column'";
							$author = $db->paginate($sql,2,'column_page');
							$sql = "select t1.title,t1.id,t1.short_title,t1.author_id from fb_collection t2 join fb_news t1 on t1.author_id=t2.resource_id where t2.user_id=$uid and t2.resource_type='column'";
							$news = $db->query($sql);
							for($i=0;$i<count($author);$i++){
								$k=0;
						?>
						<div <?php if($i==1){?>style="border:0"<?php }?> class="column_box">
							<div class="column_photo"><img width="90" height="90" src="<?php if(!$author[$i]->image_src)echo '/images/html/column/picture.jpg';else echo $author[$i]->image_src;?>"></div>
							<div class="column_info">
								<div class="column_title"><a href=""><?php echo $author[$i]->nick_name;?></a></div>
								<div class="column_description"><?php echo $author[$i]->description;?></div>
							</div>
							<div class="column_news">
								<div class="news_new">最新专栏文章：</div>
								<?php 
									for($j=0;$j<count($news);$j++){
										if($news[$j]->author_id==$author[$i]->id){
											$k++;
											if($k>2) break;
								?>
								<div class="news_title"><a title="<?php echo strip_tags($news[$j]->title);?>" href="/news/news.php?id=<?php echo $news[$j]->id?>"><?php echo $news[$j]->short_title;?></a></div>
								<?php
									}}
								?>
								<div class="go_to"><a href="">进入专栏>></a></div>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=column",null,'column_page');?></div>
				</div>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>