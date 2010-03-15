<?php
if($_POST['rvcode'] != $_SESSION['register_pic']){
	echo '0';
}else{
	echo '1';
}