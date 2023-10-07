<?php
if (isset($_GET['banner'])) {
    $bannerClicked = $_GET['banner'];
    $fileCounter = "counter.txt";
    $currentData = file_get_contents($fileCounter);
    $currentData .= "Клик по баннеру: " . $bannerClicked . "\n";
    file_put_contents($fileCounter, $currentData);

    // Перенаправление на нужную страницу
    header("Location: pages/page_" . $bannerClicked . ".php");
    exit;
}
?>
