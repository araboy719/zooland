<div class="glView">
   <div class="menuSwitch">
        <!-- <nav aria-label="">
          <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="#">Предыдущая</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Следующая</a></li>
          </ul>
        </nav> -->
        <ul>
          <li class="cat-active" category="prod-cnt">Все</li>
          <?php
          $sql = "SELECT * FROM animals_cat_groop " ;
          $result = $conn->query($sql);
              
          while($row_cat_groop = mysqli_fetch_assoc($result)){ 
        ?>          
          <li class="animals-cat-groop" category="<?php echo  $row_cat_groop["id"]?>"><?php echo  $row_cat_groop["title"]?></li>         
          <?php
          }
          ?>  
        </ul>      
    </div>
    <!-- <div id="cat_menu" class="menuSwitch" category="cat-menu">  
        <ul>
          <li><<</li> 
          <?php
          $sql = "SELECT * FROM animals_cat LIMIT ".$limit;
          $result = $conn->query($sql);              
          while($row_cat = mysqli_fetch_assoc($result)){ 
        ?> 
               
          <li class="animals-cat" data-catId="<?php echo  $row_cat["id"]?>"><?php echo  $row_cat["title"]?></li>         
          <?php
          }
          ?>  
          <li>>></li>
        </ul>
     </div> -->

    <div class="switcher">
      <ul>
        <li id="grid" class="grid"><i class="fa fa-th-large"></i></li>
        <li id="list" class="list"><i class="fa fa-align-justify"></i></li>
      </ul>
    </div>
      
</div>
