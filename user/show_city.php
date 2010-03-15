<option value=""></option>
<?php
    include_once('../frame.php');
	$id = intval($_POST['id']);
	
	if(empty($id)){
	}else{
		$db = get_db();
		$city = $db->query("select * from fb_chinafar where parent_id=$id");
		for($i=0;$i<count($city);$i++){
?>
<option value="<?php echo $city[$i]->id?>"><?php echo $city[$i]->name?></option>
<?php
		}
		close_db();
	}
?>







