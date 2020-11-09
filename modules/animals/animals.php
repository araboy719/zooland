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
        <!-- <div class="secHeader">
          <h1 class="text-center">Животные</h1>
          <p class="text-center"><small>На нашем сайте вы можете покормить животных, выбрав необходимые продукты, а затем оплатив их через наш сайт. Еще раз благодарим вас от всего сердца.</small></p>
        </div> -->
		<?php            
		//подключаем файл навигации
		include $_SERVER['DOCUMENT_ROOT'].'/modules/animals/animals_cat_nav.php';
		?>

		<!-- Выводим  из БД  карточки товаров -->
		<div class="row" id ="animals-block">
			<div class="col-md-12 d-flex flex-row">
			<?php
				$sql = "SELECT * FROM animals  LIMIT ". $limit ;
				$result = $conn->query($sql);							
				while($row = mysqli_fetch_assoc($result)){
					//выводим карточки животных
					include $_SERVER['DOCUMENT_ROOT']. '/modules/animals/animals_card.php';
				}
			?>
		    </div >
		</div><!--/.Row-->	
<!--=======================================================
Делаем кнопку Показать еще
========================================================== -->
		<div class="row">						
			<div class="col-4 offset-4">
				<input type="hidden" value ="1" id ="current-page" >
				<button  class="btn btn-primary btn-lg" id ="show-more">Показать еще</button>
			</div>						
		</div><!--/.Row-->
<!--=======================================================
Блок для выведения кнопок пагинации
========================================================== -->	
		<div class="col-4 offset-4">
		<?php					
			//Делаем запрос в БД
				$sql = "SELECT * FROM animals";
			//выполняем запрос			
				$result = $conn->query($sql);
			//полученное количество результатов	
			$numProducts = mysqli_num_rows($result);
			$countPage = ceil($numProducts / $limit);	
			?>							
			<nav id="page-pag-animals" aria-label="Page navigation example">
			  	<ul class="pagination justify-content-center ">
				    <li class="page-item disabled">
				      <a  class="page-link" id="prev-pag" href="#" tabindex="-1" aria-disabled="true"><<</a> 
				    </li>
				    <?php 
				    for($i=0; $i < $countPage; $i++){
				    ?>
					    <li id="pag-num<?php echo $i+1 ?>" class="page-item">
					    	<a class="page-link" id="pagButton" onclick="paginPage(this)" data-id ="<?php echo $i+1 ?>" data-link="/modules/animals/pagination.php?page=<?php echo $i?>" ><?php echo $i+1 ?>					    		
					    	</a>
					    </li>								    	    
					<?php
					}
					?>
					<li class="page-item">
				      <a class="page-link" id="next-pag"  href="#" onclick="nextPageBttn(this,<?php echo $countPage?>)">>></a>
				    </li>
				    <?php
				    	
				    ?>
			  	</ul>
			</nav>								
		</div>
	</div> <!-- CONTAINER-->
</div> <!-- e/o section2 -->

<!-- Подключаем футер -->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>