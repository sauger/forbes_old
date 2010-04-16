<table cellspacing="1">
		<tr class="itable_title">
			<td width="8%">留言人</td><td width="10%">IP</td><td width="15%">标题</td><td width="%10">新闻类别</td><td width="30%">留言内容</td><td width="12%">留言时间</td><td width="5%">操作</td>
		</tr>
		<?php
			$comment = new table_class("fb_comment");
			$record = $comment->paginate("all", $conditions ,30);
			$category = new category_class('news');
			$db = get_db();
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
				$db->query("select short_title,category_id from fb_news where id={$record[$i]->resource_id}");
				if($db->move_first()){
					$cat = implode('=>',$category->tree_map_name($db->field_by_name('category_id')));
					$title = $db->field_by_index(0);
				}
				
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td>
						<?php echo $record[$i]->nick_name;?>
					</td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><?php echo $title;?></td>		
					<td><?php echo $cat;?></td>
					<td>
						<a href="#" class="colorbox" style="color:blue;"><?php echo mb_substr($record[$i]->comment,0,50,'utf-8');?></a>
						<input type="hidden" id="hidden_comment" value="<?php echo $record[$i]->comment;?>" />
					</td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td>
						<?php
							if($record[$i]->is_approve=="1"){?>
						<span style="cursor:pointer" class="unapprove" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/btn_apply.png" border="0"></span>
						<?php }?>
						<?php	if($record[$i]->is_approve=="0"){?>
						<span style="cursor:pointer" class="approve" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/btn_unapply.png" border="0"></span>
						<?php }?>				
						<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/btn_delete.png" border="0"></span>
					</td>
				</tr>

			<?php }?>
			<tr class="btools">
				<td colspan=10>
					<?php paginate("",null,"page",true);?>
				</td>
			</tr>
	</table>