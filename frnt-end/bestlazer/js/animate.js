$(document).ready(function(){
	new WOW().init();
	
	
	//top menu
	/*setTimeout(function(){
		$('.top-menu > .sm > li:nth-child(1)').addClass('animated bounceInRight').css('opacity','1').css('transition','1s');
	}, 1100);
	setTimeout(function(){
		$('.top-menu > .sm > li:nth-child(2)').addClass('animated bounceInRight').css('opacity','1').css('transition','1s');
	}, 900);
	setTimeout(function(){
		$('.top-menu > .sm > li:nth-child(3)').addClass('animated bounceInRight').css('opacity','1').css('transition','1s');
	}, 700);
	setTimeout(function(){
		$('.top-menu > .sm > li:nth-child(4)').addClass('animated bounceInRight').css('opacity','1').css('transition','1s');
	}, 500);
	setTimeout(function(){
		$('.top-menu > .sm > li:nth-child(5)').addClass('animated bounceInRight').css('opacity','1').css('transition','1s');
	}, 300);
	setTimeout(function(){
		$('.top-menu > .sm > li:nth-child(6)').addClass('animated bounceInRight').css('opacity','1').css('transition','1s');
	}, 100);*/

	
	//nav slider
	$('.slick-dots li:nth-child(1)').addClass('animated zoomIn').css('transition','2s');
	$('.slick-dots li:nth-child(2)').addClass('animated zoomIn').css('transition','2s');
	$('.slick-dots li:nth-child(3)').addClass('animated zoomIn').css('transition','2s');

	
	//nav button
	$(".prev-btn").addClass('animated bounceInLeft').css('transition','3s');
	$(".next-btn").addClass('animated bounceInRight').css('transition','3s');
	
	
	//more block of baner
	setTimeout(function(){
		$('.more').addClass('animated zoomIn').css('opacity','1').css('transition','1s').removeClass('animated zoomIn');
	}, 500);
});