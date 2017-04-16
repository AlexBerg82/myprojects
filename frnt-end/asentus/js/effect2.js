$(document).ready(function(){
	var h = $(window).height();
	$(window).scroll(function(){
		if (($(this).scrollTop()+h) >= $("#top_cat").offset().top){
			function func(){
				$("#top_cat .grid").eq(2).addClass('animated fadeInLeft');
				$("#bot_cat .grid").eq(2).addClass('animated fadeInLeft');
			}
			function func2(){
				$("#top_cat .grid").eq(1).addClass('animated fadeInLeft');
				$("#bot_cat .grid").eq(1).addClass('animated fadeInLeft');
			}
			function func3(){
				$("#top_cat .grid").eq(0).addClass('animated fadeInLeft');
				$("#bot_cat .grid").eq(0).addClass('animated fadeInLeft');
			}
			setTimeout(func, 1000);
			setTimeout(func2, 800);
			setTimeout(func3, 600);
		}
		
		if (($(this).scrollTop()+h) >= $("#unit_ctlg").offset().top){
			$("#unit_ctlg .grid_ctlg").addClass('animated zoomIn');
		}
	});
});