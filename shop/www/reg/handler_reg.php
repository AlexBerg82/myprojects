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
      $error[] = "����� ������ ���� �� 5 �� 15 ��������!";
   } else {
      $result = mysql_query("SELECT login FROM users WHERE login='$login'",$link);
	   if(mysql_num_rows($result) > 0){
		$error[] = "����� �����!";
	   }
   }

if(strlen($pass) < 7 or strlen($pass) > 15) $error[] = "������ ������ ���� �� 7 �� 15 ��������!";
if(strlen($surname) < 3 or strlen($pass) > 20) $error[] = "������� ������ ���� �� 3 �� 20 ��������!";
if(strlen($name) < 3 or strlen($pass) > 15) $error[] = "��� ������ ���� �� 3 �� 15 ��������!";
if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "������� ���������� email";
if(!$phone) $error[] = "������� ����� ��������!";
if(!$address) $error[] = "������� ����� ��������!";

/*if($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) $error[] = "�������� ��������!";
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