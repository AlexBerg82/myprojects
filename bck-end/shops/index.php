<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTF</title>
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.session.js"></script>
	<script type="text/javascript" src="js/jcarousellite.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.textchange.js"></script>
	<script type="text/javascript" src="js/lodash.js"></script>
	
	<script type="text/javascript" src="js/shopscript.js"></script>
</head>
<body>
<div class="wrapper">

	<div class="header clearfix">
		<div class="logotip clearfix">
			<div class="logo"></div>
			<div class="logo_text">
				<p>High-Tech</p>
				<p>Future</p>
			</div>
		</div>
		
		<div class="register">
			<a href="#" id="reg"><span>Регистрация</span></a>			
			<a href="#" id="inn"><span>Вход</span></a>
		</div>
		
		<div class="language">
			<div class="lang" id="ukr"></div>
			<div class="lang" id="rus"></div>
			<div class="lang" id="eng"></div>
		</div>
		
		<div class="cart"><p></p></div>
		
		<div class="search clearfix">
			<div class="wrap_search clearfix">
				<input type="text" class="input_search" id="input_search" placeholder="Поиск...">
			</div>
		</div>
	</div>
	
	<div class="wrap_content clearfix">
		<div class="category">
			<ul id="menu"></ul>
		</div>
	
	<div class="content clearfix">
		<div class="title_cart"><p>Корзина</p></div>
		
		<div class="sort clearfix">
			<p class="grad_line clearfix">
				<a id="grad" href="#"></a>
				<a id="line" href="#"></a>
			</p>
			<div class="sorts clearfix">
				<p><span>Сортировка: </span><strong>имя</strong> (<span id="namea">&#9650;</span><span id="named">&#9660;</span>);
				<strong>цена</strong> (<span id="pricea">&#9650;</span><span id="priced">&#9660;</span>)</p>
			</div>
		</div>
		
		<ul id="tovar"></ul>

	</div>
	</div>
	
	<div class="nav_bottom clearfix">
		<input type="hidden" id="current_page" />
		<input type="hidden" id="show_per_page" />
		<div id="page_navigation"></div>
	</div>
		
	<!--div class="random"></div-->
	<div class="footer">
		<div class="footer_menu clearfix">
			<div class="footer_menu_wrapper">
				<p class="titl_footer_menu">СОЦСЕТИ</p>
				<ul class="footer_menu-list">
					<li><a href="#">Facebook</a></li>
					<li><a href="#">Flickr</a></li>
					<li><a href="#">Twitter</a></li>
				</ul>
			</div>
			<div class="footer_menu_wrapper">
				<p class="titl_footer_menu">ПОСЫЛКИ</p>
				<ul class="footer_menu-list">
					<li><a href="#">Как создать блог</a></li>
					<li><a href="#">Создание блока в 4 шага</a></li>
					<li><a href="#">15 советов по увеличению трафика</a></li>
				</ul>
			</div>
			<div class="footer_menu_wrapper">
				<p class="titl_footer_menu">БЛОГИ</p>
				<ul class="footer_menu-list">
					<li><a href="#">Блоги</a></li>
					<li><a href="#">Roll Up Roll Up</a></li>
					<li><a href="#">Блог бесплатно</a></li>
				</ul>
			</div>
			<div class="footer_menu_wrapper">
				<p class="titl_footer_menu">О НАС</p>
				<ul class="footer_menu-list">
					<li><a href="#">С кем мы работаем</a></li>
					<li><a href="#">Наше качество</a></li>
					<li><a href="#">Новости компании</a></li>
				</ul>
			</div>
		</div>
		
		<div class="wrap_footer clearfix">
			<ul class="foot_menu clearfix">
				<li class="clearfix"><p>&#10033;&nbsp;&nbsp;</p><p>BuildUHomeLtd. Street Name 123 23 45 Cityname</p></li>
				<li class="clearfix"><p>&#9743;&nbsp;&nbsp;</p><p>+000 000 000 000</p></li>
				<li class="clearfix"><p>&#9993;&nbsp;&nbsp;</p><a href="#">info@builduhome.web</a></li>
			</ul>
			<p class="footer_copyright">&copy; 2017 Build U Home</p>	
		</div>
	</div>
	
</div>

<div class="modal" id="modal_out"></div>

<script type="text/javascript" src="js/language.js"></script>
</body>
</html>