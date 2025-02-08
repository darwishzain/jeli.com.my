<?php

function addlocation($conn,$content)
{
    $content = "";
    $content .= '<div class="container">';
    $content .= '<h1 class="text-center" style="">Lokasi</h1>';
    $content .= '<form class="center-align" method="POST" action="../pages/admin.php">';
    $content .= '    <div class="form-row">';
    $content .= '        <div class="form-group col-4">';
    $content .= '            <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lokasi">';
    $content .= '        </div>';
    $content .= '        <div class="form-group col-4">';
    $content .= '            <select id="parent" name="parent" class="form-control">';
    $parent_q = mysqli_query($conn,"SELECT id,name FROM location WHERE public = '1'");
    if(mysqli_num_rows($parent_q)>0)
    {
        while($p_r = mysqli_fetch_assoc($parent_q))
        {
            $content .= '<option value="'.$p_r['id'].'">'.$p_r['id']." : ".$p_r['name'].'</option>';
        }
    }
    $content .= '            </select>';
    $content .= '        </div>';
    $content .= '        <div class="form-group col-4 align-self-end">';
    $content .= '            <input name="addlocation" type="submit" value="Tambah" class="btn btn-primary">';
    $content .= '        </div>';
    $content .= '    </div>';
    $content .= '</form>';
    return $content;
}
?>