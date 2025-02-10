<?php
$development = 'true';//During Development = true

//Add to top of files
//checkfile(basename(__FILE__),$development);
function checkfile($filename,$development)
{
	if($development == 'true')
	{
		echo("<script>console.log('$filename');</script>");
	}
}

$title = $title ?? "Selamat Datang ke Jajahan Jeli";
$description = $description ?? "Lokasi-lokasi menarik di Jajahan Jeli";
$icondark = $icondark ?? "../assets/media/default/icondark.png";
$keywords = $keywords ?? "jeli,kelantan,kuala balah,ayer lanas,pelancongan,usahawan,informasi";
$author = $author ?? "Darwish Zain Studio";
?>