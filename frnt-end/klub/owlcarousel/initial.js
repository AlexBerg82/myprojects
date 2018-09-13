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
				//
				dots: true,
				navText : ["&lsaquo;","&rsaquo;"],
			},
			600: {
				items: 3,
				nav: true,
				//pagination: true,
				dots: true,
				navText: ["&lsaquo;","&rsaquo;"],
			}
		}
	});
});