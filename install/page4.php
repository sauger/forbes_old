		  <div id=title>安装完成</div>
			<div id=content>
					<div class=c><div class="c_l">网站名称</div><div class="c_c1"><?php echo $site_name;?></div></div>
					<div class=c><div class="c_l">数据库服务器</div><div class="c_c1"><?php echo $db_server_name;?></div></div>
					<div class=c><div class="c_l">数据库名称</div><div class="c_c1"><?php echo $db_database_name;?></div></div>
					<div class=c><div class="c_l">数据库表前缀</div><div class="c_c1"><?php echo $table_prex;?></div></div>
					<div class=c><div class="c_l">数据库字符集</div><div class="c_c1"><?php echo $db_code;?></div></div>
					<div class=c><div style="width:100%;text-align:center;margin-top:20px;font-size:15px;">超级管理员用户为:<span style="color:red">admin</span> 密码:<span style="color:red">admin</span> <b>请及时更改超级管理员密码</b></div></div>					
					
			</div>
			<?php
			$can_next = true;
			?>
			<script>
				$(function(){
					$('#btn_next').html('　完　成　');
				});
			</script>