jQuery(window).scroll(function(){
    var $sections = $('section');
	$sections.each(function(i,el){
        var top  = $(el).offset().top-100;
        var bottom = top +$(el).height();
        var scroll = $(window).scrollTop();
        var id = $(el).attr('id');
    	if( scroll > top && scroll < bottom){
            $('a.active').removeClass('active');
			$('a[href="#'+id+'"]').addClass('active');

        }
    })
 });

$(document).ready(function(){
	$("#anchors").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top-50;
        $('body,html').animate({scrollTop: top}, 800);
    });

	$("#anchorsfix").on("click","a", function (event){
        event.preventDefault();
        $('.view-menu-mobile').slideToggle(200);
        var id  = $(this).attr('href'),
            top = $(id).offset().top-50;
        $('body,html').animate({scrollTop: top}, 800);
    });
	
	
	
	


	//fix header
	$(window).scroll(function(){
		if($(this).scrollTop() > 400){
			$('#anchors').css("backgroundColor","#000").css("width","1000px").css("position","fixed").css("top","0").css("margins","0 auto").css("zIndex","1000");
			$('#anchors span').css("backgroundColor","#aaa").css("height","30px").css("marginTop","10px");
			
			
			$('#touch-view-menu').css("max-width","1000px").css("position","fixed").css("top","0").css("margins","0 auto").css("zIndex","1000");
			
			$('#anchors').addClass("sticky");
			$('#touch-view-menu').addClass("sticky");
		} else {
			$('#anchors span').css("backgroundColor","#fff");
			$('#anchors').css("position","relative");
			
			$('#touch-view-menu').css("position","relative");
		}
	});
	
	

	
	
	//mobile-menu
	var touch = $('#touch-menu');
	var menu = $('.menu-mobile');
	
	var touchfix = $('#touch-view-menu');
	var menufix = $('.view-menu-mobile');
	
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle(400);
	});
	$(touchfix).on('click', function(e) {
		e.preventDefault();
		menufix.slideToggle(400);
	});

	$(window).resize(function(){
		var w = $(window).width();
		var wf = $(window).width();
		
		if(w > 479) {
			menu.removeAttr('style');
		}
		if(wf > 599) {
			menufix.removeAttr('style');
		}
	});

});