<?php
// Пара 5. Приветствие: чтение сессии и cookie
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добро пожаловать</title>
</head>
<body>
    <h1>Страница приветствия</h1>

    <h2>Сессия</h2>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Добро пожаловать, <?= htmlspecialchars($_SESSION['username']) ?></p>
    <?php else: ?>
        <p>Вы не авторизованы. <a href="login.php">Войти</a></p>
    <?php endif; ?>

    <h2>Cookie</h2>
    <?php if (isset($_COOKIE['username'])): ?>
        <p>Значение cookie username: <?= htmlspecialchars($_COOKIE['username']) ?></p>
    <?php else: ?>
        <p>Cookie username не найден.</p>
    <?php endif; ?>

    <h2>Разница между cookie и сессией</h2>
    <ul>
        <li><b>Сессия</b> хранится на сервере, в браузере лежит только её идентификатор (PHPSESSID).
            Данные пропадают после session_destroy() или закрытия браузера.</li>
        <li><b>Cookie</b> хранится в браузере пользователя и отправляется серверу с каждым запросом.
            Живёт до указанного срока (здесь — 1 час), даже после закрытия браузера.</li>
    </ul>

    <p><a href="logout.php">Выйти</a></p>
</body>
</html>
