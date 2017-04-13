<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//вход зарегистрированного пользователя
	include "db_connect.php";
	include "../php/func.php";
	   
	//очистка и шифрование полей
	$login = clear_string($_POST["login"]);
	$pass = md5(clear_string($_POST["pass"]));
	   
	$pass = strrev($pass);
	$pass = strtolower("0000".$pass."0000");

	//вставка в БД
	$result = mysql_query("SELECT * FROM users WHERE (login='$login' OR email='$login') AND pass='$pass'",$link);
		
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		//ответ сервера
		echo 'yes_auth';
	} else {
		echo 'no_auth';
	}

}
?>