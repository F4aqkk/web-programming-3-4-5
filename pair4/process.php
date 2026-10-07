<?php
// Пара 4. Обработчик формы регистрации студента

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Доступ запрещён!";
    exit;
}

// Получение и очистка данных
$firstname = htmlspecialchars(trim($_POST['firstname'] ?? ''));
$lastname  = htmlspecialchars(trim($_POST['lastname'] ?? ''));
$ageRaw    = trim($_POST['age'] ?? '');
$age       = (int) $ageRaw;
$group     = htmlspecialchars(trim($_POST['group'] ?? ''));

$errors = [];

// Проверка на пустые поля
if (empty($firstname)) {
    $errors[] = "Не заполнено поле «Имя».";
}
if (empty($lastname)) {
    $errors[] = "Не заполнено поле «Фамилия».";
}
if (empty($ageRaw)) {
    $errors[] = "Не заполнено поле «Возраст».";
}
if (empty($group)) {
    $errors[] = "Не заполнено поле «Группа».";
}

// Проверка возраста
if (!empty($ageRaw) && ($age < 16 || $age > 100)) {
    $errors[] = "Возраст должен быть в диапазоне от 16 до 100.";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат регистрации</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; margin: 0; padding: 40px 16px; }
        .card { max-width: 400px; margin: 0 auto; background: #fff; border-radius: 12px;
                padding: 28px 32px; box-shadow: 0 4px 16px rgba(0,0,0,.08); }
        .error { color: #c62828; }
        a { color: #1565c0; }
    </style>
</head>
<body>
<div class="card">
<?php if (!empty($errors)): ?>
    <h1 class="error">Ошибка</h1>
    <ul class="error">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <h1>Карточка студента</h1>
    <p><b>Имя:</b> <?= $firstname ?></p>
    <p><b>Фамилия:</b> <?= $lastname ?></p>
    <p><b>Возраст:</b> <?= $age ?></p>
    <p><b>Группа:</b> <?= $group ?></p>
<?php endif; ?>
    <p><a href="form.html">Вернуться к форме</a></p>
</div>
</body>
</html>
