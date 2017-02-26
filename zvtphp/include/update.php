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
	$idPos = $_POST['idPos'];
	$redAboutPos = $_POST['redAboutPos'];


	$result = mysql_query("SELECT * FROM oborudovanie WHERE id='$idPos'", $link);
	
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	do{

	
		if($row[3] != $redSymbol){
			$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3].'/';
			$path_new = '../base/'.$redPlace.'/'.$redDepart.'/'.$redName.'/'.$redSymbol.'/';
			//переименование папок symbol и name
			rename(iconv("UTF-8", "cp1251", $path_old), iconv("UTF-8", "cp1251", $path_new));
		}
		
		if($row[2] != $redName){
			$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/';
			$path_new = '../base/'.$redPlace.'/'.$redDepart.'/'.$redName.'/';
			//переименование папок symbol и name
			rename(iconv("UTF-8", "cp1251", $path_old), iconv("UTF-8", "cp1251", $path_new));
		}
		
		if($row[9] != $redDepart || $row[1] != $redPlace){
			
			//создание нового пути
			$path_new = '../base';
			if(!is_dir($path_new)) mkdir($path_new, 0777);
			
			$path_new = '../base/'.iconv("UTF-8", "cp1251",$redPlace);
			if(!is_dir($path_new)) mkdir($path_new, 0777);
		
			$path_new = '../base/'.iconv("UTF-8", "cp1251",$redPlace).'/'.iconv("UTF-8", "cp1251",$redDepart);
			if(!is_dir($path_new)) mkdir($path_new, 0777);
				
			$path_new = '../base/'.iconv("UTF-8", "cp1251",$redPlace).'/'.iconv("UTF-8", "cp1251",$redDepart).'/'.iconv("UTF-8", "cp1251",$redName);
			if(!is_dir($path_new)) mkdir($path_new, 0777);
				
			$path_new = '../base/'.iconv("UTF-8", "cp1251",$redPlace).'/'.iconv("UTF-8", "cp1251",$redDepart).'/'.iconv("UTF-8", "cp1251",$redName).'/'.iconv("UTF-8", "cp1251",$redSymbol);
			if(!is_dir($path_new)) mkdir($path_new, 0777);
			
			$zpr = iconv("UTF-8", "cp1251", '/Архив');
			if(!is_dir($path_new.$zpr)) mkdir($path_new.$zpr, 0777);



			//копирование содержимого действующей папки
			$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3].'/'.$row[14];
			$path_new = '../base/'.$redPlace.'/'.$redDepart.'/'.$redName.'/'.$redSymbol.'/'.$row[14];
				copy(iconv("UTF-8", "cp1251", $path_old), iconv("UTF-8", "cp1251", $path_new));
			
			//копирование содержимого архива действующей папки
			$pieces = explode(",", $row[13]);
			for($i=0; $i < count($pieces); $i++){
				$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3].'/Архив/'.$pieces[$i];
				$path_new = '../base/'.$redPlace.'/'.$redDepart.'/'.$redName.'/'.$redSymbol.'/Архив/'.$pieces[$i];
					copy(iconv("UTF-8", "cp1251", $path_old), iconv("UTF-8", "cp1251", $path_new));
			}
			
			
			
			
			//очистка папки архива от файлов
			$piecesa = explode(",", $row[13]);
			for($j=0; $j < count($piecesa); $j++){
				$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3].'/Архив/'.$piecesa[$j];
				unlink(iconv("UTF-8", "cp1251", $path_old));
			}
			
			//очистка действующей папки от файла
			$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3].'/'.$row[14];
				unlink(iconv("UTF-8", "cp1251", $path_old));
			
			//удаление уже пустой папки архива
			$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3].'/Архив';
			$is_empty = count(glob($path_old)) ? false : true;
			if($is_empty == true){
				rmdir(iconv("UTF-8", "cp1251", $path_old));
					//удаление папки symbol
					$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2].'/'.$row[3];
					$is_empty = count(glob($path_old)) ? false : true;
					if($is_empty == true){
						rmdir(iconv("UTF-8", "cp1251", $path_old));
							//удаление папки name
							$path_old = '../base/'.$row[1].'/'.$row[9].'/'.$row[2];
							$is_empty = count(glob($path_old)) ? false : true;
							if($is_empty == true){
								rmdir(iconv("UTF-8", "cp1251", $path_old));
									//удаление пустой папки place
									$path_old = '../base/'.$row[1].'/'.$row[9];
									$is_empty = count(glob($path_old)) ? false : true;
									if($is_empty == true){
										rmdir(iconv("UTF-8", "cp1251", $path_old));
											//удаление пустой папки department
											$path_old = '../base/'.$row[1];
											$is_empty = count(glob($path_old)) ? false : true;
											if($is_empty == true){
												rmdir(iconv("UTF-8", "cp1251", $path_old));
											}
									}
							}
					}
			}
			
		}
		
		
		$path_full = '../base/'.$redPlace.'/'.$redDepart.'/'.$redName.'/'.$redSymbol.'/';
		
	}
		while ($row = mysql_fetch_array($result));
	}
	

	
	//формирование формата даты
	$dateBegin = date_create($redBegin);
	$dateBegin = date_format($dateBegin, 'Y-m-d');
	
	$dateEnd = date_create($redEnd);
	$dateEnd = date_format($dateEnd, 'Y-m-d');
	

	mysql_query("UPDATE oborudovanie SET place='$redPlace',name='$redName',symbol='$redSymbol',period='$redPeriod',date_begin='$dateBegin',date_end='$dateEnd',number_factory='$redFactory',number_serial='$redSerial',department='$redDepart',note='$redNote',path_full='$path_full',extra='$redAboutPos' WHERE id='$idPos'", $link);
	

	echo $path_full.'*'.$idPos.'*'.$redBegin.'*'.$redEnd;	
	//новый путь -   id    - дата начало   - дата конец
}






if(isset($_GET['temper'])){
	foreach( $_FILES as $file ){

		if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/gif' || $file['type'] == 'image/png' || $file['type'] == 'application/pdf' || $file['type'] == 'application/x-pdf' || $file['type'] == 'application/acrobat' || $file['type'] == 'applications/vnd.pdf' || $file['type'] == 'text/pdf' || $file['type'] == 'text/x-pdf'){

			$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file['name']));
			$newfilename = 'file'.'-'.$_GET['nameBegin'].'.'.$imgext;

			$path2 = iconv("UTF-8", "cp1251", $_GET['dataPath']).$newfilename;
			
			if(move_uploaded_file($file['tmp_name'], $path2)){
				mysql_query("UPDATE oborudovanie SET path_pdf='$newfilename' WHERE id='{$_GET['dataId']}'", $link);
			}

		}
	}
}

?>