<?php

	//define('hhh', true);

	include "include/db_connect.php";		//����������� � ��
	include "func/functions.php";

	session_start();

	include "include/auth_cookie.php";


if($_POST["send_message"]){

$error = array();

if(!$_POST["feed_name"]) $error[] = "������� ���!";

if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["feed_email"]))){
   $error[] = "������� ���������� email";
}

if(!$_POST["feed_subject"]) $error[] = "������� ���� ������!";
if(!$_POST["feed_text"]) $error[] = "������� ����� ���������!";

/*if(strtolower($_POST["reg_captcha"]) != $_SESSION['img_captcha']){
   $error[] = "�������� ��� ��������!";
}*/
if(count($error)){
$_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
} else {
	send_mail($_POST["feed_email"],'admin@shop.ru',$_POST["feed_subject"],'��: '.$_POST["feed_name"].'<br/>'.$_POST["feed_text"]);
	$_SESSION['message'] = "<p id='form-success'> ���� ��������� ������� ���������� </p>";
}

}
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
  <script type="text/javascript" src="/shop/www/js/shop-script.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.form.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.textchange.js"></script>

<title> ��������-������� �������� ������� </title>

</head>
<body>

<div id="block-body">

  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>

  <div id="block-content">


<?php
   if(isset($_SESSION['message'])){
	echo $_SESSION['message'];
	unset($_SESSION['message']);
   }
?>

<h3 class="title-h3"> �������� ����� </h3><p id="nav-ind3">\<a href="index.php"> ������� �������� </a></p>

<form method="post">
<div id="block-feedback">

  <ul id="info-profile">
     <li><label> ���� ��� </label><input type="text" name="feed_name" /></li>
     <li><label> ��� E-mail </label><input type="text" name="feed_email" /></li>
     <li><label> ���� </label><input type="text" name="feed_subject" /></li>
     <li><label> ����� ��������� </label><textarea name="feed_text"></textarea></li>

     <li>
     <!--label for="reg_captcha"> �������� ��� </label>
	<div id="block-captcha">
	   <img src="/shop/www/reg/reg_captcha.php" />
	   <input type="text" name="reg_captcha" id="reg_captcha" />
	   <p id="reloadcaptcha"> �������� </p>
	</div-->
     </li>
  </ul>
</div>
	<p align="right"><input type="submit" name="send_message" id="form_submit" /></p>
</form>

  </div>	<!--���� ��������-->




<?include "include/footer.php";?>

</div>

</body>
</html>
