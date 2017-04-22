$(document).ready(function(){

		
		$(window).scroll(function() {
			if ($(this).scrollTop() > 10){
				$('.top_head').css("background","#F8F8FF").css("transition","1s").css("borderBottom","1px solid #CFCFCF");
				$('.top_head').addClass("sticky");
			} else {
				$('.top_head').css("background","none");
				$('.top_head').removeClass("sticky").css("borderBottom","1px solid #fff");
			}
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
	
});