<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
session_start();

if($_SESSION['likeid'] != (int)$_POST["id"]){
   include "db_connect.php";
   $id = (int)$_POST["id"];

   $result = mysql_query("SELECT * FROM product WHERE id_prod='$id'", $link);

   if(mysql_num_rows($result) > 0){
	   $row = mysql_fetch_array($result);
	   $new_count = $row["likes"] + 1;
	   $update = mysql_query("UPDATE product SET likes='$new_count' WHERE id_prod='$id'", $link);
	   echo $new_count;
   }
	$_SESSION['likeid'] = (int)$_POST["id"];
   } else {
   echo 'no';
	}
}
?>