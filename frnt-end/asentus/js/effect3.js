$(document).ready(function(){
	var h = $(window).height();
	$(window).scroll(function(){
		if (($(this).scrollTop()+h) >= $("#unit_ctlg").offset().top){
			$("#unit_ctlg .grid_ctlg").addClass('animated zoomIn');
		}
		if (($(this).scrollTop()+h) >= $("#unit_ctlg2").offset().top){
			$("#unit_ctlg2 .grid_ctlg").addClass('animated zoomIn');
		}
	});
});