<?php

	if (isset($_POST['login'])){
		$login1 = $_POST['login'];
			if ($login1 == ''){
				unset($login1);
				}
	}

	if(isset($_POST['password'])){
		$password1=$_POST['password'];
			if($password1 ==''){
				unset($password1);
				}
	}

if(empty($login1) or empty($password1)){
		exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <a href='login.php'> Вернуться и заполнить </a>");
	}

		$login1 = stripslashes($login1);
		$login1 = htmlspecialchars($login1);
		$password1 = stripslashes($password1);
		$password1 = htmlspecialchars($password1);
		$login1 = trim($login1);
		$password1 = trim($password1);




$db_hostname = 'localhost';
$db_database = 'spisok';
$db_username = 'root';
$db_password = '';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
    or die("Невозможно выбрать базу данных: " . mysql_error());



$result = mysql_query("SELECT * FROM users WHERE login='$login1'");

	$myrow = mysql_fetch_array($result);
		if(empty($myrow['password'])){
			exit ("Извините, введённый вами login или пароль неверный. <a href='login.php'> Вернуться и исправить </a>");
	} else {
	if ($myrow['password']==$password1){


session_start();

$_SESSION['login']=$myrow['login']; 
$_SESSION['id']=$myrow['id'];


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'admin.php';
header("Location: http://$host$uri/$extra");
exit;

	} else {
		exit ("Извините, введённый вами login или пароль неверный. <a href='login.php'> Вернуться и исправить </a>");
		}
}
?>



