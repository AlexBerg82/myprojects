<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

session_start();

include("../include/db_connect.php");
include("../func/functions.php");

$error = array();

$login = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_login'])));
$pass = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_pass'])));
$surname = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_surname'])));
$name = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_name'])));
$email = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_email'])));
$phone = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_phone'])));
$address = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_address'])));

   if(strlen($login) < 5 or strlen($login) > 15){
      $error[] = "Логин должен быть от 5 до 15 символов!";
   } else {
      $result = mysql_query("SELECT login FROM users WHERE login='$login'",$link);
	   if(mysql_num_rows($result) > 0){
		$error[] = "Логин занят!";
	   }
   }

if(strlen($pass) < 7 or strlen($pass) > 15) $error[] = "Пароль должен быть от 7 до 15 символов!";
if(strlen($surname) < 3 or strlen($pass) > 20) $error[] = "Фамилия должна быть от 3 до 20 символов!";
if(strlen($name) < 3 or strlen($pass) > 15) $error[] = "Имя должно быть от 3 до 15 символов!";
if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Укажите правильный email";
if(!$phone) $error[] = "Укажите номер телефона!";
if(!$address) $error[] = "Укажите адрес доставки!";

/*if($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) $error[] = "Неверная картинка!";
   unset($_SESSION['img_captcha']);*/


if(count($error)){
   echo implode('<br />',$error);
} else {
   $pass = md5($pass);
   $pass = strrev($pass);
   $pass = "0000".$pass."1111";

   $ip = $_SERVER['REMOTE_ADDR'];

   mysql_query("INSERT INTO users(login,pass,surname,name,email,phone,address,datetime,ip)
   VALUES('".$login."','".$pass."','".$surname."','".$name."','".$email."','".$phone."','".$address."',NOW(),'".$ip."')
   ",$link);

   echo 'true';
   }

}
?>