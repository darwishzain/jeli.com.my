<?php
include('../config/database.php');
include('../functions/crowd.php');
$title='Kongsi Maklumat';
$content = "";
$content .= '<h1 class="text-center">Kongsi Maklumat</h1>';
$content .= crowdform($conn);
?>
<?php include('../layout/main.php');?>
