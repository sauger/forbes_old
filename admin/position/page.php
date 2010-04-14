<?php 
	include_once('../../frame.php');
	$page_type= 'admin';
	include "../../" .$_GET['page'] .".php";
?>
<script>
parent.$("#admin_iframe").attr("height","2500px");
</script>