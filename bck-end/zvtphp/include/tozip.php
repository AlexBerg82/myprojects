<?php
	include "db_connect.php";

	$today = date("Y-m-d");

	$result = mysql_query("SELECT id,date_end,path_pdf,zip,path_full FROM oborudovanie", $link);
	
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		//echo $row[0];//id
		//echo $row[1];//date
		//echo $row[2];//name
		//echo $row[3];//path
		if($row[2] != '' && $today >= $row[1]){
			
				$src_path = iconv("UTF-8", "cp1251", $row[4]);
				$new_path = substr($src_path, 3);
				$src_name = iconv("UTF-8", "cp1251", $row[2]);

				$stick_path = iconv("UTF-8", "cp1251", 'Архив/');
				
				$src = $src_path.$src_name;
				$src = substr($src, 3);
				$dest = $src_path.$stick_path.'arch_'.$src_name;
				$dest = substr($dest, 3);

				
				copy($src, $dest);
				unlink($new_path.$row[2]);
				
				$new_name = $row[3].'arch_'.$src_name.',';

				mysql_query("UPDATE oborudovanie SET path_pdf='', zip='$new_name' WHERE id='$row[0]'", $link);
			
		}
		
	}
		while ($row = mysql_fetch_array($result));
	}
	
?>