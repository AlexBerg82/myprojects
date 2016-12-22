<?php
//соединение с БД
include "include/connect.php";

//сортировка по Месту нахождения
	$sort_place = $_GET["town"];
switch($sort_place){
  case 'Вышгород':
    	$sort_place = "AND place='Вышгород'";
		$var = "WHERE vise='1'";
    break;
  case 'Горловка':
    	$sort_place = "AND place='Горловка'";
		$var = "WHERE vise='1'";
    break;
  case 'Днепропетровск':
    	$sort_place = "AND place='Днепропетровск'";
		$var = "WHERE vise='1'";
    break;
      default:
	$sort_place = '';
	$var = "WHERE vise='1'";
	break;
}

//сортировка по Отделу
	$sort_depart = $_GET["depart"];
switch($sort_depart){
  case 'Лаборатория':
    	$sort_depart = "AND department='Лаборатория'";
	$var = "WHERE vise='1'";
    break;
  case 'ВТВ':
    	$sort_depart = "AND department='ВТВ'";
	$var = "WHERE vise='1'";
    break;
  case 'КБ':
    	$sort_depart = "AND department='КБ'";
	$var = "WHERE vise='1'";
    break;
  case 'Ремонтный участок':
    	$sort_depart = "AND department='Ремонтный участок'";
	$var = "WHERE vise='1'";
    break;
  case 'Отдел ремонта':
    	$sort_depart = "AND department='Отдел ремонта'";
	$var = "WHERE vise='1'";
    break;
      default:
	$sort_depart = '';
	$var = "WHERE vise='1'";
	break;
}

//сортировка по наличию
if(isset($_GET["spis"]) && isset($_GET["prod"])){
	$var = "WHERE vise='0' OR vise='2'";
}
if(isset($_GET["spis"]) && !isset($_GET["prod"])){
	$var = "WHERE vise='0'";
}
if(!isset($_GET["spis"]) && isset($_GET["prod"])){
	$var = "WHERE vise='2'";
}

//сортировка по Остатку времени
if(isset($_GET["mans"]) && isset($_GET["pros"])){
	$var2 = "AND (day_residue <= 0 || day_residue <= 45)";
}
if(isset($_GET["mans"]) && !isset($_GET["pros"])){
	$var2 = "AND (day_residue > 0 && day_residue < 45)";
}
if(isset($_GET["pros"]) && !isset($_GET["mans"])){
	$var2 = "AND (day_residue <= 0)";
}
?>



<HTML lang="ru">
<HEAD><meta charset="utf-8">
<TITLE> Список ЗВТ </TITLE>

<link rel="stylesheet" media="screen" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/tcal.css" />
	
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/filtr.js"></script>
<script type="text/javascript" src="js/tcal.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>


<script language="JavaScript">
<!--изменение чекбокса ФИЛЬТР-->
$(document).ready(function(){
$('#galka').toggle(
  function(){
  	$("#galka").removeClass('galka-noactive');
	$("#galka").addClass('galka-active');
    $("#head").fadeIn(400);
  },
  function(){
	$("#galka").removeClass('galka-active');
  	$("#galka").addClass('galka-noactive');
    $("#head").fadeOut(400);
});
});



<!--PDF-->
window.onload = function (){
   var success = new PDFObject({ url: "/oborudovanie/www/image/rele.pdf" }).embed();
};


$(document).ready(function(){
$("#add-input").toggle(
	function(){
		$("#left").fadeIn(400);
		$("#shadw").fadeIn(200);
	},function(){});
$(".closs").toggle(
	function(){
		$("#left").fadeOut(400);
		$("#shadw").fadeOut(300);
	},function(){});
});
</script>

</HEAD>


<BODY>

<div id="block-body">

<script language="JavaScript">
<!--выбор по чекбаксам в фильтре-->
	$(document).ready(function(){
		$('#31,#32,#33,#41,#42,#43,#44,#45').click(
		  function(){
			$("#1,#2,#5,#6").attr("disabled","disabled");
		});
	});
</script>


<div id="head1"></div>

