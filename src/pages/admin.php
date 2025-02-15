
<?php 
include('../config/database.php');
include('../functions/admin.php');
$title = "Pentadbir";

$content = "";
//$content .= nav('admin');
if(!empty($_GET))
{
    if(isset($_GET['location']))
    {
        refreshfolder('locations');
        if(empty($_GET['location']))
        {
            $content .= addlocationform($conn);
            $content .= listlocation($conn);
        }
        else
        {
            $content .= displaylocation($conn,mysqli_real_escape_string($conn,$_GET['location']));
        }
    }
    else
    {
        $content .= '<h1 class="text-center" style="">Dashboard</h1>';
    }
}
else
{
    header("Location:../pages/admin.php?location");
}
?>
<?php include('../layout/main.php');?>
