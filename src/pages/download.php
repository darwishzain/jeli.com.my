<?php
include('../functions/main.php');
include('../functions/download.php');
$title='Muat Turun';
$description = 'Muat turun bahan digital';
$content = '';

if(!empty($_GET))
{
    if(isset($_GET['download']))
    {
        $content .= listdownload($conn,"");
    }
    else if(isset($_GET['tag']))
    {

    }
}
else
{
    redirect('../pages/download.php?download');
}
?>
<?php include('../layout/main.php');?>
