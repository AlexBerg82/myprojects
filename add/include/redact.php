<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//редактирование профиля
	include "db_connect.php";
	include "../php/func.php";
	   
	function retRedac($link){
		//$login = clear_string($_POST["viewLogin"]);
		$userId = clear_string($_POST["userId"]);
	   
		$result = mysql_query("SELECT * FROM users WHERE id='$userId'",$link);
		
		if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
		do{
			return $row;
		}
			while ($row = mysql_fetch_array($result));
		}
	}
	//получение объкта (ответа) сервера
	$goods = retRedac($link);
	exit(json_encode($goods));

}
?>