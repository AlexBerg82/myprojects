<?php

	//define('hhh', true);

	session_start();

if($_SESSION['auth'] == 'yes_auth'){


	include "include/db_connect.php";		//����������� � ��
	include "func/functions.php";


   if($_POST["save_submit"]){

	$info_surname = clear_string($_POST["info_surname"]);
	$_POST["info_name"] = clear_string($_POST["info_name"]);
	$_POST["info_address"] = clear_string($_POST["info_address"]);
	$_POST["info_phone"] = clear_string($_POST["info_phone"]);
	$_POST["info_email"] = clear_string($_POST["info_email"]);

$error = array();

   $pass = md5($_POST["info_pass"]);
   $pass = strrev($pass);
   $pass = "0000".$pass."1111";

if($_SESSION['auth_pass'] != $pass){
   $error[] = '�������� ������!';
} else {
if($_POST["info_new_pass"] != ""){
   if(strlen($_POST["info_new_pass"]) < 7 || strlen($_POST["info_new_pass"]) > 15){
	$error[] = '������� ����� ������ �� 7 �� 15 ��������!';
} else {
   $newpass = md5(clear_string($_POST["info_new_pass"]));
   $newpass = strrev($newpass);
   $newpass = "0000".$newpass."1111";
   $newpassquery = "pass='".$newpass."',";
}
}

if(strlen($_POST["info_surname"]) < 3 || strlen($_POST["info_surname"]) > 15){
   $error[] = '������� ������� �� 3 �� 15 ��������!';
}
if(strlen($_POST["info_name"]) < 3 || strlen($_POST["info_name"]) > 15){
   $error[] = '������� ��� �� 3 �� 15 ��������!';
}


if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["info_email"]))){
   $error[] = '������� ���������� email';
}
if(strlen($_POST["info_phone"]) == ""){
   $error[] = '������� ����� ��������!';
}
if(strlen($_POST["info_address"]) == ""){
   $error[] = '������� ����� ��������!';
}

}

if(count($error)){
   $_SESSION['msg'] = "<p align='left' id='form-error'>".implode('<br />',$error)."</p>";
} else {
   $_SESSION['msg'] = "<p align='left' id='form-success'> ��������� ���������! </p>";

   $dataquery = $newpassquery."surname='".$_POST["info_surname"]."',name='".$_POST["info_name"]."',email='".$_POST["info_email"]."',phone='".$_POST["info_phone"]."',address='".$_POST["info_address"]."'";

   $update = mysql_query("UPDATE users SET $dataquery WHERE login='{$_SESSION['auth_login']}'",$link);

if($newpass){
   $_SESSION['auth_pass'] = $newpass;
}
	$_SESSION['auth_surname'] = $_POST["info_surname"];
	$_SESSION['auth_name'] = $_POST["info_name"];
	$_SESSION['auth_address'] = $_POST["info_address"];
	$_SESSION['auth_phone'] = $_POST["info_phone"];
	$_SESSION['auth_email'] = $_POST["info_email"];
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
  <script type="text/javascript" src="/shop/www/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.form.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.validate.min.js"></script>

  <script type="text/javascript" src="/shop/www/js/shop-script.js"></script>

<title> ��������-������� </title>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>
  
  

  <div id="block-content">	<!--���� ��������-->

<h3 class="title-h3"> ��������� ������� </h3><p id="nav-ind2">\<a href="index.php"> ������� �������� </a></p>

<?php
if($_SESSION['msg']){
   echo $_SESSION['msg'];
   unset($_SESSION['msg']);
}
?>

<form method="post">

  <ul id="info-profile">
     <li>
     <label for="info_pass"> ������� ������ </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_pass" id="info_pass" value="" />
     </li>

     <li>
     <label for="info_new_pass"> ����� ������ </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_new_pass" id="info_new_pass" value="" />
     </li>

     <li>
     <label for="info_surname"> ������� </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_surname" id="info_surname" value="<?echo $_SESSION['auth_surname'];?>" />
     </li>

     <li>
     <label for="info_name"> ��� </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_name" id="info_name" value="<?echo $_SESSION['auth_name'];?>" />
     </li>

     <li>
     <label for="info_patronymic"> �������� </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_patronymic" id="info_patronymic" value="<?echo $_SESSION['auth_patronymic'];?>" />
     </li>
	
     <li>
     <label for="info_email"> E-mail </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_email" id="info_email" value="<?echo $_SESSION['auth_email'];?>" />
     </li>

     <li>
     <label for="info_phone"> ������� </label>
	  <span class="star"> * </span>
	  <input type="text" name="info_phone" id="info_phone" value="<?echo $_SESSION['auth_phone'];?>" />
     </li>

     <li>
     <label for="info_address"> ����� �������� </label>
	  <span class="star"> * </span>
	  <textarea name="info_address"><?echo $_SESSION['auth_address'];?></textarea>
     </li>
  </ul>

	<p align="right"><input type="submit" name="save_submit" id="form_submit2" value="��������� ���������" /></p>
</form>

  </div>

<div id="paginate"></div>
  <?include "include/footer.php";?>
  
</div>


</body>
</html>

  <?} else { header("Location: index.php");}?>