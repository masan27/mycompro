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
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <style>
    .custom-file-label{
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
            <div class="card-header py-3 <?= $bg_d ?>">
            </div>
            <div class="card-body">
              <?php
              $model = $this->berita_model;
              ?>
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
              echo form_open_multipart(base_url('admin/berita/edit/' . $berita->id_berita));
              ?>
              <div class="row">
                <div class="col-md-8">

                  <div class="form-group form-group-lg">
                    <label>Judul Konten</label>
                    <input type="text" name="judul_berita" class="form-control" placeholder="Judul Konten" required="required" value="<?php echo set_value('judul_berita', $berita->judul_berita ) ?>">
                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group form-group-lg">
                    <label>Icon Konten</label>
                    <input type="text" name="icon" class="form-control" placeholder="Icon Konten" value="<?php echo set_value('icon', $berita->icon ) ?>">
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group form-group-lg">

                    <div class="row">
                      <div class="col-md-6">
                        <label>Tanggal Publish</label>
                        <input type="date" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php echo set_value('tanggal_publish', date('Y-m-d', strtotime($berita->tanggal_publish))) ?>" data-date-format="dd-mm-yyyy">
                      </div>
                      <div class="col-md-6">
                        <label>Jam Publish</label>
                        <input type="time" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php echo set_value('jam_publish', date('H:i:s', strtotime($berita->tanggal_publish)))  ?>">
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group form-group-lg">
                    <label>Status Konten</label>
                    <select name="status_berita" class="form-control">
                      <option value="Publish">Publikasikan</option>
                      <option value="Draft" <?php if ($berita->status_berita == "Draft") {
                                              echo "selected";
                                            } ?>>Simpan sebagai draft</option>
                    </select>

                  </div>
                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Jenis Konten</label>
                    <select name="jenis_berita" class="form-control">
                      <option value="Berita">Berita</option>
                      <option value="Profil" <?php if ($berita->jenis_berita == "Profil") {
                                                echo "selected";
                                              } ?>>Profil</option>
                      <option value="Layanan" <?php if ($berita->jenis_berita == "Layanan") {
                                                echo "selected";
                                              } ?>>Layanan</option>
                    </select>

                  </div>
                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Kategori Konten</label>
                    <select name="id_kategori" class="form-control">

                      <?php foreach ($kategori as $kategori) { ?>
                        <option value="<?php echo $kategori->id_kategori ?>" <?php if ($berita->id_kategori == $kategori->id_kategori) {
                                                                                echo "selected";
                                                                              } ?>>
                          <?php echo $kategori->nama_kategori ?></option>
                      <?php } ?>

                    </select>

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="custom-file">
                    <label>Upload Gambar Baru</label>
                    <input id="gambar" type="file" name="gambar" accept="image/*" class="custom-file-input" placeholder="Upload gambar">
                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Urutan</label>
                    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan', $berita->urutan ) ?>">
                  </div>
                </div>

                <div class="col-md-12">

                  <div class="form-group">
                    <label>Keywords dan Ringkasan (untuk pencarian Google)</label>
                    <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo set_value('keyword', $berita->keywords) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Isi berita <sup>
                        <!-- <a data-toggle="modal" class="btn btn-info btn-xs" href="<?php echo base_url('admin/berita/files') ?>" data-target="#file"><i class="fa fa-download"></i> Attach File</a> -->

                        <!-- <a data-toggle="modal" class="btn btn-info btn-xs" href="<?php echo base_url('admin/berita/gambar') ?>" data-target="#gambar"><i class="fa fa-download"></i> Attach Gambar</a> -->

                      </sup></label>
                    <textarea name="isi" class="form-control" id="isi" placeholder="Isi berita" placeholder="Isi berita"><?php echo $berita->isi ?></textarea>
                  </div>

                  <div class="form-group text-right ">
                    <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
                    <a href="<?= base_url('admin/berita') ?>" class="btn btn-default btn-lg <?= $bg_d . ' ' . $txt ?>">
                      <span class="icon text-white-50">
                        <i class="fas fa-window-close"></i>
                      </span>
                      <span class="text">Tutup</span>
                    </a>
                  </div>

                </div>

                <?php
                // Form close
                echo form_close();
                ?>               

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