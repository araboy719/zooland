<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/nav.php';




if(
        (isset($_POST) AND $_SERVER["REQUEST_METHOD"]=="POST")
){
    $sql = "INSERT INTO products (title, description, category) VALUES ('". $_POST["title"] . "', '". $_POST["description"] . "', '". $_POST["category"] . "')";

    if ($result = $conn->query($sql)) {
        header("Location: /admin/products.php");
    } else {
        echo "Error";
    }
    

}
?>
<div id="layoutSidenav_content">
    <main>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label>Ниаменование</label>
                <input class="form-control py-4" type="text" name="title">
            </div>
            <div class="form-group">
                <label>Описание</label>
                <input class="form-control py-4" type="text" name="description">
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
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>