/**
 * @author loong
 */
$(function(){
	$('#div_tab').tabs({selected:0});
	$('.a_delete').click(function(e){
		e.preventDefault();
		if(confirm("删除后无法恢复，您确认要删除改记录吗？")){
			$.post('delete_rich_company.php',{'id':$(this).attr('href')},function(data){
				if(data){
					alert(data);
				}else{
					alert('ok');
					$(this).parent().parent().remove();
				}
			});
		}
	});
	$('#btn_add').click(function(){
		$('#company_filter').show();
		return false;
	});
	$('#btn_search').live('click',function(){
		$('#company_filter').load("filter_company.php?s_text=" + encodeURI($('#s_text').val()));
		return false;
	});
	$('.add_compay_info').live('click',function(){
		var str = '<tr class="tr4"><td>' + $(this).parent().parent().find('td:eq(0)').html()+'</td>'
				+ '<td>' + $(this).parent().parent().find('td:eq(1)').html()+'</td>'
				+ '<td><input type="text"  value="0"></input></td>'
				+ '<td>	<a href="#" class="a_delete_add"><img src="/images/btn_delete.png" border="0"></a>'
				+ '<input type="hidden" value="0"></input>'
				+ '<input type="hidden" value="'+ $(this).parent().parent().attr('id') +'"></input>'
				+ '</td></tr>';
		$('#table_rich').find('tr.tr3').before(str);
		return false;
	});
	$('a.a_delete_add').live('click',function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	});
	$('#btn_save').click(function(){
		var ids = new Array();
		$('#table_rich').find('.tr4').each(function(){
			ids.push($(this).find('input:eq(1)').val() +'|'+ $(this).find('input:eq(0)').val() +'|'+$(this).find('input:eq(2)').val());
		});
		$.post('edit_rich_company.post.php',{'params':ids.join(','),'rich_id':$('#id').val()},function(){
			location.reload();
		});
		return false;
	});
})