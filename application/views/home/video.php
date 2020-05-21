<!-- Start campaian video Section -->

<section class="bg-compaian-video">
    <div class="compaian-video-overlay">
        <div class="container">
            <div class="row">
                <div class="compaian-video">
                    <?php
                    if (preg_match("/youtube.com/", $video->video)) {
                        $link = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $video->video);
                    }
                    else{
                        $link = $video->video;
                    }                    
                    ?>
                    <a href="<?= $link ?>" data-rel="lightcase:myCollection"><img src="<?php echo base_url() ?>assets/pendukung/video-icon.png" alt="video-icon" /></a>
                    <h3>WATCH OUR LATEST CAMPAIGN VIDEO</h3>
                </div>
                <!-- .compaian-video -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .compaian-video-overlay -->
</section>

<!-- End campaian video Section -->