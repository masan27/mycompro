<?php
//asli
$bg_s = 'bg-white';
$bg_d = '';
$txt = '';
$txt600 = 'text-gray-600';
if (isset($_COOKIE['txt'])) {
	$bg_s = $_COOKIE['bg_s'];
	$bg_d = $_COOKIE['bg_d'];
	$txt = $_COOKIE['txt'];
	$txt600 = $_COOKIE['txt'];
}
?>

<nav class="navbar navbar-expand navbar-light <?= $bg_s ?> topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<?php $this->session->level == 'admin' ? $style = 'style = "display: none !important;"' : $style = '';
		?>
		<i class="fa fa-bars"></i><span class="dot notify1 notify notif" <?= $style ?>></span>
	</button>

	<!-- Topbar Search -->
	<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
			<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-search fa-sm"></i>
				</button>
			</div>
		</div>
	</form> -->

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
		<span class="mt-4 d-lg-inline <?= $txt600 ?> small"><?php echo $this->session->userdata("nama"); ?></span>

		<div class="topbar-divider d-none d-sm-block"></div>

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img class="img-profile rounded-circle" src="<?php echo base_url('upload/user/' . $this->session->foto) ?>">
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in <?= $bg_d ?>" aria-labelledby="userDropdown">
				<a class="dropdown-item <?= $txt ?>" href="<?php echo base_url('admin/profil/' . $this->session->user_id) ?>">
					<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
					Ubah Profil
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item <?= $txt ?>" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>

	</ul>

</nav>