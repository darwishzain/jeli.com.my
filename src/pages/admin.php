<?php
include('../functions/main.php');
include('../functions/admin.php');
if(empty($_SESSION['id']) || $_SESSION['role']!='admin')
{
    header("Location: ../pages/location.php");
    exit();
}
$title = "Pentadbir";
$content = "";
//$content .= nav('admin');
if(!empty($_GET))
{
    if(isset($_GET['location']))
    {
        refreshdirectory('locations');
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
    $content .= addlocationform($conn);
    $content .= listlocation($conn);
}

?>
<?php include('../layout/main.php');?>
