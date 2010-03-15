<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		search_content('a di hu');
		?>
	</head>
	<body>
		<form method="post" action="test1.php">
			<div id="editor" name="editor"></div>
			<?php show_fckeditor('title[news]')?>
			<input type="submit" value="send"></input>		
		</form>
		
		<a id="test" href="#">test</a>
	</body>
</html>

<script>
	//$('#editor').val('ok');	
	var a = ['a','b','c','a','b','c'];
	alert(a.join(','));
	array_remove(a,'b');
	alert(a.join(','));
	$('#test').click(function(e){
		var editor = CKEDITOR.instances;
		if(editor['title[news]'].getData() ==''){
			alert('emptyp');
		}
		alert(editor['title[news]'].getData());
	});
</script>