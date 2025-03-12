<?php
//session_start();
//! Change the title, description, icondark, keywords, and author if necessary
$title = $title ?? "Selamat Datang ke Jajahan Jeli";
$description = $description ?? "Lokasi-lokasi menarik di Jajahan Jeli";
$icondark = $icondark ?? "../assets/media/default/icondark.png";
$keywords = $keywords ?? "jeli,kelantan,kuala balah,ayer lanas,pelancongan,usahawan,informasi";
$author = $author ?? "Darwish Zain Studio";

?>
<title><?php echo($title);?></title>
<link rel="shortcut icon" href="../assets/media/default/icondark.png" type="image/x-icon">

<html lang = "ms">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:updated_time" content="2025-02-25T15:30:00Z">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RM2PDHT85D"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-RM2PDHT85D');
</script>

<!--Assets-->
<link rel="stylesheet" href="../assets/bootstrap/bootstrap.css?ver=<?php echo(rand(111,9999));?>">
<link rel="stylesheet" href="../assets/main.css?ver=<?php echo(rand(111,9999));?>">
<link rel="stylesheet" href="../assets/bootstrap/icon/font/bootstrap-icons.min.css?ver=<?php echo(rand(111,9999));?>">
<link rel="stylesheet" href="../assets/fontawesome/css/all.min.css?ver=<?php echo(rand(111,9999));?>">

<!--Googel Font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Primary Meta Tags-->
<meta name="title" content="<?php echo($title);?>" />
<meta name="description" content="<?php echo($description);?>" />
<meta name="keywords" content="<?php echo($keywords);?>">
<meta name="author" content="<?php echo($author);?>">
<meta name="robots" content="index,follow">
<meta name="p:domain_verify" content="879a7c6af7c7cb0806dcf64830913e32"/>

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="<?php echo($title);?>">
<meta itemprop="description" content="<?php echo($description);?>">

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://jeli.com.my" />
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo($title);?>">
<meta property="og:description" content="<?php echo($description);?>">
<meta property="og:image" content="<?php echo($icondark);?>" />

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://jeli.com.my" />
<meta name="twitter:title" content="<?php echo($title);?>">
<meta name="twitter:description" content="<?php echo($description);?>">
<meta property="twitter:image" content="<?php echo($icondark);?>" />
