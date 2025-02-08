<?php
//* FUNCTION STRUCTURE
/* function defaultfunction($conn,$variable1)
{
    $content = "";
    $content .= '<div class="container">';
    //Append content here
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

function listlocation($conn)
{
    $content = "";
    $content .= '<div class="container">';
    $location_q = mysqli_query($conn,"SELECT * FROM location WHERE public = '1'");
    if(mysqli_num_rows($location_q)>0)
    {
        $content .= "<h1 style='text-align:center;'>Lokasi</h1>";
        while($l_r = mysqli_fetch_assoc($location_q))
        {
            $content .= '<div class="col-6 bg-light text-dark" style="margin:auto;text-align:center; border-radius:15px;">';
            $content .= '  <div>';
            $content .= '    <div>';
            $content .= '      <a href="../pages/location.php?location='.$l_r['slug'].'"><h3>'.$l_r['name'].'</h3></a>';
            $content .= '    </div>';
            $content .= '    <div class="d-flex flex-wrap justify-content-center">';
            $content .= '      <span class="keyword">Kategori</span>';
            $content .= '    </div>';
            $content .= '  </div>';
            $content .= '  <div style="margin-bottom: 20px;"></div>';
            $content .= '</div>';
        }
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