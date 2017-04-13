$(document).ready(function(){
	//parallax
	$(function(){	
		function parallax(){
			var scrolled = $(window).scrollTop();
			$('.bg').css('top', -75+(scrolled * 0.2) + 'px');
		}
		$(window).scroll(function(){
			parallax();
		});
	});
	
	//фиксированный заголовок
	var tmpScrn = document.body.clientWidth;
	if(tmpScrn > 950){
	
		$(function(){
			var div = document.getElementById('wrp');
			window.addEventListener('scroll', raz, false);
			window.addEventListener('resize', raz, false);
			function raz(){
				var rect = div.getBoundingClientRect();
					if(rect.top <= 0){
						$('.top_menu').css('position', 'fixed');
						$('.top_menu').css('zIndex', 1000);
						$('.top_menu').css('top', 4);
						$('.top_menu').css('left', 0);
						$('.top_menu').css('background', '#E8E8E8');
						$('.top_menu').css('width', '100%');
						$('.top_menu').css('boxShadow', 'rgba(176,176,176,0.7) 0px 3px 4px 0px');
						$('.top_menu > ul').css('marginLeft', '5%');
						$('.cart').css('marginRight', '5%');
					} else {
						$('.top_menu').css('position', 'relative');
						$('.top_menu > ul').css('marginLeft', 0);
						$('.cart').css('marginRight', 0);
						$('.top_menu').css('boxShadow', 'none');
						$('.top_menu').css('background', '#fff');
						$('.top_menu').css('top', 0);
					}
				}
		});
		
	}
	
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

});