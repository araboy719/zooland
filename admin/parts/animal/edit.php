<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/nav.php';

if(
        (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST")
)
    {
        $sql = "UPDATE animals SET title = '". $_POST["name"] . "', description = '". $_POST["description"] . "', content = '" . $_POST["content"] . "' WHERE `animals`.`id` = " . $row['id'] . "";
    if ($result = $conn->query($sql)) {
        echo "Успешно изменено";
        header("Location: /admin.php");
    }
    

}

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `animals` WHERE `id` = " . $_GET['id'] . " ";


    if ($result = $conn->query($sql)) {
        $row = mysqli_fetch_assoc($result);
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <form action="edit.php" method="POST">
                        <div class="form-group">
                            <label>Имя Питомца</label>
                            <input class="form-control py-4" type="text" name="name" value="<?php echo $row['title']?>" />
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea class="form-control py-4" type="text" name="content"><?php echo $row['content']?>"</textarea>
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea class="form-control py-4" type="text" name="description"><?php echo $row['description']?>"</textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="btn btn-primary">
                                    <option value="1" <?php if ($row["category_id"] == 1) {
                                            echo "selected";
                                    }?> >Млекопитающие</option>
                                    <option value="2" <?php if ($row["category_id"] == 2) {
                                            echo "selected";
                                    }?> >Рыбы</option>
                                    <option value="3" <?php if ($row["category_id"] == 3) {
                                            echo "selected";
                                    }?> >Хищники</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </form>
                </main>

        <?php

    
    } else {
        echo "<h2>Животное не найдено</h2>";
    }

}




?>



<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php'
?>