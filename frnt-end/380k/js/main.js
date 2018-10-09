$(document).ready(function(){
	//search
	var srch = $('.search');
	var fs = $('.mn-search');
	
	$(srch).on('click', function(e) {
		e.preventDefault();
		fs.slideToggle(200);
	});
	
	
	
	//mobile-menu
	var touch = $('#touch-menu');
	var menu = $('.menu');
	
	$(touch).on('click', function(e){
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var w = $(window).width();
		
		if(w > 599){
			menu.removeAttr('style');
		}
	});
});






$(document).ready(function(){
  function ModalWindow(box_modal, href_modal, openFon, closeFon, openWindow, closeWindow){
    function openModal(){
      $(box_modal).removeClass("box_hide").addClass('oneScreen');
      $(box_modal+" .fon_black").removeClass(closeFon).addClass(openFon);
      $(box_modal+" .window").removeClass(closeWindow).addClass(openWindow);
    }
    function closeModal(){
      $(box_modal+" .fon_black").removeClass(openFon).addClass(closeFon);
      $(box_modal+" .window").removeClass(openWindow).addClass(closeWindow);
      setTimeout(function(){
        $(box_modal).addClass("box_hide").removeClass('oneScreen');
      }, 800);
    }
    $(href_modal).click(openModal);
    $(box_modal+" .fon_black, .close_window").click(closeModal);
  }

  ModalWindow(
      "#modal_phone",
      "#href-modalPhone",
      "fadeIn",
      "fadeOut",
      "bounceInDown",
      "bounceOutDown"
  );

  ModalWindow(
      "#modal_window",
      ".zakaz-tel",
      "fadeIn",
      "fadeOut",
      "bounceInDown",
      "bounceOutDown"
  );
});