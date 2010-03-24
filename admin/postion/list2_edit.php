 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/position/list_list');
	?>
</head>

<body>
	<?php
		function list_type($type){
			$type = intval($type);
			switch ($type) {
				case 1:
					return "自定义榜单";
				break;
				case 2:
					return "年度富豪榜";
				break;
				case 3:
					return "年度名人榜";
				break;
				case 4:
					return "图片榜单";
				break;
				case 5:
					return "专题榜单";
				break;			
				default:
					;
				break;
			}
		}
		$is_adopt = $_REQUEST['adopt'];
		$list= new table_class('fb_custom_list_type');
		$conditions = array();
		if($_REQUEST['s_text']){
			$conditions[] = "name like '%{$_REQUEST['s_text']}%'";
		} 
		if($_REQUEST['s_list_type']){
			$conditions[]= "list_type={$_REQUEST['s_list_type']}";			
		}
		$db = get_db();
		$news = $db->query("select * from fb_position_relation where type='list' and position_id=$id");
		$news_count = count($news);
		$ids = $news[0]->news_id;
		for($i=1;$i<$news_count;$i++){
			$ids.=','.$news[$i]->news_id;
		}
		
		if($is_adopt==1){
			if($ids!=''){
				$conditions[]= "id in ($ids)";
			}else{
				$conditions[]= "id is null";
			}
			
		}elseif($is_adopt=='0'){
			if($ids!=''){
				$conditions[]= "id not in ($ids)";
			}
		}
		if($_REQUEST['s_list_position']){
			$conditions[]= "position={$_REQUEST['s_list_position']}";
		}
		if($conditions){
			$conditions = array('conditions' => implode(' and ', $conditions));
		}
		$order = ' priority asc, created_at desc';
		$conditions['order'] = $order;
		$record = $list->paginate("all",$conditions);
		$count = count($record);
	?>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">
				　自定义榜单<a href="index.php"><img src="/images/btn_back.png" border=0></a>   搜索　
				 <input id="s_text" type="text" value="<? echo $_REQUEST['s_text'];?>">
				 <select id="s_list_type">
				 	<option value="-1">榜单类型</option>
				 	<option value="1">自定义类型</option>
				 	<option value="2">年度富豪榜</option>
				 	<option value="3">年度名人榜</option>
					<option value="4">图片榜单</option>
					<option value="5">专题榜单</option>
				 </select>
				 <?php if($_REQUEST['s_list_type'])?>
				 	<script type="text/javascript">$('#s_list_type').val('<?php echo $_REQUEST['s_list_type'];?>');</script>
				 <?php ?>
				 <select id=adopt name="adopt" style="width:90px" class="sau_search">
					<option value="">加入状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已加入</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未加入</option>
				</select>
				 <input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="300">榜单名称</td><td width="200">榜单类型</td><td width="295">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="#"> <?php echo $record[$i]->name;?></a></td>
					<td>
						<?php echo list_type($record[$i]->list_type);?>
					</td>
					<td>
						<?php 
							$rate_flag = false;
							for($j=0;$j<$news_count;$j++){
								if($record[$i]->id==$news[$j]->news_id){ $rate_flag=true;?>
								<span style="cursor:pointer" class="revocation" name="<?php echo $news[$j]->id;?>" title="删除"><img src='/images/btn_delete.png' border='0'></span>
								<input type="text" class="priority"  name="<?php echo $news[$j]->id;?>"  value="<?php echo $news[$j]->priority;?>" style="width:40px;">
								<?php break;}?>
						<?php }
							if(!$rate_flag){
						?>
						<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="加入"><img src='/images/btn_add.png' border='0'></span>
						<?php }?>
					</td>
				</tr>
		<?php
			}
		?>
			<tr class="tr3">
				<td colspan=6><?php paginate();?>　<button id=edit_priority>编辑优先级</button><input type="hidden" id="list_id" value="<?php echo $id?>"></td>
			</tr>
		</table>	

	</body>
</html>