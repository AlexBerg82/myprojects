<?
include "../include/connect.php";
$var = $_GET['var'];
$var2 = $_GET['var2'];
$var3 = $_GET['var3'];
$sort_place = $_GET['sort_place'];
$sort_depart = $_GET['sort_depart'];

?>

<HTML>
<HEAD><meta charset="utf-8">
<TITLE> Шаблон ЗВТ </TITLE>

<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="template.css" />

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="template.js"></script>

</HEAD>


<BODY>
<div id="header"><img src="111.png" width="1330" height="300" /></div>

</br>

<table border="0">
<tr>
	<td width="1000">№ _____________</td>
	<td width="300">Заступнику</td>
</tr>
<tr>
	<td width="1000">від «____»	___________	2015 р.</td>
	<td width="300">генерального директора</td>
</tr>
<tr>
	<td></td>
	<td width="300">ДП «Укрметртестстандарт»</td>
</tr>
<tr>
	<td></td>
	<td width="300">Кузьменку Ю.В.</td>
</tr>
</table>


</br>


<p>Щодо проведення повірки ЗВТ</p>
<p>Шановний Юрію Володимировичу!</p>

<p>ТОВ „НІК-ЕЛЕКТРОНІКА” просить Вас виставити рахунок та провести чергову повірку наступних робочих еталонів (РЕ), у зв’язку із закінченням строку дії свідотцтв:</p>






<table border="1" cellspacing="0" style="text-align:center;">
<tr>
	<td id="hidoff" width="20"> № п/п </td>
	<td width="100"> Найменування ЗВТ </td>
	<td width="80"> Тип ЗВТ </td>
	<td width="80"> Виробник </td>
	<td width="120"> Заводський номер </td>
	<td width="60"> Кількість </td>
	<td width="200"> Діапазон </td>
	<td width="200"> Клас точності, розряд, похибка </td>
</tr>
<tr>
	<td width="20"> 1 </td>
	<td width="100"> 2 </td>
	<td width="80"> 3 </td>
	<td width="80"> 4 </td>
	<td width="120"> 5 </td>
	<td width="60"> 6 </td>
	<td width="200"> 7 </td>
	<td width="200"> 8 </td>
</tr>

<?php
$query = "SELECT * FROM oborudovanie $var $var2 $var3 $sort_place $sort_depart";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: " . mysql_error());

$rows = mysql_num_rows($result);
for ($j = 0 ; $j < $rows ; ++$j){

	$row = mysql_fetch_row($result);
	
echo '
<script language="JavaScript">
<!--скрытие ненужных строк-->
	$(document).ready(function(){
		$("#hid'.$row[0].'").click(
		  function(){
			$("#tr'.$row[0].'").fadeOut(400);
		  });
<!--отображение скрытых строк-->
		$("#hidoff").click(function(){
			$("#tr'.$row[0].'").fadeIn(400);
		  });
	});
</script>




  <tr id="tr'.$row[0].'" align="center" height="50">
	<td id="hid'.$row[0].'" width="2%">'.$row[1].'</td>
	<td width="8%">'.$row[3].'</td>
	<td width="8%">'.$row[4].'</td>
	<td width="3%">--</td>
	<td width="5%">'.$row[8].'</td>
	<td width="3%">1</td>
	<td width="10%">--</td>
	<td width="5%">--</td>
  </tr>
';
}
?>

</table>



<p>Свідоцтва  видати для ТОВ «НІК-ЕЛЕКТРОНІКА». До свідоцтва про повірку просимо надати протокол.</p>
<p>Оплату гарантуємо.</p>

<p>Наші реквізити:</p>
<p>Юридична адреса: 04212, м. Київ, вул. Маршала Тимошенка, буд. 13А, приміщення 606, тел.: (044) 498-06-19
р/р 26006010067669 в АТ "Укрексімбанк" м. Києва.
МФО банку: 322313.
Ідентифікаційний код за ЄДРПОУ: 33401202.
Індивідуальний податковий номер: 334012026551.
Платник податку на прибуток підприємства на загальних умовах.</p>

<p>З повагою,</p>
<p>Директор			__________________________	Морозов О.А.</p>
<p>(підпис)</p>
<p>МП</p>

<div id="tuda"></div>

</BODY>
</HTML>