<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery_ui();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		css_include_tag('jquery_ui');
		//$db = get_db();
		//var_dump($db->execute($script));
		?>
	</head>
	<body>
		<div style="float:left">aba</div>
		<div style="border:1px solid;float:left;width:500px;">
			<div style="width:50px;height:50px;background-color:green;margin-left:10px;margin-right:10px;">
				<div style="width:30px;height:30px;background-color:gray;margin-left:5px;"></div>
			</div>
		</div>
	</body>
</html>

<script>
	//$('#editor').val('ok');	
	$(function(){
		var tags = ['php','asp','jsp'];
		$('#auto').autocomplete({source:'sauger.php'});
		function show(){
			$window = $(window);
			var str = new Array();
			 str.push('windowheith=' + $window.height());
			str.push('scrolltop=' + $window.scrollTop());
			alert(str); 
			
		}
	});
</script>

</script>
