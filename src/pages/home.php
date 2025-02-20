<?php
include('../functions/main.php');
$title="Selamat Datang ke Jajahan Jeli";
$description="Terokai lokasi-lokasi menarik di Jajahan Jeli";
$content = '';
$content .= '<div class="container">';
$content .= '<div class="row text-black bg-light rounded my-4 py-4">';
$content .= '<h1 class="text-center">'.$title.'</h1>';
$content .= '<h4 class="text-center text-secondary">'.$description.'</h4>';
$content .= '<a href="../pages/location.php?location=contoh-lokasi-darwish-zain-studio" class="w-50 m-auto btn btn-info">Contoh</a>';
$content .= '</div>';
$content .= '</div>';
?>
<?php include('../layout/main.php');?>
