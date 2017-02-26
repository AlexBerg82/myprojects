$(document).ready(function(){
	//parallax
	$(function(){	
		function parallax(){
			var scrolled = $(window).scrollTop();
			$('.bg').css('top', -75+(scrolled * 0.2) + 'px');
			$('.bg2').css('top', -360+(scrolled * 0.1) + 'px');
		}
		$(window).scroll(function(){
			parallax();
		});
	});
	

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
						$('.top_menu > ul').css('marginLeft', '5%');
						$('.cart').css('marginRight', '5%');
					} else {
						$('.top_menu').css('position', 'relative');
						$('.top_menu > ul').css('marginLeft', 0);
						$('.cart').css('marginRight', 0);
						$('.top_menu').css('background', '#fff');
						$('.top_menu').css('top', 0);
					}
				}
		});
		
	}
	
});