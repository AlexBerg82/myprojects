<?php

  //defined('hhh') or die('������ �����!');

  $db_host = 'localhost';
  $db_database = 'butiken';
  $db_user = 'admin';
  $db_pass = '123456';

  $link = mysql_connect($db_host, $db_user, $db_pass);

  mysql_select_db($db_database, $link) or die("���������� ������� ���� ������: ".mysql_error());
  mysql_query("SET names cp1251");  	//����� ��������� - �������� �� utf-8 ����� �������
?>