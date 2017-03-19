$(document).ready(function(){

		$.ajax({
				url:'./include/units.php',
				type:'post',
				dataType:'json',
				success:function(data){
					var chkPhAc = 0;
					var chkPhAp = 0;
					var chkPhAs = 0;
					for(value in data){
						if(data[value]['type'] == 'mobile'){
							if(data[value]['brand'] == 'Acer'){
								chkPhAc++;
							}
							if(data[value]['brand'] == 'Apple'){
								chkPhAp++;
							}
							if(data[value]['brand'] == 'ASUS' > 0){
								chkPhAs++;
							} else{
								$("#cat_as").css('display','none');
							}
						}
					}
					$("#cat_ac input + label > p").append(chkPhAc);
					$("#cat_ap input + label > p").append(chkPhAp);
					$("#cat_as input + label > p").append(chkPhAs);
				}
		});

});