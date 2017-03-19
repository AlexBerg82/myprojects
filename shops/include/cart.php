<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include "db_connect.php";
	
function retCart($link){
	$result = mysql_query("SELECT * FROM cart,product WHERE cart.ip_cart='{$_SERVER['REMOTE_ADDR']}' AND product.id_prod=cart.id_pr_cart", $link);
	
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}

	return $row2;
}
	
$goods = retCart($link);
exit(json_encode($goods));
}
?>