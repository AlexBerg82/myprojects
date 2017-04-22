$(document).ready(function(){

	//заголовок
	$(window).scroll(function() {
		if ($(this).scrollTop() > 10){
			$('.top_head').css("background","#808080").css("transition","1s").css("borderBottom","1px solid #CFCFCF");
			$('.top_head').addClass("sticky");
		} else {
			$('.top_head').css("background","none");
			$('.top_head').removeClass("sticky").css("borderBottom","1px solid #fff");
		}
	});

		
	//кнопка наверх
	var top_show = 150;
	var delay = 1000;
	$(document).ready(function(){
		if($(this).scrollTop() > top_show){
			$('#top').fadeIn();
		}
		$(window).scroll(function (){
			if($(this).scrollTop() > top_show){
				$('#top').fadeIn();
			} else {
				$('#top').fadeOut();
			}
		});
		
		$('#top').click(function (){
			$('body, html').animate({scrollTop: 0}, delay);
		});
	});
	
	
	//верхнее меню
	var touch = $('#touch-menu');
	var menu = $('.menu');

	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	
});