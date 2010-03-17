<?php 
	$selected_news = ($_REQUEST['selected_news']);
	if($selected_news){
		$selected_news = explode(',',$selected_news);
	}
?>
<script type="text/javascript">
var selected_news = new Array();
var call_back = '<?php echo $_REQUEST['call_back'];?>';
<?php if($selected_news){
	foreach ($selected_news as $v) {
		echo "selected_news.push('$v');";
	}
?>
<?php }?>
</script>

<div id='result_box'>
<?php
	include "_news_filter.php";
?>
</div>

