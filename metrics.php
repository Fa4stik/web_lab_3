<?php
// Чтение данных из файла
$data = file_get_contents("counter.txt");
$lines = explode("\n", $data);

// Инициализация счетчиков
$bannerShows = array_fill(1, 5, 0);
$bannerClicks = array_fill(1, 5, 0);
$interestActions = array_fill(1, 5, 0);
$buyActions = array_fill(1, 5, 0);

// Анализ данных
foreach ($lines as $line) {
    for ($i = 1; $i <= 5; $i++) {
        if (strpos($line, "Показ баннера: 0" . $i . ".gif") !== false) {
            $bannerShows[$i]++;
        } elseif (strpos($line, "Клик по баннеру: 0" . $i . ".gif") !== false) {
            $bannerClicks[$i]++;
        } elseif (strpos($line, "Интерес к баннеру: 0" . $i . ".gif") !== false) {
            $interestActions[$i]++;
        } elseif (strpos($line, "Покупка по баннеру: 0" . $i . ".gif") !== false) {
            $buyActions[$i]++;
        }
    }
}

// Расчет метрик и вывод результатов
for ($i = 1; $i <= 5; $i++) {
    $CTR = ($bannerShows[$i] != 0) ? ($bannerClicks[$i] / $bannerShows[$i]) * 100 : 0;
    $CTI = ($bannerClicks[$i] != 0) ? ($interestActions[$i] / $bannerClicks[$i]) * 100 : 0;
    $CTB = ($bannerClicks[$i] != 0) ? ($buyActions[$i] / $bannerClicks[$i]) * 100 : 0;

    echo "Баннер " . $i . ":<br>";
    echo "CTR: " . $CTR . "%<br>";
    echo "CTI: " . $CTI . "%<br>";
    echo "CTB: " . $CTB . "%<br><br>";
}
?>
