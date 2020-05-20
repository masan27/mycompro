<?php
//asli
$bg_s = '';
$bg_d = '';
$txt = '';
$txt_wr = 'text-primary';
$txt800 = 'text-gray-800';
if (isset($_COOKIE['txt'])) {
  $bg_s = $_COOKIE['bg_s'];
  $bg_d = $_COOKIE['bg_d'];
  $txt = $_COOKIE['txt'];
  $txt_wr = $_COOKIE['txt_wr'];
  $txt800 = $_COOKIE['txt'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <style>
    #imagePreview {
      width: 150px;
      height: 150px;
      background-position: center center;
      background-size: cover;
      -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
      display: inline-block;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div class="<?= $bg_d ?>" id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="<?= $bg_d ?> container-fluid">

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="<?= $txt800 ?>">Pengaturan - <?php echo $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/' . $this->uri->segment(2)) ?>"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?></a></li>
                <li class="breadcrumb-item active <?= $txt800 ?>"><?php echo character_limiter($title, 10) ?></li>
              </ol>
            </div>
          </div>

          <!-- DataTales -->
          <div class="card shadow mb-4 <?= $bg_s . ' ' . $txt ?>">
            <div class="card-header py-3 <?= $bg_d ?>">
              <h6 class="font-weight-bold <?= $txt_wr ?>" style="display: inline-block; margin-right: 1em;">Daftar Pengaturan <?= $title ?></h6>
              <div class="form-row" style="display: inline-flex; min-width: 50%;">
                <div class="col-2">
                  <a href="<?php echo current_url() ?>" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-sync-alt"></i>
                    </span>
                    <span class="text">Refresh</span>
                  </a>
                </div>
              </div>
              <a href="<?php echo base_url() ?>" class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                  <i class="fas fa-globe"></i>
                </span>
                <span class="text">Website</span>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="<?= $txt ?> table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="100">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Keterangan</th>
                      <th style="width:100px;">Ubah</th>
                    </tr>
                  </thead>
                  <tfoot class="">
                    <tr>
                      <th width="5%">No</th>
                      <th>Keterangan</th>
                      <th style="width:100px;">Ubah</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no = 1;
                    if (isset($_COOKIE['txt'])) {
                      $class = 'door-closed';
                      $text = 'Light';
                      $style = 'light';
                      $url = 'admin/pengaturan/light';
                    } else {
                      $class = 'door-open';
                      $text = 'Dark';
                      $style = 'dark';
                      $url = 'admin/pengaturan/dark';
                    }
                    ?>
                    <tr>
                      <td class="align-middle text-center"><?= $no++ ?></td>
                      <td>
                        <b>Umum :</b><br>
                        Anda dapat mengubah nama web, alamat, dan sosial media
                      </td>
                      <td class="align-middle text-center">
                        <a href="<?php echo base_url('admin/pengaturan/web/umum/') ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="align-middle text-center"><?= $no++ ?></td>
                      <td>
                        <b>Logo :</b><br>
                        Anda dapat mengubah logo web
                      </td>
                      <td class="align-middle text-center">
                        <a href="<?php echo base_url('admin/pengaturan/web/logo/') ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="align-middle text-center"><?= $no++ ?></td>
                      <td>
                        <b>Icon :</b><br>
                        Anda dapat mengubah icon web
                      </td>
                      <td class="align-middle text-center">
                        <a href="<?php echo base_url('admin/pengaturan/web/icon/') ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- Script -->
  <?php $this->load->view("admin/_partials/js.php") ?>

  <!-- Page level custom scripts -->
  <!-- <link href="<?php echo base_url('assets/toggle/bootstrap4-toggle.min.css') ?>" rel="stylesheet">
  <script type="text/javascript" defer src="<?php echo base_url('assets/toggle/bootstrap4-toggle.min.js') ?>"></script> -->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
  <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
  <script type="text/javascript" defer src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
  <script>
    function themeConfirm(url) {
      $('#modaltheme').attr('href', url);
      $('#themeModal').modal();
    }
    window.setTimeout(function() {
      $(".alert").fadeTo(2000, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);
  </script>

</body>

</html>