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
    $content .= '<div class="container">';
    global $urlprefix;
    $location_q = mysqli_query($conn,"SELECT * FROM location WHERE slug = '$slug' LIMIT 1");
    if(mysqli_num_rows($location_q)>0)
    {
        while($l_r = mysqli_fetch_assoc($location_q))
        {
            $content .= '<h1>'.$l_r['name'].
                '<button class="btn btn-light btn-sm" onclick="copyurltoclipboard()">
                    <i class="fas fa-copy"></i>
                </button>
                </h1>';
            $content .= $l_r['address'];
            foreach ($urlprefix as $name => $url) {
                if(!empty($l_r[$name]))
                {
                    $content .= '<a href="' . $url['attribute'] . $l_r[$name] . '" target="_blank">';
                    if (!empty($url['icon'])) {
                        $content .= '<i class="' . $url['icon'] . '"></i>';
                    }
                    $content .= '</a>';
                }
            }
        }
    }
    $content .= '</div>';
    return $content;
}
?>