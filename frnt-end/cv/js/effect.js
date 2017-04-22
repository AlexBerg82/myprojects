$(document).ready(function(){
	var h = $(window).height();
	$(window).scroll(function(){
		if (($(this).scrollTop()+h) >= $("#top_about").offset().top){
			function func(){
				$("#top_about .grid").eq(2).addClass('animated fadeInLeft');
			}
			function func2(){
				$("#top_about .grid").eq(1).addClass('animated fadeInLeft');
			}
			function func3(){
				$("#top_about .grid").eq(0).addClass('animated fadeInLeft');
			}
			function func4(){
				$("#bot_about .grid").eq(2).addClass('animated fadeInLeft');
			}
			function func5(){
				$("#bot_about .grid").eq(1).addClass('animated fadeInLeft');
			}
			function func6(){
				$("#bot_about .grid").eq(0).addClass('animated fadeInLeft');
			}
			
			setTimeout(func, 500);
			setTimeout(func2, 600);
			setTimeout(func3, 700);
			setTimeout(func4, 800);
			setTimeout(func5, 900);
			setTimeout(func6, 1000);
		}

		if (($(this).scrollTop()+h) >= $("#masonry_grid").offset().top){
			function itemShow(){$("#masonry_grid .item_msn").eq(0).addClass('animated fadeInUp');}
			function itemShow2(){$("#masonry_grid .item_msn").eq(1).addClass('animated fadeInUp');}
			function itemShow3(){$("#masonry_grid .item_msn").eq(2).addClass('animated fadeInUp');}
			function itemShow4(){$("#masonry_grid .item_msn").eq(3).addClass('animated fadeInUp');}
			function itemShow5(){$("#masonry_grid .item_msn").eq(4).addClass('animated fadeInUp');}
			setTimeout(itemShow, 600);
			setTimeout(itemShow2, 700);
			setTimeout(itemShow3, 800);
			setTimeout(itemShow4, 900);
			setTimeout(itemShow5, 1000);
		}
	});
});