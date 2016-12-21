<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";
	include "../php/func.php";
	
	
	$sort = $_POST["sortr"];
	$search = strtolower(clear_string($_POST['text']));
	
	switch($sort){
		case 'pricea2':
			$sort = ' ORDER BY price ASC';
			break;
		case 'priced2':
			$sort = ' ORDER BY price DESC';
			break;
		case 'datea2':
			$sort = ' ORDER BY dates ASC';
			break;
		case 'dated2':
			$sort = ' ORDER BY dates DESC';
			break;
		default:
			$sort = '';
			break;
	}

   
	$result = mysql_query("SELECT * FROM magazine WHERE title LIKE '%$search%'", $link);

	if(mysql_num_rows($result) > 0){
		$result = mysql_query("SELECT * FROM magazine WHERE title LIKE '%$search%' $sort", $link);

		$row = mysql_fetch_array($result);
	do{
		echo '<li><div class="tovar_img clearfix"><img src="uploads_images/'.$row["img"].'" alt="no-image"></div><div class="tovar_right clearfix"><p>'.$row["title"].'</p><div class="tovar_desc clearfix"><p>'.$row["description"].'</p><div class="tovar_price clearfix"><p>'.$row["price"].' <span>grn.</span></p><a href="#">BUY</a></div></div></div></li>';
	}
		while($row = mysql_fetch_array($result));
	}
	
}
?>