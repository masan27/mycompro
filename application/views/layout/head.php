<?php
// Site
$site_info = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<!-- <meta name="description" content="<?php echo strip_tags($site_info->tentang).', '.$title ?>">
<meta name="keywords" content="<?php echo $site_info->keywords.', '.$title  ?>">
<meta name="author" content="<?php echo $site_info->namaweb ?>"> -->
<!-- icon -->
<link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Plugin css -->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/fonts/flaticon.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/bootstrap.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/animate.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/swiper.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/lightcase.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/jquery.nstSlider.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/flexslider.css" media="all" />
<!-- own style css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/rtl.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/web/css/responsive.css" media="all" />
<!-- DataTables CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/select2/select2.min.css">
  <style type="text/css" media="screen">
  	p {
  		margin-bottom: 15px;
  	}
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
  .bg-footer-top{
    background: url('<?php echo base_url('assets/pendukung/footer.jpg') ?>') no-repeat center !important;
  }
  .address li span,.address li span p{
    color: white !important;
  }
  .nav li{
	list-style: none;
  }
  </style>
</head>

<body>
