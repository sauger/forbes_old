/**
 * @author loong
 */
var field_index = 0;
$(function(){

	$('img.del_old').click(function(){
		var col = $(this).prev().val();
		$('form').append('<input type="hidden" name="del_columns[]" value="'+col+'"');
	});
	$('img.del_column').live('click',function(){
		$(this).parent().parent().remove();
	});	
	$('input:checkbox').live('change',function(){
		$(this).parent().find('input:checkbox').not($(this)).attr('checked',false);
	});
	$('#submit').click(function(){
		var id = $('#id').val();
		if(!id){
			if($('img.del_column').length <= 0){
				alert('请至少为榜单添加一个列');
				return false;
			};
		}
		return true;
	});
	$('#add_attribute').click(function(){
		field_index = field_index + 1;
		var str = '		<tr class="tr4">'
			+'<td width="130">列名</td>'
			+'<td width="695" align="left">'
			+'	<input type="text" name="new_columns[' + field_index +'][comment]"  class="required">'
			+'	<select name="new_columns[' + field_index +'][type]">'
			+'		<option value="varchar(255)">字符串</option>'
			+'		<option value="int(11)">整数</option>'
			+'		<option value="float">浮点数</option>'
			+'		<option value="text">长字符串</option>'
			+'	</select>'
			+'	<input name="new_columns[' + field_index +'][key]" value="MUL" type="checkbox"></input>排序'
			+'	<input name="new_columns[' + field_index +'][key]" value="UNI"  type="checkbox"></input>唯一'　　
			+'	<img alt="删除" title="删除" src="/images/btn_delete.png" style="cursor:pointer;" class="del_column">'
			+'</td>'
			+'</tr>';
		$('tr.tr4:last').after(str);
	});
});