<?php
$db_hostname = 'localhost';
$db_database = 'spisok';
$db_username = 'root';
$db_password = '';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("���������� ������������ � MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
    or die("���������� ������� ���� ������: " . mysql_error());

?>
