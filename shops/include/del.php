<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//удаление выбранного 
	include "db_connect.php";

	$idDel = $_POST["idDel"];

	if(isset($_POST['idDel'])){
		$query = "DELETE FROM cart WHERE id_pr_cart='$idDel' AND ip_cart='{$_SERVER['REMOTE_ADDR']}'";
		mysql_query($query) or die (mysql_error());
	}

	
	$result = mysql_query("SELECT * FROM cart WHERE ip_cart='{$_SERVER['REMOTE_ADDR']}'", $link);

	if(mysql_num_rows($result) > 0){
			echo 'full';
	}else {
			echo 'empty';
		}
	
	
	
}
?>