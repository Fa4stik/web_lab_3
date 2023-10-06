<?php
// Выбор случайного баннера
$bannerNumber = rand(1, 5);
$bannerImage = $bannerNumber . ".gif";

// Регистрация показа баннера в файле-счетчике
$fileCounter = "counter.txt";
$currentData = file_get_contents($fileCounter);
$currentData .= "Показ баннера: 0" . $bannerImage . "\n";
file_put_contents($fileCounter, $currentData);

echo '<a href="metrics.php">Посмотреть метрики</a>';
echo "<a href='pages/page_" . $bannerNumber . ".php'><img src='0" . $bannerImage . "' alt='Баннер'></a>";
?>
