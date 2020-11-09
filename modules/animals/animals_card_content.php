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


?>

<!-- Выводим  из БД  расширенную карточку по товару-->
<div class="animals_card_content">
	<div class="container">
	<div class="row">
		<div class="overflow-auto">
	 		<div class="col-12">
	 			<div class="card">
	 				<div class="card-body">
			   			<h2 class="card-title">
			   			 	 <?php echo $row["title"]?>
			   			 	   			 		
			   			</h2>
			   			<div class= "card-photo">
                  			<img src='<?php echo $row['image'] ?>'>
              			</div>  
			    		<h3 class="card-text"><?php echo  $row["description"]?></h3>
			    		<p class="card-text"><?php echo  $row["content"]?></p>
			    		


			    		</div> <!--/.card-body-->	

	 			</div>
	 		</div>	
	 	</div>
	 </div>	
	</div><!--/.Row-->
</div>
<!-- Подключаем футер -->
<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>