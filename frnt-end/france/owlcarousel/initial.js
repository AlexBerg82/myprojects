$(document).ready(function(){
 	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: true,
		dots: true,
		responsive: {
			0: {
				items: 1,
				dots: true
			},
			480: {
				items: 2,
				dots: true
			},
			600: {
				items: 2,
				dots: true
			},
			768: {
				items: 3,
				dots: true
			},
			1024: {
				items: 3,
				dots: true
			}
		}
	});
});