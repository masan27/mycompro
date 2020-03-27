<?php
//asli
$bg_s = 'bg-gradient-primary';
$bg_d = '';
$txt = '';
$txt900 = 'text-gray-900';
$btn_wr = 'btn-primary';
if (isset($_COOKIE['txt'])) {
	$bg_s = $_COOKIE['bg_s'];
	$bg_d = $_COOKIE['bg_d'];
	$txt = $_COOKIE['txt'];
	$txt_wr = $_COOKIE['txt_wr'];
	$txt900 = $_COOKIE['txt'];
	$btn_wr = $_COOKIE['btn_wr'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo SITE_NAME ?> - Login</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

	<style>
		.main-cnt-judul {
			margin-top: 20px;
			margin-bottom: 10px;
			color: #232323;
		}

		.logo-app {
			display: block;
			max-width: 20%;
			height: auto;
			margin: 0 auto;
			padding-bottom: 10px;
			margin-top: 20px;
		}

		.judul-app {
			display: block;
			font-weight: bold;
			text-align: center;
			font-size: 20px;
			color: #232323;
		}

		.sub-judul-app {
			display: block;
			text-align: center;
			color: #232323;
		}

		.hh {
			vertical-align: center;
		}
	</style>

</head>

<body class="<?= $bg_s ?>">

	<div class="container">
		<div class="row justify-content-center">
			<div class="hh">
				<img src="<?= base_url('assets/pendukung/logo_awal.png') ?>" class="img img-responsive logo-app" alt="My-Logo">
				<span class="judul-app">Sistem Antrian Perizinan Berusaha</span>
				<!-- <small class="sub-judul-app">Badan Koordinasi Penanaman Modal</small> -->
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<div class="card-body p-0 <?= $bg_d ?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 <?= $txt ?> mb-4">LOGIN</h1>
									</div>
									<form class="user" method="POST" action="<?php echo base_url('login/proses_login') ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="NIM">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
										</div>
										<div class="form-group">
											<button type="submit" class="btn <?= $btn_wr ?> btn-user btn-block">Login</button>
										</div>
										<?php if (isset($this->session->gagal)) { ?>
											<div class="form-group">
												<a href="#!" data-toggle="modal" data-target="#notifModal">Tidak bisa login???</a>
											</div>
										<?php } ?>

										<?php if ($this->session->flashdata('message')) : ?>
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<?php echo $this->session->flashdata('message'); ?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										<?php endif; ?>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Get Modal-->
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<!-- Bootstrap core JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
	<script type="text/javascript" defer src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

	<!-- Custom scripts for all pages-->
	<script type="text/javascript" defer src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>
	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(200, 0).slideUp(200, function() {
				$(this).remove();
			});
		}, 5000);
	</script>

</body>

</html>