<!DOCTYPE HTML>
<html>
<head>
	<title>Untitled 2</title>
</head>

<body>
<?php

include "include/connect.php";
$query = "SELECT * FROM oborudovanie";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: ".mysql_error());

$rows = mysql_num_rows($result);
   for($j = 0 ; $j < $rows ; ++$j){
	$row = mysql_fetch_row($result);

?>

		<input type="hidden" value="0" />
		<input type=checkbox name="id[]" value="<?=$row[0]?>" [checked] />&nbsp;
		<a id="red-review<?=$row[0]?>" href=""><img src="/oborudovanie/www/images/red.png" /></a>
			&nbsp;&nbsp;
			<?=$row[1].$row[2].$row[3].$row[4].$row[5].$row[8].$row[9].$row[10].$row[12].$row[13];?>
			<br>
		
<?}?>


</body>
</html>