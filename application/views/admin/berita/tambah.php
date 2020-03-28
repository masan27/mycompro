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
              <?php
              $site   = $this->m_konfig->listing();
              echo form_open(base_url('admin/berita/proses'));
              ?>
              <p class="btn-group">
                <a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success btn-lg">
                  <i class="fa fa-plus"></i> Tambah Berita/Profil</a>

                <button class="btn btn-warning" type="submit" name="draft" onClick="check();">
                  <i class="fa fa-times"></i> Jangan Publikasikan
                </button>

                <button class="btn btn-primary" type="submit" name="publish" onClick="check();">
                  <i class="fa fa-check"></i> Publikasikan
                </button>

                <button class="btn btn-danger" type="submit" name="hapus" onClick="check();">
                  <i class="fa fa-trash-o"></i> Hapus
                </button>
                <?php
                $url_navigasi = $this->uri->segment(2);
                if ($this->uri->segment(3) != "") {
                ?>
                  <a href="<?php echo base_url('admin/' . $url_navigasi) ?>" class="btn btn-primary">
                    <i class="fa fa-backward"></i> Kembali</a>
                <?php } ?>
              </p>
            </div>
            <div class="card-body">
              <?php
              $model = $this->m_berita;
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
              echo form_open_multipart(base_url('admin/berita/tambah'));
              ?>

              <div class="row">

                <div class="col-md-8">

                  <div class="form-group form-group-lg">
                    <label>Judul berita/profil/layanan</label>
                    <input type="text" name="judul_berita" class="form-control" placeholder="Judul berita/profil/layanan" required="required" value="<?php echo set_value('judul_berita') ?>">
                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group form-group-lg">
                    <label>Icon berita/profil/layanan</label>
                    <input type="text" name="icon" class="form-control" placeholder="Icon berita/profil/layanan" value="<?php echo set_value('icon') ?>">
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group form-group-lg">

                    <div class="row">
                      <div class="col-md-6">
                        <label>Tanggal Publish</label>
                        <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if (isset($_POST['tanggal_publish'])) {
                                                                                                                                        echo set_value('tanggal_publish');
                                                                                                                                      } else {
                                                                                                                                        echo date('d-m-Y');
                                                                                                                                      } ?>" data-date-format="dd-mm-yyyy">
                      </div>
                      <div class="col-md-6">
                        <label>Jam Publish</label>
                        <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if (isset($_POST['jam_publish'])) {
                                                                                                                                    echo set_value('jam_publish');
                                                                                                                                  } else {
                                                                                                                                    echo date('H:i:s');
                                                                                                                                  } ?>">
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group form-group-lg">
                    <label>Status Berita</label>
                    <select name="status_berita" class="form-control">
                      <option value="Publish">Publikasikan</option>
                      <option value="Draft">Simpan sebagai draft</option>}
                    </select>

                  </div>
                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Jenis Berita</label>
                    <select name="jenis_berita" class="form-control">
                      <option value="Berita">Berita</option>
                      <option value="Profil">Profil</option>
                      <option value="Layanan">Layanan</option>
                    </select>

                  </div>
                </div>



                <div class="col-md-3">

                  <div class="form-group">
                    <label>Kategori Berita</label>
                    <select name="id_kategori" class="form-control">

                      <?php foreach ($kategori as $kategori) { ?>
                        <option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
                      <?php } ?>

                    </select>

                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Upload gambar</label>
                    <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Urutan</label>
                    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>">
                  </div>
                </div>


                <div class="col-md-12">


                  <div class="form-group">
                    <label>Keywords dan Ringkasan (untuk pencarian Google)</label>
                    <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo set_value('keywords') ?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Isi berita

                      <sup>
                        <a data-toggle="modal" class="btn btn-info btn-xs" href="<?php echo base_url('admin/berita/files') ?>" data-target="#file"><i class="fa fa-download"></i> Attach File</a>

                        <a data-toggle="modal" class="btn btn-info btn-xs" href="<?php echo base_url('admin/berita/gambar') ?>" data-target="#gambar"><i class="fa fa-download"></i> Attach Gambar</a>

                      </sup></label>
                    <textarea name="isi" class="form-control" id="isi" placeholder="Isi berita"><?php echo set_value('isi') ?></textarea>
                  </div>

                  <div class="form-group text-right">
                    <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
                    <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
                  </div>

                </div>

                <?php
                // Form close
                echo form_close();
                ?>



                <!-- Modal -->
                <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    </div><!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                <!-- Modal -->
                <div class="modal fade" id="gambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    </div><!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

              </div>

              <script>
                $('body').on('click', '[data-toggle="modal"]', function() {
                  $($(this).data("target") + ' .modal-body').load($(this).data("remote"));
                });
              </script>
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