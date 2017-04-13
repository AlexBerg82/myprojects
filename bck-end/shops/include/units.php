<?php
include "db_connect.php";

function retUnit($link){

	$result = mysql_query("SELECT * FROM category", $link);
	
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}

	return $row2;
}
	
$units = retUnit($link);
exit(json_encode($units));
?>