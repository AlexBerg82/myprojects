<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//просмотр всех объявлений пользователя
	include "db_connect.php";
	include "../php/func.php";

	$login = clear_string($_POST["viewLogin"]);
	$userId = clear_string($_POST["userId"]);
	   
	$result = mysql_query("SELECT * FROM magazine WHERE user_id='$userId'",$link);

	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		if($row[2] != ''){
			echo '<li class="addUserImg clearfix"><div class="tovar_img clearfix"><img src="uploads_images/'.$row[2].'" alt="img/no-image.png"></div><div class="tovar_right clearfix"><p>'.$row[1].'</p><div class="tovar_desc clearfix"><p>'.$row[4].'</p><div class="tovar_price clearfix"><p>'.$row[3].'<span> grn.</span></p><a href="#" id="del'.$row[0].'">DELETE</a></div></div></div></li>';
		} else {
			echo '<li class="addUserImg clearfix"><div class="tovar_img clearfix"><img src="img/no-image.png" alt="img/no-image.png"></div><div class="tovar_right clearfix"><p>'.$row[1].'</p><div class="tovar_desc clearfix"><p>'.$row[4].'</p><div class="tovar_price clearfix"><p>'.$row[3].'<span> grn.</span></p><a href="#" id="del'.$row[0].'">DELETE</a></div></div></div></li>';
		}
	}
		while ($row = mysql_fetch_array($result));
	} else {
		echo '<li class="emtry"><p>Emtry!!!</p></li>';
	}

}
?>