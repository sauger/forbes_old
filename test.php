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
		<?php 
		$c = new category_class('news');
	?>
		<form method="post" action="test1.php" enctype="multipart/form-data" >
		
			<input id="auto" type="text"></input>
			<input type="file" name="item[picture]">
			<input type="file" name="item[image]">
			<input type="submit" value="send"></input>		
		</form>
		
		<a class="test" href="#">test</a>
		<div style="height:600px;">dsfads</div>
		<a class="test" href="#">test</a>
		<iframe src="/test1.php" width="1000" height="1000"></iframe>
	</body>
</html>

<script>
	//$('#editor').val('ok');	
	$(function(){
		$('.test').click(function(e){
			e.preventDefault();
			show();
		});
		function show(){
			$window = $(window);
			var str = new Array();
			 str.push('windowheith=' + $window.height());
			str.push('scrolltop=' + $window.scrollTop());
			alert(str); 
			
		}
	});

</script>