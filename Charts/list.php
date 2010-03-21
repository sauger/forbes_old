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
		js_include_tag('select2css');
		css_include_tag('sort','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
		<div id=top>
			<div id=title>文化娱乐</div>
			<div id=title1><a href="">福布斯中文网</a> > <a href="">奢华</a> > <a href="" style="color:#246BB0;">文化娱乐</a></div>
			<div id=line></div>
		</div>
		<div id=l>
			<div id=l_t1>
				常规榜
			</div>
			<div id=l_l1 style="margin-top:10px;">
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">投资</a>
			</div>
			<div id=l_l1>
				<a href="">公司</a>
			</div>
			<div id=l_l1>
				<a href="">城市</a>
			</div>
			<div id=l_l1>
				<a href="">名人</a>
			</div>
			<div id=l_l1>
				<a href="">体育</a>
			</div>
			<div id=l_l1>
				<a href="">科技</a>
			</div>
			<div id=l_l1>
				<a href="">教育</a>
			</div>
			<div id=l_t1 style="margin-top:20px;">
				图片榜
			</div>
			<div id=l_l1 style="margin-top:10px;">
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">富豪</a>
			</div>
			<div id=l_t1 style="margin-top:20px;">
				专题榜
			</div>
				<div id=l_l1 style="margin-top:10px;">
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">富豪</a>
			</div>
			<div id=l_t1 style="margin-top:20px;">
				按年份
			</div>
				<div id=l_l1 style="margin-top:10px;">
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<a href="">富豪</a>
			</div>
			<div id=l_l1>
				<input type="text" id=text ><input type="button" id=button>
			</div>
		</div>
		<div id=r>
			<?php 
				$bdid=$_REQUEST['id'];
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
					default: 
			    	$bdname="常规榜"; 
			    	break; 
				}
				if($bdid=="")
				{
					$bd=$db->paginate('select * from fb_custom_list_type order by priority asc,created_at desc',8);
				}
				else
				{
					$bd=$db->paginate('select * from fb_custom_list_type where position="'.$bdid.'" order by priority asc,created_at desc',8);
				}
			?>
			<div id=r_t>
				<div style="width:300px;float:left;display:inline;">您选择的<?php echo $bdname; ?>共有<?php echo count($bd); ?>条记录，分别如下：</div><select id=select1></select>
			</div>
			<div id=r_m>
			</div>
			<div id=r_b>
				<div id=r_b_l>
					<?php for($i=0;$i<count($bd);$i++){ ?>
						<div class=r_b_l_t><a href=""><?php echo $bd[$i]->name; ?></a></div>
					<?php } ?>
					<div class=r_b_l_t><?php paginate(''); ?></div>
				</div>
				<div id=r_b_r>
				</div>
			</div>
		</div>
	</div>
</body>