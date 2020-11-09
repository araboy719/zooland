<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/nav.php';

$sql = "SELECT * FROM `animals`";

$result = $conn->query($sql);
?>
<div id="layoutSidenav_content">
	<div class="col-xl-3 col-md-6">
		<a class="btn btn-primary" type="button" href="parts/animal/add.php">Добавить</a>
	</div>
    <main>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        	<th>Имя</th>
                            <th>Описания</th>
                            <th>Категория</th>
                            <th>Опции</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Имя</th>
                            <th>Описания</th>
                            <th>Категория</th>
                            <th>Опции</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	<?php
                        	while ($row = mysqli_fetch_assoc($result)) {?>

                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['category_id']; ?></td>
                            <td><a class="btn btn-primary" type="button"  href="parts/animal/edit.php?id=<?php echo $row['id']?>">Изменить</a><a class="btn btn-primary" type="button"  href="parts/animal/delete.php?id=<?php echo $row['id']?>">Умер(((</a></td>
                        </tr>
                            
                            <?php }

                        	?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="col-xl-3 col-md-6">
		<a class="btn btn-primary" type="button" href="/admin/parts/animal/add.php">Добавить</a>
	</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>