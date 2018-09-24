$(document).ready(function(){

	var town = $.session.get('town');
	var depart = $.session.get('depart');
	var time = $.session.get('time');
	var pros = $.session.get('pros');
	var spis = $.session.get('spis');
	var prod = $.session.get('prod');

	
	if(town == undefined){
		town = '';
	}
	if(depart == undefined){
		depart = '';
	}
	if(time == undefined){
		time = '';
	}
	if(pros == undefined){
		pros = '';
	}
	if(spis == undefined){
		spis = '';
	}
	if(prod == undefined){
		prod = '';
	}

	
	
function viewData(town,depart,time,pros,spis,prod){

	//вывод всех данных
	$.ajax({
		url:'./include/functions.php',
		type:'post',
		data: "town="+town+"&depart="+depart+"&time="+time+"&pros="+pros+"&spis="+spis+"&prod="+prod,
		dataType:'json',
		success:function(html){

				if(html != null){

					$("tr.delt").remove();
					
					for(value in html){

						$("table").append('<tr class="delt"><td><p class="mst"><a href="#" class="rdct" id="redact'+ html[value]['id'] +'"></a></p></td><td><p class="mst">'+ html[value]['name'] +'</p></td><td class="marker"><p class="mst" id="zipp"><a href="./base/'+ html[value]['place'] +'/'+ html[value]['department'] +'/'+ html[value]['name'] +'/resumeen.pdf" target="_blank">'+ html[value]['symbol'] +'</a></p></td><td><p class="mst">Производитель</p></td><td><p class="mst">'+ html[value]['number_serial'] +'</p></td><td><p class="mst"> 1 </p></td><td><p class="mst"> -10/+10% </p></td><td><p class="mst"> 0,5 </p></td></tr>');

						$(".rdct").replaceWith('<a href="#" class="rrr" id="rrr'+ html[value]['id'] +'"></a>');
						
						//нумерация п/п
						$(function(){
							$('table td:first-child p a').each(function (i) {
								$(this).html(i+1);
							});
						});

					}

				}
		}
	});

}

viewData(town,depart,time,pros,spis,prod);
});