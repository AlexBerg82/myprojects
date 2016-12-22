<?php
include "db_connect.php";
	
function retResalt($link){

	//$town = $_POST["town"]; WHERE place='$town'

	$result = mysql_query("SELECT * FROM oborudovanie", $link);

	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}

	return $row2;
}
	
$goods = retResalt($link);
exit(json_encode($goods));
?>