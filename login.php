<?php
require_once('bd.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Заповніть всі поля!"]);
        exit();
    }

    // Запрос пользователя по email
    $sql = $link->prepare("SELECT id, name, pass FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "Користувача не знайдено!"]);
        exit();
    }

    $user = $result->fetch_assoc();

    // Проверяем пароль
    if (!password_verify($password, $user['pass'])) {
        echo json_encode(["success" => false, "message" => "Невірний пароль!"]);
        exit();
    }

    echo json_encode(["success" => true, "name" => $user['name']]);
    exit();
}

?>
