<section class="bg-single-blog">
    <div class="container">
        <div class="row">
            <div class="single-blog">
                <div class="row">
                    <div class="col-md-8">

                        <div class="blog-items">
                            <?php if ($berita->gambar != "") { ?>
                                <div class="blog-img">
                                    <a href="#"><img src="<?php echo base_url('upload/image/' . $berita->gambar) ?>" alt="blog-img-10" class="img-responsive" /></a>
                                </div>
                            <?php } ?>
                            <!-- .blog-img -->
                            <div class="blog-content-box">
                                <div class="meta-box">
                                    <div class="event-author-option">
                                        <div class="event-author-name">
                                            <p>Posted by : <a href="#"> <?php echo $berita->nama; ?></a></p>
                                        </div>
                                        <!-- .author-name -->
                                    </div>
                                    <!-- .author-option -->
                                    <ul class="meta-post">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d M Y', strtotime($berita->tanggal_publish)); ?></li>
                                        <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $berita->hits; ?> Viewer</a></li>
                                    </ul>
                                </div>
                                <!-- .meta-box -->
                                <div class="blog-content">
                                    <h4><?php echo $berita->judul_berita; ?></h4>

                                    <p class="text-justify"><?php echo $berita->isi; ?></p>
                                </div>
                                <!-- .blog-content -->
                            </div>
                            <!-- .blog-content-box -->
                        </div>
                        <!-- .blog-items -->
                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="widget">
                                <h4 class="sidebar-widget-title">Kategori</h4>
                                <div class="widget-content">
                                    <ul class="popular-news-option">
                                        <?php foreach ($kategori as $kategori) { ?>
                                            <li>
                                                <a href="<?=base_url('berita/kategori/'.$kategori->slug_kategori)?>"><i class="text-info far fa-dot-circle fa-sm"></i> <strong><?=$kategori->nama_kategori?></strong></a>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                                <!-- .widget-content -->
                            </div>
                        </div>
                        <div class="sidebar">
                            <div class="widget">
                                <h4 class="sidebar-widget-title">Berita Populer</h4>
                                <div class="widget-content">
                                    <ul class="popular-news-option">
                                        <?php foreach ($populer as $populer) { ?>
                                            <li>
                                                <div class="popular-news-img" style="width: 80px; height: 80px;">
                                                    <a href="<?php echo base_url('berita/read/' . $populer->slug_berita); ?>"><img src="<?php echo base_url('upload/image/thumbs/' . $populer->gambar); ?>" alt="popular-news-img-1" /></a>
                                                </div>
                                                <!-- .popular-news-img -->
                                                <div class="popular-news-contant">
                                                    <h5><a href="<?php echo base_url('berita/read/' . $populer->slug_berita); ?>"><?php echo $populer->judul_berita; ?></a></h5>
                                                    <p><?php echo date('d M Y', strtotime($populer->tanggal_publish)); ?></p>
                                                </div>
                                                <!-- .popular-news-img -->
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                                <!-- .widget-content -->
                            </div>
                        </div>
                        <!-- .sidebar -->
                    </div>
                    <!-- .col-md-4 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .single-blog -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>