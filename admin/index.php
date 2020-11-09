<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/nav.php';
?>
<div id="layoutSidenav_content">
    <main>
    	<h2>Наши пользователи</h2>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    	<tr>
                        	<th>Имя</th>
                            <th>Описания</th>
                            <th>Категория</th>
                        </tr>
                    </thead>
                    <tfoot>
                    	<tr>
                        	<th>Имя</th>
                            <th>Описания</th>
                            <th>Категория</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	<?php

							$sql = "SELECT * FROM `animals`";

							$result = $conn->query($sql);

							while ($row = mysqli_fetch_assoc($result)) {?>

                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['category_id']; ?></td>
                        </tr>    
                            <?php }


                    	?>
                    </tbody>
                </table>
            </div>
        </div>
        <h2>Наши Питомцы</h2>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        	<th>Имя</th>
                            <th>Телефон</th>
                            <th>Имейл</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        	<th>Имя</th>
                            <th>Телефон</th>
                            <th>Имейл</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                    	<?php

							$sql = "SELECT * FROM `users`";

							$result = $conn->query($sql);

							while ($row = mysqli_fetch_assoc($result)) {?>

                        <tr>
                            <td><?php echo $row['login']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>  
                            <?php }


                    	?>
                    </tbody>
                </table>
            </div>
        </div>
        <main>
    	<h2>Наши Товары</h2>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    	<tr>
                        	<th>Наименование Продуктов</th>
                            <th>Описания</th>
                            <th>Категория Товара</th>
                        </tr>
                    </thead>
                    <tfoot>
                    	<tr>
                        	<th>Наименование Продуктов</th>
                            <th>Описания</th>
                            <th>Категория Товара</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	<?php

							$sql = "SELECT * FROM `products`";

							$result = $conn->query($sql);

							while ($row = mysqli_fetch_assoc($result)) {?>

                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <?php
                                $categoryResult = $conn->query("SELECT * FROM `category_product` WHERE id = " . $row['category']. "");
                                $category = mysqli_fetch_assoc($categoryResult);

                            ?>
                            <td><?php echo $category['title']; ?></td>
                        </tr>    
                            <?php }


                    	?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>