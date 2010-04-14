<?php 
	session_start();
	require_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-榜单列表</title>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('sort','public');
	?>
</head>
<body>
	<div id=ibody>
	<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>榜单中心</div>
			<div id=title1><a href="">福布斯中文网</a> > <a href="/list/">榜单</a> > <a href="" style="color:#246BB0;">榜单列表</a></div>
			<div id=line></div>
		</div>
		<div id=l>
			<div id=l_t1>
				常规榜
			</div>
			<div id=l_l1 style="margin-top:10px;">
				<a href="list.php?id=1">富豪</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=2">投资</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=3">公司</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=4">城市</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=5">名人</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=6">体育</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=7">科技</a>
			</div>
			<div id=l_l1>
				<a href="list.php?id=8">教育</a>
			</div>
			<div id=l_t1 style="margin-top:20px;">
				<a class="link2" href="list.php?id=9">图片榜</a>
			</div>
			<div id=l_t1>
				<a class="link2" href="list.php?id=10">专题榜</a>
			</div>
			<div id=l_t1>
				按年份
			</div>
			<?php for($i=date('Y');$i>2004;$i--){?>
			<div id=l_l1 <?php if($i==date('Y')){?>style="margin-top:10px;"<?php }?>>
				<a href="list.php?year=<?php echo $i;?>"><?php echo $i;?>年榜单</a>
			</div>
			<?php }?>
			<div id=l_l1>
				<input type="text" id=text ><input type="button" id=button>
			</div>
		</div>
		<div id=r>
			<?php 
				$bdid=intval($_GET['id']);
				$year = intval($_GET['year']);
				switch($bdid){
					case "1":
						$bdname="富豪榜";
						break;
					case "2":
						$bdname="投资榜";
						break;
					case "3":
						$bdname="公司榜";
						break;
					case "4":
						$bdname="城市榜";
						break;
					case "5":
						$bdname="名人榜";
						break;
					case "6":
						$bdname="体育榜";
						break;
					case "7":
						$bdname="科技榜";
						break;
					case "8":
						$bdname="教育榜";
						break;
					case "9":
						$bdname="图片榜";
						break;
					case "10":
						$bdname="专题榜";
						break;
					default: 
			    	$bdname="常规榜"; 
			    	break; 
				}
				if($bdid=="")
				{
					$sql = 'select * from fb_custom_list_type order by priority asc,created_at desc';
				}
				else if($bdid<9)
				{
					$sql = 'select * from fb_custom_list_type where position="'.$bdid.'" order by priority asc,created_at desc';
					
				}
				else if($bdid==9)
				{
					$sql = 'select * from fb_custom_list_type where list_type=4 order by priority asc,created_at desc';
					
				}
				else if($bdid==10)
				{
					$sql = 'select * from fb_custom_list_type where list_type=5 order by priority asc,created_at desc';
					
				}
				if($year){
					$bdname = $year."年榜单";
					$sql = "select * from fb_custom_list_type where created_at>'{$year}-01-01 00:00:00' and created_at<'{$year}-12-31 23:59:59' order by priority asc,created_at desc";
				}
				$bd=$db->paginate($sql,8);
			?>
			<div id=r_t>
				<div style="width:420px;float:left;display:inline;">您选择的<?php echo $bdname; ?>共有<?php echo count($bd); ?>条记录，分别如下：</div>
			</div>
			<div id=r_m>
			</div>
			<div id=r_b>
				<div id=r_b_l>
					<?php for($i=0;$i<count($bd);$i++){ ?>
						<div class=r_b_l_t><a href="show_list.php"><?php echo $bd[$i]->name; ?></a></div>
					<?php } ?>
				</div>
				<div id=r_b_r>
				</div>
			</div>
			<div id="page"><?php paginate();?></div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>