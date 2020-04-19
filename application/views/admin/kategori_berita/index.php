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
              <button class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
                <i class="fa fa-plus"></i> Tambah
              </button>
            </div>
            <div class="card-body">
              <!-- form tambah -->
              <?php include('tambah.php') ?>
              <!-- form edit -->
              <?php include('edit.php') ?>
              <div class="table-responsive">
                <table id="dataTable" class="<?= $txt . ' ' . $tbl_drk ?> table table-bordered table-hover table-striped">
                  <thead class="bordered-darkorange">
                    <tr>
                      <th>#</th>
                      <th>Nama kategori</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i = 1;
                    foreach ($kategori as $kategori) { ?>

                      <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $kategori->nama_kategori ?></td>
                        <td><?php echo $kategori->slug_kategori ?></td>
                        <td align="center">
                        <div class="btn-group">
                          <a class="btn btn-warning" href="<?php echo base_url('admin/berita/kategori/' . $kategori->id_kategori) ?>"><i class="fa fa-edit"></i></a>
                          <a  onclick="deleteConfirm('<?php echo base_url('admin/berita/hapus_kategori/' . $kategori->id_kategori) ?>')" href="#!" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i></a>
                        </div>
                        </td>
                      </tr>

                    <?php $i++;
                    } ?>

                  </tbody>
                </table>
              </div>
            </div>
            <?php echo form_close(); ?>
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
  </script>

</body>

</html>