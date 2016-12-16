<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//удаление выбранного объявления
	include "db_connect.php";
	include "../php/func.php";

	$idDel = clear_string($_POST["idDel"]);

	if(isset($_POST['idDel'])){
		$query = "DELETE FROM magazine WHERE id='$idDel'";
		mysql_query($query) or die (mysql_error());
	}

}
?>