<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
{
    if(isset($_POST['addinformation']))
    {

    }
}
function crowdform($conn)
{
    $content = "";
    $content .= '<div class="container my-5">';
    $content .= '<form class="center-align" method="POST" action="../pages/crowd.php">';
    $content .= '   <input type="text" id="link" name="link" class="form-control" placeholder="Pautan">';
    $content .= '   <input type="text" id="name" name="name" class="form-control" placeholder="Nama">';
    $content .= '   <textarea id="attribute" name="attribute" class="form-control" placeholder="Attribute"></textarea>';
    $currentDate = date('Y-m-d');
    $content .= '   <input type="date" id="date" name="date" class="form-control" value="' . $currentDate . '">';
    $content .= '   <input type="submit" class="btn btn-primary rounded-pill m-1" value="Tambah">';
    $content .= '</form>';
    $content .= '</div>';
    return($content);
}
?>