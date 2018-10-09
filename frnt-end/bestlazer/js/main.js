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
	var touch = $('#trigger');
	var menu = $('.sm-blue');
	
	var touch2 = $('#trigger2');
	var menu2 = $('.top-menu .accordeon');
	
	$(touch).on('click', function(e){
		e.preventDefault();
		menu2.removeAttr('style');
		menu.slideToggle();
	});
	$(touch2).on('click', function(e){
		e.preventDefault();
		menu.removeAttr('style');
		menu2.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		
		if(w > 767){
			menu.removeAttr('style');
			menu2.removeAttr('style');
		}
	});
});




	$(function(){
    var wrapper = $( ".file_upload" ),
        inp = wrapper.find( "input" ),
        btn = wrapper.find( "button" ),
        lbl = wrapper.find( "div" );

    btn.focus(function(){
        inp.focus()
    });
    // Crutches for the :focus style:
    inp.focus(function(){
        wrapper.addClass( "focus" );
    }).blur(function(){
        wrapper.removeClass( "focus" );
    });

    var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

    inp.change(function(){
        var file_name;
        if( file_api && inp[ 0 ].files[ 0 ] ) 
            file_name = inp[ 0 ].files[ 0 ].name;
        else
            file_name = inp.val().replace( "C:\\fakepath\\", '' );

        if( ! file_name.length )
            return;

        if( lbl.is( ":visible" ) ){
            lbl.text( file_name );
            btn.text( "Выбрать" );
        }else
            btn.text( file_name );
    }).change();

});
$( window ).resize(function(){
    $( ".file_upload input" ).triggerHandler( "change" );
});