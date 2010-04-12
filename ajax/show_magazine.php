<option url="" value=""></option>
<?php 
	require_once('../frame.php');
	$db = get_db();
	
	$year = intval($_POST['year']);
	if(!empty($year)){
		$magazine = $db->query("select * from fb_old_magazine where year={$year} order by priority");
		$count = $db->record_count;
		for($i=0;$i<$count;$i++){
	?>
	<option url="<?php echo $magazine[$i]->url;?>" value="<?php echo $magazine[$i]->id;?>"><?php echo $magazine[$i]->name;?></option>
	<?php			
		}
	}
?>