$(document).ready(function(){
	var touch = $('#touch-menu');
	var menu = $('#main-nav');
	
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
		
		if(menu.is(':visible')){
			$(".search-input").slideUp(400);
		}
	});
	
	
	$("#poisk-btn").click(function(){
		menu.removeAttr('style');
		$(".search-input").slideToggle(400);
	});
	
	
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});


$(function() {
	$('#main-menu').smartmenus({
		subMenusSubOffsetX: 1,
		subMenusSubOffsetY: -8
	});
});