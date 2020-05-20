<?php
//asli
$bg_d = 'bg-white';
$b_gd = 'bg-gradient-primary';
$txt = '';
if (isset($_COOKIE['txt'])) {
	$bg_d = $_COOKIE['bg_d'];
	$b_gd = $_COOKIE['b_gd'];
	$txt = $_COOKIE['txt'];
}
?>

<ul class="navbar-nav <?= $b_gd ?> sidebar sidebar-dark accordion toggled" id="accordionSidebar">

	<!-- <div style="position: sticky; top: 1px; position: -webkit-sticky;"> -->
	<!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#"> -->
	<!-- Sidebar - Brand -->
	<!-- <div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div> -->
	<img src="<?= $this->website->icon() ?>" alt="<?= $this->website->namaweb() ?>" class="img img-responsive logo-app" alt="My-Logo">
	<!-- </a> -->

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
		<a class="nav-link menu" href="<?php echo site_url('admin/dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Interface
	</div>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'berita' ? 'active' : '' ?>">
		<a class="nav-link menu" href="<?php echo site_url('admin/berita') ?>">
			<i class="fas fa-fw fa-newspaper"></i>
			<span>Konten</span></a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'galeri' ? 'active' : '' ?>">
		<a class="nav-link menu" href="<?php echo site_url('admin/galeri') ?>">
			<i class="far fa-fw fa-image"></i>
			<span>Galeri</span></a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'video' ? 'active' : '' ?>">
		<a class="nav-link menu" href="<?php echo site_url('admin/video') ?>">
			<i class="fab fa-fw fa-youtube"></i>
			<span>Video</span></a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'download' ? 'active' : '' ?>">
		<a class="nav-link menu" href="<?php echo site_url('admin/download') ?>">
			<i class="fas fa-fw fa-download"></i>
			<span>File Download</span></a>
	</li>


	<li class="nav-item <?php echo $this->uri->segment(2) == 'pengaturan' ? 'active' : '' ?>">
		<a class="nav-link menu" href="<?php echo site_url('admin/pengaturan') ?>">
			<i class="fas fa-fw fa-cog"></i>
			<span>Pengaturan</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
	<!-- </div> -->
</ul>