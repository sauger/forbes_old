<?php
	require_once('../../frame.php');
	$db = get_db();
	$industry = $db->query("select * from fb_industry");
	if(!$industry) $industry = array();
	$checked = explode(',',$_GET['ids']);
?>
<div style="width:600px;">
	<?php foreach ($industry as $v) {?>
		<div style="width:150px;float:left;"><input type="checkbox" value="<?php echo $v->id;?>" id="<?php echo $v->id;?>"></input> <label for="<?php echo $v->id;?>"><?php echo $v->name?></label></div>
	<?php }?>
</div>
<div style="width:600px;text-align:center">
<button id="button_save">保存</button>
<button id="button_cancel">取消</button>
</div>
<script>
		var ids = "<?php echo $_GET['ids'];?>".split(',');
		$(function(){
			$('input:checkbox').each(function(){
				$(this).attr('checked',$.inArray($(this).val(),ids) != -1);
			});
			$('#button_save').click(function(){
				var s = new Array();
				$('input:checked').each(function(){
					s.push($(this).val());
				});
				save_related_industry(s.join(','));
				$.fn.colorbox.close();
			});	
			$('#button_cancel').click(function(){
				$.fn.colorbox.close();
			});

		});
		

</script>