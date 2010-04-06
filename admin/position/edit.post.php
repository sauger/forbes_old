<?php
include_once "../../frame.php";
use_jquery();
js_include_tag('jquery.colorbox-min');
$pos = new table_class('fb_page_pos');
$pos->find_by_name($_POST[pos][name]);
$pos->update_file_attributes('pos');
$pos->update_attributes($_POST['pos'], false);
$add_time = intval($_POST['end_time']);
if($add_time > 0){
	$end_time = date('Y-m-d H:00:00',strtotime("+{$add_time} hours", time()));
	$pos->end_time = $end_time;
}
$pos->save();
?>
<script>
	parent.$.fn.colorbox.close();
	parent.location.reload();
</script>