<?php
// Пара 5. Выход: удаление сессии и cookie
session_start();

session_unset();
session_destroy();

// Удаляем cookie, устанавливая время жизни в прошлое
setcookie("username", "", time() - 3600, "/");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Выход</title>
</head>
<body>
    <h1>Вы вышли</h1>
    <p>Данные сессии и cookie username удалены.</p>
    <p><a href="login.php">Войти снова</a></p>
</body>
</html>
