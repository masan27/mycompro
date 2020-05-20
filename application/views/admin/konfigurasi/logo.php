<?php
//asli
$bg_s = '';
$bg_d = '';
$txt = '';
$txt_wr = 'text-primary';
$txt800 = ' ';
$tbl_drk = '';
if (isset($_COOKIE['txt'])) {
  $bg_s = $_COOKIE['bg_s'];
  $bg_d = $_COOKIE['bg_d'];
  $txt = $_COOKIE['txt'];
  $txt_wr = $_COOKIE['txt_wr'];
  $txt800 = $_COOKIE['txt'];
  $tbl_drk = $_COOKIE['tbl_drk'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <style>
    .custom-file-label {
      top: 32px !important;
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 <?= $txt800 ?>"><?= $title ?></h1>
          </div>

          <!-- Form -->
          <?php
          echo form_open_multipart(base_url('admin/pengaturan/web/logo'));
          ?>

          <!-- DataTales -->
          <div class="card shadow mb-4 <?= $bg_s . ' ' . $txt ?>">
            <div class="card-header py-3 <?= $bg_d ?>">
            </div>
            <div class="card-body">
              <?php
              // Validasi error
              echo validation_errors('<div class="alert alert-warning">', '</div>');

              // Error upload
              if (isset($error)) {
                echo '<div class="alert alert-warning">';
                echo $error;
                echo '</div>';
              }
              ?>

              <div class="form-row">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

                <div class="form-group col-md-12">
                  <div class="custom-file">
                    <label>Upload Logo Baru</label>
                    <input id="logo" type="file" name="logo" onchange="previewImage();" multiple="multiple" accept="image/*" class="custom-file-input" placeholder="Upload Logo">
                    <label class="custom-file-label" for="logo">Pilih Logo</label>
                  </div>
                </div>
              </div>

              <div class="form-row">              
                <div class="form-group col-md-6 text-center">
                  <label>Logo Baru</label><br>
                  <img id="image-preview" style="max-width: 300px; max-height: auto;">
                </div>            

                <div class="form-group col-md-6 text-center"> 
                  <label>Logo Lama</label><br>
                  <?php if ($site->logo == 'logo_awal.png') : ?>
                    <img src="<?php echo base_url('assets/pendukung/' . $site->logo) ?>" style="max-width:300px; height:auto;">
                  <?php else : ?>
                    <img src="<?php echo base_url('upload/image/' . $site->logo) ?>" style="max-width:300px; height:auto;">
                  <?php endif; ?>
                </div>

              </div>
            </div>
            <div class="card-footer py-3 <?= $bg_s ?>">
              <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-save"></i>
                </span>
                <span class="text">Simpan</span>
              </button>
              <a href="<?php echo base_url('admin/pengaturan/web') ?>" class="btn <?= $bg_d . ' ' . $txt ?> btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-window-close"></i>
                </span>
                <span class="text">Tutup</span>
              </a>
            </div>
            <?php
            // Form close
            echo form_close();
            ?>
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
    window.setTimeout(function() {
      $(".alert").fadeTo(5000, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);

    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
      var fileName = document.getElementById("icon").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = fileName
    });
  </script>

  <script>
    function previewImage() {
      document.getElementById("image-preview").style.display = "inline-block";
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("icon").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
      };
    };
  </script>

</body>

</html>