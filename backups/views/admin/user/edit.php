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
            <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
          </div>

          <!-- Form -->
          <?php echo form_open('admin/user/edit/'.$items->id) ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;">Tambah Pengguna <?= ucfirst($this->session->user) ?></h6>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="username">NIM / NIK</label>
                  <input type="text" name="username" id="username" value="<?php echo set_value('username', $items->username) ?>" class="form-control autoFloat <?php echo form_error('username') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('username') ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" value="<?php echo set_value('nama', $items->nama) ?>" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama') ?>
                  </div>
                  <input type="hidden" name="level" id="level" value="<?php echo set_value('level', $this->session->user) ?>" class="form-control <?php echo form_error('level') ? 'is-invalid' : '' ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="password">Kata Sandi</label>
                  <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('password') ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="repassword">Ulangi Kata Sandi</label>
                  <input type="password" name="repassword" id="repassword" value="<?php echo set_value('repassword') ?>" class="form-control <?php echo form_error('repassword') ? 'is-invalid' : '' ?>">
                  <div class="invalid-feedback">
                    <?php echo form_error('repassword') ?>
                  </div>
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
              <a href="<?php echo base_url('admin/user/' . $this->session->user) ?>" class="btn btn-secondary btn-icon-split btn-sm">
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
        placeholder: 'Pilih Level',
        allowClear: true,
        minimumResultsForSearch: -1,
        theme: "bootstrap"
      });
      removeLoader();
    }
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/autoNumeric/autoNumeric.min.js') ?>"></script>
  <script>
    const autoFloatOptions = {
      digitGroupSeparator: '',
      decimalCharacter: '.',
      decimalPlaces: 0,
      modifyValueOnWheel: false,
    };
    new AutoNumeric('.autoFloat', autoFloatOptions);
  </script>

</body>

</html>