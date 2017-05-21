$(document).ready(function(){
	var arrType = [];
	var idBrand = [];
	
	
	//домашняя страница
	$(".logotip").click(function(){		
		$.session.remove('idBrands');
		$.session.remove('types');
		$.session.remove('sort');
		
		$.cookie("checkboxCookie","");
		
		location.reload();
	});
	
	//корзина
	function loadcart(){
		$.ajax({
			type: "POST",
			url: "./include/loadcart.php",
			dataType: "html",
			cache: false,
			success: function(data){		   
				if(data < 1){
					$(".cart").css('display','none');
				}else{
					$(".cart").css('display','block');
					$(".cart p").html(data);
				}				
			}
		});
	}
	loadcart();
	
	
	//добавление в корзину товара
	function carts(){
		$('.buyBtn').click(function(){
		var buyId = $(this).attr("id");
			$.ajax({
				type: "POST",
				url: "./include/addtocart.php",
				data: "id="+buyId,
				dataType: "html",
				cache: false,
				success: function(){
					loadcart();
				}
			});
		});
	}
	
	
	
	
	//console.log($.cookie('slct_brnd'));
	
	
		//загрузка категорий и подготовка к выводу
		$.ajax({
			url:'./include/units.php',
				type:'post',
				dataType:'json',
				success:function(data){

					//создание списка категорий товаров
					for(value in data){
						arrType.push(data[value]['type']);
					}
					var arrSortFrnd = _.union(arrType);
					
					for(var i=0; i < arrSortFrnd.length; i++){
						//$("#menu").append('<li><span id="act_'+arrSortFrnd[i]+'"><p id="'+arrSortFrnd[i]+'">'+arrSortFrnd[i]+'</p></span><ul class="act_'+arrSortFrnd[i]+'" id="list'+arrSortFrnd[i]+'"></ul></li>');
						$("#navigation").append('<h2 class="navigation_head">'+arrSortFrnd[i]+'</h2><div class="navigation_body"><ul id="list'+arrSortFrnd[i]+'"></ul></div>');
						for(value in data){
							if(arrSortFrnd[i] == data[value]['type']){
								//$("#list"+arrSortFrnd[i]).append('<li id="brand_'+arrSortFrnd[i]+'_'+data[value]['brand']+'"><input type="checkbox" class="'+arrSortFrnd[i]+'" value="'+data[value]['brand']+'" id="chk_'+arrSortFrnd[i]+'_'+data[value]['brand']+'" /><label for="chk_'+arrSortFrnd[i]+'_'+data[value]['brand']+'">'+data[value]['brand']+'<p></p></label></li>');
								$(".navigation_body #list"+arrSortFrnd[i]).append('<li id="brand_'+arrSortFrnd[i]+'_'+data[value]['brand']+'><a href="#"><input type="checkbox" class="'+arrSortFrnd[i]+'" value="'+data[value]['brand']+'" id="chk_'+arrSortFrnd[i]+'_'+data[value]['brand']+'" /><label for="chk_'+arrSortFrnd[i]+'_'+data[value]['brand']+'">'+data[value]['brand']+'<p></p></label></a></li>');
							}
						}
					}

					
					$("#mobile").replaceWith('<p id="mobile">Мобильные телефоны</p>');
					$("#notebook").replaceWith('<p id="notebook">Ноутбуки</p>');				
					$("#notepad").replaceWith('<p id="notepad">Планшеты</p>');	
					

					//$("#menu li ul").hide();
					$(".filter").hide();

					
					
					
					
					/*$("#menu li span").click(function(){
						$("#menu ul:visible").slideUp("normal");
						if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))){
							$(this).next().slideDown("normal");
							$(".filter").hide();
						}
					});


					$("#menu li span").click(function(){
							$("#menu ul:visible").slideUp("normal");
							$.cookie('select_cat', $(this).attr('id'));
						if(($(this).next().is("ul")) && (!$(this).next().is(":visible"))){
							$(this).next().slideDown("normal");
							$(".filter").hide();
						}
					});
					if($.cookie('select_cat') != ''){
						$('#menu > li > .'+$.cookie('select_cat')).show();
					}
*/
				
				

				
					if($.cookie('num_open_ul')){	//проверили, есть ли запись в печеньках
						if($.cookie('num_open_ul') != 0){	//и эта запись не равна 0
							var number_eq = parseInt($.cookie('num_open_ul')-1);
							$('.navigation_body').eq(number_eq).show().prevAll('#navigation h2.navigation_head:first').addClass('active_navigation');
						}
					};
					$('#navigation h2.navigation_head').click(function(){	//при клике сработает эта функция
						if(!$(this).next().is(':visible')){
							$('div.navigation_body').siblings('div.navigation_body').slideUp(500);		//если другие открыты- закрыли все, кроме текущего
						}
						$(this).next('div.navigation_body').slideToggle(500).siblings('div.navigation_body').slideUp(500);
						$(this).toggleClass('active_navigation').siblings('#navigation h2.navigation_head').removeClass('active_navigation'); // открытому добавили класс, чтобы сменить стиль
						setTimeout(fncookie, 600); //сама запись в печеньки с задержкой, дабы скрипт до записи успел завершить работу (500мс- скорость, задержка- 600мс)
					});
					function fncookie(){ // сама функция записи
						var number_open_ul = 0;
						var i = 0;
						$('div.navigation_body').each(function(){
							i++;
							if($(this).is(':visible')){
								number_open_ul = i;
							}
							$.cookie('num_open_ul', number_open_ul, {expires:3, path:'/'}); // хранить 3 дня для всего сайта.
						});
					}
				
	
				
				
				


				//подсчет категории товаров
				$.ajax({
					url:'./include/count_cat.php',
					type:'post',
					dataType:'json',
					success:function(html){
						for(val in html){
							$("#brand_"+html[val][1]+"_"+html[val][0]+" > input + label > p").html(html[val][2]);
						}
					}
				});

				
			var var1;
			var var2;
			var var3;

			//функция сортировки
			function sorter(var1,var2,var3){
				$.ajax({
					url:'./include/functions.php',
					type:'post',
					data: "idBrand="+var1+"&types="+var2+"&sort="+var3,
					dataType:'json',
					success:function(html){
						
						$("#tovar").empty();
						
							$(".sort").css('display','block');
							$(".title_cart").hide();
			
							//вставка отсортированных элементов
							for(value in html){
								$("#tovar").append('<li><div class="tovar_img clearfix"><img src="uploads_images/'+html[value]['img']+'" alt="no-image"></div><div class="tovar_right clearfix"><p id="tovar'+html[value]['id_prod']+'">'+html[value]['title']+'</p><div class="tovar_desc clearfix"><p>' +html[value]['mini_desc']+'</p><div class="tovar_price clearfix"><p>'+ html[value]['price'] +'<span> грн.</span></p><a class="buyBtn" id="buy'+html[value]['id_prod']+'" href="#"><p class="residue">'+html[value]['count']+'</p>КУПИТЬ</a></div></div></div></li>');
							}
							
							//проверка кук отвечающих за разное отображение товара
							if($.cookie('select_style') == 'line'){
								$("#tovar li").removeClass('grad');
								$("#tovar li").addClass('line');
								$("#grad").css("backgroundImage","url('./img/grade.png')");
								$("#line").css("backgroundImage","url('./img/line_na.png')");
							} else {
								$("#tovar li").addClass('grad');
								$("#tovar li").removeClass('line');
								$("#grad").css("backgroundImage","url('./img/grade_na.png')");
								$("#line").css("backgroundImage","url('./img/line.png')");
							}

							$("#grad").click(function(){
								$("#tovar li").addClass('grad');
								$("#tovar li").removeClass('line');
								$("#grad").css("backgroundImage","url('./img/grade_na.png')");
								$("#line").css("backgroundImage","url('./img/line.png')");
								$.cookie('select_style','grad');
							});
							$("#line").click(function(){
								$("#tovar li").addClass('line');
								$("#tovar li").removeClass('grad');
								$("#line").css("backgroundImage","url('./img/line_na.png')");
								$("#grad").css("backgroundImage","url('./img/grade.png')");
								$.cookie('select_style','line');
							});
							

							$('.nav_bottom').show();
							$('.content').append('<script src="js/paginate.js"></script>');
/*
						//просмотр товара
						$(".tovar_right > p").click(function(){
							var tovarUnit = $(this).attr('id');
							console.log(tovarUnit.substr(5));
							
							$.ajax({
								url:'./include/unit.php',
								type:'post',
								data: "unit="+tovarUnit.substr(5),
								dataType:'json',
								success:function(html){
									$("#tovar").empty();
									$(".sort").css('display','none');

									$(".title_cart").css('display','block');
									$(".title_cart p").replaceWith("<p>Все о товаре</p>");
									$('.nav_bottom').hide();
									
									$('input[type=checkbox]').removeAttr("checked");
									idBrand = [];
									
									var arr = [];
									
									for(value in html){
										arr = html[value]['imgs'].split(',');
										
										$("#tovar").append('<div class="wraper_unit clearfix"><div class="img_unit"><div class="imag"><img src="uploads_images/'+html[value]['img']+'" alt="no-image"></div><div class="wrap_small_img"><div class="img_small img_one"><img src="uploads_images/'+arr[0]+'" alt="no-image"></div><div class="img_small img_two"><img src="uploads_images/'+arr[1]+'" alt="no-image"></div><div class="img_small img_three"><img src="uploads_images/'+arr[2]+'" alt="no-image"></div></div></div><div class="wrap_desc"><div class="title_unit"><p>'+html[value]['title']+'</p></div><div class="wrap_buy"><div class="vis"><img src="img/comm.png" alt="no-image"><p>'+html[value]['likes']+'</p></div><div class="rev"><img src="img/eye.png" alt="no-image"><p>'+html[value]['count']+'</p></div><a class="buyBtn" id="buy'+html[value]['id_prod']+'" href="#"><p class="residue">'+html[value]['count']+'</p>КУПИТЬ</a><div class="pric clearfix"><p>'+html[value]['price']+'</p><span> грн.</span></div></div><div class="min_char"><p>'+html[value]['mini_feat']+'</p></div></div></div>');
										$("#tovar").append('<ul class="tabs first_tab"><li class="t1 tab_active"><a>Описание</a></li><li class="t2"><a>Характеристики</a></li><li class="t3"><a>Отзывы</a></li></ul><div class="t1"><ul class="page1"><li>'+html[value]['desc']+'</li></ul></div><div class="t2"><ul class="page2"><li>'+html[value]['feat']+'</li></ul></div><div class="t3"><ul class="page1"><li></li></ul></div>');
									}
									
									//вкладки товара
									$('ul.tabs.first_tab li').click(function(){
										var thisClass = this.className.slice(0,2);
										$('div.t1').hide();
										$('div.t2').hide();
										$('div.t3').hide();
										$('div.' + thisClass).show();
										$('ul.tabs.first_tab li').removeClass('tab_active');
										$(this).addClass('tab_active');
									});
									
									carts();
									
									//модалка (дополнительные фото товара)
									$(".img_small").click(function(){
										$('.modal').fadeIn(500);
									});
									
									//выход из модалки по нажатию на фон
									$("#modal_out").click(function(){
										$('.modal').fadeOut(500);
									});

								}
							});
						});*/
						
						carts();

					}
				});
			
			}
			

			
	
	
    // функция устанавливающая куки, хранящие состояния checkbox'ов
    function cookieFromCheckbox(){
	var ch = [];
	$("input:checkbox").each(function(){
		var $el = $(this);
		if($el.prop("checked"))
			ch.push($el.attr("id"));
	});
		$.cookie("checkboxCookie", ch.join(','));
	}
    // функция восстанавливающая состояния checkbox'ов по кукам
    function checkboxFromCookie(){
		if($.cookie("checkboxCookie") == null)
			return;
		var chMap = $.cookie("checkboxCookie").split(',');
		for(var i in chMap){
			$('#'+chMap[i]).prop("checked", true);
		}
	}
    // проверим, были ли установлены ранее кукисы с именем checkboxCookie.
    // если нет - установим их.
    var checkboxCookie = $.cookie("checkboxCookie");
    if(checkboxCookie == null){
		cookieFromCheckbox();
		checkboxCookie = $.cookie("checkboxCookie");
    }else{
		checkboxFromCookie();
	}
	$("input:checkbox").change(function(){
		cookieFromCheckbox();
	});
	
	
	
	
	//выборка по категории
	$('input[type=checkbox]').change(function(){
		if(this.checked){
			var types = $(this).attr('class');
			$.session.set("types",types);
			
			idBrand.push("'"+$(this).val()+"'");
			var idBrands = idBrand.join(', ');
			$.session.set("idBrands",idBrands);
			
			$.session.set("sort",'');
			
			sorter($.session.get("idBrands"),$.session.get("types"),$.session.get("sort"));
		}
	});

	
	sorter($.session.get("idBrands"),$.session.get("types"),$.session.get("sort"));
		
		$("#namea2").replaceWith('<span id="namea">&#9650;</span>');
		$("#named2").replaceWith('<span id="named">&#9660;</span>');
		$("#pricea2").replaceWith('<span id="pricea">&#9650;</span>');
		$("#priced2").replaceWith('<span id="priced">&#9660;</span>');
		
		
		
		$("#pricea").click(function(){
			$.session.set("sort",$(this).attr('id'));
			sorter($.session.get("idBrands"),$.session.get("types"),$.session.get("sort"));
		});

		$("#priced").click(function(){
			$.session.set("sort",$(this).attr('id'));
			sorter($.session.get("idBrands"),$.session.get("types"),$.session.get("sort"));
		});

		$("#namea").click(function(){
			$.session.set("sort",$(this).attr('id'));
			sorter($.session.get("idBrands"),$.session.get("types"),$.session.get("sort"));
		});

		$("#named").click(function(){
			$.session.set("sort",(this).attr('id'));
			sorter($.session.get("idBrands"),$.session.get("types"),$.session.get("sort"));
		});

	
	}
	

});
	
	
	
	
	

					
	
	
	
	
	
	
	

	
	
	//поиск
	$("#input_search").bind('textchange', function(){
		var input_search = $("#input_search").val();

		if(input_search.length >= 3 && input_search.length < 64){
			$.ajax({
				type: "POST",
				url: "./include/search.php",
				data: "text="+input_search,
				dataType: "html",
				cache: false,
				success: function(dataSrch){
					$(".sort").css('display','block');
					$(".title_cart").hide();
					
						//смена кнопок сортировки для функции сортировки после поиска
						$("#namea").replaceWith('<span id="namea2">&#9650;</span>');
						$("#named").replaceWith('<span id="named2">&#9660;</span>');
						$("#pricea").replaceWith('<span id="pricea2">&#9650;</span>');
						$("#priced").replaceWith('<span id="priced2">&#9660;</span>');
							
						if(dataSrch > ''){
							$('#tovar').empty();
							$('.nav_bottom').hide();

							$('#tovar').html(dataSrch);

							//проверка кук отвечающих за разное отображение товара
							if($.cookie('select_style') == 'line'){
								$("#tovar li").removeClass('grad');
								$("#tovar li").addClass('line');
							} else {
								$("#tovar li").addClass('grad');
								$("#tovar li").removeClass('line');
							}
							
							
							var sortr = '';
							var input_search2;
							
							
							$("#pricea2").click(function(){
								sortr = $(this).attr('id');
								input_search2 = $("#input_search").val();
								searchFiltr(sortr,input_search2);
							});

							$("#priced2").click(function(){
								sortr = $(this).attr('id');
								input_search2 = $("#input_search").val();
								searchFiltr(sortr,input_search2);
							});

							$("#namea2").click(function(){
								sortr = $(this).attr('id');
								input_search2 = $("#input_search").val();
								searchFiltr(sortr,input_search2);
							});

							$("#named2").click(function(){
								sortr = $(this).attr('id');
								input_search2 = $("#input_search").val();
								searchFiltr(sortr,input_search2);
							});
						
						
						

						//просмотр товара
						$(".tovar_right > p").click(function(){
							var tovarUnit = $(this).attr('id');
							
							$.ajax({
								url:'./include/unit.php',
								type:'post',
								data: "unit="+tovarUnit.substr(5),
								dataType:'json',
								success:function(html){
									$("#tovar").empty();
									$(".sort").css('display','none');
									$(".title_cart").hide();
									$('.nav_bottom').hide();
									
									$('input[type=checkbox]').removeAttr("checked");
									idBrand = [];
									
									var arr = [];
									
									for(value in html){
										arr = html[value]['imgs'].split(',');
										
										$("#tovar").append('<div class="wraper_unit clearfix"><div class="img_unit"><div class="imag"><img src="uploads_images/'+html[value]['img']+'" alt="no-image"></div><div class="wrap_small_img"><div class="img_one"><img src="uploads_images/'+arr[0]+'" alt="no-image"></div><div class="img_two"><img src="uploads_images/'+arr[1]+'" alt="no-image"></div><div class="img_three"><img src="uploads_images/'+arr[2]+'" alt="no-image"></div></div></div><div class="wrap_desc"><div class="title_unit"><p>'+html[value]['title']+'</p></div><div class="wrap_buy"><div class="vis"><img src="img/comm.png" alt="no-image"><p>'+html[value]['likes']+'</p></div><div class="rev"><img src="img/eye.png" alt="no-image"><p>'+html[value]['count']+'</p></div><a class="buyBtn" id="buy'+html[value]['id_prod']+'" href="#"><p class="residue">'+html[value]['count']+'</p>КУПИТЬ</a><div class="pric clearfix"><p>'+html[value]['price']+'</p><span> грн.</span></div></div><div class="min_char"><p>'+html[value]['mini_feat']+'</p></div></div></div>');
										$("#tovar").append('<ul class="tabs first_tab"><li class="t1 tab_active"><a>Описание</a></li><li class="t2"><a>Характеристики</a></li><li class="t3"><a>Отзывы</a></li></ul><div class="t1"><ul class="page1"><li>'+html[value]['desc']+'</li></ul></div><div class="t2"><ul class="page2"><li>'+html[value]['feat']+'</li></ul></div><div class="t3"><ul class="page1"><li></li></ul></div>');
									}
									
									//вкладки товара
									$('ul.tabs.first_tab li').click(function(){
										var thisClass = this.className.slice(0,2);
										$('div.t1').hide();
										$('div.t2').hide();
										$('div.t3').hide();
										$('div.' + thisClass).show();
										$('ul.tabs.first_tab li').removeClass('tab_active');
										$(this).addClass('tab_active');
									});
									
									//добавление в корзину
									carts();

								}
							});
						});
						
						
						//добавление в корзину
						carts();
						
						
						}
						
						$('.nav_bottom').show();
						$('.content').append('<script src="js/paginate.js"></script>');

				}
			});

		}
	});
	
	//функция сортировки объявлений отобранных по поиску
	function searchFiltr(sortr,input_search2){
		$.ajax({
			type: "POST",
			url: "./include/search.php",
			data: "text="+input_search2+'&sortr='+sortr,
			dataType: "html",
			cache: false,
			success: function(dataSrch2){
				$("#tovar").empty();
				
					if(dataSrch2 > ''){
						$(".sort").css('display','block');

						$('#tovar').html(dataSrch2);

						//проверка кук отвечающих за разное отображение товара
						if($.cookie('select_style') == 'line'){
							$("#tovar li").removeClass('grad');
							$("#tovar li").addClass('line');
						} else {
							$("#tovar li").addClass('grad');
							$("#tovar li").removeClass('line');
						}
					}
					
					$('.nav_bottom').show();
					$('.content').append('<script src="js/paginate.js"></script>');

			}
		});
	}
	
	
	
	
	
	//просмотр корзины
	$('.cart').click(function(){

		$.ajax({
			type: "POST",
			url: "./include/cart.php",
			dataType: "json",
			cache: false,
			success: function(data){
				$("#tovar").empty();
				$('.sort').hide();
				$(".title_cart").css('display','block');
				$(".title_cart p").replaceWith("<p>Корзина</p>");
				$('.nav_bottom').hide();
				
				$('input[type=checkbox]').removeAttr("checked");
				idBrand = [];
				
				for(value in data){
					$("#tovar").append('<li class="wrap_postn clearfix" id="wrap_postn'+data[value]['id_prod']+'"><div class="img_cart"><img src="uploads_images/'+data[value]['img']+'" alt="no-foto"></div><div class="wrap_desc_cart clearfix"><div class="titl_cart"><p>'+data[value]['title']+'</p></div><div class="desc_cart"><p>'+data[value]['mini_feat']+'</p></div></div><div class="cnt_cart clearfix"><div class="cnt_max" id="cp'+data[value]['id_prod']+'"><p>+</p></div><div id="inp_un'+data[value]['id_prod']+'"><span>'+data[value]['count_cart']+'</span></div><div class="cnt_min" id="cm'+data[value]['id_prod']+'"><p>-</p></div></div><div class="amount_wrap clearfix"><div class="cnt_un" id="cnt_un'+data[value]['id_prod']+'"><p>грн.</p><span prc="'+data[value]['price']+'">'+data[value]['price']+'</span><p>x</p><span id="qan'+data[value]['id_prod']+'">'+data[value]['count_cart']+'</span></div><div class="total" id="ttl'+data[value]['id_prod']+'"><p>грн.</p><span>'+data[value]['count_cart'] * data[value]['price']+'</span></div></div><div class="del_pos_cart" id="del'+data[value]['id_prod']+'"><img src="img/del.png" alt="no-img"></div></li>');
				}

				//удаление товара в корзине
				$('.cnt_min').click(function(){
					var id = $(this).attr('id');

					$.ajax({
						type: "POST",
						url: "./include/cnt_min.php",
						data: "id="+id.substr(2),
						dataType: "html",
						cache: false,
						success: function(data){
							
							//количество
							var quantity = '#inp_un'+id.substr(2)+' > span';
							$(quantity).html(data);
							
							loadcart();
							
							//сумма позиции
							var price = '#cnt_un'+id.substr(2)+' > span';
							var priceproduct = $(price).attr('prc');
							var totalUnitResalr = Number(priceproduct) * Number(data);
							var totalUnit = '#ttl'+id.substr(2)+' > span';
							$(totalUnit).html(totalUnitResalr);
							
							//количество позиции
							var quantityUnit = '#qan'+id.substr(2);
							$(quantityUnit).html(data);
							
							itog_price();
						}
						
					});
				});
				
				//удаление товара в корзине
				$('.cnt_max').click(function(){
					var id = $(this).attr('id');

					$.ajax({
						type: "POST",
						url: "./include/cnt_pl.php",
						data: "id="+id.substr(2),
						dataType: "html",
						cache: false,
						success: function(data){
							
							//количество
							var quantity = '#inp_un'+id.substr(2)+' > span';
							$(quantity).html(data);
							
							loadcart();
							
							//сумма позиции
							var price = '#cnt_un'+id.substr(2)+' > span';
							var priceproduct = $(price).attr('prc');
							var totalUnitResalr = Number(priceproduct) * Number(data);
							var totalUnit = '#ttl'+id.substr(2)+' > span';
							$(totalUnit).html(totalUnitResalr);
							
							//количество позиции
							var quantityUnit = '#qan'+id.substr(2);
							$(quantityUnit).html(data);
							
							itog_price();
						}
						
					});
				});
				
				//итоговая цена
				function itog_price(){
					$.ajax({
						type: "POST",
						url: "./include/total_price.php",
						dataType: "html",
						cache: false,
						success: function(data){
								$(".total_price > span").html(data);
							}
					});
				}
				
				
				$("#tovar").append('<li><p class="total_price">Итого: <span></span> грн.</p></li><li><a href="#" class="order">Оформить заказ</a></li>');
				
				itog_price();
				
				
				//удаление позиции в корзине
				$(".del_pos_cart").click(function(){
					var idDel = $(this).attr('id');
					idDel = idDel.substr(3);
				
					$('#wrap_postn'+idDel).empty().remove();
					
					$.ajax({
						type: "POST",
						url: "./include/del.php",
						data: "idDel="+idDel,
						dataType: "html",
						cache: false,
						success: function(html){
							loadcart();
							
							if(html == 'full'){
								itog_price();					
							}else{
								$('#tovar').empty();
								$('#tovar').append('<li><p class="notification">Корзина пуста!</p></li>')
							}
							
						}
					});
				});


			}

		});
		
	});
	
	
	
	


	

});