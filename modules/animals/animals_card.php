
           
              <div class="imgSwitch ">
                <div class="card-photo">
                     <?php
                            //Выводим данные категории животного  с id = категории животного
                              $sql_animals_cat = "SELECT * FROM animals_cat WHERE id=".  $row["category_id"];  
                              $result_animals_cat = $conn->query($sql_animals_cat);
                              $row_animals_cat = mysqli_fetch_assoc($result_animals_cat);
                             //Выводим данные групы категории животного  с id= id категории животного

                               $sql_cat_groop = "SELECT * FROM animals_cat_groop WHERE id=".  $row_animals_cat['id_cat_groop'];  
                              $result_cat_groop = $conn->query($sql_cat_groop);
                              $row_cat_groop = mysqli_fetch_assoc($result_cat_groop);

                             ?> 
                   <div class="col-xs-2 col-sm-2 col-md-2   prod-cnt <?php echo $row_cat_groop['id'] ?>">
                      <div class="itemCont">
                        <a href="/modules/animals/animals_card_content.php?id=<?php echo $row['id'];?>">
                          
                          <div class="itemInfo ">

                            <h4 class="card-title"><?php echo $row["title"]?></h4>
                           
                             <!--  -->
                            
                            <div class="thumb">
                                <img class="img-responsive center-block" alt="Blue Gate" src="<?php echo $row['image'] ?>">
                            </div>
                            
                            <p class="card-text"><?php echo  $row["description"]?></p>
                            </div>
                            <h6><?php echo $row_cat_groop['title'] ?></h6>
                            <h6><?php echo $row_animals_cat['title'] ?></h6>
                        </a>
                        <!-- <button type="button" class="btn btn-primary goto">Накормить</button> -->
                      </div>
                    </div>                  
                </div>
                <!-- <div class="loadit"><button type="button" class="btn btn-primary">Показать еще</button></div> -->
              </div>
          



<!-- 
<div class="animals_card">
  <div class="container">
    <div class="col-4">
    	<div class="card m-2">
      		
      		<div class="card-body">
       			<h2 class="card-title"><a href="modules/animals/animals_card_content.php?id=<?php echo $row['id'];?> ">
              <?php echo $row["title"]?>
              </a></h2>
              <div class= "card-photo">
                  <img src='<?php echo $row['image'] ?>'>
              </div>  
       			 	
       			 		
       			 
        		<p class="card-text"><?php echo  $row["description"]?></p>
        		
    	</div> 
    </div>
  </div>
</div> -->