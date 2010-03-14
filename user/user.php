<?php 
	require_once('../frame.php');
	$id = intval($_REQUEST['id']);
	if(!empty($id)){
		if($id>4){
			redirect('error.html');
		}
	}else{
		redirect('error.html');
	}
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
		<div id=right>
			<div id=right-title1>
				<?php if($id==3)echo '我的收藏';?>
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
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
				<div class=li1><a href="">基金“纠结”银行股机会蓝筹行机会蓝筹行情行机会蓝筹行情行股机会蓝筹行情	谁主沉浮？</a></div><div class=li2> 收藏于：2010-1-31</div>
			</div>
			<a href=""><div id=right-next>
			</div></a>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>