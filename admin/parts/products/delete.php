<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

/*
1. Сделать таблицу
2. Сделать ссылку на добавления в друзья
3. Сделать обработчик событий
4. Перенаправляем пользователя на главную страницу
*/
if(isset($_GET['id'])){
    $sql = "DELETE FROM products WHERE id =" . $_GET["id"] . "";

    if($result = $conn->query($sql)){
        header("Location: /admin/products.php");
    } else {
        echo("<h2>Ошибка</h2>");
    }


}

?>