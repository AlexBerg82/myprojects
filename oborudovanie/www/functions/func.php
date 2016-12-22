<?php
//ğàñ÷åò îñòàòêà äíåé
   $dt=$row[7]."00:00:00";
   $s_year=substr($dt,0,4);
   $s_month=substr($dt,5,2);
   $s_day=substr($dt,8,2);
   $num_days=ceil((mktime(0,0,0,$s_month,$s_day,$s_year)-time())/86400);

   
//ôîğìèğîâàíèå ôîğìàòà äàòû
$dates = date_create($row[6]);
$date_format = date_format($dates, 'd-m-Y');

$dates2 = date_create($row[7]);
$date_format2 = date_format($dates2, 'd-m-Y');


//îêğàñ ÿ÷ååê ÎÑÒÀÒÎÊ ÄÍÅÉ ÄÎ ÏÎÂÅĞÊÈ
if($num_days<=0){
   $color = "red";
}
if($num_days>0 && $num_days<45){
   $color = "green";
}
?>