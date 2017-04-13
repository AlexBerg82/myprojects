<?php
   include "include/db_connect.php";
   include "func/functions.php";

	session_start();

   include "include/auth_cookie.php";

   $search = clear_string($_GET["q"]);

	
//сортировка по
	$sorting = $_GET["sort"];
switch($sorting){
  case 'price-asc':
    $sorting = 'price ASC';
    $sort_name = 'От дешевых к дорогим';
    break;
  case 'price-desc':
    $sorting = 'price DESC';
    $sort_name = 'От дорогих к дешевым';
    break;
  case 'popular':
    $sorting = 'count DESC';
    $sort_name = 'Популярное';
    break;
  case 'news':
    $sorting = 'datetime DESC';
    $sort_name = 'Новинки';
    break;
  case 'brand':
    $sorting = 'brand';
    $sort_name = 'По алфавиту';
    break;
  default:
	$sorting = 'id_prod DESC';
	$sort_name = 'Без сортировки';
	break;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/orbit.css" rel="stylesheet" type="text/css" />
	
  <script type="text/javascript" src="/shop/www/js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jcarousellite.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.orbit.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/shop-script.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.form.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.textchange.js"></script>


<title> Поиск - <?echo $search;?> </title>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>

  <div id="block-content">

     <?if(strlen($search) >= 2 && strlen($search) < 64){	//1 проверка поиска (от 2 до 64)?>
	
<?php

//постраничный вывод
$num = 6;
$page = (int)$_GET['page'];
$count = mysql_query("SELECT COUNT(*) FROM product WHERE title LIKE '%$search%' AND vis='1'", $link);
$temp = mysql_fetch_array($count);
if($temp[0] > 0){
$tempcount = $temp[0];
$total = (($tempcount - 1) / $num) + 1;
$total = intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
$qury_start_num = " LIMIT $start, $num";
}

if($temp[0] > 0){	//2 проверка поиска (ничего не найдено)
		 
echo '<div id="navigate">
       <p id="nav-breadcrumbs"><a href="index.php"> Главная страница </a> \ <span> Все товары </span></p>
           <ul id="options-list">
             <li> Вид: </li>
             <li><img id="style-grid" src="/shop/www/images/icon-grid.png" /></li>
             <li><img id="style-list" src="/shop/www/images/icon-list.png" /></li>

             <li> Сортировка: </li>
             <li><a id="select-sort">'.$sort_name.'</a>

                <ul id="sorting-list">
                  <li><a href="search.php?q='.$search.'&sort=price-asc"> От дешевых к дорогим </a></li>
                  <li><a href="search.php?q='.$search.'&sort=price-desc"> От дорогих к дешевым </a></li>
                  <li><a href="search.php?q='.$search.'&sort=popular"> Популярное </a></li>
                  <li><a href="search.php?q='.$search.'&sort=news"> Новинки </a></li>
                  <li><a href="search.php?q='.$search.'&sort=brand"> По алфавиту </a></li>
                </ul>
	         </li>
         </ul>
		 <p align="right" id="block-basket"><img src="/shop/www/images/cart-icon.png" /><a href="cart.php?action=onclick"> Корзина пуста </a></p>
	</div>
';	


echo '<ul id="block-tovar-grid">';

	
       $result = mysql_query("SELECT * FROM product WHERE title LIKE '%$search%' AND vis='1' ORDER BY $sorting $qury_start_num", $link);

       if (mysql_num_rows($result) > 0){
         $row = mysql_fetch_array($result);
       do{

//функция изменения размера изображения

	if($row["img"] !="" && file_exists("./image/".$row["img"])){
	   $img_path = "./image/".$row["img"];
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

// отзывы
$query_reviews = mysql_query("SELECT * FROM tbl_review WHERE prod_id='{$row["id_prod"]}' AND moder='1'", $link);
$count_reviews = mysql_num_rows($query_reviews);


         echo '<li>
		<div class="foto-grid2"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></div>		<!--фото товара-->
	    <p class="style-title-grid2"><a href="view_cont.php?id='.$row["id_prod"].'">'.$row["title"].'</a></p>		<!--название товара-->
			<ul class="com2">
				<li><img width="15" height="15" src="/shop/www/images/eye.png" /><p>'.$row["count"].'</p></li>
				<li><img width="15" height="15" src="/shop/www/images/comm.png" /><p>'.$count_reviews.'</p></li>
			</ul>
	    <a class="add-cart-grid2" tid="'.$row["id_prod"].'"></a>		<!--кнопка Корзины-->

	   <p class="price-grid2"><strong>'.group_numerals($row["price"]).'</strong> грн. </p>		<!--цена-->
		<div class="mini-feat2">'.$row["mini_desc"].'</div>	 	<!--мини характеристика товара-->
         </li>';
       }
       while ($row = mysql_fetch_array($result));
       }

?>


</ul>

<ul id="block-tovar-list">


    <?php	//вывод товаров

       $result = mysql_query("SELECT * FROM product WHERE title LIKE '%$search%' AND vis='1' ORDER BY $sorting $qury_start_num", $link);

       if (mysql_num_rows($result) > 0){
         $row = mysql_fetch_array($result);
       do{

//функция изменения размера изображения

	if($row["img"] !="" && file_exists("./image/".$row["img"])){
	   $img_path = "./image/".$row["img"];
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


// отзывы
$query_reviews = mysql_query("SELECT * FROM tbl_review WHERE prod_id='{$row["id_prod"]}' AND moder='1'", $link);
$count_reviews = mysql_num_rows($query_reviews);


// вывод товара
         echo '<li>
		<div class="foto-list2"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></div>		<!--фото товара-->
	    <p class="style-title-list2"><a href="view_cont.php?id='.$row["id_prod"].'">'.$row["title"].'</a></p>		<!--название товара-->
			<ul class="com-list2">
				<li><img width="15" height="15" src="/shop/www/images/eye.png" /><p>'.$row["count"].'</p></li>
				<li><img width="15" height="15" src="/shop/www/images/comm.png" /><p>'.$count_reviews.'</p></li>
			</ul>
	    <p class="price-list2"><strong>'.group_numerals($row["price"]).'</strong> грн. </p>						<!--цена-->
	   	<a class="add-cart-list2" tid="'.$row["id_prod"].'"></a>												<!--кнопка Корзины-->
		<div class="mini-feat-list2">'.$row["mini_desc"].'</div>		 										<!--мини характеристика товара-->
        </li>';
       }
       while ($row = mysql_fetch_array($result));
       }


echo '</ul>

</div>
</div>

<div id="paginate">
';




if($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="search.php?q='.$search.'&?page='.($page - 1).'">&lt;</a></li>';}
if($page != $total) $pstr_next = '<li><a class="pstr-next" href="search.php?q='.$search.'&?page='.($page + 1).'">&gt;</a></li>';

if($page - 5 > 0) $page5left = '<li><a href="search.php?q='.$search.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="search.php?q='.$search.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="search.php?q='.$search.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="search.php?q='.$search.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="search.php?q='.$search.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="search.php?q='.$search.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="search.php?q='.$search.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="search.php?q='.$search.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="search.php?q='.$search.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="search.php?q='.$search.'&page='.($page + 1).'">'.($page + 1).'</a></li>';


if($page + 5 < $total){
$strtotal = '<li><p class="nav-point">...</p></li><li><a href="search.php?q='.$search.'&page='.$total.'">'.$total.'</a></li>';
} else {
$strtotal = "";
}
if($total > 1){
echo '<div class="pstrnav"><ul>';
echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='search.php?q=".$search."&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
echo '</ul></div>';
}
echo '</div>';
	}	//2 проверка поиска (ничего не найдено)
else {
   echo '<h2 class="class-h2"><p> Ничего не найдено! </p></h2></div></div><div id="paginate"></div>';
}

}	//1 проверка поиска (от 2 до 64)
else {
   echo '<h2 class="class-h2"><p> Поисковое значение должно быть от 2 до 64 символов! </p></h2></div></div><div id="paginate"></div>';
}




include "include/footer.php";
?>


</body>
</html>