<div id="head">
<!--форма фильтра-->
<form action="index.php" method="get">
	<p>Место нахождения <select id="3" required name="town">
		<option selected id="30"> Все </option>
		<option value="Вышгород" id="31"> Вышгород </option>
		<option value="Горловка" id="32"> Горловка </option>
		<option value="Днепропетровск" id="33"> Днепропетровск </option>
	</select>
	</p>

	<p class="list_sale">
	Списаны	<input type=checkbox id="1" name="spis" value="0" onClick="ChkState1();"[checked] />
	Проданы	<input type=checkbox id="2" name="prod" value="2" onClick="ChkState2();"[checked] />
	</p>

	<p class="otdels">
   Отдел <select id="4" required name="depart">
		<option selected> Все </option>
		<option value="Лаборатория" id="41"> Лаборатория </option>
		<option value="ВТВ" id="42"> ВТВ </option>
		<option value="КБ" id="43"> КБ </option>
		<option value="Ремонтный участок" id="44"> Ремонтный участок </option>
		<option value="Производство" id="45"> Производство </option>
	</select>
	</p>

	<p class="timeout">
	45 <input type=checkbox id="5" name="mans" value="5" onClick="ChkState3();"[checked] />
	Просроченные <input type=checkbox id="6" name="pros" value="6" onClick="ChkState4();"[checked] />
	</p>
	<p>
 	<input type="submit" name="submit" id="filtr" value="Фильтр" />
	</p>
</form>


<?php
//кнопки ПЕЧАТЬ и ШАБЛОН ПИСЬМА
echo '
<div class="print_temp">
   <a href="template/etalon.php?var='.$var.'&var2='.$var2.'&var3='.$var3.'&sort_place='.$sort_place.'&sort_depart='.$sort_depart.'" id="csm" target="_blank" onclick="" title="Шаблон письма в ЦСМ"></a>
   <a href="#" id="printer" onclick="print_()" title="Печать выбранного"></a>
</div>

</div>
';
?>

<div id="shadw"></div>
<div id="bod">

<div id="header">
	<!--чекбокс ФИЛЬТР-->
	<a id="galka" class="galka-noactive"></a><label> Фильтр </label>
	<p id="add-input"><img src="/oborudovanie/www/images/add-input.png" /></p>
</div>

<br><br>


<div id="scrl">
<table border="1" class="spc">

  <tr align="center">
	<th width="50"><p class="msto"> № п/п </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto22"> Место нахождения </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto23"> Наименование </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto24"> Условное обозначение СИТ </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto25"> Периодичность поверки, мес. </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto26"> Дата последней поверки </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto27"> Дата очередной поверки </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto28"> Заводской № </p></th>
	<th class="thd" onclick="sort(this)"><p class="msto29"> Инвентарный № </p></th>
	<th class="thd" onclick="sort(this)" width="150"><p class="msto30"> Подразделение предприятия </p></th>
	<th class="thd" onclick="sort(this)" width="55"><p class="msto31"> Осталось до поверки </p></th>
	<th width="100"><p class="msto32"> Примечание </p></td>
  </tr>



<?php
$query = "SELECT * FROM oborudovanie $var $var2 $var3 $sort_place $sort_depart";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: ".mysql_error());

