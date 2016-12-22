<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ЗВТ</title>
	<link rel="stylesheet" media="screen" href="css/style.css" />

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/tab.js"></script>
	
</head>
<body>
<div class="wrapper">
	<div class="filtr">
		<div class="corner"><p>&#9660;</p></div>
		
		<div class="filters">
			<p class="listPlace clearfix">
				<label for="town">Место нахождения</label>
				<select required name="town">
					<option selected id="all" onClick=""> Все </option>
					<option value="" id="vishgorod" value="Вышгород"> Вышгород </option>
					<option value="" id="dnepr" onClick=""> Днепропетровск </option>
				</select>
			</p>

			<p class="listSale">
				<label for="spis">Списаны</label>
				<input type=checkbox id="spisano" name="spis" value="" onClick=""[checked] />
				<label for="prod">Проданы</label>
				<input type=checkbox id="prodano" name="prod" value="" onClick=""[checked] />
			</p>

			<p class="departament clearfix">
				<label for="department">Отдел</label>
				<select required name="department">
					<option selected> Все </option>
					<option value="" id="laboratory"> Лаборатория </option>
					<option value="" id="vtv"> ВТВ </option>
					<option value="" id="kb"> КБ </option>
					<option value="" id="remont"> Ремонтный участок </option>
					<option value="" id="manufacture"> Производство </option>
				</select>
			</p>

			<p class="timePeriod">
				<label for="days45">45</label>
				<input type=checkbox id="45" name="mans" value="" onClick=""[checked] />
				<label for="pros">Просроченные</label>
				<input type=checkbox id="prosrochka" name="pros" value="" onClick=""[checked] />
			</p>
		</div>
		
	</div>
	
	<div class="panel">
		<div class="corner2"><p>&#9668;</p></div>
		<p id="addUnit">+</p>
		<p class="csm"></p>
		<p class="print"></p>

	</div>
	
	<table border="1" class="spc">
		<tr>
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
		<?php

		?>
	</table>
</div>
</body>
</html>