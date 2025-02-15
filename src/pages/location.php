<?php 
include('../config/database.php');
include('../functions/location.php');
include('../functions/advertisement.php');
?>
<?php $title="Lokasi"?>
<?php
$content = "";
if(!empty($_GET))
{
    if(isset($_GET['id']))
    {
        $slug = $conn->query("SELECT slug FROM location WHERE id = {$_GET['id']}")->fetch_assoc()['slug'];
        header("Location:../pages/location.php?location=$slug");
    }
    else if(isset($_GET['location']))
    {
        $content .= displaylocation($conn,mysqli_real_escape_string($conn,$_GET['location']));
    }
    else if(isset($_GET['tag']))
    {
        $content .= listlocation($conn,$_GET['tag']);
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