<html>
	<head>
		<?php
		require 'frame.php';
		use_jquery_ui();
		js_include_tag('../ckeditor/ckeditor.js','../ckeditor/adapters/jquery.js','pubfun');
		css_include_tag('jquery_ui');
		function string_substring($string,$start,$length)
{
    $countstart=0;
    $countlength=0;
    $printstring="";
    for($i=0;$i<strlen($string);$i++)
    {
        while($countstart!=$start)
        {
            $countstart++;
            if(ord(substr($string,$i,1))>128)
            {
                $i+=2;
            }
            else
            {
                $i++;
            }
        }
        while($countlength!=$length)
        {
            $countlength++;
            if(ord(substr($string,$i,1))>128)
            {
                $printstring.=substr($string,$i,2);
                $i+=2;
            }
            else
            {
                $printstring.=substr($string,$i,1);
                $i++;
            }
        }
    }
    return $printstring;
}
		//$db = get_db();
		//var_dump($db->execute($script));
		?>
	</head>
	<body>
		<div id="debug"></div>
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
		$('#hover').hover(function(){
			i = i + 1;
			$('#debug').html(i);
		});
	});
</script>

</script>
