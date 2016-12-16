<?php
//добавление нового объявления
//if($_SERVER['REQUEST_METHOD'] == "POST"){

	include "db_connect.php";
	include "../php/func.php";
		
		//получение данных из формы и обработка
		$title = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['title'])));
		$price = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['price'])));
		$text = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['text'])));
		$cat = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['cat'])));
		$phone = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['phone'])));
		$mail = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['mail'])));
		$usrId = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['usrId'])));
		$usrImg = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['usrImg'])));
		$usrImgType = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['usrImgType'])));
		
	if(isset($_POST['title']) && isset($_POST['price']) && isset($_POST['text']) && isset($_POST['cat']) && isset($_POST['phone']) && isset($_POST['mail'])){
			
		$ip = $_SERVER['REMOTE_ADDR'];		//получение IP пользователя
			
		//определение браузра пользователя
		$user_agent = $_SERVER["HTTP_USER_AGENT"];
		if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
			elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
			elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
			elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
			elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
		else $browser = "Not Browser";
			
		//получение даты
		$today = date("Y-m-d");
			
		//вставка в БД
		mysql_query("INSERT INTO magazine(title,price,description,category,dates,phone,mail,browser,ip,user_id)
		VALUES('".$title."','".$price."','".$text."','".$cat."','".$today."','".$phone."','".$mail."','".$browser."','".$ip."','".$usrId."')
		",$link);

		//получение ID текущей вставки
		$id = mysql_insert_id();
			
		echo $id;
	}

//}
	
//вставка картинки
if(isset($_GET['temper'])){
	$data = array();
	$files = array();
		
	foreach( $_FILES as $file ){
		if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/gif' || $file['type'] == 'image/png'){
			$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file['name']));
			$uploaddir = '../uploads_images/';
			if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );
			$newfilename = 'foto'.'-'.$_GET['dataId'].rand(10,100).'.'.$imgext;
			$uploaddir = $uploaddir.$newfilename;
			if(move_uploaded_file( $file['tmp_name'], $uploaddir)){
				mysql_query("UPDATE magazine SET img='$newfilename' WHERE id='{$_GET['dataIds']}' ",$link);
			}
		}
	}
}
?>