<?php
//отображение входа пользователя  
if($_SESSION['auth'] == 'yes_auth'){
   echo '<p id="auth-user-info"><img src="/shop/www/images/user.png" /><strong> Здравствуйте, '.$_SESSION['auth_name'].'! </strong></p>';
} else {
   echo '<p id="reg-auth-title" align="right"><a class="top-auth"> Вход </a><a href="/shop/www/reg.php"> Регистрация </a></p>';
}
?>


<div id="block-top-auth">
   <div class="corner"></div>
	<form method="post">
	   <ul id="input-email-pass">
	      <h3> Вход </h3>
	      <p id="message-auth"> Неверный Логин и(или) Пароль </p>
		<li><center><input type="text" id="auth_login" placeholder="Логин или E-mail" /></center></li>
		<li><center><input type="password" id="auth_pass" placeholder="Пароль" /><span id="button-pass-show-hide" class="pass-show"></span></center></li>

	        <ul id="list-auth">
			   <li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme"> Запомнить </label></li>
			   <li><a id="remindpass" href="#"> Забыли пароль? </a></li>
	        </ul>

	        <p align="right" id="button-auth"><a> Вход </a></p>
	        <p align="right" class="auth-loading"><img src="/shop/www/images/loading.gif" /></p>
	   </ul>
	 </form>


  <div id="block-remind">
    <h3> Восстановление <br> пароля </h3>
	
	<p id="message-remind" class="message-remind-success"></p>
	<center><input type="text" id="remind-email" placeholder="Ваш E-mail" /></center>
	<p align="right" id="button-remind"><a> Готово </a></p>
	<p align="right" class="auth-loading"><input src="/shop/www/images/loading.gif" /></p>
	<p id="prev-auth"> Назад </p>
  </div>
</div>

  <div id="block-user">
    <div class="corner2"></div>
    <ul>
	  <li><img src="/shop/www/images/user_info.png" /><a href="/shop/www/profile.php"> Профиль </a></li>
	  <li><img src="/shop/www/images/logout.png" /><a id="logout"> Выход </a></li>
    </ul>
  </div>




<div id="header">
<img src="/shop/www/images/logo.jpg" />


<div id="lang">
<a href="/shop/www/indexen.php" id="eng"></a>
</div>




<div id="block-search">
    <form method="GET" action="search.php?q=">
       <span></span>
       <input type="text" id="input-search" name="q" placeholder="Поиск среди более 100 000 товаров" value="<?echo $search;?>"/>
       <input type="submit" id="button-search" value="Поиск" />
    </form>
    <ul id="result-search"></ul>
</div>


</div>