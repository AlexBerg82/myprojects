$(document).ready(function(){

	//профиль пользователя
	var sessTemp = $.session.get("auth");
		
	if(sessTemp == 'yes_auth'){
		$("#inn").replaceWith("<a href='./profile.html' id='outUser' >" + $.session.get("auth_login") + "</a>");
		$("#reg").replaceWith("<a href='#' id='outReg'>Log Out</a>");
		
		var addAddLog = $.session.get("auth_login");
		//получение id текущего пользователя для работы с БД
		$.ajax({
			type: "POST",
			url: "./include/auth_id.php",
			data: "login="+addAddLog,
			dataType: "html",
			cache: false,
			success: function(dataId){
					$.session.set("userId", dataId);
				}
		});
		
		
		var usrImg;
		var usrImgType;
		
		//форма добавления фото
		var files;
		$('input[type=file]').change(function(){
			files = this.files;
			
			//название файла и его тип
			$.each(files, function(key2, value2){
				usrImg = value2.name;
				usrImgType = value2.type;
			});
		});


		//добавление нового объявления
		$("#submit_form").click(function(){
		
			var form_title = $("#form_title").val();
			var form_cat = $("#form_cat").val();
			var form_price = $("#form_price").val();
			var form_mail = $("#form_mail").val();
			var form_phone = $("#form_phone").val();
			var form_text = $("#editor1").val();

			if(files != undefined){
				var datas = new FormData();
				$.each(files, function(key, value){
					datas.append(key, value);
				});
			}

			//добавление объявления
			$.ajax({
				type: "POST",
				url: "./include/add_ad.php",
				data: "title="+form_title+"&price="+form_price+"&text="+form_text+"&cat="+form_cat+"&phone="+form_phone+"&mail="+form_mail+"&usrId="+$.session.get("userId")+"&usrImg="+usrImg+"&usrImgType="+usrImgType,
				dataType: "html",
				cache: false,
				success: function(dataIds){
					//вставка фото
					$.ajax({
						type: "POST",
						url: "./include/add_ad.php?temper&dataIds="+dataIds,
						data: datas,
						dataType: "html",
						cache: false,
						processData: false,
						contentType: false,
						success: function(){
							location.reload();
						}
					});				
				}
			});
		});
		

		//событие нажатия кнопки выхода из профиля пользователя
		$("#outReg").click(function(){
			$.session.remove('auth');
			$.session.remove('userId');
			
			$("#outReg").replaceWith('<a href="#" id="reg">Register</a>');
			$("#outUser").replaceWith('<a href="#" id="inn">Inn</a>');
			
			var url = "./index.html";
			$(location).attr('href',url);
			
			regUser();
		});
	}

	//выпадающее окно входа зарегистрированных пользователей
	$("#inn").click(function(){
		$(".login_form").slideToggle("slow");
	});
	
	//скрытие-отображение пароля
	$('#btn_pass_sh').click(function(){
		var statuspass = $(this).attr("class");

		if(statuspass == "pass_show"){
			$('#btn_pass_sh').attr("class","pass_hide");
			var $input = $("#auth_pass");
			var change = "text";
			var rep = $("<input placeholder='Password' type='" + change + "' id='auth_pass' />")
				.attr("id",$input.attr("id"))
				.attr("name",$input.attr("name"))
				.attr('class',$input.attr('class'))
				.val($input.val())
				.insertBefore($input);
			$input.remove();
			$input = rep;
		} else {
			$("#btn_pass_sh").attr("class","pass_show");
			  var $input = $("#auth_pass");
			  var change = "password";
			  var rep = $("<input placeholder='Password' type='" + change + "' id='auth_pass' />")
				.attr("id",$input.attr("id"))
				.attr("name",$input.attr("name"))
				.attr('class',$input.attr('class'))
				.val($input.val())
				.insertBefore($input);
			  $input.remove();
			  $input = rep;
		}
	});


	//функция смены кнопок сортировки в исходное состояние
	function reButton(){
		$("#datea2").replaceWith('<span id="datea">&#9650;</span>');
		$("#dated2").replaceWith('<span id="dated">&#9660;</span>');
		$("#pricea2").replaceWith('<span id="pricea">&#9650;</span>');
		$("#priced2").replaceWith('<span id="priced">&#9660;</span>');
		
		
		$("#pricea").click(function(){
			idt = $(this).attr('id');
			sorter(ids,idt);
		});

		$("#priced").click(function(){
			idt = $(this).attr('id');
			sorter(ids,idt);
		});

		$("#datea").click(function(){
			idt = $(this).attr('id');
			sorter(ids,idt);
		});

		$("#dated").click(function(){
			idt = $(this).attr('id');
			sorter(ids,idt);
		});
	}
	
	
	//функция сортировки
	var ids = '';
	var idt = '';

	function sorter(ids,idt){
		$("#fon").css({'display':'block'});
			
		$("#load").fadeIn(500,function(){
			$.ajax({
				url:'./functions.php',
				type:'get',
				data:'cat='+ids+'&sor='+idt,
				dataType:'json',
				success:function(html){
					$('#tovar').html('');		//очистка содержимого для вставки новых данных
	
					if(html != null){
					
						//вставка отсортированных элементов
						for(value in html){
							if(html[value]['img'] != ''){
								$("#tovar").append('<li><div class="tovar_img clearfix"><img src="uploads_images/'+html[value]['img']+'" alt="no-image"></div><div class="tovar_right clearfix"><p>' +html[value]['title']+'</p><div class="tovar_desc clearfix"><p>' +html[value]['description']+'</p><div class="tovar_price clearfix"><p>' +html[value]['price']+' <span>grn.</span></p><a href="#">BUY</a></div></div></div></li>');
							} else {
								$("#tovar").append('<li><div class="tovar_img clearfix"><img src="img/no-image.png" alt="no-image"></div><div class="tovar_right clearfix"><p>' +html[value]['title']+'</p><div class="tovar_desc clearfix"><p>' +html[value]['description']+'</p><div class="tovar_price clearfix"><p>' +html[value]['price']+' <span>grn.</span></p><a href="#">BUY</a></div></div></div></li>');
							}
						}
								
						$("#tovar").hide().fadeIn(1000);
						$("#fon").css({'display':'none'});
						$("#load").fadeOut(500);
							
						$('.data').append('<script src="js/paginate.js"></script>');		//постраничная навигация
							
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

						} else {
							$("#tovar").append('<li><p class="empty">Emtry!!!</p></li>');
							$("#load").fadeOut(500);
						}
						
					}
				});
		});
	}
	

	//функция создания модального окна регистрации нового пользователя
	function regUser(){

	$("#reg").click(function(){
		$(".login_form").hide();		//скрытие окна входа зарегистрированных пользователей если оно открыто
		
		//окно регистрации нового пользователя
		$('body').append('<div class="modal" id="modal_out"></div>');
		$('.modal').fadeIn(500);
		$('body').append('<div class="sign_up"><a href="" id="close_modal"></a></div>');
		$('.sign_up').append('<form id="form_reg" method="POST" action="./reg/handler_reg.php"><p>Sign Up</p></form>');
		$('.sign_up form').append('<div class="facebook clearfix"><div class="logo"><img src="img/fbb.png" alt="no-foto" /></div><a href="http://www.facebook.com" target="_blank">Log In <span>with</span>Facebook<span>&rsaquo;</span></a>');
		$('.sign_up form').append('<div class="bord"><div class="bord3"></div><span>Register</span><div class="bord4"></div></div>');
		$('.sign_up form').append('<div class="input_text clearfix"></div>');
		$('.input_text').append('<div class="inputs clearfix"><input type="text" class="first_name" name="reg_name" id="reg_name" placeholder="You Name" /></div>');
		$('.input_text').append('<div class="inputs clearfix"><input type="text" class="last_name" name="reg_login" id="reg_login" placeholder="Login Name" /></div>');
		$('.input_text').append('<div class="inputs clearfix"><input type="email" class="mail" name="reg_email" id="reg_email" placeholder="Email Address" /></div>');
		$('.input_text').append('<div class="inputs clearfix"><input type="text" class="pass" name="reg_pass" id="reg_pass" placeholder="Choose Password" /></div>');
		$('.sign_up form').append('<div class="check clearfix"></div>');
		$('.check').append('<div class="checker clearfix"></div>');
		$('.checker').append('<span id="genpass"><label>Generate password</label></span>');
		$('.sign_up form').append('<button type="submit" name="reg_submit" id="form_submit" class="subm">Create my Account</button>');
		
		//выход из модалки регистрации по нажатию на фон
		$("#modal_out").click(function(){
			$('.sign_up').empty().remove();
			$('.modal').empty().remove();
		});
		
		//генерация паролей при регистрации нового пользователя
		$('#genpass').click(function(){
			$.ajax({
				type: "POST",
				url: "./php/genpass.php",
				dataType: "html",
				cache: false,
				success: function(data){
					$('#reg_pass').val(data);
				}
			});
		});
		
		//валидация формы
		$('#form_reg').validate({
			rules:{
				"reg_login":{
				required:true,
				minlength:5,
				maxlength:15,
				remote:{
						type: 'post',    
						url: './reg/check_login.php'
					}
				},
				"reg_pass":{
				required:true,
				minlength:7,
				maxlength:15
				},
				"reg_name":{
				required:true,
				minlength:3,
				maxlength:15
				},
				"reg_email":{
				required:true,
				email:true
				}
			},
			messages:{
				"reg_login":{
				required:"Enter login!",
				minlength:"5 to 15 char!",
				maxlength:"5 to 15 char!",
				remote: "Login is taken!"
				},
				"reg_pass":{
				required:"Enter Password!",
				minlength:"7 to 15 char!",
				maxlength:"7 to 15 char!"
				},
				"reg_name":{
				required:"Enter Name!",
				minlength:"3 to 15 char!",
				maxlength:"3 to 15 char!"
				},
				"reg_email":{
				required:"Enter your email address!",
				email:"Invalid E-mail address"
				}
			},
			submitHandler: function(form){
				var textPass = $("#reg_pass").val();
				var textLog = $("#reg_login").val();
				var textNam = $("#reg_name").val();
				var textMail = $("#reg_email").val();

				$(form).ajaxSubmit({
					success: function(data){
						if(data == 'true'){

							//создание сессии если форма валидна
							$.session.set("auth", "yes_auth");
							$.session.set("auth_pass", textPass);
							$.session.set("auth_login", textLog);
							$.session.set("auth_name", textNam);
							$.session.set("auth_email", textMail);
							
							var sessTemp = $.session.get("auth");
						
							//замена кнопок ВХОД и РЕГИСТРАЦИЯ и перенаправление на страницу нового пользователя
							if(sessTemp == 'yes_auth'){
								$("#inn").replaceWith("<a href='#' id='outUser' >" + $.session.get("auth_name") + "</a>");
								$("#reg").replaceWith("<a href='#' id='outReg'>Log Out</p>");
								
								var url = "./profile.html";
								$(location).attr('href',url);
								
								sorter(ids,sor);
							}
							
							//событие нажатия кнопки выхода из профиля пользователя
							$("#outReg").click(function(){
								$.session.remove('auth');
								$.session.remove('userId');
								
								$("#outReg").replaceWith('<a href="#" id="reg">Register</a>');
								$("#outUser").replaceWith('<a href="#" id="inn">Inn</a>');
								
								var url = "./index.html";
								$(location).attr('href',url);
								
								regUser();
								
								$("#inn").click(function(){
									$(".login_form").slideToggle("slow");
								});
							});

						} else {
							$("#reg_message").addClass("reg_message_error").fadeIn(400).html('Unknown error. re-register later');
						}		
					}
				});
			}
		});
	});	
	}

	
	//переход по категориям и вызов функции сортировки
	$("#electr").click(function(){
		input_search2 = '';
		$("#input_search").val('');
		
		reButton();
		
		$('.wrap_slider').hide();
		$('.wrapper_accord').hide();
		$('.sort').show();
		$('#content').show();
		$('.nav_bottom').show();
		$('.footer_menu').hide();
			
		ids = $(this).attr('id');
		sorter(ids,idt);
	});

	$("#clos").click(function(){
		input_search2 = '';
		$("#input_search").val('');
		
		reButton();
		
		$('.wrap_slider').hide();
		$('.wrapper_accord').hide();
		$('.sort').show();
		$('#content').show();
		$('.nav_bottom').show();
		$('.footer_menu').hide();
			
		ids = $(this).attr('id');
		sorter(ids,idt);
	});

	$("#all").click(function(){
		var url = "./index.html";
		$(location).attr('href',url);
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
				
					//смена кнопок сортировки для функции сортировки после поиска
					$("#datea").replaceWith('<span id="datea2">&#9650;</span>');
					$("#dated").replaceWith('<span id="dated2">&#9660;</span>');
					$("#pricea").replaceWith('<span id="pricea2">&#9650;</span>');
					$("#priced").replaceWith('<span id="priced2">&#9660;</span>');
						
					if(dataSrch > ''){
						$('#tovar').html('');
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
						
						
						var idt2 = '';
						var input_search2;
						
						$("#pricea2").click(function(){
							idt2 = $(this).attr('id');
							input_search2 = $("#input_search").val();
							searchFiltr(idt2,input_search2);
						});

						$("#priced2").click(function(){
							idt2 = $(this).attr('id');
							input_search2 = $("#input_search").val();
							searchFiltr(idt2,input_search2);
						});

						$("#datea2").click(function(){
							idt2 = $(this).attr('id');
							input_search2 = $("#input_search").val();
							searchFiltr(idt2,input_search2);
						});

						$("#dated2").click(function(){
							idt2 = $(this).attr('id');
							input_search2 = $("#input_search").val();
							searchFiltr(idt2,input_search2);
						});
						
					}
				}
			});

		}
	});
	

	//функция сортировки объявлений отобранных по поиску
	function searchFiltr(idt2,input_search2){
		$.ajax({
			type: "POST",
			url: "./include/search.php",
			data: "text="+input_search2+'&sortr='+idt2,
			dataType: "html",
			cache: false,
			success: function(dataSrch2){
				if(dataSrch2 > ''){
					$('#tovar').html('');
					$('.nav_bottom').hide();

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
			}
		});
	}

	
	//вход зарегистрированного пользователя через форму входа
	$("#btn_auth").click(function(){

		var auth_login = $("#auth_login").val();
		var auth_pass = $("#auth_pass").val();
		
		//проверка длины логина и пароля
		if(auth_login == "" || auth_login.length > 30){
			$("#auth_login").css("borderColor","#CD5555");
			send_login = 'no';
		} else {
			$("#auth_login").css("borderColor","#006400");
			send_login = 'yes';
		}

		if(auth_pass == "" || auth_pass.length > 15){
			$("#auth_pass").css("borderColor","#CD5555");
			send_pass = 'no';
		} else {
			$("#auth_pass").css("borderColor","#006400");
			send_pass = 'yes';
		}

		if($("#rememberme").prop('checked')){
			auth_rememberme = 'yes';
		} else {
			auth_rememberme = 'no';
		}

		if(send_login == 'yes' && send_pass == 'yes'){
			$("#btn_auth").hide();
			$(".auth_load").show();

			//валидация пользователя
			$.ajax({
				type: "POST",
				url: "./include/auth2.php",
				data: "login="+auth_login+"&pass="+auth_pass+"&rememberme="+auth_rememberme,
				dataType: "json",
				cache: false,
				success: function(data){
				
					//при валидности пользователя перенаправление в профиль
					if(data != null){

						for(value in data){
							if(auth_login == data[value]['login']){

								$.session.set("auth", "yes_auth");
								$.session.set("auth_login", auth_login);
								$.session.set("userId", data[value][0]);
									
								var sessTemp = $.session.get("auth");
								
								if(sessTemp == 'yes_auth'){
									$("#inn").replaceWith("<a href='#' id='outUser' >" + $.session.get("auth_login") + "</a>");
									$("#reg").replaceWith("<a href='#' id='outReg'>Log Out</p>");
										
									var url = "./profile.html";
									$(location).attr('href',url);
								}
									
								//событие нажатия кнопки выхода из профиля пользователя
								$("#outReg").click(function(){
									$.session.remove('auth');
									
									$("#outReg").replaceWith('<a href="#" id="reg">Register</a>');
									$("#outUser").replaceWith('<a href="#" id="inn">Inn</a>');
										
									var url = "./index.html";
									$(location).attr('href',url);
										
									regUser();

									$("#inn").click(function(){
										$(".login_form").slideToggle("slow");
									});
								});
							}	
						}
					} else {
						//ошибка, если пользователя не существует
						$("#mess_auth").slideDown(400);
						$(".auth_load").hide();
						$("#btn_auth").show();
					}

				}
			});
		}
		
	});
		

	//просмотр профиля пользователя
	var viewLogin = $.session.get("auth_login");
	
//if(sessTemp == $.session.get("auth")){
	$.ajax({
		type: "POST",
		url: "./include/view_add.php",
		data: "viewLogin="+viewLogin+"&userId="+$.session.get("userId"),
		dataType: "html",
		cache: false,
		success: function(dataUs){
			//вызов просмотра объявлений текущего пользователя
			$('#three > ul').append(dataUs);

			//просмотр и редактирование учетных данных пользователя
			$.ajax({
				type: "POST",
				url: "./include/redact.php",
				data: "userId="+$.session.get("userId"),
				dataType: "json",
				cache: false,
				success: function(data){
					if(data > ''){
					
						$.each(data, function(key, value){
							if(value != 'null'){
								if(key == 'name'){
									if(document.getElementById('info_name') != null){
										document.getElementById('info_name').value = value;
									}
								}
								if(key == 'email'){
									if(document.getElementById('info_email') != null){
										document.getElementById('info_email').value = value;
									}
								}
							}	
						});
						
					}	
					
					
					//редактирование учетных данных пользователя
					$("#form_submit_ch").click(function(){
						var nameRed = document.getElementById('info_name').value;
						var sessMail = document.getElementById('info_email').value;
						
						$.ajax({
							type: "POST",
							url: "./include/upd_us.php",
							data: "userId="+$.session.get("userId")+"&nameRed="+nameRed+"&sessMail="+sessMail,
							dataType: "html",
							cache: false,
							success: function(){
								location.reload();
							}
						});
					});

				}
			});
			

			//удаление объявления
			$(".tovar_price > a").click(function(){
				var idDel = $(this).attr('id');
				idDel = idDel.substr(3);
					
				$.ajax({
					type: "POST",
					url: "./include/del.php",
					data: "idDel="+idDel,
					dataType: "html",
					cache: false,
					success: function(){
						location.reload();
					}
				});

			});

		}
	});
//}
	
	//вызов функции регистрации нового пользователя
	regUser();
});