<?php
// Подключение к БД
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zooland";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Исправляем кодировку
$conn->set_charset("utf8");
?>