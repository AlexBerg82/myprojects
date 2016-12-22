<?php
include "include/db_connect.php";
include "func/functions.php";
session_start();
include "include/auth_cookie.php";

$id = clear_string($_GET["id"]);

if($id != $_SESSION['countid']){
	$querycount = mysql_query("SELECT count FROM product WHERE id_prod='$id'", $link);
	$resultcount = mysql_fetch_array($querycount);
	$newcount = $resultcount["count"] + 1;
	$update = mysql_query("UPDATE product SET count='$newcount' WHERE id_prod='$id'", $link);
}
$_SESSION['countid'] = $id;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
  
  <script type="text/javascript" src="/shop/www/js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/shop-script.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.form.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jTabs.js"></script>
  <script type="text/javascript" src="/shop/www/fancybox/jquery.fancybox.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.textchange.js"></script>
  

<title> Интернет-Магазин </title>

<script type="text/javascript">
   $(document).ready(function(){
	$("ul.tabs").jTabs({content: ".tabs_content", animate: true, effect:"fade"});
	$(".image-modal").fancybox();
	$(".send-review").fancybox();
   });
</script>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>

  
  <div id="block-content">

<?php

    $result = mysql_query("SELECT * FROM product WHERE vis='1' AND id_prod='$id'", $link);
    
    if (mysql_num_rows($result) > 0){
         $row = mysql_fetch_array($result);

echo '<div id="navigate">
			<p id="nav-breadcrumbs"><a href="index.php"> Главная страница </a> \ <span> '.$row["brand"].' </span></p>
			<p align="right" id="block-basket"><img src="/shop/www/images/cart-icon.png" /><a href="cart.php?action=onclick"> Корзина пуста </a></p>
			<div id="block-like">
				<p id="likegood" tid="'.$id.'"> Нравится </p><p id="likegoodcount" tid="'.$id.'">'.$row["likes"].'</p>
			</div>
		</div>
';

//функция изменения размера изображения
	if($row["img"] !="" && file_exists("./image/".$row["img"])){
	   $img_path = "./image/".$row["img"];
	   $max_width = 200;
	   $max_height = 170;
	     list($width, $height) = getimagesize($img_path);
	     $ratioh = $max_height / $height;
	     $ratiow = $max_width / $width;
	     $ratio = min($ratioh, $ratiow);
	     $width = intval($ratio * $width);
	     $height = intval($ratio * $height);
		} else {
		 $img_path = "./images/no-image.png";
		 $width = 90;
		 $height = 90;
		}

		
// отзывы
$query_reviews = mysql_query("SELECT * FROM tbl_review WHERE prod_id='{$row["id_prod"]}' AND moder='1'", $link);
$count_reviews = mysql_num_rows($query_reviews);

		
// вывод товара
echo '<div class="block-conti">
		<div class="foto-tov"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></div>		<!--фото товара-->
			<div id="mini-descrip">
			  <p id="content-title"> '.$row["title"].' </p>		<!--название товара-->
				<ul class="rev-coun-cont">
					<li><img width="15" height="15" src="/shop/www/images/eye.png" /><p>'.$row["count"].'</p></li>
					<li><img width="15" height="15" src="/shop/www/images/comm.png" /><p>'.$count_reviews.'</p></li>
				</ul>
			  <p class="style-price"><strong>'.group_numerals($row["price"]).'</strong> грн. </p>		<!--цена-->
			  <a class="add-cart-view" tid="'.$row["id_prod"].'"></a>		<!--кнопка Корзины-->
			  <div id="tov-text">'.$row["mini_feat"].'</div>	 	<!--мини характеристика товара-->
			</div>
	  </div>		
';





$result = mysql_query("SELECT * FROM imag WHERE id_produc='$id'", $link);
echo '<div id="block-img-slide"><ul>';
    if (mysql_num_rows($result) > 0){
        $row = mysql_fetch_array($result);
	       
        do{

	$img_path = './image/'.$row["images"];
	   $max_width = 50;
	   $max_height = 50;
	     list($width, $height) = getimagesize($img_path);
	     $ratioh = $max_height / $height;
	     $ratiow = $max_width / $width;
	     $ratio = min($ratioh, $ratiow);
	     $width = intval($ratio * $width);
	     $height = intval($ratio * $height);

echo '<li><a class="image-modal" href="#image'.$row["id"].'"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></a></li>
	<a style="display:none;" class="image-modal" rel="group" id="image'.$row["id"].'"><img src="/shop/www/image/'.$row["images"].'" /></a>
';
}
while($row = mysql_fetch_array($result));
echo '</ul>';
}
echo '</div>';




    $result = mysql_query("SELECT * FROM product WHERE vis='1' AND id_prod='$id'", $link);
	   
	$row = mysql_fetch_array($result);

// вывод товара
echo '<div id="tabb">
			<ul class="tabs">
			   <li><a class="active" href="#"> Описание </a></li>
			   <li><a href="#"> Характеристики </a></li>
			   <li><a href="#"> Отзывы </a></li>
			</ul>
			<div class="tabs_content">
			   <div> '.$row["desc"].' </div>
			   <div> '.$row["feat"].' </div>
			   <div><p id="link-send-review"><a class="send-review" href="#send-review"> Написать отзыв </a></p><br>

';






       $query_reviews = mysql_query("SELECT * FROM tbl_review WHERE prod_id='$id' AND moder='1' ORDER BY rev_id DESC", $link);

       if (mysql_num_rows($query_reviews) > 0){
         $row_reviews = mysql_fetch_array($query_reviews);
       do{

echo '<div class="block-reviews">
		<p class="author-date"><strong>'.$row_reviews["name"].'</strong>, '.$row_reviews["date"].'</p>
			<img src="/shop/www/images/plus-reviews.png" /><p class="textrev">'.$row_reviews["god_rev"].'</p>
			<img src="/shop/www/images/minus-reviews.png" /><p class="textrev">'.$row_reviews["bad_rev"].'</p>
		<p class="text-comment">'.$row_reviews["com"].'</p>
	 </div>
';
}
   while ($row_reviews = mysql_fetch_array($query_reviews));
} else {
   echo '<p class="title-no-info"> Отзывов нет! </p>';
}


echo '</div></div></div>

<div id="send-review">
   <p align="right" id="title-review"> Публикация отзыва осуществляется после предварительной модерации </p>
      <ul>
		<li><p align="right"><label id="label-name"> Имя <span> * </span></label><input maxlength="15" type="text" id="name_review" /></p></li>
		<li><p align="right"><label id="label-good"> Преимущества <span> * </span></label><textarea id="good_review"></textarea></p></li>
		<li><p align="right"><label id="label-bad"> Недостатки <span> * </span></label><textarea id="bad_review"></textarea></p></li>
		<li><p align="right"><label id="label-comment"> Комментарий </label><textarea id="comment_review"></textarea></p></li>
      </ul>
   <p id="reload-img"><img src="/shop/www/images/loading.gif" /></p><p id="button-send-review" iid="'.$id.'"></p>
</div>
';

}
?>

</div>
</div>


<div id="paginate"></div>


<?include "include/footer.php";?>

</body>
</html>