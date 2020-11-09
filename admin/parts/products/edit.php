<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/nav.php';

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `products` WHERE `id` = " . $_GET['id'] . " ";


    if ($result = $conn->query($sql)) {
        $row = mysqli_fetch_assoc($result);
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <form action="edit.php" method="POST">
                        <div class="form-group">
                            <label>Наименование Продукта</label>
                            <input class="form-control py-4" type="text" name="name" value="<?php echo $row['title']?>" />
                        </div>
                        <div class="form-group">
                            <label>Наименование Продукта</label>
                            <input class="form-control py-4" type="text" name="description" value="<?php echo $row['description']?>">
                            <?php var_dump($row["id"]);?>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="btn btn-primary" name="category">
                                    <option value="1" >Чашки</option>
                                    <option value="2" >Футболки</option>
                                    <option value="3" >Кепки</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </form>
                </main>

        <?php

    
    } else {
        echo "<h2>Продукт не найден</h2>";
    }

}

if(
        (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST")
)
    {
        $sql = "UPDATE products SET title = '". $_POST["name"] . "', description = '". $_POST["description"] . "', category = '" . $_POST["category"] . "' WHERE `products`.`id` = '" . $row["id"] . "'";

    if ($result = $conn->query($sql)) {
        echo "Успешно изменено";
        header("Location: /admin");
    }
    

}
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php'
?>