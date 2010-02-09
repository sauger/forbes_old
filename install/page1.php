			<?php
			if(file_exists('../data/install.lock')){  ?>
			<div id=title></div>
			<div id=content>
				<span style="color:red">系统检测已经安装过本软件.请删除data目录下install.lock后再安装</span>
			</div>
			<?php	
			}else{ ?>
			<div id=title>安装协议</div>
			<div id=content>欢迎使用迅傲网站内容发布系统软件产品。以下所述条款和条件即构成您与迅傲就使用许可所达成的协议（以下简称“本协议”）。一旦您下载安装使用了百度Hi，即表示您已接受了本协议。如果您不同意接受全部的条款和条件，那么您将无权使用本软件。迅傲有权随时修改本协议，只需公示于迅傲网站（http://xun-ao.com）以及相关页面等，而无需征得您的事先同意。修改后的条款于公示之时生效。在迅傲修改协议条款后，如果您不接受修改后的条款，请您立即停止使用本软件，您继续使用本软件将被视为您已接受了修改后的条款。<br>
				<br><br><br>
				第一条	定义<br>
				1.迅傲信息发布系统：是一款	快速搭建网站和内容管理系统。<br>
				2.“用户”或“您”：可以通过该软件快速的建设一个基于LAMP<br>
				<br><br>
				第二条	用户的权利与义务<br>
				1.用户可以免费获得并使用该软件<br>
				2.用户可以任意修改该软件。
			</div>
			<div id=r_b><input type="checkbox" name="agree" id="agree" value="1"><label for="agree">我同意以上协议</label></div>				
			<?php
			}
			?>
			