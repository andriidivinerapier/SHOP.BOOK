<?php
$host = 'localhost';
$user = 'root';
$password = 'root'; // Стандартний пароль у MAMP
$db = 'bookstory'; // Змінив назву бази даних
$port = 8889; // У MAMP MySQL працює на 8889 порту

// Підключення до бази даних
$link = mysqli_connect($host, $user, $password, $db, $port);

if (!$link) {
    die("Помилка підключення: " . mysqli_connect_error());
}
?>