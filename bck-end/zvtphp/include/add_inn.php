<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";
	
	$redPlace = $_POST['redPlace'];
	$redName = $_POST['redName'];
	$redSymbol = $_POST['redSymbol'];
	$redPeriod = $_POST['redPeriod'];
	$redBegin = $_POST['redBegin'];
	$redEnd = $_POST['redEnd'];
	$redSerial = $_POST['redSerial'];
	$redFactory = $_POST['redFactory'];
	$redDepart = $_POST['redDepart'];
	$redNote = $_POST['redNote'];
	
	$usrId = $_POST['usrId'];
	$usrImg = $_POST['usrImg'];
	$usrImgType = $_POST['usrImgType'];
	$redAboutPos = $_POST['redAboutPos'];
	
	
	

	$healthy = array("/");
	$yummy   = array("-");
	$redName = str_replace($healthy, $yummy, $redName);

	$healthy2 = array("/");
	$yummy2   = array("-");
	$redSymbol = str_replace($healthy2, $yummy2, $redSymbol);
	
	
	
	
	$dateBegin = date_create($redBegin);
	$dateBegin = date_format($dateBegin, 'Y-m-d');
	
	$dateEnd = date_create($redEnd);
	$dateEnd = date_format($dateEnd, 'Y-m-d');

		
		
if(isset($_POST['redName'])){

	//создаем путь если несуществует
	$path = '../base';
	if(!is_dir($path)) mkdir($path, 0777);
	
	$path = '../base/'.iconv("UTF-8", "cp1251",$redPlace);
	if(!is_dir($path)) mkdir($path, 0777);
	
	$path = '../base/'.iconv("UTF-8", "cp1251",$redPlace).'/'.iconv("UTF-8", "cp1251",$redDepart);
	if(!is_dir($path)) mkdir($path, 0777);
	
	$path = '../base/'.iconv("UTF-8", "cp1251",$redPlace).'/'.iconv("UTF-8", "cp1251",$redDepart).'/'.iconv("UTF-8", "cp1251",$redName);
	if(!is_dir($path)) mkdir($path, 0777);
	
	$path = '../base/'.iconv("UTF-8", "cp1251",$redPlace).'/'.iconv("UTF-8", "cp1251",$redDepart).'/'.iconv("UTF-8", "cp1251",$redName).'/'.iconv("UTF-8", "cp1251",$redSymbol);
	if(!is_dir($path)) mkdir($path, 0777);
	
	
	$zpr = iconv("UTF-8", "cp1251", '/Архив');
	if(!is_dir($path.$zpr)) mkdir($path.$zpr, 0777);

	
	$path = '../base/'.$redPlace.'/'.$redDepart.'/'.$redName.'/'.$redSymbol.'/';



	
	//вставка в БД
	mysql_query("INSERT INTO oborudovanie(place,name,symbol,period,date_begin,date_end,number_factory,number_serial,department,note,vise,path_full,extra)
	VALUES('".$redPlace."','".$redName."','".$redSymbol."','".$redPeriod."','".$dateBegin."','".$dateEnd."','".$redSerial."','".$redFactory."','".$redDepart."','".$redNote."','1','".$path."','".$redAboutPos."')
	",$link);
	

	
	//получение ID текущей вставки
	$id = mysql_insert_id();
	
	echo $path.'*'.$id.'*'.$redBegin.'*'.$redEnd;
	
}
	
}
	
	
	
	
	
if(isset($_GET['temper'])){
	
	foreach( $_FILES as $file ){
		if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/gif' || $file['type'] == 'image/png' || $file['type'] == 'application/pdf' || $file['type'] == 'application/x-pdf' || $file['type'] == 'application/acrobat' || $file['type'] == 'applications/vnd.pdf' || $file['type'] == 'text/pdf' || $file['type'] == 'text/x-pdf'){
		
			$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file['name']));
			$newfilename = 'file'.'-'.$_GET['nameBegin'].'.'.$imgext;
			
			$path2 = iconv("UTF-8", "cp1251",$_GET['dataPath']).$newfilename;
				
			if(move_uploaded_file($file['tmp_name'], $path2)){
				mysql_query("UPDATE oborudovanie SET path_pdf='$newfilename' WHERE id='{$_GET['dataId']}'", $link);
			}

		}
	}
	

}

?>