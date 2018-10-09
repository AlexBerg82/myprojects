$(document).ready(function(){
 	$('.slide-one').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: false,
		responsive: {
			0: {
				items: 2,
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
				items: 4,
				nav: true,
				pagination: false,
				dots: false
			},
			1024: {
				items: 4,
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
		pagination: false,
		dots: false,
		responsive: {
			0: {
				items: 2,
				pagination: false,
				dots: false
			},
			480: {
				items: 3,
				pagination: false,
				dots: false
			},
			600: {
				items: 4,
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
				items: 6,
				nav: true,
				pagination: false,
				dots: false
			}
		}
	});
 	$('.slide-three').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: false,
		responsive: {
			0: {
				items: 1,
				nav: false,
				pagination: false,
				dots: false
			},
			480: {
				items: 1,
				nav: false,
				pagination: false,
				dots: false
			},
			600: {
				items: 1,
				nav: false,
				pagination: false,
				dots: false
			},
			768: {
				items: 2,
				nav: true,
				pagination: false,
				dots: false
			},
			1024: {
				items: 2,
				nav: true,
				pagination: false,
				dots: false
			}
		}
	});
 	$('.slide-four').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		nav: false,
		dots: false,
		responsive: {
			0: {
				items: 2,
				dots: true
			},
			480: {
				items: 3,
				dots: true
			},
			600: {
				items: 3,
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
 	$('.slide-five').owlCarousel({
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
				items: 4,
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
				items: 7,
				nav: true,
				pagination: false,
				dots: false
			}
		}
	});
 	$('.slide-six').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		pagination: false,
		dots: false,
		responsive: {
			0: {
				items: 1,
				pagination: false,
				dots: false
			},
			480: {
				items: 2,
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
				items: 1,
				nav: true,
				pagination: false,
				dots: false
			},
			1024: {
				items: 1,
				nav: true,
				pagination: false,
				dots: false
			}
		}
	});
});