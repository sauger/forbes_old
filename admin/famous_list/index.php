<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>名人榜单</title>
		<?php 
			include '../../frame.php';
			css_include_tag('admin');
			use_jquery();
			js_include_tag('admin_pub');
			$ladders = new table_class('fb_mrbd');		
			$record = $ladders->paginate('all');
			$count = count($record);
			#var_dump($record);
		?>
	</head>
	<body>

		<table width="795" border="0" id="list">
			<tr class="tr1">
				<td colspan="6">
					　搜索　
					 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">　
					 年份<select id="year">
					 	<option value="">请选择</option>
						<?php for($i=2005;$i<=date("Y");$i++){?>
						<option <?php if($year==$i)echo 'selected="selected"';?> value="<?php echo $i?>"><?php echo $i?></option>
						<?php }?>
					</select>　
					<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
				</td>
			</tr>
			<tr class="tr2">
				<td width="245">榜单名称</td><td width="100">年份</td><td width="210">说明</td><td width="210">操作</td>
			</tr>
			<?php
				for($i=0;$i<$count;$i++){
			?>
					<tr class="tr3" id="<?php echo $record[$i]->id;?>">
						<td><?php echo $record[$i]->mc;?></td>
						<td><?php echo $record[$i]->nf;?></td>
						<td><?php echo $record[$i]->sm;?></td>
						<td>
							<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
							<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
						</td>
					</tr>
					<input type="hidden" id="db_table" value="fb_mrbd">
			<?php
				}
			?>
			<tr class="tr3">
				<td colspan=6><?php paginate();?></td>
			</tr>
		</table>	

	</body>
</html>