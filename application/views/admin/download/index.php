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
    .custom-file-label {
      top: 32px !important;
    }
    .simpan{
      margin-top: 32px !important;
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
                  <i class="fa fa-plus"></i> Tambah Video
                </button>

                <button class="btn btn-danger" type="submit" name="hapus">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="<?= $txt . ' ' . $tbl_drk ?> display table table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr class="text-center">
                      <th width="5%">
                        <div class="mailbox-controls">
                          <!-- Check all button -->
                          <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
                          </button>
                        </div>
                      </th>
                      <th>Unduh</th>
                      <th width="55%">Judul</th>
                      <th>Author</th>
                      <th width="55px"></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i = 1;
                    foreach ($download as $download) { ?>

                      <tr>
                        <td>
                          <div class="mailbox-star text-center">
                            <div class="text-center">
                              <input type="checkbox" class="icheckbox_flat-blue " name="id_download[]" value="<?php echo $download->id_download ?>">
                              <span class="checkmark"></span>
                            </div>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url('admin/download/unduh/' . $download->id_download) ?>" class="text-success" target="_blank"><i class="fa fa-download dw fa-3x"></i></a>
                        </td>
                        <td><?php echo $download->judul_download ?></td>
                        <td><?php echo $download->nama ?></td>
                        <td>
                          <div class="btn-group text-center">
                            <a href="<?php echo base_url('admin/download/' . $download->id_download) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                            <a onclick="deleteConfirm('<?php echo base_url('admin/download/delete/' . $download->id_download) ?>')" href="#!" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i></a>
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
      $(".alert").fadeTo(5000, 0).slideUp(500, function() {
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