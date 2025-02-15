<?php checkfile(basename(__FILE__),$development);?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
		<a class="navbar-brand" href="../pages/location.php"><img src="../assets/media/default/icondark.png" width=50 height=50></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 	aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-center collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                navigation(['../pages/home.php',''],'Utama','btn-success active');
                //! upload/download ../pages/location.php and ../functions/location.php to use location page and its functions
                navigation(['../pages/location.php','../functions/location.php'],'Lokasi','btn-success');
                //! upload/download ../pages/post.php and ../functions/post.php to use post page and its functions
                navigation(['../pages/post.php','../functions/post.php'],'Siaran','btn-success');
                //! upload/download ../pages/about.php to use about page
                navigation(['../pages/about.php',''],'Perihal','btn-success');
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
            //! upload/download ../pages/crowd.php and ../functions/crowd.php to use crowd page and its functions
            navigation(['../pages/crowd.php','../functions/crowd.php'],'Kongsi Maklumat','btn-primary');
            //! upload/download ../pages/admin.php and ../functions/admin.php to use admin page and its functions
            navigation(['../pages/admin.php','../functions/admin.php'],'Pentadbir','btn-primary');
            ?>
            <ul>
        </div>
    </div>
</nav>
<style type="text/css">

</style>
