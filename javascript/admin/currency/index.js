/**
 * @author loong
 */
$(function(){
	$('.tr3  input:first-child').focus(function(){
		$(this).data('value',$(this).val());
	}).blur(function(){
		if($(this).val() != $(this).data('value')){
			$.post('edit.post.php',{'id':$(this).parent().parent().attr('id'),'val':$(this).val()},function(data){
				if(data){
					alert(data);
				}
				
			})
		}
	});
});