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

echo '
  <div id="block-step">
     <div id="name-step">
		<ul id="cartli"><ul>
     </div>
	<p> Предоставленная информация </p>
  </div>
<h3 id="block-abb"> Проверьте правильность введенной Вами информации.<br>Мы свяжемся с Вами в ближайшее время! </h3>
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
   <h2 class="itog-price" align="right"> Сумма к оплате: <strong>'.group_numerals($int).'</strong> грн. </h2>
   <p class="button-next" align="right"><a href="index.php"> На главную </a></p>
';



?>
</div>
</div>

<div id="paginate"></div>


<?include "include/footer.php";?>

</body>
</html>
