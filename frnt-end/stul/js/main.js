$(function() {
	$('#main-menu').smartmenus({
		subMenusSubOffsetX: 1,
		subMenusSubOffsetY: -8
	});
});

$(function() {
	$('#main-menu2').smartmenus({
		subMenusSubOffsetX: 1,
		subMenusSubOffsetY: -8
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






$(document).ready(function(){
	//mobile-menu
	var touch = $('#trigger2');
	var menu = $('.mobile-menu .sm-blue');
	
	var touchl = $('#trigger');
	var menul = $('.mobile-menu .accordeon');
	
	$(touch).on('click', function(e){
		e.preventDefault();
		menul.removeAttr('style');
		menu.slideToggle();
	});
	$(touchl).on('click', function(e){
		e.preventDefault();
		menu.removeAttr('style');
		menul.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		
		if(w > 599){
			menu.removeAttr('style');
			menul.removeAttr('style');
		}
	});
});