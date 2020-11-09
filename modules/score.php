<?php 
//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
//Подключаем шапку 
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
//подключаем файл настройки
include $_SERVER['DOCUMENT_ROOT'].'/configs/settings.php';

?>

<div id="templatemo_portfolio" class="section2">		
	<div class="container">
		<div id = "score">
			<h1>Магазин находится на реконструкции</h1>
			<h2>Извините за неудобства!</h2>	
		</div>				    
	</div> <!-- CONTAINER-->
</div> <!-- e/o section2 -->

<!-- Подключаем футер -->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>