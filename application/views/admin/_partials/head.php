<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title ?></title>
<link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">

<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- ICheck -->
<link rel="stylesheet" href="<?php echo base_url('assets/iCheck/flat/blue.css') ?>">

<!-- Custom styles for this template-->
<?php
$css = 'sb-admin-2.min.css';
if (isset($_COOKIE['txt'])) {
	$css = 'dark-sb-admin-2.min.css';
}
?>
<link href="<?php echo base_url('css/' . $css) ?>" rel="stylesheet">
<link href="<?php echo base_url('css/custom.css') ?>" rel="stylesheet">

<!-- TINYMCE -->
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<style>
	#loading {
		width: 100%;
		height: 100%;
		position: fixed;
		text-indent: 100%;
		background: url('<?php echo base_url('assets/pendukung/loading.gif') ?>') no-repeat center;
		z-index: 1;
		opacity: 0.8;
		background-size: 15%;
		background-color: rgba(255, 255, 2555, 0.75);
	}

	.breadcrumb {
		background-color: transparent !important;
	}

	.info-box {
		box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
		border-radius: .25rem;
		padding: .5rem;
		min-height: 80px;
		background: #fff;
	}

	.logo-app {
		display: block;
		max-width: 50%;
		height: auto;
		margin: 0 auto;
		padding-bottom: 10px;
		margin-top: 10px;
	}
</style>
<!-- <i class="fa fa_spinner fa_spin"></i> -->
<div id="loading" style="transition: opacity 2s;"></div>
<script type="text/javascript">
	function removeLoader() {
		try {
			var loader = document.getElementById("loading");
			loader.style.opacity = "0";
			loader.style.display = "none";
		} catch (exc) {}
	}
	window.onload = function() {
		$(document).ready(function() {
			$("#loading").fadeOut('slow');
			removeLoader();
		});

		$("form").submit(function() {
			$("#loading").fadeIn('slow');
		});

		$(".collapse-item").click(function() {
			$("#loading").fadeIn('slow');
		});
	}
</script>