$rows = mysql_num_rows($result);
for ($j=0; $j<$rows; ++$j){

	$row = mysql_fetch_row($result);

	
//расчет остатка дней
   $dt=$row[7]."00:00:00";
   $s_year=substr($dt,0,4);
   $s_month=substr($dt,5,2);
   $s_day=substr($dt,8,2);
   $num_days=ceil((mktime(0,0,0,$s_month,$s_day,$s_year)-time())/86400);

   
//формирование формата даты
$dates = date_create($row[6]);
$date_format = date_format($dates, 'd-m-Y');

$dates2 = date_create($row[7]);
$date_format2 = date_format($dates2, 'd-m-Y');


//окрас ячеек ОСТАТОК ДНЕЙ ДО ПОВЕРКИ
if($num_days<=0){
   $color = "red";
}
if($num_days>0 && $num_days<45){
   $color = "green";
}


	
echo '
  <tr align="center" height="50">
	<td id="hid'.$row[0].'" width="50"><p class="msto">'.$row[1].'
		<form action="index.php" method="POST">
			<a id="red-review'.$row[0].'" href=""><img src="/oborudovanie/www/images/red.png" /></a>&nbsp;&nbsp;
			<a id="delete'.$row[0].'" href=""><img src="/oborudovanie/www/images/del.png" /></a>
		</form></p>
	</td>
	<td width="120"><p class="msto2">'.$row[2].'</p></td>
	<td width="110"><p class="msto3">'.$row[3].'</p></td>
	<td width="100"><p class="msto4">'.$row[4].'</p></td>
	<td width="90"><p class="msto5">'.$row[5].'</p></td>
	
	<td width="130"><p class="msto6"><div name="date_begin" id="date_begin">'.$date_format.'&nbsp;<a id="red'.$row[0].'"><img id="paint'.$row[0].'" src="/oborudovanie/www/images/red.png" title="Правка даты" /></a></div>
		<div name="dat" id="dat'.$row[0].'">
		   <form name="form" id="form'.$row[0].'" method="post">
				<input type="hidden" name="d_y_f" value="'.$row[0].'" />
				<input type="text" required name="date_from" class="tcal" size="10" value="" />
				<input type="submit" name="ot" id="ot" value="OK" />
		   </form>
		</div></p>
	</td>

	<td width="130"><p class="msto7"><div name="date_end" id="date_end">'.$date_format2.'&nbsp;<a id="reds'.$row[0].'"><img id="paints'.$row[0].'" src="/oborudovanie/www/images/red.png" title="Правка даты" /></a></div>
		<div name="dats" id="dats'.$row[0].'">
		   <form name="form" id="forms'.$row[0].'" method="post">
				<input type="hidden" name="d_y_t" value="'.$row[0].'" />
				<input type="text" required name="date_to" class="tcal" size="10" value="" />
				<input type="submit" name="do" id="do" value="OK" />
		   </form>
		</div></p>
	</td>

	<td width="90"><p class="msto8"><a href="/oborudovanie/www/image/'.$row[14].'" title="Просмотреть действующее сведетельство">'.$row[8].'</a><div id="zipp'.$row[0].'" data-title="Архивные документы"><img src="images/zipp.png" /></div>
';


//разбиение списка документов на составляющие
echo '<div id="zipper'.$row[0].'">';

	$zipp = explode(',', $row[16]);
	foreach($zipp as $key => $val){
		echo '<br><a href="/oborudovanie/www/image/zip/'.$val.'">'.$val.'</a>';
	}
	
echo '<div><br></p></td>

	<td width="70"><p class="msto9">'.$row[9].'</p></td>
	<td width="150"><p class="msto10">'.$row[10].'</p></td>
	<td bgcolor="'.$color.'" width="55"><p class="msto11">'.$num_days.'</p></td>
	<td id="prim'.$row[0].'" width="100"><p class="msto12"><div id="prime'.$row[0].'" style="font:11px sans-serif; text-overflow:ellipsis; width:100px; height:30px; white-space:nowrap; overflow:hidden;">'.$row[12].'</div></p></td>
  </tr>
';


//изменение курсора при наведении его на ПРИМЕЧАНИЕ (изменяется только там где есть комментарий)
if($row[12]!=""){
echo '
<script language="JavaScript">
	$(document).ready(function(){
		$("#prim'.$row[0].'").css("cursor","zoom-in");
	});
</script>
';
}


//вывод АРХИВНЫХ ДОКУМЕНТОВ при нажатии значка архива (выводятся только там где они есть)
if($row[16]>0){
echo '
<script language="JavaScript">
	$(document).ready(function(){
		$("#zipp'.$row[0].'").toggle(
		  function(){
			$("#zipper'.$row[0].'").fadeIn(400);
		  },
		  function(){
			$("#zipper'.$row[0].'").fadeOut(400);
		  });
			$("#zipp'.$row[0].' > img").show();
			$("#zipp'.$row[0].' > img").css("cursor","pointer");
			$("#zipp'.$row[0].'").addClass("titl");
	});
</script>
';
}else{
echo '
<script language="JavaScript">
	$(document).ready(function(){
		$("#zipp'.$row[0].' > img").hide();
	});
</script>
';
}

//оформление примечания
echo '
<script language="JavaScript">
$(document).ready(function(){
	$("#prim'.$row[0].'").mouseover(function(){
		$("#prime'.$row[0].'").attr("style","width:100px;");
	});
	$("#prim'.$row[0].'").mouseout(function(){
		$("#prime'.$row[0].'").attr("style","text-overflow:ellipsis; width:100px; height:30px; white-space:nowrap; overflow:hidden;");
	});
});
</script>


<script language="JavaScript">
<!--кнопки редактирования даты-->
$(document).ready(function(){
	$("#red'.$row[0].'").toggle(
	  function(){
		$("#red'.$row[0].'").attr("id","");
		$("#paint'.$row[0].'").attr("src","/oborudovanie/www/images/reda.png");
		$("#dat'.$row[0].'").fadeIn(400);
	  },
	  function(){
		$("#red'.$row[0].'").attr("id","");
		$("#paint'.$row[0].'").attr("src","/oborudovanie/www/images/red.png");
		$("#dat'.$row[0].'").fadeOut(400);
	});

	$("#reds'.$row[0].'").toggle(
	  function(){
		$("#reds'.$row[0].'").attr("id","");
		$("#paints'.$row[0].'").attr("src","/oborudovanie/www/images/reda.png");
		$("#dats'.$row[0].'").fadeIn(400);
	  },
	  function(){
		$("#reds'.$row[0].'").attr("id","");
		$("#paints'.$row[0].'").attr("src","/oborudovanie/www/images/red.png");
		$("#dats'.$row[0].'").fadeOut(400);
	});
});
</script>
';


$query = "UPDATE oborudovanie SET day_residue='$num_days' WHERE id='$row[0]'";

if (!mysql_query($query, $db_server)) echo "Сбой при удалении данных: $query1".mysql_error();

unset($color);
}

