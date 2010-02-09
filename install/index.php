<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>	
	<title>安装首页</title>
	<?php
		include "../frame.php";		

		$step = empty($_GET['step'])? 1 : $_GET['step'];
		if($step == 5){
			redirect('/login/login.php','header');
		}
		$next_step = $step + 1;
		$prev_step = $step -1;
		$prev_step = $prev_step <=0 ? 1 : $prev_step;
		$can_prev = $step <= 1 ? false : true;
		$can_next = false;
		css_include_tag("install/index.css","install/bottom.css");
		use_jquery();
	?>
</head>
<body>
	<div id=ibody>
		<div id=left><IFRAME frameborder="no" border="0" scrolling=no width='298' height="490" marginwidth=0 marginheight=0 allowTransparency="true" SRC="left.inc.php?id=<?php echo $step; ?>" ></IFRAME></div>
		<div id=right>
			<?php
			$file = "page" . $step .'.php';
			if(file_exists($file)){
				include $file;
			}else{
				display_error('非法操作');
			}
			?>			
		</div>
		<div id=bottom>
			<div id=btn>
				<button id="btn_back" <?php if($can_prev === false) echo "disabled=true"; ?>><上一步(<U>B</U>)</button>
				<button id="btn_next" <?php if($can_next === false) echo "disabled=true"; ?>>下一步(<U>N</U>)></button>　
			</div>
		</div>
	</div>
	<form id="post_form" method="get" action="index.php">
		<input type="hidden" name="step" id="step">
	</form>
</body>	
</html>
<script>
	$(function(){
		$('#agree').click(function(e){
			if($(e.target).attr('checked')){
				$('#btn_next').attr('disabled',false);
			}else{
				$('#btn_next').attr('disabled',true);
			}
		});
		function submit_form(num){
			$('#step').val(num);
			if(num==4){
				$('#config_form').submit();
			}else{
				$('#post_form').submit();
			}
			
		}
		$('#btn_next').click(function(){		
			submit_form(<?php echo $next_step; ?>);		
		});
		$('#btn_back').click(function(){
			submit_form(<?php echo $prev_step;?>);
		});
		$(document).keydown(function(e){
			var code = String.fromCharCode(e.keyCode);
			if(code == 'N' && e.ctlkey){
				if($('#btn_next').attr('disabled')===false){
					submit_form(<?php echo $next_step; ?>);	
				}
				
			}else if( code == 'B' && e.ctlkey){
				if($('#btn_back').attr('disabled')===false){
					submit_form(<?php echo $prev_step; ?>);	
				}
			};
		});
	});
</script>