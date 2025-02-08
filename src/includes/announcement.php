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
                "Selamat datang ke Laman Sesawang Jajahan Jeli!",
                "Kunjungi lokasi menarik di Jajahan Jeli",
                "Kongsikan tempat-tempat menarik di Jeli.",
                "https://jeli.com.my."
            ];
            echo implode(" &nbsp;|&nbsp; ", $announcements);
        ?>
    </div>
</div>