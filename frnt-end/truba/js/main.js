$(document).ready(function(){
	//mobile-menu
 	var touch = $('#touch-menu');
	var menu = $('.mobile-menu');

	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle(400);
	});

	$(window).resize(function(){
		var w = $(window).width();

		if(w > 479) {
			menu.removeAttr('style');
		}
	});
});