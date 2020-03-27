<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <style>
    .is-invalid+.select2-container--bootstrap .select2-selection {
      border-color: #e74a3b !important;
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
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
          </div>

          <!-- Form -->
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="form-row" style="display: inline-flex; min-width: 50%;">
                  <h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;">Ubah Profil</h6>
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
                </div>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6 text-center">
                    <label for="lama">Foto Lama</label><br>
                    <img src="<?= base_url('img/' . $this->session->foto) ?>" style="max-width: 300px; max-height: 180px;">
                  </div>
                  <div class="form-group col-md-6 text-center" style="align-items: center;">
                    <label for="gambar">Foto Baru</label><br>
                  </div>
                  <img id="image-preview" style="max-width: 300px; max-height: 180px; margin: 0 auto;">
                  <input type="file" id="image-source" accept="image/*" onchange="previewImage();" name="gambar" class="form-control <?php echo form_error('gambar') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('gambar') ?>
                  </div>
                </div>
              </div>
              <div class="card-footer py-3">
                <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                  </span>
                  <span class="text">Simpan</span>
                </button>
                <a href="<?php echo base_url('admin/profil/') ?>" class="btn btn-secondary btn-icon-split btn-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-window-close"></i>
                  </span>
                  <span class="text">Tutup</span>
                </a>
              </div>
            </div>
          </form>

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

  <link href="<?php echo base_url('assets/select2/select2.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/select2/select2-bootstrap.min.css') ?>" rel="stylesheet" />
  <script defer src="<?php echo base_url('assets/select2/select2.min.js') ?>"></script>
  <script>
    window.onload = function() {
      $('.js-example-basic-single').select2({
        placeholder: 'Pilih Hari',
        allowClear: true,
        minimumResultsForSearch: -1,
        theme: "bootstrap"
      });
      removeLoader();
    }
  </script>
  <script>
    function previewImage() {
      document.getElementById("image-preview").style.display = "inline-block";
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
      };
    };
  </script>

</body>

</html>