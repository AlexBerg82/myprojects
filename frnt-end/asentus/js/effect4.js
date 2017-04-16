$(document).ready(function(){
	var h = $(window).height();
	$(window).scroll(function(){
		if (($(this).scrollTop()+h) >= $("#top_cat").offset().top){
			function func(){
				$("#top_cat .grid_faq").eq(1).addClass('animated fadeInLeft');
				$("#midd_cat .grid_faq").eq(1).addClass('animated fadeInLeft');
				$("#bot_cat .grid_faq").eq(1).addClass('animated fadeInLeft');
			}
			function func2(){
				$("#top_cat .grid_faq").eq(0).addClass('animated fadeInLeft');
				$("#midd_cat .grid_faq").eq(0).addClass('animated fadeInLeft');
				$("#bot_cat .grid_faq").eq(0).addClass('animated fadeInLeft');
			}
			setTimeout(func, 1000);
			setTimeout(func2, 800);
		}
	});
});