$(function(){
	$('.t1 > .text_t1').fadeIn(800);
	
	//переключение табов
	$('ul.top_menu.first_tab li').click(function(){
		var thisClass = this.className.slice(0,2);
		$('div.t1').hide();
		$('div.t2').hide();
		$('div.t3').hide();
		$('div.t4').hide();
		$('div.t5').hide();
		$('.text_t1').hide();
		$('.text_t2').hide();
		$('.text_t3').hide();
		$('.text_t4').hide();
		$('.text_t5').hide();
		$('footer').fadeIn(500);
		$('div.' + thisClass).show();
		
		$('ul.top_menu.first_tab li').removeClass('tab_active');
		$(this).addClass('tab_active');
		
		$('div.' + thisClass + ' > .text_t1').fadeIn(800);
		$('div.' + thisClass + ' > .text_t2').fadeIn(800);
		$('div.' + thisClass + ' > .text_t3').fadeIn(800);
		$('div.' + thisClass + ' > .text_t4').fadeIn(800);
		$('div.' + thisClass + ' > .text_t5').fadeIn(800);
	});
	//скрытие футера по нажатию кнопки КОНТАКТЫ
	$('ul.top_menu.first_tab li:last-child').click(function(){
		$('footer').fadeOut(500);
	});
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