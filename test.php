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
		<div id="debug"></div>
		<select multiple="multiple" id="sel_keywords">
		</select>
		<div id="hover" style="width:100px; height:100px;background-color:red;"></div>
	</body>
</html>

<script>
	//$('#editor').val('ok');
	var i =0;	
	$(function(){
		$('#hover').hover(function(){
			i = i + 1;
			$('#debug').html(i);
		});
	});
</script>

</script>
