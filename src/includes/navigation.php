<?php checkfile(basename(__FILE__),$development);?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
		<a class="navbar-brand" href="index.php"><img src="<?php if(!empty($icondark)){ echo($icondark); }?>" width=50 height=50></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 	aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Siaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style type="text/css">
	nav div div ul li:hover
	{
		background-color: #28a745;
    	color: #FFFFF;
    	border-radius: 25px;
	}
</style>
