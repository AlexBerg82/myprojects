<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	
	$sort = $_POST["sortr"];
	$search = $_POST['text'];
	
	switch($sort){
		case 'pricea2':
			$sort = 'ORDER BY price ASC';
			break;
		case 'priced2':
			$sort = 'ORDER BY price DESC';
			break;
		case 'namea2':
			$sort = 'ORDER BY title ASC';
			break;
		case 'named2':
			$sort = 'ORDER BY title DESC';
			break;
		default:
			$sort = '';
			break;
	}

   
	$result = mysql_query("SELECT * FROM product WHERE title LIKE '%$search%'", $link);

	if(mysql_num_rows($result) > 0){
		$result = mysql_query("SELECT * FROM product WHERE title LIKE '%$search%' $sort", $link);

		$row = mysql_fetch_array($result);
	do{
		
		echo '<li><div class="tovar_img clearfix"><img src="uploads_images/'.$row["img"].'" alt="no-image"></div><div class="tovar_right clearfix"><p id="tovar'.$row["id_prod"].'">'.$row["title"].'</p><div class="tovar_desc clearfix"><p>'.$row["description"].'</p><div class="tovar_price clearfix"><p>'.$row["price"].'<span>grn.</span></p><a class="buyBtn" id="buy'.$row["id_prod"].'" href="#">КУПИТЬ</a></div></div></div></li>';
	}
		while($row = mysql_fetch_array($result));
	}
	
}
?>