$(function(){
	
	$("#submit").click(function(){
		if($("#upfile").val()!=''){
			var upfile1 = $("#upfile").val();
			var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
			if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
				alert("上传图片类型错误");
				return false;
			}
		}else{
			if($("#id").val()==''){
				alert("请上传一个图片!");
				return false;
			}
		}
	});
	
	$(".colorbox").colorbox({
		onComplete:function(){
			$("#colorbox").css('top','80px');
			$("#colorbox").css('left','80px');
		}
	});
});
