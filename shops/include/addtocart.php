<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include "db_connect.php";

	$id = $_POST["id"];
	$id = substr($id, 3);

	$result = mysql_query("SELECT * FROM cart WHERE ip_cart='{$_SERVER['REMOTE_ADDR']}' AND id_pr_cart='$id'",$link);
	
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		$new_count = $row["count_cart"] + 1;
		$update = mysql_query("UPDATE cart SET count_cart='$new_count' WHERE ip_cart='{$_SERVER['REMOTE_ADDR']}' AND id_pr_cart='$id'", $link);
	} else {
		$result = mysql_query("SELECT * FROM product WHERE id_prod='$id'",$link);
		$row = mysql_fetch_array($result);
		$cnt_crt = 1;
		mysql_query("INSERT INTO cart(id_pr_cart,price_cart,count_cart,datetime_cart,ip_cart) VALUES('".$row['id_prod']."','".$row['price']."','".$cnt_crt."',NOW(),'".$_SERVER['REMOTE_ADDR']."')", $link);
	}
}
?>



