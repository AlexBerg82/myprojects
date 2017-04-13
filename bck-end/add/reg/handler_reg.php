<?php
//регистрация нового пользователя
if($_SERVER['REQUEST_METHOD'] == "POST"){

	include "../include/db_connect.php";
	include "../php/func.php";

	$error = array();
	//очистка и проверка полей
	$login = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_login'])));
	$pass = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_pass'])));
	$name = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_name'])));
	$email = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_email'])));

	   if(strlen($login) < 5 or strlen($login) > 15){
		  $error[] = "Username must be between 5 and 15 characters!";
	   } else {
		  $result = mysql_query("SELECT login FROM users WHERE login='$login'",$link);
		   if(mysql_num_rows($result) > 0){
			$error[] = "Login has already been taken!";
		   }
	   }

	if(strlen($pass) < 7 or strlen($pass) > 15) $error[] = "The password should be from 7 to 15 characters!";
	if(strlen($name) < 3 or strlen($pass) > 15) $error[] = "The name must be between 3 and 15 characters!";
	if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Enter a valid email";

	if(count($error)){
		echo implode('<br>',$error);
	} else {
		//шифрование поля пароль
		$pass = md5($pass);
		$pass = strrev($pass);
		$pass = "0000".$pass."0000";

		//получение IP нового пользователя 
		$ip = $_SERVER['REMOTE_ADDR'];

		//определение браузера пользователя
		$user_agent = $_SERVER["HTTP_USER_AGENT"];
			if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
				elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
				elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
				elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
				elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
			else $browser = "Not Browser";
		   
		   
		//вставка в БД
		mysql_query("INSERT INTO users(name,login,pass,email)
		VALUES('".$name."','".$login."','".$pass."','".$email."')
		",$link);

		echo 'true';
	}
	
}
?>