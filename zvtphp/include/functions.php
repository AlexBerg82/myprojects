<?php
include "db_connect.php";
	
function retResalt($link){

	$town = $_POST["town"];
	$dept = $_POST["depart"];
	$time = $_POST["time"];
	$pros = $_POST["pros"];
	$spis = $_POST["spis"];
	$prod = $_POST["prod"];
	
	
	if($_POST["idPos"]){
		$idPos = $_POST["idPos"];
		$idPos = substr($idPos, 6);
		$askPos = " AND id='".$idPos."'";
	}else{
		$askPos = '';
	}
	
	
	
	//выборка из БД
	//все (без каких-либо параметров)
	if($town == '' && $dept == '' && $time == '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE vise='1'";
	}
	//все с заданными параметрами
	if($town != '' && $dept != '' && $time != '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."' AND department='".$dept."' AND (day_residue < 45)";
	}
	//город - 45
	if($town != '' && $dept == '' && $time != '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."' AND (day_residue >= 0 && day_residue <= 45)";
	}
	//город - просрочка
	if($town != '' && $dept == '' && $time == '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."' AND (day_residue < 0)";
	}
	//город - 45 - просрочка
	if($town != '' && $dept == '' && $time != '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."' AND (day_residue < 45)";
	}
	//город - 45 - отдел
	if($town != '' && $dept != '' && $time != '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."' AND (day_residue >= 0 && day_residue <= 45) AND department='".$dept."'";
	}
	//город - просрочка - отдел
	if($town != '' && $dept != '' && $time == '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."' AND (day_residue < 0) AND department='".$dept."'";
	}
	//просрочка - отдел
	if($town == '' && $dept != '' && $time == '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE department='".$dept."' AND (day_residue < 0)";
	}
	//45 - отдел
	if($town == '' && $dept != '' && $time != '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE department='".$dept."' AND (day_residue >= 0 && day_residue <= 45)";
	}
	//45
	if($town == '' && $dept == '' && $time != '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE (day_residue >= 0 && day_residue <= 45)";
	}
	//просрочка
	if($town == '' && $dept == '' && $time == '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE (day_residue < 0)";
	}
	//просрочка - 45
	if($town == '' && $dept == '' && $time != '' && $pros != '' && $spis == '' && $prod == ''){
		$ask = " WHERE (day_residue < 45)";
	}
	//город
	if($town != '' && $dept == '' && $time == '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE place='".$town."'";
	}
	//отдел
	if($town == '' && $dept != '' && $time == '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE department='".$dept."'";
	}
	//город - отдел
	if($town != '' && $dept != '' && $time == '' && $pros == '' && $spis == '' && $prod == ''){
		$ask = " WHERE department='".$dept."' AND place='".$town."'";
	}
	
	
	
	//списано
	if($spis != '' && $prod == '' && $town == '' && $dept == '' && $time == '' && $pros == ''){
		$ask = " WHERE vise='0'";
	}
	//продано
	if($spis == '' && $prod != '' && $town == '' && $dept == '' && $time == '' && $pros == ''){
		$ask = " WHERE vise='2'";
	}
	//продано - списано
	if($spis != '' && $prod != '' && $town == '' && $dept == '' && $time == '' && $pros == ''){
		$ask = " WHERE vise in (0,2)";
	}
	
	

	
	$result = mysql_query("SELECT * FROM oborudovanie $ask $askPos", $link);
	
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{
		$row2[] = $row;
	}
		while ($row = mysql_fetch_array($result));
	}

	return $row2;
}
	
$goods = retResalt($link);
exit(json_encode($goods));
?>