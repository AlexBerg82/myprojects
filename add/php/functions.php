<?php
//сортировка
include "include/db_connect.php";
	
function retResalt($link){
	
	$category = $_GET["cat"];
	$sort = $_GET["sor"];
	
	
		switch($category){
		case 'electr':
			$category = ' WHERE category="electronic"';
			break;
		case 'clos':
			$category = ' WHERE category="closer"';
			break;
		default:
			$category = '';
			break;
	}

	
	switch($sort){
		case 'pricea':
			$sort = ' ORDER BY price ASC';
			break;
		case 'priced':
			$sort = ' ORDER BY price DESC';
			break;
		case 'datea':
			$sort = ' ORDER BY dates ASC';
			break;
		case 'dated':
			$sort = ' ORDER BY dates DESC';
			break;
		default:
			$sort = '';
			break;
	}
	
	
	
	$result = mysql_query("SELECT * FROM magazine $category $sort", $link);

	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}
	//var_dump($row);
	return $row2;
}
	
$goods = retResalt($link);

exit(json_encode($goods));
?>