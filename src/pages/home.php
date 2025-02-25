<?php
include('../functions/main.php');
$title="Selamat Datang ke Jajahan Jeli";
$description="Terokai lokasi-lokasi menarik di Jajahan Jeli";
$content = '';
$content .= '<div class="container bg-light rounded">';
$content .= '<div class="row text-black text-center rounded my-4 py-4">';
$content .= '   <div class="col-6 text-black rounded">';
$content .= '       <h2>Selamat datang ke Jajahan Jeli</h2><h4 class="text-secondary">Terokai lokasi-lokasi menarik di Jajahan Jeli</h4>';
$content .= '   </div>';
$content .= '   <div class="col-6 text-black rounded">';
$content .= '       <a class="btn btn-success w-50" href="../pages/location.php">Terokai</a>';
$content .= '   </div>';
$content .= '</div>';

$content .= '<div class="row text-black text-center rounded my-4 py-4">';
$content .= '   <div class="col-6 text-black rounded">';
$content .= '       <a class="btn btn-success w-50" href="../pages/location.php?location=contoh-lokasi">Contoh</a>';
$content .= '   </div>';
$content .= '   <div class="col-6 text-black rounded">';
$content .= '       <h2>Kongsikan lokasi anda</h2><h4 class="text-secondary">Dapatkan halaman untuk lokasi anda</h4>';
$content .= '   </div>';
$content .= '</div>';

$content .= '</div>';
?>
<?php include('../layout/main.php');?>
