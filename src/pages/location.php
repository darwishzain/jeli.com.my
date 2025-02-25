<?php 
include('../functions/main.php');
include('../functions/location.php');
if(isset($_GET['id']))
{
    $slug = $conn->query("SELECT slug FROM location WHERE id = {$_GET['id']}")->fetch_assoc()['slug'];
    redirect("../pages/location.php?location=$slug");
}
?>
<?php $title="Lokasi"?>
<?php
$content = "";
if(!empty($_GET))
{
    if(isset($_GET['location']))
    {
        $content .= displaylocation($conn,urldecode($_GET['location']));
    }
    else if(isset($_GET['tag']))
    {
        $content .= listlocation($conn,urldecode($_GET['tag']));
    }
    else if(isset($_GET['search']))
    {
        $content .= 'SEDANG DINAIKTARAF';
    }
}
else
{
    $content .= listlocation($conn,"");
}
?>
<?php include('../layout/main.php');?>