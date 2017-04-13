<?php
   include "include/db_connect.php";
   include "func/functions.php";

	session_start();

   include "include/auth_cookie.php";
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
  <script type="text/javascript" src="/shop/www/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.form.js"></script>
  <script type="text/javascript" src="/shop/www/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/shop/www/js/jquery.textchange.js"></script>

<!--[if IE]>
  <style type="text/css">
  .timer { display: none !important; }
  div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
  </style>
<![endif]-->

<script type="text/javascript" src="/shop/www/js/shop-script.js"></script>

<script type="text/javascript">
	$(window).load(function(){
		$('#featured').orbit({
			'bullets': true,
			'timer': true,
			'animation': 'horizontal-slide'
		});
	});
</script>

<title> Интернет-Магазин </title>

</head>
<body>

<div id="block-body">
  <?include "include/header.php";?>

  <div id="block-left"><?include "include/cat_in.php";?></div>

  <div id="block-content">

		<div id="featured">
			<img src="/shop/www/img/link.jpg" alt="Link" />
			<a href="http://www.zurb.com/playground" target="_blank"><img src="/shop/www/img/ezio.jpg" alt="Ezio" rel="ezioCaption" /></a>
			<img src="/shop/www/img/masterchief.jpg" alt="Master Chief" />
			<img src="/shop/www/img/marcusfenix.jpg" alt="Marcus Fenix" rel="marcusCaption" />

			<span class="orbit-caption" id="ezioCaption">This is an <em>awesome caption</em> for Ezio. <strong>Note:</strong> This whole image is linked</span>
			<span class="orbit-caption" id="marcusCaption">This is an <em>awesome caption</em> for Marcus with a <a href="http://www.zurb.com/playground" target="_blank" style="color: #fff">link</a></span>
		</div>
		
</div>

<br>

<?include "include/block-random.php";
include "include/footer.php";?>

</body>
</html>
