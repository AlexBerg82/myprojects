$(document).ready(function(){
 	$('.slide-one').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: false,
		responsive: {
			0: {
				items: 3,
				pagination: false,
				dots: false
			},
			480: {
				items: 3,
				pagination: false,
				dots: false
			},
			600: {
				items: 3,
				nav: true,
				pagination: false,
				dots: false
			},
			768: {
				items: 5,
				nav: true,
				pagination: false,
				dots: false
			},
			1024: {
				items: 5,
				nav: true,
				pagination: false,
				dots: false
			}
		}
	});
 	$('.slide-two').owlCarousel({
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
				items: 1,
				dots: true
			},
			600: {
				items: 1,
				dots: true
			},
			768: {
				items: 1,
				dots: true
			},
			1024: {
				items: 1,
				dots: true
			}
		}
	});
});