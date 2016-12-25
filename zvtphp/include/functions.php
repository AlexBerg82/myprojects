<?php
include "db_connect.php";
	
function retResalt($link){

	$town = $_POST["town"];
	$dept = $_POST["depart"];

	
if($town == '' && $dept == ''){
	$place = '';
	$department = '';
}	
if($town != '' && $dept == ''){
	$place = " WHERE place='".$town."'";
}
if($town == '' && $dept != ''){
	$department = " WHERE department='".$dept."'";
}
if($town != '' && $dept != ''){
	$department = " WHERE place='".$town."' AND department='".$dept."'";
}	
	
	
	$result = mysql_query("SELECT * FROM oborudovanie $place $department", $link);
	
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