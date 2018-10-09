$(document).ready(function(){
	//mobile-menu
	var touch = $('#touch-menu');
	var menu = $('.sidebar');
	var book = $('.boking');
	var add = $('.add');
	
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.css('display','block');
	});

	$(window).resize(function(){
		var w = $(window).width();
		
		if(w > 599) {
			menu.removeAttr('style');
		}
	});
	
	
	$('.close-image').on('click', function(e) {
		e.preventDefault();
		menu.removeAttr('style');
		book.css('left','-36%').css('transition','1s');
		add.css('display','block');
	});
	$(menu).on('click', function(e){
		e.preventDefault();
		menu.removeAttr('style');
	});
	$(add).on('click', function(e){
		e.preventDefault();
		//book.removeAttr('style');
		book.css('left','-7%').css('transition','1s');
		add.removeAttr('style');
	});
});