<?php 
	require "../../frame.php";
	$gs_id = $_POST['id'] ? $_POST['id'] : 0;
	$record = new table_class('fb_gs');
	if($gs_id!=0){
		$record->find($gs_id);
	}
	$record->update_attributes($_POST['gs']);
	
	for($i=0;$i<count($_POST['industry']);$i++){
		$record3 = new table_class('fb_company_industry'); 
		$record3->company_id = $record->id;
		$record3->industry_id = $_POST['industry'][$i];
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