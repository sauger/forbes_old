/**
 * @author sauger
 */

function display_login(dom_id,admin){
	if(!dom_id){
		dom_id = 'login';
	}
	var str = '';
	if($.cookie('smg_user_nickname') == '' || !$.cookie('smg_user_nickname')){
		str = '<div id=welcome><a href="/login/register.php">注册</a>　<a href="/login/login.php">登录</a></div>';
	}else{
		var str = '';
		if(!admin){
			str = '<img src="/images/top/person.jpg">';
		}
		
		str +='<div id=welcome>欢迎您：<span style="font-weight:bold;">';
		str += $.cookie('smg_user_nickname') +'</span>';
		if (!admin) {
			str += '　<a href="/home/?uid=' + $.cookie('smg_uid') + '" target=_blank>番茄家园</a>';
		}		
			str += '　<a href="/blog/?' + $.cookie('smg_uid') + '" target=_blank>个人博客</a>';
		if($.cookie('smg_user_dept') == 7){
			str += '　<a href="/admin/admin.php">后台管理</a>';
		}else if($.cookie('smg_user_dept') > 0){
			str += '　<a href="/admin/admin2.php">后台管理</a>';
		}		
		str += '　<a href="/login/user.post.php?user_type=logout">退出</a></div>';
	}
	$('#' + dom_id).html(str);
}
