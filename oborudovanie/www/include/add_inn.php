<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

   include "connect.php";

$nom = $_POST['nom'];
$mesto = $_POST['mesto'];
$nam = $_POST['nam'];
$oboz = $_POST['oboz'];
$intt = $_POST['intt'];
$sr = $_POST['sr'];
$inv = $_POST['inv'];
$otd = $_POST['otd'];
$nott = $_POST['nott'];
$nal = $_POST['nal'];
$doc = $_POST['doc'];
$files = $_POST['files'];

$query = "INSERT INTO oborudovanie VALUES"."('$a0', '$nom', '$mesto', '$nam', '$oboz', '$intt', '$a00', '$a000', '$sr', '$inv', '$otd', '$a000', '$nott', '$a0000', '$nal', '$a00000', '$doc')";
	
if (!mysql_query($query, $db_server)) echo "Сбой при обновлении данных: $query".mysql_error();

//move_uploaded_file($_FILES["filename"]["tmp_name"], "image/".$_FILES["filename"]["name"]);

echo 'yes';

}
?>