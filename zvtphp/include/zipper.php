<?php
include "db_connect.php";

function retResalt2($link){

	$result = mysql_query("SELECT * FROM zipper", $link);

	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}

	return $row2;
}
	
$goods = retResalt2($link);
exit(json_encode($goods));
?>