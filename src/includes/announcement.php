<?php checkfile(basename(__FILE__),$development);?>
<style>
    .ticker-container {
        width: 100%;
        overflow: hidden;
        background: #333;
        color: #fff;
        padding: 10px 0;
    }
    .ticker-text {
        display: inline-block;
        white-space: nowrap;
        animation: ticker 20s linear infinite;
    }
    @keyframes ticker {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
<div class="ticker-container">
    <div class="ticker-text">
        <?php
            $announcements = [
                "Kunjungi lokasi menarik di Jajahan Jeli dan kongsikan tempat-tempat menarik di Jeli",
                "Bina laman sesawang anda sendiri dengan kami",
                "SEDANG NAIKTARAF"
            ];
            echo(implode(" &nbsp;|&nbsp; ", $announcements));
        ?>
    </div>
</div>