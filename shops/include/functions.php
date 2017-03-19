<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include "db_connect.php";
	
function retResalt($link){
	
	$ask = $_POST["idBrand"];
	$types = "AND type='".$_POST["types"]."'";
	$sort = $_POST["sort"];
	
	$ask = str_replace("\\","",$ask);
	
	if($ask > ''){
		$word = 'WHERE';
		$ask = 'brand IN ('.$ask.')';
	}
	
	
	switch($sort){
		case 'pricea':
			$sort = 'ORDER BY price ASC';
			break;
		case 'priced':
			$sort = 'ORDER BY price DESC';
			break;
		case 'namea':
			$sort = 'ORDER BY title ASC';
			break;
		case 'named':
			$sort = 'ORDER BY title DESC';
			break;
		default:
			$sort = '';
			break;
	}
	
	
	$result = mysql_query("SELECT * FROM product $word $ask $types $sort", $link);
	
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
}
?>