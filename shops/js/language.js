$(document).ready(function(){

	//проверка кук отвечающих за разное отображение товара
	if($.cookie('select_lang') == 'ukr'){
		$(".lang:nth-child(3)").removeClass('eng');
		$(".lang:nth-child(2)").removeClass('rus');
		$(".lang:nth-child(1)").addClass('ukr');
		$(".lang:nth-child(1)").css("backgroundImage","url('./img/lang/ukr_hov.png')");
		$(".lang:nth-child(2)").css("backgroundImage","url('./img/lang/rus.png')");
		$(".lang:nth-child(3)").css("backgroundImage","url('./img/lang/eng.png')");
		
		$("#reg span").replaceWith('<span>Реєстрація</span>');
		$("#inn span").replaceWith('<span>Вхід</span>');
		$('#input_search').attr('placeholder','Пошук...');
		
		$(".sorts span:nth-child(1)").replaceWith('<span>Сортування: </span>');
		$(".sorts strong:nth-child(2)").replaceWith('<strong>им\'я</strong>');
		$(".sorts strong:nth-child(5)").replaceWith('<strong>ціна</strong>');
		
		$("#mobile").replaceWith('<p id="mobile">Мобільні телефони</p>');
		$("#photo").replaceWith('<p id="photo">Фото</p>');
		$("#tv").replaceWith('<p id="tv">TВ</p>');
		$("#note").replaceWith('<p id="note">Ноутбуки</p>');
		$("#tabs").replaceWith('<p id="tabs">Планшети</p>');
		$("#zp_pc").replaceWith('<p id="zp_pc">Комплектуючі до ПК</p>');
		$("#zp_nt").replaceWith('<p id="zp_nt">Комплектуючі до ноутбуків</p>');
		$("#pc").replaceWith('<p id="pc">Ком\'пьютери</p>');
		$("#perif").replaceWith('<p id="perif">Периферія</p>');
		$("#bat").replaceWith('<p id="bat">Акумулятори</p>');
		$("#card").replaceWith('<p id="card">Картки пам\'яті</p>');
		$("#head_ph").replaceWith('<p id="head_ph">Навушники</p>');
		$("#chard").replaceWith('<p id="chard">Зарядні пристрої</p>');
		
		$(".footer_menu_wrapper:nth-child(1) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">СОЦМЕРЕЖІ</p>');
		$(".footer_menu_wrapper:nth-child(2) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ПОСИЛАННЯ</p>');
		$(".footer_menu_wrapper:nth-child(3) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">БЛОГИ</p>');
		$(".footer_menu_wrapper:nth-child(4) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ПРО НАС</p>');
		
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Як додавати блог</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Додавання блока у 4 кроки</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">15 порад зі збільшення трафіку</a>');
		
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Блоги</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Roll Up Roll Up</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Блог безкоштовно</a>');
		
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">З ким ми працюємо</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Наша якість</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Новини компанії</a>');
	} else if($.cookie('select_lang') == 'eng'){
		$(".lang:nth-child(1)").removeClass('ukr');
		$(".lang:nth-child(2)").removeClass('rus');
		$(".lang:nth-child(3)").addClass('eng');
		$(".lang:nth-child(3)").css("backgroundImage","url('./img/lang/eng_hov.png')");
		$(".lang:nth-child(2)").css("backgroundImage","url('./img/lang/rus.png')");
		$(".lang:nth-child(1)").css("backgroundImage","url('./img/lang/ukr.png')");
		
		$("#reg span").replaceWith('<span>Registration</span>');
		$("#inn span").replaceWith('<span>Login</span>');
		$('#input_search').attr('placeholder','Search...');
		
		$(".sorts span:nth-child(1)").replaceWith('<span>Sorting: </span>');
		$(".sorts strong:nth-child(2)").replaceWith('<strong>name</strong>');
		$(".sorts strong:nth-child(5)").replaceWith('<strong>price</strong>');
		
		$("#mobile").replaceWith('<p id="mobile">Mobile</p>');
		$("#photo").replaceWith('<p id="photo">Photo</p>');
		$("#tv").replaceWith('<p id="tv">TV</p>');
		$("#note").replaceWith('<p id="note">Notebook</p>');
		$("#tabs").replaceWith('<p id="tabs">Tabs</p>');
		$("#zp_pc").replaceWith('<p id="zp_pc">ZP for PC</p>');
		$("#zp_nt").replaceWith('<p id="zp_nt">ZP for Notebook</p>');
		$("#pc").replaceWith('<p id="pc">PC</p>');
		$("#perif").replaceWith('<p id="perif">Periferia</p>');
		$("#bat").replaceWith('<p id="bat">Battery</p>');
		$("#card").replaceWith('<p id="card">Cards</p>');
		$("#head_ph").replaceWith('<p id="head_ph">Headphone</p>');
		$("#chard").replaceWith('<p id="chard">Chardger</p>');
		
		$(".footer_menu_wrapper:nth-child(1) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">SOCIAL</p>');
		$(".footer_menu_wrapper:nth-child(2) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">LINKS</p>');
		$(".footer_menu_wrapper:nth-child(3) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">BLOGS</p>');
		$(".footer_menu_wrapper:nth-child(4) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ABOUT US</p>');
		
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">How to create a blog</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Create a block in 4 steps</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">15 tips for increasing traffic</a>');
		
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Blogs</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Roll Up Roll Up</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Blog free</a>');
		
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">We are working with cam</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Our quality</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Company news</a>');
	} else {
		$(".lang:nth-child(1)").removeClass('ukr');
		$(".lang:nth-child(3)").removeClass('eng');
		$(".lang:nth-child(2)").addClass('rus');
		$(".lang:nth-child(2)").css("backgroundImage","url('./img/lang/rus_hov.png')");
		$(".lang:nth-child(1)").css("backgroundImage","url('./img/lang/ukr.png')");
		$(".lang:nth-child(3)").css("backgroundImage","url('./img/lang/eng.png')");
		
		$("#reg span").replaceWith('<span>Регистрация</span>');
		$("#inn span").replaceWith('<span>Вхoд</span>');
		$('#input_search').attr('placeholder','Поиск...');
		
		$(".sorts span:nth-child(1)").replaceWith('<span>Сортировка: </span>');
		$(".sorts strong:nth-child(2)").replaceWith('<strong>имя</strong>');
		$(".sorts strong:nth-child(5)").replaceWith('<strong>цена</strong>');
		
		$("#mobile").replaceWith('<p id="mobile">Мобильные телефоны</p>');
		$("#photo").replaceWith('<p id="photo">Фото</p>');
		$("#tv").replaceWith('<p id="tv">TВ</p>');
		$("#note").replaceWith('<p id="note">Ноутбуки</p>');
		$("#tabs").replaceWith('<p id="tabs">Планшеты</p>');
		$("#zp_pc").replaceWith('<p id="zp_pc">Комплектующие для ПК</p>');
		$("#zp_nt").replaceWith('<p id="zp_nt">Комплектующие для ноутбуков</p>');
		$("#pc").replaceWith('<p id="pc">Компьютеры</p>');
		$("#perif").replaceWith('<p id="perif">Периферия</p>');
		$("#bat").replaceWith('<p id="bat">Аккумуляторы</p>');
		$("#card").replaceWith('<p id="card">Карты памяти</p>');
		$("#head_ph").replaceWith('<p id="head_ph">Наушники</p>');
		$("#chard").replaceWith('<p id="chard">Зарядные устройства</p>');
		
		$(".footer_menu_wrapper:nth-child(1) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">СОЦСЕТИ</p>');
		$(".footer_menu_wrapper:nth-child(2) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ПОСЫЛКИ</p>');
		$(".footer_menu_wrapper:nth-child(3) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">БЛОГИ</p>');
		$(".footer_menu_wrapper:nth-child(4) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">О НАС</p>');
		
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Как создать блог</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Создание блока в 4 шага</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">15 советов по увеличению трафика</a>');
		
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Блоги</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Roll Up Roll Up</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Блог бесплатно</a>');
		
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">С кем мы работаем</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Наше качество</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Новости компании</a>');
	}

	
	
	
	$("#ukr").click(function(){
		$(".lang:nth-child(1)").addClass('ukr');
		$(".lang:nth-child(3)").removeClass('eng');
		$(".lang:nth-child(2)").removeClass('rus');
		$(".lang:nth-child(1)").css("backgroundImage","url('./img/lang/ukr_hov.png')");
		$(".lang:nth-child(3)").css("backgroundImage","url('./img/lang/eng.png')");
		$(".lang:nth-child(2)").css("backgroundImage","url('./img/lang/rus.png')");
		$.cookie('select_lang','ukr');
		
		$("#reg span").replaceWith('<span>Реєстрація</span>');
		$("#inn span").replaceWith('<span>Вхід</span>');
		$('#input_search').attr('placeholder','Пошук...');
		
		$(".sorts span:nth-child(1)").replaceWith('<span>Сортування: </span>');
		$(".sorts strong:nth-child(2)").replaceWith('<strong>им\'я</strong>');
		$(".sorts strong:nth-child(5)").replaceWith('<strong>ціна</strong>');
		
		$("#mobile").replaceWith('<p id="mobile">Мобільні телефони</p>');
		$("#photo").replaceWith('<p id="photo">Фото</p>');
		$("#tv").replaceWith('<p id="tv">TВ</p>');
		$("#note").replaceWith('<p id="note">Ноутбуки</p>');
		$("#tabs").replaceWith('<p id="tabs">Планшети</p>');
		$("#zp_pc").replaceWith('<p id="zp_pc">Комплектуючі до ПК</p>');
		$("#zp_nt").replaceWith('<p id="zp_nt">Комплектуючі до ноутбуків</p>');
		$("#pc").replaceWith('<p id="pc">Ком\'пьютери</p>');
		$("#perif").replaceWith('<p id="perif">Периферія</p>');
		$("#bat").replaceWith('<p id="bat">Акумулятори</p>');
		$("#card").replaceWith('<p id="card">Картки пам\'яті</p>');
		$("#head_ph").replaceWith('<p id="head_ph">Навушники</p>');
		$("#chard").replaceWith('<p id="chard">Зарядні пристрої</p>');
		
		$(".footer_menu_wrapper:nth-child(1) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">СОЦМЕРЕЖІ</p>');
		$(".footer_menu_wrapper:nth-child(2) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ПОСИЛАННЯ</p>');
		$(".footer_menu_wrapper:nth-child(3) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">БЛОГИ</p>');
		$(".footer_menu_wrapper:nth-child(4) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ПРО НАС</p>');
		
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Як додавати блог</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Додавання блока у 4 кроки</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">15 порад зі збільшення трафіку</a>');
		
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Блоги</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Roll Up Roll Up</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Блог безкоштовно</a>');
		
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">З ким ми працюємо</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Наша якість</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Новини компанії</a>');
	});
	$("#rus").click(function(){
		$(".lang:nth-child(2)").addClass('rus');
		$(".lang:nth-child(3)").removeClass('eng');
		$(".lang:nth-child(1)").removeClass('ukr');
		$(".lang:nth-child(1)").css("backgroundImage","url('./img/lang/ukr.png')");
		$(".lang:nth-child(3)").css("backgroundImage","url('./img/lang/eng.png')");
		$(".lang:nth-child(2)").css("backgroundImage","url('./img/lang/rus_hov.png')");
		$.cookie('select_lang','rus');
		
		$("#reg span").replaceWith('<span>Регистрация</span>');
		$("#inn span").replaceWith('<span>Вхoд</span>');
		$('#input_search').attr('placeholder','Поиск...');
		
		$(".sorts span:nth-child(1)").replaceWith('<span>Сортировка: </span>');
		$(".sorts strong:nth-child(2)").replaceWith('<strong>имя</strong>');
		$(".sorts strong:nth-child(5)").replaceWith('<strong>цена</strong>');
		
		$("#mobile").replaceWith('<p id="mobile">Мобильные телефоны</p>');
		$("#photo").replaceWith('<p id="photo">Фото</p>');
		$("#tv").replaceWith('<p id="tv">TВ</p>');
		$("#note").replaceWith('<p id="note">Ноутбуки</p>');
		$("#tabs").replaceWith('<p id="tabs">Планшеты</p>');
		$("#zp_pc").replaceWith('<p id="zp_pc">Комплектующие для ПК</p>');
		$("#zp_nt").replaceWith('<p id="zp_nt">Комплектующие для ноутбуков</p>');
		$("#pc").replaceWith('<p id="pc">Компьютеры</p>');
		$("#perif").replaceWith('<p id="perif">Периферия</p>');
		$("#bat").replaceWith('<p id="bat">Аккумуляторы</p>');
		$("#card").replaceWith('<p id="card">Карты памяти</p>');
		$("#head_ph").replaceWith('<p id="head_ph">Наушники</p>');
		$("#chard").replaceWith('<p id="chard">Зарядные устройства</p>');
		
		$(".footer_menu_wrapper:nth-child(1) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">СОЦСЕТИ</p>');
		$(".footer_menu_wrapper:nth-child(2) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ПОСЫЛКИ</p>');
		$(".footer_menu_wrapper:nth-child(3) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">БЛОГИ</p>');
		$(".footer_menu_wrapper:nth-child(4) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">О НАС</p>');
		
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Как создать блог</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Создание блока в 4 шага</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">15 советов по увеличению трафика</a>');
		
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Блоги</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Roll Up Roll Up</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Блог бесплатно</a>');
		
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">С кем мы работаем</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Наше качество</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Новости компании</a>');
	});
	$("#eng").click(function(){
		$(".lang:nth-child(3)").addClass('eng');
		$(".lang:nth-child(2)").removeClass('rus');
		$(".lang:nth-child(1)").removeClass('ukr');
		$(".lang:nth-child(1)").css("backgroundImage","url('./img/lang/ukr.png')");
		$(".lang:nth-child(3)").css("backgroundImage","url('./img/lang/eng_hov.png')");
		$(".lang:nth-child(2)").css("backgroundImage","url('./img/lang/rus.png')");
		$.cookie('select_lang','eng');
		
		$("#reg span").replaceWith('<span>Registration</span>');
		$("#inn span").replaceWith('<span>Login</span>');
		$('#input_search').attr('placeholder','Search...');
		
		$(".sorts span:nth-child(1)").replaceWith('<span>Sorting: </span>');
		$(".sorts strong:nth-child(2)").replaceWith('<strong>name</strong>');
		$(".sorts strong:nth-child(5)").replaceWith('<strong>price</strong>');
		
		$("#mobile").replaceWith('<p id="mobile">Mobile</p>');
		$("#photo").replaceWith('<p id="photo">Photo</p>');
		$("#tv").replaceWith('<p id="tv">TV</p>');
		$("#note").replaceWith('<p id="note">Notebook</p>');
		$("#tabs").replaceWith('<p id="tabs">Tabs</p>');
		$("#zp_pc").replaceWith('<p id="zp_pc">ZP for PC</p>');
		$("#zp_nt").replaceWith('<p id="zp_nt">ZP for Notebook</p>');
		$("#pc").replaceWith('<p id="pc">PC</p>');
		$("#perif").replaceWith('<p id="perif">Periferia</p>');
		$("#bat").replaceWith('<p id="bat">Battery</p>');
		$("#card").replaceWith('<p id="card">Cards</p>');
		$("#head_ph").replaceWith('<p id="head_ph">Headphone</p>');
		$("#chard").replaceWith('<p id="chard">Chardger</p>');
		
		$(".footer_menu_wrapper:nth-child(1) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">SOCIAL</p>');
		$(".footer_menu_wrapper:nth-child(2) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">LINKS</p>');
		$(".footer_menu_wrapper:nth-child(3) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">BLOGS</p>');
		$(".footer_menu_wrapper:nth-child(4) .titl_footer_menu").replaceWith('<p class="titl_footer_menu">ABOUT US</p>');
		
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">How to create a blog</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Create a block in 4 steps</a>');
		$(".footer_menu_wrapper:nth-child(2) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">15 tips for increasing traffic</a>');
		
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">Blogs</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Roll Up Roll Up</a>');
		$(".footer_menu_wrapper:nth-child(3) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Blog free</a>');
		
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(1) a").replaceWith('<a href="#">We are working with cam</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(2) a").replaceWith('<a href="#">Our quality</a>');
		$(".footer_menu_wrapper:nth-child(4) .footer_menu-list li:nth-child(3) a").replaceWith('<a href="#">Company news</a>');
	});

});