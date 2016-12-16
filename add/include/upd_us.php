<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//редактирование профиля
	include "db_connect.php";
	include "../php/func.php";
	   
	$name = clear_string($_POST["nameRed"]);
	$userId = clear_string($_POST["userId"]);
	$mail = clear_string($_POST["sessMail"]);
	   
	mysql_query("UPDATE users SET name='$name', email='$mail' WHERE id='$userId'", $link);

}
?>