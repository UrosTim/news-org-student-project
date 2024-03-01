<?php
//izvlacenje podataka iz baze za vesti i njihov prikaz
$data_news = [];
$sql = "SELECT * FROM `news` ORDER BY `news_date` DESC LIMIT 6 ";
$result = mysqli_query($_db,$sql);
while ($row = mysqli_fetch_assoc($result))
    $data_news[] = $row;
if (empty($data_news))
    $_message[] = 'No articles at this time';
//izvlacenje podataka iz baze za slike i njihov prikaz
$data_images = [];
$sql = "SELECT * FROM `gallery` ORDER BY `gallery_date` DESC LIMIT 4";
$result = mysqli_query($_db,$sql);
while ($row = mysqli_fetch_assoc($result))
    if (file_exists(DIR_PUBLIC_GALLERY . $row['gallery_id'] . 't.jpg')) {
        $data_images[] = $row;
    }
if (empty($data_images))
    $_message[] = 'No images at this time';
$_page_output = [
    'page_title' => 'Home',
    'view' => 'module-home-view.php'
];
?>