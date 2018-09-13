$(document).ready(function(){
	//flo
	setTimeout(function(){
		$('.flo').css('opacity','1').css('transition','3s');
	}, 30);
	//three
	setTimeout(function(){
		$('.three').css('opacity','1').css('transition','3s');
	}, 1000);
	//sov
	setTimeout(function(){
		$('.sov').css('opacity','1').css('transition','3s');
	}, 1500);

	//zlob
	setTimeout(function(){
		$(".zlob").addClass('animated flipInX').css('opacity','1');
	}, 1000);
	//opik
	setTimeout(function(){
		$(".opik").addClass('animated flipInX').css('opacity','1');
	}, 1500);

	//images top menu
	setTimeout(function(){
		$(".image-left").css('opacity','1').css('transition','1s');
	}, 1800);
	setTimeout(function(){
		$(".image-right").css('opacity','1').css('transition','1s');
	}, 1800);

	
	//hover header
	setTimeout(function(){
		$(".ele").addClass('hover-stop-ele');
		$(".sov").addClass('hover-stop-sov');
	}, 3100);
	setTimeout(function(){
		$(".bee").addClass('hover-stop-bee');
	}, 1600);
	setTimeout(function(){
		$(".gip").addClass('hover-stop-gip');
	}, 4600);
	setTimeout(function(){
		$(".rab").addClass('hover-stop-rab');
	}, 2600);
	
	
	
	
	
	//footer
	$(document).ready(function(){
		var h = $(window).height();
		$(window).scroll(function(){
			if(($(this).scrollTop()+h) >= $(".animate").offset().top){
				$(".animate").addClass('animated fadeIn');
				
				$(".dog").addClass('dog-eff');
				$(".fox").addClass('fox-eff');
				//hover
				setTimeout(function(){
					$(".dog").addClass('hover-stop-dog');
					$(".fox").addClass('hover-stop-fox');
				}, 3700);
				//hover
				$(".rabbl").addClass('rabbl-eff');
				setTimeout(function(){
					$(".rabbl").addClass('hover-stop-rabbl');
				}, 2600);
				//hover
				$(".turt").addClass('turt-eff');
				setTimeout(function(){
					$(".turt").addClass('hover-stop-turt');
				}, 5100);
			}
		});
	});
});