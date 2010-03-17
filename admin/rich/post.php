<?php 
	require "../../frame.php";
	#var_dump($_POST);
	$db = get_db();
	$fh_id = $_POST['id'] ? $_POST['id'] : 0;
	$sql = "select * from fb_fh_grcf where fh_id = '".$fh_id."' order by jzrq desc";
	$sql1 = "select * from fb_fh order by id desc";
	$record = new table_class('fb_fh'); 
	$record1 = new table_class('fb_fh_grcf'); 
  $record2 = $db->query($sql); 
	if($fh_id!=0){
		$record->find($fh_id);
	}
	$record->update_attributes($_POST['fh'],false);
	if($_FILES['photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/rich_images/";
		$img = $upload->handle('photo','filter_pic');
		
		if($img === false){
			alert('上传失败!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$record->fh_zp = "/upload/rich_images/{$img}";
	}
	$record->save();
	if ($fh_id == 0)
	{
		$record4 = $db->query($sql1);
		$fh_id = $record4[0]->id;
	}
	if( $_POST['zc'] != $record2[0]->zc)
	{
		$record1->fh_id = $fh_id;
		$record1->zc = $_POST['zc'];
		$record1->jzrq = date("Y-m-d H:i:s");
		$record1->save();
	}
	for($i=0;$i<count($_POST['company']);$i++){
		$record3 = new table_class('fb_fh_gs'); 
		$record3->fh_id = $record->id;
		$record3->gs_id = $_POST['company'][$i];
		$record3->stock_count = $_POST['stock'][$i];
		$record3->save();
	}
	for($i=0;$i<count($_POST['old_company']);$i++){
		$gs_fh = new table_class('fb_fh_gs');
		$gs_fh->find($_POST['old_company'][$i]);
		$gs_fh->stock_count = $_POST['old_stock'][$i];
		$gs_fh->save();
	}
	redirect('list.php');
		
?>