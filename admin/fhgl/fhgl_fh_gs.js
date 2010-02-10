$(function(){
	$("#gs_add").click(function(){
			window.location.href="fhgl.fh_gs.php?xm="+encodeURI($("#fh_xm").attr('value'))+"&mc="+$("#gsmc").attr('value')+"&id="+$("#id").attr('value');
		});
})