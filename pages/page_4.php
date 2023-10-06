<form method="post">
    <input type="submit" name="order" value="Заказать">
</form>

<?php
// Регистрация открытия страницы
$fileCounter = "counter.txt";
$currentData = file_get_contents($fileCounter);
$currentData .= "Интерес к баннеру: 04.gif\n";
$clickBanner = "Клик по баннеру: 04.gif\n";
$currentData .= $clickBanner;
file_put_contents($fileCounter, $currentData);

if (isset($_POST['order'])) {
    $currentData = file_get_contents($fileCounter);
    $currentData .= "Покупка по баннеру: 04.gif\n";
    file_put_contents($fileCounter, $currentData);
}

$bannerTextFile = "../Текст04.txt";
$ansiText = file_get_contents($bannerTextFile);
$bannerText = iconv('Windows-1251', 'UTF-8', $ansiText);
echo "<p>" . $bannerText . "</p>";

?>
