$(document).ready(function(){
 	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: true,
		dots: true,
		responsive: {
			0: {
				items: 2,
				nav: true,
				dots: true,
			},
			480: {
				items: 2,
				nav: true,
				dots: true,
			},
			600: {
				items: 3,
				nav: true,
				dots: true,
			},
			768: {
				items: 3,
				nav: true,
				dots: true,
			},
			1024: {
				items: 4,
				nav: true,
				dots: true,
			}
		}
	});
});