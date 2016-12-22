<?php
  // defined('hhh') or die('Срыгни упырь!');
?>

<div id="block-random-tovar">
<ul>

<?php

	$query_random = mysql_query("SELECT DISTINCT * FROM product WHERE vis='1' ORDER by RAND() LIMIT 4", $link);	//случайные товары

       if (mysql_num_rows($query_random) > 0){
         $res_query = mysql_fetch_array($query_random);
       do{

       $query_reviews = mysql_query("SELECT * FROM tbl_review WHERE prod_id={$res_query["id_prod"]} AND moder='1'", $link);
       $count_reviews = mysql_num_rows($query_reviews);


//функция изменения размера изображения

	if(strlen($res_query["img"]) > 0 && file_exists("./image/".$res_query["img"])){
	   $img_path = './image/'.$res_query["img"];
	   $max_width = 70;
	   $max_height = 90;
	     list($width, $height) = getimagesize($img_path);
	     $ratioh = $max_height / $height;
	     $ratiow = $max_width / $width;
	     $ratio = min($ratioh, $ratiow);
	     $width = intval($ratio * $width);
	     $height = intval($ratio * $height);
		} else {
		$img_path = "./images/no-image.png";
		$width = 70;
		$height = 70;
		}
echo '
<li>
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
<div id="titlo"><a class="random-title" href="view_cont.php?id='.$res_query["id_prod"].'">'.$res_query["title"].'</a></div>
<p class="random-reviews"> Отзывы '.$count_reviews.'</p>
<p class="random-price"> '.group_numerals($res_query["price"]).' грн. </p>
<a class="random-add-cart" tid="'.$res_query["id_prod"].'"></a>
</li>
';

}
while($res_query = mysql_fetch_array($query_random));
}
?>

</ul>
</div>
