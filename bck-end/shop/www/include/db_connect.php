<?php

  //defined('hhh') or die('Срыгни упырь!');

  $db_host = 'localhost';
  $db_database = 'butiken';
  $db_user = 'admin';
  $db_pass = '123456';

  $link = mysql_connect($db_host, $db_user, $db_pass);

  mysql_select_db($db_database, $link) or die("Невозможно выбрать базу данных: ".mysql_error());
  mysql_query("SET names cp1251");  	//выбор кодировки - заменить на utf-8 когда хостить
?>