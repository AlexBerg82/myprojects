$(document).ready(function(){
	var date = new Date();
	$('.arrive > p > span').append(date.getDate());
	$('.depart > p > span').append(date.getDate() + 1);
	
	
	
	setTimeout(function(){
		$(".arrive").addClass('animated bounceInDown').css('opacity','1');
	}, 800);
	setTimeout(function(){
		$(".depart").addClass('animated bounceInDown').css('opacity','1');
	}, 1200);
	
	setTimeout(function(){
		$(".reserve").addClass('animated bounceInLeft').css('opacity','1');
	}, 1500);
	setTimeout(function(){
		$(".rooms").addClass('animated bounceInLeft').css('opacity','1');
	}, 1800);
});