<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
{
    if(isset($_POST['addlocation']))
    {
        $name = $_POST['name'];
        $slug = str_replace(' ', '-', strtolower($name));
        $parent = $_POST['parent'];
        $stmt = $conn->prepare("INSERT INTO location (name, slug, parent) VALUES (?, ?, ?)"); $stmt->bind_param("ssi", $name, $slug, $parent); $add_q = $stmt->execute(); $stmt->close();
        if (!$add_q) {
            echo "Error: " . mysqli_error($conn);
        } else {
            echo("Location added successfully.");
        header("Location: ../pages/admin.php");
        exit();}
    }
}

function refreshfolder($folder)
{
    global $conn;
    if($folder == 'locations')
    {
        $location_q = mysqli_query($conn,"SELECT id FROM location");
        if(mysqli_num_rows($location_q)>0)
        {
            while($l_r = mysqli_fetch_assoc($location_q))
            {
                $dir = "../uploads/locations/" . $l_r['id'];
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
            }
        }
        //echo('<script>alert("Direktori lokasi dikemaskini.")</script>');
    }
}
function addlocationform($conn)
{
    $content = "";
    $content .= '<div class="container">';
    $content .= '<h1 class="text-center" style="">Lokasi</h1>';
    $content .= '<form class="center-align" method="POST" action="../pages/admin.php">';
    $content .= '   <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lokasi">';
    $content .= '   <select id="parent" name="parent" class="form-control">';
                $parent_q = mysqli_query($conn,"SELECT id,name FROM location WHERE public = '1'");
                if(mysqli_num_rows($parent_q)>0)
                {
                    while($p_r = mysqli_fetch_assoc($parent_q))
                    {
                        $content .= '<option value="'.$p_r['id'].'">'.$p_r['id']." : ".$p_r['name'].'</option>';
                    }
                }
    $content .= '   </select>';
    $content .= '   <input name="addlocation" type="submit" value="Tambah" class="btn btn-primary rounded-pill">';
    $content .= '</form>';
    $content .= '</div>';
    return($content);
}

function nav($user)
{
    //! NEED TO FIX THIS [add navigation for admin]
    $content = "";
    $content .= '<nav class="navbar navbar-expand-lg navbar-light bg-primary">';
    $content .= '    <div class="collapse navbar-collapse" id="navbarNav">';
    $content .= '        <ul class="navbar-nav">';
    $content .= '            <li class="nav-item">';
    $content .= '                <a class="nav-link text-white" href="../pages/admin.php?lokasi">Lokasi</a>';
    $content .= '            </li>';
    $content .= '            <li class="nav-item">';
    $content .= '                <a class="nav-link text-white" href="../pages/admin.php?link">Pautan</a>';
    $content .= '            </li>';
    $content .= '            <li class="nav-item">';
    $content .= '                <a class="nav-link text-white" href="../pages/admin.php?user">Pengguna</a>';
    $content .= '            </li>';
    $content .= '        </ul>';
    $content .= '    </div>';
    $content .= '</nav>';
    return $content;
}

function listlocation($conn)
{
    $content = "";
    $location_q = mysqli_query($conn,"SELECT * FROM location");
    if(mysqli_num_rows($location_q)>0)
    {
        $content .= '<div class="container bg-light text-black py-5 rounded">';
        while($l_r = mysqli_fetch_assoc($location_q))
        {
            $content .= '   <div class="row p-3 border border-1">';
            $content .= '       <div class="col-8 text-center">';
            $content .=             $l_r['name'];
            $content .= '       </div>';
            $content .= '       <div class="col-3 text-center">';
            $content .=             $l_r['tag'];
            $content .= '       </div>';
            $content .= '       <div class="col-1">';
            $content .= '           <a href="../pages/location.php?location='.$l_r['slug'].'" target="_blank"> <i class="bi bi-eye"></i></a>';
            $content .= '           <a href="../pages/admin.php?location='.$l_r['slug'].'"><i class="bi bi-pencil"></i></a>';
            $content .= '       </div>';
            $content .= '   </div>';
        }
        $content .= '</div>';
    }
    return($content);
}
?>