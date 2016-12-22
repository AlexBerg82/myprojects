<?php
   include "include/db_connect.php";
   include "func/functions.php";

	session_start();

   include "include/auth_cookie.php";
   
   
   
   
   $id = clear_string($_GET["id"]);
   $action = clear_string($_GET["action"]);

switch($action){
  case 'clear':
    $clear = mysql_query("DELETE FROM cart WHERE ip_cart='{$_SERVER['REMOTE_ADDR']}'", $link);
    break;

  case 'delete':
    $delete = mysql_query("DELETE FROM cart WHERE id_cart='$id' AND ip_cart='{$_SERVER['REMOTE_ADDR']}'", $link);
    break;
}

if(isset($_POST["submitdata"])){
$_SESSION["order_delivery"] = $_POST["order_delivery"];
$_SESSION["order_fio"] = $_POST["order_fio"];
$_SESSION["order_email"] = $_POST["order_email"];
$_SESSION["order_phone"] = $_POST["order_phone"];
$_SESSION["order_address"] = $_POST["order_address"];
$_SESSION["order_note"] = $_POST["order_note"];

header("Location: cart.php?action=completion");
}


$result = mysql_query("SELECT * FROM cart,product WHERE cart.ip_cart='{$_SERVER['REMOTE_ADDR']}' AND product.id_prod = cart.id_pr_cart", $link);

       if (mysql_num_rows($result) > 0){
         $row = mysql_fetch_array($result);

do{
$int = $int + ($row["price_cart"] * $row["count_cart"]);
}
while($row = mysql_fetch_array($result));

$itogpricecart = $int;

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


<title> Корзина </title>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/category.php";?></div>

  <div id="block-content">


  

<?php

	$action = clear_string($_GET["action"]);
switch($action){

  case 'onclick':

echo '
  <div id="block-step">
  	<p> Шаг 1 из 3 </p>
     <div id="name-step">
		<ul>
		   <li><a class="active"> 1. Корзина заказов </a></li>
			 <li><span> &rarr; </span></li>
		   <li><a> 2. Контактная информация </a></li>
			 <li><span> &rarr; </span></li>
		   <li><a> 3. Завершение </a></li>
		</ul>
     </div>
	<a href="cart.php?action=clear"> Очистить </a>
  </div>
';


$result = mysql_query("SELECT * FROM cart,product WHERE cart.ip_cart='{$_SERVER['REMOTE_ADDR']}' AND product.id_prod = cart.id_pr_cart", $link);
//$result = mysql_query("SELECT * FROM cart WHERE cart.ip='{$_SERVER['REMOTE_ADDR']}'", $link);

       if (mysql_num_rows($result) > 0){
         $row = mysql_fetch_array($result);

echo '
  <div id="header-list-cart">
     <div id="head1"> Изображение </div>
     <div id="head2"> Наименование товара </div>
     <div id="head3"> Кол-во </div>
     <div id="head4"> Цена </div>
  </div>
';


do{

$int = $row["price_cart"] * $row["count_cart"];
$all_price = $all_price + $int;

if(strlen($row["img"]) > 0 && file_exists("./image/".$row["img"])){

   $img_path = './image/'.$row["img"];
   $max_width = 70;
   $max_height = 90;
   list($width,$height) = getimagesize($img_path);
   $ratioh = $max_height/$height;
   $ratiow = $max_width/$width;
   $ratio = min($ratioh,$ratiow);

   $width = intval($ratio * $width);
   $height = intval($ratio * $height);
} else {
   $img_path = "/shop/www/images/no-image.png";
   $width = 70;
   $height = 70;
}

echo '
  <div class="block-list-cart">

    <div class="img-cart">
    <p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
    </div>

    <div class="title-cart">
    <p><a href="view.php?id='.$row["id_prod"].'">'.$row["title"].'</a></p>
    <p class="cart-mini_features">'.$row["mini_feat"].'</p>
    </div>

    <div class="count-cart">
		<ul class="input-count-style">
			<li><p align="center" iid="'.$row["id_cart"].'" class="count-minus"> - </p></li>
			<li><p align="center"><input iid="'.$row["id_cart"].'" id="input-id'.$row["id_cart"].'" class="count-input" maxlength="3" type="text" value="'.$row["count_cart"].'"> </p></li>
			<li><p align="center" iid="'.$row["id_cart"].'"class="count-plus"> + </p></li>
		</ul>
    </div>

    <div id="tovar'.$row["id_cart"].'" class="price-product"><h5><span class="span-count"> '.$row["count_cart"].' </span> x <span>'.group_numerals($row["price_cart"]).'</span></h5><p price="'.$row["price_cart"].'"> '.$int.' грн. </p></div>
    <div class="delete-cart"><a href="cart.php?id='.$row["id_cart"].'&action=delete"><img src="/shop/www/images/bsk_item_del.png" /></a></div>

    <div id="bottom-cart-line"></div>

  </div>
';

}

while($row = mysql_fetch_array($result));


echo '<h2 class="itog-price" align="right"> Итого: <strong>'.group_numerals($all_price).'</strong> грн. </h2>
	<p align="right" class="button-next"><a href="cart.php?action=confirm"> Далее </a></p>
	';


} else {
   echo '<h3 class="clear-cart" align="center"> Корзина пуста! </h3>';
}



    break;

  case 'confirm':

echo '
  <div id="block-step">
     <div id="name-step">
	<ul id="cartli">
	   <li><a href="cart.php?action=onclick"> 1. Корзина заказов </a></li>
	     <li><span> &rarr; </span></li>
	   <li><a class="active"> 2. Контактная информация </a></li>
	     <li><span> &rarr; </span></li>
	   <li><a> 3. Завершение </a></li>
	</ul>
     </div>
	<p> Шаг 2 из 3 </p>
  </div>
';



$chck = "";
if($_SESSION['order_delivery'] == "По почте") $chck1 = "checked";
if($_SESSION['order_delivery'] == "Курьером") $chck2 = "checked";
if($_SESSION['order_delivery'] == "Самовывоз") $chck3 = "checked";


echo '

<h3 id="titleh3"> Способ доставки: </h3>
<form method="post">
   <ul id="info-radio">
     <li>
		<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery1" value="По почте" '.$chck1.' />
		<label class="label_delivery" for="order_delivery1"> По почте </label>
     </li>

     <li>
		<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="Курьером" '.$chck2.' />
		<label class="label_delivery" for="order_delivery2"> Курьером </label>
     </li>

     <li>
		<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery3" value="Самовывоз" '.$chck3.' />
		<label class="label_delivery" for="order_delivery3"> Самовывоз </label>
     </li>
   </ul>

<h3 id="tit-h3"> Информация для доставки: </h3>
   <ul id="info-order">

';

if($_SESSION['auth'] != "yes_auth"){

echo '
     <li><label for="order_fio"><span> * </span> Ф.И.О. </label><input type="text" name="order_fio" id="order_fio" value="'.$_SESSION["order_fio"].'" /><span class="order_span_style"> Пример: Иванов Иван Иванович </span></li>
     <li><label for="order_email"><span> * </span> E-mail </label><input type="text" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /><span class="order_span_style"> Пример: ivanov@mail.ru </span></li>
     <li><label for="order_phone"><span> * </span> Телефон </label><input type="text" name="order_phone" id="order_phone" value="'.$_SESSION["order_phone"].'" /><span class="order_span_style"> Пример: 0 000 000 00 00 </span></li>
     <li><label for="order_label_style" for="order_address"><span> * </span> Адрес доставки </label><input type="text" name="order_address" id="order_address" value="'.$_SESSION["order_address"].'" /><span> Пример: г.Киев,<br /> ул.Связи д.3 кв.5 </span></li>
';

}

echo '
<li id="areatext"><label class="order_label_style" for="order_note"> Примечание </label><textarea name="order_note" >'.$_SESSION["order_note"].'</textarea><span> Уточните информацию о заказе.<br /> Например, удобное время для звонка<br /> нашего менеджера </span></li>
</ul>
<p align="right"><input type="submit" name="submitdata" id="confirm-button-next" value="Далее" /></p>
</form>
';



    break;

  case 'completion':

echo '
  <div id="block-step">
     <div id="name-step">
		<ul id="cartli">
		   <li><a href="cart.php?action=oneclock"> 1. Корзина заказов </a></li>
			 <li><span> &rarr; </span></li>
		   <li><a href="cart.php?action=confirm"> 2. Контактная информация </a></li>
			 <li><span> &rarr; </span></li>
		   <li><a class="active"> 3. Завершение </a></li>
		</ul>
     </div>
	<p> Шаг 3 из 3 </p>
  </div>

<h3 id="block-abb"> Конечная информация: </h3>
';


if($_SESSION['auth'] == "yes_auth"){

echo '
   <ul id="list-info">
		<li><strong> Способ доставки: </strong>'.$_SESSION['order_delivery'].'</li>
		<li><strong> Email: </strong>'.$_SESSION['auth_email'].'</li>
		<li><strong> ФИО </strong>'.$_SESSION['auth_surname'].'</li>
		<li><strong> Адрес доставки: </strong>'.$_SESSION['auth_address'].'</li>
		<li><strong> Телефон: </strong>'.$_SESSION['auth_phone'].'</li>
		<li><strong> Примечание: </strong>'.$_SESSION['order_note'].'</li>
   </ul>
';

}else{

echo '
   <ul id="list-info">
		<li><strong> Способ доставки: </strong>'.$_SESSION['order_delivery'].'</li>
		<li><strong> Email: </strong>'.$_SESSION['order_email'].'</li>
		<li><strong> ФИО </strong>'.$_SESSION['order_fio'].'</li>
		<li><strong> Адрес доставки: </strong>'.$_SESSION['order_address'].'</li>
		<li><strong> Телефон: </strong>'.$_SESSION['order_phone'].'</li>
		<li><strong> Примечание: </strong>'.$_SESSION['order_note'].'</li>
   </ul>
';
}


echo '
   <h2 class="itog-price" align="right"> Итого: <strong>'.group_numerals($int).'</strong> грн. </h2>
   <p class="button-next" align="right"><a href="cartok.php"> Оплатить </a></p>
';


    break;

      default:


echo '
  <div id="block-step">
     <div id="name-step">
		<ul id="cartli">
		   <li><a class="active"> 1. Корзина заказов </a></li>
			 <li><span> &rarr; </span></li>
		   <li><a> 2. Контактная информация </a></li>
			 <li><span> &rarr; </span></li>
		   <li><a> 3. Завершение </a></li>
		</ul>
     </div>
	<p> Шаг 1 из 3 </p>
';


	echo '<a href="cart.php?action=clear"> Очистить </a></div>';


$result = mysql_query("SELECT * FROM cart,product WHERE cart.ip_cart='{$_SERVER['REMOTE_ADDR']}' AND product.id_prod = cart.id_pr_cart", $link);

       if (mysql_num_rows($result) > 0){
         $row = mysql_fetch_array($result);

echo '
  <div id="header-list-cart">
     <div id="head1"> Изображение </div>
     <div id="head2"> Наименование товара </div>
     <div id="head3"> Кол-во </div>
     <div id="head4"> Цена </div>
  </div>
';


do{

$int = $row["price_cart"] * $row["count_cart"];
$all_price = $all_price + $int;

if(strlen($row["img"]) > 0 && file_exists("./image/".$row["img"])){

   $img_path = './image/'.$row["img"];
   $max_width = 70;
   $max_height = 90;
   list($width,$height) = getimagesize($img_path);
   $ratioh = $max_height/$height;
   $ratiow = $max_width/$width;
   $ratio = min($ratioh,$ratiow);

   $width = intval($ratio * $width);
   $height = intval($ratio * $height);
} else {
   $img_path = "/shop/www/images/no-image.png";
   $width = 70;
   $height = 70;
}

echo '
  <div class="block-list-cart">

    <div class="img-cart">
    <p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
    </div>

    <div class="title-cart">
    <p><a href="view_content.php?id='.$row["id_prod"].'">'.$row["title"].'</a></p>
    <p class="cart-mini_features">'.$row["mini_feat"].'</p>
    </div>

    <div class="count-cart">
		<ul class="input-count-style">
			<li><p align="center" iid="'.$row["id_cart"].'" class="count-minus"> - </p></li>
			<li><p align="center"><input iid="'.$row["id_cart"].'" id="input-id'.$row["id_cart"].'" class="count-input" maxlength="3" type="text" value="'.$row["count_cart"].'"> </p></li>
			<li><p align="center" iid="'.$row["id_cart"].'"class="count-plus"> + </p></li>
		</ul>
    </div>

    <div id="tovar'.$row["id_cart"].'" class="price-product"><h5><span class="span-count"> '.$row["count_cart"].' </span> x <span>'.group_numerals($row["price_cart"]).'</span></h5><p price="'.$row["price_cart"].'"> '.$int.' грн. </p></div>
    <div class="delete-cart"><a href="cart.php?id='.$row["id_cart"].'&action=delete"><img src="/shop/www/images/bsk_item_del.png" /></a></div>

    <div id="bottom-cart-line"></div>

  </div>
';



}
while($row = mysql_fetch_array($result));

echo '
   <h2 class="itog-price" align="right"> Итого: <strong>'.group_numerals($all_price).'</strong> грн. </h2>
   <p align="right" class="button-next"><a href="cart.php?action=confirm"> Далее </a></p>
';


} else {
   echo '<h3 class="clear-cart" align="center"> Корзина пуста! </h3>';
}

	break;
}

?>
</div>
</div>

<div id="paginate"></div>


<?include "include/footer.php";?>

</body>
</html>
