$(function(){
	$('.text').fadeIn(700);
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