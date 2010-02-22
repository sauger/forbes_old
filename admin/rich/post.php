<?php 
	require "../../frame.php";
	$db = get_db();
	$fh_id = $_POST['id'] ? $_POST['id'] : 0;
	$sql = "select * from fb_fh_grcf where fh_id = '".$fh_id."' order by jzrq desc";
	$sql1 = "select * from fb_fh order by id desc";
	$record = new table_class('fb_fh'); //富豪信息
	$record1 = new table_class('fb_fh_grcf'); //个人财富
  $record2 = $db->query($sql); //取出富豪个人财富的最新数据
  $record3 = new table_class('fb_fh_gs'); //富豪公司信息
	if($fh_id!=0){
		$record->find($fh_id);
	}
	$record->update_attributes($_POST['fh'],false);
	$birthday = $_REQUEST['fh[birthday]'];
	if ($birthday == '')
	{
		$record->birthday='0000-00-00';
	}
	if($_FILES['photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/rich_images/";
		$img = $upload->handle('photo','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
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
	if ( $_POST['gsid'] == '')
	{
		redirect('list.php');
	}
	else
	{
		$record3->fh_id = $fh_id;
		$record3->gs_id = $_POST['gsid'];
		$record3->save();
		redirect("edit.php?id=".$fh_id);
	}
?>