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
<!--��������� �������� ������������ ����� ������ ������-->
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
		required:"������� �����!",
		minlength:"�� 5 �� 15 ��������!",
		maxlength:"�� 5 �� 15 ��������!",
		remote: "����� �����!"
	   },
	   "reg_pass":{
		required:"������� ������!",
		minlength:"�� 7 �� 15 ��������!",
		maxlength:"�� 7 �� 15 ��������!"
		},
		"reg_surname":{
		required:"������� �������!",
		minlength:"�� 3 �� 20 ��������!",
		maxlength:"�� 3 �� 20 ��������!"
		},
	   "reg_name":{
		required:"������� ���!",
		minlength:"�� 3 �� 15 ��������!",
		maxlength:"�� 3 �� 15 ��������!"
		},
	   "reg_email":{
		required:"������� ����� ����������� �����!",
		email:"������������ ����� ����������� �����"
		},
	   "reg_phone":{
		required:"������� ����� ��������!"
		},
	   "reg_address":{
		required:"���������� ������� ����� ��������!"
		}
	},

submitHandler: function(form){
$(form).ajaxSubmit({
success: function(data){
   if(data == 'true')
{
<!--����������� ��������� �� �������-->
   $("#block-form-registration").fadeOut(300,function(){
     $("#reg_message").addClass("reg_message_good").fadeIn(400).html("�� ������� ����������������!");
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

<title> ����������� </title>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>

  

<div id="block-content">

<h2 class="h2-title"> ����������� </h2><p id="nav-ind">\<a href="index.php"> ������� �������� </a></p>

<!--����� ����������� ������ ������������-->
<form method="post" id="form_reg" action="/shop/www/reg/handler_reg.php">
<p id="reg_message"></p>

  <div id="block-form-registration">
  
  <ul id="form-registration">
     <li>
     <label> ����� </label>
	<div id="block-reg-login">
	  <span class="star"> * </span>
	  <input type="text" name="reg_login" id="reg_login" />
	</div>
     </li>

     <li>
     <label> ������ </label>
	<div id="block-reg-pass">
	  <span class="star"> * </span>
	  <input type="text" name="reg_pass" id="reg_pass" />
	  <span id="genpass"> ������������� </span>
	</div>
     </li>

	      <li>
     <label> ������� </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_surname" id="reg_surname" />
	</div>
     </li>
	 
     <li>
	<label> ��� </label>
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
	<label> ��������� ������� </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_phone" id="reg_phone" />
	</div>
     </li>

     <li>
	<label> ����� �������� </label>
	<div class="reg_inp">
	  <span class="star"> * </span>
	  <input type="text" name="reg_address" id="reg_address" />
	</div>
     </li>
	 
  </ul>
  </div>

	<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="�����������" /></p>
</form>

</div>
</div>

<div id="paginate"></div>

<?include "include/footer.php";?>

</body>
</html>
