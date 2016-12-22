<?php
$query = "SELECT * FROM zipper WHERE ";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());

$rows = mysql_num_rows($result);
for ($j=0; $j<$rows; ++$j){

	$row = mysql_fetch_row($result);

echo '<table><tr><td><a href="./image/'.$row[2].'">'.$row[2].'</a></td></tr></table>';
}
?>