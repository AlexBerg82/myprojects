<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	//define('hhh', true);

   include "db_connect.php";
   include "../func/functions.php";

   $search = strtolower(clear_string($_POST['text']));	

   $result = mysql_query("SELECT * FROM product WHERE title LIKE '%$search%' AND vis='1'", $link);

   if(mysql_num_rows($result) > 0){
	$result = mysql_query("SELECT * FROM product WHERE title LIKE '%$search%' AND vis='1' LIMIT 10", $link);

   $row = mysql_fetch_array($result);

   do{
	echo '<li id="search-search"><a href="search.php?q='.$row["title"].'">'.$row["title"].'</a></li>';
   }
	while($row = mysql_fetch_array($result));
   }

}

?>