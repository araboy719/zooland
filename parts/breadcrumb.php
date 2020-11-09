
<?php
//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
//Подключаем шапку 
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
//запрос на вывод товара из  БД
$sql = "SELECT * FROM animals WHERE  id= ". $_GET['id'];
//выполняем запрос 
$result = $conn->query($sql);
//Записываем полученые значения из БД в переменную 
$row=mysqli_fetch_assoc($result);
//делаем запрос на вывод товара из  БД 
$categoryResult =$conn->query( 'SELECT *FROM animals_cat WHERE id =' .$row['category_id'] );
//Записываем полученые значения из БД в переменную 
$category = mysqli_fetch_assoc( $categoryResult );	

?>
<!-- Добавляем хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item " >
    	<a href="cat.php?id=<?php echo $category['id'] ?>" >
    		<?php echo  $category['title']?>
    			
    	</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo  $row["title"]?></li>
  </ol>
</nav>