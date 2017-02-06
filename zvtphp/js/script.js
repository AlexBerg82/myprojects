$(document).ready(function(){

	$.session.remove("town");
	$.session.remove("depart");
	$.session.remove("time");
	$.session.remove("pros");
	$.session.remove("spis");
	$.session.remove("prod");
		
	var town = '';
	var depart = '';
	var time = '';
	var pros = '';
	var spis = '';
	var prod = '';

	viewData(town,depart,time,pros,spis,prod);



function viewData(town,depart,time,pros,spis,prod){

	//скрытие кнопки добавления новой позиции
	if(prod != '' || spis != '' || town != '' || depart != '' || time != '' || pros != ''){
		$("#addUnit").hide();
	} else {
		$("#addUnit").show();
	}

	
	//вывод всех данных
	$.ajax({
		url:'./include/functions.php',
		type:'post',
		data: "town="+town+"&depart="+depart+"&time="+time+"&pros="+pros+"&spis="+spis+"&prod="+prod,
		dataType:'json',
		success:function(html){
			$(".warning").remove();

				if(html != null){

					$("tr.delt").remove();
					
					for(value in html){

						var dayBegin = html[value]['date_begin'].substr(8);
						var monthBegin = html[value]['date_begin'].substr(5,2);
						var yearBegin = html[value]['date_begin'].substr(0,4);
								
						var dayEnd = html[value]['date_end'].substr(8);
						var monthEnd = html[value]['date_end'].substr(5,2);
						var yearEnd = html[value]['date_end'].substr(0,4);
						
						
						//функция определения остатка дней
						function daysReside(first_date){
							var today = new Date();

							var dt = today.getDate();
							var mn = today.getMonth()+1;
							var yr = today.getFullYear();

							if(dt < 10){dt = '0'+dt;}
							if(mn < 10){mn = '0'+mn;}

							var second_date = dt+'.'+mn+'.'+yr;

							var first_array = first_date.match(/(\d{2})\.(\d{2})\.(\d{4})/);
							var second_array = second_date.match(/(\d{2})\.(\d{2})\.(\d{4})/);
							var first = Date.UTC(first_array[3], first_array[2]-1, first_array[1]);
							var second = Date.UTC(second_array[3], second_array[2]-1, second_array[1]);

							if(first < second){
								dateResid = Math.ceil((second - first)/(1000*60*60*24));
								return +('-'+dateResid);
							}
							if(first > second || first == second){
								return Math.ceil((first - second)/(1000*60*60*24));
							}
						}

						var dateResid = daysReside(dayEnd+'.'+monthEnd+'.'+yearEnd);

						
						//цветовая разметка оставшихся дней
						if(dateResid < -45 || dateResid == 0){var color = '#FF0000';}
						if(dateResid > 0 && dateResid <= 45){var color = '#006400';}
						if(dateResid > 45){var color = '#9C9C9C';}

						
							//показывать архив если он есть
							if(html[value]['zip'] > ''){

								if(html[value]['path_pdf'] > ''){
									$("table").append('<tr class="delt"><td><p class="mst"><a href="#" class="rdct" id="redact'+ html[value]['id'] +'"></a></p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/'+ html[value]['symbol'] +'/'+ html[value]['path_pdf'] +'" target="_blank">'+ html[value]['symbol'] +'</a><div class="zipp"><ul class="zipList" id="zipList'+ html[value]['id'] +'"></ul></div></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ dayBegin + '-' + monthBegin + '-' + yearBegin +'</p></td><td><p class="mst">'+ dayEnd + '-' + monthEnd + '-' + yearEnd +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ dateResid +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');
								} else {
									$("table").append('<tr class="delt"><td><p class="mst"><a href="#" class="rdct" id="redact'+ html[value]['id'] +'"></a></p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="#">'+ html[value]['symbol'] +'</a><div class="zipp"><ul class="zipList" id="zipList'+ html[value]['id'] +'"></ul></div></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ dayBegin + '-' + monthBegin + '-' + yearBegin +'</p></td><td><p class="mst">'+ dayEnd + '-' + monthEnd + '-' + yearEnd +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ dateResid +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');
								}

								var arr = [];
								arr = html[value]['zip'].split(',');
								for(var i = 0; i < arr.length; i++){
									$("#zipList"+ html[value]['id']).append('<li><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/'+ html[value]['symbol'] +'/Архив/'+ arr[i] +'" target="_blank">'+ arr[i] +'</a></li>');
								}
							
							} else {
								if(html[value]['path_pdf'] > ''){
									$("table").append('<tr class="delt"><td><p class="mst"><a href="#" class="rdct" id="redact'+ html[value]['id'] +'"> </a></p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/'+ html[value]['symbol'] +'/'+ html[value]['path_pdf'] +'" target="_blank">'+ html[value]['symbol'] +'</a></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ dayBegin + '-' + monthBegin + '-' + yearBegin +'</p></td><td><p class="mst">'+ dayEnd + '-' + monthEnd + '-' + yearEnd +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ dateResid +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');
								} else {
									$("table").append('<tr class="delt"><td><p class="mst"><a href="#" class="rdct" id="redact'+ html[value]['id'] +'"> </a></p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="#">'+ html[value]['symbol'] +'</a></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ dayBegin + '-' + monthBegin + '-' + yearBegin +'</p></td><td><p class="mst">'+ dayEnd + '-' + monthEnd + '-' + yearEnd +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ dateResid +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');
								}
							}
						


						//обновление позиции остатка дней, для фильтрации
						$.ajax({
							url:'./include/upd_day.php',
							type:'post',
							data: "id="+html[value]['id']+"&time="+dateResid,
						});						
						
						
						//редактирование позиции
						$("#redact"+ html[value]['id']).click(function(){
							$('body').append('<div class="modal" id="modal_out"></div>');
							$('.modal').fadeIn(500);
							$('body').append('<div class="redacter"></div>');
							
							//передача порядкового номера
							var numPos = $(this).html();
							
							var idPos = $(this).attr('id');
							redager(idPos,numPos);
							
							//выход из режима регистрации по нажатию на фон
							$("#modal_out").click(function(){
								$('.redacter').empty().remove();
								$('.modal').empty().remove();
							});
						});

						
						//нумерация п/п
						$(function(){
							$('table td:first-child p a').each(function (i) {
								$(this).html(i+1);
							});
						});

					}

				} else {
					$("tr.delt").remove();
					$(".wrapper").append('<p class="warning">Совпадений не найдено!</p>');
				}

		}
	});

}




	function addUnits(){
		//добавление новой позиции
		$.ajax({
			url:'./include/functions.php',
			type:'post',
			dataType:'json',
			success:function(html){

					$('.redacter').append('<h2 class="redPos"> Добавить позицию </h2><table><tr><td><p class="mst"><select required id="redTown"><option value="Вышгород" selected> Вышгород </option><option value="Днепропетровск"> Днепропетровск </option></select></p></td><td><p class="mst"><input type="text" id="redName" value="" placeholder="Наименование"></p></td><td class="marker"><p class="mst" id="zipp"><input type="text" id="redSymbol" class="inpt_link" value="" placeholder="Условное обозначение"></p></td><td><p class="mst"><select required id="redPeriod"><option value="12"> 12 </option><option value="24"> 24 </option></select></p></td><td><p class="mst_date_from"><input type="text" name="date_to_day" size="2" class="tcal" id="redBegin" maxlength="2" placeholder="дд" value="" /><input type="text" name="date_to_month" size="2" maxlength="2" id="redBegin2" class="tcal" placeholder="мм" value="" /><input type="text" name="date_to_year" size="4" maxlength="4" id="redBegin3" class="tcal" placeholder="ГГГГ" value="" /></p></td><td><p class="mst_date_to"><input type="text" name="date_to_day" size="2" class="tcal" id="redEnd" maxlength="2" placeholder="дд" value="" /><input type="text" name="date_to_month" size="2" maxlength="2" id="redEnd2" class="tcal" placeholder="мм" value="" /><input type="text" name="date_to_year" size="4" maxlength="4" class="tcal" id="redEnd3" placeholder="ГГГГ" value="" /></p></td><td><p class="mst"><input type="text" id="redSerial" class="sinum" value="" placeholder="Зав.номер"></p></td><td><p class="mst"><input type="text" id="redFactory" class="sinum" value="" placeholder="Инв.номер"></p></td><td><p class="mst"><select required id="redDepart"><option value="Лаб_сч_э.э"> ЛабораторияЭЭ </option><option value="Лаб_т"> ЛабораторияТ </option><option value="Лаб_сч_в"> ЛабораторияВ </option><option value="Лаб_сч_г"> ЛабораторияГ </option><option value="Пр_сч_э.э"> ПроизводствоЭЭ </option><option value="Пр_с_п"> ПроизводствоСП </option><option value="КБ"> КБ </option><option value="ВТВ"> ВТВ </option><option value="ОТК"> ОТК </option><option value="Тех"> Технолог </option></select></p></td><td><p class="mst"><textarea id="redNote" placeholder="Примечание"></textarea></p></td></tr></table><textarea id="redAboutPos" placeholder="Хар-ки единицы ЗВТ"></textarea><div class="fileform"><div id="fileformlabel"></div><form enctype="multipart/form-data"><input type="file" id="somename" name="uploadfile" onchange="getName(this.value);"><div class="selectbutton"> Выбор </div></form></div><button class="submit_form" id="addPos"> Добавить </button>');
					
					var usrImg;
					var usrImgType;
					
					//форма добавления фото
					var files;
					$('input[type=file]').change(function(){
						files = this.files;
						
						//название файла и его тип
						$.each(files, function(key2, value2){
							usrImg = value2.name;
							usrImgType = value2.type;
						});
					});
			
			
					$("#addPos").click(function(){
						
						var redTown = $('#redTown').val();
						var redName = $('#redName').val();
						var redSymbol = $('#redSymbol').val();
						var redPeriod = $('#redPeriod').val();
						
						var redBegin = $('#redBegin').val() + '-' + $('#redBegin2').val() + '-' + $('#redBegin3').val();
						var redEnd = $('#redEnd').val() + '-' + $('#redEnd2').val() + '-' + $('#redEnd3').val();
						

						var redSerial = $('#redSerial').val();
						var redFactory = $('#redFactory').val();
						var redDepart = $('#redDepart').val();
						var redNote = $('#redNote').val();
						var redAboutPos = $('#redAboutPos').val();
						

						if(files != undefined){
							var datas = new FormData();
							$.each(files, function(key, value){
								datas.append(key, value);
							});
						}
						
				
						$.ajax({
							type:"POST",
							url: "./include/add_inn.php",
							data: "redPlace="+redTown+"&redName="+redName+"&redSymbol="+redSymbol+"&redPeriod="+redPeriod+"&redBegin="+ redBegin +"&redEnd="+ redEnd +"&redSerial="+redSerial+"&redFactory="+redFactory+"&redDepart="+redDepart+"&redNote="+redNote+"&usrImg="+usrImg+"&usrImgType="+usrImgType+"&redAboutPos="+redAboutPos,
							dataType:"html",
							cache: false,
							success:function(dataPath){
								
								var arr = [];
								arr = dataPath.split('*');
								
								var arrDate = arr[2]+arr[3];
								
								var arr2 = [];
								arr2 = arrDate.split('-');
							
								
								//вставка фото
								$.ajax({
									type: "POST",
									url: "./include/add_inn.php?temper&dataPath="+arr[0]+"&dataId="+arr[1]+"&nameBegin="+arr2[0]+arr2[1]+arr2[2]+arr2[3]+arr2[4],
									data: datas,
									dataType: "html",
									cache: false,
									processData: false,
									contentType: false,
									success: function(){
										location.reload();
									}
								});
										
							}
							
						});
							
					});
					
				}
		});

	}







	//добавление новой позиции
	$("#addUnit").click(function(){
		$('body').append('<div class="modal" id="modal_out"></div>');
		$('.modal').fadeIn(500);
		$('body').append('<div class="redacter"></div>');
		
		addUnits();
									
		//выход из режима добавления по нажатию на фон
		$("#modal_out").click(function(){
			$('.redacter').empty().remove();
			$('.modal').empty().remove();
		});
	});




	function redager(idPos,numPos){
		var town = '';
		var depart = '';
		var time = '';
		var pros = '';
		var spis = '';
		var prod = '';
		
		//вывод редактируемой позиции
		$.ajax({
			url:'./include/functions.php',
			type:'post',
			data: "idPos="+idPos+"&town="+town+"&depart="+depart+"&time="+time+"&pros="+pros+"&spis="+spis+"&prod="+prod,
			dataType:'json',
			success:function(html){

					for(value in html){
						var daysBegin = html[value]['date_begin'].substr(8);
						var montshBegin = html[value]['date_begin'].substr(5,2);
						var yearsBegin = html[value]['date_begin'].substr(0,4);
						
						var daysEnd = html[value]['date_end'].substr(8);
						var montshEnd = html[value]['date_end'].substr(5,2);
						var yearsEnd = html[value]['date_end'].substr(0,4);

						$('.redacter').append('<h2 class="redPos"> Редактировать позицию </h2><table><tr><td><p class="mst">'+ numPos +'</p></td><td><p class="mst"><select required id="redTown"><option value="'+ html[value]['place'] +'" selected>'+ html[value]['place'] +'</option><option value="Вышгород"> Вышгород </option><option value="Днепропетровск"> Днепропетровск </option></select></p></td><td><p class="mst"><input type="text" id="redName" value="'+ html[value]['name'] +'"></p></td><td class="marker"><p class="mst" id="zipp"><a href="#"><input type="text" id="redSymbol" class="inpt_link" value="'+ html[value]['symbol'] +'"></a></p></td><td><p class="mst"><select required id="redPeriod"><option value="'+ html[value]['period'] +'" selected>'+ html[value]['period'] +'</option><option value="12"> 12 </option><option value="24"> 24 </option></select></p></td><td><p class="mst_date_from"><input type="text" name="date_to_day" size="2" class="tcal" id="redBegin" maxlength="2" value="'+ daysBegin + '" /><input type="text" name="date_to_month" size="2" maxlength="2" id="redBegin2" class="tcal" value="'+ montshBegin + '" /><input type="text" name="date_to_year" size="4" maxlength="4" id="redBegin3" class="tcal" value="'+ yearsBegin + '" /></p></td><td><p class="mst_date_to"><input type="text" name="date_to_day" size="2" class="tcal" id="redEnd" maxlength="2" value="'+ daysEnd + '" /><input type="text" name="date_to_month" size="2" maxlength="2" id="redEnd2" class="tcal" value="'+ montshEnd + '" /><input type="text" name="date_to_year" size="4" maxlength="4" class="tcal" id="redEnd3" value="'+ yearsEnd + '" /></p></td><td><p class="mst"><input type="text" id="redSerial" class="sinum" value="'+ html[value]['number_serial'] +'"></p></td><td><p class="mst"><input type="text" id="redFactory" class="sinum" value="'+ html[value]['number_factory'] +'"></p></td><td><p class="mst"><select required id="redDepart"><option value="'+ html[value]['department'] +'" selected>'+ html[value]['department'] +'</option><option value="Лаб_сч_э.э"> ЛабораторияЭЭ </option><option value="Лаб_т"> ЛабораторияТ </option><option value="Лаб_сч_в"> ЛабораторияВ </option><option value="Лаб_сч_г"> ЛабораторияГ </option><option value="Пр_сч_э.э"> ПроизводствоЭЭ </option><option value="Пр_с_п"> ПроизводствоСП </option><option value="КБ"> КБ </option><option value="ВТВ"> ВТВ </option><option value="ОТК"> ОТК </option><option value="Тех"> Технолог </option></select></p></td><td><p class="mst"><textarea name="" id="redNote" cols="15" rows="10">'+ html[value]['note'] +'</textarea></p></td></tr></table><textarea id="redAboutPos">'+ html[value]['extra'] +'</textarea><div class="fileform"><div id="fileformlabel"></div><form enctype="multipart/form-data"><input type="file" id="somename" name="uploadfile" onchange="getName(this.value);"><div class="selectbutton"> Выбор </div></form></div><button class="submit_form" id="redactPos"> Внести изменения </button><div class="deletePosition"><input type=checkbox name="delete" id="deletePosition'+ html[value]['id'] +'" /><label for="deletePosition"> Удалить позицию </label></div>');

						var usrImg;
						var usrImgType;
						//форма добавления фото
						var files;
						$('input[type=file]').change(function(){
							files = this.files;
							//название файла и его тип
							$.each(files, function(key2, value2){
								usrImg = value2.name;
								usrImgType = value2.type;
							});
						});

						
						$("#redactPos").click(function(){
							var redTown = $('#redTown').val();
							var redName = $('#redName').val();
							var redSymbol = $('#redSymbol').val();
							var redPeriod = $('#redPeriod').val();
							var redBegin = $('#redBegin').val() + '-' + $('#redBegin2').val() + '-' + $('#redBegin3').val();
							var redEnd = $('#redEnd').val() + '-' + $('#redEnd2').val() + '-' + $('#redEnd3').val();
							var redSerial = $('#redSerial').val();
							var redFactory = $('#redFactory').val();
							var redDepart = $('#redDepart').val();
							var redNote = $('#redNote').val();
							var redAboutPos = $('#redAboutPos').val();
							
							
							if(files != undefined){
								var datas = new FormData();
								$.each(files, function(key, value){
									datas.append(key, value);
								});
							}
							
							$.ajax({
								url:'./include/update.php',
								type:'post',
								data: "idPos="+idPos.substr(6)+"&redPlace="+redTown+"&redName="+redName+"&redSymbol="+redSymbol+"&redPeriod="+redPeriod+"&redBegin="+redBegin+"&redEnd="+redEnd+"&redSerial="+redSerial+"&redFactory="+redFactory+"&redDepart="+redDepart+"&redNote="+redNote+"&redAboutPos="+redAboutPos,
								dataType:'html',
								success:function(data){
								
									var arr = [];
									arr = data.split('*');

									var arrDate = arr[2]+arr[3];
									
									var arr2 = [];
									arr2 = arrDate.split('-');
									
										//вставка фото
										$.ajax({
											type: "POST",
											url: "./include/update.php?temper&dataPath="+arr[0]+"&dataId="+arr[1]+"&nameBegin="+arr2[0]+arr2[1]+arr2[2]+arr2[3]+arr2[4],
											data: datas,
											dataType: "html",
											cache: false,
											processData: false,
											contentType: false,
											success: function(){
												location.reload();
											}
										});

									}
							});
								
						});
					
					
					
							//удаление позиции
							$('#deletePosition'+ html[value]["id"]).change(function(){

								var redTown = document.getElementById("redTown");
								var redName = document.getElementById("redName");
								var redSymbol = document.getElementById("redSymbol");
								var redPeriod = document.getElementById("redPeriod");
								var redBegin = document.getElementById("redBegin");
								var redBegin2 = document.getElementById("redBegin2");
								var redBegin3 = document.getElementById("redBegin3");
								var redEnd = document.getElementById("redEnd");
								var redEnd2 = document.getElementById("redEnd2");
								var redEnd3 = document.getElementById("redEnd3");
								var redSerial = document.getElementById("redSerial");
								var redFactory = document.getElementById("redFactory");
								var redDepart = document.getElementById("redDepart");
								var redNote = document.getElementById("redNote");
								var somename = document.getElementById("somename");
								var redAboutPos = document.getElementById("redAboutPos");

								if(this.checked){
									redTown.disabled = true;
									redName.disabled = true;
									redSymbol.disabled = true;
									redPeriod.disabled = true;
									redBegin.disabled = true;
									redBegin2.disabled = true;
									redBegin3.disabled = true;
									redEnd.disabled = true;
									redEnd2.disabled = true;
									redEnd3.disabled = true;
									redSerial.disabled = true;
									redFactory.disabled = true;
									redDepart.disabled = true;
									redNote.disabled = true;
									somename.disabled = true;
									redAboutPos.disabled = true;
									
									$(".submit_form").replaceWith("<button class='submit_form' id='deletPos'> Удалить позицию </button>");
									
										$("#deletPos").click(function(){
											
											$.ajax({
												url:'./include/delete.php',
												type:'post',
												data: "idDelPos="+html[value]["id"]+"&townDel="+html[value]["place"]+"&departmentDel="+html[value]["department"]+"&nameDel="+html[value]["name"]+"&symbolDel="+html[value]["symbol"]+"&pathName="+html[value]["path_pdf"]+"&pathFull="+html[value]["path_full"]+"&zipDel="+html[value]["zip"],
												dataType:'html',
												success:function(){
														location.reload();
													}
											});
										});

								}else{
									redTown.disabled = false;
									redName.disabled = false;
									redSymbol.disabled = false;
									redPeriod.disabled = false;
									redBegin.disabled = false;
									redBegin2.disabled = false;
									redBegin3.disabled = false;
									redEnd.disabled = false;
									redEnd2.disabled = false;
									redEnd3.disabled = false;
									redSerial.disabled = false;
									redFactory.disabled = false;
									redDepart.disabled = false;
									redNote.disabled = false;
									somename.disabled = false;
									redAboutPos.disabled = false;
									
									$(".submit_form").replaceWith("<button class='submit_form' id='redactPos'> Внести изменения </button>");
									
									$("#redactPos").click(function(){
										var redTown = $('#redTown').val();
										var redName = $('#redName').val();
										var redSymbol = $('#redSymbol').val();
										var redPeriod = $('#redPeriod').val();
										var redBegin = $('#redBegin').val() + '-' + $('#redBegin2').val() + '-' + $('#redBegin3').val();
										var redEnd = $('#redEnd').val() + '-' + $('#redEnd2').val() + '-' + $('#redEnd3').val();
										var redSerial = $('#redSerial').val();
										var redFactory = $('#redFactory').val();
										var redDepart = $('#redDepart').val();
										var redNote = $('#redNote').val();
										var redAboutPos = $('#redAboutPos').val();
										
										if(files != undefined){
											var datas = new FormData();
											$.each(files, function(key, value){
												datas.append(key, value);
											});
										}
										
										$.ajax({
											url:'./include/update.php',
											type:'post',
											data: "idPos="+idPos.substr(6)+"&redPlace="+redTown+"&redName="+redName+"&redSymbol="+redSymbol+"&redPeriod="+redPeriod+"&redBegin="+redBegin+"&redEnd="+redEnd+"&redSerial="+redSerial+"&redFactory="+redFactory+"&redDepart="+redDepart+"&redNote="+redNote+"&redAboutPos="+redAboutPos,
											dataType:'html',
											success:function(data){
											
												var arr = [];
												arr = data.split('*');

												var arrDate = arr[2]+arr[3];
												
												var arr2 = [];
												arr2 = arrDate.split('-');
												
													//вставка фото
													$.ajax({
														type: "POST",
														url: "./include/update.php?temper&dataPath="+arr[0]+"&dataId="+arr[1]+"&nameBegin="+arr2[0]+arr2[1]+arr2[2]+arr2[3]+arr2[4],
														data: datas,
														dataType: "html",
														cache: false,
														processData: false,
														contentType: false,
														success: function(){
															location.reload();
														}
													});

												}
										});
											
									});
								} //end else

							});

					
					}
					
				}
		});
		
	}


//изменение поля 45
$("#time").change(function(){
	var checkSpis = document.getElementById("spis");
	var checkProd = document.getElementById("prod");
    if(this.checked){
		checkSpis.disabled = true;
		checkProd.disabled = true;
		
        time = '45';
    }else{
		checkSpis.disabled = false;
		checkProd.disabled = false;
		
        time = '';
    }
});

//изменение поля ПРОСРОЧЕНО
$("#pros").change(function(){
	var checkSpis = document.getElementById("spis");
	var checkProd = document.getElementById("prod");
    if(this.checked){
		checkSpis.disabled = true;
		checkProd.disabled = true;
		
        pros = 'pros';
    }else{
		checkSpis.disabled = false;
		checkProd.disabled = false;
		
        pros = '';
    }
});



//изменение поля ГОРОД
$("#town").change(function(){
	var townCh = $('#town').val();
	var checkSpis = document.getElementById("spis");
	var checkProd = document.getElementById("prod");
	if(townCh != ''){
		checkSpis.disabled = true;
		checkProd.disabled = true;
	}else{
		checkSpis.disabled = false;
		checkProd.disabled = false;
	}
});

//изменение поля ОТДЕЛ
$("#depart").change(function(){
	var dptCh = $('#depart').val();
	var checkSpis = document.getElementById("spis");
	var checkProd = document.getElementById("prod");
	if(dptCh != ''){
		checkSpis.disabled = true;
		checkProd.disabled = true;
	}else{
		checkSpis.disabled = false;
		checkProd.disabled = false;
	}
});




//изменение поля СПИСАНО
$("#spis").change(function(){
	var checkSpis = document.getElementById("town");
	var checkProd = document.getElementById("depart");
	var checkTime = document.getElementById("time");
	var checkPros = document.getElementById("pros");
    if(this.checked){
		checkSpis.disabled = true;
		checkProd.disabled = true;
		checkTime.disabled = true;
		checkPros.disabled = true;
		
		spis = '0';
    }else{
		checkSpis.disabled = false;
		checkProd.disabled = false;
		checkTime.disabled = false;
		checkPros.disabled = false;
		
		spis = '';
    }
});


//изменение поля ПРОДАНО
$("#prod").change(function(){
	var checkSpis = document.getElementById("town");
	var checkProd = document.getElementById("depart");
	var checkTime = document.getElementById("time");
	var checkPros = document.getElementById("pros");
	
    if(this.checked){
		checkSpis.disabled = true;
		checkProd.disabled = true;
		checkTime.disabled = true;
		checkPros.disabled = true;
		
		prod = '2';
    }else{
		checkSpis.disabled = false;
		checkProd.disabled = false;
		checkTime.disabled = false;
		checkPros.disabled = false;
		
		prod = '';
    }
});



	//отправка запроса к БД
	$("#fltr").click(function(){
		//вывод только то, что СПИСАНО или ПРОДАНО
		if(spis == '0' || prod == '2'){
			town = '';
			depart = '';
			time = '';
			pros = '';
		}else{
			town = $('#town').val();
			depart = $('#depart').val();
		}
		
		viewData(town,depart,time,pros,spis,prod);
		
		$.session.set('town', town);
		$.session.set('depart', depart);
		$.session.set('time', time);
		$.session.set('pros', pros);
		$.session.set('spis', spis);
		$.session.set('prod', prod);
	});
});