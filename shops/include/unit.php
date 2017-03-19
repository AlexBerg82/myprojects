<?php
include "db_connect.php";

function oneUnit($link){
	$unit = $_POST["unit"];

	$result = mysql_query("SELECT * FROM product WHERE id_prod='$unit'", $link);
	
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}

	return $row2;
}
	
$unit = oneUnit($link);
exit(json_encode($unit));
?>