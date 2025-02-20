<?php

//! Change the title, description, icondark, keywords, and author if necessary
$title = $title ?? "Selamat Datang ke Jajahan Jeli";
$description = $description ?? "Lokasi-lokasi menarik di Jajahan Jeli";
$icondark = $icondark ?? "../assets/media/default/icondark.png";
$keywords = $keywords ?? "jeli,kelantan,kuala balah,ayer lanas,pelancongan,usahawan,informasi";
$author = $author ?? "Darwish Zain Studio";

function navigation($file,$text,$style)
{
	$boolean = [];
	for ($i=0; $i < 2; $i++) { 
		if(empty($file[$i]))
		{
			$boolean[$i] = '1';
		}
		else
		{
			$boolean[$i] = file_exists($file[$i]);
		}
	}
	if(empty($style)){$style = 'btn-outline-success';}
	if($boolean['0']&&$boolean['1'])
	{
		?>
		<li class="nav-item m-1">
			<a class="nav-light rounded text-dark w-100 d-md-inline-block btn <?php echo($style);?>" href="<?php echo($file['0']);?>"><?php echo($text);?></a>
		</li>
		<?php
	}
}
?>