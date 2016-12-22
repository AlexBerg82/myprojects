<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

   include "connect.php";

$mest_red = $_POST['mest_red'];
$nam_red = $_POST['nam_red'];
$sym_red = $_POST['sym_red'];
$per_red = $_POST['per_red'];
$id = $_POST['id'];
$zav_red = $_POST['zav_red'];
$inv_red = $_POST['inv_red'];
$dep_red = $_POST['dep_red'];
$not_red = $_POST['not_red'];

$query = "UPDATE oborudovanie SET place='$mest_red', name='$nam_red', symbol='$sym_red', period='$per_red', number_factory='$zav_red', number_serial='$inv_red', department='$dep_red', note='$not_red' WHERE id='$id'";
		
if (!mysql_query($query, $db_server)) echo "Сбой при обновлении данных: $query".mysql_error();

echo 'yes';

}
?>