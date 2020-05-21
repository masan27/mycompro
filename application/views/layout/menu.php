<?php 
$site                       = $this->konfigurasi_model->listing(); 
$site_nav                   = $this->konfigurasi_model->listing();
$nav_profil                 = $this->nav_model->nav_profil();
$nav_download               = $this->nav_model->nav_download();
$nav_berita                 = $this->nav_model->nav_berita();
$nav_agenda                 = $this->nav_model->nav_agenda();
$nav_layanan                = $this->nav_model->nav_layanan();
?>
<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
<div class="container">
<div class="row">
<div class="main-menu">
<a class="show-res-logo" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 76px; width: auto;" /></a>
<nav class="navbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 56px; width: auto;" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <!-- Home -->
            <li><a href="<?php echo base_url() ?>" class="<?php echo $this->uri->segment(1) == '' ? 'active' : '' ?>">BERANDA</a></li>

            <!-- Berita -->
            <li><a href="<?php echo base_url('berita') ?>" class="<?php echo $this->uri->segment(1) == 'berita' ? 'active' : '' ?>">BERITA</a></li>            

            <!-- Profil -->
            <li><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>" class="<?php echo $this->uri->segment(2) == 'profil' ? 'active' : '' ?>">PROFIL</a></li>

            <!-- Galeri -->
            <li><a href="<?php echo base_url('galeri') ?>" class="<?php echo $this->uri->segment(1) == 'galeri' ? 'active' : '' ?>">GALERI</a></li>

            <!-- Video -->
            <li><a href="<?php echo base_url('video') ?>" class="<?php echo $this->uri->segment(1) == 'video' ? 'active' : '' ?>">VIDEO</a></li>            

            <!-- Download -->
            <li><a href="<?php echo base_url('download') ?>" class="<?php echo $this->uri->segment(1) == 'download' ? 'active' : '' ?>">UNDUHAN</a></li>
            
            <!-- Kontak  -->
            <li><a href="<?php echo base_url('kontak') ?>" class="<?php echo $this->uri->segment(1) == 'kontak' ? 'active' : '' ?>">KONTAK</a></li>
        </ul>
        <div class="menu-right-option pull-right">
            

            <div class="search-box">
                <i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i>
                <i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i>
            </div>
            <div class="search-box-text">
                <form action="http://demos.codexcoder.com/labartisan/html/GreenForest/search">
                    <input type="text" name="search" id="all-search" placeholder="Search Here">
                </form>
            </div>
        </div>
        <!-- .header-search-box -->
    </div>
    <!-- .navbar-collapse -->
</nav>
</div>
<!-- .main-menu -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .bg-main-menu -->
</header>

