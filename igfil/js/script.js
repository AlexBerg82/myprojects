$(document).ready(function(){
	//parallax
	$(function(){
		function parallax(){
			var scrolled = $(window).scrollTop();
			$('.bg').css('top', -65+(scrolled * 0.2) + 'px');
			$('.bg2').css('top', -360+(scrolled * 0.1) + 'px');
		}
		$(window).scroll(function(){
			parallax();
		});
	});

});