<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	$result = mysql_query("SELECT * FROM cart WHERE ip_cart='{$_SERVER['REMOTE_ADDR']}'", $link);
	if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
		do{
			$int = $int + ($row["price_cart"] * $row["count_cart"]);
		}
		while($row = mysql_fetch_array($result));
			echo $int;
	}

}
?>