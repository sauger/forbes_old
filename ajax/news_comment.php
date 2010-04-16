<?php 
	require_once('../frame.php');
	$id = intval($_POST['id']);
	$comment_id = intval($_POST['comment_id']);
	$db = get_db();
	$count = $db->query("select count(id) as num from fb_comment where is_approve=1 and resource_id=$id");
	$count = $count[0]->num;
	$filte_words = $db->query("select text as words from fb_filte_words");
	$f_count = $db->record_count;
	if($db->move_first()){
		do{
			$content = str_replace($db->field_by_name('words'),'****',$content);
		}while($db->move_next());

	}
?>
	<div id=comment_caption>
		<div id=comment_title>读者评论</div>
		<div id=comment_count>(共<?php echo $count;?>条)</div>
		<button id=comment_btn></button>
		<a href="comment_list.php?id=<?php echo $id;?>" id=comment_more>查看所有评论</a>
	</div>
	
	<?php if($comment_id!=-1){?>
	<div class=publish_comment id='show_comment'>
		<textarea id=comment_text></textarea>
		<input type="radio" name="nick_name" <?php if(!isset($_SESSION['name'])){?>checked="checked"<?php }?> id=hid_name value="hidden"><span>匿名</span>
		<?php if(isset($_SESSION['name'])){?><input type="radio" checked="checked" id=has_name name="nick_name" value="name"><span>昵称</span>
		<input type="text" value="<?php echo $_SESSION['name']?>" id=nick_name></input><?php }?>
		<button id=commit_submit>提交</button>
		<?php if(!isset($_SESSION['name'])){?>
		<div id="login_info" style="margin-top:10px;">
		<span>用户名：</span><input type="text"  value="<?php echo $_SESSION['name']?>" id=user_name></input>
		<span>密码：</span><input type="password" value="<?php echo $_SESSION['name']?>" id=password></input>
		<button id=comment_login>登录</button></div><?php }?>
	</div>
	<?php }else{?>
	<div class=publish_comment id='show_comment' style="display:inline">
		<textarea id=comment_text></textarea>
		<input type="radio" name="nick_name" id=hid_name value="hidden"><span>匿名</span>
		<input type="radio" checked="checked" id=has_name name="nick_name" value="name"><span>昵称</span>
		<input type="text" value="<?php echo $_SESSION['name']?>" id=nick_name></input>
		<button id=commit_submit>提交</button>
	</div>
	<?php }?>
	
	
	<?php
		if(empty($comment_id)){
			$sql = "select t1.nick_name,t1.created_at,t1.comment,t1.id,t2.up,t2.down from fb_comment t1 left join fb_comment_dig t2 on t1.id=t2.comment_id where t1.resource_id=$id and is_approve=1 order by t1.created_at desc limit 3";
		}else{
			$sql = "select t1.nick_name,t1.created_at,t1.comment,t1.id,t2.up,t2.down from fb_comment t1 left join fb_comment_dig t2 on t1.id=t2.comment_id where t1.resource_id=$id and is_approve=1 or t1.id=$comment_id order by t1.created_at desc limit 3";
		}
		
		$comment = $db->query($sql);
		$count = $db->record_count;
		for($i=0;$i<$count;$i++){
	?>
	<div class=comment_box>
		<div class=name><?php echo $comment[$i]->nick_name;?></div>
		<div class=time><?php echo $comment[$i]->created_at;?></div>
		<div class=support>
			<div name='<?php echo $comment[$i]->id;?>' class="up pointor">支持(</div><div class="up_count"><?php if(!$comment[$i]->up){echo '0';}else{echo $comment[$i]->up;};?></div><div>)</div>
			<div name='<?php echo $comment[$i]->id;?>' class="down pointor">反对(</div><div class="down_count"><?php if(!$comment[$i]->down){echo '0';}else{echo $comment[$i]->down;};?></div><div>)</div>
		</div>
		<div class=comment_content>
			<?php
				$content = $comment[$i]->comment;
				for($j=0;$j<$f_count;$j++){
					$content = str_replace($filte_words[$j]->words,'****',$content);
				}
				echo $content;
			?>
		</div>
	</div>
	<?php }?>
