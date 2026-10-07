<?php
// Пара 3. Серверный сценарий «Результат студента»

$fullName   = "Иванов Андрей Сергеевич";
$age        = 19;
$group      = "ИСП-21";
$speciality = "Информационные системы и программирование";
$grades     = [5, 4, 5, 4, 5];

// Расчёт среднего балла
$sum = 0;
foreach ($grades as $grade) {
    $sum = $sum + $grade;
}
$count   = count($grades);
$average = $sum / $count;

// Определение итогового статуса
if ($average >= 4.5) {
    $status = "Отличный результат";
    $color  = "#2e7d32";
} elseif ($average >= 3.5) {
    $status = "Хороший результат";
    $color  = "#1565c0";
} elseif ($average >= 3.0) {
    $status = "Удовлетворительно";
    $color  = "#ef6c00";
} else {
    $status = "Нужно улучшить";
    $color  = "#c62828";
}

// Дополнительная проверка с логическими операторами
$hasTwo = in_array(2, $grades);
$allFives = ($average == 5);
if ($allFives && !$hasTwo) {
    $note = "Все оценки — отлично!";
} elseif ($hasTwo || $average < 3.0) {
    $note = "Есть неудовлетворительные оценки, требуется пересдача.";
} else {
    $note = "Неудовлетворительных оценок нет.";
}

echo "<!DOCTYPE html>";
echo "<html lang='ru'><head><meta charset='UTF-8'>";
echo "<title>Результат студента</title>";
echo "<style>
    body { font-family: Arial, sans-serif; background: #f2f4f8; margin: 0; padding: 40px 16px; }
    .card { max-width: 560px; margin: 0 auto; background: #fff; border-radius: 12px;
            padding: 28px 32px; box-shadow: 0 4px 16px rgba(0,0,0,.08); }
    h1 { margin-top: 0; color: #333; }
    ul { padding-left: 20px; line-height: 1.7; }
    .status { padding: 12px 16px; border-radius: 8px; color: #fff; font-weight: bold; }
</style></head><body>";

echo "<div class='card'>";
echo "<h1>Отчёт об успеваемости</h1>";
echo "<p><b>ФИО:</b> " . $fullName . "</p>";
echo "<p><b>Возраст:</b> " . $age . "</p>";
echo "<p><b>Группа:</b> " . $group . "</p>";
echo "<p><b>Специальность:</b> " . $speciality . "</p>";

echo "<h2>Оценки</h2>";
echo "<ul>";
for ($i = 0; $i < $count; $i++) {
    echo "<li>Оценка " . ($i + 1) . ": " . $grades[$i] . "</li>";
}
echo "</ul>";

echo "<p><b>Сумма баллов:</b> " . $sum . "</p>";
echo "<p><b>Средний балл:</b> " . round($average, 2) . "</p>";
echo "<p class='status' style='background:" . $color . "'>Итог: " . $status . "</p>";
echo "<p><i>" . $note . "</i></p>";
echo "</div>";

echo "</body></html>";
?>
