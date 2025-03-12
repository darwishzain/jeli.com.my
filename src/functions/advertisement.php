<?php
function adsinlist($conn)
{
    $content = "";
    if(rand(1,12)== 1)
    {
        $advertisement_q = $conn->query("SELECT * FROM advertisement WHERE type = 'list'");
        if(($a_c = mysqli_num_rows($advertisement_q))>0)
        {
            $ads = [];
            $content .= '<li class="ads list-group-item text-center py-3">';
            while($a_r = mysqli_fetch_assoc($advertisement_q))
            {
                $ads[] = [
                    'id'    => $a_r['id'],      // Store the ad ID
                    'link'  => $a_r['link'],    // Store the ad link
                    'image' => $a_r['image']    // Store the ad image
                ];
            }
            if (count($ads) > 0) {
                // Choose a random ad from the array
                $r_ads = $ads[array_rand($ads)];
                $content .= '<span class="text-white">Iklan</span><br>';
                $content .= '<a href="' . $r_ads['link'] . '" target="_blank" rel="noopenner noreferrer nofollow"><img src="' . $r_ads['image'] . '" border="0" width="100%" alt="Iklan" /></a>';
            }
            $content .= '</li>';
        }
        else
        {
            $content .= '<li class="ads list-group-item text-center py-3">';
            $content .= '<span class="text-white">Iklan</span><br>';
            $content .= 'Contoh Iklan';
            $content .= '</li>';
        }
        return($content);
    }
    else
    {
        return("");
    }
}
?>