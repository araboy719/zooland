<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/nav.php';




if(
        (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST")
){
    $sql = "INSERT INTO animals (title, description, content, category_id) VALUES ('". $_GET["name"] . "', '". $_GET["description"] . "', '". $_GET["content"] . "', '". $_GET["category_id"] . "')";

    if ($result = $conn->query($sql)) {
        header("Location: /admin/animal.php");
    }
    

}
?>
<div id="layoutSidenav_content">
    <main>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label>Имя Питомца</label>
                <input class="form-control py-4" type="text" name="name" />
            </div>
            <div class="form-group">
                <label>Полное описание</label>
                <input class="form-control py-4" type="text" name="content"/>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <input class="form-control py-4" type="text" name="description"/>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Категория</label>
                    <select class="btn btn-primary">
                        <option value="1" >Млекопитающие</option>
                        <option value="2" >Рыбы</option>
                        <option value="3" >Хищники</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>