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
		if($id==1)css_include_tag('html/user/register_user');
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
		<div class=right>
			<div class=right_title>
				个人基本信息
			</div>
			<div class="right_text">
				<div id=register>
					<div id=person>
						完善您的个人信息，就有机会获得《福布斯》中文版杂志赠阅机会！<br/>
						个人资料　（请全部用中文填写完整，所填事项不完整及填写家庭地址恕不受理）<br>
					</div>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class=td1>姓　　名：</td>
							<td class=td3><input class="txt" type="text"></td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td class=td1>性　　别：</td>
							<td class=td3><div class=td4><input type="radio" name="sex">男</div><div class=td4><input type="radio" name=sex>女</div</td>
							<td class=td11>学　　历：</td>
							<td class=td3><select class=sel1></select></td>
						</tr>
						<tr>
							<td class=td1>行　　业：</td>
							<td class=td3><select class=sel1></select></td>
							<td class=td11>职　　位：</td>
							<td class=td3><select class=sel1></select></td>
						</tr>
						<tr>
							<td class=td1>工作单位：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr>
							<td class=td1>所在部门：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr>
							<td class=td1>公司性质：</td>
							<td class=td3><select class=sel1></select></td>
							<td class=td11>公司规模：</td>
							<td class=td3><select class=sel1></select></td>
						</tr>
						<tr>
							<td class=td1>公司是否上市公司：</td>
							<td class=td3><select class=sel1></select></td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td class=td1>公司制造的产品：</td>
							<td class=td3><select class=sel1></select></td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td class=td1>公司年营业额：</td>
							<td class=td3><select class=sel1></select></td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td class=td1>您的个人年收入：</td>
							<td class=td3><select class=sel1></select></td>
							<td colspan=2></td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class=td1><span style="color:red;">*</span>所在区域：</td>
							<td class=td3><select class=sel1></select></td>
							<td class=td3><select class=sel1></select></td>
						</tr>
					</table>
					<table cellpadding="0" style="margin-top:0" cellspacing="0">
						<tr>
							<td class=td1>您的通讯地址：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr>
							<td class=td1>邮　　编：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr>
							<td class=td1>您的固定电话：</td>
							<td class=td2><input class="txt2" type="text"></td>
							<td class=td2><input class="txt2" type="text"></td>
							<td class=td2><input class="txt2" type="text"></td>
						</tr>
						<tr>
							<td class=td1>手　　机：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr>
							<td class=td1>M　S　N：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr>
							<td class=td1>Ｑ　　Ｑ：</td>
							<td colspan=3 class=td2><input class="txt1" type="text"></td>
						</tr>
						<tr >
							<td class=td1>您的头像：</td>
							<td colspan=3 class=td2><input class="file" type="file"></td>
						</tr>
					</table>
					<div id="submit"><button>提交并保存个人信息</button></div>
				</div>
			</div>
		</div>
		<?php
		}elseif($id==2){
		?>
		<div class=right>
			<div class=right_title>
				订阅信息
			</div>
			<div class="right_text">
				<?php
					$order = $db->query("select * from fb_yh_dy where yh_id=$uid");
				?>
				<div class="right_list">
					您已订阅福布斯精华推荐（一周发送一次）　<span class="right_list2">如果您要取消订阅请选择"我要取消订阅"选项</span>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="jhtj" <?php if($order[0]->jhtj==1)echo 'checked="checked"';?> id="checkbox1"><label for="checkbox1">我愿意订阅</label>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="jhtj2" <?php if($order[0]->jhtj==0)echo 'checked="checked"';?> id="checkbox2"><label for="checkbox2">我要取消订阅</label>
				</div>
				
				<div class="right_list" style="margin-top:40px;">
					是否愿意订阅福布斯分类文章（一周发送一次）　<span class="right_list2">如果您要取消订阅请选择去掉勾选的选项</span>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="fh" <?php if($order[0]->fh==1)echo 'checked="checked"';?> id="checkbox3"><label for="checkbox3">富豪</label>
					<input type="checkbox" name="cy" <?php if($order[0]->cy==1)echo 'checked="checked"';?> id="checkbox4"><label for="checkbox4">创业</label>
					<input type="checkbox" name="sy" <?php if($order[0]->sy==1)echo 'checked="checked"';?> id="checkbox5"><label for="checkbox5">商业</label>
					<input type="checkbox" name="kj" <?php if($order[0]->kj==1)echo 'checked="checked"';?> id="checkbox6"><label for="checkbox6">科技</label>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="tz" <?php if($order[0]->tz==1)echo 'checked="checked"';?> id="checkbox7"><label for="checkbox7">投资</label>
					<input type="checkbox" name="sh" <?php if($order[0]->sh==1)echo 'checked="checked"';?> id="checkbox8"><label for="checkbox8">生活</label>
				</div>
				<button id="order_b" class="user_b" type="button">确定</button>
			</div>
		</div>
		<?php
		}elseif($id==3){?>
		<div class=right>
			<div class=right_title>
				我的收藏
			</div>
			<div class="right_text">
			<div class=right-title2>
				<div name="news" style="background:url(/images/html/user/right_title.jpg); color:#055C99;" class=right-title4>
					专栏文章
				</div>
				<div name="rich" class=right-title4>
					收藏的富豪
				</div>
				<div name="famous" class=right-title4>
					收藏的名人
				</div>
				<div name="column" class=right-title4>
					收藏的专栏
				</div>
			</div>
			<div class=right-text id="news" style="display:inline;">
				<div class="right_box">
				<?php
					$sql = "select t1.title,t1.id,t2.created_at from fb_news t1 join fb_collection t2 on t1.id=t2.resource_id where t2.resource_type='news' and t2.user_id=$uid order by t2.created_at";
					$news = $db->paginate($sql,10);
					$news_count = count($news);
					for($i=0;$i<$news_count;$i++){
				?>
				<div class=li1><a target="_blank" title="<?php echo $news[$i]->title;?>" href="/news/news.php?id=<?php echo $news[$i]->id;?>"><?php echo $news[$i]->title;?></a></div><div class=li2> 收藏于：<?php echo substr($news[$i]->created_at, 0, 10);?></div>
				<?php
					}
				?>
				</div>
				<div class="paginate"><?php paginate();?></div>
			</div>
			<div class=right-text id="rich">
				<div class="right_box">
				<?php
					$sql = "select t1.name,t1.id,t2.created_at from fb_fh t1 join fb_collection t2 on t1.id=t2.resource_id where t2.resource_type='rich' and t2.user_id=$uid order by t2.created_at";
					$rich = $db->paginate($sql,10);
					$rich_count = count($rich);
					for($i=0;$i<$rich_count;$i++){
				?>
				<div class=li1><a target="_blank" title="<?php echo $rich[$i]->name;?>" href="/rich/rich.php?id=<?php echo $rich[$i]->id;?>"><?php echo $rich[$i]->name;?></a></div><div class=li2> 收藏于：<?php echo substr($news[$i]->created_at, 0, 10);?></div>
				<?php
					}
				?>
				</div>
				<div class="paginate"><?php paginate();?></div>
			</div>
			</div>
		</div>
		<?php }elseif($id==4){
		?>
		<div class=right>
			<div class=right_title>
				修改登录密码
			</div>
			<div class="right_text">
				<div style="margin-top:40px;" class="p_list"><label for="old_pass">原密码</label><input id="old_pass" type="password"></div>
				<div class="p_list"><label for="new_pass">新密码</label><input id="new_pass" type="password"></div>
				<div class="p_list"><label for="rnew_pass">确认新密码</label><input id="rnew_pass" type="password"></div>
				<button class="user_b" id="pass_b" type="button">设定</button>
			</div>
		</div>
		<?php }?>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>