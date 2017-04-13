<?php
   include "include/db_connect.php";
   include "func/functions.php";

	session_start();

	include "include/auth_cookie.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/orbit.css" rel="stylesheet" type="text/css" />
	
  <script type="text/javascript" src="/shop/www/js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jcarousellite.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.orbit.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.form.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.textchange.js"></script>
  <script type="text/javascript" src="/shop/www/js/shop-script.js"></script>

<script type="text/javascript">
<!--удаленная проверки корректности ввода личных данных-->
$(document).ready(function(){

   $('#form_reg').validate(
      {
	rules:{
	   "reg_login":{
		required:true,
		minlength:5,
		maxlength:15,
		remote:{
                   type: 'post',    
                   url: '/shop/www/reg/check_login.php'
                }
		},
	   "reg_pass":{
		required:true,
		minlength:7,
		maxlength:15
		},
		"reg_surname":{
		required:true,
		minlength:3,
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
		},
		"reg_phone":{
		required:true
		},
	   "reg_address":{
		required:true
		}
	},

	messages:{
	   "reg_login":{
		required:"Укажите Логин!",
		minlength:"От 5 до 15 символов!",
		maxlength:"От 5 до 15 символов!",
		remote: "Логин занят!"
	   },
	   "reg_pass":{
		required:"Укажите Пароль!",
		minlength:"От 7 до 15 символов!",
		maxlength:"От 7 до 15 символов!"
		},
		"reg_surname":{
		required:"Укажите Фамилию!",
		minlength:"От 3 до 20 символов!",
		maxlength:"От 3 до 20 символов!"
		},
	   "reg_name":{
		required:"Укажите Имя!",
		minlength:"От 3 до 15 символов!",
		maxlength:"От 3 до 15 символов!"
		},
	   "reg_email":{
		required:"Укажите Адрес электронной почты!",
		email:"Некорректный Адрес электронной почты"
		},
	   "reg_phone":{
		required:"Укажите Номер телефона!"
		},
	   "reg_address":{
		required:"Необходимо указать Адрес доставки!"
		}
	},

submitHandler: function(form){
$(form).ajaxSubmit({
success: function(data){
   if(data == 'true')
{
<!--отображение сообщений об ошибках-->
   $("#block-form-registration").fadeOut(300,function(){
     $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
     $("#form_submit").hide();
});
} else {
       $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
       }
}
});
}
});
});
</script>

<title> Регистрация </title>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>

  

<div id="block-content">

<h2 class="h2-title"> Регистрация </h2><p id="nav-ind">\<a href="index.php"> Главная страница </a></p>

<!--форма регистрации нового пользователя-->
<form method="post" id="form_reg" action="/shop/www/reg/handler_reg.php">
<p id="reg_message"></p>

  <div id="block-form-registration">
  
  <ul id="form-registration">
     <li>
     <label> Логин </label>
	<div id="block-reg-login">
	  <span class="star"> * </span>
	  <input type="text" name="reg_login" id="reg_login" />
	</div>
     </li>

     <li>
     <label> Пароль </label>
	<div id="block-reg-pass">
	  <span class="star"> * </span>
	  <input type="text" name="reg_pass" id="reg_pass" />
	  <span id="genpass"> Сгенерировать </span>
	</div>
     </li>

	      <li>
     <label> Фамилия </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_surname" id="reg_surname" />
	</div>
     </li>
	 
     <li>
	<label> Имя </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_name" id="reg_name" />
	</div>
     </li>

     <li>
	<label> E-mail </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_email" id="reg_email" />
	</div>
     </li>
	 
	      <li>
	<label> Мобильный телефон </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_phone" id="reg_phone" />
	</div>
     </li>

     <li>
	<label> Адрес доставки </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_address" id="reg_address" />
	</div>
     </li>
	 
  </ul>
  </div>

	<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация" /></p>
</form>

</div>
</div>

<div id="paginate"></div>

<?include "include/footer.php";?>

</body>
</html>
