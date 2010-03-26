<?php
include '../../frame.php';
$db = get_db();
$scripts = $_POST['scripts'];
$scripts = explode(';',$scripts);
$debug_tag = false;
$done = true;
foreach ($scripts as $script) {
			$script = str_replace(chr(13),'',$script);
			$script = str_replace(chr(10),'',$script);
			if(empty($script)) continue;
			if(!$db->execute($script)){
				$fail_scripts[] = $script;
				$done = false;
			}
		}
if($fail_scripts){
	echo implode(';',$fail_scripts);	
}
