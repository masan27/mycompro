	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- <div style="position: sticky; top: 1px; position: -webkit-sticky;"> -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
			<!-- Sidebar - Brand -->
			<!-- <div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div> -->
			<div class="sidebar-brand-text mx-3"><?php echo $this->session->nama ?></div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
			<a class="nav-link menu" href="<?php echo site_url('dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>

		<!-- ==============================ADMIN===================================== -->
		<!-- ==============================ADMIN===================================== -->
		<!-- ==============================ADMIN===================================== -->

		<?php
		if ($this->session->level == 'admin') {

			?>
			<li class="nav-item <?php echo $this->uri->segment(2) == 'kelas' ? 'active' : '' ?>">
				<a class="nav-link menu" href="<?php echo site_url('admin/kelas') ?>">
					<i class="fas fa-fw fa-door-open"></i>
					<span>Kelas</span></a>
			</li>

			<li class="nav-item <?php echo $this->uri->segment(2) == 'jadwal' ? 'active' : '' ?>">
				<a class="nav-link menu" href="<?php echo site_url('admin/jadwal') ?>">
					<i class="far fa-fw fa-calendar-alt"></i>
					<span>Jadwal</span></a>
			</li>


			<li class="nav-item <?php echo strstr($this->uri->segment(2), 'user') ? 'active' : '' ?>">
				<a class="nav-link <?php echo strstr($this->uri->segment(2), 'user') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
					<i class="fas fa-fw fa-users"></i>
					<span>User</span></a>
				</a>
				<div id="collapseUser" class="collapse <?php echo strstr($this->uri->segment(2), 'user') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo strstr($this->uri->segment(3), 'admin') ? 'active' : '' ?>" href="<?php echo site_url('admin/user/admin') ?>">Admin</a>
						<a class="collapse-item <?php echo strstr($this->uri->segment(3), 'astur') ? 'active' : '' ?>" href="<?php echo site_url('admin/user/astur') ?>">Astur</a>
					</div>
				</div>
			</li>

			<li class="nav-item <?php echo $this->uri->segment(2) == 'hak_login' ? 'active' : '' ?>">
				<a class="nav-link menu" href="<?php echo site_url('admin/hak_login') ?>">
					<i class="fas fa-fw fa-sign-in-alt"></i>
					<span>Akses Login</span></a>
			</li>

			<li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
				<a class="nav-link menu" href="<?php echo site_url('admin/laporan') ?>">
					<i class="fas fa-fw fa-file-alt"></i>
					<span>Laporan</span></a>
			</li>

			<!-- ==============================ASTUR===================================== -->
			<!-- ==============================ASTUR===================================== -->
			<!-- ==============================ASTUR===================================== -->
		<?php } else {
			?>

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
					<i class="fas fa-fw fa-tasks"></i>
					<span>Lain-lain</span></a>
				</a>
				<div id="collapseLainnya" class="collapse <?php echo strstr($this->uri->segment(2), 'sa') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo strstr($this->uri->segment(2), 'izin') ? 'active' : '' ?>" href="<?php echo site_url('admin/lainnya_izin') ?>">Izin</a>
						<a class="collapse-item <?php echo strstr($this->uri->segment(2), 'acc') ? 'active' : '' ?>" href="<?php echo site_url('admin/lainnya_acc') ?>">Bungkus</a>
					</div>
				</div>
			</li>

		<?php } ?>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>
		<!-- </div> -->
	</ul>