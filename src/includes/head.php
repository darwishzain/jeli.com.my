<?php
session_start();
include('../default/config.php');
include('./includes/function.php');
?>
<title><?php if(!empty($title)){echo($title);} ?></title>
<link rel="shortcut icon" href="<?php if(!empty($iconlight)){echo($iconlight);} ?>" type="image/x-icon">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google tag (gtag.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RM2PDHT85D"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-RM2PDHT85D');
</script>

<!--Assets-->
<link rel="stylesheet" href="<?php if(!empty($bootstrapcss)){ echo($bootstrapcss); } ?>?ver=<?php echo(rand(111,9999));?>">
<link rel="stylesheet" href="<?php if(!empty($css)){ echo($css); } ?>?ver=<?php echo(rand(111,9999));?>">
<link rel="stylesheet" href="<?php if(!empty($bootstrapicon)){ echo($bootstrapicon); } ?>">
<link rel="stylesheet" href="<?php if(!empty($fontawesomecss)){ echo($fontawesomecss); } ?>">
<script src="<?php if(!empty($bootstrapjs)){ echo($bootstrapjs); } ?>"></script>
<!-- <script src="<?php //if(!empty($bootstrapjs)){ echo($bootstrapjs); } ?>"></script> -->
<script src="<?php if(!empty($fontawesomejs)){ echo($fontawesomejs); } ?>"></script>

<!--Googel Font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Primary Meta Tags-->
<meta name="title" content="<?php if(!empty($title)){echo($title);} ?>" />
<meta name="description" content="<?php if(!empty($description)){echo($description);} ?>" />
<meta name="keywords" content="jeli,kelantan,kuala balah,ayer lanas,pelancongan,usahawan,informasi">
<meta name="author" content="Darwish Zain Studio">
<meta name="robots" content="index,follow">
<meta name="p:domain_verify" content="879a7c6af7c7cb0806dcf64830913e32"/>

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="<?php if(!empty($title)){echo($title);} ?>">
<meta itemprop="description" content="<?php if(!empty($description)){echo($description);} ?>">
	
<!-- Facebook Meta Tags -->
<meta property="og:url" content="<?php if(!empty($url)){echo($url);} ?>" />
<meta property="og:type" content="website">
<meta property="og:title" content="<?php if(!empty($title)){echo($title);} ?>">
<meta property="og:description" content="<?php if(!empty($description)){echo($description);} ?>">
<meta property="og:image" content="<?php //image here?>" />
	
<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php if(!empty($url)){echo($url);} ?>" />
<meta name="twitter:title" content="<?php if(!empty($title)){echo($title);} ?>">
<meta name="twitter:description" content="<?php if(!empty($description)){echo($description);} ?>">
<meta property="twitter:image" content="<?php //image here?>" />

<script src="https://kit.fontawesome.com/6d1cef488a.js" crossorigin="anonymous"></script>