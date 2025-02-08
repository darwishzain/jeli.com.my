
<?php include('../config/database.php');?>
<?php include('../functions/admin.php');?>
<?php $title="Pentadbir"?>
<?php
$content = "";
if(!empty($_GET))
{
    if(isset($_GET['lokasi']))
    {
        echo("as");
    }
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
{
    if(isset($_POST['addlocation']))
    {
        $name = $_POST['name'];
        $slug = str_replace(' ', '-', strtolower($name));
        $parent = $_POST['parent'];
        $add_q = mysqli_query($conn,"INSERT INTO location (name,slug,parent) VALUES ('$name','$slug','$parent')");
        if (!$add_q) {
            echo "Error: " . mysqli_error($conn);
        } else {
            echo("Location added successfully.");
        header("Location: ../pages/admin.php");
        exit();}
    }
}
else
{
    $content .= addlocation($conn,$content);
    $location_q = mysqli_query($conn,"SELECT * FROM location");
    if(mysqli_num_rows($location_q)>0)
    {

    }
    $content .= '</div>';
}
?>
<?php include('../layout/main.php');?>
