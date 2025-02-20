<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))
{
    if(isset($_POST['addlocation']))
    {
        $id = bin2hex(random_bytes(8));
        $name = $_POST['name'];
        $slug = str_replace(' ', '-', strtolower($name));
        if(empty($_POST['parent']))
        {
            $parent = 1;
        }
        else
        {
            $parent = $_POST['parent'];
        }
        $stmt = $conn->prepare("INSERT INTO location (id,name, slug, parent) VALUES (?, ?, ?, ?)"); $stmt->bind_param("ssss", $id,$name, $slug, $parent); $add_q = $stmt->execute(); $stmt->close();
        if (!$add_q)
        {
            echo "Error: " . mysqli_error($conn);
        }
        else
        {
            echo("Location added successfully.");
            //header("Location: ../pages/admin.php");
            //exit();
        }
    }
    else if(isset($_POST['updatepublic']))
    {
        $id = $_POST['id'];
        $public = $_POST['public'];
        $stmt = $conn->prepare("UPDATE location SET public = ? WHERE id = ?");
        $stmt->bind_param("is", $public, $id); $add_q = $stmt->execute();
        $stmt->close();
        if (!$add_q) {
            echo "Error: " . mysqli_error($conn);
        }
        else
        {
            echo("Location updated successfully.");
            //header("Location: ../pages/admin.php?location=".$_POST['slug']);
            //exit();
        }
    }
    else if(isset($_POST['updatename']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $parent = $_POST['parent'];
        $tag = $_POST['tag'];
        $slug = str_replace(' ', '-', strtolower($name));
        $stmt = $conn->prepare("UPDATE location SET name = ?, slug = ?, parent = ?, tag = ? WHERE id = ?"); $stmt->bind_param("sssss", $name, $slug, $parent, $tag, $id); $add_q = $stmt->execute(); $stmt->close();
        if (!$add_q) {
            echo "Error: " . mysqli_error($conn);
        } else {
            echo("Location updated successfully.");
            //header("Location: ../pages/admin.php?location=".$slug);
            //exit();
        }
    }
    else if(isset($_POST['updateaddress']))
    {
        $id = $_POST['id'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $stmt = $conn->prepare("UPDATE location SET address = ?, description = ? WHERE id = ?"); $stmt->bind_param("sss", $address, $description, $id); $add_q = $stmt->execute(); $stmt->close();
        if (!$add_q) {
            echo "Error: " . mysqli_error($conn);
        } else {
            echo("Location updated successfully.");
            //header("Location: ../pages/admin.php?location=".$_POST['slug']);
            //exit();
        }
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
            if($l_r['public'] == 1)
            {
                $content .= '       <i class="text-success bi bi-patch-check"></i>';
            }
            $content .= '       </div>';
            $content .= '       <div class="col-3 text-center">';
            $content .=             $l_r['tag'];
            $content .= '       </div>';
            $content .= '       <div class="col-1">';
            $content .= '           <a href="../pages/location.php?location='.$l_r['slug'].'" target="_blank"> <i class="bi bi-box-arrow-up-right"></i></a>';
            $content .= '           <a href="../pages/admin.php?location='.$l_r['slug'].'"><i class="bi bi-pencil"></i></a>';
            $content .= '       </div>';
            $content .= '   </div>';
        }
        $content .= '</div>';
    }
    return($content);
}

function displaylocation($conn,$slug)
{
    $content = "";
    $content .= '<div class="container bg-light text-dark rounded my-3">';
    $location_q = mysqli_query($conn,"SELECT * FROM location WHERE slug = '$slug' LIMIT 1");
    if(mysqli_num_rows($location_q)>0)
    {
        $l_r = mysqli_fetch_assoc($location_q);
        global $title;
        $title = $l_r['name'];
        $content .= '<h1 class="text-center" style="">Sunting </h1>';
        $content .= '<h2 class="text-center" style="">'.$l_r['name'];
        $content .= '   <a href="../pages/location.php?location='.$l_r['slug'].'" target="_blank"> <i class="bi bi-box-arrow-up-right"></i></a>';
        $content .= '</h2>';
        //* Change location public
        $content .= '<form class="center-align d-flex m-2" method="POST" action="../pages/admin.php">';
        $content .= '   <input class="" type="text" name="id" value="'.$l_r['id'].'" hidden>';
        $content .= '   <input class="" type="text" name="slug" value="'.$l_r['slug'].'" hidden>';
        $content .= '   <input class="form-control form-check-input" type="checkbox" id="public" name="public" '.($l_r['public'] == 1 ? 'checked' : '').' value="1">';
        $content .= 'Public';
        $content .= '   <input type="submit" name="updatepublic" value="Kemaskini" class="btn btn-primary rounded-pill">';
        $content .= '</form>';
        //* Chnage name and parent
        $content .= '<form class="center-align" method="POST" action="../pages/admin.php">';
        $content .= '<div class="d-flex">';
        $content .= '   <input class="" type="text" name="id" value="'.$l_r['id'].'" hidden>';
        $content .= '   <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lokasi" value="'.$l_r['name'].'">';
        $content .= '   <select id="parent" name="parent" class="form-control">';
            $parent_q = mysqli_query($conn,"SELECT id,name FROM location WHERE public = '1'");
            if(mysqli_num_rows($parent_q)>0)
            {
                while($p_r = mysqli_fetch_assoc($parent_q))
                {
                    $content .= '<option value="'.$p_r['id'].'"';
                    if($p_r['id'] == $l_r['parent'])
                    {
                        $content .= ' selected';
                    }
                    $content .= '>'.$p_r['id']." : ".$p_r['name'].'</option>';

                }
            }
        $content .= '   </select>';
        $content .= '</div>';
        $content .= '<input type="text" name="tag" id="tagInput" class="form-control" data-role="tagsinput" placeholder="Add tags..." value="'.$l_r['tag'].'">';
        $content .= '<input type="submit" name="updatename" value="Kemaskini" class="btn btn-primary rounded-pill">';
        $content .= '</form>';
        //* Change address and description
        $content .= '<form class="center-align" method="POST" action="../pages/admin.php">';
        $content .= '   <input class="" type="text" name="id" value="'.$l_r['id'].'" hidden>';
        $content .= '   <input class="" type="text" name="slug" value="'.$l_r['slug'].'" hidden>';
        $content .= '   <input type="text" id="address" name="address" class="form-control" placeholder="Alamat" value="'.$l_r['address'].'">';
        $content .= '   <textarea name="description" class="form-control" placeholder="Penerangan">'.$l_r['description'].'</textarea>';
        $content .= '   <input type="submit" name="updateaddress" value="Kemaskini" class="btn btn-primary rounded-pill">';
        $content .= '</form>';
    }
    $content .= '</div>';
    return($content);
}
?>