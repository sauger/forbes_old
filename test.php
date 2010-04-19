<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery_ui();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		css_include_tag('jquery_ui');
		$str = '$a[]="a";$a[]=1;';
		eval($str);
		var_dump($a);
		//$db = get_db();
		//var_dump($db->execute($script));
		?>
	</head>
	<body>
		<div id="debug">
			<div>
				<div>
					<div id="idiv">fasdfasdf</div>
				</div>
			</div>
		</div>
		<select multiple="multiple" id="sel_keywords">
		</select>
		<div id="hover" style="width:100px; height:100px;background-color:red;"></div>
		<?php 
			echo mb_substr("中国ABC让你",0,6,'utf-8');
		?>
	</body>
</html>

<script>
	//$('#editor').val('ok');
	var i =0;	
	$(function(){
		$('#idiv').click(function(){
			alert($(this).offsetParent().length);
			$(this).offsetParent().append('<span style="color:red">test</span>');
		});
		$('#hover').hover(function(){
			i = i + 1;
			$('#debug').html(i);
		});
	});
</script>

</script>

