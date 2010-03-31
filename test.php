<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery_ui();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		css_include_tag('jquery_ui');	
		var_dump(static_news());
		die();
		//$db = get_db();
		//var_dump($db->execute($script));
		die();				
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
		
		<a id="test" href="#">test</a>
	</body>
</html>

<script>
	//$('#editor').val('ok');	
	var a = ['abc','中国','cadsf','afgdfs','sdfasb','cfasd'];
	$('#auto').autocomplete({source: a});
	array_remove(a,'b');
	$('#test').click(function(e){
		var editor = CKEDITOR.instances;
		if(editor['title[news]'].getData() ==''){
			alert('emptyp');
		}
		alert(editor['title[news]'].getData());
	});
</script>
