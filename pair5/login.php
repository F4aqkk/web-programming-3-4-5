<?php
// Пара 5. Вход: запись в сессию и установка cookie
session_start();

$_SESSION['username'] = "Иван";

// Cookie сроком на 1 час (setcookie нужно вызвать до любого вывода)
setcookie("username", "Ivan", time() + 3600, "/");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>
    <p>Вы вошли как: <?= htmlspecialchars($_SESSION['username']) ?></p>
    <p>Cookie <b>username</b> установлен на 1 час.</p>
    <p><a href="welcome.php">Перейти на страницу приветствия</a></p>
</body>
</html>
