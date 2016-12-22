<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	//define('hhh', true);

   include "db_connect.php";
   include "../func/functions.php";

$name = iconv("UTF-8", "cp1251",clear_string($_POST['name']));		//при хостинге удалить все кроме клирстринга
$good = iconv("UTF-8", "cp1251",clear_string($_POST['good']));
$bad = iconv("UTF-8", "cp1251",clear_string($_POST['bad']));
$comment = iconv("UTF-8", "cp1251",clear_string($_POST['comment']));
$id = iconv("UTF-8", "cp1251",clear_string($_POST['id']));

mysql_query("INSERT INTO tbl_review(rev_id,prod_id,name,god_rev,bad_rev,com,date,moder) VALUES('".$www."','".$id."','".$name."','".$good."','".$bad."','".$comment."',NOW(),'".$qqq."')",$link);

echo 'yes';

}

?>