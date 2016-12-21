<?php
//подключение к БД
$db_host = 'localhost';
$db_database = 'spisok';
$db_user = 'root';
$db_pass = '';

$link = mysql_connect($db_host, $db_user, $db_pass);

mysql_select_db($db_database, $link) or die("Невозможно выбрать базу данных: ".mysql_error());
mysql_query("SET names UTF-8");
?>