//обновление даты поверки в БД
if (isset($_POST['date_from']) && isset($_POST['d_y_f'])){
	$aaa=($_POST['d_y_f']);
	$ddf=($_POST['date_from']);

$query = "UPDATE oborudovanie SET date_begin='$ddf' WHERE id='$aaa'";

if (!mysql_query($query, $db_server)) echo "Сбой при удалении данных: $query1".mysql_error();

	echo '<meta http-equiv="refresh" content="0;">';
}

//обновление даты следующей поверки в БД
if (isset($_POST['date_to']) && isset($_POST['d_y_t'])){
	$bbb=($_POST['d_y_t']);
	$dyt=($_POST['date_to']);

$query = "UPDATE oborudovanie SET date_end='$dyt' WHERE id='$bbb'";

if (!mysql_query($query, $db_server)) echo "Сбой при удалении данных: $query1".mysql_error();

	echo '<meta http-equiv="refresh" content="0;">';
}
?>



</table>
</div>

</div>







<div id="left">
<!--форма добавки нового поля-->
	<label class="label-comment">Новая позиция</label>
		<p class="closs">
			<img src="/oborudovanie/www/images/close.png" />
		</p>

	<form action="index.php" method="post" enctype="multipart/form-data">
		<ul class="ulli">
			<li>
				<p><label class="label-comment2"> № п/п </label>
				<input type=text id="nom" name="number" size="3" value="" required />
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Место нахождения </label>
				<select id="mesto" name="town">
					<option selected id="21" value="Вышгород"> Вышгород </option>
					<option value="Горловка" id="22"> Горловка </option>
					<option value="Днепропетровск" id="23"> Днепропетровск </option>
				</select>
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Наименование </label>
				<input type=text name="name" size="20" id="nam" value="" />
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Обозначение </label>
				<input type=text name="symbol" size="20" id="oboz" value="" />
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Интервал </label>
				<select id="intt" required name="period">
					<option selected id="51" value="12"> 12 </option>
					<option value="24" id="52"> 24 </option>
				</select>
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> s/n </label>
				<input type=text id="sr" name="sernum" size="30" value="" />
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> инв/номер </label>
				<input type=text id="inv" name="innum" size="10" value="" />
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Отдел </label>
				<select id="otd" required name="department">
					<option selected value="ЛабораторияЕЕ" id="60"> Лаборатория ЕЕ </option>
					<option value="ЛабораторияЛВ" id="61"> Лаборатория ЛВ </option>
					<option value="ЛабораторияТ" id="62"> Лаборатория Т </option>
					<option value="ЛабораторияОТК" id="63"> Лаборатория ОТК </option>
					<option value="ЛабораторияЛГ" id="44"> Лаборатория ЛГ </option>
					<option value="ВТВ" id="42"> ВТВ </option>
					<option value="КБ" id="43"> КБ </option>
					<option value="Производство" id="45"> Производство </option>
				</select>
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Примечание </label>
				<textarea id="nott" name="note" rows="2" cols="30" value=""></textarea>
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Наличие </label>
				<select id="nal" required name="vise"></li>
					<option selected id="21" value="1"> Имеется </option>
					<option value="0" id="22"> Списан </option>
					<option value="2" id="23"> Продан </option>
				</select>
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Имя документа </label>
				<input type=text name="doc" size="20" id="dc" value="" />
				</p>
			</li>
			<li>
				<p><label class="label-comment2"> Документ </label>
				<input type="file" id="files" name="filename" />
				</p>
			</li>
		</ul>
		<input type="submit" id="button-inn-add" value="Добавить в базу" />
	</form>

