/**
 * @author loong
 */
$(function(){
	$('#btn_submit').click(function(){
		if($('#new_password').val() != $('#re_new_password').val()){
			alert('新密码不一致，请重新输入');
			return false;
		}
	});
});