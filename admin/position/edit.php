<style type="text/css">
	#pos_caption{width:900px; height:25px; margin-left:5px; padding:10px; font-weight:bold; font-size:14px; text-align:left; border:1px dotted #cdcdcd; background:#FBFBFB; float:left; display:inline;}
	#pos_caption #title{width:300px; color:#0B55C4; font-size:23px; float:left; display:inline;}
	#pos_table{float:left;}	
</style>
<?php 
	include_once dirname(__FILE__) ."/../../frame.php";
	$pos = new table_class('fb_page_pos');
	$pos->find_by_name($_GET['pos_name']);
?>
<div id=pos_caption>
    <div id=title>位置管理</div>
</div>
<div id="pos_table">
	<table width=900>
		<tr class=tr4>
			<td class=td1>标题</td>
			<td>
				<input type="text" name="pos[display]" value="<?php echo $pos->display; ?>">
			</td>
		</tr>
		<tr class="tr4">
			<td>描述</td>
			<td>
				<textarea name="pos[description]"><?php echo $pos->description;?></textarea>
			</td>
		</tr>
		<tr>
			<td>链接</td>
			<td>
				<input type="text" name="pos[href]" value="<?php echo $pos->href;?>"></input>
			</td>
		</tr>
		<tr>
			<td>静态链接</td>
			<td>
				<input type="text" name="pos[href]" value="<?php echo $pos->static_href;?>"></input>
			</td>
		</tr>
		<tr>
			<td>过期时间</td>
		</tr>
	</table>
</div>