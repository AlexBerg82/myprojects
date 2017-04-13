$(function(){
    $("#slidebox").jCarouselLite({
        vertical: true,
        btnPrev: ".previous",
        btnNext: ".next",
        visible: 3,
		circular: true,
        speed:500
    });
	$('ul.tabs.first_tab li').click(function(){
		var thisClass = this.className.slice(0,2);
		$('div.t1').hide();
		$('div.t2').hide();
		$('div.t3').hide();
		$('div.' + thisClass).show();
		$('ul.tabs.first_tab li').removeClass('tab_active');
		$(this).addClass('tab_active');
	});
});