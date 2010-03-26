 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		require_once('../../frame.php');
		$debug_tag = false;
		use_jquery();
		require_role();
	?>
</head>
<?php
	$dir = '/dbscript/';
	$files = dir_files($dir,false);
	if($files === false) die('执行失败');
	$db = get_db();
	$db->query("select GROUP_CONCAT(file_name SEPARATOR ',') as files from db_migrate");
	if($db->move_first()=== false){
		die('执行成功，无新脚本');
	};
	$executed_files =  explode(',',$db->field_by_name('files'));
	$doing_files = array_diff($files,$executed_files);
	$done_files = array();
	$fail_files = array();
	$fail_scripts = array();
	foreach ($doing_files as $file) {
		$scripts = file_get_contents(ROOT_DIR .$dir . $file);
		$scripts = explode(';',$scripts);
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
		if($done){
			$done_files[] = $file;
		}else{
			$fail_files[] = $file;
		}
		$now = now();
		$db->execute("insert into db_migrate(file_name,created_at) values('{$file}','{$now}')");
	}
	
?>
<body>
	<div>
		<p>
			<a href="#" id="reload">重新载入</a>
		</p>
		<p>
			<span style="color:red;"><?php echo count($done_files);?></span>个脚本文件执行成功 <a href="#" id="done">查看</a>
		</p>
		<p>
			 <span style="color:red;"><?php echo count($fail_files);?></span>个脚本文件执行失败 <a href="#" id="fail">查看</a>
		</p>
		<p>
			 <span style="color:red;"><?php echo count($fail_scripts);?></span>条语句执行失败 <a href="#" id="fail_scripts">查看</a>
		</p>
	</div>
	<div><button id="execute">执行</button></div>
	<textarea rows="10" cols="65" id="sql_text"><?php echo implode(';',$fail_scripts);?></textarea>
	<div id="done_list" style="display:none">
		<?php foreach ($done_files as $file) {
			echo "<p>{$file}</p>";
		}?>
	</div>
	<div id="fail_list" style="display:none">
		<?php foreach ($fail_files as $file) {
			echo "<p>{$file}</p>";
		}?>
	</div>
	<div id="fail_scripts_list" style="display:none">
		<?php foreach ($fail_scripts as $file) {
			echo "<p>{$file}</p>";
		}?>
	</div>
</body>
</html>
<script type="text/javascript">
	$(function(){
		$('a').click(function(e){
			e.preventDefault();
			var div = '#'+ $(this).attr('id') + '_list';
			if($(div).css('display')=='none'){
				$(div).show();
			}else{
				$(div).hide();
			}
		});
		$('#execute').click(function(){
			var s = $('#sql_text').val();
			if(!s){
				alert('没有可执行的脚本');
				return false;
			}
			$.post('execute_script.php',{'scripts' : s},function(data){
				if(data){
					alert('部分脚本执行失败');
				}
				$('#sql_text').val(data);
			});
		});
		$('#reload').click(function(){
			location.href = 'dbmigrate.php';
		});
	});
</script>
