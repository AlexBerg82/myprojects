<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//получение ID пользователя
	include "db_connect.php";
	include "../php/func.php";
	   
	$login = clear_string($_POST["login"]);

	$result = mysql_query("SELECT id FROM users WHERE login='$login'",$link);
		
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
			
		echo $row[0];
	}

}
?>