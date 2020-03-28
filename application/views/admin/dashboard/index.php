<?php
//asli
$bg_s = '';
$bg_d = '';
$txt = '';
$txt_wr = 'text-primary';
$txt800 = ' ';
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
              <h1 class="<?= $txt800 ?>"><?php echo $title ?></h1>
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
            <!-- <div class="card-header py-3 <?= $bg_d ?>"> -->
            <!-- <h6 class="font-weight-bold <?= $txt_wr ?>" style="display: inline-block; margin-right: 1em;">Jadwal Mengajar Astur Minggu Ini</h6> -->
            <!-- <a href="<?php echo base_url('#') ?>" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
              </a> -->
            <!-- </div> -->
            <div class="card-body">
              <?php
              $model = $this->m_dashboard;
              ?>
              <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h2>Berita<h2>
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $model->berita()->total; ?>
                            <small>Post</small></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-newspaper fa-3x text-primary"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <h2>Galeri<h2>
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $model->galeri()->total; ?>
                            <small>Foto</small>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-newspaper fa-3x text-warning"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <h2>File Unduhan<h2>
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $model->download()->total; ?>
                            <small>File</small>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-download fa-3x text-success"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h2>Pengguna<h2>
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $model->user()->total; ?>
                            <small>Pengguna</small>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-user fa-3x text-primary"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <h2>Video<h2>
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $model->video()->total; ?>
                            <small>Video</small>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-user fa-3x text-warning"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                                
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
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
  <script type="text/javascript" defer src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
  <script type="text/javascript" defer src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);
  </script>

</body>

</html>