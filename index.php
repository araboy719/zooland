<?php 
// Подключаем БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// include "configs/settings.php";
// Подключаем header
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
// Подключаем slider
include $_SERVER['DOCUMENT_ROOT'] .'/parts/slider.php';
// Подключаем Наши Услуги
include $_SERVER['DOCUMENT_ROOT'] . '/parts/home/servises.php';
// // Подключаем Наши Животные
// include $_SERVER['DOCUMENT_ROOT'] .'/modules/animals/animals_page.php';
// Подключаем Наши Опекуны
include $_SERVER['DOCUMENT_ROOT'] .'/parts/home/helpers.php';
// Подключаем Контакты
include $_SERVER['DOCUMENT_ROOT'] .'/parts/home/contacts.php';
// Подключаем footer
include $_SERVER['DOCUMENT_ROOT'] .'/parts/footer.php';
?>

