$(document).ready(function(){

	var town = '';
	var depart = '';
	var time = '';
	var pros = '';
	var spis = '';
	var prod = '';
	
	viewData(town,depart,time,pros,spis,prod);




function viewData(town,depart,time,pros,spis,prod){

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

						if(html[value]['day_residue'] <= -46){var color = '#FF0000';}
						if(html[value]['day_residue'] > 0 && html[value]['day_residue'] < 45){var color = '#006400';}
						if(html[value]['day_residue'] >= 45){var color = '#9C9C9C';}


							if(html[value]['zip'] > ''){	//показывать архив если он есть

								$("table").append('<tr class="delt"><td><p class="mst"><a href="#" id="redact'+ html[value]['id'] +'">'+ html[value]['number'] +'</a></p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/resumeen.pdf" target="_blank">'+ html[value]['symbol'] +'</a><div class="zipp"><ul class="zipList" id="zipList'+ html[value]['id'] +'"></ul></div></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ html[value]['date_begin'] +'</p></td><td><p class="mst">'+ html[value]['date_end'] +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ html[value]['day_residue'] +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');

								var arr = [];
								arr = html[value]['zip'].split(',');
								for(var i = 0; i < arr.length; i++){
									$("#zipList"+ html[value]['id']).append('<li><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/Архив/'+ arr[i] +'" target="_blank">'+ arr[i] +'</a></li>');
								}
							} else {
								$("table").append('<tr class="delt"><td><p class="mst"><a href="#" id="redact'+ html[value]['id'] +'">'+ html[value]['number'] +'</a></p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/resumeen.pdf" target="_blank">'+ html[value]['symbol'] +'</a></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ html[value]['date_begin'] +'</p></td><td><p class="mst">'+ html[value]['date_end'] +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ html[value]['day_residue'] +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');
							}
						
						
							//редактирование позиции
							$("#redact"+ html[value]['id']).click(function(){
								$('body').append('<div class="modal" id="modal_out"></div>');
								$('.modal').fadeIn(500);
								$('body').append('<div class="redacter"></div>');
								
								var idPos = $(this).attr('id');
								redager(idPos);
								
								
								//выход из режима регистрации по нажатию на фон
								$("#modal_out").click(function(){
									$('.redacter').empty().remove();
									$('.modal').empty().remove();
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







	function redager(idPos){
		var town = '';
		var depart = '';
		var time = '';
		var pros = '';
		var spis = '';
		var prod = '';
		
		//вывод всех данных
		$.ajax({
			url:'./include/functions.php',
			type:'post',
			data: "idPos="+idPos+"&town="+town+"&depart="+depart+"&time="+time+"&pros="+pros+"&spis="+spis+"&prod="+prod,
			dataType:'json',
			success:function(html){
					for(value in html){
						$('.redacter').append('<h2 class="redPos">Редактировать позицию</h2><table><tr><td><p class="mst">'+ html[value]['number'] +'</p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/resumeen.pdf" target="_blank">'+ html[value]['symbol'] +'</a></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ html[value]['date_begin'] +'</p></td><td><p class="mst">'+ html[value]['date_end'] +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr></table>');
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
		
	});


});