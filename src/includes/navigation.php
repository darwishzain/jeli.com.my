<?php checkfile(basename(__FILE__),$development);?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
		<a class="navbar-brand" href="index.php"><img src="../assets/media/default/icondark.png" width=50 height=50></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 	aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../pages/home.php">Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/location.php">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/post.php">Siaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/about.php">Tentang</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex" action="search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="query" style="border-width: 2px;">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="../pages/admin.php">Pentadbir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style type="text/css">
	nav div div ul li a:hover
	{
		background-color: #28a745;
        color: #FFFFF;
        border-radius: 15px;
	}
</style>
