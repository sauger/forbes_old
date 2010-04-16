<table width="795" border="0" id="list">
		<tr class="tr2">
			<td width="150">留言人</td><td width="100">IP</td><td width="350">留言内容</td><td width="150">留言时间</td><td width="150">操作</td>
		</tr>
		<?php
			$comment = new table_class("fb_comment");
			$record = $comment->paginate("all", $conditions ,30);
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
				if($record[$i]->is_approve){
					$str = "<a class='unapprove' name='{$record[$i]->id}'>";
				}else{
					$str = "";
				}
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->nick_name;?></td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><?php echo $record[$i]->comment;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><a class="del_comment" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer">删除</a></td>
				</tr>
		<?php
			}
		?>
	</table>