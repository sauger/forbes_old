<div id="news_comment">
	<div id="comment_top">
		<div id="top1">读者评论</div>
		<div id="top2">(共5条)</div>
		<button id="top3"></button>
		<a href="" id="top4">查看所有评论</a>
	</div>
	<div id="publish_comment" style="display:none;">
		<textarea id="comment_text"></textarea>
		<input type="radio" name="nick_name" value="hidden"><span>匿名</span>
		<input type="radio" name="nick_name" value="name"><span>昵称</span>
		<input type="text" checked="checked" value="<?php echo $_SESSION['name']?>" id="nick_name"></input>
		<button id="tijiao">提交</button>
	</div>
	<input id="newsid" type="hidden" value="<?php echo $id;?>">
	<?php for($i=0;$i<10;$i++){?>
	<div class="comment_box">
		<div class="name">dasfdasf</div>
		<div class="time">2009:11;22</div>
		<div class="support">
			<div class="up pointor">支持</div><div class="up_count">(0)</div>
			<div class="down pointor">反对</div><div class="down_count">(0)</div>
		</div>
		<div class="comment_content">
			啊谁哦符合的死哦发哈死哦好哦的话哦斯蒂芬三季度哦发送哦对哦哦对佛哦对佛哦发送到哦哦死啊谁哦符合的死哦发哈死哦好哦的话哦斯蒂芬三季度哦发送哦对哦哦对佛哦对佛哦发送到哦哦死啊谁哦符合的死哦发哈死哦好哦的话哦斯蒂芬三季度哦发送哦对哦哦对佛哦对佛哦发送到哦哦死
		</div>
	</div>
	<div class="comment_dash"></div>
	<?php }?>
</div>