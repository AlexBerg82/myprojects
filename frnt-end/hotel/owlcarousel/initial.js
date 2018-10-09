$(document).ready(function(){
 	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: true,
		dots: false,
		responsive: {
			0: {
				items: 1,
				nav: false,
				dots: false,
			},
			480: {
				items: 2,
				nav: false,
				dots: false,
			},
			600: {
				items: 3,
				nav: false,
				dots: false,
			},
			768: {
				items: 3,
				nav: false,
				dots: false,
			},
			1024: {
				items: 4,
				nav: false,
				dots: false,
			}
		}
	});
});