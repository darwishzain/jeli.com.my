<?php
include('../functions/main.php');
include('../functions/user.php');

$title='Pengguna';
$content = '';

if(empty($_SESSION['id'])) {
    if(isset($_GET['register']))
    {
        $content .= accountform('register');
    }
    else if(isset($_GET['login']))
    {
        $content .= accountform('login');
    }
    else
    {
        $content .= accountform('login');
    }
}

$content .= '<h1 class="text-center">Pengguna</h1>';

if(!empty($_SESSION['id']))
{
    if(isset($_GET['user']))
    {
        $content .= $_SESSION['id'].$_SESSION['username'].$_SESSION['role'];
    }
    $title = '@'.$_SESSION['username'];
    $content .= $_SESSION['username'].' ['.$_SESSION['role'].']';
}
else
{

}

?>
<?php include('../layout/main.php');?>
