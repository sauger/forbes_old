<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		//echo substr('dbscript',-1);;
		//$script = file_get_contents('dbscript/test.sql');
		dir_files('dbscript/');
		send_mail('smtp.163.com','sauger','auden6666','sauger@163.com','sauger@163.com','test','<a href="www.xun-ao.com">xunao</a>');
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
		
			<input type="file" name="item[picture]">
			<input type="file" name="item[image]">
			<input type="submit" value="send"></input>		
		</form>
		
		<a id="test" href="#">test</a>
	</body>
</html>

<script>
	//$('#editor').val('ok');	
	var a = ['a','b','c','a','b','c'];
	array_remove(a,'b');
	$('#test').click(function(e){
		var editor = CKEDITOR.instances;
		if(editor['title[news]'].getData() ==''){
			alert('emptyp');
		}
		alert(editor['title[news]'].getData());
	});
</script>
