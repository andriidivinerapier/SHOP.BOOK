<?php
require_once('db.php'); // Підключаємо базу

// Отримуємо дані з форми
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);

// Перевіряємо, чи всі поля заповнені
if (empty($name) || empty($email) || empty($phone) || empty($password)) {
    die("Будь ласка, заповніть всі поля!");
}

// Хешуємо пароль перед збереженням
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL-запит для вставки даних
$sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";

// Використовуємо підготовлений запит для безпеки
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $hashed_password);

if (mysqli_stmt_execute($stmt)) {
    echo "Реєстрація успішна!";
} else {
    echo "Помилка: " . mysqli_error($link);
}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>