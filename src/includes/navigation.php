<?php checkfile(basename(__FILE__),$development);?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
		<a class="navbar-brand" href="../pages/location.php"><img src="../assets/media/default/icondark.png" width=50 height=50 alt="Logo Dark"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 	aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-center collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                navigation(['../pages/home.php'],'<i class="bi bi-house-fill"></i>','');
                //! upload/download ../pages/location.php and ../functions/location.php to use location page and its functions
                navigation(['../pages/location.php','../functions/location.php'],'<i class="bi bi-compass-fill"></i> Lokasi','');
                //! upload/download ../pages/post.php and ../functions/post.php to use post page and its functions
                navigation(['../pages/post.php','../functions/post.php'],'Siaran','');
                //! upload/download ../pages/download.php to use download page
                navigation(['../pages/download.php','../functions/download.php'],'<i class="bi bi-cloud-arrow-down-fill"></i> Muat Turun','');
                //! upload/download ../pages/about.php to use about page
                navigation(['../pages/about.php'],'<i class="bi bi-info-circle-fill"></i> Perihal','');
                //! upload/download ../functions/search.php to use search function
                if(file_exists('../functions/search.php'))
                {
                    ?>
                    <li class="nav-item">
                        <form class="d-flex" action="function.php" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="query" style="border-width: 2px;">
                            <button class="btn btn-outline-success" type="submit">Cari</button>
                        </form>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="navbar-nav ms-auto">
            <?php
            //! upload/download ../pages/user.php and  ../functions/user.php to use about page and its functions
            navigation(['../pages/user.php','../functions/user.php'],'<i class="bi bi-person-fill"></i>','');
            if(!empty($_SESSION['id']))
            {
                if($_SESSION['role']=='admin')
                {
                    //! upload/download ../pages/admin.php and ../functions/admin.php to use admin page and its functions
                    navigation(['../pages/admin.php','../functions/admin.php'],'<i class="bi bi-gear-fill"></i>','');
                }
                ?>
                <li class="nav-item m-1">
                    <a class="navigation fs-6 rounded w-100 d-md-inline-block btn btn-danger" href="../pages/user.php?logout"><i class="bi bi-door-open-fill"></i></a>
                </li>
                <?php
            }
            ?>
            <ul>
        </div>
    </div>
</nav>
<style type="text/css">
    .navigation{
        color:#000000;
    }
.navigation:hover{
    background-color: #198754;
    color:#FFFFFF;
}
</style>
