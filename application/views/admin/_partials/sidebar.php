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


		<li class="nav-item <?php echo strstr($this->uri->segment(2), 'user') ? 'active' : '' ?>">
			<a class="nav-link <?php echo strstr($this->uri->segment(2), 'user') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
				<i class="fas fa-fw fa-users"></i>
				<span>User</span></a>
			</a>
			<div id="collapseUser" class="collapse <?php echo strstr($this->uri->segment(2), 'user') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="<?= $bg_d ?> py-2 collapse-inner rounded">
					<a class="collapse-item <?= $txt ?> <?php echo strstr($this->uri->segment(3), 'admin') ? 'active' : '' ?>" href="<?php echo site_url('admin/user/admin') ?>">Admin</a>
					<a class="collapse-item <?= $txt ?> <?php echo strstr($this->uri->segment(3), 'astur') ? 'active' : '' ?>" href="<?php echo site_url('admin/user/astur') ?>">Astur</a>
				</div>
			</div>
		</li>

		<li class="nav-item <?php echo $this->uri->segment(2) == 'hak_login' ? 'active' : '' ?>">
			<a class="nav-link menu" href="<?php echo site_url('admin/hak_login') ?>">
				<i class="fas fa-fw fa-sign-in-alt"></i>
				<span>Akses Login</span></a>
		</li>

		<li class="nav-item <?php echo $this->uri->segment(2) == 'libur' ? 'active' : '' ?>">
			<a class="nav-link menu" href="<?php echo site_url('admin/libur') ?>">
				<i class="fas fa-fw fa-edit"></i>
				<span>Liburan</span></a>
		</li>

		<li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
			<a class="nav-link menu" href="<?php echo site_url('admin/laporan/' . date('Y-m-d') . '/' . date('Y-m-d')) ?>">
				<i class="fas fa-fw fa-file-alt"></i>
				<span>Laporan</span></a>
		</li>

		<li class="nav-item <?php echo $this->uri->segment(2) == 'pengaturan' ? 'active' : '' ?>">
			<a class="nav-link menu" href="<?php echo site_url('admin/pengaturan') ?>">
				<i class="fas fa-fw fa-cog"></i>
				<span>Pengaturan</span></a>
		</li>

		<li class="nav-item <?php echo $this->uri->segment(2) == 'absen' ? 'active' : '' ?>">
			<a class="nav-link menu" href="<?php echo site_url('admin/absen/home') ?>">
				<i class="fas fa-fw fa-edit"></i>
				<span>Absen</span></a>
		</li>

		<!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'topik' ? 'active' : '' ?>">
				<a class="nav-link menu" href="<?php echo site_url('admin/topik') ?>">
					<i class="fas fa-fw fa-server"></i>
					<span>Kegiatan</span></a>
			</li> -->

		<li class="nav-item <?php echo strstr($this->uri->segment(2), 'lainnya_') ? 'active' : '' ?>">
			<a class="nav-link <?php echo strstr($this->uri->segment(2), 'lainnya_') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseLainnya" aria-expanded="true" aria-controls="collapseLainnya">
				<i class="fas fa-fw fa-tasks"></i><span class="dot notify notif"></span>
				<span>Lain-lain</span></a>
			</a>
			<div id="collapseLainnya" class="collapse <?php echo strstr($this->uri->segment(2), 'sa') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="<?= $bg_d ?> py-2 collapse-inner rounded">
					<a class="collapse-item <?= $txt ?> <?php echo strstr($this->uri->segment(2), 'izin') ? 'active' : '' ?>" href="<?php echo site_url('admin/lainnya_izin') ?>">Izin</a>
					<a class="collapse-item <?= $txt ?> <?php echo strstr($this->uri->segment(2), 'acc') ? 'active' : '' ?>" href="<?php echo site_url('admin/lainnya_acc') ?>">Konfirmasi <span class="count notif"></span> </a>
				</div>
			</div>
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