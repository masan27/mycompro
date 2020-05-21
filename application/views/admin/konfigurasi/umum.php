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
            <h1 class="h3 mb-0 <?= $txt800 ?>"><?=$title?></h1>
          </div>

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

              // Form open
              echo form_open(base_url('admin/pengaturan/web/umum'));
              ?>

              <div class="row">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

                <div class="col-md-12">                  

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control textarea" placeholder="Alamat perusahaan/organisasi"><?php echo set_value('alamat', $site->alamat) ?></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <h3>Basic information:</h3>
                  <hr>
                  <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?php echo set_value('namaweb', $site->namaweb) ?>" required class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Email Utama</label>
                    <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo set_value('email', $site->email) ?>" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Email Cadangan</label>
                    <input type="email" name="email_cadangan" placeholder="youremail@address.com" value="<?php echo set_value('email_cadangan', $site->email_cadangan) ?>" class="form-control">
                  </div>                  

                  <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" placeholder="021-000000" value="<?php echo set_value('telepon', $site->telepon) ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>HP</label>
                    <input type="text" name="hp" placeholder="021-000000" value="<?php echo set_value('hp', $site->hp) ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Fax</label>
                    <input type="text" name="fax" placeholder="021-000000" value="<?php echo set_value('fax', $site->fax) ?>" class="form-control">
                  </div>
                 

                  <h3>Social network</h3>
                  <hr>

                  <div class="form-group">
                    <label>Whatsapp <i class="fab fa-whatsapp"></i></label>
                    <input type="text" name="whatsapp" placeholder="+628xx-xxxx-xxx" value="<?php echo set_value('whatsapp', $site->whatsapp) ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Facebook <i class="fab fa-facebook"></i></label>
                    <input type="url" name="facebook" placeholder="http://facebook.com/namakamu" value="<?php echo set_value('facebook', $site->facebook) ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Twitter <i class="fab fa-twitter"></i></label>
                    <input type="url" name="twitter" placeholder="http://twitter.com/namakamu" value="<?php echo set_value('twitter', $site->twitter) ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Instagram <i class="fab fa-instagram"></i></label>
                    <input type="url" name="instagram" placeholder="http://instagram.com/namakamu" value="<?php echo set_value('instagram', $site->instagram) ?>" class="form-control">
                  </div>                  

                </div>

                <div class="col-md-6">                  

                  <h3>Google Map</h3>
                  <hr>
                  <div class="form-group">
                    <label>Google Map</label>
                    <textarea name="google_map" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo set_value('google_map', $site->google_map) ?></textarea>
                  </div>

                  <div class="form-group map">
                    <style type="text/css" media="screen">
                      iframe {
                        width: 100%;
                        max-height: 200px;
                      }
                    </style>
                    <?php echo $site->google_map ?>

                    <hr>
                    <div class="form-group text-right ">
                    <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
                    <a href="<?= base_url('admin/pengaturan/web') ?>" class="btn btn-default btn-lg <?= $bg_d . ' ' . $txt ?>">
                      <span class="icon text-white-50">
                        <i class="fas fa-window-close"></i>
                      </span>
                      <span class="text">Tutup</span>
                    </a>
                  </div>
                  </div>
                </div>
              </div>
              </form>
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
    window.setTimeout(function() {
      $(".alert").fadeTo(5000, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);

    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
      var fileName = document.getElementById("gambar").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = fileName
    });
  </script>

</body>

</html>