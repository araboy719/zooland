<div class="container">
        <div class="row">
          <div class="col-md-12">
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
						include $_SERVER['DOCUMENT_ROOT']. '/modules/animals/animals_card.php';
				}
				?>
			    </div >
			</div><!--/.Row-->		
      </div>
    </div>
  </div>