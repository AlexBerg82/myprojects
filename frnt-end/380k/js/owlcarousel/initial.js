$(document).ready(function(){
 	$('.slide-one').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: true,
		responsive: {
			0: {
				items: 1,
				pagination: false,
				dots: true
			},
			480: {
				items: 2,
				pagination: false,
				dots: true
			},
			600: {
				items: 3,
				nav: true,
				pagination: false,
				dots: true
			},
			768: {
				items: 4,
				nav: true,
				pagination: false,
				dots: true
			},
			1024: {
				items: 4,
				nav: true,
				pagination: false,
				dots: true
			}
		}
	});
 	$('.slide-two').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: false,
		nav: false,
		responsive: {
			0: {
				items: 2,
				pagination: false,
				nav: false,
				dots: false
			},
			480: {
				items: 3,
				pagination: false,
				nav: false,
				dots: false
			},
			600: {
				items: 4,
				nav: true,
				pagination: false,
				nav: false,
				dots: false
			},
			768: {
				items: 4,
				nav: true,
				pagination: false,
				nav: false,
				dots: false
			},
			1024: {
				items: 6,
				nav: true,
				pagination: false,
				nav: false,
				dots: false
			}
		}
	});
 	$('.slide-three').owlCarousel({
		loop: true,
		items: 1,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: true,
		nav: false
	});
});