<script>
	$("#button-inn-add").click(function(){
		var nom = $("#nom").val();
		var mesto = $("#mesto").val();
		var nam = $("#nam").val();
		var oboz = $("#oboz").val();
		var intt = $("#intt").val();
		var sr = $("#sr").val();
		var inv = $("#inv").val();
		var otd = $("#otd").val();
		var nott = $("#nott").val();
		var nal = $("#nal").val();
		var doc = $("#doc").val();
		var files = $("#files").val();
			$.ajax({
			   type: "POST",
			   url: "/oborudovanie/www/include/add_inn.php",
			   data: "nom="+nom+"&mesto="+mesto+"&nam="+nam+"&oboz="+oboz+"&intt="+intt+"&sr="+sr+"&inv="+inv+"&otd="+otd+"&nott="+nott+"&nal="+nal+"&doc="+doc+"&files="+files,
			   dataType: "html",
			   cache: false,
			   success: function(){
					<?move_uploaded_file($_FILES["filename"]["tmp_name"], "image/".$_FILES["filename"]["name"]);?>
					$("#left").fadeOut(400);
					$("#shadw").fadeOut(300);
					location.reload();
			   }
			});
	});
</script>
</div>





<div id="right">
<?php
$query = "SELECT * FROM oborudovanie";

$result = mysql_query($query);
	if (!$result) die ("Сбой при доступе к базе данных: ".mysql_error());

$rows = mysql_num_rows($result);
   for($i=0; $i<$rows; ++$i){
	$row = mysql_fetch_row($result);
?>


	<div id="send-review<?=$row[0]?>">
		<p align="left" class="title-review2"> Редактирование </p><p align="right" class="closs"><img src="/oborudovanie/www/images/close.png" /></p>
		<ul class="ulli2">
			<li><p align="right"><label class="label-comment2"> Место нахождения</label>
				<input id="mest_red<?=$row[0]?>" value="<?=$row[2]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Наименование </label>
				<input id="nam_red<?=$row[0]?>" value="<?=$row[3]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Условное обозначение </label>
				<input id="sym_red<?=$row[0]?>" value="<?=$row[4]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Период </label>
				<input id="per_red<?=$row[0]?>" value="<?=$row[5]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Зав.номер </label>
				<input id="zav_red<?=$row[0]?>" value="<?=$row[8]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Инв.номер </label>
				<input id="inv_red<?=$row[0]?>" value="<?=$row[9]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Подразделение </label>
				<input id="dep_red<?=$row[0]?>" value="<?=$row[10]?>" /></p>
			</li>
			<li><p align="right"><label class="label-comment2"> Примечание </label>
				<textarea id="not_red<?=$row[0]?>" name="note" rows="2" cols="30" value="<?=$row[12]?>"></textarea></p>
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

</div>



</div>


</BODY>
</HTML>