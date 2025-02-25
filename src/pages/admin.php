<?php
include('../functions/main.php');
include('../functions/admin.php');
if(empty($_SESSION['id']) || $_SESSION['role']!='admin')
{
    redirect("../pages/location.php");
}
$title = "Pentadbir";
$content = "";
//$content .= nav('admin');
if(!empty($_GET))
{
    if(isset($_GET['location']))
    {
        refreshdirectory('locations');
        if(!empty($_GET['location']))
        {
            $content .= displaylocation($conn,urldecode($_GET['location']));
        }
        else
        {
            $content .= listlocation($conn,"");
        }
    }
    else if(isset($_GET['tag']))
    {
        $content .= listlocation($conn,urldecode($_GET['tag']));
    }
    else
    {
        $content .= '<h1 class="text-center" style="">Dashboard</h1>';
    }
    
}
else
{
    redirect('../pages/admin.php?location');
}

?>
<?php include('../layout/main.php');?>
