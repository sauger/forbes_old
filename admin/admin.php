<?php
	//var_dump($_SESSION);
	require_once('../frame.php');
	require_role('admin');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php	
		css_include_tag('admin');
		use_jquery();
		js_include_tag('jquery.cookie.js', 'pubfun');
  ?>
</head>
<body style="background:url(/images/admin/bg.jpg) repeat-x;">
	<div id=admin_body>
		<div id=part1>
			<div id=nav style="width:360px;">欢迎你：  <?php echo $_SESSION["nick_name"]; ?> [<a href="/login/logout.post.php">退出</a>]</div>
			<div id=title><?php echo $site_name; ?>后台管理</div>
			<div id=index><a href="/index.php" target="_blank">动态主页</a></div>
		</div>
		<div id=part2>
				<?php
					$menu = new table_class($tb_menu);
					$main_menu = $menu->find("all",array('order' => 'parent_id,priority desc','conditions' => 'role_level <= ' .$_SESSION['role_level']));
					$main_menu2 = $main_menu;
					//--------------------				
					for($i=count($main_menu)-1;$i>=0;$i--)
					{

						//--------------				
						if(0==$main_menu[$i]->parent_id){ 
				?>
						<div class="menu1"><a href="<?php echo $main_menu[$i]->href;?>" target="<?php echo $main_menu[$i]->target;?>" list="<?php echo $i;?>" is_root="<?php echo $main_menu[$i]->is_root;?>"><?php echo $main_menu[$i]->name;?></a></div>
						<? 
							 //-----
							 for($j=count($main_menu2)-1;$j>=0;$j--)
							 {	
							 		if($main_menu[$i]->id==$main_menu2[$j]->parent_id)
							 		{
						 ?>	 			
						 			<? if($main_menu2[$j]->target<>"_blank"){?>
						 			<div class="menu2 list2_<?php echo $i;?>" onClick='$("#admin_iframe").attr("src","<?php echo $main_menu2[$j]->href; ?>")' >.<?php echo $main_menu2[$j]->name ?></div>
						 			<? }else{?>
						 			<a class="menu2 list2_<?php echo $i;?>" href="<?php echo $main_menu2[$j]->href; ?>") target=_blank>.<?php echo $main_menu2[$j]->name ?></a>
						 			<? }?>
						 <?	 			
							 		}
						   }
						   //-----
						?>
				<?php 
						}
						//--------------				
					}
				  //--------------------				
				?>
		</div>
		
		<div id=part3>
		  <iframe id=admin_iframe name="admin_iframe" scrolling="yes" frameborder="0" src="/admin/menu/menu_list.php" width="99%" height="700px"></iframe>
		</div>		
	</div>
</body>
</html>
<script>
$(function(){
	$(".menu1 a").click(function(e){
		if($(this).attr("is_root")=="1")
		{
		   e.preventDefault();
		   $(".menu2").hide();
		   $(".list2_"+$(this).attr("list")).show();
		}
	});
	
	//display_login('nav',true);
});
</script>



