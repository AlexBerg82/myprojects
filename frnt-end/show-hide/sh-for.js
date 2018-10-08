(function($){
	$.fn.showAll = function(params){

		for(var i = 0; i < $(this.selector)[0].children.length; i++){
			if(i + 1 > params.quantity){
				$($(this.selector)[0].children[i]).css('display','none');
			}
		}

		var cnt = $(this.selector)[0];
		var qa = params.quantity;
		
		$(params.button).click(function(){
			for(var i = 0; i < cnt.children.length; i++){
				var li = cnt.children[i];

				if($(li).css('display') == 'none'){
					$(li).css('display','inline-block');
					$($(params.button)[0]).text(params.buttonTextHide);
				} else {
					if(i > params.quantity - 1){
						$(li).css('display','none');
						$($(params.button)[0]).text(params.buttonTextShow);
						li = null;
					}
				}
			}
		});

	};
})(jQuery);