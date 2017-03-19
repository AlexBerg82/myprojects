<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTF</title>
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jcarousellite.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.textchange.js"></script>
	
	<script type="text/javascript" src="js/shopscript.js"></script>
	<script type="text/javascript" src="js/category.js"></script>
	<script type="text/javascript" src="js/language.js"></script>
	<script src="js/jquery.masonry.min.js"></script>

	<script>
	$(document).ready(function() {
		$("#menu ul").hide();
		$("#menu li span").click(function() {
			$("#menu ul:visible").slideUp("normal");
			if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
				$(this).next().slideDown("normal");
			}
		});
	
		/*var $container = $('.content');
		$container.masonry({
			columnWidth: 2,
			itemSelector: '.item',
			isFitWidth: false
		});*/
		
	});
	</script>
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
			<ul id="menu">
				<li><img src="img/phone.png" alt="mob"><span><p id="mobile">Мобильные телефоны</p></span>
					<ul>
						<li id="cat_ac"><input type="checkbox" class="mobile" id="chk_ph_ac" value='ACER' /><label for="chk_ph_ac">ACER<p></p></label></li>
						<li id="cat_as"><input type="checkbox" class="mobile" id="chk_ph_as" value='ASUS' /><label for="chk_ph_as">ASUS</label></li>
						<li id="cat_ap"><input type="checkbox" class="mobile" id="chk_ph_ap" value='Apple' /><label for="chk_ph_ap">Apple<p></p></label></li>
						<li id="cat_bl"><input type="checkbox" class="mobile" id="chk_ph_bl" value='Blackberry' /><label for="chk_ph_bl">Blackberry</label></li>
						<li id="cat_gg"><input type="checkbox" class="mobile" id="chk_ph_gg" value='Gigabyte' /><label for="chk_ph_gg">Gigabyte</label></li>
						<li id="cat_ln"><input type="checkbox" class="mobile" id="chk_ph_ln" value='Lenovo' /><label for="chk_ph_ln">Lenovo</label></li>
						<li id="cat_mz"><input type="checkbox" class="mobile" id="chk_ph_mz" value='Meizu' /><label for="chk_ph_mz">Meizu</label></li>
						<li id="cat_sm"><input type="checkbox" class="mobile" id="chk_ph_sm" value='SAMSUNG' /><label for="chk_ph_sm">SAMSUNG</label></li>
						<li id="cat_xi"><input type="checkbox" class="mobile" id="chk_ph_xi" value='Xiaomi' /><label for="chk_ph_xi">Xiaomi</label></li>
					</ul>
				</li>
				<li><img src="img/foto.png" alt="no"><span><p id="photo">Фото</p></span>
					<ul>
						<li><input type="checkbox" id="chk_ft_nk" /><label for="chk_ft_nk">Nikon</label></li>
						<li><input type="checkbox" id="chk_ft_cn" /><label for="chk_ft_cn">Canon</label></li>
						<li><input type="checkbox" id="chk_ft_sm" /><label for="chk_ft_sm">SAMSUNG</label></li>
						<li><input type="checkbox" id="chk_ft_pn" /><label for="chk_ft_pn">Panasonic</label></li>
						<li><input type="checkbox" id="chk_ft_pt" /><label for="chk_ft_pt">Pentax</label></li>
					</ul>
				</li>
				<li><img src="img/tv.png" alt="tv"><span><p id="tv">ТВ</p></span>
					<ul>
						<li><input type="checkbox" id="chk_tv_sm" /><label for="chk_tv_sm">SAMSUNG</label></li>
						<li><input type="checkbox" id="chk_tv_sn" /><label for="chk_tv_sn">SONY</label></li>
						<li><input type="checkbox" id="chk_tv_br" /><label for="chk_tv_br">Bravis</label></li>
						<li><input type="checkbox" id="chk_tv_pn" /><label for="chk_tv_pn">Panasonic</label></li>
						<li><input type="checkbox" id="chk_tv_ki" /><label for="chk_tv_ki">Kiev</label></li>
					</ul>
				</li>
				<li><img src="img/book.png" alt="ntbook"><span><p id="note">Ноутбуки</p></span>
					<ul>
						<li><input type="checkbox" id="chk_nt_ac" /><label for="chk_nt_ac">ACER</label></li>
						<li><input type="checkbox" id="chk_nt_as" /><label for="chk_nt_as">ASUS</label></li>
						<li><input type="checkbox" id="chk_nt_ap" /><label for="chk_nt_ap">Apple</label></li>
						<li><input type="checkbox" id="chk_nt_dl" /><label for="chk_nt_dl">DELL</label></li>
						<li><input type="checkbox" id="chk_nt_gg" /><label for="chk_nt_gg">Gigabyte</label></li>
						<li><input type="checkbox" id="chk_nt_hp" /><label for="chk_nt_hp">HP</label></li>
						<li><input type="checkbox" id="chk_nt_ln" /><label for="chk_nt_ln">Lenovo</label></li>
						<li><input type="checkbox" id="chk_nt_sm" /><label for="chk_nt_sm">SAMSUNG</label></li>
					</ul>
				</li>
				<li><img src="" alt=""><span><p id="tabs">Планшеты</p></span>
					<ul>
						<li><input type="checkbox" id="chk_tb_ac" /><label for="chk_tb_ac">ACER</label></li>
						<li><input type="checkbox" id="chk_tb_as" /><label for="chk_tb_as">ASUS</label></li>
						<li><input type="checkbox" id="chk_tb_ap" /><label for="chk_tb_ap">Apple</label></li>
						<li><input type="checkbox" id="chk_tb_dl" /><label for="chk_tb_dl">DELL</label</li>
						<li><input type="checkbox" id="chk_tb_gg" /><label for="chk_tb_gg">Gigabyte</label</li>
						<li><input type="checkbox" id="chk_tb_hp" /><label for="chk_tb_hp">HP</label</li>
						<li><input type="checkbox" id="chk_tb_ln" /><label for="chk_tb_ln">Lenovo</label></li>
						<li><input type="checkbox" id="chk_tb_sm" /><label for="chk_tb_sm">SAMSUNG</label></li>
					</ul>
				</li>
				<li><img src="" alt=""><span><p id="zp_pc">Комплектующие для ПК</p></span>
					<ul>
						<li><a href="">Процессоры</a></li>
						<li><a href="">Материнские платы</a></li>
						<li><a href="">Оперативная память</a></li>
						<li><a href="">Ведеокарты</a></li>
						<li><a href="">Винчестеры</a></li>
						<li><a href="">SSD</a></li>
						<li><a href="">Корпуса</a></li>
						<li><a href="">БП</a></li>
						<li><a href="">Картридеры</a></li>
						<li><a href="">Оптические накопители</a></li>
						<li><a href="">Шлейфы и кабели</a></li>
						<li><a href="">Системы охлаждения</a></li>
						<li><a href="">Термоинтерфейсы</a></li>
						<li><a href="">Крепежные принадлежности</a></li>
					</ul>
				</li>
				<li><img src="" alt=""><span><p id="zp_nt">Комплектующие для ноутбуков</p></span>
					<ul>
						<li><a href="">Процессоры</a></li>
						<li><a href="">Материнские платы</a></li>
						<li><a href="">Оперативная память</a></li>
						<li><a href="">Винчестеры</a></li>
						<li><a href="">SSD</a></li>
						<li><a href="">Корпуса</a></li>
						<li><a href="">БП</a></li>
						<li><a href="">Оптические накопители</a></li>
						<li><a href="">Шлейфы и кабели</a></li>
						<li><a href="">Системы охлаждения</a></li>
						<li><a href="">Термоинтерфейсы</a></li>
						<li><a href="">Крепежные принадлежности</a></li>
					</ul>
				</li>
				<li><img src="" alt=""><span><p id="pc">ПК</p></span></li>
				<li><img src="" alt=""><span><p id="perif">Периферия</p></span>
					<ul>
						<li><a href="">Принтеры</a></li>
						<li><a href="">Сканеры</a></li>
						<li><a href="">МФУ</a></li>
						<li><a href="">Мониторы</a></li>
						<li><a href="">Акустика</a></li>
						<li><a href="">Клавиатуры</a></li>
						<li><a href="">Мыши</a></li>
						<li><a href="">Сеть</a></li>
						<li><a href="">Удлинители и фильтры</a></li>
						<li><a href="">ИБП</a></li>
					</ul>
				</li>
				<li><img src="" alt=""><span><p id="bat">Аккумуляторы</p></span></li>
				<li><img src="" alt=""><span><p id="card">Карты памяти</p></span></li>
				<li><img src="" alt=""><span><p id="head_ph">Наушники</p></span></li>
				<li><img src="" alt=""><span><p id="chard">Зарядные устройства</p></span></li>
			</ul>
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
</body>
</html>