<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>		
		<?php 
			include "../frame.php";
			css_include_tag('install/index');
			
		?>
	</head>
	<body>
		<?php
			if (file_exists('../data/install.lock')){
				alert('系统已安装,如果要重新安装,请删除data目录下的install.lock文件,然后重试.');
				echo '<a href="">重试</a>';
				die();
			}			
		?>
		<div id="main">
			<div id="title">迅傲网站发布系统--安装</div>
			<div id="c_main">
				<div id="banner"><span>1:参数配置信息</span></div>
				<div>
					<form action="index.post.php" method="post">
						<table border="1" cellspacing="0">
							<tr>
								<th width="180">参数名称</th>
								<th width="400">参数值</th>
								<th width="220">参数说明</th>
							</tr>
							<tr>
								<td>
									<label for="site_name" style="width:200px;">网站名称</label>
								</td>
								<td>
									<input name="site_name" type="text" value="迅傲信息">
								</td>
								<td>您网站的名称</td>
							</tr>
							<tr>
								<td>
									<label for="site_name" style="width:200px;">数据库服务器</label>
								</td>
								<td>
									<input name="db_server_name" type="text" value="localhost">
								</td>
								<td>数据库服务器地址, 一般为localhost</td>
							</tr>	
							<tr>
								<td>
									数据库名称
								</td>
								<td>
									<input name="db_name" type="text" value="ceshi">
								</td>
								<td>
									数据库名称
								</td>
							</tr>	
							<tr>
								<td>
									数据库表前缀
								</td>
								<td>
									<input name="db_prex_name" type="text" value="cs_">
								</td>
								<td>
									系统表的前缀
								</td>
							</tr>	
							<tr>
								<td>
									数据库字符集
								</td>
								<td>
									<select name="db_charset">
										<option value="utf8">UTF8</option>	
										<option value="gbk">GBK</option>
									</select>
								</td>
								<td>
									数据库字符集
								</td>
							</tr>	
							<tr>
								<td>
									数据库登录名
								</td>
								<td>
									<input name="db_user_name" type="text" value="root">
								</td>
								<td>
									数据库账号用户名
								</td>
							</tr>	
							<tr>
								<td>
									数据库登录密码
								</td>
								<td>
									<input name="db_password" type="password" id="password">
								</td>
								<td>
									数据库账号密码
								</td>
							</tr>						
						</table>						
						<p>
							<input type="submit" value="确定">
						</p>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>