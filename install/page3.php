			<?php
				$site_name = empty($_REQUEST['site_name']) ? '迅傲信息' : $_REQUEST['site_name'];
				$db_server_name = empty($_REQUEST['db_server_name']) ? 'localhost' : $_REQUEST['db_server_name'];
				$db_name = empty($_REQUEST['db_name']) ? 'ceshi' : $_REQUEST['db_name'];
				$db_prex_name = empty($_REQUEST['db_prex_name']) ? 'cs_' : $_REQUEST['db_prex_name'];
				$db_charset = empty($_REQUEST['db_charset']) ? 'utf8' : $_REQUEST['db_charset'];
				$db_user_name = empty($_REQUEST['db_user_name']) ? 'root' : $_REQUEST['db_user_name'];
				$db_password = empty($_REQUEST['db_password']) ? '' : $_REQUEST['db_password'];
			?>
			<div id=title>系统参数配置</div>
			<div id=content>
				<form name="config_form" id="config_form" action="index.post.php" method="post">
					<div class=c><div class="c_l">网站名称</div><div class="c_c"><input type="text" name="site_name" value="<?php echo $site_name;?>"></div><div class="c_r">您网站的名称</div></div>
					<div class=c><div class="c_l">数据库服务器</div><div class="c_c"><input name="db_server_name" type="text" value="<?php echo $db_server_name;?>"></div><div class="c_r">数据库服务器地址</div></div>
					<div class=c><div class="c_l">数据库名称</div><div class="c_c"><input name="db_name" type="text" value="<?php echo $db_name;?>"></div><div class="c_r">您数据库的名称</div></div>
					<div class=c><div class="c_l">数据库表前缀</div><div class="c_c"><input name="db_prex_name" type="text" value="<?php echo $db_prex_name;?>"></div><div class="c_r">您数据库的表前缀</div></div>
					<div class=c><div class="c_l">数据库字符集</div><div class="c_c"><select name="db_charset">
											<option value="utf8">UTF8</option>	
											<option value="gbk" <?php if ($db_charset == 'gbk') echo "selected='selected'"; ?>>GBK</option>
										</select></div><div class="c_r">您数据库的字符集</div></div>
					<div class=c><div class="c_l">数据库登陆名</div><div class="c_c"><input name="db_user_name" type="text" value="<?php echo $db_user_name;?>"></div><div class="c_r">您数据库的登陆名</div></div>
					<div class=c><div class="c_l">数据库登陆密码</div><div class="c_c"><input name="db_password" type="password" id="db_password" value=""></div><div class="c_r">您数据库的登陆密码</div></div>
					<div id="split"></div>
				</form>
			</div>
			<script>
				$("input:text[value=''],input:password[value='']").keydown(function(){
					//alert($("input:text[value=''],input:password[value='']").size());
					check_valid();
				});
				$(function(){
					check_valid();
				});
				function check_valid(){
					//alert($("input:text[value=''],input:password[value='']").size());
					if($("input:text[value=''],input:password[value='']").size() == 0){
						$('#btn_next').attr('disabled',false);
					}else{
						$('#btn_next').attr('disabled',true);
					}					
				}
			</script>