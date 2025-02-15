<?php
//* FUNCTION STRUCTURE
/* function defaultfunction($conn,$variable1)
{
    $content = "";
    $content .= '<div class="container">';
    //!Append content here
    $content .= '/<div>';
    return $content;
} */

$urlprefix = [];
$urlprefix['phone'] = ['attribute' => 'tel:60','icon' => 'bi bi-telephone-fill'];
$urlprefix['email'] = ['attribute' => 'mailto:','icon' => 'bi bi-envelope'];
$urlprefix['website'] = ['attribute' => '','icon' => 'fa fa-globe'];
$url_r = mysqli_query($conn,"SELECT * FROM url");
if(mysqli_num_rows($url_r)>0)
{
	while($row = mysqli_fetch_assoc($url_r))
	{
		$urlprefix[$row['name']] = [
            'attribute' => $row['attribute'],
            'icon' => $row['icon']
        ];
	}
}
//print_r($urlprefix);

function listlocation($conn,$tag)
{
    $content = "";
    $title = "Lokasi";
    global $urlprefix;
    $content .= '<div class="container mt-4">';
    if(!empty($tag)){$argument = ' AND tag = "'.$tag.'"';}
    else{$argument = "";}
    $location_q = mysqli_query($conn,'SELECT * FROM location WHERE public = "1"'.$argument);
    if(mysqli_num_rows($location_q)>0)
    {
        $content .= "<h1 style='text-align:center;'>Lokasi</h1>";
        if(!empty($tag)){$content .= "<h2 style='text-align:center;'>#".$tag."</h2>";}
        $content .= '<ul class="list-group my-4">';
        while($l_r = mysqli_fetch_assoc($location_q))
        {
            if(file_exists('../functions/advertisement.php'))
            {
                $content .= adsinlist($conn);
            }
            $content .= '<li class="list-group-item d-flex align-items-center">';
            $content .= '   <div>';
            $content .= '       <img src="../assets/media/default/icondark.png" alt="Logo" class="me-3" style=" width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">';
            $content .= '   </div>';
            $content .= '   <div>';
            $content .= '       <a href="../pages/location.php?location='.$l_r['slug'].'"><strong>'.$l_r['name'].'</strong> <i class="text-success bi bi-patch-check-fill"></i></a>';
            $content .= '       <a href="../pages/location.php?tag='.$l_r['tag'].'"><small class="text-primary m-5">#'.$l_r['tag'].'</small></a>';
            $content .= '   </div>';
            $content .= '   <div class="social-icons ms-auto">';
            foreach ($urlprefix as $name => $url) {
                if(!empty($l_r[$name]))
                {
                    $content .= '<a href="' . $url['attribute'] . $l_r[$name] . '" target="_blank">';
                    if (!empty($url['icon'])) {
                        $content .= '<i class="' . $url['icon'] . ' me-2"></i>';
                    }
                    $content .= '</a>';
                }
            }
            $content .= '</div>';
            $content .= '</li>';
        }
        $content .= '</ul>';
    }
    $content .= '</div>';
    return $content;
}

function displaylocation($conn,$slug)
{
    $content = "";
    $content .= '<p class="text-center my-2"><a href="https://wa.me/601137535178" class="btn btn-primary" target="_blank">Dapatkan halaman untuk lokasi anda</a></p>';
    $content .= '<div class="container text-black bg-light p-4 my-4 rounded">';
    global $urlprefix;
    $location_q = mysqli_query($conn,"SELECT * FROM location WHERE slug = '" . mysqli_real_escape_string($conn, $slug) . "' LIMIT 1");
    if(mysqli_num_rows($location_q)>0)
    {
        while($l_r = mysqli_fetch_assoc($location_q))
        {
            global $title;
            $title = $l_r['name'];
            //$content .= breadcrumblocation($conn,$l_r['id']);
            $content .= '<div class="row">';
            $content .= '   <div class="col-8 text-center">';
            $content .= '       <h1 class="">'.$l_r['name'];
            $content .='            <button class="btn" onclick="copyurltoclipboard()"><i class="bi bi-copy "></i></button>';
            $content .= '       </h1>';
            foreach ($urlprefix as $name => $url) {
                if(!empty($l_r[$name]))
                {
                    $content .= '<a class="btn btn-success mx-1 rounded-pill" href="' . $url['attribute'] . $l_r[$name] . '" target="_blank">';
                    if (!empty($url['icon'])) {
                        $content .= '<i class="' . $url['icon'] . '"></i>';
                    }
                    $content .= '</a>';
                }
            }
            $content .= '   </div>';
            $content .= '   <div class="col-4 text-center">';
            $content .=             $l_r['address'];
            $content .= '   </div>';
            $content .= '</div>';
            $content .= '<div class="row text-center border border-1 p-4 my-4 rounded">';
            $content .= '   <div class="col-12 text-center my-1">'.$l_r['description'].'</div>';
            $content .= '</div>';
            $content .= '<div class="row border border-2 border-danger text-danger"><h4 class="text-center">SEDANG DINAIK TARAF</h4>';
            $content .= '   <iframe width="600" height="400" src="https://www.openstreetmap.org/export/embed.html?bbox=101.4626%2C5.4352%2C102.1868%2C5.7245&layer=mapnik" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';
            $content .= '</div>';
        }
    }
    $content .= '</div>';
    return $content;
}

function breadcrumblocation($conn,$id)
{
    $content = "";
    $breadcrumb = [];
    while($id)
    {
        $crumb_q = mysqli_query($conn,"SELECT id,name,parent FROM location WHERE id = $id");
        if(mysqli_num_rows($crumb_q)>0)
        {
            if($c_r = mysqli_fetch_assoc($crumb_q))
            {
                $content .= $c_r['name'];
                return($content);//$content .= $c_r['name'];
            }
        }
    }
    return($content);
}
?>