<?php 
	require_once('../frame.php');
	require_login();
	$id = intval($_REQUEST['id']);
	if(!empty($id)){
		if($id>4){
			redirect('error.html');
		}
	}else{
		$id = 1;
	}
	$db = get_db();
	$uid = $_SESSION['user_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-用户</title>
	<?php
		use_jquery();
		js_include_tag('select2css','user/user');
		css_include_tag('html/user/user','top','bottom','select2css');
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
			<div class="left_list<?php if($id==1)echo 2;?>">
				<div class="icon<?php if($id==1)echo b;?>">
					<img <?php if($id==1)echo 'style="display:none"';?> src="/images/html/user/c1a.gif">
					<img  <?php if($id==1)echo 'style="display:inline"';?>style="display:none" src="/images/html/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user.php?id=1">个人基本信息</div></a>
				<div class="icon2" <?php if($id==1)echo 'style="display:inline"';?>><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list<?php if($id==2)echo 2;?>">
				<div class="icon<?php if($id==2)echo b;?>">
					<img <?php if($id==2)echo 'style="display:none"';?> src="/images/html/user/c2a.gif">
					<img <?php if($id==2)echo 'style="display:inline"';?>style="display:none" src="/images/html/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user.php?id=2">订阅信息</a></div>
				<div class="icon2" <?php if($id==2)echo 'style="display:inline"';?>><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list<?php if($id==3)echo 2;?>">
				<div class="icon<?php if($id==3)echo b;?>">
					<img <?php if($id==3)echo 'style="display:none"';?> src="/images/html/user/c3a.gif">
					<img <?php if($id==3)echo 'style="display:inline"';?>style="display:none" src="/images/html/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user.php?id=3">我的收藏</a></div>
				<div class="icon2" <?php if($id==3)echo 'style="display:inline"';?>><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list<?php if($id==4)echo 2;?>">
				<div class="icon<?php if($id==4)echo b;?>">
					<img <?php if($id==4)echo 'style="display:none	"';?> src="/images/html/user/c4a.gif">
					<img <?php if($id==4)echo 'style="display:inline"';?>style="display:none" src="/images/html/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user.php?id=4">修改登录密码</a></div>
				<div class="icon2" <?php if($id==4)echo 'style="display:inline"';?>><img src="/images/html/user/coin.gif"></div>
			</div>
		</div>
		<?php if($id==1){
		?>
		<?php
		}elseif($id==3){?>
		<div id=right>
			<div id=right-title1>
				我的收藏
			</div>
			<div id=right-title2>
				<div style="background:url(/images/html/user/right_title.jpg); color:#055C99;" class=right-title4>
					专栏文章
				</div>
				<div class=right-title4>
					收藏的富豪
				</div>
				<div class=right-title4>
					收藏的名人
				</div>
				<div class=right-title4>
					收藏的专栏
				</div>
			</div>
			<div id=right-text>
				<?php
					$sql = "select t1.title,t1.id,t2.created_at from fb_news t1 join fb_collection t2 on t1.id=t2.resoure_id where t2.resoure_type='news' and t2.user_id=$uid order by t2.created_at";
					$news = $db->paginate($sql,10);
					$news_count = count($news);
					for($i=0;$i<$news_count;$i++){
				?>
				<div class=li1><a target="_blank" title="<?php echo $news[$i]->title;?>" href="/news/news.php?id=<?php echo $news[$i]->id;?>"><?php echo $news[$i]->title;?></a></div><div class=li2> 收藏于：<?php echo substr($news[$i]->created_at, 0, 10);?></div>
				<?php
					}
				?>
				
			</div>
			<div id="paginate"></div>
		</div>
		<?php }?>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>