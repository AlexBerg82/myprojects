
<form action="upload-gallery.php" method="post">
		<div id="addimage1" class="addimage">
		   <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
		   <input type="file" name="galleryimg" />
		</div>
		<input type="submit" value="Добавить" />
</form>

<?php
print_r($_POST);
//заливка фото
//проверка содержания файлов
	if($_FILES['galleryimg']['type'] == 'image/jpeg' || $_FILES['galleryimg']['type'] == 'image/jpg' || $_FILES['galleryimg']['type'] == 'image/gif' || $_FILES['galleryimg']['type'] == 'image/png'){
		$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['galleryimg']['name']));
		//генерация новог имени для ДБ
		$uploaddir = 'image/';
		$uploadfile = $uploaddir.$imgext;
		move_uploaded_file($_FILES['galleryimg']['tmp_name'], $uploadfile);
	}else{
	   $error_img[] = "ОШИБКА недопустимый формат";
	}

?>