$(document).ready(function(){
	var touch = $('#touch-menu');
	var menu = $('#main-nav');
	
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var w = $(window).width();
		console.log(w);
		if(w > 750) {
			menu.removeAttr('style');
		}
	});
});