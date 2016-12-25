$(document).ready(function(){


var town;
var depart;

viewData(town = '',depart = '');


function viewData(town,depart){

	//вывод всех данных
	$.ajax({
		url:'./include/functions.php',
		type:'post',
		data: "town="+town+"&depart="+depart,
		dataType:'json',
		success:function(html){
			$(".warning").remove();
				if(html != null){
			
					$("tr.delt").remove();
					
					for(value in html){	

							if(html[value]['day_residue'] <= -46){var color = '#FF0000';}
							if(html[value]['day_residue'] > 0 && html[value]['day_residue'] < 45){var color = '#006400';}
							if(html[value]['day_residue'] >= 45){var color = '#9C9C9C';}
							
							$("table").append('<tr class="delt"><td><p class="mst">'+ html[value]['number'] +'</p></td><td><p class="mst">'+ html[value]['place'] +'</p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/resumeen.pdf" target="_blank">'+ html[value]['symbol'] +'</a></p></td><td><p class="mst">'+ html[value]['period'] +'</p></td><td><p class="mst" id="timeRun">'+ html[value]['date_begin'] +'</p></td><td><p class="mst">'+ html[value]['date_end'] +'</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst">'+ html[value]['number_factory'] +'</p></td><td><p class="mst">'+ html[value]['department'] +'</p></td><td><p class="mst" style="color:'+color+';">'+ html[value]['day_residue'] +'</p></td><td><p class="mst">'+ html[value]['note'] +'</p></td></tr>');
						}


					//просмотр архива
					$.ajax({
						type:'post',
						url: './include/zipper.php',
						dataType: 'json',
						cache: false,
						success: function(data){
							if(data > ''){
								$('#zipp').append('<div class="zipp"><ul class="zipList"></ul></div>');
								for(values in data){
									$('.zipList').append('<li><a href="">'+data[values]['path_pdf']+'</a></li>');
								}
							}
						}
					});
				} else {
					$("tr.delt").remove();
					$(".wrapper").append('<p class="warning">Совпадений не найдено!</p>');
				}
		}
	});

}





$("#fltr").click(function(){
	
	$("tr.delt").remove();

		town = $('#town').val();
		depart = $('#depart').val();
		//var spis = $('#spis').val();
		//var prod = $('#prod').val();
		//var time = $('#45').val();
		//var pros = $('#pros').val();
		
	viewData(town,depart);
});
	
	
	
	
	

});