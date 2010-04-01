<?php 
	require_once('../frame.php');
	$id = intval($_POST['id']);
	$db = get_db();
	$count = $db->query("select count(id) as num from fb_comment where resource_id=$id");
	$count = $count[0]->num;
?>
	<div id="comment_top">
		<div id="top1">读者评论</div>
		<div id="top2">(共<?php echo $count;?>条)</div>
		<button id="top3"></button>
		<a href="comment_list.php?id=<?php echo $id;?>" id="top4">查看所有评论</a>
	</div>
	<div class="publish_comment" <?php if(isset($_SESSION['name'])){?>id='show_comment'<?php }?>>
		<textarea id="comment_text"></textarea>
		<input type="radio" name="nick_name" id="hid_name" value="hidden"><span>匿名</span>
		<input type="radio" checked="checked" id="has_name" name="nick_name" value="name"><span>昵称</span>
		<input type="text" value="<?php echo $_SESSION['name']?>" id="nick_name"></input>
		<button id="tijiao">提交</button>
	</div>
	<div class="publish_comment" <?php if(!isset($_SESSION['name'])){?>id='show_comment'<?php }?>>
		<div id="info">请先登录再发表评论</div>
		<span>用户名：</span><input type="text"  value="<?php echo $_SESSION['name']?>" id="user_name"></input>
		<span>密码：</span><input type="password" value="<?php echo $_SESSION['name']?>" id="password"></input>
		<button id="denglu">登录</button>
	</div>
	<?php 
		$sql = "select t1.nick_name,t1.created_at,t1.comment,t1.id,t2.up,t2.down from fb_comment t1 left join fb_comment_dig t2 on t1.id=t2.comment_id where t1.resource_id=$id order by t1.created_at desc limit 3";
		$comment = $db->query($sql);
		$count = $db->record_count;
		for($i=0;$i<$count;$i++){
	?>
	<div class="comment_box">
		<div class="name"><?php echo $comment[$i]->nick_name;?></div>
		<div class="time"><?php echo $comment[$i]->created_at;?></div>
		<div class="support">
			<div name='<?php echo $comment[$i]->id;?>' class="up pointor">支持(</div><div class="up_count"><?php if(!$comment[$i]->up){echo '0';}else{echo $comment[$i]->up;};?></div><div>)</div>
			<div name='<?php echo $comment[$i]->id;?>' class="down pointor">反对(</div><div class="down_count"><?php if(!$comment[$i]->down){echo '0';}else{echo $comment[$i]->down;};?></div><div>)</div>
		</div>
		<div class="comment_content">
			<?php echo $comment[$i]->comment;?>
		</div>
	</div>
	<div class="comment_dash"></div>
	<?php }?>
