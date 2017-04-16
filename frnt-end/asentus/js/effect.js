$(document).ready(function(){
	var h = $(window).height();
	$(window).scroll(function(){
		if (($(this).scrollTop()+h) >= $("#top_cat").offset().top){
			function func(){
				$("#top_cat .grid").eq(2).addClass('animated fadeInLeft');
				$("#bot_cat .grid").eq(2).addClass('animated fadeInLeft');
			}
			function func2(){
				$("#top_cat .grid").eq(1).addClass('animated fadeInLeft');
				$("#bot_cat .grid").eq(1).addClass('animated fadeInLeft');
			}
			function func3(){
				$("#top_cat .grid").eq(0).addClass('animated fadeInLeft');
				$("#bot_cat .grid").eq(0).addClass('animated fadeInLeft');
			}
			setTimeout(func, 1000);
			setTimeout(func2, 800);
			setTimeout(func3, 600);
		}
		
		if (($(this).scrollTop()+h) >= $("#unit_ctlg").offset().top){
			$("#unit_ctlg .grid_ctlg").addClass('animated zoomIn');
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