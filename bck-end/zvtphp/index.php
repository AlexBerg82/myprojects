<?php
	include "include/tozip.php"
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ЗВТ</title>
	<link rel="stylesheet" media="screen" href="css/main.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/tcal.css" />-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/tab.js"></script>
	<script type="text/javascript" src="js/jquery.session.js"></script>
	<!--<script type="text/javascript" src="js/tcal.js"></script>-->
	
	<script>
		//информация о загружаемом файле
		function getName(str){
			if(str.lastIndexOf("\\")){
				var i = str.lastIndexOf("\\")+1;
			}else{
				var i = str.lastIndexOf("/")+1;
			}
			var filename = str.slice(i);
			var uploaded = document.getElementById("fileformlabel");
			uploaded.innerHTML = filename;
		}
	</script>
</head>

<body>
<div class="wrapper">

	<div class="filtersBlock">
		<div class="btnFlrt">
			<div class="crn"></div>
		</div>

		<div class="filtr">
			<p>
				<label for="town">Место нахождения</label>
				<select required id="town">
					<option value="" selected> Все </option>
					<option value="Вышгород"> Вышгород </option>
					<option value="Днепропетровск"> Днепропетровск </option>
				</select>
			</p>
			<p>
				<label for="mans">45</label>
				<input type=checkbox name="45" id="time" />
				<br>
				<label for="pros">Просроченные</label>
				<input type=checkbox name="pros" id="pros" />
			</p>
			<p>
				<label for="department">Отдел</label>
				<select required id="depart">
					<option value="" selected> Все </option>
					<option value="Лаб_сч_.э.э"> ЛабораторияЭЭ </option>
					<option value="КБ"> КБ </option>
					<option value="Лаб_сч_т"> ЛабораторияТ </option>
				</select>
			</p>
			<p>
				<label for="spis">Списаны</label>
				<input type=checkbox name="spis" id="spis" />
				<br>
				<label for="prod">Проданы</label>
				<input type=checkbox name="prod" id="prod" />
			</p>
			
			<button id="fltr">Фильтр</button>
		</div>

		
		<div class="panel">
			<a href="template.php" target="_blank" class="csm" id="csm"></a>
			<a href="#" class="print"></a>
		</div>
	</div>

	
	
	<table border="1" class="spc">
		<tr class="hid">
			<th><p>№ п/п</p></th>
			<th class="thd" onclick="sort(this)"><p>Место нахождения</p></th>
			<th class="thd" onclick="sort(this)"><p>Наименование</p></th>
			<th class="thd" onclick="sort(this)"><p>Условное обозначение СИТ</p></th>
			<th class="thd" onclick="sort(this)"><p>Периодичность поверки, мес.</p></th>
			<th class="thd" onclick="sort(this)"><p>Дата последней поверки</p></th>
			<th class="thd" onclick="sort(this)"><p>Дата очередной поверки</p></th>
			<th class="thd" onclick="sort(this)"><p>Заводской №</p></th>
			<th class="thd" onclick="sort(this)"><p>Инвентарный №</p></th>
			<th class="thd" onclick="sort(this)"><p>Подразделение предприятия</p></th>
			<th class="thd" onclick="sort(this)"><p>Осталось до поверки</p></th>
			<th><p>Примечание</p></td>
		</tr>
	</table>
	
	<div class="add">
		<a href="#" id="addUnit" onclick="return false;">+</a>
		<p>Добавить новую позицию</p>
	</div>
</div>
</body>
</html>