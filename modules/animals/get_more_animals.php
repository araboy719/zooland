<?php 
//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
//подключаем файл настройки
include $_SERVER['DOCUMENT_ROOT'].'/configs/settings.php';

//Передаем значение выбранной страницы в переменную
if(isset($_GET['page'])){	
	$page = $_GET['page'];	
}
//Указваем сколько позиций нужно пропустить при выполнении запроса
$offset = $page * $limit ;
	//Делаем запрос в БД
		$sql = "SELECT * FROM animals  LIMIT " .$limit.  " OFFSET  " . $offset;

	//выролняем запрос			
		$result = $conn->query($sql);
		//выводим данные чз цикл
		while($row = mysqli_fetch_assoc($result)){
			//Выводим карточки
			include $_SERVER['DOCUMENT_ROOT']. '/modules/animals/animals_card.php';

		}	
?>