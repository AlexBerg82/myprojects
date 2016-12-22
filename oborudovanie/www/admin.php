<?php
session_start();
if(!isset($_SESSION['login'])){
header("Location: /oborudovanie/www/login.php");
} else {
header('Content-Type: text/html; charset=utf-8');
header($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?'.session_name().'='.session_id());
}

include "include/connect.php";


?>


<HTML>
<HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE> АДМИН ЗВТ </TITLE>

<link rel="stylesheet" media="screen" href="css/style2.css" />
  
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

</HEAD>


<BODY background="/oborudovanie/www/images/fon.jpg">
<div id="shadw"></div>

<div align="right"><?echo "Добрый день, ".$_SESSION['login'];?>&nbsp;&nbsp;&nbsp;&nbsp;<a href='quit.php'> Выход </a></div>
   
<br>





<div id="right">

<div style="overflow:scroll; width:845px; height:416px; margin-top:10px;">


<form action="admin.php" method="POST">

<?php
$query = "SELECT * FROM oborudovanie";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: ".mysql_error());

$rows = mysql_num_rows($result);
   for($j=0; $j<$rows; ++$j){
	$row = mysql_fetch_row($result);
?>

		<input type="hidden" value="0" />
		<input type=checkbox name="id[]" value="<?=$row[0]?>" [checked] />&nbsp;
		
		<a id="red-review<?=$row[0]?>" href=""><img src="/oborudovanie/www/images/red.png" /></a>
			&nbsp;&nbsp;
			<?=$row[1].$row[2].$row[3].$row[4].$row[5].$row[8].$row[9].$row[10].$row[12].$row[13]?>
			<br>
<?}?>
		
	<div id="delt">
		<input type="hidden" name="delete" value="yes" />
		<input type="submit" value="Удалить" />
	</div>
		
</form>
</div>	

			
			
			
			
			
			
			
			
			
<?php
$query = "SELECT * FROM oborudovanie";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: ".mysql_error());

$rows = mysql_num_rows($result);
   for($i=0; $i<$rows; ++$i){
	$row = mysql_fetch_row($result);
?>


	<div id="send-review<?=$row[0]?>">
		<p align="left" class="title-review"> Редактирование </p><p align="right" class="closs"><img src="/oborudovanie/www/images/close.png" /></p>
		<ul class="ulli">
			<li><p align="right"><label class="label-comment"> Место нахождения</label>
				<input id="mest_red<?=$row[0]?>" value="<?=$row[2]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Наименование </label>
				<input id="nam_red<?=$row[0]?>" value="<?=$row[3]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Условное обозначение </label>
				<input id="sym_red<?=$row[0]?>" value="<?=$row[4]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Период </label>
				<input id="per_red<?=$row[0]?>" value="<?=$row[5]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Зав.номер </label>
				<input id="zav_red<?=$row[0]?>" value="<?=$row[8]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Инв.номер </label>
				<input id="inv_red<?=$row[0]?>" value="<?=$row[9]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Подразделение </label>
				<input id="dep_red<?=$row[0]?>" value="<?=$row[10]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment"> Примечание </label>
				<input id="not_red<?=$row[0]?>" value="<?=$row[12]?>" /></p>
			</li>
		</ul>
		<p id="button-red-review<?=$row[0]?>" idd="<?=$row[0]?>" style="cursor:pointer; background: url(/oborudovanie/www/images/button-red.png) no-repeat; height:30px; width:80px; margin-top:25px; padding-bottom:10px; margin-left:330px; border-radius:5px; -wedkit-border-radius:5px; -moz-border-radius:5px;"></p>
	</div>

	
	
<script>
	$("#red-review<?=$row[0]?>").toggle(
	  function(){
		$("#send-review<?=$row[0]?>").fadeIn(400);
		$("#shadw").fadeIn(200);
	  },function(){});
	
	$(".closs").toggle(
	  function(){
		$("#send-review<?=$row[0]?>").fadeOut(400);
		$("#shadw").fadeOut(300);
	  },function(){});


	
	$("#button-red-review<?=$row[0]?>").click(function(){
		var mest_red = $("#mest_red<?=$row[0]?>").val();
		var nam_red = $("#nam_red<?=$row[0]?>").val();
		var sym_red = $("#sym_red<?=$row[0]?>").val();
		var per_red = $("#per_red<?=$row[0]?>").val();
		var zav_red = $("#zav_red<?=$row[0]?>").val();
		var inv_red = $("#inv_red<?=$row[0]?>").val();
		var dep_red = $("#dep_red<?=$row[0]?>").val();
		var not_red = $("#not_red<?=$row[0]?>").val();
		var idd = $("#button-red-review<?=$row[0]?>").attr("idd");
			$.ajax({
			   type: "POST",
			   url: "/oborudovanie/www/include/add_review.php",
			   data: "id="+idd+"&mest_red="+mest_red+"&nam_red="+nam_red+"&sym_red="+sym_red+"&per_red="+per_red+"&zav_red="+zav_red+"&inv_red="+inv_red+"&dep_red="+dep_red+"&not_red="+not_red,
			   dataType: "html",
			   cache: false,
			   success: function(){
					$("#send-review<?=$row[0]?>").fadeOut(400);
					$("#shadw").fadeOut(300);
					location.reload();
			   }
			});
	});
</script>
<?}?>



<?
$query1 = "SELECT number FROM oborudovanie WHERE vise='0'";
$query2 = "SELECT number FROM oborudovanie WHERE vise='1'";
$query3 = "SELECT number FROM oborudovanie WHERE vise='2'";
$query4 = "SELECT number FROM oborudovanie";

$result1 = mysql_query($query1);
$result2 = mysql_query($query2);
$result3 = mysql_query($query3);
$result4 = mysql_query($query4);
	if (!$result1 || !$result2 || !$result3 || !$result4) die ("Сбой при доступе к базе данных: " . mysql_error());
	
$rows1 = mysql_num_rows($result1);
$rows2 = mysql_num_rows($result2);
$rows3 = mysql_num_rows($result3);
$rows4 = mysql_num_rows($result4);

echo '
<p>Списаны: <strong>'.$rows1.'</strong>
			  <br>
			  В наличии: <strong>'.$rows2.'</strong>
			  <br>
			  Проданы: <strong>'.$rows3.'</strong>
			  <br><br>
			  Всего записей: <strong><font color="red">'.$rows4.'</font></strong></p>
';






		
if(isset($_POST['delete']) && isset($_POST['id'])?1:0){
	foreach($_POST['id'] as $key => $val){
		$query1 = "DELETE FROM oborudovanie WHERE id='$val'";

		echo '<meta http-equiv="refresh" content="0;">';
			
		if (!mysql_query($query1, $db_server))
			echo "Сбой при удалении данных: $query1".mysql_error();
		}
}
?>

</div>



</BODY>
</HTML>