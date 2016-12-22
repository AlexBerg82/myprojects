$(document).ready(function(){

	$("#button-red-review").click(function(){
		var mest_red = $("#mest_red").val();
		var nam_red = $("#nam_red").val();
		var sym_red = $("#sym_red").val();
		var per_red = $("#per_red").val();
		var zav_red = $("#zav_red").val();
		var inv_red = $("#inv_red").val();
		var dep_red = $("#dep_red").val();
		var not_red = $("#not_red").val();
		var idd = $("#button-red-review").attr("idd");
			$.ajax({
			   type: "POST",
			   url: "/oborudovanie/www/include/add_review.php",
			   data: "id="+idd+"&mest_red="+mest_red+"&nam_red="+nam_red+"&sym_red="+sym_red+"&per_red="+per_red+"&zav_red="+zav_red+"&inv_red="+inv_red+"&dep_red="+dep_red+"&not_red="+not_red,
			   dataType: "html",
			   cache: false,
			   success: function(){
					$("#send-review1").fadeOut(400);
					$("#send-review2").fadeOut(400);
					$("#send-review3").fadeOut(400);
					$("#send-review4").fadeOut(400);
					$("#send-review5").fadeOut(400);
					$("#send-review6").fadeOut(400);
					$("#send-review7").fadeOut(400);
					$("#send-review8").fadeOut(400);
					$("#send-review9").fadeOut(400);
					$("#send-review10").fadeOut(400);
					$("#send-review11").fadeOut(400);
					$("#send-review12").fadeOut(400);
					$("#send-review13").fadeOut(400);
					$("#send-review14").fadeOut(400);
					$("#send-review15").fadeOut(400);
					$("#send-review16").fadeOut(400);
					$("#send-review17").fadeOut(400);
					$("#send-review18").fadeOut(400);
					$("#send-review19").fadeOut(400);
					$("#send-review20").fadeOut(400);
					$("#send-review21").fadeOut(400);
					$("#send-review22").fadeOut(400);
					$("#send-review23").fadeOut(400);
					$("#send-review24").fadeOut(400);
					$("#send-review25").fadeOut(400);
			   }
			});
	});	
});