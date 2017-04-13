<div id="block-category">

    <p class="header-title"> Категории товаров </p>

    <ul>
      <li><a id="index1"><img src="/shop/www/images/mobile-icon.png" id="mobile-images" /> Мобильные телефоны </a>
         <ul class="category-section">
           <li><a href="view.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='mobile'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			   echo '<li><a href="view.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index2"><img src="/shop/www/images/book-icon.png" id="book-images" /> Ноутбуки </a>
         <ul class="category-section">
           <li><a href="view.php?type=notebook"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='notebook'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index3"><img src="/shop/www/images/table-icon.png" id="table-images" /> Планшеты </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=notepad"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='notepad'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>





      <li><a id="index4"><img src="/shop/www/images/h_appliances.png" id="mobile-images" /> Крупная бытовая техника </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='h_appliances'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

	</ul>
      </li>


      <li><a id="index5"><img src="/shop/www/images/s_appliances.png" id="mobile-images" /> Мелкая бытовая техника</a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='s_appliances'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

	</ul>
      </li>

      <li><a id="index6"><img src="/shop/www/images/tv.png" id="mobile-images" /> ТВ </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='tv'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

	</ul>
      </li>

      <li><a id="index7"><img src="/shop/www/images/foto.png" id="mobile-images" /> Фото, видео </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='foto'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index8"><img src="/shop/www/images/music.png" id="mobile-images" /> Музыка </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='music'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index9"><img src="/shop/www/images/tourism.png" id="mobile-images" /> Активный отдых и туризм </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='tourism'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index10"><img src="/shop/www/images/furniture.png" id="mobile-images" /> Мебель </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='furniture'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index11"><img src="/shop/www/images/watch.png" id="mobile-images" /> Часы </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='watch'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>


      <li><a id="index12"><img src="/shop/www/images/optics.png" id="mobile-images" /> Оптика </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='optics'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>

      <li><a id="index13"><img src="/shop/www/images/office.png" id="mobile-images" /> Все для офиса </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='office'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>

      <li><a id="index14"><img src="/shop/www/images/flora.png" id="mobile-images" /> Комнатные растения </a>
         <ul class="category-section">
           <li><a href="view_filtr.php?type=mobile"><strong> Все производители </strong></a></li>

		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='flora'", $link);

			if (mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			do{
			echo '<li><a href="view_filtr.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
			}
				while ($row = mysql_fetch_array($result));
			} else {
				echo '<p>Нет категорий!</p>';
			}
		?>

         </ul>
      </li>
    </ul>

</div>
<br>