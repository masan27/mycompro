<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<?php
if (!empty(ucfirst($this->uri->segment(2)))) {
	$sub = ucfirst($this->uri->segment(2));
	$sub = str_replace('_', ' ', $sub);
	echo '<title>' . SITE_NAME . ' ' . ucfirst($this->uri->segment(1)) . " - " . $sub . '</title>';
} else {
	echo '<title>' . SITE_NAME . ' ' . ucfirst($this->uri->segment(1)) . '</title>';
}
?>

<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
<style>
	#loading {
		width: 100%;
		height: 100%;
		position: fixed;
		text-indent: 100%;
		background: url('<?php echo base_url('img/loading.gif') ?>') no-repeat left top;
		z-index: 1;		
		opacity: 0.8;
		background-size: 35%;
		background-color: rgba(255, 255, 2555, 0.75);
	}
</style>
<!-- <i class="fa fa_spinner fa_spin"></i> -->
<!-- <div id="loading" style="transition: opacity 2s;"></div> -->
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
		
		$(".menu").submit(function() {
		$("#loading").fadeIn('slow');
		});
	}
</script>