<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";
	
	$id = $_POST['id'];
	$time = $_POST['time'];

	//обновление поля остатка дней
	mysql_query("UPDATE oborudovanie SET day_residue='$time' WHERE id='$id'", $link);

}
?>