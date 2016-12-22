$(document).ready(function(){

var count_input = 1;
$("#add-input").click(function(){
count_input++;

if(count_input == 2){
    $("#tr").addClass('tr');
}

if(count_input<20){
count_inp = count_input;
count_inp--;
$('<table border="1" cellspacing="0" style="border-top:none; text-align:center;"><tr id="addimage'+count_input+'"><td width="30">'+count_inp+'</td><td width="150">&nbsp;</td><td width="100">&nbsp;</td><td width="80">&nbsp;</td><td width="120">&nbsp;</td><td width="60">&nbsp;</td><td width="200">&nbsp;</td><td width="200"><a class="delete-input" rel="'+count_input+'"> x </a></td></tr></table>').fadeIn(100).appendTo('.tr');
}

});


var count_del = 1;
$('.delete-input').live('click',function(){
count_del++;
var rel = $(this).attr("rel");
$("#addimage"+rel).fadeOut(300,function(){
$("#addimage"+rel).remove();
});
if(count_del==19){
$("#add-input").show();
}
});

});