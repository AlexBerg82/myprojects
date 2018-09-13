$(document).ready(function(){
	//mobile-menu

 	var touch = $('#touch-menu');
	var menu = $('.wrapper-mobile-menu');
	
 	var touch2 = $('#touch-menu2');
	var menub = $('.wrapper-mobile-submenu');
	

	$(touch).on('click', function(e) {
		e.preventDefault();
		menub.removeAttr('style');
		menu.slideToggle(400);
	});
	$(touch2).on('click', function(e) {
		e.preventDefault();
		menu.removeAttr('style');
		menub.slideToggle(400);
	});
	

	$(window).resize(function(){
		var w = $(window).width();

		if(w > 479){
			menu.removeAttr('style');
			menub.removeAttr('style');
		}
	});
});