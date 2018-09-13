$(document).ready(function(){

	var menu = $('.bcg-block nav .menu');
	var menuk = $('.bcg-block nav .menu-klub');
	
	$('.mobile-menu').on('click', function(e) {
		e.preventDefault();
		
		var id = $(this).attr('id');
		if(id == 'touch-menu'){
			menuk.removeAttr('style');
			menu.slideToggle();
		}
		if(id == 'touch-menu-left'){
			menu.removeAttr('style');
			menuk.slideToggle();
		}
	});
		
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767) {
			menu.removeAttr('style');
			menuk.removeAttr('style');
		}
	});
	
	//fb
	$('.fb').mouseover(function(){
		$(this).addClass('animated rubberBand');
		$('.fb').mouseout(function(){
			$(this).removeClass('animated').removeClass('rubberBand');
		});
	});
	$('.stat').mouseover(function(){
		$(".stat").addClass('animated tada');
		$('.stat').mouseout(function(){
			$(this).removeClass('animated').removeClass('tada');
		});
	});

});