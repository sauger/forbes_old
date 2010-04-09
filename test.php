<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery_ui();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		css_include_tag('jquery_ui');
		//$db = get_db();
		//var_dump($db->execute($script));
		var_dump($_POST);				
		?>
	</head>
	<body>
		<?php 
		$c = new category_class('news');
	?>
		<form method="post" action="test.php" enctype="multipart/form-data" >
		
			<input id="auto" type="text"></input>
			<select multiple="multiple" name="select">
				<option value="a">a</option>
				<option value="b">b</option>
			</select>
			<input type="file" name="item[picture]">
			<input type="file" name="item[image]">
			<input type="submit" value="send"></input>		
		</form>
		<div id="autocomplete"></div>
		<a class="test" href="#">test</a>
		<div style="height:600px;">dsfads</div>
		<a class="test" href="#">test</a>
		<iframe src="/test1.php" width="1000" height="1000"></iframe>
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
