<?php 
include('../config/database.php');
include('../functions/location.php');
?>
<?php $title="Lokasi"?>
<?php
$content = "";
if(!empty($_GET))
{
    if(isset($_GET['location']))
    {
        $content = displaylocation($conn,mysqli_real_escape_string($conn,$_GET['location']));
    }
    else if(isset($_GET['tag']))
    {

    }
}
else
{
    $content .= listlocation($conn,$content);
}


/* if(!empty($_GET))
{
    if(isset($_GET['lokasi']))
    {
        echo("as");
    }
}
else
{
    $content="Location";

    $location_q = mysqli_query($conn,"SELECT * FROM location WHERE public = '1'");
    if(mysqli_num_rows($location_q)>0)
    {
        while($l_r = mysqli_fetch_assoc($location_q))
        {
            echo($l_r['name']);
        }
    }
} */
?>
<!-- <div class="container mt-5">
    <div class="row">
        <h2>Contoh Lokasi Jeli
            <button class="btn btn-light btn-sm" onclick="copyurltoclipboard()">
                <i class="fas fa-copy"></i>
            </button>
        </h2>
        <p>Address: Contoh Lokasi, 17600, Kelantan, Malaysia</p>
    </div>
    <div class="row">
        <div class="col">
            <a href="tel:+601123456789" class="text-light"><i class="fas fa-phone"></i> +60 123 456 789</a>
        </div>
        <div class="col">
            <a href="mailto:developer@jeli.com.my" class="text-light"><i class="fas fa-envelope"></i> info@jeli.com.my</a>
        </div>
        <div class="col">
            <a href="<?php //echo($urlarray['whatsapp'])?>123456789" class="text-light"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
        <div class="col">
            <a href="<?php //echo($urlarray['daun'])?>hidarishoya" class="text-light"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.955374509123!2d-122.084249684692!3d37.42199977982592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5e0b1b1b1b1%3A0x1b1b1b1b1b1b1b1b!2sGoogleplex!5e0!3m2!1sen!2smy!4v1633072800000!5m2!1sen!2smy" width="100" height="75" style="border:0; display:inline-block; vertical-align:middle;" allowfullscreen="" loading="lazy"></iframe>
    <p>Description: Welcome to Jeli, your number one source for all things related to our services. We're dedicated to giving you the very best of our offerings, with a focus on quality, customer service, and uniqueness.</p>
</div> -->

<?php include('../layout/main.php');?>