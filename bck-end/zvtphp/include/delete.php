<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	//удаление выбранной позиции
	include "db_connect.php";

	$idDelPos = $_POST["idDelPos"];
	$townDel = $_POST['townDel'];
	$departmentDel = $_POST['departmentDel'];
	$nameDel = $_POST['nameDel'];
	$symbolDel = $_POST['symbolDel'];
	$pathName = $_POST['pathName'];
	$pathFull = $_POST['pathFull'];
	$pathZip = $_POST['zipDel'];
	

	if(isset($_POST['idDelPos'])){

		//очистка действующей папки от файла
		$path_old = '../base/'.$townDel.'/'.$departmentDel.'/'.$nameDel.'/'.$symbolDel.'/'.$pathName;
			unlink(iconv("UTF-8", "cp1251", $path_old));
		
		//очистка папки архива от файлов
		$piecesa = explode(",", $pathZip);
		for($i=0; $i < count($piecesa); $i++){
			$path_old = '../base/'.$townDel.'/'.$departmentDel.'/'.$nameDel.'/'.$symbolDel.'/Архив/'.$piecesa[$i];
			unlink(iconv("UTF-8", "cp1251", $path_old));
		}

		//удаление уже пустой папки архива
		$path_old = '../base/'.$townDel.'/'.$departmentDel.'/'.$nameDel.'/'.$symbolDel.'/Архив';
		$is_empty = count(glob($path_old)) ? false : true;
		if($is_empty == true){
			rmdir(iconv("UTF-8", "cp1251", $path_old));
			$arch = 'empty';
		}
		
		if($arch == 'empty'){
			//удаление папки symbol
			$path_old = '../base/'.$townDel.'/'.$departmentDel.'/'.$nameDel.'/'.$symbolDel;
			$is_empty = count(glob($path_old)) ? false : true;
			if($is_empty == true){
				rmdir(iconv("UTF-8", "cp1251", $path_old));
					//удаление пустой папки name
					$path_old = '../base/'.$townDel.'/'.$departmentDel.'/'.$nameDel;
					$is_empty = count(glob($path_old)) ? false : true;
					if($is_empty == true){
						rmdir(iconv("UTF-8", "cp1251", $path_old));
							//удаление пустой папки department
							$path_old = '../base/'.$townDel.'/'.$departmentDel;
							$is_empty = count(glob($path_old)) ? false : true;
							if($is_empty == true){
								rmdir(iconv("UTF-8", "cp1251", $path_old));
									//удаление пустой папки place
									$path_old = '../base/'.$townDel;
									$is_empty = count(glob($path_old)) ? false : true;
									if($is_empty == true){
										rmdir(iconv("UTF-8", "cp1251", $path_old));
										
										//удаление из БД
										$query = "DELETE FROM oborudovanie WHERE id='$idDelPos'";
										mysql_query($query) or die (mysql_error());
									}
							}
					}			
			}
		}
	
	}

}
?>