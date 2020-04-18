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

          <!-- form tambah -->
          <?php include('tambah.php') ?>
          <!-- form edit -->
          <?php include('edit.php') ?>

          <?php
          echo form_open(base_url('admin/galeri/proses'));
          ?>
          <!-- DataTales -->
          <div class="card shadow mb-4 <?= $bg_s . ' ' . $txt ?>">
            <div class="card-header py-3 <?= $bg_d ?>">
              <p class="btn-group">
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#Tambah">
                  <i class="fa fa-plus"></i> Tambah Galeri
                </button>

                <button class="btn btn-danger" type="submit" name="hapus">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </p>
              <a href="<?= base_url('admin/berita/kategori') ?>" class="btn btn-info btn-lg float-right">
                <i class="fas fa-list-ul"></i> Kategori
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="<?= $txt . ' ' . $tbl_drk ?> display table table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>
                        <div class="mailbox-controls">
                          <!-- Check all button -->
                          <button type="button" class="btn btn-dark btn-sm checkbox-toggle"><i class="far fa-square"></i>
                          </button>
                        </div>
                      </th>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Kategori - Posisi</th>
                      <th>Author</th>
                      <th>Tanggal</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i = 1;
                    foreach ($galeri as $galeri) { ?>

                      <tr>
                        <td>
                          <div class="mailbox-star text-center">
                            <div class="text-center">
                              <input type="checkbox" class="icheckbox_flat-blue " name="id_galeri[]" value="<?php echo $galeri->id_galeri ?>">
                              <span class="checkmark"></span>
                            </div>
                        </td>
                        <td>
                          <img src="<?php echo base_url('assets/upload/image/thumbs/' . $galeri->gambar) ?>" width="60">
                        </td>
                        <td><?php echo $galeri->judul_galeri ?></td>
                        <td><?php echo $galeri->nama_kategori_galeri ?> - <?php echo $galeri->jenis_galeri ?></td>
                        <td><?php echo $galeri->nama ?></td>
                        <td><?php echo $galeri->tanggal ?></td>
                        <td class="text-center">
                          <div class="btn-group">
                            <!-- <a href="<?php echo base_url('galeri/read/' . $galeri->id_galeri) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a> -->

                            <a href="<?php echo base_url('admin/galeri/' . $galeri->id_galeri) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

                            <a href="<?php echo base_url('admin/galeri/delete/' . $galeri->id_galeri) ?>" class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>

                    <?php $i++;
                    } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>

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
    window.onload = function() {
      <?php if (isset($edit)) { ?>
        $('#Edit').modal('show');
      <?php } ?>
      removeLoader();
    }

    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);

    document.querySelector('.file-tambah').addEventListener('change', function(e) {
      var fileName = document.getElementById("tambah_gambar").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = fileName
    });

    document.querySelector('.file-edit').addEventListener('change', function(e) {
      var fileName = document.getElementById("edit_gambar").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = fileName
    });
  </script>

</body>

</html>