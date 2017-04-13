<?php
//напоминание пароля пользователя и отправка его ему на почту
if($_SERVER["REQUEST_METHOD"] == "POST"){


   include "db_connect.php";
   include "../func/functions.php";

   $email = clear_string($_POST["email"]);


   if($email != ""){

   $result = mysql_query("SELECT email FROM users WHERE email='$email'",$link);

   if(mysql_num_rows($result) > 0){

   $newpass = fungenpass();

   $pass = md5($newpass);
   $pass = strrev($pass);
   $pass = strtolower("0000".$pass."1111");

   $update = mysql_query("UPDATE users SET pass='$pass' WHERE email='$email'",$link);

   send_mail('noreply@shop.ru',
	$email,
	'Новый пароль',
	'Ваш пароль: '.$newpass);

   echo 'yes';
   } else {
   echo 'Такой почты нет!';
   }

} else {
   echo 'Укажите свой ящик!';
}

}


?>